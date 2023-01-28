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
        Schema::create('calzados', function (Blueprint $table) {
            $table->id();
            $table->string('marca',20);
            $table->string('color',15);
            $table->string('modelo',50);
            $table->integer('precio');
            $table->integer('existencia');
            $table->unsignedBigInteger('categoria')->onDelete('cascade');
            $table->foreign('categoria')->references('id')->on('categorias');
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
        Schema::dropIfExists('calzados');
    }
};
