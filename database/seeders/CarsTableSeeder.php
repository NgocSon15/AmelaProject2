<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Car;

class CarsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $car = new Car();
        $car->name = 'Vinfast Lux SA2.0';
        $car->price = 1552090000;
        $car->description = 'Xe Vinfast';
        $car->brand_id = 1;
        $car->image = 'images/bedPCVOTjD4WTnKCnFf8HAKJrD6RvO8O1jWQnvZw.jpg';
        $car->save();

        $car = new Car();
        $car->name = 'Vinfast President';
        $car->price = 4600000000;
        $car->description = 'Xe Vinfast';
        $car->brand_id = 1;
        $car->image = 'images/bedPCVOTjD4WTnKCnFf8HAKJrD6RvO8O1jWQnvZw.jpg';
        $car->save();

        $car = new Car();
        $car->name = 'Vinfast Fadil';
        $car->price = 1552090000;
        $car->description = 'Xe Vinfast';
        $car->brand_id = 1;
        $car->image = 'images/bedPCVOTjD4WTnKCnFf8HAKJrD6RvO8O1jWQnvZw.jpg';
        $car->save();

        $car = new Car();
        $car->name = 'McLaren 720S';
        $car->price = 6700000000;
        $car->description = 'Siêu xe McLaren';
        $car->brand_id = 2;
        $car->image = 'images/bedPCVOTjD4WTnKCnFf8HAKJrD6RvO8O1jWQnvZw.jpg';
        $car->save();

        $car = new Car();
        $car->name = 'Vinfast VF e34';
        $car->price = 690000000;
        $car->description = 'Xe Vinfast';
        $car->brand_id = 1;
        $car->image = 'images/bedPCVOTjD4WTnKCnFf8HAKJrD6RvO8O1jWQnvZw.jpg';
        $car->save();

        $car = new Car();
        $car->name = 'McLaren P1';
        $car->price = 55254000000;
        $car->description = 'Siêu xe McLaren';
        $car->brand_id = 2;
        $car->image = 'images/bedPCVOTjD4WTnKCnFf8HAKJrD6RvO8O1jWQnvZw.jpg';
        $car->save();
    }
}
