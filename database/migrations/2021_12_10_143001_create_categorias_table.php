<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorias', function (Blueprint $table) {
            $table->id();
            $table->string('codigo_categoria')->unique();
            $table->string('descripcion_categoria');
            $table->integer('estatus')->default('1');
            $table->timestamps();
        });

        DB::table("categorias")
            ->insert([
                "codigo_categoria" => "CS1",
                "descripcion_categoria" => "SIN CATEGORIZAR",
                "estatus" => "1",
                "created_at" => \Carbon\Carbon::now(),
                "updated_at" => \Carbon\Carbon::now(),
            ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categorias');
    }
}
