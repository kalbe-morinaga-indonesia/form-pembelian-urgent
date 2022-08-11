<?php

namespace Database\Seeders;

use App\Models\Divisi;
use Illuminate\Database\Seeder;

class DivisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Divisi::create([
            'txtIdDivisi' => "DVI-0001",
            'txtNamaDivisi' => "Manufacturing",
            'txtInsertedBy' => "System",
            'txtUpdatedBy' => "System"
        ]);

        Divisi::create([
            'txtIdDivisi' => "DVI-0002",
            'txtNamaDivisi' => "Suporting",
            'txtInsertedBy' => "System",
            'txtUpdatedBy' => "System"
        ]);

        Divisi::create([
            'txtIdDivisi' => "DVI-0004",
            'txtNamaDivisi' => "Klinik",
            'txtInsertedBy' => "System",
            'txtUpdatedBy' => "System"
        ]);

        Divisi::create([
            'txtIdDivisi' => "DVI-0005",
            'txtNamaDivisi' => "PKL",
            'txtInsertedBy' => "System",
            'txtUpdatedBy' => "System"
        ]);
    }
}
