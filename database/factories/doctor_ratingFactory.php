<?php

namespace Database\Factories;

use App\Models\doctor;
use Illuminate\Database\Eloquent\Factories\Factory;

class doctor_ratingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'doctor_id' => doctor::all()->random()->id,
            'rating' =>$this->faker->numberBetween(0,5),
            'user_id' => doctor::all()->random()->id,
            'commint' => $this->faker->text(),
        ];
    }
}
