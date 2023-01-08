<?php

namespace Database\Factories;

use App\Models\service;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class doctorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name_ar' => $this->faker->userName(),
            'name_en' => $this->faker->userName(),
            'price' => $this->faker->numberBetween(100,500),
            'description_ar' => $this->faker->text(),
            'description_en' => $this->faker->text(),
            'service_id' => service::all()->random()->id,
            'image'=>$this->faker->imageUrl(),
            'user_id' => User::all()->random()->id,
            'location' =>'30.144593, 31.211934',
            'address' =>$this->faker->streetAddress(),
            'phone_number' => $this->faker->phoneNumber(),
        ];
    }
}
