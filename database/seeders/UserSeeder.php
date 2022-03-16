<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions

        // department
        Permission::create(['name' => 'view_department']);
        Permission::create(['name' => 'add_department']);
        Permission::create(['name' => 'edit_department']);
        Permission::create(['name' => 'delete_department']);

        // create role
        $role1 = Role::create(['name' => 'admin']);
        $role1->givePermissionTo('view_department');
        $role1->givePermissionTo('add_department');
        $role1->givePermissionTo('edit_department');
        $role1->givePermissionTo('delete_department');

        $role2 = Role::create(['name' => 'user']);
        $role3 = Role::create(['name' => 'dept_head']);
        $role4 = Role::create(['name' => 'buyer']);
        $role5 = Role::create(['name' => 'pu_svp']);

        $user = \App\Models\User::factory()->create();
        $user->assignRole($role1);
    }
}
