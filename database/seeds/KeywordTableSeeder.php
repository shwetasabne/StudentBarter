<?php

use Illuminate\Database\Seeder;
use App\Models\Keyword;

class KeywordTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        foreach(range(1,25) as $index)
        {
            Keyword::create([
                'keyword' => $faker->word, 
            ]);
        }
    }
}
