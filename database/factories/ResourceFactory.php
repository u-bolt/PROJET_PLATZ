<?php

namespace Database\Factories;

use App\Models\Resource;
use Illuminate\Database\Eloquent\Factories\Factory;

class ResourceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Resource::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {   
        $randomNumber = $this->faker->numberBetween(2, 3);
        return [
            'name' => $this->faker->words($randomNumber, true),
            'description' => $this->faker->paragraphs(5, true),
            'image' => NULL,
            'file' => NULL,
            'weight' => $this->faker->randomFloat(2, 0, 500),
            'created_at' => $this->faker->dateTimeBetween('2018-01-01'),
            'updated_at' => NULL
        ];
    }
}
