<?php

namespace Database\Factories;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

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
        return [
            'title' => $this->faker->sentence,
            'body' => $this->faker->paragraph,
        ];
    }

    /**
    * Indicate that the user is suspended.
    *
    * @return \Illuminate\Database\Eloquent\Factories\Factory
    */
    public function published()
    {
    return $this->state(function (array $attributes) {
        return [
            'published_at' => Carbon::now(),
        ];
    });
}
}
