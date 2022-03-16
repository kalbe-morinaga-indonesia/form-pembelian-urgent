<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PermissionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $list_permissions = ['view_department', 'add_department', 'edit_department', 'delete_department', 'view_user', 'add_user', 'edit_user', 'delete_user', 'view_role', 'add_role', 'edit_role', 'delete_role', 'view_permission', 'add_permission', 'edit_permission', 'delete_permission', 'view_assign_permission', 'add_assign_permission', 'edit_assign_permission', 'delete_assign_permission', 'view_assign_user', 'add_asign_user', 'edit_asign_user', 'delete_asign_user'];
        return [
            'name' => $this->faker->unique()->randomElement($list_permissions),
            'guard_name' => 'web'
        ];
    }
}
