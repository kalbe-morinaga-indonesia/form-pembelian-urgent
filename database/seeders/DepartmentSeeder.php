<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Department::create([
            'txtIdDept' => "DPN-0003",
            'txtIdDivisi' => "DVI-0002",
            'txtNamaDept' => "BDA",
            'txtInsertedBy' => "System",
            'txtUpdatedBy' => "System"
        ]);

        Department::create([
            'txtIdDept' => "DPN-0002",
            'txtIdDivisi' => "DVI-0001",
            'txtNamaDept' => "IOS",
            'txtInsertedBy' => "System",
            'txtUpdatedBy' => "System"
        ]);

        Department::create([
            'txtIdDept' => "DPN-0008",
            'txtIdDivisi' => "DVI-0002",
            'txtNamaDept' => "HC",
            'txtInsertedBy' => "System",
            'txtUpdatedBy' => "System"
        ]);

        Department::create([
            'txtIdDept' => "DPN-0005",
            'txtIdDivisi' => "DVI-0001",
            'txtNamaDept' => "ENG",
            'txtInsertedBy' => "System",
            'txtUpdatedBy' => "System"
        ]);

        Department::create([
            'txtIdDept' => "DPN-0007",
            'txtIdDivisi' => "DVI-0001",
            'txtNamaDept' => "QA",
            'txtInsertedBy' => "System",
            'txtUpdatedBy' => "System"
        ]);

        Department::create([
            'txtIdDept' => "DPN-0009",
            'txtIdDivisi' => "DVI-0001",
            'txtNamaDept' => "MDP",
            'txtInsertedBy' => "System",
            'txtUpdatedBy' => "System"
        ]);

        Department::create([
            'txtIdDept' => "DPN-0006",
            'txtIdDivisi' => "DVI-0001",
            'txtNamaDept' => "WH",
            'txtInsertedBy' => "System",
            'txtUpdatedBy' => "System"
        ]);

        Department::create([
            'txtIdDept' => "DPN-0004",
            'txtIdDivisi' => "DVI-0001",
            'txtNamaDept' => "PRD",
            'txtInsertedBy' => "System",
            'txtUpdatedBy' => "System"
        ]);
    }
}
