<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker::create('id_ID');

        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions

        // department
        Permission::create(['name' => 'view_department']);
        Permission::create(['name' => 'add_department']);
        Permission::create(['name' => 'edit_department']);
        Permission::create(['name' => 'delete_department']);

        // create role
        $role1 = Role::create(['name' => 'admin']);
        $role2 = Role::create(['name' => 'user']);
        $role3 = Role::create(['name' => 'dept_head']);
        $role4 = Role::create(['name' => 'buyer']);
        $role5 = Role::create(['name' => 'pu_svp']);

        // create user
        $user1 = User::create([
            'txtNik' => $faker->nik(),
            'txtNama' => "Budi Setiawan",
            'txtUsername' => "budisetiawan",
            'txtPassword' => bcrypt(12345678),
            'mdepartment_id' => 1,
            'txtInsertedBy' => "System",
            'txtUpdatedBy' => "System"
        ]);

        $user2 = User::create([
            'txtNik' => $faker->nik(),
            'txtNama' => "Zaini Ardhiansyah",
            'txtUsername' => "zaini_ardhiansyah",
            'txtPassword' => bcrypt(12345678),
            'mdepartment_id' => 1,
            'txtInsertedBy' => "System",
            'txtUpdatedBy' => "System"
        ]);

        $user3 = User::create([
            'txtNik' => $faker->nik(),
            'txtNama' => "Rudi Sugiarto",
            'txtUsername' => "rudi_sugiarto",
            'txtPassword' => bcrypt(12345678),
            'mdepartment_id' => 2,
            'txtInsertedBy' => "System",
            'txtUpdatedBy' => "System"
        ]);

        $user4 = User::create([
            'txtNik' => $faker->nik(),
            'txtNama' => "Happy Sugestie",
            'txtUsername' => "happy_sugestie",
            'txtPassword' => bcrypt(12345678),
            'mdepartment_id' => 3,
            'txtInsertedBy' => "System",
            'txtUpdatedBy' => "System"
        ]);

        $user5 = User::create([
            'txtNik' => $faker->nik(),
            'txtNama' => "Kukuh Gumilang",
            'txtUsername' => "kukuh_gumilang",
            'txtPassword' => bcrypt(12345678),
            'mdepartment_id' => 4,
            'txtInsertedBy' => "System",
            'txtUpdatedBy' => "System"
        ]);

        $user6 = User::create([
            'txtNik' => $faker->nik(),
            'txtNama' => "Dwi Kurniawan",
            'txtUsername' => "dwi_kurniawan",
            'txtPassword' => bcrypt(12345678),
            'mdepartment_id' => 5,
            'txtInsertedBy' => "System",
            'txtUpdatedBy' => "System"
        ]);

        $user7 = User::create([
            'txtNik' => $faker->nik(),
            'txtNama' => "Agung Hartanto",
            'txtUsername' => "agung_hartanto",
            'txtPassword' => bcrypt(12345678),
            'mdepartment_id' => 6,
            'txtInsertedBy' => "System",
            'txtUpdatedBy' => "System"
        ]);

        $user8 = User::create([
            'txtNik' => $faker->nik(),
            'txtNama' => "Mukti Wibowo",
            'txtUsername' => "mukti_wibowo",
            'txtPassword' => bcrypt(12345678),
            'mdepartment_id' => 7,
            'txtInsertedBy' => "System",
            'txtUpdatedBy' => "System"
        ]);

        $user9 = User::create([
            'txtNik' => $faker->nik(),
            'txtNama' => "Ahmad Sahroni",
            'txtUsername' => "ahmad_sahroni",
            'txtPassword' => bcrypt(12345678),
            'mdepartment_id' => 8,
            'txtInsertedBy' => "System",
            'txtUpdatedBy' => "System"
        ]);

        // assign permission role
        $role1->givePermissionTo('view_department');
        $role1->givePermissionTo('add_department');
        $role1->givePermissionTo('edit_department');
        $role1->givePermissionTo('delete_department');

        // Assign role user
        $user1->assignRole($role1);
        $user2->assignRole($role2);
        $user3->assignRole($role2);
        $user4->assignRole($role2);
        $user5->assignRole($role2);
        $user6->assignRole($role2);
        $user7->assignRole($role2);
        $user8->assignRole($role2);
        $user9->assignRole($role2);
    }
}
