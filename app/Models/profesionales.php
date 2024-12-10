<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class profesionales extends Model
{
    use HasFactory;
    protected $table = 'profesionales';

    protected $fillable = [
        'nombre', 'apellido', 'dni', 'matricula_nacional', 'matricula_provincial',
        'email', 'telefono', 'celular', 'zona_atencion_id', 'localidad',
        'especialidad', 'tipo_cirugias', 'quirofano', 'lugar_operacion',
        'radio_movilidad', 'cobertura', 'horario_atencion', 'observaciones',
        'archivo_1', 'archivo_2', 'archivo_3', 'archivo_4', 'archivo_5', 'archivo_6',
    ];

    public function zonaAtencion()
    {
        return $this->belongsTo(Zonas_atencion::class, 'zona_atencion_id');
    }
}
