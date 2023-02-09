<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFirmaUploadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('firma_uploads', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('type')->nullable();
            $table->string('size')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')->nullable();
                // $table->foreign('user_id')
                // ->references('id')
                // ->on('users')
                // ->onDelete('cascade')->nullable();                
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
        Schema::dropIfExists('firma_uploads');
    }
}
