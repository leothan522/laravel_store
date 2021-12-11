<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unidades', function (Blueprint $table) {
            $table->id();
            $table->string('codigo_unidad')->unique();
            $table->string('descripcion_unidad');
            $table->timestamps();
        });

        DB::table("unidades")
            ->insert([
                "codigo_unidad" => "UND",
                "descripcion_unidad" => "UNIDAD",
                "created_at" => \Carbon\Carbon::now(),
                "updated_at" => \Carbon\Carbon::now(),
            ]);
        DB::table("unidades")
            ->insert([
                "codigo_unidad" => "KG",
                "descripcion_unidad" => "KILOGRAMO",
                "created_at" => \Carbon\Carbon::now(),
                "updated_at" => \Carbon\Carbon::now(),
            ]);
        DB::table("unidades")
            ->insert([
                "codigo_unidad" => "LT",
                "descripcion_unidad" => "LITRO",
                "created_at" => \Carbon\Carbon::now(),
                "updated_at" => \Carbon\Carbon::now(),
            ]);
        DB::table("unidades")
            ->insert([
                "codigo_unidad" => "MG",
                "descripcion_unidad" => "MILIGRAMO",
                "created_at" => \Carbon\Carbon::now(),
                "updated_at" => \Carbon\Carbon::now(),
            ]);
        DB::table("unidades")
            ->insert([
                "codigo_unidad" => "ML",
                "descripcion_unidad" => "MILILITRO",
                "created_at" => \Carbon\Carbon::now(),
                "updated_at" => \Carbon\Carbon::now(),
            ]);
        DB::table("unidades")
            ->insert([
                "codigo_unidad" => "CAJA",
                "descripcion_unidad" => "CAJA",
                "created_at" => \Carbon\Carbon::now(),
                "updated_at" => \Carbon\Carbon::now(),
            ]);
        DB::table("unidades")
            ->insert([
                "codigo_unidad" => "BULTO",
                "descripcion_unidad" => "BULTO",
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
        Schema::dropIfExists('unidades');
    }
}
