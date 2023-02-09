<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoberturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coberturas', function (Blueprint $table) {
            $table->id();
            $table->boolean('estado')->default(1);
            $table->string('clase_de_riesgo');
            $table->string('porcentaje_amparo');
            $table->string('valor_asegurado',255);
            $table->string('vigencia',900);
            $table->string('iva',255);
            $table->string('tipo_de_poliza',255);
            $table->string('origen')->nullable();
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
        Schema::dropIfExists('coberturas');
    }
}
