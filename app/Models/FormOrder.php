<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FormOrder extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'pricing_plan_id',
        'store_banner_path',
        'store_logo_path',
        'store_owner',
        'store_name',
        'application_name',
        'application_description',
        'store_address',
        'store_url',
        'whatsapp_number',
        'youtube_url',
        'facebook_url',
        'instagram_url',
        'twitter_url',
        'layout_id',
        'layout_color',
    ];
}
