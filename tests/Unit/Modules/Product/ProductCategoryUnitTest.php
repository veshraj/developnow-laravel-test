<?php

namespace Tests\Unit\Modules\Product;

use Modules\Product\Models\Product;
use Modules\Product\Models\ProductCategory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductCategoryUnitTest extends TestCase
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
    
    public function test_create_product_category_model()
    {
        $productCategory = ProductCategory::create($this->testData[0]);
        $this->assertTrue($this->testData[0]['name'] == $productCategory->name);
        $this->assertNotEmpty($productCategory->created_at);
        $this->assertNotEmpty($productCategory->updated_at);
    }
    
    public function test_fetch_all_product_category_model()
    {
        ProductCategory::create($this->testData[1]);
        ProductCategory::create($this->testData[2]);
        $productCategories = ProductCategory::all();
        $this->assertTrue($productCategories->count() == 3);
    }
    
    
    public function test_detail_product_category_model_test()
    {
        $productCategory = ProductCategory::find(1);
        $this->assertTrue($productCategory->id == 1);
        $this->assertTrue($productCategory->name == $this->testData[0]['name']);
    }
    
    
    public function test_update_product_category_model()
    {
        $data                  = [
            'name' => 'Electrical and Electronics',
        ];
        $productCategory       = ProductCategory::find(1);
        $productCategory->name = $data['name'];
        $productCategory->save();
        $this->assertTrue($productCategory->name == $data['name']);
    }
    
    
    public function test_delete_product_category_model()
    {
        $productCategory = ProductCategory::find(3);
        $productCategory->delete();
        $this->assertNotNull($productCategory->deleted_at);
        $productCategory = ProductCategory::all();
        $this->assertNotTrue($productCategory->count() == count($this->testData));
    }
    
    
}