<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganizacionsTable extends Migration
{
    public function up()
    {
        Schema::create('organizacions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('id_usuario');
            $table->string('nombre');
            $table->string('tipo');
            $table->string('sector');
            $table->date('fecha');
            $table->float('superficie', 15, 2);
            $table->string('direccion');
            $table->integer('empleados');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
