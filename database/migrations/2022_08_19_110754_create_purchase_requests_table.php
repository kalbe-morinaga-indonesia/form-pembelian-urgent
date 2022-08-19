<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql2')->create('purchase_requests', function (Blueprint $table) {
            $table->id();
            $table->integer('line_num');
            $table->string('item_code');
            $table->string('item_description');
            $table->integer('quantity');
            $table->string('unit_meas_lookup_code');
            $table->integer('unit_price');
            $table->integer('segment1');
            $table->string('authorization_status');
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
        Schema::connection('mysql2')->dropIfExists('purchase_requests');
    }
}
