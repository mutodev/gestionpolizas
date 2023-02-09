<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAseguradorasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aseguradoras', function (Blueprint $table) {
            $table->id();
            $table->string('nit');
            $table->string('tipo_aseguradora');
            $table->string('representante');
            $table->string('ccrepresentante');
            $table->string('direccion_entidad',600);
            $table->string('name1',255);
            $table->string('email1',255);
            $table->string('phone1');
            $table->string('company_name');
            $table->string('name2',255)->nullable();
            $table->string('email2',255)->nullable();
            $table->string('phone2')->nullable();
            $table->string('url1',900);
            $table->string('url2',900)->nullable();
            $table->string('cargo1',200);
            $table->string('cargo2',200)->nullable();
            $table->string('dir1',200);
            $table->string('dir2',200)->nullable();
            $table->boolean('estado')->default(1);
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
        Schema::dropIfExists('aseguradoras');
    }
}
