<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Cart extends Model
{
    protected $table = 'cart';
    public $timestamps = false;

    public function userItems()
    {
        return $this->hasMany(Product::class, "ID");
    }

    public function verifUser()
    {
        return $this->hasMany(Cart::class, "idUser");
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'idProduct');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'idUser');
    }
}
