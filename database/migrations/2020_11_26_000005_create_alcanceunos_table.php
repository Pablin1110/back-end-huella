<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlcanceunosTable extends Migration
{
    public function up()
    {
        Schema::create('alcanceunos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('lugar')->nullable();
            $table->string('equipo');
            $table->string('tipo');
            $table->float('cantidad_inicial', 15, 2);
            $table->float('cantidad_anual', 15, 2)->nullable();
            $table->float('factor_emision', 15, 2);
            $table->float('emisiones_totales', 15, 2);
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
