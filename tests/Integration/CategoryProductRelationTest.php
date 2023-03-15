<?php

namespace Tests\Integration;

use Tests\TestCase;

use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoryProductRelationTest extends TestCase 
{

    use RefreshDatabase;

    public function test_category_product_relation():void 
    {
        // create a category entry and assign model to category variable
        $category = \Facades\App\Models\Category::create(['name'=>'Demo','description'=>'Demo']);

        // create a product entry and assign model to product variable
        $product = \Facades\App\Models\Product::create(['name'=>'Demo Product','description'=>'Demo Product','price'=>10.00,'sale_price'=>0.00,'quantity'=>10,'status'=>'active']);
        
        // attach product with category
        $category->products()->attach($product);

        // get first product from category relation
        $categoryProduct = $category->products()->first();

        // match both product are same
        $this->assertEquals($product->id, $categoryProduct->id);
    }

}