<?php

namespace Database\Seeders;

use App\Models\PurchaseRequest;
use Illuminate\Database\Seeder;

class PurchaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PurchaseRequest::create([
            'line_num' => "1",
            'item_code' => "GE-01-M-15-0128",
            'item_description' => "Lakban marka warna Kuning uk. 2 3M",
            'quantity' => "7",
            'unit_meas_lookup_code' => "ROLL",
            'unit_price' => "0",
            'segment1' => "1900017792",
            'authorization_status' => "APPROVED",
        ]);

        PurchaseRequest::create([
            'line_num' => "3",
            'item_code' => "GE-01-M-15-0123",
            'item_description' => "Kabel ties 300mm SIGMA",
            'quantity' => "10",
            'unit_meas_lookup_code' => "BAG",
            'unit_price' => "0",
            'segment1' => "1900017792",
            'authorization_status' => "APPROVED",
        ]);

        PurchaseRequest::create([
            'line_num' => "2",
            'item_code' => "KMI-CONEX-ENG",
            'item_description' => "gunting Kain Besar",
            'quantity' => "2",
            'unit_meas_lookup_code' => "Pieces",
            'unit_price' => "0",
            'segment1' => "1900017793",
            'authorization_status' => "IN PROCESS",
        ]);
    }
}
