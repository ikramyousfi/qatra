<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('gestionnaire_id');
            $table->integer('ABp')->nullable();
            $table->integer('ABn')->nullable();
            $table->integer('Ap')->nullable();
            $table->integer('An')->nullable();
            $table->integer('Bp')->nullable();
            $table->integer('Bn')->nullable();
            $table->integer('Op')->nullable();
            $table->integer('On')->nullable();
            $table->timestamps();
            $table->index('gestionnaire_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stocks');
    }
}
