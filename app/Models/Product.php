<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    public function has_form_order()
    {
        return $this->hasOneThrough(
            FormOrder::class,
            User::class,
            'id',
            'user_id',
            'user_id',
            'id'
        );
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $fillable = [
        'user_id',
        'product_photo_path',
        'name',
        'price',
        'stock',
        'description',
    ];
}
