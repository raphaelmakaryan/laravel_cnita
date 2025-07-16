<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderTracking extends Model
{
    protected $table = 'order_tracking';
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(UsersMiroMiro::class, 'idUser');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'idProduct', 'ID');
    }

}
