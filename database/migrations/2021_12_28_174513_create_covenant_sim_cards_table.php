<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCovenantSimCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('covenant_sim_cards', function (Blueprint $table) {
            $table->id();
            $table->integer('simcards_id');
            $table->integer('employees_id');
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
        Schema::dropIfExists('covenant_sim_cards');
    }
}
