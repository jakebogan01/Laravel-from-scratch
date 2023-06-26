<?php

namespace App\Models;

use Illuminate\Support\Facades\File;

class Post {
     public static function all() {
          // reads all files in resources/posts
          $files = File::files(resource_path("posts/"));

          // array_map loops through each file and returns the contents of each file
          return array_map(function ($file) {
              // get the contents of each file
              return $file->getContents();
          }, $files);
     }

     public static function find($slug) {
          // get path to html resources/posts
          $pathToPost = resource_path("posts/{$slug}.html");

          // check if file exists if not redirect to home page
          if (! file_exists($pathToPost)) {
              throw new ModelNotFoundException();
          }

          // cache the contents of the file for 2 minutes
          return cache()->remember("posts.{$slug}", now()->addMinutes(2), function () use ($pathToPost) {
              // fetch the contents of the file
              return file_get_contents($pathToPost);
          });
     }
}