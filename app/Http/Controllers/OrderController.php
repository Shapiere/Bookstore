<?php

namespace App\Http\Controllers;

use App\Services\OrderService;

class OrderController extends Controller
{
    public function index()
    {
        $orders = auth()->user()->orders()->latest()->paginate(10);

        return view('orders.index', compact('orders'));
    }

    public function show(int $order)
    {
        $order = auth()->user()->orders()->with('items')->findOrFail($order);

        return view('orders.show', compact('order'));
    }

    // Simulasi pembayaran online saat mode mock aktif.
    public function simulatePayment(int $order, OrderService $orders)
    {
        abort_unless(config('midtrans.mock'), 404);

        $order = auth()->user()->orders()->findOrFail($order);

        abort_unless($order->payment_method === 'midtrans', 404);
        abort_if($order->payment_status === 'paid', 404);

        $orders->markAsPaid($order);
        $order->update(['status' => 'processing']);

        return redirect()
            ->route('orders.show', $order)
            ->with('success', 'Pembayaran simulasi berhasil. Pesanan sedang diproses.');
    }
}
