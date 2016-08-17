<?php

use CodeCommerce\Products;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProductTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('products')->truncate();

        factory('CodeCommerce\Products', 40)->create();

    }
}
