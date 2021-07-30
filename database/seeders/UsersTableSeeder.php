<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'Nguyễn Ngọc Sơn';
        $user->username = 'admin';
        $user->password = '123456';
        $user->role = 'admin';
        $user->save();

        $user = new User();
        $user->name = 'Nguyễn Ngọc Sơn';
        $user->username = 'user';
        $user->password = '123456';
        $user->role = 'customer';
        $user->save();
    }
}
