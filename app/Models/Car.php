<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $table = 'cars';

    public function carModel()
    {
        return $this->belongsTo(CarModel::class, 'carmodel_id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
