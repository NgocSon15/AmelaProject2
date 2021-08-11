<?php

namespace Database\Seeders;

use App\Models\Config;
use Illuminate\Database\Seeder;

class ConfigTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $config = new Config();
        $config->logo = 'images/applogo.png';
        $config->hotline = '+84 348 310 846';
        $config->email = 'ngocson1562k@gmail.com';
        $config->banner1_id = 12;
        $config->banner2_id = 9;
        $config->banner3_id = 2;
        $config->banner4_id = 17;
        $config->save();
    }
}
