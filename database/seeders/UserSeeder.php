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
        Permission::create(['name' => 'dashboard']);
        Permission::create(['name' => 'logout']);

        // department
        Permission::create(['name' => 'view_department']);
        Permission::create(['name' => 'add_department']);
        Permission::create(['name' => 'edit_department']);
        Permission::create(['name' => 'delete_department']);

        // users
        Permission::create(['name' => 'view_user']);
        Permission::create(['name' => 'add_user']);
        Permission::create(['name' => 'edit_user']);
        Permission::create(['name' => 'delete_user']);

        // uom
        Permission::create(['name' => 'view_uom']);
        Permission::create(['name' => 'add_uom']);
        Permission::create(['name' => 'edit_uom']);
        Permission::create(['name' => 'delete_uom']);

        // role
        Permission::create(['name' => 'view_role']);
        Permission::create(['name' => 'add_role']);
        Permission::create(['name' => 'edit_role']);
        Permission::create(['name' => 'delete_role']);

        // permission
        Permission::create(['name' => 'view_permission']);
        Permission::create(['name' => 'add_permission']);
        Permission::create(['name' => 'edit_permission']);
        Permission::create(['name' => 'delete_permission']);

        // assign permission
        Permission::create(['name' => 'view_assign_permission']);
        Permission::create(['name' => 'add_assign_permission']);
        Permission::create(['name' => 'sync_assign_permission']);

        // assign user
        Permission::create(['name' => 'view_assign_user']);
        Permission::create(['name' => 'add_assign_user']);
        Permission::create(['name' => 'sync_assign_user']);

        // create role
        $role1 = Role::create(['name' => 'admin']);
        $role2 = Role::create(['name' => 'user']);
        $role3 = Role::create(['name' => 'dept_head']);
        $role4 = Role::create(['name' => 'buyer']);
        $role5 = Role::create(['name' => 'pu_svp']);

        // create user
        $user1 = User::create([
            'txtNik' => "K190900331",
            'txtNama' => "Rakha Adi Putra",
            'txtPassword' => bcrypt("Kalbemorinaga"),
            'mdepartment_id' => 1,
            'txtInsertedBy' => "System",
            'txtUpdatedBy' => "System"
        ]);

        $user2 = User::create([
            'txtNik' => "120292518",
            'txtNama' => "Zaini Ardhiansyah",
            'txtPassword' => bcrypt("Kalbemorinaga"),
            'mdepartment_id' => 1,
            'txtInsertedBy' => "System",
            'txtUpdatedBy' => "System"
        ]);

        $user3 = User::create([
            'txtNik' => "120292515",
            'txtNama' => "Rudi Sugiarto",
            'txtPassword' => bcrypt("Kalbemorinaga"),
            'mdepartment_id' => 2,
            'txtInsertedBy' => "System",
            'txtUpdatedBy' => "System"
        ]);

        $user4 = User::create([
            'txtNik' => "150791709",
            'txtNama' => "Happy Sugestie",
            'txtPassword' => bcrypt("Kalbemorinaga"),
            'mdepartment_id' => 3,
            'txtInsertedBy' => "System",
            'txtUpdatedBy' => "System"
        ]);

        $user5 = User::create([
            'txtNik' => "220100111",
            'txtNama' => "Kukuh Gumilang",
            'txtPassword' => bcrypt("Kalbemorinaga"),
            'mdepartment_id' => 4,
            'txtInsertedBy' => "System",
            'txtUpdatedBy' => "System"
        ]);

        $user6 = User::create([
            'txtNik' => "080900031",
            'txtNama' => "Dwi Kurniawan",
            'txtPassword' => bcrypt("Kalbemorinaga"),
            'mdepartment_id' => 5,
            'txtInsertedBy' => "System",
            'txtUpdatedBy' => "System"
        ]);

        $user7 = User::create([
            'txtNik' => "100192702",
            'txtNama' => "Agung Hartanto",
            'txtPassword' => bcrypt("Kalbemorinaga"),
            'mdepartment_id' => 6,
            'txtInsertedBy' => "System",
            'txtUpdatedBy' => "System"
        ]);

        $user8 = User::create([
            'txtNik' => "120892523",
            'txtNama' => "Mukti Wibowo",
            'txtPassword' => bcrypt("Kalbemorinaga"),
            'mdepartment_id' => 7,
            'txtInsertedBy' => "System",
            'txtUpdatedBy' => "System"
        ]);

        $user9 = User::create([
            'txtNik' => "120292511",
            'txtNama' => "Ahmad Sahroni",
            'txtPassword' => bcrypt("Kalbemorinaga"),
            'mdepartment_id' => 8,
            'txtInsertedBy' => "System",
            'txtUpdatedBy' => "System"
        ]);

        // dept head
        $user10 = User::create([
            'txtNik' => "050700014",
            'txtNama' => "Didik Budiarto",
            'txtPassword' => bcrypt("Kalbemorinaga"),
            'mdepartment_id' => 1,
            'txtInsertedBy' => "System",
            'txtUpdatedBy' => "System"
        ]);

        $user11 = User::create([
            'txtNik' => "130100005",
            'txtNama' => "Ambar Kusumo Nugroho",
            'txtPassword' => bcrypt("Kalbemorinaga"),
            'mdepartment_id' => 8,
            'txtInsertedBy' => "System",
            'txtUpdatedBy' => "System"
        ]);

        $user12 = User::create([
            'txtNik' => "180600122",
            'txtNama' => "Bernadheta Rismisari Handayani",
            'txtPassword' => bcrypt("Kalbemorinaga"),
            'mdepartment_id' => 3,
            'txtInsertedBy' => "System",
            'txtUpdatedBy' => "System"
        ]);

        $user13 = User::create([
            'txtNik' => "110900055",
            'txtNama' => "Hermansyah",
            'txtPassword' => bcrypt("Kalbemorinaga"),
            'mdepartment_id' => 2,
            'txtInsertedBy' => "System",
            'txtUpdatedBy' => "System"
        ]);
        $user14 = User::create([
            'txtNik' => "100300009",
            'txtNama' => "Nazarudin Rachman Sidik",
            'txtPassword' => bcrypt("Kalbemorinaga"),
            'mdepartment_id' => 6,
            'txtInsertedBy' => "System",
            'txtUpdatedBy' => "System"
        ]);

        $user15 = User::create([
            'txtNik' => "070400065",
            'txtNama' => "Marleny Patandung",
            'txtPassword' => bcrypt("Kalbemorinaga"),
            'mdepartment_id' => 7,
            'txtInsertedBy' => "System",
            'txtUpdatedBy' => "System"
        ]);

        $user16 = User::create([
            'txtNik' => "150600127",
            'txtNama' => "Yoppy Sukmandar",
            'txtPassword' => bcrypt("Kalbemorinaga"),
            'mdepartment_id' => 4,
            'txtInsertedBy' => "System",
            'txtUpdatedBy' => "System"
        ]);

        $user17 = User::create([
            'txtNik' => "081000038",
            'txtNama' => "Agus Firmansyah",
            'txtPassword' => bcrypt("Kalbemorinaga"),
            'mdepartment_id' => 5,
            'txtInsertedBy' => "System",
            'txtUpdatedBy' => "System"
        ]);

        // Buyer dan PU
        $user18 = User::create([
            'txtNik' => "100192704",
            'txtNama' => "Ika Oktafianti",
            'txtPassword' => bcrypt("Kalbemorinaga"),
            'mdepartment_id' => 5,
            'txtInsertedBy' => "System",
            'txtUpdatedBy' => "System"
        ]);

        $user19 = User::create([
            'txtNik' => "K220300040",
            'txtNama' => "Asep Setiawan",
            'txtPassword' => bcrypt("Kalbemorinaga"),
            'mdepartment_id' => 5,
            'txtInsertedBy' => "System",
            'txtUpdatedBy' => "System"
        ]);

        $user20 = User::create([
            'txtNik' => "070100013",
            'txtNama' => "Agus Riyanto",
            'txtPassword' => bcrypt("Kalbemorinaga"),
            'mdepartment_id' => 1,
            'txtInsertedBy' => "System",
            'txtUpdatedBy' => "System"
        ]);

        // assign permission role
        $role1->givePermissionTo('dashboard');
        $role1->givePermissionTo('logout');
        $role1->givePermissionTo('view_department');
        $role1->givePermissionTo('add_department');
        $role1->givePermissionTo('edit_department');
        $role1->givePermissionTo('delete_department');
        $role1->givePermissionTo('view_user');
        $role1->givePermissionTo('add_user');
        $role1->givePermissionTo('edit_user');
        $role1->givePermissionTo('delete_user');
        $role1->givePermissionTo('view_uom');
        $role1->givePermissionTo('add_uom');
        $role1->givePermissionTo('edit_uom');
        $role1->givePermissionTo('delete_uom');
        $role1->givePermissionTo('view_role');
        $role1->givePermissionTo('add_role');
        $role1->givePermissionTo('edit_role');
        $role1->givePermissionTo('delete_role');
        $role1->givePermissionTo('view_permission');
        $role1->givePermissionTo('add_permission');
        $role1->givePermissionTo('edit_permission');
        $role1->givePermissionTo('delete_permission');
        $role1->givePermissionTo('view_assign_permission');
        $role1->givePermissionTo('add_assign_permission');
        $role1->givePermissionTo('sync_assign_permission');
        $role1->givePermissionTo('view_assign_user');
        $role1->givePermissionTo('add_assign_user');
        $role1->givePermissionTo('sync_assign_user');

        // assign role admin
        $user1->assignRole($role1);

        // Assign role user
        $user2->assignRole($role2);
        $user3->assignRole($role2);
        $user4->assignRole($role2);
        $user5->assignRole($role2);
        $user6->assignRole($role2);
        $user7->assignRole($role2);
        $user8->assignRole($role2);
        $user9->assignRole($role2);

        // assign role dept head
        $user10->assignRole($role3);
        $user11->assignRole($role3);
        $user12->assignRole($role3);
        $user13->assignRole($role3);
        $user14->assignRole($role3);
        $user15->assignRole($role3);
        $user16->assignRole($role3);
        $user17->assignRole($role3);

        // assign role buyer
        $user1->assignRole($role4);
        $user18->assignRole($role4);
        $user19->assignRole($role4);

        // assign role pu
        $user18->assignRole($role5);
        $user19->assignRole($role5);
        $user20->assignRole($role5);
    }
}
