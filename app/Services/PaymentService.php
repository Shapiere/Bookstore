<?php

namespace App\Services;

use App\Models\Order;
use Illuminate\Support\Facades\Log;

class PaymentService
{
    /**
     * Buat Snap token untuk pembayaran online.
     *
     * Mengembalikan null jika library Midtrans belum terpasang
     * atau kredensial belum dikonfigurasi, sehingga alur COD tetap berjalan.
     */
    public function createSnapToken(Order $order): ?string
    {
        if (! class_exists(\Midtrans\Snap::class)) {
            Log::warning('Library midtrans-php belum terpasang. Pembayaran online dilewati.');

            return null;
        }

        if (empty(config('midtrans.server_key'))) {
            Log::warning('MIDTRANS_SERVER_KEY belum diisi. Pembayaran online dilewati.');

            return null;
        }

        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        \Midtrans\Config::$isProduction = config('midtrans.is_production');
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;

        $params = [
            'transaction_details' => [
                'order_id' => $order->order_code,
                'gross_amount' => (int) $order->total_price,
            ],
            'customer_details' => [
                'first_name' => $order->customer_name,
                'phone' => $order->phone,
                'email' => $order->user->email,
            ],
            'item_details' => $order->items->map(fn ($item) => [
                'id' => (string) $item->book_id,
                'price' => (int) $item->price,
                'quantity' => $item->qty,
                'name' => mb_substr($item->title_snapshot, 0, 50),
            ])->all(),
        ];

        try {
            return \Midtrans\Snap::getSnapToken($params);
        } catch (\Throwable $e) {
            Log::error('Gagal membuat Snap token: ' . $e->getMessage());

            return null;
        }
    }

    /**
     * Verifikasi signature notifikasi Midtrans.
     */
    public function isValidSignature(array $payload): bool
    {
        $serverKey = config('midtrans.server_key');

        if (empty($serverKey) || empty($payload['signature_key'])) {
            return false;
        }

        $expected = hash('sha512',
            $payload['order_id'] .
            $payload['status_code'] .
            $payload['gross_amount'] .
            $serverKey
        );

        return hash_equals($expected, $payload['signature_key']);
    }
}
