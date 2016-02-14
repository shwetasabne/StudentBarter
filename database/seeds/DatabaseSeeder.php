<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

         $this->call(UniversityTableSeeder::class);
         $this->call(CategoryTableSeeder::class);

         if(App::environment('local', 'staging', 'qa'))
         {
             $this->call(UserTableSeeder::class);
             $this->call(ProductTableSeeder::class);
             $this->call(KeywordTableSeeder::class);
             $this->call(ProductImageTableSeeder::class);
             $this->call(ProductKeywordTableSeeder::class);
             $this->call(ProductCategoryTableSeeder::class);
         }
        Model::reguard();
    }
}
