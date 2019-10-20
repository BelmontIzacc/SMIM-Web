<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PaletaMigracion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paletaColores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tonalidadRangoMax', 15)->nullable();
            $table->string('tonalidadRangoMin', 15)->nullable();

            $table->string('tempRangoMax', 10)->nullable();
            $table->string('tempRangoMin', 10)->nullable();

            $table->string('nombrePaleta', 10)->nullable();
            $table->string('linkEscala', 300)->nullable();
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
        Schema::drop('paletaColores');
    }
}
