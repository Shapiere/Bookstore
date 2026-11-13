<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Services\OrderService;
use App\Services\PaymentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PaymentCallbackController extends Controller
{
    /**
     * Endpoint notifikasi (webhook) dari Midtrans.
     */
    public function handle(Request $request, PaymentService $payment, OrderService $orders)
    {
        $payload = $request->all();

        if (! $payment->isValidSignature($payload)) {
            Log::warning('Notifikasi Midtrans dengan signature tidak valid.', $payload);

            return response()->json(['message' => 'Invalid signature'], 403);
        }

        $order = Order::where('order_code', $payload['order_id'] ?? '')->first();

        if (! $order) {
            return response()->json(['message' => 'Order not found'], 404);
        }

        $status = $payload['transaction_status'] ?? '';

        if (in_array($status, ['capture', 'settlement'], true)) {
            $orders->markAsPaid($order);
            $order->update(['status' => 'processing']);
        } elseif (in_array($status, ['cancel', 'deny', 'expire'], true)) {
            $order->update(['payment_status' => 'failed']);
        }

        return response()->json(['message' => 'OK']);
    }
}
