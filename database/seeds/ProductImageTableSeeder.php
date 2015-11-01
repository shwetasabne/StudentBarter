<?php

use Illuminate\Database\Seeder;
use App\Models\ProductImage;

class ProductImageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        
        ProductImage::truncate();

        //For each product we will be inserting random number of keywords
        foreach(range(1,50) as $product_index)
        {
            $num_entries = rand(0,3);
            foreach(range(0, $num_entries) as $entries)
            {
                ProductImage::create([
                    'product_id'   => $product_index, 
                    'image_path'   => $faker->imageUrl(600,450)
                ]);
            } 
        }
    }
}
