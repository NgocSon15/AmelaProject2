<?php

namespace App\Repositories\Impl;

use App\Models\Car;
use App\Repositories\CarRepositoryImpl;
use App\Repositories\Eloquent\EloquentRepository;

class CarRepository extends EloquentRepository implements CarRepositoryImpl
{
    public function getModel()
    {
        return Car::class;
    }
}
