<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // mass assignment
    // everything is fillable except what is in the array
    protected $guarded = ['id'];
    // only what is in the array is fillable
//    protected $fillable = ['title', 'excerpt', 'body'];
}
