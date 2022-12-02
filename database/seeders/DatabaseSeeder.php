<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Jobs\UserAgent;
use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Queue\Jobs\Job;
use Illuminate\Support\Facades\DB;
use MaxMind\Db\Reader;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//        $users = \App\Models\User::factory(10)->create();
//        $categories = \App\Models\Category::factory(25)->create();
//        $posts = \App\Models\Post::factory(100)->make()->each(function ($post) use ($users,$categories) {
//            $post->user_id = $users->random()->id;
//            $post->category_id = $categories->random()->id;
//            $post->save();
//        });
//        $tags = Tag::factory(100)->create();
//        $posts->each(function ($post) use ($tags) {
//            $post->tags()->attach($tags->random(rand(5,10))->pluck('id'));
//            $post->save();
//        });
        for ($index = 0; $index < 10; $index++) {
            UserAgent::dispatch(fake()->ipv4,fake()->userAgent())->onQueue('parsing');
        }
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
