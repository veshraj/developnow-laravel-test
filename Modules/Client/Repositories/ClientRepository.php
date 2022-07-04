<?php

namespace Modules\Client\Repositories;

use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Client\Repositories\Contracts\ClientRepositoryInterface;
use Modules\Client\Models\Client;
use Modules\Client\Repositories\Criterias\ClientCriteria;
use Modules\Client\Repositories\Resources\ClientResource;

class ClientRepository extends BaseRepository implements ClientRepositoryInterface
{
    
    protected Client $model;
    
    public function model()
    : Client
    {
        return new Client();
    }
    
    
    public function resource(Model $instance)
    : JsonResource {
        return new ClientResource($instance);
    }
    
}
