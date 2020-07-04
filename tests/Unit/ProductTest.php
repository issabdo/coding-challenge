<?php

namespace Tests\Unit;

use App\Product;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;


class ProductTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {

        $data = [
            'name' => "New Product",
            'description' => "This is a product",
            'price' => 10,
            'image' => "https://images.pexels.com/photos/1000084/pexels-photo-1000084.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"
        ];
        $product = factory(Product::class)->create();
        $response = $this->actingAs($product, 'api')->json('POST', '/api/products',$data);
//        $response->assertStatus(200);
    }
}
