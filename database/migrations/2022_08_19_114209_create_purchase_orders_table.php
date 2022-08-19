<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql2')->create('purchase_orders', function (Blueprint $table) {
            $table->id();
            $table->string('supplier_name');
            $table->string('supplier_address');
            $table->string('supplier_contact_name');
            $table->string('supplier_phone');
            $table->string('supplier_fax');
            $table->string('supplier_email');
            $table->string('po_number');
            $table->integer('segment1');
            $table->string('name');
            $table->string('part_name');
            $table->string('note');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('mysql2')->dropIfExists('purchase_orders');
    }
}
