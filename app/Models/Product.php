<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = ['nom', 'image', 'prix', 'description', "forme", "taille", "genre"];
    public $timestamps = false;
}
