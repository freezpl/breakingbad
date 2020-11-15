<?php

namespace Database\Factories;

use App\Models\Character;
use Illuminate\Database\Eloquent\Factories\Factory;

class CharacterFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Character::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        //occupations
        $occupationsCount = rand(1, 3);
        $occupations = [];
        for ($i=0; $i < $occupationsCount; $i++) { 
            array_push($occupations, $this->faker->randomElement(
                [
                  "teacher",   
                  "police", 
                  "alchemic",
                  "narco",
                  "seller",
                  "schoolboy",
                ]
                ));
        }

        return [
            'name' => $this->faker->name,
            'birthday_date' => $this->faker->dateTimeBetween('-100 years', 'now'),
            'occupations' => json_encode($occupations),
             'photo' => $this->faker->imageUrl(),
             'nickname' => $this->faker->text(10),
             'portrayed' => $this->faker->name(),
        ];
    }
}
