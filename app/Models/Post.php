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
    // protected $fillable = ['title', 'excerpt', 'body'];

    public function category() {
        // hasOne, hasMany, belongsTo, belongsToMany
        return $this->belongsTo(Category::class);
    }

    public function user() {
        // hasOne, hasMany, belongsTo, belongsToMany
        return $this->belongsTo(User::class);
    }
}
