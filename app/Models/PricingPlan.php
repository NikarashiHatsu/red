<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PricingPlan extends Model
{
    use SoftDeletes;

    public function getNarativeNumberOfProducts(): string
    {
        return $this->number_of_products . ' Produk';
    }

    protected $fillable = [
        'name',
        'has_app',
        'has_released_on_google_play',
        'number_of_products',
        'has_blog',
        'has_hosting_and_domain',
        'has_self_manage',
        'has_online_payment',
        'has_whatsapp_integration',
        'has_sale_transaction',
        'has_aposerba_integration',
        'has_ad_mob_integration',
        'price',
    ];
}
