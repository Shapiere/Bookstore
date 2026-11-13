<?php
// generate_covers.php - membuat cover placeholder lokal (tanpa internet)
require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

$dir = storage_path('app/public/covers');
if (! is_dir($dir)) { mkdir($dir, 0777, true); }

$palette = [
    'Fiksi'      => [[239, 68, 68],  [153, 27, 27]],
    'Non-Fiksi'  => [[59, 130, 246], [30, 64, 175]],
    'Teknologi'  => [[16, 185, 129], [6, 95, 70]],
    'Anak'       => [[245, 158, 11], [180, 83, 9]],
    'Pendidikan' => [[139, 92, 246],[91, 33, 182]],
];

$font = 'C:\Windows\Fonts\arialbd.ttf';
$fontSmall = 'C:\Windows\Fonts\arial.ttf';
$hasTtf = file_exists($font);

$books = App\Models\Book::with('category')->get();
$n = 0;

foreach ($books as $book) {
    $catName = $book->category->name;
    [$c1, $c2] = $palette[$catName] ?? [[100,100,100],[50,50,50]];

    $w = 400; $h = 560;
    $img = imagecreatetruecolor($w, $h);

    // gradient vertikal
    for ($y = 0; $y < $h; $y++) {
        $t = $y / $h;
        $r = (int)($c1[0] + ($c2[0]-$c1[0]) * $t);
        $g = (int)($c1[1] + ($c2[1]-$c1[1]) * $t);
        $b = (int)($c1[2] + ($c2[2]-$c1[2]) * $t);
        imageline($img, 0, $y, $w, $y, imagecolorallocate($img, $r, $g, $b));
    }

    $white = imagecolorallocate($img, 255, 255, 255);
    $soft  = imagecolorallocate($img, 235, 235, 235);

    // garis aksen atas
    imagefilledrectangle($img, 0, 0, $w, 10, $soft);

    // kategori di atas
    if ($hasTtf) {
        imagettftext($img, 13, 0, 30, 55, $soft, $fontSmall, strtoupper($catName));
    } else {
        imagestring($img, 3, 30, 40, strtoupper($catName), $soft);
    }

    // judul (word wrap manual)
    $title = $book->title;
    $words = explode(' ', $title);
    $lines = []; $cur = '';
    $maxChars = 18;
    foreach ($words as $word) {
        $test = $cur === '' ? $word : $cur . ' ' . $word;
        if (strlen($test) > $maxChars && $cur !== '') { $lines[] = $cur; $cur = $word; }
        else { $cur = $test; }
    }
    if ($cur !== '') { $lines[] = $cur; }
    $lines = array_slice($lines, 0, 4);

    $yPos = 150;
    foreach ($lines as $line) {
        if ($hasTtf) {
            imagettftext($img, 22, 0, 30, $yPos, $white, $font, $line);
        } else {
            imagestring($img, 5, 30, $yPos - 20, $line, $white);
        }
        $yPos += 38;
    }

    // author
    if ($hasTtf) {
        imagettftext($img, 13, 0, 30, $yPos + 25, $soft, $fontSmall, $book->author);
        imagettftext($img, 12, 0, 30, $h - 40, $soft, $fontSmall, 'BookStore');
    } else {
        imagestring($img, 3, 30, $yPos + 15, $book->author, $soft);
    }

    $file = $dir . DIRECTORY_SEPARATOR . $book->slug . '.png';
    imagepng($img, $file);
    imagedestroy($img);

    if (! $book->cover_image) {
        $book->cover_image = 'covers/' . $book->slug . '.png';
        $book->save();
    }
    $n++;
}

echo "Generated {$n} covers ke storage/app/public/covers\n";