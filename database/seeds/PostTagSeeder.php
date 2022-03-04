<?php

use Illuminate\Database\Seeder;
use App\Model\Tag;
use App\Model\Post;

class PostTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = Tag::all();

        foreach ($tags as $tag) {
            $posts = Post::inRandomOrder()->limit(3)->get();
            $tag->posts()->sync($posts);
        }
    }
}
