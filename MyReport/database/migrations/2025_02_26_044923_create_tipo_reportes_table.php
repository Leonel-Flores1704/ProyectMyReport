<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTiposReporteTable extends Migration
{
    public function up()
    {
        Schema::create('tipos_reporte', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->string('nombre');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tipos_reporte');
    }
}