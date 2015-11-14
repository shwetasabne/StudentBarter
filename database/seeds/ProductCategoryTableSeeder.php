<?php

use Illuminate\Database\Seeder;
use App\Models\ProductCategory;

class ProductCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        
        ProductCategory::truncate();

        //For each product we will be inserting random number of keywords
        foreach(range(1,50) as $product_index)
        {
            $num_entries = rand(0,7);
            foreach(range(0, $num_entries) as $entries)
            {
                ProductCategory::create([
                    'product_id'   => $product_index, 
                    'category_id'   => rand(1,25)
                ]);
            } 
        }
    }
}
