<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToAlcanceunosTable extends Migration
{
    public function up()
    {
        Schema::table('alcanceunos', function (Blueprint $table) {
            $table->unsignedBigInteger('usuario_id');
            $table->foreign('usuario_id', 'usuario_fk_2586860')->references('id')->on('organizacions');
        });
    }
}
