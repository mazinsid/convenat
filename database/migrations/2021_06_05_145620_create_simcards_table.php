<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSimcardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('simcards', function (Blueprint $table) {
            $table->id();
            $table->string('serial');
            $table->string('phone');
            $table->integer('provider_id');
            $table->string('type');
            $table->string('route_type')->nullable();
            $table->string('route_model')->nullable();
            $table->string('route_version')->nullable();
            $table->string('status');
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
        Schema::dropIfExists('simcards');
    }
}
