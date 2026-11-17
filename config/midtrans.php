<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Kredensial Midtrans
    |--------------------------------------------------------------------------
    | Diambil dari dashboard Midtrans (Sandbox / Production).
    | Isi nilainya pada file .env.
    */

    'merchant_id' => env('MIDTRANS_MERCHANT_ID', ''),

    'client_key' => env('MIDTRANS_CLIENT_KEY', ''),

    'server_key' => env('MIDTRANS_SERVER_KEY', ''),

    'is_production' => env('MIDTRANS_IS_PRODUCTION', false),

    /*
    | Mode simulasi: pembayaran online dijalankan tanpa memanggil API Midtrans.
    | Dipakai saat akun Midtrans belum mengaktifkan metode pembayaran.
    */

    'mock' => env('MIDTRANS_MOCK', true),

    /*
    | URL script Snap yang dimuat di halaman pembayaran.
    */

    'snap_url' => env('MIDTRANS_IS_PRODUCTION', false)
        ? 'https://app.midtrans.com/snap/snap.js'
        : 'https://app.sandbox.midtrans.com/snap/snap.js',

];
