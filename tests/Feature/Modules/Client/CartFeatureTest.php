<?php

namespace Tests\Feature\Modules\Client;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Http\Response;
use Modules\Client\Models\Cart;
use Modules\Client\Models\Client;
use Modules\Product\Models\Product;
use Tests\TestCase;

class CartFeatureTest extends TestCase
{
    use RefreshDatabase;
    
    private $testData = [
        [
            'quantity' => 15,
        ],
    ];
    
    public function test_cart_list_responses()
    {
        $response = $this->get('api/v1/carts');
        
        $response->assertStatus(Response::HTTP_OK);
    }
    
    public function test_cart_create_responses()
    {
        $response = $this->post('/api/v1/carts', []);
        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
        
        $responseBody = $response->json();
        $this->assertArrayHasKey('errors', $responseBody);
        $this->assertArrayHasKey('product_id', $responseBody['errors']);
        $this->assertArrayHasKey('client_id', $responseBody['errors']);
        $this->assertArrayHasKey('quantity', $responseBody['errors']);
        $this->assertArrayHasKey('price', $responseBody['errors']);
        
        $client  = Client::first();
        $product = Product::first();
        $cart    = [
            'client_id'  => $client->id,
            'product_id' => $product->id,
            'quantity'   => $this->testData[0]['quantity'],
            'price'      => $product->price,
        ];
        
        $response = $this->post('/api/v1/carts', $cart);
        $response->assertStatus(Response::HTTP_CREATED);
    }
    
    public function test_cart_detail_responses()
    {
        $cart     = Cart::first();
        $response = $this->get(sprintf('/api/v1/carts/%d', $cart->id));
        
        $response->assertStatus(Response::HTTP_OK);
        
        $response = $this->get(sprintf('/api/v1/carts/%d', 1111));
        $response->assertStatus(Response::HTTP_NOT_FOUND);
    }
    
    public function test_cart_update_responses()
    {
        $cart           = Cart::first();
        $cart->quantity = 10;
        $response       = $this->put(sprintf('/api/v1/carts/%d', $cart->id), $cart->toArray());
        $response->assertStatus(Response::HTTP_OK);
    }
    
    public function test_cart_delete_responses()
    {
        $cart     = Cart::latest()->first();
        $response = $this->delete(sprintf('/api/v1/carts/%d', $cart->id));
        $response->assertStatus(Response::HTTP_ACCEPTED);
        
        $response = $this->get(sprintf('/api/v1/carts/%d', $cart->id));
        $response->assertStatus(Response::HTTP_NOT_FOUND);
    }
}