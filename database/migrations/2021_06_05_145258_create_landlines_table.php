<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLandlinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('landlines', function (Blueprint $table) {
            $table->id();  
            $table->string('land_type');
            $table->string('properties');
            $table->string('uses');
            $table->string('serial');
            $table->string('circle_number');
            $table->string('cab_number');
            $table->string('circuit_type');
            $table->string('circuit_speed');
        
            $table->integer('providers_id');
            $table->date('landline_expiry_date');
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
        Schema::dropIfExists('landlines');
    }
}
