<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipoReportesTable extends Migration
{
    public function up()
    {
        Schema::create('tipos_reporte', function (Blueprint $table) {
            $table->id('id_tipo_reporte'); // Primary Key
            $table->string('nombre_del_tipo_reporte');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tipos_reporte');
    }
}


//php artisan migrate:fresh
