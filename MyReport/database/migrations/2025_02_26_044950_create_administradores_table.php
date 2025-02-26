    <?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdministradoresTable extends Migration
{
    public function up()
    {
        Schema::create('administradores', function (Blueprint $table) {
            $table->id('id_admin'); // Primary Key
            $table->string('nombre');
            $table->string('apellido');
            $table->string('correo')->unique();
            $table->string('contraseña');
            $table->unsignedBigInteger('id_tipo_reporte'); // FK de tipos_reporte
            $table->timestamps();

            // Clave foránea:
            $table->foreign('id_tipo_reporte')->references('id_tipo_reporte')->on('tipos_reporte')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('administradores');
    }
}
