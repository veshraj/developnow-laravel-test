<?php

namespace Tests\Feature\Modules\Client;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Modules\Client\Models\Client;
use Tests\TestCase;

class ClientFeatureTest extends TestCase
{
    use RefreshDatabase;
    
    private $testData = [
        [
            'name'                  => 'John Doe feature',
            'email'                 => 'johndoefeature@gmail.com',
            'mobile'                => '907898978971',
            'password'              => 'johnFeature@Doe123',
            'password_confirmation' => 'johnFeature@Doe123',
        ],
        [
            'name'                  => 'John Toe Feature',
            'email'                 => 'johnToeFeature@gmail.com',
            'mobile'                => '987898978972',
            'password'              => 'johnFeature@Toe321',
            'password_confirmation' => 'johnFeature@Toe321',
        ],
    ];
    
    public function test_client_list_payload_node_responses()
    {
        $response = $this->get('api/v1/clients');
        
        $response->assertStatus(200);
    }
    
    public function test_client_create_responses()
    {
        $response = $this->post('/api/v1/clients', []);
        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
        $responseBody = $response->json();
        $this->assertArrayHasKey('errors', $responseBody);
        $this->assertArrayHasKey('name', $responseBody['errors']);
        $this->assertArrayHasKey('email', $responseBody['errors']);
        $this->assertArrayHasKey('mobile', $responseBody['errors']);
        
        
        $response = $this->post('/api/v1/clients', $this->testData[0]);
        $response->assertStatus(Response::HTTP_CREATED);
    }
    
    public function test_client_detail_responses()
    {
        $client   = Client::first();
        $response = $this->get(sprintf('/api/v1/clients/%d', $client->id));
        
        $response->assertStatus(200);
        
        $response = $this->get(sprintf('/api/v1/clients/%d', 1111));
        $response->assertStatus(Response::HTTP_NOT_FOUND);
    }
    
    public function test_Client_update_responses()
    {
        $client         = Client::first();
        $client->mobile = "9879098798";
        $response       = $this->put(sprintf('/api/v1/clients/%d', $client->id), $client->toArray());
        
        $response->assertStatus(Response::HTTP_OK);
    }
    
    public function test_Client_delete_responses()
    {
        $client   = Client::latest()->first();
        $response = $this->delete(sprintf('/api/v1/clients/%d', $client->id));
        
        $response->assertStatus(Response::HTTP_ACCEPTED);
        
        $response = $this->get(sprintf('/api/v1/clients/%d', $client->id));
        $response->assertStatus(Response::HTTP_NOT_FOUND);
    }
    
}