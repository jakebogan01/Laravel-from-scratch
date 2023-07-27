<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // removes error when seeding duplicates because unique has been assigned in the migrations
        User::truncate();
        Post::truncate();
        Category::truncate();

        // make fake data for all user columns besides the ones below
        $user = User::factory()->create([
           'name' => 'Jake Bogan'
        ]);
        // associate posts with user above
        Post::factory(5)->create([
            'user_id' => $user->id
        ]);
//         $user = User::factory()->create();

//         $personal = Category::create([
//             'name' => 'Personal',
//             'slug' => 'personal',
//         ]);
//        $family = Category::create([
//            'name' => 'Family',
//            'slug' => 'family',
//        ]);
//        $work = Category::create([
//            'name' => 'Work',
//            'slug' => 'work',
//        ]);
//        Post::create([
//            'user_id' => $user->id,
//            'category_id' => $family->id,
//            'slug' => 'my-first-post',
//            'title' => 'My First Post',
//            'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
//            'body' => '<p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos similique iusto fuga, laborum architecto temporibus, corrupti expedita nihil voluptate modi obcaecati libero recusandae? Suscipit quo exercitationem placeat molestiae eveniet enim in quisquam error et sint facere officia debitis quod modi obcaecati saepe culpa corrupti consectetur veniam fugiat dicta, harum laboriosam eius nemo. Sed, nesciunt illo? Consequuntur est aperiam doloribus omnis consequatur. Adipisci voluptatum, quia vero facilis quae ut aut perferendis est iste! Veritatis quos eum ipsam? Dolore voluptate quae beatae! Voluptas, qui, voluptatem esse rerum voluptatum praesentium iure labore libero a inventore fugiat, recusandae asperiores doloribus repudiandae odit sequi fugit!</p>',
//        ]);
//
//        Post::create([
//            'user_id' => $user->id,
//            'category_id' => $work->id,
//            'slug' => 'my-second-post',
//            'title' => 'My Second Post',
//            'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
//            'body' => '<p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos similique iusto fuga, laborum architecto temporibus, corrupti expedita nihil voluptate modi obcaecati libero recusandae? Suscipit quo exercitationem placeat molestiae eveniet enim in quisquam error et sint facere officia debitis quod modi obcaecati saepe culpa corrupti consectetur veniam fugiat dicta, harum laboriosam eius nemo. Sed, nesciunt illo? Consequuntur est aperiam doloribus omnis consequatur. Adipisci voluptatum, quia vero facilis quae ut aut perferendis est iste! Veritatis quos eum ipsam? Dolore voluptate quae beatae! Voluptas, qui, voluptatem esse rerum voluptatum praesentium iure labore libero a inventore fugiat, recusandae asperiores doloribus repudiandae odit sequi fugit!</p>',
//        ]);
//
//        Post::create([
//            'user_id' => $user->id,
//            'category_id' => $personal->id,
//            'slug' => 'my-third-post',
//            'title' => 'My Third Post',
//            'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
//            'body' => '<p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos similique iusto fuga, laborum architecto temporibus, corrupti expedita nihil voluptate modi obcaecati libero recusandae? Suscipit quo exercitationem placeat molestiae eveniet enim in quisquam error et sint facere officia debitis quod modi obcaecati saepe culpa corrupti consectetur veniam fugiat dicta, harum laboriosam eius nemo. Sed, nesciunt illo? Consequuntur est aperiam doloribus omnis consequatur. Adipisci voluptatum, quia vero facilis quae ut aut perferendis est iste! Veritatis quos eum ipsam? Dolore voluptate quae beatae! Voluptas, qui, voluptatem esse rerum voluptatum praesentium iure labore libero a inventore fugiat, recusandae asperiores doloribus repudiandae odit sequi fugit!</p>',
//        ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
