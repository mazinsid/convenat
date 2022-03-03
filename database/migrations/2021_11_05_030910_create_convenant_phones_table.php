<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConvenantPhonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('convenant_phones', function (Blueprint $table) {
            $table->id();
            $table->integer('code');
            $table->integer('employees_id');
            $table->integer('serial');
            $table->integer('device_phone_id');
            $table->text('note');
            $table->date('convenant_date');
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
        Schema::dropIfExists('convenant_phones');
    }
}
