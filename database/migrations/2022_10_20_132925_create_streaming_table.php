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
        Schema::create('streaming', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_str');
            $table->string('url_ip');

            $table->unsignedBigInteger('user_id');
            //$table->integer('user_id')->unsigned();
 
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
        Schema::dropIfExists('streaming');
    }
};
