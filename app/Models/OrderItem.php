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
        'orderID',
        'menuID'
    ];

    public function order() {
        return $this->belongsTo(Order::class, 'orderID');
    }

    public function menu()
{
    return $this->belongsTo(Menu::class, 'menuID');
}
}
