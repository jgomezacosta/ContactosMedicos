<!-- Scripts -->

<script src="{{ secure_asset('js/app.js') }}" defer></script>   

<!-- Styles -->

<link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">


<p class="h2">Actualizar Especialista Medico</p>

<div class="row">
	<div class="col-md-12">
    
		<section class="panel">            
            <form action="{{ route('profesionales.update', $profesionales->id) }}" method="POST" role="form" enctype="multipart/form-data">
                @csrf

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
                                    <input class="form-control" placeholder="Matricula Nacional" required="required" name="matricula_nacional" type="number" id="matricula_nacional" value="{{ $profesionales->matricula_nacional }}"> 
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col">

                            <div class="form-group">
                                <label for="nombre" class="negrita">Matricula Provincial:</label> 
                                <div>
                                    <input class="form-control" placeholder="Matricula Provincial" required="required" name="matricula_provincial" type="number" id="matricula_provincial" value="{{ $profesionales->matricula_provincial }}"> 
                                </div>
                            </div>

                        </div>
                        <div class="col">

                            <div class="form-group">
                                <label for="nombre" class="negrita">Email:</label> 
                                <div>
                                    <input class="form-control" placeholder="Email" required="required" name="email" type="email" id="email" value="{{ $profesionales->email }}"> 
                                </div>
                            </div>

                        </div>
                        <div class="col">

                            <div class="form-group">
                                <label for="nombre" class="negrita">Telefono:</label> 
                                <div>
                                    <input class="form-control" placeholder="Telefono" required="required" name="telefono" type="number" id="telefono" value="{{ $profesionales->telefono }}"> 
                                </div>
                            </div>

                        </div>
                        <div class="col">

                            <div class="form-group">
                                <label for="nombre" class="negrita">Celular:</label> 
                                <div>
                                    <input class="form-control" placeholder="Celular" required="required" name="celular" type="number" id="celular" value="{{ $profesionales->celular }}"> 
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
                                    <textarea class="form-control" placeholder="Localidad" id="localidad" rows="2" required="required" name="localidad">{{ $profesionales->localidad != '' ? $profesionales->localidad : '' }}</textarea>
                                </div>
                            </div>

                        </div>
                        <div class="col">

                            <div class="form-group">
                                <label for="nombre" class="negrita">Especialidad:</label> 
                                <div>
                                    <input class="form-control" placeholder="Especialidad" required="required" name="especialidad" type="text" id="especialidad" value="{{ $profesionales->especialidad }}"> 
                                </div>
                            </div>

                        </div>
                        <div class="col">

                            <div class="form-group">
                                <label for="tipo_cirugias">Tipo de Cirugias:</label>
                                <div>
                                    <textarea class="form-control" placeholder="Tipo de Cirugias" id="tipo_cirugias" rows="2" required="required" name="tipo_cirugias">{{ $profesionales->tipo_cirugias != '' ? $profesionales->tipo_cirugias : '' }}</textarea>
                                </div>
                            </div>
                            
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">

                            <div class="form-group">
                                <label for="nombre" class="negrita">¿Quirofano, es necesario?:</label> 
                                <div>
                                    <select class="form-control" name="quirofano" required="required" id="quirofano">
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
                                    <textarea class="form-control" placeholder="Lugar de Atencion" id="lugar_operacion" rows="2" required="required" name="lugar_operacion">{{ $profesionales->lugar_operacion != '' ? $profesionales->lugar_operacion : '' }}</textarea>
                                </div>
                            </div>

                        </div>
                        <div class="col">

                            <div class="form-group">
                                <label for="nombre" class="negrita">Radio de Movilidad:</label> 
                                <div>
                                    <textarea class="form-control" placeholder="Radio de Movilidad"  id="radio_movilidad" rows="2" required="required" name="radio_movilidad">{{ $profesionales->radio_movilidad != '' ? $profesionales->radio_movilidad : '' }}</textarea>
                                </div>
                            </div>

                        </div>
                        <div class="col">

                            <div class="form-group">
                                <label for="nombre" class="negrita">Cobertura:</label> 
                                <div>
                                    <textarea class="form-control" placeholder="Cobertura" id="cobertura" rows="2" required="required" name="cobertura">{{ $profesionales->cobertura != '' ? $profesionales->cobertura : '' }}</textarea>
                                </div>
                            </div>
                            
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">

                            <div class="form-group">
                                <label for="nombre" class="negrita">Horario de Atencion:</label> 
                                <div>
                                    <input class="form-control" placeholder="Horario de Atencion" required="required" name="horario_atencion" type="text" id="horario_atencion" value="{{ $profesionales->horario_atencion }}"> 
                                </div>
                            </div>

                        </div>
                        <div class="col">

                            <div class="form-group">
                                <label for="nombre" class="negrita">Observaciones:</label> 
                                <div>
                                    <input class="form-control" placeholder="Observaciones" name="observaciones" type="text" id="observaciones" value="{{ $profesionales->observaciones }}"> 
                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="row">

                        <div class="col">

                            <div class="form-group">
                                <label for="img" class="negrita">Adjuntar archivo 1:</label>
                                <div>
                                    <input name="archivo_1" type="file" id="archivo_1" value="{{ $profesionales->archivo_1 }}"> 
                                </div>
                            </div>

                        </div>

                        <div class="col">

                            <div class="form-group">
                                <label for="img" class="negrita">Adjuntar archivo 2:</label>
                                <div>
                                    <input name="archivo_2" type="file" id="archivo_2" value="{{ $profesionales->archivo_2 }}"> 
                                </div>
                            </div>
                            
                        </div>

                        <div class="col">

                            <div class="form-group">
                                <label for="img" class="negrita">Adjuntar archivo 3:</label>
                                <div>
                                    <input name="archivo_3" type="file" id="archivo_3" value="{{ $profesionales->archivo_3 }}"> 
                                </div>
                            </div>

                        </div>
                        <div class="col">

                            <div class="form-group">
                                <label for="img" class="negrita">Adjuntar archivo 4:</label>
                                <div>
                                    <input name="archivo_4" type="file" id="archivo_4" value="{{ $profesionales->archivo_4 }}"> 
                                </div>
                            </div>

                        </div>
                        <div class="col">

                            <div class="form-group">
                                <label for="img" class="negrita">Adjuntar archivo 5:</label>
                                <div>
                                    <input name="archivo_5" type="file" id="archivo_5" value="{{ $profesionales->archivo_5 }}"> 
                                </div>
                            </div>

                        </div>
                        <div class="col">

                            <div class="form-group">
                                <label for="img" class="negrita">Adjuntar archivo 6:</label>
                                <div>
                                    <input name="archivo_6" type="file" id="archivo_6" value="{{ $profesionales->archivo_6 }}"> 
                                </div>
                            </div>
                            
                        </div>
                    </div>

                    
                    <button type="submit" class="btn btn-info">Actualizar</button>
                    <a href="{{ route('profesionales') }}" class="btn btn-warning">Cancelar</a>

                    <br>
                    <br> 
                </div>

            </form>
		</section>
	</div>
</div>




 

                                                          
