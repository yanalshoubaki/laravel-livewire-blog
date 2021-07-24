<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition ()
    {
        return ['post_title' => $this->faker->title(), 'post_content' => $this->faker->realText(), 'post_slug' => Str::slug($this->faker->title()), 'post_image' => $this->faker->image(), // password
            'author_id' => 1, 'category_id' => 1, 'post_status' => 1];
    }
}
