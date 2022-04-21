<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMpurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mpurchases', function (Blueprint $table) {
            $table->id();
            $table->foreignId('muser_id')->constrained()->onDelete('cascade');
            $table->foreignId('mdepartment_id')->constrained()->onDelete('cascade');
            $table->string('txtSlug');
            $table->string('txtNoDok');
            $table->string('txtNoPurchaseRequest');
            $table->date('dtmTanggalKebutuhan');
            $table->string('txtFile')->nullable();
            $table->string('txtReason');
            $table->integer('total')->default(0);
            $table->enum('status', ['approved by dept head', 'approved by pu spv', 'in process', 'in process by buyer', 'rejected by dept head', 'rejected by buyer', 'rejected by pu spv', 'closed']);
            $table->string('txtApprovedByDeptHead')->nullable();
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
        Schema::dropIfExists('mpurchases');
    }
}
