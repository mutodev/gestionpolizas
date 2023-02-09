<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdenesAsignadasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordenes__asignadas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id')->nullable();
            $table->foreign('order_id')
                ->references('id')
                ->on('ordenes')->nullable();
            // $table->foreign('order_id')
            // ->references('id')
            // ->on('ordenes')
            // ->onDelete('cascade')->nullable();
            $table->boolean('estado')->default(1);
            $table->string('email_interesado',900);
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')->nullable();
            // $table->foreign('user_id')
            // ->references('id')
            // ->on('users')
            // ->onDelete('cascade')->nullable();
            $table->boolean('notificado')->default(0);
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
        Schema::dropIfExists('ordenes__asignadas');
    }
}
