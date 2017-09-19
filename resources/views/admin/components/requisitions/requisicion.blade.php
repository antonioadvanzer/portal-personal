<form name="showRequisition">
    
    <div ng-show="sending">
        <div class="progress ng-scope">
          <div class="progress-bar progress-bar-primary progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="40" style="width: 100%">
            <span class="sr-only">100% Complete (success)</span>
          </div>
        </div>
        <h2>Enviando datos ...</h2>
    </div>
    
    <div ng-if="!sending">
    
    <div class="row">
        
        <div class="col-md-6">
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-estado">Estado</span>
                <!--<input type="text" class="form-control with-primary-addon" id="inputRequisitionEstado" name="inputRequisitionEstado" placeholder="" ng-model="formRequisition.inputRequisitionEstado" readonly>-->
                <label class="form-control with-primary-addon">@{{formRequisition.inputRequisitionEstado}}</label>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-director_area">Solicitante</span>
                <!--<input type="text" class="form-control with-primary-addon" id="inputRequisitionColaborador" name="inputRequisitionColaborador" placeholder="" ng-model="formRequisition.inputRequisitionColaborador" readonly>-->
                <label class="form-control with-primary-addon">@{{formRequisition.inputRequisitionColaborador}}</label>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-director_area">Director de Area</span>
                <!--<input type="text" class="form-control with-primary-addon" id="inputRequisitionDirector" name="inputRequisitionDirector" placeholder="" ng-model="formRequisition.inputRequisitionDirector" readonly>-->
                <label class="form-control with-primary-addon">@{{formRequisition.inputRequisitionDirector}}</label>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-autorizador">Autorizador</span>
                <!--<input type="text" class="form-control with-primary-addon" id="inputRequisitionAutorizador" name="inputRequisitionAutorizador" placeholder="" ng-model="formRequisition.inputRequisitionAutorizador" readonly>-->
                <label class="form-control with-primary-addon">@{{formRequisition.inputRequisitionAutorizador}}</label>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-fecha_solicitud">Fecha de Solicitud</span>
                <!--<input type="text" class="form-control with-primary-addon" id="inputRequisitionFechaSolicitud" name="inputRequisitionFechaSolicitud" ng-model="formRequisition.inputRequisitionFechaSolicitud" placeholder="" readonly>-->
                <label class="form-control with-primary-addon">@{{formRequisition.inputRequisitionFechaSolicitud}}</label>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-fecha_ingreso">Fecha Estimada de Ingreso</span>
                <!--<input type="text" class="form-control with-primary-addon" id="inputRequisitionFechaIngreso" name="inputRequisitionFechaIngreso" placeholder="" ng-model="formRequisition.inputRequisitionFechaIngreso" readonly>-->
                <label class="form-control with-primary-addon">@{{formRequisition.inputRequisitionFechaIngreso}}</label>
            </div>
                        
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-area">&Aacute;rea</span>
                <!--<input type="text" class="form-control with-primary-addon" id="inputRequisitionArea" name="inputRequisitionArea" placeholder="" ng-model="formRequisition.inputRequisitionArea" readonly>-->
                <label class="form-control with-primary-addon">@{{formRequisition.inputRequisitionArea}}</label>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-track">Track</span>
                <!--<input type="text" class="form-control with-primary-addon" id="inputRequisitionTrack" name="inputRequisitionTrack" placeholder="" ng-model="formRequisition.inputRequisitionTrack" readonly>-->
                <label class="form-control with-primary-addon">@{{formRequisition.inputRequisitionTrack}}</label>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-posicion">Posici&oacute;n</span>
                <!--<input type="text" class="form-control with-primary-addon" id="inputRequisitionPosicion" name="inputRequisitionPosicion" placeholder="" ng-model="formRequisition.inputRequisitionPosicion" readonly>-->
                <label class="form-control with-primary-addon">@{{formRequisition.inputRequisitionPosicion}}</label>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-empresa">Empresa</span>
                <!--<input type="text" class="form-control with-primary-addon" id="inputRequisitionEmpresa" name="inputRequisitionEmpresa" placeholder="" ng-model="formRequisition.inputRequisitionEmpresa" readonly>-->
                <label class="form-control with-primary-addon">@{{formRequisition.inputRequisitionEmpresa}}</label>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-tipo">Tipo</span>
                <!--<input type="text" class="form-control with-primary-addon" id="inputRequisitionTipoPosicion" name="inputRequisitionTipoPosicion" placeholder="" ng-model="formRequisition.inputRequisitionTipoPosicion" readonly>-->
                <label class="form-control with-primary-addon">@{{formRequisition.inputRequisitionTipoPosicion}}</label>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-sutituye_a">Sustituye a</span>
                <!--<input type="text" class="form-control" id="inputRequisitionSustituyeA" name="inputRequisitionSustituyeA" ng-model="formRequisition.inputRequisitionSustituyeA" placeholder="" readonly>-->
                <label class="form-control with-primary-addon">@{{formRequisition.inputRequisitionSustituyeA}}</label>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-proyecto">Proyecto</span>
                <!--<input type="text" class="form-control" id="inputRequisitionProyecto" name="inputRequisitionProyecto" ng-model="formRequisition.inputRequisitionProyecto" placeholder="" readonly>-->
                <label class="form-control with-primary-addon">@{{formRequisition.inputRequisitionProyecto}}</label>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-clave_proyecto">Clave del Proyecto</span>
                <!--<input type="text" class="form-control" id="inputRequisitionClaveProyecto" name="inputRequisitionClaveProyecto" ng-model="formRequisition.inputRequisitionClaveProyecto" placeholder="" readonly>-->
                <label class="form-control with-primary-addon">@{{formRequisition.inputRequisitionClaveProyecto}}</label>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-costo">Costo Máximo</span>
                <!--<input type="text" class="form-control with-primary-addon" id="inputRequisitionCostoMaximo" name="inputRequisitionCostoMaximo" placeholder="" ng-model="formRequisition.inputRequisitionCostoMaximo" readonly>-->
                <label class="form-control with-primary-addon">@{{formRequisition.inputRequisitionCostoMaximo}}</label>
            </div>
            
        </div>
        
        <div class="col-md-6">

            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-recidencia">Residencia</span>
                <!--<input type="text" class="form-control with-primary-addon" id="inputRequisitionRecidencia" name="inputRequisitionRecidencia" placeholder="" ng-model="formRequisition.inputRequisitionRecidencia" readonly>-->
                <label class="form-control with-primary-addon">@{{formRequisition.inputRequisitionRecidencia}}</label>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-lugar_trabajo">Lugar de Trabajo</span>
                <!--<input type="text" class="form-control with-primary-addon" id="inputRequisitionLugarTrabajo" name="inputRequisitionLugarTrabajo" placeholder="" ng-model="formRequisition.inputRequisitionLugarTrabajo" readonly>-->
                <label class="form-control with-primary-addon">@{{formRequisition.inputRequisitionLugarTrabajo}}</label>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-domicilio_cliente">Domicilio del Cliente</span>
                <!--<input type="text" class="form-control" id="inputRequisitionDomicilioCliente" name="inputRequisitionDomicilioCliente" ng-model="formRequisition.inputRequisitionDomicilioCliente" placeholder="" readonly>-->
                <label class="form-control with-primary-addon">@{{formRequisition.inputRequisitionDomicilioCliente}}</label>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-contratacion">Contrataci&oacute;n</span>
                <!--<input type="text" class="form-control with-primary-addon" id="inputRequisitionContratacion" name="inputRequisitionContratacion" placeholder="" ng-model="formRequisition.inputRequisitionContratacion" readonly>-->
                <label class="form-control with-primary-addon">@{{formRequisition.inputRequisitionContratacion}}</label>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-evaluador_tecnico">Evaluador T&eacute;cnico</span>
                <!--<input type="text" class="form-control" id="inputRequisitionEvaluadorTecnico" name="inputRequisitionEvaluadorTecnico" ng-model="formRequisition.inputRequisitionEvaluadorTecnico" placeholder="" readonly>-->
                <label class="form-control with-primary-addon">@{{formRequisition.inputRequisitionEvaluadorTecnico}}</label>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-motivo">Disponibilidad de Viajar</span>
                <!--<input type="text" class="form-control with-primary-addon" id="inputRequisitionDisponibilidadViajar" name="inputRequisitionDisponibilidadViajar" placeholder="" ng-model="formRequisition.inputRequisitionDisponibilidadViajar" readonly>-->
                <label class="form-control with-primary-addon">@{{formRequisition.inputRequisitionDisponibilidadViajar}}</label>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-edad1">Edad de</span>
                <!--<input type="text" class="form-control with-primary-addon" id="inputRequisitionEdadDe" name="inputRequisitionEdadDe" placeholder="" ng-model="formRequisition.inputRequisitionEdadDe" readonly>-->
                <label class="form-control with-primary-addon">@{{formRequisition.inputRequisitionEdadDe}}</label>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-edad2">A</span>
                <!--<input type="text" class="form-control with-primary-addon" id="inputRequisitionA" name="inputRequisitionA" placeholder="" ng-model="formRequisition.inputRequisitionA" readonly>-->
                <label class="form-control with-primary-addon">@{{formRequisition.inputRequisitionA}}</label>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-sexo">Sexo</span>
                <!--<input type="text" class="form-control with-primary-addon" id="inputRequisitionSexo" name="inputRequisitionSexo" placeholder="" ng-model="formRequisition.inputRequisitionSexo" readonly>-->
                <label class="form-control with-primary-addon">@{{formRequisition.inputRequisitionSexo}}</label>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-nivel_estudios">Nivel de estudios</span>
                <!--<input type="text" class="form-control with-primary-addon" id="inputRequisitionNivelEstudios" name="inputRequisitionNivelEstudios" placeholder="" ng-model="formRequisition.inputRequisitionNivelEstudios" readonly>-->
                <label class="form-control with-primary-addon">@{{formRequisition.inputRequisitionNivelEstudios}}</label>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-carera">Carrera</span>
                <!--<input type="text" class="form-control" id="inputRequisitionCarrera" name="inputRequisitionCarrera" ng-model="formRequisition.inputRequisitionCarrera" placeholder="" readonly>-->
                <label class="form-control with-primary-addon">@{{formRequisition.inputRequisitionCarrera}}</label>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-ingles_oral">Ingl&eacute;s Oral</span>
                <!--<input type="text" class="form-control with-primary-addon" id="inputRequisitionInglesOral" name="inputRequisitionInglesOral" placeholder="" ng-model="formRequisition.inputRequisitionInglesOral" readonly>-->
                <label class="form-control with-primary-addon">@{{formRequisition.inputRequisitionInglesOral}}</label>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-ingles_lectura">Ingl&eacute;s Lectura</span>
                <!--<input type="text" class="form-control with-primary-addon" id="inputRequisitionInglesLectura" name="inputRequisitionInglesLectura" placeholder="" ng-model="formRequisition.inputRequisitionInglesLectura" readonly>-->
                <label class="form-control with-primary-addon">@{{formRequisition.inputRequisitionInglesLectura}}</label>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-ingles_escritura">Ingl&eacute;s Escritura</span>
                <!--<input type="text" class="form-control with-primary-addon" id="inputRequisitionInglesEscritura" name="inputRequisitionInglesEscritura" placeholder="" ng-model="formRequisition.inputRequisitionInglesEscritura" readonly>-->
                <label class="form-control with-primary-addon">@{{formRequisition.inputRequisitionInglesEscritura}}</label>
            </div>
            
        </div>

    </div>
    
    <div class="row">
        <div class="col-md-12">
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-experiencia">Experiencia / Conocimientos en</span>
                <!--<textarea placeholder="Áreas que debe dominar para la vacante." class="form-control" id="inputRequisitionExperiencia" readonly>@{{formRequisition.inputRequisitionExperiencia}}</textarea>-->
                <p class="form-control">@{{formRequisition.inputRequisitionExperiencia}}</p>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-caracteristicas">Características / Habilidades Deseadas</span>
                <!--<textarea placeholder="Habilidades deseadas que el/la aspirante cubra para la vacante." class="form-control" id="inputRequisitionCaracteristicas" readonly>@{{formRequisition.inputRequisitionCaracteristicas}}</textarea>-->
                <p class="form-control">@{{formRequisition.inputRequisitionCaracteristicas}}</p>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-funciones">Funciones a Desempeñar</span>
                <!--<textarea placeholder="Resposabilidades que realizará en la posición" class="form-control" id="inputRequisitionFunciones" readonly>@{{formRequisition.inputRequisitionFunciones}}</textarea>-->
                <p class="form-control">@{{formRequisition.inputRequisitionFunciones}}</p>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-observaciones">Observaciones</span>
                <!--<textarea placeholder="Consideraciones adicionales a tomar en cuenta para la búsqueda de personal" class="form-control" id="inputRequisitionObservaciones" readonly>@{{formRequisition.inputRequisitionObservaciones}}</textarea>-->
                <p class="form-control">@{{formRequisition.inputRequisitionObservaciones}}</p>
            </div>
            
            <div class="input-group" ng-if="formRequisition.inputRequisitionStatus == 5">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-motivo">Motivo Rechazo</span>
                <p class="form-control">@{{formRequisition.inputRequisitionRazonCancelacion}}</p>
            </div>
            
        </div>
    </div>
    
    <div>
        <h3 class="with-line"></h3>

        <div class="row">
            <div ng-if="formRequisition.inputRequisitionStatus == 4">
                <div class="col-sm-4 col-xs-6">
                    <button type="button" ng-click="processRequisition()" class="btn btn-success btn-lg">Atender</button>
                </div>
            </div>
            <div ng-if="formRequisition.inputRequisitionStatus == 6">
                <div class="col-sm-4 col-xs-6">
                    <button type="button" ng-click="closeRequisition()" class="btn btn-success btn-lg">Cerrar</button>
                </div>
            </div>
            <div class="col-sm-4 col-xs-6" ng-if="((formRequisition.inputRequisitionStatus == 2) ||(formRequisition.inputRequisitionStatus == 3) || (formRequisition.inputRequisitionStatus == 4))">
                <button type="button" ng-click="cancelRequisition()" class="btn btn-danger btn-lg">Cancelar</button>
            </div>
        </div>
    
    </div>
    
    </div>
        
</form>