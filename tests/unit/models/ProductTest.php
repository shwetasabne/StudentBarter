<?php

use App\Models\Product;
use App\Models\ProductKeyword;
use App\Models\ProductCategory;

class ProductTest extends TestCase 
{
    /* Test getSearchedItems  */
    public function test_getSearchedItems()
    {
        /** Test 1 : tests method with all good inputs .. to be mocked later #TODO **/
        // Create 2 products as a setup
        $faker = Faker\Factory::create();
        for($i=0; $i< 2; $i++)
        {
            $input = array(
                'user_id'               => 1,
                'university_id'         => 20,
                'title'                 => $faker->sentence, 
                'description'           => $faker->paragraph(4),
                'primary_image_path'    => 'main_image_'.rand(1,4).'.jpeg',
                'delivery'              => 1,
                'pickup'                => 1,
                'free'                  => 1,
                'price'                 => 0
            );
            print_r($input);
            $product =  Product::create($input);
            ProductKeyword::create([
                    'product_id'   => $product->id,
                    'keyword_id'   => 10
                ]); 
            ProductKeyword::create([
                    'product_id'   => $product->id,
                    'keyword_id'   => 20
                ]); 
            ProductCategory::create([
                'product_id'   => $product->id,
                'category_id'  => 25
            ]);       

        }

        $whereIn['keyword_id'] = array(10, 20);
        $where['category_id'] = 25;
        $where['university_id'] = 20;
        $where['delivery'] = 1;
        $where['pickup'] = 1;
        $where['free'] = 1;
        $where['price'] = 0;
        $sort['products.updated_at'] = 'desc';
        
        $results = Product::getSearchedItems($where, $whereIn, $sort);
    } 
}
