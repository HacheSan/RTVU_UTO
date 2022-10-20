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
            $table->increments('id');
            $table->string('categoria_noticia',50);
            $table->string('titulo',250);
            $table->text('descripcion');
            $table->string('foto_noticia',150);
            $table->string('video_noticia',150);
            $table->string('ciudad',25);
            $table->string('pais',25);
            $table->date('fecha_registro',$precision = 8);

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
        Schema::dropIfExists('noticia');
    }
};
