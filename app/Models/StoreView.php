<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreView extends Model
{
    use HasFactory;

    public function form_order()
    {
        return $this->belongsTo(FormOrder::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $fillable = [
        'form_order_id',
        'user_id',
    ];
}
