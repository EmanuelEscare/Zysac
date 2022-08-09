<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('residentes', function (Blueprint $table) {
            $table->id();  //Primary Key Autoincrementable
            $table->string('nombre', 100);
            $table->string('email', 100);
            $table->string('teléfono', 10);
            $table->boolean('titular');
            $table->foreignId('id_casa')->references('id')->on('residencias')->onDelete('cascade');
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
        //
    }
};
