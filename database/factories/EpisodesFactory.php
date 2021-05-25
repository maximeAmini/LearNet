<?php

namespace Database\Factories;

use App\Models\Cours;
use App\Models\Episodes;
use Illuminate\Database\Eloquent\Factories\Factory;

class EpisodesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Episodes::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'discription' => $this->faker->paragraphs(3, true),
            'video_url' => $this->faker->sentence(),
            'cours_id' => Cours::all()->random()->id
        ];
    }
}
