<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartPerso extends Model
{
    protected $table = 'cart_perso';
    public $timestamps = false;

    public function verifUser()
    {
        return $this->belongsTo(UsersMiroMiro::class, 'idUser', "ID");
    }

    public function product()
    {
        return $this->belongsTo(PersonalizedGlasses::class, 'idProduct', "ID");
    }
}
