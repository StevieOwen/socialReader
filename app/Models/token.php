<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class token extends Model
{   
    protected $primaryKey='token_id';
    protected $fillable = ['token_id','token','token_used','token_expiresat', 'cust_id'];
    /** @use HasFactory<\Database\Factories\TokenFactory> */
    use HasFactory;
}
