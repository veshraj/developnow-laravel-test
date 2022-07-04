<?php

namespace Tests\Feature\Modules\Product;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Modules\Product\Models\ProductCategory;
use Tests\TestCase;

class ProductCategoryFeatureTest extends TestCase
{
    use RefreshDatabase;
    
    private $testData = [
        [
            'name' => 'Electronics',
        ], [
            'name' => 'Beverages',
        ],
        [
            'name' => 'Liquor',
        ],
    ];
    
    public function test_Product_list_payload_node_responses()
    {
        $response = $this->get('api/v1/product-categories');
        $response->assertStatus(200);
        $responseBody = $response->json();
        $this->assertArrayHasKey('payload', $responseBody);
        $this->assertArrayHasKey('meta_data', $responseBody);
        $this->assertArrayHasKey('pagination', $responseBody['meta_data']);
    }
    
    public function test_Product_create_responses()
    {
        // empty validation error
        $response = $this->post('/api/v1/product-categories', ['name' => '']);
        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
        $errors = $response->json();
        $this->assertArrayHasKey('name', $errors['errors']);
        // proper data
        $response = $this->post('/api/v1/product-categories', $this->testData[0]);
        $response->assertStatus(Response::HTTP_CREATED);
        $responseBody = $response->json();
        $this->arrayHasKey('payload', $responseBody);
    }
    
    public function test_product_category_detail()
    {
        $productCategory = ProductCategory::first();
        $response        = $this->get(sprintf('/api/v1/product-categories/%d', $productCategory->id));
        $response->assertStatus(Response::HTTP_OK);
        
        $response = $this->get(sprintf('/api/v1/product-categories/%d', 1111));
        $response->assertStatus(Response::HTTP_NOT_FOUND);
    }
    
    public function test_product_categories_update_responses()
    {
        $productCategory       = ProductCategory::first();
        $productCategory->name = 'hello world';
        $response              = $this->put(sprintf('/api/v1/product-categories/%d', $productCategory->id),
            $productCategory->toArray());
        
        $response->assertStatus(Response::HTTP_OK);
    }
    
    public function test_Product_delete_responses()
    {
        $productCategory = ProductCategory::latest()->first();
        $response        = $this->delete(sprintf('/api/v1/product-categories/%d', $productCategory->id));
        
        $response->assertStatus(Response::HTTP_ACCEPTED);
        
        $response = $this->get(sprintf('/api/v1/product-categories/%d', $productCategory->id));
        $response->assertStatus(Response::HTTP_NOT_FOUND);
    }
    
}