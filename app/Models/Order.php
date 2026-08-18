<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $order_id
 * @property string $customer_name
 * @property string $customer_email
 * @property string $customer_phone
 * @property string $total_amount
 * @property string $status
 * @property string $notes
 */
class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'customer_name',
        'customer_email',
        'customer_phone',
        'total_amount',
        'status',
        'notes',
    ];

    protected $casts = [
        'total_amount' => 'decimal:2',
    ];

    protected static function booted(): void
    {
        static::creating(function (Order $order) {
            if (empty($order->order_id)) {
                $last = Order::latest('id')->first();
                $next = $last ? ((int) str_replace('#ORD-', '', $last->order_id)) + 1 : 8800;
                $order->order_id = '#ORD-' . $next;
            }
        });
    }
}
