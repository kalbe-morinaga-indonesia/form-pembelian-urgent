<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMbarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mbarangs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mpurchase_id')->constrained()->onDelete('cascade');
            $table->string('txtItemCode');
            $table->string('txtNamaBarang');
            $table->integer('intJumlah');
            $table->foreignId('muom_id')->constrained()->onDelete('cascade');
            $table->string('txtKeterangan')->nullable();
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
        Schema::dropIfExists('mbarangs');
    }
}
