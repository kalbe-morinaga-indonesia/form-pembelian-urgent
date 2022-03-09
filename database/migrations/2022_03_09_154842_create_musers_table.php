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
            $table->string('txtNama');
            $table->string('txtNoHp');
            $table->string('txtTempatLahir');
            $table->date('dtmTanggalLahir');
            $table->string('txtUsername')->unique();
            $table->string('txtPassword');
            $table->text('txtAlamat');
            $table->foreignId('mdepartment_id')->constrained()->onDelete('cascade');
            $table->rememberToken();
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
        Schema::dropIfExists('musers');
    }
}
