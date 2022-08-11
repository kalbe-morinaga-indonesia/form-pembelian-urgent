<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMdivisisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mdivisis', function (Blueprint $table) {
            $table->id();
            $table->char('txtIdDivisi', 8);
            $table->string('txtNamaDivisi');
            $table->string('txtInsertedBy')->nullable();
            $table->string('txtUpdatedBy')->nullable();
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
        Schema::dropIfExists('mdivisis');
    }
}
