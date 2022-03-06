<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mUsers', function (Blueprint $table) {
            $table->id('intUserId');
            $table->string('txtNama');
            $table->string('txtNoHp');
            $table->string('txtTempatLahir');
            $table->date('dtmTanggalLahir');
            $table->string('txtUsername')->unique();
            $table->string('txtPassword');
            $table->text('txtAlamat');
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
        Schema::dropIfExists('users');
    }
}
