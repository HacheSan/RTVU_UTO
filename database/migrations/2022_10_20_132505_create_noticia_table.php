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
        Schema::create('noticia', function (Blueprint $table) {
            $table->id();
            $table->string('categoria_noticia');
            $table->string('titulo');
            $table->text('descripcion');
            $table->string('foto_noticia');
            $table->string('video_noticia');
            $table->string('ciudad');
            $table->string('pais');
            $table->date('fecha_registro');

            $table->unsignedBigInteger('user_id');
            //usuario
            $table->foreign('user_id')->references('id')->on('users')
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
        Schema::dropIfExists('noticia');
    }
};
