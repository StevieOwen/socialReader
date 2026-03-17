<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    /** @use HasFactory<\Database\Factories\BookFactory> */
    use HasFactory;
    protected $primaryKey='book_id';
    protected $fillable = ['book_id','book','book_title','book_author','cust_id','private','status','last_page','cover_path'];
}
