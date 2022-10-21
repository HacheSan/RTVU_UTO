<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conducido', function (Blueprint $table) {

           //$table->primary(['programa_id', 'periodista_id']);
            //programa
            $table->unsignedBigInteger('programa_id');
            $table->unsignedBigInteger('periodista_id');
 
            $table->foreign('programa_id')->references('id')->on('programa')
            ->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
            //conductor
            //$table->unsignedBigInteger('periodista_id');
 
            $table->foreign('periodista_id')->references('id')->on('periodista')
            ->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
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
        Schema::dropIfExists('conducido');
    }
};
