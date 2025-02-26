<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportesTable extends Migration
{
    public function up()
    {
        Schema::create('reportes', function (Blueprint $table) {
            $table->id('id_reporte'); // Primary Key
            $table->unsignedBigInteger('id_usuario'); // FK de usuarios
            $table->unsignedBigInteger('id_admin_verificador')->nullable(); // FK de administradores (puede ser nulo)
            $table->unsignedBigInteger('nombre_reporte'); // FK de tipos_reporte
            $table->string('descripcion_problemática');
            $table->unsignedBigInteger('ubicacion'); 
            $table->string('calle');
            $table->string('colonia_boulevard_carretera'); 
            $table->string('calle_entre_1');
            $table->string('calle_entre_2');
            $table->text('descripcion_ubicacion');
            $table->string('imagen_referencia')->nullable();
            $table->date('fecha_reporte');
            $table->enum('estado', ['Pendiente', 'Atendido', 'En proceso', 'Completado'])->default('Pendiente');
            $table->timestamps();

            // Claves foráneas:
            $table->foreign('id_usuario')->references('id_usuario')->on('usuarios')->onDelete('cascade');
            $table->foreign('id_admin_verificador')->references('id_admin')->on('administradores')->onDelete('set null');
            $table->foreign('nombre_reporte')->references('id_tipo_reporte')->on('tipos_reporte')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('reportes');
    }
}
