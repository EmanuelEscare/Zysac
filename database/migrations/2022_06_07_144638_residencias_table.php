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
        Schema::create('residencias', function (Blueprint $table) {
            $table->id();  //Primary Key Autoincrementable
            $table->string('numero_casa', 100);
            $table->string('nombre_dueño', 100);
            $table->string('teléfono', 10);
            $table->string('direccion', 300);
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
