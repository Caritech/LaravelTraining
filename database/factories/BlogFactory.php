<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Blog;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Foundation\Inspiring;

class BlogFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Blog::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => Inspiring::quote(),
            'content' => Inspiring::quote(),
            'user_id' => User::all()->random()->id,
        ];
    }
}
//Blog::factory()->count(100)->create()
