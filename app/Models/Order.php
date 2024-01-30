<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id', 'user_id', 'payment_status', 'is_completed'
    ];


    public function product() : HasOne
    {
       return $this->hasOne(Product::class);
    }

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function payments() : HasMany
    {
        return $this->hasMany(Payment::class);
    }
}
