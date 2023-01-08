<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class serviceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name_en' => $this->faker->domainName(),
            'name_ar' => $this->faker->domainName(),
            'description_en' => $this->faker->text(),
            'description_ar' => $this->faker->text(),
            'icon'=>$this->faker->imageUrl(),
            'image'=>$this->faker->imageUrl(),
        ];
    }
}
