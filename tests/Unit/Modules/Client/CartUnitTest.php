<?php

namespace Tests\Unit\Modules\Client;

use Modules\Client\Models\Cart;
use Modules\Client\Models\Client;
use Modules\Product\Models\Product;
use PHPUnit\Framework\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CartUnitTest extends TestCase
{
    use RefreshDatabase;
    
    private $testData = [
        [
            'quantity' => 5,
        ],
        [
            'quantity' => 5,
        ],
    ];
    
    public function test_create_cart_model_test()
    {
        $client  = Client::first();
        $product = Product::first();
        $cart    = Cart::create([
            'client_id'  => $client->id,
            'product_id' => $product->id,
            'quantity'   => $this->testData[0]['quantity'],
            'price'      => $product->price,
        ]);
        $this->assertEquals($product->id, $cart->product_id);
        $this->assertEquals($client->id, $cart->client_id);
        $this->assertEquals($product->price, $cart->price);
        $this->assertEquals($cart->quantity, $this->testData[0]['quantity']);
        $this->assertNotEmpty($client->created_at);
        $this->assertNotEmpty($client->updated_at);
    }
    
    public function test_fetch_all_cart_model()
    {
        $client  = Client::first();
        $product = Product::latest()->first();
        Cart::create([
            'client_id'  => $client->id,
            'product_id' => $product->id,
            'quantity'   => $this->testData[0]['quantity'],
            'price'      => $product->price,
        ]);
        
        $carts = Cart::all();
        $this->assertTrue($carts->count() == 2);
    }
    
    
    public function test_detail_cart_model_test()
    {
        $product = Cart::first();
        $this->assertNotNull($product->product_id);
        $this->assertNotNull($product->client_id);
        $this->assertIsNumeric($product->quantity);
        $this->assertIsNumeric($product->price);
    }
    
    
    public function test_update_cart_model_test()
    {
        $cart           = Cart::first();
        $cart->quantity = 10;
        $cart->save();
        $cart = Cart::first();
        $this->assertEquals($cart->quantity, 10);
    }
    
    public function test_delete_cart_model_test()
    {
        $cart = Cart::latest()->first();
        $cart->delete();
        $cart = Cart::all();
        $this->assertNotTrue($cart->count() == count($this->testData));
    }
    
    
}