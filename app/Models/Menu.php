<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Menu extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function made(): BelongsTo {
        return $this->belongsTo(Stall::class, 'stallID', 'id');
    }

    public function ordered(): HasMany {
        return $this->hasMany(Order::class, 'menuID', 'id');
    }

    public function cartItem(): HasMany {
        return $this->hasMany(CartItem::class, 'menuID', 'id');
    }

    public function stall()
    {
        return $this->belongsTo(Stall::class, 'stallID');
    }
}
