<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sale extends Model
{
    use HasFactory, SoftDeletes;

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function buyer()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
        'address',
        'phone_number',
        'is_paid',
        'is_confirmed',
        'is_product_sent',
        'is_product_received',
        'reference',
        'merchant_order_id',
        'result_code',
    ];
}
