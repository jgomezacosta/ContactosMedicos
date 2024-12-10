<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Crear una nueva tabla temporal
        Schema::create('profesionales_temp', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->string('apellido');
            $table->integer('dni');
            $table->integer('matricula_nacional')->nullable();;
            $table->integer('matricula_provincial')->nullable();;
            $table->string('email')->nullable();;
            $table->integer('telefono')->nullable();;
            $table->integer('celular')->nullable();;

            
            // aca estoy creando la relacion de zona_atencion_id de la tabla "profesionales" con id de la tabla "zonas_atencion"
            $table->unsignedBigInteger('zona_atencion_id'); 
            $table->foreign('zona_atencion_id')->references('id')->on('zonas_atencion');
            $table->string('localidad')->nullable();


            $table->string('especialidad');
            $table->boolean('tipo_cirugias')->default(0);
            $table->boolean('quirofano')->default(0);
            $table->string('lugar_operacion')->nullable();
            $table->string('radio_movilidad')->nullable();
            $table->string('cobertura')->nullable();
            $table->string('horario_atencion')->nullable();
            $table->string('observaciones')->nullable();


            $table->string('archivo_1')->nullable(); // en este campo se guardaria la ruta donde encontrar el archivo subido
            $table->string('archivo_2')->nullable();
            $table->string('archivo_3')->nullable();
            $table->string('archivo_4')->nullable();
            $table->string('archivo_5')->nullable();
            $table->string('archivo_6')->nullable();

            // Este campo se utilizado para el borrado logico
            $table->boolean('borrado')->default(0);
            $table->timestamps();
       });

       // Copiar los datos desde la tabla original a la nueva tabla
       DB::table('profesionales')->orderBy('id')->chunk(100, function ($profesionales) {
           foreach ($profesionales as $profesional) {
               DB::table('profesionales_temp')->insert([
                   'nombre' => $profesional->nombre,
                   'apellido' => $profesional->apellido,
                   'dni' => $profesional->dni,

                   'matricula_nacional' => $profesional->matricula,
                   'email' => $profesional->email,
                   'telefono' => $profesional->telefono,
                   'celular' => $profesional->celular,
                   'zona_atencion_id' => $profesional->zona_atencion_id,
                   'especialidad' => $profesional->especialidad,
                   'localidad' => $profesional->localidad,
                   'tipo_cirugias' => 1,
                   'lugar_operacion' => $profesional->direccion_atencion,
                   'horario_atencion' => $profesional->horario_atencion,
                   'observaciones' => $profesional->observaciones,
                   'archivo_1' => $profesional->archivo,
                   // Asegúrate de incluir todos los campos necesarios
               ]);
           }
       });

       // Eliminar la tabla original
       Schema::dropIfExists('profesionales');

       // Renombrar la nueva tabla a la original
       Schema::rename('profesionales_temp', 'profesionales');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::table('profesionales', function (Blueprint $table) {
            $table->dropForeign(['zona_atencion_id']); // Eliminar clave foránea
        });
        
        Schema::dropIfExists('profesionales');
    }
};
