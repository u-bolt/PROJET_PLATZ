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
        $images = [
                    "ai-1.jpg", "ai-2.jpg", "font-1.jpg", "font-2.jpg", "font-3.jpg", "font-4.jpg", "font-5.jpg", "font-6.jpg", "icons-1.jpg", "icons-3.jpg", "psd-1.jpg", "psd-2.jpg", "psd-3.jpg", "psd-4.jpg", "psd-5.jpg", "theme-2.jpg", "theme-3.jpg", "theme-4.jpg", "ui-1.jpg"
                ];
        $randomIndex = $this->faker->numberBetween(0, 18);
        $randomNumber = $this->faker->numberBetween(2, 3);

        return [
            'name' => $this->faker->words($randomNumber, true),
            'description' => $this->faker->paragraphs(5, true),
            'image' => $images[$randomIndex],
            'file' => NULL,
            'weight' => $this->faker->randomFloat(2, 0, 500),
            'created_at' => $this->faker->dateTimeBetween('2018-01-01'),
            'updated_at' => NULL
        ];
    }
}
