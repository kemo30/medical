<?php

namespace Database\Factories;

use App\Models\doctor;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class reservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::all()->random()->id,
            'doctor_id' => doctor::all()->random()->id,
            'date' => $this->faker->dateTimeBetween($startDate = 'now', $endDate = '1 years', $timezone = null),
            'notes' =>$this->faker->text(),
        ];
    }
}
