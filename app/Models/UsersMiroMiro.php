<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsersMiroMiro extends Model
{
    protected $table = 'users';
    public $timestamps = false;

    public function haveItemsOfUser()
    {
        return $this->hasMany(Cart::class, "idUser");
    }
}
