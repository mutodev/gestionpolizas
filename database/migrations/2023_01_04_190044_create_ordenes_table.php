<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdenesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordenes', function (Blueprint $table) {
            $table->id();
            $table->string('order_number')->unique();
            $table->string('order_fecha');
            $table->string('order_subtotal');
            $table->string('order_iva')->nullable();
            $table->string('order_tipoidentificacion')->nullable();
            $table->string('order_total');
            $table->string('order_nombre');
            $table->string('order_nit');
            $table->string('order_representante');
            $table->string('order_email');
            $table->string('order_tel');
            $table->string('order_dir');
            $table->string('order_anticipo');
            $table->string('order_tipo')->nullable();
            $table->timestamp('endsat')->nullable();
            $table->integer('diasleft')->nullable();
            $table->unsignedBigInteger('owner_id')->nullable();
            $table->foreign('owner_id')
                ->references('id')
                ->on('users')->nullable();
            // $table->foreign('owner_id')
            // ->references('id')
            // ->on('users')
            // ->onDelete('cascade')->nullable();
            $table->unsignedBigInteger('aprobado_id')->nullable();
            $table->foreign('aprobado_id')
                    ->references('id')
                    ->on('users')->nullable();
            // $table->foreign('aprobado_id')
            //     ->references('id')
            //     ->on('users')
            //     ->onDelete('cascade')->nullable();
            $table->unsignedBigInteger('gestionado_id')->nullable();
            $table->foreign('gestionado_id')
            ->references('id')
            ->on('users')->nullable();
            // $table->foreign('gestionado_id')
            //     ->references('id')
            //     ->on('users')
            //     ->onDelete('cascade')->nullable();
            $table->boolean('estado')->default(1);
            $table->boolean('aprobado')->default(0);
            $table->boolean('gestionado')->default(0);
            $table->boolean('vigencias_constituidas')->default(1);
            $table->string('poliza_number')->nullable();
            $table->string('poliza_beneficiario')->nullable();
            $table->timestamp('poliza_ini')->nullable();
            $table->timestamp('poliza_end')->nullable();
            $table->string('poliza_expplace')->nullable();
            $table->integer('poliza_diasleft')->nullable();
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
        Schema::dropIfExists('ordenes');
    }
}
