@vite(['resources/css/app.css', 'resources/js/app.js'])


 
<p class="h2">Listado de Especialistas Medicos</p>


    <div>
        <form action="{{ route('profesionales.index') }}" method="GET">
        
            <div class="row">
                <div class="col-2">

                        <select name="zona_atencion" id="zona_atencion" class="form-control">
                            <option value="">Seleccione una zona</option>
                            @foreach($zonas as $zona)
                                <option value="{{ $zona->id }}" {{ request('zona_atencion') == $zona->id ? 'selected' : '' }}>
                                    {{ $zona->nombre }} <!-- Cambia 'nombre' por el campo que desees mostrar -->
                                </option>
                            @endforeach
                        </select>

                </div>

                <div class="col-2">
                    <button type="submit" class="btn btn-primary">Filtrar</button>
                </div>
            </div>
        </form>

        <form action="{{ route('profesionales.index') }}" method="GET">
            
            <div class="row">
                <div class="col-2">
                    <div class="form-group">
                        <input name="localidad" id="localidad" class="form-control" placeholder="Ingrese una Localidad">
                    </div>
                </div>
            

                <div class="col-2">
                    <button type="submit" class="btn btn-primary">Filtrar</button>
                </div>
            </div>
        </form>
    </div>
    <div><a href="{{ route('profesionales.crear') }}" class="btn btn-success mt-4 ml-3">  Agregar </a></div>  

    @if($profesionales->isEmpty())
            <p>No hay profesionales disponibles.</p>

        @else            

        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>DNI</th>
                    <th>Matricula Nacional</th>
                    <th>Matricula Provincial</th>
                    <th>Email</th>
                    <th>Telefono</th>
                    <th>Celular</th>
                    <th>Zona de Atencion</th>
                    <th>Localidad</th>
                    <th>Especialidad</th>
                    <th>Tipo Cirugias</th>
                    <th>Quirofano</th>
                    <th>Lugar de Operacion</th>
                    <th>Radio Movilidad</th>
                    <th>Cobertura</th>
                    <th>Horario de Atencion</th>
                    <th>Observaciones</th>
                    <th>Adjunto</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>                

                @foreach($profesionales as $profesional)

                    <tr>
                        <td class="v-align-middle">{{$profesional->nombre}}</td>
                        <td class="v-align-middle">{{$profesional->apellido}}</td>
                        <td class="v-align-middle">{{$profesional->dni}}</td>

                        <td class="v-align-middle">{{$profesional->matricula_nacional}}</td>
                        <td class="v-align-middle">{{$profesional->matricula_provincial}}</td>
                        <td class="v-align-middle">{{$profesional->email}}</td>
                        <td class="v-align-middle">{{$profesional->telefono}}</td>
                        <td class="v-align-middle">{{$profesional->celular}}</td>

                        <td class="v-align-middle">{{$profesional->zonaAtencion->nombre}}</td>
                        <td class="v-align-middle">{{$profesional->localidad}}</td>
                        <td class="v-align-middle">{{$profesional->especialidad}}</td>
                        <td class="v-align-middle">{{$profesional->tipo_cirugias}}</td>
                        <td class="v-align-middle">{{$profesional->quirofano == 1 ? 'SI' : 'NO'}}</td>
                        <td class="v-align-middle">{{$profesional->lugar_operacion}}</td>
                        <td class="v-align-middle">{{$profesional->radio_movilidad}}</td>
                        <td class="v-align-middle">{{$profesional->cobertura}}</td>
                        <td class="v-align-middle">{{$profesional->horario_atencion}}</td>       
                        <td class="v-align-middle">{{$profesional->observaciones}}</td>      

                        <td class="v-align-middle">
                            <!-- Mostrar archivo existente -->
                            @if ($profesional->archivo_1)
                                <div>
                                    <label for="archivo_actual" class="negrita">Archivo actual:</label>
                                    <div>
                                        @if (in_array(pathinfo($profesional->archivo_1, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png']))
                                            <img src="{{ asset('storage/' . $profesional->archivo_1) }}" alt="Archivo actual" style="max-width: 200px;">
                                        @else
                                            <a href="{{ asset('storage/' . $profesional->archivo_1) }}" target="_blank">Descargar archivo</a>
                                        @endif
                                    </div>
                                </div>
                            @else
                                <p>No hay archivo disponible.</p>
                            @endif
                        </td>                                   

                        <td class="v-align-middle">
            
                            <form action="{{ route('profesionales.eliminar',$profesional->id) }}" method="GET" class="form-horizontal" role="form" onsubmit="return confirmarEliminar()">
            
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <a href="{{ route('profesionales.actualizar',$profesional->id) }}" class="btn btn-primary">Editar</a>
            
                                <button type="submit" class="btn btn-danger">Eliminar</button>
            
                            </form>
            
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>


<script type="text/javascript">
 
  function confirmarEliminar()
  {
    var x = confirm("Estas seguro de Eliminar?");
    if (x)
         return true;
    else
         return false;
  }
 
</script>