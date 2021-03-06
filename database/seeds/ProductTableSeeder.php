<?php

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        

        foreach(range(1,50) as $index)
        {
            Product::create([
                'title'                 => $faker->sentence, 
                'description'           => $faker->paragraph(4),
                'primary_image_path'    => 'main_image_'.rand(1,4).'.jpeg',
                'delivery'              => $faker->boolean(50),
                'pickup'                => $faker->boolean(50),
                'free'                  => $faker->boolean(50),
                'price'                 => $faker->numberBetween(0, 100),
                'user_id'               => rand(1,29),
				'university_id'			=> rand(2,149),
            ]);
        }
    
    }
}
