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

        $departments = ["BDA", "IOS", "HC", "ENG", "QA", "MDP", "WH", "PRD"];

        foreach ($departments as $department) {
            Department::create([
                'txtNamaDept' => $department,
                'txtInsertedBy' => 'System',
                'txtUpdatedBy' => 'System'
            ]);
        }
    }
}
