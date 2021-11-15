<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    // BEGIN: ADMIN
    public function pricing_plans()
    {
        return $this->hasMany(PricingPlan::class);
    }
    // END: ADMIN

    // BEGIN: STORE
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function form_order()
    {
        return $this->hasOne(FormOrder::class);
    }

    public function transaction()
    {
        // iPaymu Transaction
        return $this->hasOne(Transaction::class);
    }

    public function duitku_transaction()
    {
        // Duitku Transaction
        return $this->hasOne(DuitkuTransaction::class);
    }

    public function progress()
    {
        return $this->hasOne(Progress::class);
    }

    public function store_sales()
    {
        return $this->hasManyThrough(
            Sale::class,
            Product::class
        );
    }
    // END: STORE

    // BEGIN: USER
    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
    // END: USER

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
