<?php

use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\Model\Post;
use App\Model\Category;
use App\User;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 30; $i++) {
            $newPost = new Post();
            $newPost->title = $faker->word();
            $newPost->content = $faker->paragraphs(4, true);
            $newPost->slug = Str::slug($newPost->title . '-' . $i, '-');
            $newPost->user_id = User::inRandomOrder()->first()->id;
            $newPost->category_id = Category::inRandomOrder()->first()->id;
            $newPost->save();
        }
    }
}
