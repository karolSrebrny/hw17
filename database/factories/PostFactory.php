<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Psy\Util\Str;

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
            'title' => $this->faker->unique()->sentence(rand(5,10)),
            'body' => $this->faker->paragraph(rand(10,50)),
            'category_id'=>Category::factory() ,
            'user_id'=>User::factory(),
            'remember_token'=>\Illuminate\Support\Str::random(10),


        ];
    }
}
