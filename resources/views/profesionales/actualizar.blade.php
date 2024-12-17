@vite(['resources/css/app.css', 'resources/js/app.js'])


<p class="h2">Actualizar Especialista Medico</p>

<div class="row">
	<div class="col-md-12">
    
		<section class="panel">            
            <form action="{{ route('profesionales.update', $profesionales->id) }}" method="POST" role="form" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="panel-body">

                    <div class="row">
                        <div class="col">

                            <div class="form-group">
                                <label for="nombre" class="negrita">Nombre:</label> 
                                <div>
                                    <input class="form-control" placeholder="Nombre" required="required" name="nombre" type="text" id="nombre" value="{{ $profesionales->nombre }}"> 
                                </div>
                            </div>

                        </div>
                        <div class="col">

                            <div class="form-group">
                                <label for="nombre" class="negrita">Apellido:</label> 
                                <div>
                                    <input class="form-control" placeholder="Apellido" required="required" name="apellido" type="text" id="apellido" value="{{ $profesionales->apellido }}"> 
                                </div>
                            </div>

                        </div>
                        <div class="col">

                            <div class="form-group">
                                <label for="nombre" class="negrita">DNI:</label> 
                                <div>
                                    <input class="form-control" placeholder="DNI" required="required" name="dni" type="number" id="dni" value="{{ $profesionales->dni }}"> 
                                </div>
                            </div>

                        </div>
                        <div class="col">

                            <div class="form-group">
                                <label for="nombre" class="negrita">Matricula Nacional:</label> 
                                <div>
                                    <input class="form-control" placeholder="Matricula Nacional" name="matricula_nacional" type="number" id="matricula_nacional" value="{{ $profesionales->matricula_nacional }}"> 
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col">

                            <div class="form-group">
                                <label for="nombre" class="negrita">Matricula Provincial:</label> 
                                <div>
                                    <input class="form-control" placeholder="Matricula Provincial" name="matricula_provincial" type="number" id="matricula_provincial" value="{{ $profesionales->matricula_provincial }}"> 
                                </div>
                            </div>

                        </div>
                        <div class="col">

                            <div class="form-group">
                                <label for="nombre" class="negrita">Email:</label> 
                                <div>
                                    <input class="form-control" placeholder="Email"  name="email" type="email" id="email" value="{{ $profesionales->email }}"> 
                                </div>
                            </div>

                        </div>
                        <div class="col">

                            <div class="form-group">
                                <label for="nombre" class="negrita">Telefono:</label> 
                                <div>
                                    <input class="form-control" placeholder="Telefono" name="telefono" type="number" id="telefono" value="{{ $profesionales->telefono }}"> 
                                </div>
                            </div>

                        </div>
                        <div class="col">

                            <div class="form-group">
                                <label for="nombre" class="negrita">Celular:</label> 
                                <div>
                                    <input class="form-control" placeholder="Celular" name="celular" type="number" id="celular" value="{{ $profesionales->celular }}"> 
                                </div>
                            </div>
                            
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">

                            <div class="form-group">
                                <label for="nombre" class="negrita">Zona de Atencion:</label> 
                                <div>
                                    <select class="form-control" name="zona_atencion_id" required="required" id="zona_atencion_id">
                                        <option value="" disabled>--Seleccione Zona de Atención--</option>
                                        @foreach($zonasAtencion as $zonaAtencion)
                                            <option value="{{ $zonaAtencion->id }}" 
                                                {{ $profesionales->zona_atencion_id == $zonaAtencion->id ? 'selected' : '' }}>
                                                {{ $zonaAtencion->nombre }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="col">

                            <div class="form-group">
                                <label for="tipo_cirugias">Localidad:</label>
                                <div>
                                    <textarea class="form-control" placeholder="Localidad" id="localidad" rows="2" name="localidad">{{ $profesionales->localidad != '' ? $profesionales->localidad : '' }}</textarea>
                                </div>
                            </div>

                        </div>
                        <div class="col">

                            <div class="form-group">
                                <label for="nombre" class="negrita">Especialidad:</label> 
                                <div>
                                    <textarea class="form-control" placeholder="Especialidad" name="especialidad" type="text" id="especialidad" rows="2">{{ $profesionales->especialidad != '' ? $profesionales->especialidad : '' }}</textarea>
                                </div>
                            </div>

                        </div>
                        <div class="col">

                            <div class="form-group">
                                <label for="tipo_cirugias">Tipo de Cirugias:</label>
                                <div>
                                    <textarea class="form-control" placeholder="Tipo de Cirugias" id="tipo_cirugias" rows="2" name="tipo_cirugias">{{ $profesionales->tipo_cirugias != '' ? $profesionales->tipo_cirugias : '' }}</textarea>
                                </div>
                            </div>
                            
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">

                            <div class="form-group">
                                <label for="nombre" class="negrita">¿Quirofano, es necesario?:</label> 
                                <div>
                                    <select class="form-control" name="quirofano" id="quirofano">
                                        <option value="0" {{ $profesionales->quirofano == 0 ? 'selected' : '' }}>No</option>
                                        <option value="1" {{ $profesionales->quirofano == 1 ? 'selected' : '' }}>Sí</option>
                                    </select>
                                </div>
                            </div>                           

                        </div>
                        <div class="col">

                            <div class="form-group">
                                <label for="nombre" class="negrita">Lugar de Atencion:</label> 
                                <div>
                                    <textarea class="form-control" placeholder="Lugar de Atencion" id="lugar_operacion" rows="2" name="lugar_operacion">{{ $profesionales->lugar_operacion != '' ? $profesionales->lugar_operacion : '' }}</textarea>
                                </div>
                            </div>

                        </div>
                        <div class="col">

                            <div class="form-group">
                                <label for="nombre" class="negrita">Radio de Movilidad:</label> 
                                <div>
                                    <textarea class="form-control" placeholder="Radio de Movilidad"  id="radio_movilidad" rows="2" name="radio_movilidad">{{ $profesionales->radio_movilidad != '' ? $profesionales->radio_movilidad : '' }}</textarea>
                                </div>
                            </div>

                        </div>
                        <div class="col">

                            <div class="form-group">
                                <label for="nombre" class="negrita">Cobertura:</label> 
                                <div>
                                    <textarea class="form-control" placeholder="Cobertura" id="cobertura" rows="2" name="cobertura">{{ $profesionales->cobertura != '' ? $profesionales->cobertura : '' }}</textarea>
                                </div>
                            </div>
                            
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">

                            <div class="form-group">
                                <label for="nombre" class="negrita">Horario de Atencion:</label> 
                                <div>
                                    <input class="form-control" placeholder="Horario de Atencion" name="horario_atencion" type="text" id="horario_atencion" rows="2" value="{{ $profesionales->horario_atencion }}"> 
                                </div>
                            </div>

                        </div>
                        <div class="col">

                            <div class="form-group">
                                <label for="nombre" class="negrita">Observaciones:</label> 
                                <div>
                                    <textarea class="form-control" placeholder="Observaciones" name="observaciones" type="text" id="observaciones" rows="2"> {{ $profesionales->observaciones != '' ? $profesionales->observaciones : '' }} </textarea>
                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="row">

                        <div class="col">

                            <div class="form-group">
                                <label for="archivo_1" class="negrita">Adjuntar archivo:</label>
                                <div>
                                    <input type="file" class="form-control" name="archivo_1[]" id="archivo_1" accept=".jpg, .jpeg, .png, .pdf, .doc, .docx, .xls, .xlsx" multiple>
                                </div>
                            </div>



                            <!-- Checkbox para eliminar el archivo actual -->
                            @if ($profesionales->archivo_1)
                                <div>
                                    <input type="checkbox" name="eliminar_archivo" id="eliminar_archivo">
                                    <label for="eliminar_archivo">Eliminar archivo actual</label>
                                </div>
                            @endif

                        </div>
                    </div>

                    
                    <button type="submit" class="btn btn-info">Actualizar</button>
                    <a href="{{ route('profesionales.index') }}" class="btn btn-warning">Cancelar</a>

                    <br>
                    <br> 
                </div>

            </form>
		</section>
	</div>
</div>




 

                                                          
