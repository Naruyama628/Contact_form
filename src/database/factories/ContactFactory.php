<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Contact;

class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = \Faker\Factory::create('ja_JP');

        return [
            //
            'last_name' => $this->faker->lastName,
            'first_name' => $this->faker->firstName,
            'gender' => $this->faker->numberBetween(1, 3),
            'tel' => $this->faker->randomNumber(8, true),
            'email' => $this->faker->safeEmail(),
            'address' => $this->faker->streetAddress,
            'building' => $this->faker->secondaryAddress,
            'category_id' => $this->faker->numberBetween(1, 5),
            'detail' => $this->faker->realText(120),
        ];
    }
}
