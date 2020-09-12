<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use BlogArticleFaker\FakerProvider;


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
    public function definition()
    {
        $this->faker->addProvider(new FakerProvider($this->faker));

        $title = $this->faker->unique()->articleTitle;

        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'category_id' => Category::inRandomOrder()->first()->id,
            'title' => $title,
            'content' => $this->faker->articleContentMarkdown,
            'image' => '',
            'slug' => Str::slug($title),
            'active' => 1
        ];
    }
}
