<?php

namespace Database\Factories;

use App\Models\Categorie;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategorieFactory extends Factory
{
    private $index = 0;
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Categorie::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {   
        $icons = ["icon-ai.svg", "icon-psd.svg", "icon-themes.svg", "icon-font.svg", "icon-photo.svg"];
        $this->index += 1; 

        return [
            'name' => $this->faker->word,
            'icon' => $icons[$this->index - 1],
            'created_at' => $this->faker->dateTimeBetween('2018-01-01'),
            'updated_at' => NULL
        ];
    }
}
