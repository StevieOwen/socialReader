<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Customer extends Authenticatable
{
    use HasApiTokens,Notifiable;

    protected $table = 'customers';
    protected $primaryKey = 'cust_id';
    protected $fillable = ['cust_id', 'cust_fullName', 'cust_email','cust_password','cust_emailverified'];
    public $incrementing = false; 
    protected $keyType = 'string';
    // public function getAuthPassword()
    // {
    //     return $this->cust_password;
    // }
        public function getAuthIdentifierName()
    {
        return 'cust_id';
    }

    /**
     * Tell Laravel where the password hash is stored
     */
    public function getAuthPassword()
    {
        return $this->cust_password;
    }
   
    /** @use HasFactory<\Database\Factories\CustomerFactory> */
    use HasFactory;
}
