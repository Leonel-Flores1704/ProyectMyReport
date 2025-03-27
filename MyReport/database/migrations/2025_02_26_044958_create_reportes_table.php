<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportesTable extends Migration
{
    public function up()
    {
        Schema::create('reportes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('admin_verificador_id')->nullable()->constrained('administradores')->onDelete('set null');
            $table->foreignId('tipo_reporte_id')->constrained('tipos_reporte')->onDelete('cascade');
            $table->text('descripcion_problematica');
            $table->string('calle');
            $table->string('colonia');
            $table->string('calle_entre_1')->nullable();
            $table->string('calle_entre_2')->nullable();
            $table->text('descripcion_ubicacion');
            $table->text('imagen_referencia')->nullable();
            $table->date('fecha_reporte');
            $table->enum('estado', ['Pendiente', 'Atendido', 'En proceso', 'Completado'])->default('Pendiente');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('reportes');
    }
}