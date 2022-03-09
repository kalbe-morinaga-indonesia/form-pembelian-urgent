<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'txtNama' => $this->faker->name(),
            'txtNoHp' => $this->faker->phoneNumber(),
            'txtTempatLahir' => $this->faker->city(),
            'dtmTanggalLahir' => $this->faker->date(),
            'txtUsername' => $this->faker->unique()->userName(),
            'txtPassword' => bcrypt(123456),
            'txtAlamat' => $this->faker->address(),
            'mdepartment_id' => $this->faker->numberBetween(1, 3)
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
