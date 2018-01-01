<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Let's truncate our existing records to start from scratch.
        Product::truncate();

        $faker = \Faker\Factory::create();

        // And now, let's create a few articles in our database:
        for ($i = 0; $i < 50; $i++) {
            Product::create([
                'product_name' => "Product-".$i,
                'description' => "Product-".$i." Good Product",
                'price' => 1000,
                'offer' => 10,
                'category_id' => 1,
                'p_status' => 'A',
            ]);
        }
    }
}
