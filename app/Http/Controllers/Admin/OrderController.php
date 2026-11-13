<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->query('q');
        $status = $request->query('status');

        $orders = Order::with(['user', 'items'])
            ->when($keyword, fn ($q) => $q->where('order_code', 'like', "%{$keyword}%"))
            ->when($status, fn ($q) => $q->where('status', $status))
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.orders.index', compact('orders', 'keyword', 'status'));
    }

    public function show(Order $order)
    {
        $order->load(['user', 'items.book']);

        return view('admin.orders.show', compact('order'));
    }

    /**
     * Perbarui status pesanan.
     */
    public function updateStatus(Request $request, Order $order)
    {
        $data = $request->validate([
            'status' => ['required', 'in:pending,processing,shipped,completed,cancelled'],
        ]);

        $order->update(['status' => $data['status']]);

        return back()->with('success', 'Status pesanan diperbarui menjadi ' . $order->statusLabel() . '.');
    }

    /**
     * Verifikasi pembayaran (khusus COD: dibayar saat buku diterima).
     */
    public function verifyPayment(Order $order)
    {
        if ($order->payment_status === 'paid') {
            return back()->with('error', 'Pesanan ini sudah ditandai lunas.');
        }

        $order->update([
            'payment_status' => 'paid',
            'paid_at' => now(),
        ]);

        return back()->with('success', 'Pembayaran pesanan ' . $order->order_code . ' telah diverifikasi.');
    }
}
