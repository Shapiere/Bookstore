<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->query('q');

        $users = User::where('role', 'user')
            ->when($keyword, fn ($q) => $q->where(function ($sub) use ($keyword) {
                $sub->where('name', 'like', "%{$keyword}%")
                    ->orWhere('email', 'like', "%{$keyword}%");
            }))
            ->withCount('orders')
            ->withMax('orders', 'created_at')
            ->orderByDesc('created_at')
            ->orderBy('id')
            ->paginate(10)
            ->withQueryString();

        return view('admin.users.index', compact('users', 'keyword'));
    }

    public function show(User $user)
    {
        $user->load(['orders' => fn ($q) => $q->latest()]);

        $orderCount = $user->orders->count();
        $paidTotal = (float) $user->orders
            ->where('payment_status', 'paid')
            ->sum('total_price');

        return view('admin.users.show', compact('user', 'orderCount', 'paidTotal'));
    }
}
