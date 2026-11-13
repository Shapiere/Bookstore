
import fs from 'node:fs';
import path from 'node:path';

const OUT = 'G:\\Course LSM\\bnsp\\BookStore\\docs\\screenshots';
const BASE = 'http://127.0.0.1:8000';
const DEBUG = 'http://127.0.0.1:9222';
const sleep = ms => new Promise(r => setTimeout(r, ms));

async function getTarget() {
  const res = await fetch(DEBUG + '/json/list');
  const list = await res.json();
  return list.find(t => t.type === 'page');
}

class CDP {
  constructor(ws) { this.ws = ws; this.id = 0; this.pending = new Map();
    ws.addEventListener('message', ev => {
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
      setTimeout(() => { if (this.pending.has(id)) { this.pending.delete(id); reject(new Error('timeout ' + method)); } }, 30000);
    });
  }
}

const target = await getTarget();
const ws = new WebSocket(target.webSocketDebuggerUrl);
await new Promise((res, rej) => { ws.addEventListener('open', res); ws.addEventListener('error', rej); });
const cdp = new CDP(ws);
await cdp.send('Page.enable');
await cdp.send('Runtime.enable');
await cdp.send('Emulation.setDeviceMetricsOverride', { width: 1440, height: 900, deviceScaleFactor: 1, mobile: false });

async function goto(url, waitMs = 1800) { await cdp.send('Page.navigate', { url }); await sleep(waitMs); }
async function shot(name) {
  const res = await cdp.send('Page.captureScreenshot', { format: 'png', captureBeyondViewport: true });
  fs.writeFileSync(path.join(OUT, name + '.png'), Buffer.from(res.data, 'base64'));
  console.log('OK ' + name);
}
async function ev(expr) {
  const r = await cdp.send('Runtime.evaluate', { expression: expr, awaitPromise: true });
  return r.result && r.result.value;
}

// LOGIN ADMIN -> detail pesanan
await goto(BASE + '/login');
await ev("document.querySelector('input[name=email]').value='admin@booknest.test';document.querySelector('input[name=password]').value='password';document.querySelector('form').submit();");
await sleep(2500);
await goto(BASE + '/admin/orders');
await goto(BASE + '/admin/orders/1');
await shot('15-admin-detail-pesanan');

// LOGOUT
await ev("(() => { const f = document.querySelector('form[action$=\"/logout\"]'); if (f) f.submit(); return 1; })()");
await sleep(2200);

// LOGIN USER
await goto(BASE + '/login');
await ev("document.querySelector('input[name=email]').value='user@booknest.test';document.querySelector('input[name=password]').value='password';document.querySelector('form').submit();");
await sleep(2500);

// ADD TO CART
await goto(BASE + '/buku/laskar-pelangi');
await ev("(() => { const f = document.querySelector('form[action*=\"/keranjang/\"]'); if (f) f.submit(); return 1; })()");
await sleep(2200);

await goto(BASE + '/keranjang');
await shot('16-user-keranjang');

await goto(BASE + '/checkout');
await shot('17-user-checkout');

// SUBMIT CHECKOUT COD
await ev("(() => { const f = document.querySelector('form[action$=\"/checkout\"]'); if (f) f.submit(); return 1; })()");
await sleep(2600);
await shot('18-user-checkout-sukses');

await goto(BASE + '/pesanan');
await shot('19-user-pesanan');

console.log('SELESAI');
ws.close();
