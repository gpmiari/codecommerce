<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent;
use CodeCommerce\User;

class UserTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('users')->truncate();

        factory('CodeCommerce\User')->create([
            'name' => 'Guilherme Miari',
            'email' => 'gpmiari@gmail.com',
            'password' => Hash::make('123456')
        ]);

        factory('CodeCommerce\User', 10)->create();
    }
}
