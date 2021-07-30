<?php

namespace Database\Seeders;

use App\Models\CarModel;
use Illuminate\Database\Seeder;

class CarmodelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $carModel = new CarModel();
        $carModel->name = 'SUV';
        $carModel->save();

        $carModel = new CarModel();
        $carModel->name = 'Sedan';
        $carModel->save();

        $carModel = new CarModel();
        $carModel->name = 'Hatchback';
        $carModel->save();

        $carModel = new CarModel();
        $carModel->name = 'Crossover';
        $carModel->save();
    }
}
