<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProyectoMigracion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyecto', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombreProyecto', 80);

            $table->integer('tipo_id')->unsigned()->index()->nullable();
            $table->foreign('tipo_id')->references('id')->on('tipo')->onDelete('set null');

            $table->date('fechaCreacion')->default('1994-12-09');
            $table->integer('tiempoAnalisis');
            $table->String('noSerie',45);
            $table->String('nombreAlumno',35);
            $table->String('grupoAlumno',5);
            $table->String('linkProyecto',250);

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
        Schema::table('proyecto', function (Blueprint $table) {
            $table->dropForeign(['tipo_id']);
        });

        Schema::drop('proyecto');
    }
}
