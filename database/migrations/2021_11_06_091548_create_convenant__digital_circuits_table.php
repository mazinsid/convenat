<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConvenantDigitalCircuitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('convenant__digital_circuits', function (Blueprint $table) {
            $table->id();
            $table->integer('code');
            $table->integer('branch_id');
            $table->integer('employees_id');
            $table->integer('DigitalCircuit_id');
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
        Schema::dropIfExists('convenant__digital_circuits');
    }
}
