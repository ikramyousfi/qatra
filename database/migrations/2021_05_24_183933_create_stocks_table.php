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
            $table->integer('AB+')->default(0);
            $table->integer('AB-')->default(0);
            $table->integer('A+')->default(0);
            $table->integer('A-')->default(0);
            $table->integer('B+')->default(0);
            $table->integer('B-')->default(0);
            $table->integer('O+')->default(0);
            $table->integer('O-')->default(0);
            $table->integer('max')->default(100);
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
