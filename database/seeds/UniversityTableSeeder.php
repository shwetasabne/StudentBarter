<?php

use Illuminate\Database\Seeder;
use App\Models\University;

class UniversityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        
//        University::truncate();

        foreach(range(1,100) as $index)
        {
            University::create([
                'name'         => $faker->company, 
                'city'         => $faker->city,
            ]);
        }
    
    }
}
