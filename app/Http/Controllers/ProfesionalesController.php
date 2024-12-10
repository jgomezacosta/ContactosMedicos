<?php

namespace App\Http\Controllers;

use App\Models\Profesionales;
use App\Models\Zonas_atencion;
use Illuminate\Http\Request;

use DB;
use Input;
use Storage;
use Session;
use Redirect;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ProfesionalesController extends Controller
{
    // Crear un Registro (Create)

    public function crear()
    {
        $profesionales = Profesionales::all();
        $zonasAtencion = Zonas_atencion::all();

        return view('profesionales.crear', [
            'profesionales' => $profesionales,
            'zonasAtencion' => $zonasAtencion,
        ]);
    }

    // Proceso de Creación de un Registro

    public function store(Request $request)
    {
        // Validar los datos recibidos
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'dni' => 'required|numeric|unique:profesionales,dni',
            'matricula_nacional' => 'nullable|string|max:255',
            'matricula_provincial' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'telefono' => 'nullable|string|max:20',
            'celular' => 'nullable|string|max:20',
            'zona_atencion_id' => 'nullable|exists:zonas_atencion,id',
            'localidad' => 'nullable|string|max:255',
            'especialidad' => 'nullable|string|max:255',
            'tipo_cirugias' => 'nullable|string|max:255',
            'quirofano' => 'nullable|string|max:255',
            'lugar_operacion' => 'nullable|string|max:255',
            'radio_movilidad' => 'nullable|string|max:255',
            'cobertura' => 'nullable|string|max:255',
            'horario_atencion' => 'nullable|string|max:255',
            'observaciones' => 'nullable|string|max:255',
            'archivo_1' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:51200',
            'archivo_2' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:51200',
            'archivo_3' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:51200',
            'archivo_4' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:51200',
            'archivo_5' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:51200',
            'archivo_6' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:51200',
        ]);

        // Instanciar el modelo y asignar los datos
        $profesionales = new Profesionales($validated);

        // Manejar archivos subidos
        foreach (['archivo_1', 'archivo_2', 'archivo_3', 'archivo_4', 'archivo_5', 'archivo_6'] as $archivo) {
            if ($request->hasFile($archivo)) {
                $profesionales->{$archivo} = $request->file($archivo)->store('uploads', 'public');
            }
        }

        // Guardar el registro en la base de datos
        $profesionales->save();

        // Redirigir con un mensaje de éxito
        return redirect()->route('profesionales.index')->with('message', 'Guardado satisfactoriamente!');
    }


    // Leer Registros (Read) 
 
    public function index(Request $request)
    {
        // Obtener todas las zonas de atención
        $zonas = Zonas_atencion::all();

        // Construir la consulta de profesionales
        $query = Profesionales::where('borrado', 0)->with('zonaAtencion');

        // Filtrar por zona de atención si se envía un parámetro válido
        if ($request->filled('zona_atencion')) {
            $query->where('zona_atencion_id', $request->zona_atencion);
        }

        // Obtener los resultados
        $profesionales = $query->get();

        // Retornar la vista con los datos
        return view('profesionales.index', compact('profesionales', 'zonas'));
    }

    
    //  Actualizar un registro (Update)
 
    public function actualizar(Request $request, $id)
    {
        // Obtener el profesional y cargar la relación 'zonaAtencion'
        $profesionales = Profesionales::where('borrado', 0)
            ->where('id', $id)
            ->with('zonaAtencion') // Carga la relación 'zonaAtencion'
            ->first(); // Usar first() en lugar de get() para obtener un solo profesional

        if (!$profesionales) {
            // Si no se encuentra el profesional, redirigir con un mensaje de error
            return redirect()->route('profesionales.index')->with('error', 'Profesional no encontrado.');
        }

        // Obtener todas las zonas de atención
        $zonasAtencion = Zonas_atencion::all();

        // Retornar la vista con los datos del profesional y las zonas de atención
        return view('profesionales.actualizar', compact('profesionales', 'zonasAtencion'));
    }



    public function update(Request $request, $id)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'dni' => 'required|numeric|unique:profesionales,dni',
            'matricula_nacional' => 'nullable|string|max:255',
            'matricula_provincial' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'telefono' => 'nullable|string|max:20',
            'celular' => 'nullable|string|max:20',
            'zona_atencion_id' => 'nullable|exists:zonas_atencion,id',
            'localidad' => 'nullable|string|max:255',
            'especialidad' => 'nullable|string|max:255',
            'tipo_cirugias' => 'nullable|string|max:255',
            'quirofano' => 'nullable|string|max:255',
            'lugar_operacion' => 'nullable|string|max:255',
            'radio_movilidad' => 'nullable|string|max:255',
            'cobertura' => 'nullable|string|max:255',
            'horario_atencion' => 'nullable|string|max:255',
            'observaciones' => 'nullable|string|max:255',

            // Validaciones para los archivos
            'archivo_1' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:51200',
            'archivo_2' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:51200',
            'archivo_3' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:51200',
            'archivo_4' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:51200',
            'archivo_5' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:51200',
            'archivo_6' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:51200',
        ]);

        // Obtener el profesional a actualizar
        $profesionales = Profesionales::findOrFail($id);

        // Logueo los datos recibidos
        Log::info($request->all()); 

        // Asigno los valores del formulario al modelo
        $profesionales->nombre = $request->nombre;
        $profesionales->apellido = $request->apellido;
        $profesionales->dni = $request->dni;
        $profesionales->matricula_nacional = $request->matricula_nacional;
        $profesionales->matricula_provincial = $request->matricula_provincial;
        $profesionales->email = $request->email;
        $profesionales->telefono = $request->telefono;
        $profesionales->celular = $request->celular;
        $profesionales->zona_atencion_id = $request->zona_atencion_id;
        $profesionales->especialidad = $request->especialidad;
        $profesionales->localidad = $request->localidad;
        $profesionales->tipo_cirugias = $request->tipo_cirugias;
        $profesionales->quirofano = $request->quirofano;
        $profesionales->lugar_operacion = $request->lugar_operacion;
        $profesionales->radio_movilidad = $request->radio_movilidad;
        $profesionales->cobertura = $request->cobertura;
        $profesionales->horario_atencion = $request->horario_atencion;
        $profesionales->observaciones = $request->observaciones;

        // Subir los archivos si existen
        $archivos = ['archivo_1', 'archivo_2', 'archivo_3', 'archivo_4', 'archivo_5', 'archivo_6'];
        foreach ($archivos as $archivo) {
            if ($request->hasFile($archivo)) {
                $path = $request->file($archivo)->store('uploads', 'public');
                $profesionales->$archivo = $path;
            }
        }

        // Actualizar el profesional
        $profesionales->save();

        // Redirigir con mensaje de éxito
        Session::flash('message', 'Profesional actualizado satisfactoriamente!');
        return Redirect::to('profesionales');
    }


    public function eliminar($id)
    {
        // Buscar el profesional por su ID
        $profesionales = Profesionales::findOrFail($id);

        // Aquí si fuera necesario, eliminarías la imagen asociada con el profesional,
        // por ejemplo si tienes una columna de imagen y deseas borrar los archivos asociados.
        // Deberías usar Storage::delete() si la imagen está almacenada en el sistema de archivos.
        /*
        if ($profesionales->img) {
            $imagen = explode(",", $profesionales->img);
            Storage::delete($imagen);
        }
        */

        // Establecer el campo 'borrado' en 1 para realizar un borrado lógico
        $profesionales->borrado = 1;
        $profesionales->save();

        // Mostrar un mensaje flash y redirigir a la página de profesionales
        Session::flash('message', 'Eliminado satisfactoriamente!');
        return Redirect::to('profesionales');
    }
    
    



}

