@vite(['resources/css/app.css', 'resources/js/app.js'])



<p class="h2">Crear Especialista Medico</p>

<div class="panel-body">                  
 
   
  <section class="example mt-4">
 
    <form action="{{ route('profesionales.store') }}" method="POST" role="form" enctype="multipart/form-data">
 
        <div class="row">
        <div class="col-md-12">
            <section class="panel"> 
                <div class="panel-body">
                            
                    <!--  Acá el formulario en Limpio para crear un nuevo registro -->
                    @csrf

                    <div class="row">
                        <div class="col" >
                            <div class="form-group">
                                <label for="nombre" class="negrita">Nombre:</label> 
                                <div>
                                    <input class="form-control" placeholder="Nombre" required="required" name="nombre" type="text" id="nombre"> 
                                </div>
                            </div>
                        </div>

                        <div class="col" >
                            <div class="form-group">
                                <label for="nombre" class="negrita">Apellido:</label> 
                                <div>
                                    <input class="form-control" placeholder="Apellido" required="required" name="apellido" type="text" id="apellido"> 
                                </div>
                            </div>
                        </div>

                        <div class="col" >
                            <div class="form-group">
                                <label for="nombre" class="negrita">DNI:</label> 
                                <div>
                                    <input class="form-control" placeholder="DNI" required="required" name="dni" type="number" id="dni"> 
                                </div>
                            </div>
                        </div>

                        <div class="col" >
                            <div class="form-group">
                                <label for="nombre" class="negrita">Matricula Nacional:</label> 
                                <div>
                                    <input class="form-control" placeholder="Matricula Nacional" required="required" name="matricula_nacional" type="number" id="matricula_nacional"> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>

                    <div class="row">
                        <div class="col">

                            <div class="form-group">
                                <label for="nombre" class="negrita">Matricula Provincial:</label> 
                                <div>
                                    <input class="form-control" placeholder="Matricula Provincial" required="required" name="matricula_provincial" type="number" id="matricula_provincial"> 
                                </div>
                            </div>

                        </div>
                        <div class="col">

                            <div class="form-group">
                                <label for="nombre" class="negrita">Email:</label> 
                                <div>
                                    <input class="form-control" placeholder="Email" required="required" name="email" type="email" id="email"> 
                                </div>
                            </div>

                        </div>
                        <div class="col">

                            <div class="form-group">
                                <label for="nombre" class="negrita">Telefono:</label> 
                                <div>
                                    <input class="form-control" placeholder="Telefono" required="required" name="telefono" type="number" id="telefono"> 
                                </div>
                            </div>

                        </div>
                        <div class="col">

                            <div class="form-group">
                                <label for="nombre" class="negrita">Celular:</label> 
                                <div>
                                    <input class="form-control" placeholder="Celular" required="required" name="celular" type="number" id="celular"> 
                                </div>
                            </div>

                        </div>
                    </div>
                    <br>
                    <br> 

                    <div class="row">
                        <div class="col">
                            <div class="form-group">

                                <label for="nombre" class="negrita">Zona de Atencion:</label>
                                <div>
                                    <select class="form-control" name="zona_atencion_id" required="required" id="zona_atencion_id">
                                        
                                        <option value="" selected="selected">--Seleccione Zona de Atención--</option>

                                        @foreach($zonasAtencion as $zonaAtencion)
                                        <option value="{{$zonaAtencion->id}}">{{$zonaAtencion->nombre}}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col">

                            <div class="form-group">
                                <label for="localidad">Localidad</label>
                                <div>
                                    <textarea class="form-control" placeholder="Localidad" id="localidad" rows="2"></textarea>
                                </div>
                            </div>

                        </div>

                        <div class="col">

                            <div class="form-group">
                                <label for="nombre" class="negrita">Especialidad:</label> 
                                <div>
                                    <textarea class="form-control" placeholder="Especialidad" required="required" name="especialidad" type="text" id="especialidad" rows="2"></textarea>
                                </div>
                            </div>

                        </div>
                        <div class="col">

                            <div class="form-group">
                                <label for="tipo_cirugias">Tipo de Cirugias:</label>
                                <div>
                                    <textarea class="form-control" placeholder="Tipo de Cirugias" id="tipo_cirugias" rows="2"></textarea>
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
                                        <option value="0">No</option>
                                        <option value="1">Sí</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="col">

                            <div class="form-group">
                                <label for="nombre" class="negrita">Lugar de Atencion:</label> 
                                <div>
                                    <textarea class="form-control" placeholder="Lugar de Atencion" id="lugar_operacion" rows="2"></textarea>
                                </div>
                            </div>

                        </div>
                        <div class="col">

                            <div class="form-group">
                                <label for="nombre" class="negrita">Radio de Movilidad:</label> 
                                <div>
                                    <textarea class="form-control" placeholder="Radio de Movilidad" id="radio_movilidad" rows="2"></textarea>
                                </div>
                            </div>

                        </div>
                        <div class="col">

                            <div class="form-group">
                                <label for="nombre" class="negrita">Cobertura:</label> 
                                <div>
                                    <textarea class="form-control" placeholder="Cobertura" id="cobertura" rows="2"></textarea>
                                </div>
                            </div>

                        </div>
                        
                    </div>
                    <br>

                    <div class="row">

                        <div class="col">

                            <div class="form-group">
                                <label for="nombre" class="negrita">Horario de Atencion:</label> 
                                <div>
                                    <input class="form-control" placeholder="Horario de Atencion" required="required" name="horario_atencion" type="text" id="horario_atencion"> 
                                </div>
                            </div>

                        </div>

                        <div class="col">

                            <div class="form-group">
                                <label for="nombre" class="negrita">Observaciones:</label> 
                                <div>
                                    <textarea class="form-control" placeholder="Observaciones" id="observaciones" rows="2"></textarea>
                                </div>
                            </div>

                        </div>

                    </div>
                    <br>
                    <br> 

                    <div class="row">
                        <div class="col">

                            <div class="form-group">
                                <label for="archivos">Adjuntar Archivos</label>
                                <input type="file" class="form-control" name="archivo_1[]" id="archivo_1" accept=".jpg, .jpeg, .png, .pdf, .doc, .docx, .xls, .xlsx" multiple>
                            </div>

                        </div>

                    </div>

                    <br>

                    <br>

                    <button type="submit" class="btn btn-info">Guardar</button>
                    <a href="{{ route('profesionales.index') }}" class="btn btn-warning">Cancelar</a>

                    <br>
                    <br> 
                </div>
            </section>
        </div>
        </div>
                                                          
    </form>                                      
                                    
  </section>
 
</div>