<?php

namespace App\Models;

use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post {
    public $title;
    public $excerpt;
    public $date;
    public $body;
    public $slug;

    public function __construct($title, $excerpt, $date, $body, $slug) {
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->body = $body;
        $this->slug = $slug;
    }

    public static function all() {
        // get all files in posts directory and place into a collection
        return collect(File::files(resource_path("posts")))
        // loop through each file and parse the yaml front matter document
        ->map(fn($file) => YamlFrontMatter::parseFile($file))
        // loop through each document and create a new Post object
        ->map(fn($document) => new Post(
                $document->title,
                $document->excerpt,
                $document->date,
                $document->body(),
                $document->slug
            ));
    }

    public static function find($slug) {
        return static::all()->firstWhere('slug', $slug);
    }
}