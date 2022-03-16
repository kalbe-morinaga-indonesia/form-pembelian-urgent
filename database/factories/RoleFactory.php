<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RoleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $list_roles = ['admin', 'user', 'dept_head', 'buyer', 'pu_svp'];
        return [
            'name' => $this->faker->unique()->randomElement($list_roles),
            'guard_name' => 'web'
        ];
    }
}
