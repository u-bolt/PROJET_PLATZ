<?php

namespace Database\Factories;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {   
        $randomNumber = $this->faker->numberBetween(150, 250);
        return [
            'content' => $this->faker->text($randomNumber),
            'created_at' => $this->faker->dateTimeBetween('2018-01-01'),
            'updated_at' => NULL
        ];
    }
}
