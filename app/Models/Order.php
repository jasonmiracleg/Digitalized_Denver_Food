<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'userID',
        'totalPrice'
    ];

    public function detailMenu(): BelongsTo {
        return $this->belongsTo(Menu::class, 'menuID', 'id');
    }

    public function orderItems(): HasMany {
        return $this->hasMany(OrderItem::class);
    }
}
