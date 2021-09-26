<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_tienda');
            $table->string('rif_tienda')->nullable();
            $table->string('jefe_tienda')->nullable();
            $table->text('telefonos_tienda')->nullable();
            $table->text('email_tienda')->nullable();
            $table->text('direccion_tienda')->nullable();
            $table->string('file_path')->nullable();
            $table->string('logo_tienda')->nullable();
            $table->string('imagen_tienda')->nullable();
            $table->bigInteger('municipios_id')->unsigned()->nullable();
            $table->bigInteger('estados_id')->unsigned()->nullable();
            $table->foreign('municipios_id')->references('id')->on('municipios')->nullOnDelete();
            $table->foreign('estados_id')->references('id')->on('estados')->nullOnDelete();
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
        Schema::dropIfExists('stores');
    }
}
