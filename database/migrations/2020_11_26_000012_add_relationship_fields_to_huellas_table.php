<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToHuellasTable extends Migration
{
    public function up()
    {
        Schema::table('huellas', function (Blueprint $table) {
            $table->unsignedBigInteger('usuario_id');
            $table->foreign('usuario_id', 'usuario_fk_2668864')->references('id')->on('organizacions');
        });
    }
}
