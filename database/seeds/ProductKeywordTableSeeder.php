<?php

use Illuminate\Database\Seeder;
use App\Models\ProductKeyword;

class ProductKeywordTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        
        ProductKeyword::truncate();

        //For each product we will be inserting random number of keywords
        foreach(range(1,50) as $product_index)
        {
            $num_entries = rand(0,4);
            foreach(range(0, $num_entries) as $entries)
            {
                ProductKeyword::create([
                    'product_id'   => $product_index, 
                    'keyword_id'   => rand(1,25)
                ]);
            } 
        }
    }
}
