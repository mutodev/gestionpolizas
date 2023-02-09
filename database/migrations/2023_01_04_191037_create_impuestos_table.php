<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImpuestosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('impuestos', function (Blueprint $table) {
            $table->id();
            $table->string('impuseto_name');
            $table->boolean('estado')->default(1);
            $table->string('porcentaje_valor');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->timestamps();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')->nullable();
                // $table->foreign('user_id')
                // ->references('id')
                // ->on('users')
                // ->onDelete('cascade')->nullable();




        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('impuestos');
    }
}
