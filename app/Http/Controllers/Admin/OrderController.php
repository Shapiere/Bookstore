<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Services\OrderService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->query('q');
        $status = $request->query('status');

        $orders = Order::with(['user', 'items'])
            ->when($keyword, fn ($q) => $q->where(function ($sub) use ($keyword) {
                $sub->where('order_code', 'like', "%{$keyword}%")
                    ->orWhere('customer_name', 'like', "%{$keyword}%");
            }))
            ->when($status, fn ($q) => $q->where('status', $status))
            ->latest()
            ->paginate(10)
            ->withQueryString();

        // Jumlah pesanan per status untuk tab filter
        $counts = [
            'all' => Order::count(),
            'pending' => Order::where('status', 'pending')->count(),
            'processing' => Order::where('status', 'processing')->count(),
            'shipped' => Order::where('status', 'shipped')->count(),
            'completed' => Order::where('status', 'completed')->count(),
            'cancelled' => Order::where('status', 'cancelled')->count(),
        ];

        return view('admin.orders.index', compact('orders', 'keyword', 'status', 'counts'));
    }

    public function show(Order $order)
    {
        $order->load(['user', 'items.book.category']);

        return view('admin.orders.show', compact('order'));
    }

    // Ubah status pesanan.
    public function updateStatus(Request $request, Order $order, OrderService $orders)
    {
        $data = $request->validate([
            'status' => ['required', 'in:pending,processing,shipped,completed,cancelled'],
        ]);

        // Pesanan dibatalkan, stok buku dikembalikan.
        if ($data['status'] === 'cancelled' && $order->status !== 'cancelled') {
            $orders->cancel($order);

            return back()->with('success', 'Pesanan dibatalkan dan stok buku dikembalikan.');
        }

        $order->update(['status' => $data['status']]);

        return back()->with('success', 'Status pesanan diperbarui menjadi ' . $order->statusLabel() . '.');
    }

    // Tandai lunas, khusus COD yang dibayar saat buku diterima.
    public function verifyPayment(Order $order, OrderService $orders)
    {
        if ($order->payment_status === 'paid') {
            return back()->with('error', 'Pesanan ini sudah ditandai lunas.');
        }

        $orders->markAsPaid($order);

        return back()->with('success', 'Pembayaran pesanan ' . $order->order_code . ' telah diverifikasi.');
    }
}
