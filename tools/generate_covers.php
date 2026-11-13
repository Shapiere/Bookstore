<?php
// generate_covers.php - membuat cover placeholder lokal (tanpa internet)
require __DIR__ . '/../vendor/autoload.php';

$app = require_once __DIR__ . '/../bootstrap/app.php';
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