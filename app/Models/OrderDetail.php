<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $table = 'orderdetails';

    public function orders()
    {
        return $this->belongsTo(Order::class);
    }

    public function cars()
    {
        return $this->belongsTo(Car::class);
    }
}
