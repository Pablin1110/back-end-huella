<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToAlcancedosTable extends Migration
{
    public function up()
    {
        Schema::table('alcancedos', function (Blueprint $table) {
            $table->unsignedBigInteger('usuario_id');
            $table->foreign('usuario_id', 'usuario_fk_2646122')->references('id')->on('organizacions');
        });
    }
}
