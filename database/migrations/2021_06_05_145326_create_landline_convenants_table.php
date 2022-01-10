<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLandlineConvenantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('landline_covenants', function (Blueprint $table) {
            $table->id();
            $table->integer('branches_id');
            $table->integer('landlines_id');
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
        Schema::dropIfExists('landline_convenants');
    }
}
