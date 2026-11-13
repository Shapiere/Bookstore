<?php
/**
 * generator cover buku — menghasilkan sampul tipografis lokal (tanpa internet)
 * Palet mengikuti design system: paper / ink / warna kategori yang diredam.
 */
require __DIR__ . '/../vendor/autoload.php';

$app = require_once __DIR__ . '/../bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

$dir = storage_path('app/public/covers');
if (! is_dir($dir)) { mkdir($dir, 0777, true); }

// Warna kategori (muted, selaras palet editorial)
$palette = [
    'Fiksi'      => [0x7A, 0x2E, 0x2E],
    'Non-Fiksi'  => [0x2F, 0x48, 0x58],
    'Teknologi'  => [0x24, 0x38, 0x2E],
    'Anak'       => [0xB5, 0x6B, 0x2B],
    'Pendidikan' => [0x4A, 0x3B, 0x6B],
    'Sejarah'    => [0x6B, 0x3A, 0x2E],
    'Filsafat'   => [0x3E, 0x3A, 0x4F],
    'Sastra'     => [0x5C, 0x2E, 0x3E],
];

$paper = [0xFB, 0xF8, 0xF3];

$fontSerif = 'C:\Windows\Fonts\georgia.ttf';
$fontSerifBold = 'C:\Windows\Fonts\georgiab.ttf';
$fontMono = 'C:\Windows\Fonts\consola.ttf';
if (! file_exists($fontMono)) { $fontMono = 'C:\Windows\Fonts\arial.ttf'; }

$books = App\Models\Book::with('category')->get();
$count = 0;

foreach ($books as $book) {
    $catName = $book->category->name ?? 'Fiksi';
    $base = $palette[$catName] ?? [0x4A, 0x44, 0x3F];

    // variasi tipis supaya tidak identik
    $seed = crc32($book->slug) % 22;      // 0..21
    $shift = $seed - 11;                   // -11..+10

    $w = 500; $h = 700;
    $img = imagecreatetruecolor($w, $h);

    $r = max(0, min(255, $base[0] + $shift));
    $g = max(0, min(255, $base[1] + (int) ($shift * 0.6)));
    $b = max(0, min(255, $base[2] + (int) ($shift * 0.4)));

    $bg = imagecolorallocate($img, $r, $g, $b);
    imagefilledrectangle($img, 0, 0, $w, $h, $bg);

    // gradasi vertikal halus
    for ($y = 0; $y < $h; $y++) {
        $t = $y / $h;
        $rr = (int) ($r * (1 - $t * 0.22));
        $gg = (int) ($g * (1 - $t * 0.22));
        $bb = (int) ($b * (1 - $t * 0.22));
        imageline($img, 0, $y, $w, $y, imagecolorallocate($img, $rr, $gg, $bb));
    }

    $fg = imagecolorallocatealpha($img, $paper[0], $paper[1], $paper[2], 18);
    $fgSoft = imagecolorallocatealpha($img, $paper[0], $paper[1], $paper[2], 70);

    // garis dalam 16px dari tepi
    $inset = 16;
    imagerectangle($img, $inset, $inset, $w - $inset, $h - $inset, $fgSoft);

    // label kategori di atas
    $cat = strtoupper($catName);
    $catW = imagettfbbox(13, 0, $fontMono, $cat);
    $catX = (int) (($w - ($catW[2] - $catW[0])) / 2);
    imagettftext($img, 13, 0, $catX, 76, $fgSoft, $fontMono, $cat);

    // judul — word wrap manual
    $title = $book->title;
    $words = preg_split('/\s+/', $title);
    $lines = []; $cur = '';
    $maxChars = 17;
    foreach ($words as $word) {
        $test = $cur === '' ? $word : $cur . ' ' . $word;
        if (mb_strlen($test) > $maxChars && $cur !== '') { $lines[] = $cur; $cur = $word; }
        else { $cur = $test; }
    }
    if ($cur !== '') { $lines[] = $cur; }
    $lines = array_slice($lines, 0, 4);

    $fontSize = count($lines) > 2 ? 30 : 34;
    $lineH = (int) ($fontSize * 1.32);
    $totalH = count($lines) * $lineH;
    $startY = (int) (($h - $totalH) / 2) + $fontSize;

    foreach ($lines as $i => $line) {
        $box = imagettfbbox($fontSize, 0, $fontSerifBold, $line);
        $lw = $box[2] - $box[0];
        $x = (int) (($w - $lw) / 2);
        imagettftext($img, $fontSize, 0, $x, $startY + $i * $lineH, $fg, $fontSerifBold, $line);
    }

    // penulis di bawah judul
    $author = $book->author;
    if (mb_strlen($author) > 30) { $author = mb_substr($author, 0, 28) . '…'; }
    $aBox = imagettfbbox(15, 0, $fontSerif, $author);
    $aX = (int) (($w - ($aBox[2] - $aBox[0])) / 2);
    imagettftext($img, 15, 0, $aX, $startY + count($lines) * $lineH + 26, $fgSoft, $fontSerif, $author);

    // nama toko di bawah
    $brand = 'BOOKSTORE';
    $bBox = imagettfbbox(11, 0, $fontMono, $brand);
    $bX = (int) (($w - ($bBox[2] - $bBox[0])) / 2);
    imagettftext($img, 11, 0, $bX, $h - 42, $fgSoft, $fontMono, $brand);

    $file = $dir . DIRECTORY_SEPARATOR . $book->slug . '.png';
    imagepng($img, $file);
    imagedestroy($img);
    $count++;
}

echo "Generated {$count} cover\n";
