<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable([
    'user_id', 'order_code', 'customer_name', 'phone', 'shipping_address',
    'subtotal', 'shipping_cost', 'total_price', 'status', 'payment_method',
    'payment_status', 'paid_at', 'notes',
])]
class Order extends Model
{
    protected function casts(): array
    {
        return [
            'paid_at' => 'datetime',
            'subtotal' => 'decimal:2',
            'total_price' => 'decimal:2',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    // Empat langkah status berurutan. Dibatalkan tidak termasuk karena di luar alur.
    public static function flow(): array
    {
        return [
            'pending' => 'Menunggu',
            'processing' => 'Diproses',
            'shipped' => 'Dikirim',
            'completed' => 'Selesai',
        ];
    }

    // Seluruh label status, termasuk yang di luar alur.
    public static function statusLabels(): array
    {
        return self::flow() + ['cancelled' => 'Dibatalkan'];
    }

    public function statusLabel(): string
    {
        return self::statusLabels()[$this->status] ?? $this->status;
    }

    // Posisi status dalam alur (1 sampai 4). Nol bila di luar alur, misalnya dibatalkan.
    public function statusStep(): int
    {
        $position = array_search($this->status, array_keys(self::flow()), true);

        return $position === false ? 0 : $position + 1;
    }

    public function statusNote(): string
    {
        return match ($this->status) {
            'pending' => 'Menunggu konfirmasi admin.',
            'processing' => 'Pesanan sedang disiapkan.',
            'shipped' => 'Buku dalam perjalanan ke alamat Anda.',
            'completed' => 'Pesanan sudah selesai.',
            default => 'Pesanan ini dibatalkan.',
        };
    }
}
