<?php

namespace Tests\Feature\Modules\Product;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Modules\Product\Models\Product;
use Modules\Product\Models\ProductCategory;
use Tests\TestCase;

class ProductFeatureTest extends TestCase
{
//    use RefreshDatabase;
    
    private $testData = [
        [
            'name'            => 'M2 Mac Book Air',
            'price'           => 1999.67,
            'category_id'     => 1,
            'image'           => 'https://s.yimg.com/uu/api/res/1.2/f25G1DClR1Ab3cOalrbZQA--~B/aD0xMjIwO3c9MjAwMDthcHBpZD15dGFjaHlvbg--/https://s.yimg.com/os/creatr-uploaded-images/2022-06/6efd6ab0-e5d1-11ec-be6c-b2fe04160b9a.cf.webp',
            'inventory_stock' => 5,
        ],
        [
            'name'            => 'M1 Max Mac Book Pro',
            'price'           => 3499.09,
            'category_id'     => 1,
            'image'           => 'https://s.yimg.com/uu/api/res/1.2/f25G1DClR1Ab3cOalrbZQA--~B/aD0xMjIwO3c9MjAwMDthcHBpZD15dGFjaHlvbg--/https://s.yimg.com/os/creatr-uploaded-images/2022-06/6efd6ab0-e5d1-11ec-be6c-b2fe04160b9a.cf.webp',
            'inventory_stock' => 5,
        ],
    ];
    
    public function test_Product_list_payload_node_responses()
    {
        $response = $this->get('/api/v1/products');
        $response->assertStatus(200);
        $responseBody = $response->json();
        $this->assertArrayHasKey('payload', $responseBody);
        $this->assertArrayHasKey('meta_data', $responseBody);
        $this->assertArrayHasKey('pagination', $responseBody['meta_data']);
    }
    
    public function test_product_create_responses()
    {
        $response = $this->post('/api/v1/products', []);
        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
        $responseBody = $response->json();
        $this->assertArrayHasKey('errors', $responseBody);
        $this->assertArrayHasKey('name', $responseBody['errors']);
        $this->assertArrayHasKey('price', $responseBody['errors']);
        $this->assertArrayHasKey('category_id', $responseBody['errors']);
        
        $response = $this->post('/api/v1/products', ['name' => '123', 'price' => 34.08, 'category_id' => 9]);
        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
        $responseBody = $response->json();
        $this->assertArrayHasKey('errors', $responseBody);
        $this->assertArrayHasKey('category_id', $responseBody['errors']);
        
        $product                          = ProductCategory::all()->where('name', 'Computers and Laptops')->first();
        $this->testData[0]['category_id'] = $product->id;
        
        $response = $this->post('api/v1/products', $this->testData[0]);
        $response->assertStatus(Response::HTTP_CREATED);
    }
    
    public function test_product_detail_responses()
    {
        $response = $this->get(sprintf('api/v1/products/%s', 1));
        
        $response->assertStatus(Response::HTTP_OK);
        
        $response = $this->get(sprintf('/api/v1/products/%d', 1111));
        $response->assertStatus(Response::HTTP_NOT_FOUND);
    }
    
    public function test_product_delete_responses()
    {
        $product  = Product::latest()->first();
        $response = $this->delete(sprintf('api/v1/products/%d', $product->id));
        
        $response->assertStatus(Response::HTTP_ACCEPTED);
        
        $response = $this->get(sprintf('/api/v1/products/%d', $product->id));
        $response->assertStatus(Response::HTTP_NOT_FOUND);
    }
    
    
    public function test_product_update_responses()
    {
        $product = ProductCategory::all()->where('name', 'Computers and Laptops')->first();
        
        $product        = Product::first();
        $product->price = 2709.09;
        
        $response = $this->put(sprintf('api/v1/products/%s', $product->id), $product->toArray());
        $response->assertStatus(Response::HTTP_OK);
        $responseBody = $response->json();
        $this->assertEquals($responseBody['payload']['price'], $product->price);
    }
    
    
}