<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Cart extends Model
{
    protected $table = 'cart';
    public $timestamps = false;

    public function verifUser()
    {
        return $this->belongsTo(UsersMiroMiro::class, 'idUser', "ID");
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'idProduct', "ID");
    }
}
