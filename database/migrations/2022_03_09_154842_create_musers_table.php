<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMusersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('musers', function (Blueprint $table) {
            $table->id();
            $table->string('txtNik')->unique();
            $table->string('txtNama');
            $table->string('txtNoHp')->nullable();
            $table->string('txtTempatLahir')->nullable();
            $table->date('dtmTanggalLahir')->nullable();
            $table->string('txtUsername')->unique();
            $table->string('txtPassword');
            $table->text('txtAlamat')->nullable();
            $table->foreignId('mdepartment_id')->constrained()->onDelete('cascade');
            $table->rememberToken();
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
        Schema::dropIfExists('musers');
    }
}
