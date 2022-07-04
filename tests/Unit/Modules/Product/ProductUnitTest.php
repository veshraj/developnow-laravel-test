<?php

namespace Tests\Unit\Modules\Product;

use Modules\Product\Models\Product;
use Modules\Product\Models\ProductCategory;
use PHPUnit\Framework\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductUnitTest extends TestCase
{
    use RefreshDatabase;
    
    private $category = [
        [
            'name' => 'Computers and Laptops',
        ], [
            'name' => 'Mobile, Tablets and Ipads',
        ],
    ];
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
    
    public function test_create_product_model()
    {
        $this->createProductCategoryes();
        $product = Product::create($this->testData[0]);
        $product = Product::find(1);
        $this->assertTrue($this->testData[0]['name'] == $product->name);
        $this->assertEquals($this->testData[0]['price'], $product->price);
        $this->assertIsFloat($product->price);
        $this->assertNotEmpty($product->created_at);
        $this->assertNotEmpty($product->updated_at);
        $this->assertNull($product->deleted_at);
    }
    
    public function createProductCategoryes()
    {
        ProductCategory::create($this->category[0]);
        ProductCategory::create($this->category[1]);
    }
    
    public function test_product_category_associated_with()
    {
        $product         = Product::find(1);
        $productCategory = ProductCategory::find($product->category_id);
        $this->assertEqualsCanonicalizing($productCategory, $product->productCategory);
    }
    
    public function test_fetch_all_product_model()
    {
        Product::create($this->testData[1]);
        $products = Product::all();
        $this->assertTrue($products->count() == 2);
    }
    
    public function test_detail_product_model_test()
    {
        $product = Product::find(1);
        $this->assertTrue($product->id == 1);
        $this->assertEquals($product->name, $this->testData[0]['name']);
        $this->assertEquals($product->name, $this->testData[0]['name']);
        $this->assertEquals($product->price, $this->testData[0]['price']);
    }
    
    
    public function test_update_product_model()
    {
        $data           = [
            'price' => 2199.89,
        ];
        $product        = Product::find(1);
        $product->price = $data['price'];
        $product->save();
        $product = Product::find(1);
        $this->assertEquals($product->price, $data['price']);
        $this->assertNotEquals($product->price, $this->testData[0]['price']);
    }
    
    
    public function test_delete_product_model()
    {
        $product = Product::find(2);
        $product->delete();
        $this->assertNotNull($product->deleted_at);
        $product = Product::all();
        $this->assertNotTrue($product->count() == count($this->testData));
    }
    
    
}