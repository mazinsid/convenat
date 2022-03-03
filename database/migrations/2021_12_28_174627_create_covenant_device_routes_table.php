<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCovenantDeviceRoutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('covenant_device_routes', function (Blueprint $table) {
            $table->id();
            $table->integer('device_route_id');
            $table->integer('department_id');
            $table->date('acceptance_date');
            $table->text('note');
            $table->string('code_number');
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
        Schema::dropIfExists('covenant_device_routes');
    }
}
