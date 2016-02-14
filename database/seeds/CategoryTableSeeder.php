<?php

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Category::create([
			'id'		   => 0,
            'name'         => "All Wares" 
        ]);

        $category_names = array(
            "Furniture",
            "Home Appliances",
            "Vehicles",
            "Study Materials",
            "Books"
        );
        foreach($category_names as $category)
        {
            Category::create([
                'name' => $category
            ]);
        }
    }
}
