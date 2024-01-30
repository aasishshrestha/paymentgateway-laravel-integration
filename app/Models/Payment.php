<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    use HasFactory;
    protected $primaryKey = 'ulid';
    public $incrementing = false;
    protected $fillable = [

        'ulid','amount', 'discount_amount', 'net_amount', 'payment_status', 'payment_mode', 'ref_id', 'request_date', 'response_date','order_id'
    ];

    public function order() : BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
}
