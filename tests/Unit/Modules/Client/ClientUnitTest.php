<?php

namespace Tests\Unit\Modules\Client;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;
use Modules\Client\Models\Client;

class ClientUnitTest extends TestCase
{
    use RefreshDatabase;
    
    private $testData = [
        [
            'name'     => 'John Doe',
            'email'    => 'johndoe@gmail.com',
            'mobile'   => '90789897897',
            'password' => 'john@Doe123',
        ],
        [
            'name'     => 'John Toe',
            'email'    => 'johnToe@gmail.com',
            'mobile'   => '98789897897',
            'password' => 'john@Toe321',
        ],
    ];
    
    public function test_create_client_model()
    {
        $client = Client::create($this->testData[0]);
        $client = Client::find($client->id);
        $this->assertTrue($this->testData[0]['name'] == $client->name);
        $this->assertEquals($this->testData[0]['email'], $client->email);
        $this->assertEquals($this->testData[0]['mobile'], $client->mobile);
        $this->assertNotEmpty($client->created_at);
        $this->assertNotEmpty($client->updated_at);
        $this->assertNull($client->deleted_at);
        $this->assertTrue(Hash::check($this->testData[0]['password'], $client->password));
    }
    
    
    public function test_fetch_all_client_model()
    {
        Client::create($this->testData[1]);
        $clients = Client::all();
        $this->assertTrue($clients->count() == 2);
    }
    
    public function test_detail_client_model_test()
    {
        $client = Client::find(1);
        $this->assertEquals($client->name, $this->testData[0]['name']);
        $this->assertEquals($client->email, $this->testData[0]['email']);
        $this->assertEquals($client->mobile, $this->testData[0]['mobile']);
    }
    
    public function test_update_product_model()
    {
        $client        = Client::find(1);
        $client->email = 'doejohn@gmain.com';
        $client->save();
        $client = Client::find(1);
        $this->assertEquals($client->email, 'doejohn@gmain.com');
        $this->assertNotEquals($client->email, 'johndoe@gmail.com');
    }
    
    
    public function test_delete_client_model()
    {
        $client = Client::find(2);
        $client->delete();
        $client = Client::all();
        $this->assertNotTrue($client->count() == count($this->testData));
    }
    
    
}