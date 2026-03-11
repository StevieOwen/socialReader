<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $primaryKey = 'cust_id';
    protected $fillable = ['cust_id', 'cust_fullName', 'cust_email','cust_password','cust_emailverified'];
    /** @use HasFactory<\Database\Factories\CustomerFactory> */
    use HasFactory;
}
