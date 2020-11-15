<?php

namespace Database\Factories;

use App\Models\Quote;
use App\Models\Character;
use App\Models\Episode;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuoteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Quote::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $characters = Character::all(['id']);
        $episodes = Episode::all(['id']);

        return [
            'quote' => $this->faker->realText(255),
            'character_id' => $characters[rand(0, $characters->count() - 1)]['id'],
            'episode_id' => $episodes[rand(0, $episodes->count() - 1)]['id'],
        ];
    }
}
