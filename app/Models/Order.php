<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'userID',
        'menuID',
        'quantity',
        'totalPrice',
        'status'
    ];

    public function detailMenu(): BelongsTo {
        return $this->belongsTo(Menu::class, 'menuID', 'id');
    }
}
