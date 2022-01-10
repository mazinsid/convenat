<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCovenantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('covenants', function (Blueprint $table) {
            $table->id();
            $table->integer('employees_id');
            $table->integer('ptypes_id')->nullable();
            $table->integer('serials_id')->nullable();
            $table->dateTime('acceptance');
            $table->string('code_number');
            $table->string('plate_number')->nullable();
            $table->string('vehicle_type')->nullable();
            $table->string('call_code')->nullable();
            $table->string('call_number')->nullable();
            $table->text('note');
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
        Schema::dropIfExists('covenants');
    }
}
