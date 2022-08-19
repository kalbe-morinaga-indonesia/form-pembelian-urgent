<?php

namespace Database\Seeders;

use App\Models\PurchaseOrder;
use Illuminate\Database\Seeder;

class PurchaseOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PurchaseOrder::create([
            'supplier_name' => "EKA SARANA MAKMUR. CV",
            'supplier_address' => "Taman Harapan Baru Blok Q2 No 21 Rt 006/023 Medan Satria",
            'supplier_contact_name' => "Ahmad Mustofa",
            'supplier_phone' => "021-70517875",
            'supplier_fax' => "021-88870927",
            'supplier_email' => "ekasaranamakmur@gmail.com",
            'po_number' => "PO/PU-KMI/XII/1900023242",
            'segment1' => "1900023242",
            'name' => "30 Days",
            'part_name' => "Sock drat dalam S/S size 1/4 ",
            'note' => "ENG",
        ]);
        PurchaseOrder::create([
            'supplier_name' => "WOLF PACKAGING MACHINES INDONESIA, PT",
            'supplier_address' => "Graha Kencana Blok AD 4Th Floor Jl. Raya Perjuangan No. 88 KEBON JERUK ",
            'supplier_contact_name' => "Kusnadi Lukimin",
            'supplier_phone' => "021-53650971/01/885",
            'supplier_fax' => "021-5332418",
            'supplier_email' => "kusnadi.lukimin@cbn.net.id",
            'po_number' => "PO/PU-KMI/XII/1900023243",
            'segment1' => "1900023243",
            'name' => "14 Days",
            'part_name' => "Balloon for gas flushing system,31-00-537",
            'note' => "ENG",
        ]);
        PurchaseOrder::create([
            'supplier_name' => "EKASURYA INOUT INDONESIA, PT",
            'supplier_address' => "Komplek Multiguna II JL. Tanjung No. 9 Lippo Cikarang  CIKARANG ",
            'supplier_contact_name' => "MARTHA",
            'supplier_phone' => "021-89906301",
            'supplier_fax' => "021-89906118",
            'supplier_email' => "martha@inout.com.sg martha_leeni@yahoo.com marthaleeni@ekasurya.co.id",
            'po_number' => "PO/PU-KMI/XII/1900023244",
            'segment1' => "1900023244",
            'name' => "30 Days",
            'part_name' => "Disposible Cap / Tutup Kepala",
            'note' => "HC",
        ]);
    }
}
