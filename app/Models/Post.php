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

    // To prevent n+1 issues, author and category will load with the post
    protected $with = ['category', 'author'];

    // Custom query scope in case query gets more complex
    public function scopeFilter($query, array $filters) { // Post::newquery->filter()
        $query->when($filters['search'] ?? false, function($query, $search) {
            $query
                ->where('title', 'like', '%' . $search . '%')
                ->orWhere('body', 'like', '%' . $search . '%');
        });
    }

    public function category() {
        // hasOne, hasMany, belongsTo, belongsToMany
        return $this->belongsTo(Category::class);
    }

    public function author() {
        // hasOne, hasMany, belongsTo, belongsToMany
        // user_id is the foreign key
        return $this->belongsTo(User::class, 'user_id');
    }
}
