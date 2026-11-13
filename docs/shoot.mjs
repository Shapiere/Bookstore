
import fs from 'node:fs';
import path from 'node:path';

const OUT = 'G:\\Course LSM\\bnsp\\BookStore\\docs\\screenshots';
fs.mkdirSync(OUT, { recursive: true });

const BASE = 'http://127.0.0.1:8000';
const DEBUG = 'http://127.0.0.1:9222';

function sleep(ms) { return new Promise(r => setTimeout(r, ms)); }

async function getTarget() {
  for (let i = 0; i < 40; i++) {
    try {
      const res = await fetch(DEBUG + '/json/list');
      const list = await res.json();
      const page = list.find(t => t.type === 'page');
      if (page && page.webSocketDebuggerUrl) return page;
    } catch (e) { /* not ready */ }
    await sleep(500);
  }
  throw new Error('CDP target tidak ditemukan');
}

class CDP {
  constructor(ws) {
    this.ws = ws;
    this.id = 0;
    this.pending = new Map();
    ws.addEventListener('message', (ev) => {
      const msg = JSON.parse(ev.data);
      if (msg.id && this.pending.has(msg.id)) {
        const { resolve, reject } = this.pending.get(msg.id);
        this.pending.delete(msg.id);
        msg.error ? reject(new Error(JSON.stringify(msg.error))) : resolve(msg.result);
      }
    });
  }
  send(method, params = {}) {
    const id = ++this.id;
    return new Promise((resolve, reject) => {
      this.pending.set(id, { resolve, reject });
      this.ws.send(JSON.stringify({ id, method, params }));
      setTimeout(() => {
        if (this.pending.has(id)) {
          this.pending.delete(id);
          reject(new Error('timeout ' + method));
        }
      }, 30000);
    });
  }
}

async function main() {
  const target = await getTarget();
  const ws = new WebSocket(target.webSocketDebuggerUrl);
  await new Promise((res, rej) => {
    ws.addEventListener('open', res);
    ws.addEventListener('error', rej);
  });

  const cdp = new CDP(ws);
  await cdp.send('Page.enable');
  await cdp.send('Runtime.enable');
  await cdp.send('Emulation.setDeviceMetricsOverride', {
    width: 1440, height: 900, deviceScaleFactor: 1, mobile: false
  });

  async function goto(url, waitMs = 1600) {
    await cdp.send('Page.navigate', { url });
    await sleep(waitMs);
  }

  async function shot(name) {
    const res = await cdp.send('Page.captureScreenshot', { format: 'png', captureBeyondViewport: true });
    fs.writeFileSync(path.join(OUT, name + '.png'), Buffer.from(res.data, 'base64'));
    console.log('OK ' + name);
  }

  async function evalJs(expr) {
    const r = await cdp.send('Runtime.evaluate', { expression: expr, awaitPromise: true });
    return r.result && r.result.value;
  }

  // ---- PUBLIC ----
  const publicPages = [
    ['01-beranda', '/'],
    ['02-katalog', '/katalog'],
    ['03-detail-buku', '/buku/laskar-pelangi'],
    ['04-login', '/login'],
    ['05-register', '/register'],
    ['06-about', '/tentang-kami'],
    ['07-kontak', '/kontak'],
  ];
  for (const [name, url] of publicPages) {
    await goto(BASE + url);
    await shot(name);
  }

  // ---- LOGIN AS ADMIN ----
  await goto(BASE + '/login');
  await evalJs(`
    document.querySelector('input[name=email]').value = 'admin@booknest.test';
    document.querySelector('input[name=password]').value = 'password';
    document.querySelector('form').submit();
  `);
  await sleep(2500);

  const adminPages = [
    ['08-admin-dashboard', '/admin/dashboard'],
    ['09-admin-kategori', '/admin/categories'],
    ['10-admin-buku', '/admin/books'],
    ['11-admin-tambah-buku', '/admin/books/create'],
    ['12-admin-user', '/admin/users'],
    ['13-admin-pesanan', '/admin/orders'],
    ['14-admin-pesan', '/admin/messages'],
  ];
  for (const [name, url] of adminPages) {
    await goto(BASE + url);
    await shot(name);
  }

  // ---- ADMIN: detail pesanan ----
  await goto(BASE + '/admin/orders');
  const orderLink = await evalJs(`(() => {
    const a = document.querySelector('table tbody tr td a[href*="/admin/orders/"]');
    return a ? a.getAttribute('href') : null;
  })()`);
  if (orderLink) {
    await goto(BASE + orderLink);
    await shot('15-admin-detail-pesanan');
  }

  // ---- LOGOUT, LOGIN AS USER ----
  await evalJs(`(() => { const f = document.querySelector('form[action$="/logout"]'); if (f) f.submit(); })()`);
  await sleep(2000);

  await goto(BASE + '/login');
  await evalJs(`
    document.querySelector('input[name=email]').value = 'user@booknest.test';
    document.querySelector('input[name=password]').value = 'password';
    document.querySelector('form').submit();
  `);
  await sleep(2500);

  // add to cart
  await goto(BASE + '/buku/laskar-pelangi');
  await evalJs(`(() => { const f = document.querySelector('form[action*="/keranjang/"]'); if (f) f.submit(); })()`);
  await sleep(2000);

  await goto(BASE + '/keranjang');
  await shot('16-user-keranjang');

  await goto(BASE + '/checkout');
  await shot('17-user-checkout');

  await goto(BASE + '/pesanan');
  await shot('18-user-pesanan');

  console.log('SELESAI');
  ws.close();
}

main().catch(e => { console.error('ERROR:', e.message); process.exit(1); });