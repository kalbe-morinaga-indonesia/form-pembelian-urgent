<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMinputsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('minputs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mpurchase_id')->constrained()->onDelete('cascade');
            $table->foreignId('mbarang_id')->constrained();
            $table->string('txtNomorPO');
            $table->string('txtNamaSupplier');
            $table->integer('intHarga');
            $table->integer('intSubTotal');
            $table->date('dtmTanggalKedatangan');
            $table->text('txtDescription');
            $table->string('txtStatus')->default('In Proccess');
            $table->string('txtInsertedBy');
            $table->string('txtUpdatedBy');
            $table->dateTime('dtmInsertedBy');
            $table->dateTime('dtmUpdatedBy');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('minputs');
    }
}
