<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderTrackingPerso extends Model
{
    protected $table = 'order_tracking_perso';
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(UsersMiroMiro::class, 'idUser');
    }

    public function product()
    {
        return $this->belongsTo(PersonalizedGlasses::class, 'idProduct', 'ID');
    }
}
