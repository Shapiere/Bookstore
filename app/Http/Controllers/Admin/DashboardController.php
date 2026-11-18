<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use App\Models\Message;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'books' => Book::count(),
            'categories' => Category::count(),
            'users' => User::where('role', 'user')->count(),
            'orders' => Order::count(),
            'pending' => Order::where('status', 'pending')->count(),
            'unread_messages' => Message::where('is_read', false)->count(),
            'low_stock' => Book::where('stock', '>', 0)->where('stock', '<=', 5)->count(),
            'revenue' => Order::where('payment_status', 'paid')->sum('total_price'),
        ];

        $recentOrders = Order::with('user')->latest()->orderByDesc('id')->take(5)->get();

        // Grafik penjualan enam bulan terakhir
        $salesRaw = Order::where('payment_status', 'paid')
            ->where('created_at', '>=', now()->subMonths(5)->startOfMonth())
            ->select(
                DB::raw("DATE_FORMAT(created_at, '%Y-%m') as bulan"),
                DB::raw('SUM(total_price) as total')
            )
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->pluck('total', 'bulan');

        $salesLabels = [];
        $salesData = [];

        for ($i = 5; $i >= 0; $i--) {
            $key = now()->subMonths($i)->format('Y-m');
            $salesLabels[] = now()->subMonths($i)->translatedFormat('M Y');
            $salesData[] = (float) ($salesRaw[$key] ?? 0);
        }

        // Lima buku terlaris, pesanan dibatalkan tidak dihitung
        $topBooks = Book::select('books.id', 'books.title', 'books.author', 'books.price', 'books.cover_image')
            ->selectRaw('COALESCE(SUM(order_items.qty), 0) as sold')
            ->leftJoin('order_items', 'books.id', '=', 'order_items.book_id')
            ->leftJoin('orders', 'order_items.order_id', '=', 'orders.id')
            ->where(function ($q) {
                $q->where('orders.status', '!=', 'cancelled')
                  ->orWhereNull('orders.id');
            })
            ->groupBy('books.id', 'books.title', 'books.author', 'books.price', 'books.cover_image')
            ->orderByDesc('sold')
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'stats', 'recentOrders', 'topBooks', 'salesLabels', 'salesData'
        ));
    }
}