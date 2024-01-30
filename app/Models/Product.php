<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    // protected $fillable = [
    //     'name', 'price', 'quantity', 'discount',
    // ];

    public function orders(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
}
