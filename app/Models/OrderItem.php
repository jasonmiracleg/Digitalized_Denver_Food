<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'quantity',
        'totalPrice',
        'order_id',
        'menuID'
    ];

    public function order() {
        return $this->belongsTo(Order::class);
    }

    public function menu()
{
    return $this->belongsTo(Menu::class, 'menuID');
}
}
