<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticulosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articulos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo_articulo')->unique();
            $table->string('descripcion_articulo');
            $table->bigInteger('categorias_id')->unsigned()->nullable();
            $table->bigInteger('unidades_id')->unsigned()->nullable();
            $table->integer('estatus')->default('1');
            $table->foreign('categorias_id')->references('id')->on('categorias')->nullOnDelete();
            $table->foreign('unidades_id')->references('id')->on('unidades')->nullOnDelete();
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
        Schema::dropIfExists('articulos');
    }
}
