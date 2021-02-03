<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHuellasTable extends Migration
{
    public function up()
    {
        Schema::create('huellas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->float('alcance_uno', 15, 2);
            $table->float('alcance_dos', 15, 2);
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
