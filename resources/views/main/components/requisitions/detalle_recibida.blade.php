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
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-director_area">Estado</span>
                <!--<input type="text" class="form-control with-primary-addon" id="inputRequisitionEstado" name="inputRequisitionEstado" placeholder="" ng-model="formRequisitionReceived.inputRequisitionEstado" readonly>-->
                <label class="form-control with-primary-addon">@{{formRequisitionReceived.inputRequisitionEstado}}</label>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-director_area">Solicitante</span>
                <!--<input type="text" class="form-control with-primary-addon" id="inputRequisitionColaborador" name="inputRequisitionColaborador" placeholder="" ng-model="formRequisitionReceived.inputRequisitionColaborador" readonly>-->
                <label class="form-control with-primary-addon">@{{formRequisitionReceived.inputRequisitionColaborador}}</label>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-director_area">Director de Area</span>
                <!--<input type="text" class="form-control with-primary-addon" id="inputRequisitionDirector" name="inputRequisitionDirector" placeholder="" ng-model="formRequisitionReceived.inputRequisitionDirector" readonly>-->
                <label class="form-control with-primary-addon">@{{formRequisitionReceived.inputRequisitionDirector}}</label>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-autorizador">Autorizador</span>
                <!--<input type="text" class="form-control with-primary-addon" id="inputRequisitionAutorizador" name="inputRequisitionAutorizador" placeholder="" ng-model="formRequisitionReceived.inputRequisitionAutorizador" readonly>-->
                <label class="form-control with-primary-addon">@{{formRequisitionReceived.inputRequisitionAutorizador}}</label>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-fecha_solicitud">Fecha de Solicitud</span>
                <!--<input type="text" class="form-control with-primary-addon" id="inputRequisitionFechaSolicitud" name="inputRequisitionFechaSolicitud" ng-model="formRequisitionReceived.inputRequisitionFechaSolicitud" placeholder="" readonly>-->
                <label class="form-control with-primary-addon">@{{formRequisitionReceived.inputRequisitionFechaSolicitud}}</label>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-fecha_ingreso">Fecha Estimada de Ingreso</span>
                <!--<input type="text" class="form-control with-primary-addon" id="inputRequisitionFechaIngreso" name="inputRequisitionFechaIngreso" placeholder="" ng-model="formRequisitionReceived.inputRequisitionFechaIngreso" readonly>-->
                <label class="form-control with-primary-addon">@{{formRequisitionReceived.inputRequisitionFechaIngreso}}</label>
            </div>
                        
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-area">&Aacute;rea</span>
                <!--<input type="text" class="form-control with-primary-addon" id="inputRequisitionArea" name="inputRequisitionArea" placeholder="" ng-model="formRequisitionReceived.inputRequisitionArea" readonly>-->
                <label class="form-control with-primary-addon">@{{formRequisitionReceived.inputRequisitionArea}}</label>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-track">Track</span>
                <!--<input type="text" class="form-control with-primary-addon" id="inputRequisitionTrack" name="inputRequisitionTrack" placeholder="" ng-model="formRequisitionReceived.inputRequisitionTrack" readonly>-->
                <label class="form-control with-primary-addon">@{{formRequisitionReceived.inputRequisitionTrack}}</label>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-posicion">Posici&oacute;n</span>
                <!--<input type="text" class="form-control with-primary-addon" id="inputRequisitionPosicion" name="inputRequisitionPosicion" placeholder="" ng-model="formRequisitionReceived.inputRequisitionPosicion" readonly>-->
                <label class="form-control with-primary-addon">@{{formRequisitionReceived.inputRequisitionPosicion}}</label>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-empresa">Empresa</span>
                <!--<input type="text" class="form-control with-primary-addon" id="inputRequisitionEmpresa" name="inputRequisitionEmpresa" placeholder="" ng-model="formRequisitionReceived.inputRequisitionEmpresa" readonly>-->
                <label class="form-control with-primary-addon">@{{formRequisitionReceived.inputRequisitionEmpresa}}</label>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-tipo">Tipo</span>
                <!--<input type="text" class="form-control with-primary-addon" id="inputRequisitionTipoPosicion" name="inputRequisitionTipoPosicion" placeholder="" ng-model="formRequisitionReceived.inputRequisitionTipoPosicion" readonly>-->
                <label class="form-control with-primary-addon">@{{formRequisitionReceived.inputRequisitionTipoPosicion}}</label>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-sutituye_a">Sustituye a</span>
                <!--<input type="text" class="form-control" id="inputRequisitionSustituyeA" name="inputRequisitionSustituyeA" ng-model="formRequisitionReceived.inputRequisitionSustituyeA" placeholder="" readonly>-->
                <label class="form-control with-primary-addon">@{{formRequisitionReceived.inputRequisitionSustituyeA}}</label>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-proyecto">Proyecto</span>
                <!--<input type="text" class="form-control" id="inputRequisitionProyecto" name="inputRequisitionProyecto" ng-model="formRequisitionReceived.inputRequisitionProyecto" placeholder="" readonly>-->
                <label class="form-control with-primary-addon">@{{formRequisitionReceived.inputRequisitionProyecto}}</label>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-clave_proyecto">Clave del Proyecto</span>
                <!--<input type="text" class="form-control" id="inputRequisitionClaveProyecto" name="inputRequisitionClaveProyecto" ng-model="formRequisitionReceived.inputRequisitionClaveProyecto" placeholder="" readonly>-->
                <label class="form-control with-primary-addon">@{{formRequisitionReceived.inputRequisitionClaveProyecto}}</label>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-costo">Costo Máximo</span>
                <!--<input type="text" class="form-control with-primary-addon" id="inputRequisitionCostoMaximo" name="inputRequisitionCostoMaximo" placeholder="" ng-model="formRequisitionReceived.inputRequisitionCostoMaximo" readonly>-->
                <label class="form-control with-primary-addon">@{{formRequisitionReceived.inputRequisitionCostoMaximo}}</label>
            </div>
            
        </div>
        
        <div class="col-md-6">

            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-recidencia">Residencia</span>
                <!--<input type="text" class="form-control with-primary-addon" id="inputRequisitionRecidencia" name="inputRequisitionRecidencia" placeholder="" ng-model="formRequisitionReceived.inputRequisitionRecidencia" readonly>-->
                <label class="form-control with-primary-addon">@{{formRequisitionReceived.inputRequisitionRecidencia}}</label>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-lugar_trabajo">Lugar de Trabajo</span>
                <!--<input type="text" class="form-control with-primary-addon" id="inputRequisitionLugarTrabajo" name="inputRequisitionLugarTrabajo" placeholder="" ng-model="formRequisitionReceived.inputRequisitionLugarTrabajo" readonly>-->
                <label class="form-control with-primary-addon">@{{formRequisitionReceived.inputRequisitionLugarTrabajo}}</label>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-domicilio_cliente">Domicilio del Cliente</span>
                <!--<input type="text" class="form-control" id="inputRequisitionDomicilioCliente" name="inputRequisitionDomicilioCliente" ng-model="formRequisitionReceived.inputRequisitionDomicilioCliente" placeholder="" readonly>-->
                <label class="form-control with-primary-addon">@{{formRequisitionReceived.inputRequisitionDomicilioCliente}}</label>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-contratacion">Contrataci&oacute;n</span>
                <!--<input type="text" class="form-control with-primary-addon" id="inputRequisitionContratacion" name="inputRequisitionContratacion" placeholder="" ng-model="formRequisitionReceived.inputRequisitionContratacion" readonly>-->
                <label class="form-control with-primary-addon">@{{formRequisitionReceived.inputRequisitionContratacion}}</label>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-evaluador_tecnico">Evaluador T&eacute;cnico</span>
                <!--<input type="text" class="form-control" id="inputRequisitionEvaluadorTecnico" name="inputRequisitionEvaluadorTecnico" ng-model="formRequisitionReceived.inputRequisitionEvaluadorTecnico" placeholder="" readonly>-->
                <label class="form-control with-primary-addon">@{{formRequisitionReceived.inputRequisitionEvaluadorTecnico}}</label>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-motivo">Disponibilidad de Viajar</span>
                <!--<input type="text" class="form-control with-primary-addon" id="inputRequisitionDisponibilidadViajar" name="inputRequisitionDisponibilidadViajar" placeholder="" ng-model="formRequisitionReceived.inputRequisitionDisponibilidadViajar" readonly>-->
                <label class="form-control with-primary-addon">@{{formRequisitionReceived.inputRequisitionDisponibilidadViajar}}</label>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-edad1">Edad de</span>
                <!--<input type="text" class="form-control with-primary-addon" id="inputRequisitionEdadDe" name="inputRequisitionEdadDe" placeholder="" ng-model="formRequisitionReceived.inputRequisitionEdadDe" readonly>-->
                <label class="form-control with-primary-addon">@{{formRequisitionReceived.inputRequisitionEdadDe}}</label>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-edad2">A</span>
                <!--<input type="text" class="form-control with-primary-addon" id="inputRequisitionA" name="inputRequisitionA" placeholder="" ng-model="formRequisitionReceived.inputRequisitionA" readonly>-->
                <label class="form-control with-primary-addon">@{{formRequisitionReceived.inputRequisitionA}}</label>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-sexo">Sexo</span>
                <!--<input type="text" class="form-control with-primary-addon" id="inputRequisitionSexo" name="inputRequisitionSexo" placeholder="" ng-model="formRequisitionReceived.inputRequisitionSexo" readonly>-->
                <label class="form-control with-primary-addon">@{{formRequisitionReceived.inputRequisitionSexo}}</label>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-nivel_estudios">Nivel de estudios</span>
                <!--<input type="text" class="form-control with-primary-addon" id="inputRequisitionNivelEstudios" name="inputRequisitionNivelEstudios" placeholder="" ng-model="formRequisitionReceived.inputRequisitionNivelEstudios" readonly>-->
                <label class="form-control with-primary-addon">@{{formRequisitionReceived.inputRequisitionNivelEstudios}}</label>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-carera">Carrera</span>
                <!--<input type="text" class="form-control" id="inputRequisitionCarrera" name="inputRequisitionCarrera" ng-model="formRequisitionReceived.inputRequisitionCarrera" placeholder="" readonly>-->
                <label class="form-control with-primary-addon">@{{formRequisitionReceived.inputRequisitionCarrera}}</label>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-ingles_oral">Ingl&eacute;s Oral</span>
                <!--<input type="text" class="form-control with-primary-addon" id="inputRequisitionInglesOral" name="inputRequisitionInglesOral" placeholder="" ng-model="formRequisitionReceived.inputRequisitionInglesOral" readonly>-->
                <label class="form-control with-primary-addon">@{{formRequisitionReceived.inputRequisitionInglesOral}}</label>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-ingles_lectura">Ingl&eacute;s Lectura</span>
                <!--<input type="text" class="form-control with-primary-addon" id="inputRequisitionInglesLectura" name="inputRequisitionInglesLectura" placeholder="" ng-model="formRequisitionReceived.inputRequisitionInglesLectura" readonly>-->
                <label class="form-control with-primary-addon">@{{formRequisitionReceived.inputRequisitionInglesLectura}}</label>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-ingles_escritura">Ingl&eacute;s Escritura</span>
                <!--<input type="text" class="form-control with-primary-addon" id="inputRequisitionInglesEscritura" name="inputRequisitionInglesEscritura" placeholder="" ng-model="formRequisitionReceived.inputRequisitionInglesEscritura" readonly>-->
                <label class="form-control with-primary-addon">@{{formRequisitionReceived.inputRequisitionInglesEscritura}}</label>
            </div>
            
        </div>

    </div>
    
    <div class="row">
        <div class="col-md-12">
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-experiencia">Experiencia / Conocimientos en</span>
                <!--<textarea placeholder="Áreas que debe dominar para la vacante." class="form-control" id="inputRequisitionExperiencia" readonly>@{{formRequisitionReceived.inputRequisitionExperiencia}}</textarea>-->
                <p class="form-control">@{{formRequisitionReceived.inputRequisitionExperiencia}}</p>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-caracteristicas">Características / Habilidades Deseadas</span>
                <!--<textarea placeholder="Habilidades deseadas que el/la aspirante cubra para la vacante." class="form-control" id="inputRequisitionCaracteristicas" readonly>@{{formRequisitionReceived.inputRequisitionCaracteristicas}}</textarea>-->
                <p class="form-control">@{{formRequisitionReceived.inputRequisitionCaracteristicas}}</p>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-funciones">Funciones a Desempeñar</span>
                <!--<textarea placeholder="Resposabilidades que realizará en la posición" class="form-control" id="inputRequisitionFunciones" readonly>@{{formRequisitionReceived.inputRequisitionFunciones}}</textarea>-->
                <p class="form-control">@{{formRequisitionReceived.inputRequisitionFunciones}}</p>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-observaciones">Observaciones</span>
                <!--<textarea placeholder="Consideraciones adicionales a tomar en cuenta para la búsqueda de personal" class="form-control" id="inputRequisitionObservaciones" readonly>@{{formRequisitionReceived.inputRequisitionObservaciones}}</textarea>-->
                <p class="form-control">@{{formRequisitionReceived.inputRequisitionObservaciones}}</p>
            </div>
            
        </div>
    </div>

    <div class="row" ng-show="formRequisitionReceived.inputRequisitionReceivedCancel">
        <div class="col-md-12">
            <div class="alert bg-danger">
              Favor de redactar el motivo de la cancelaci&oacute;n 
            </div>
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-observaciones">Motivo Cancelaci&oacute;n </span>
                <textarea placeholder="" class="form-control" id="inputRequisitionReceivedMotivoCancelacion" ng-model="formRequisitionReceived.inputRequisitionReceivedMotivoCancelacion" required></textarea>
            </div>
        </div>
    </div>
    
    <div ng-show="((formRequisitionReceived.inputRequisitionStatus == 2) || (formRequisitionReceived.inputRequisitionStatus == 3)) && (!formRequisitionReceived.inputRequisitionReceivedCancel)">
        <h3 class="with-line"></h3>

        <div class="row">
            <div class="col-sm-4 col-xs-6" ng-show="formRequisitionReceived.inputRequisitionStatus == 2">
                <button type="button" ng-click="acceptRequisition()" class="btn btn-info btn-lg">Aceptar</button>
            </div>
            <div class="col-sm-4 col-xs-6" ng-show="formRequisitionReceived.inputRequisitionStatus == 3">
                <button type="button" ng-click="authRequisition()" class="btn btn-info btn-lg">Autorizar</button>
            </div>
            <div class="col-sm-4 col-xs-6">
                <button type="button" ng-click="rejectRequisition()" class="btn btn-warning btn-lg">Rechazar</button>
            </div>
        </div>
    
    </div>
    
    <div ng-show="formRequisitionReceived.inputRequisitionReceivedCancel">
        <h3 class="with-line"></h3>
        
        <div class="row">
            <div class="col-sm-4 col-xs-6">
                <button type="button" ng-click="sendRejectRequisition()"class="btn btn-info btn-lg" ng-disabled="formRequisitionReceived.inputRequisitionReceivedMotivoCancelacion == ''" >Continuar</button>
            </div>
            <div class="col-sm-4 col-xs-6">
                <button type="button" ng-click="cancelRejectRequisition()" class="btn btn-warning btn-lg">Cancelar</button>
            </div>
        </div>
    
    </div>
        
    </div>
  
</form>