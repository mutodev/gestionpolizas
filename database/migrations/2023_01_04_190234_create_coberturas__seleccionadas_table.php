<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoberturasSeleccionadasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coberturas__seleccionadas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id')->nullable();
            $table->foreign('order_id')
                ->references('id')
                ->on('ordenes')->nullable();
                // $table->foreign('order_id')
                // ->references('id')
                // ->on('ordenes')
                // ->onDelete('cascade')->nullable();
            $table->integer('diasleft')->nullable();
            $table->timestamp('endsat')->nullable();
            $table->boolean('estado')->default(1);
            $table->string('origen')->nullable();
            $table->string('clase_de_riesgo');
            $table->string('porcentaje_amparo');
            $table->string('valor_asegurado',255);
            $table->string('vigencia',900);
            $table->string('iva',255);
            $table->string('tipo_de_poliza',255);
            $table->string('id_aseguradora',255);
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
        Schema::dropIfExists('coberturas__seleccionadas');
    }
}
