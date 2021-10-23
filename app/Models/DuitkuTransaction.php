<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DuitkuTransaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'form_order_id',
        'reference',
        'merchant_code',
        'merchant_order_id',
        'merchant_user_id',
        'amount',
        'product_detail',
        'additional_param',
        'result_code',
        'payment_method',
        'signature',
    ];
}
