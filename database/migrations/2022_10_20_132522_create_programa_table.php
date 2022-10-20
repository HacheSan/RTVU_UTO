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
        Schema::create('programa', function (Blueprint $table) {
            $table->increments('id');
            $table->string('categoria_dia',50);
            $table->string('nombre_programa',250);
            $table->text('descripcion');
            $table->string('foto_programa',150);
            $table->time('hora');
            $table->date('fecha_registro');

            $table->unsignedBigInteger('usuario_id');
            //usuario
            $table->foreign('usuario_id')->references('id')->on('users')
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
        Schema::dropIfExists('programa');
    }
};
