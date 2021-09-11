<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory;
    protected $table = 'books';


    protected $fillable = ['name','author','publisher','isbn','price','quantity','pages','edition'];
}
