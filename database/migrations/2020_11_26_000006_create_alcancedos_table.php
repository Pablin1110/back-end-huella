<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlcancedosTable extends Migration
{
    public function up()
    {
        Schema::create('alcancedos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('periodo_inicial');
            $table->date('periodo_final');
            $table->string('ubicacion');
            $table->string('nombre');
            $table->float('consumo', 15, 2)->nullable();
            $table->float('factor_emision', 15, 2);
            $table->float('emisiones_totales', 15, 2);
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
