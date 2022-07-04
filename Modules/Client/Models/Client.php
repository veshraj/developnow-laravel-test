<?php

namespace Modules\Client\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Constants\DBTables;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Hash;

class Client extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $table = DBTables::CLIENTS;
    /**
     * The attributes that are mass assignable.
     *
     * @var  array
     */
    protected $fillable = ['name', 'email', 'mobile', 'password', 'remember_token', 'verified_at',];
    
    protected $hidden = ['created_at', 'updated_at',];
    
    protected function password()
    : Attribute
    {
        return Attribute::make(
            set: fn($value) => Hash::make($value),
        );
    }
    
}
