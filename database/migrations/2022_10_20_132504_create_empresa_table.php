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
        Schema::create('empresa', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_empresa',50);
            $table->text('descripcion');
            $table->string('foto_empresa',150);
            $table->text('mision');
            $table->text('vision');
            $table->string('direccion',150);
            $table->integer('telefono',15)->unsigned();
            $table->string('email');

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
        Schema::dropIfExists('empresa');
    }
};
