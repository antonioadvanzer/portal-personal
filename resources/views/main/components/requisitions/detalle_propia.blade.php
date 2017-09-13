<form name="showRequisition">
    
    <!--<div class="progress ng-scope" ng-show="sending">
      <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="40" style="width: 100%">
        <span class="sr-only">100% Complete (success)</span>
      </div>
    </div>-->
    
    <div class="row">
        
        <div class="col-md-6">
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-director_area">Estado</span>
                <!--<input type="text" class="form-control with-primary-addon" id="inputOwnRequisitionEstado" name="inputOwnRequisitionEstado" placeholder="" ng-model="formOwnRequisition.inputOwnRequisitionEstado" readonly>-->
                <label class="form-control with-primary-addon">@{{formOwnRequisition.inputOwnRequisitionEstado}}</label>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-director_area">Director de Area</span>
                <!--<input type="text" class="form-control with-primary-addon" id="inputOwnRequisitionDirector" name="inputOwnRequisitionDirector" placeholder="" ng-model="formOwnRequisition.inputOwnRequisitionDirector" readonly>-->
                <label class="form-control with-primary-addon">@{{formOwnRequisition.inputOwnRequisitionDirector}}</label>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-autorizador">Autorizador</span>
                <!--<input type="text" class="form-control with-primary-addon" id="inputOwnRequisitionAutorizador" name="inputOwnRequisitionAutorizador" placeholder="" ng-model="formOwnRequisition.inputOwnRequisitionAutorizador" readonly>-->
                <label class="form-control with-primary-addon">@{{formOwnRequisition.inputOwnRequisitionAutorizador}}</label>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-fecha_solicitud">Fecha de Solicitud</span>
                <!--<input type="text" class="form-control with-primary-addon" id="inputOwnRequisitionFechaSolicitud" name="inputOwnRequisitionFechaSolicitud" ng-model="formOwnRequisition.inputOwnRequisitionFechaSolicitud" placeholder="" readonly>-->
                <label class="form-control with-primary-addon">@{{formOwnRequisition.inputOwnRequisitionFechaSolicitud}}</label>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-fecha_ingreso">Fecha Estimada de Ingreso</span>
                <!--<input type="text" class="form-control with-primary-addon" id="inputOwnRequisitionFechaIngreso" name="inputOwnRequisitionFechaIngreso" placeholder="" ng-model="formOwnRequisition.inputOwnRequisitionFechaIngreso" readonly>-->
                <label class="form-control with-primary-addon">@{{formOwnRequisition.inputOwnRequisitionFechaIngreso}}</label>
            </div>
                        
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-area">&Aacute;rea</span>
                <!--<input type="text" class="form-control with-primary-addon" id="inputOwnRequisitionArea" name="inputOwnRequisitionArea" placeholder="" ng-model="formOwnRequisition.inputOwnRequisitionArea" readonly>-->
                <label class="form-control with-primary-addon">@{{formOwnRequisition.inputOwnRequisitionArea}}</label>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-track">Track</span>
                <!--<input type="text" class="form-control with-primary-addon" id="inputOwnRequisitionTrack" name="inputOwnRequisitionTrack" placeholder="" ng-model="formOwnRequisition.inputOwnRequisitionTrack" readonly>-->
                <label class="form-control with-primary-addon">@{{formOwnRequisition.inputOwnRequisitionTrack}}</label>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-posicion">Posici&oacute;n</span>
                <!--<input type="text" class="form-control with-primary-addon" id="inputOwnRequisitionPosicion" name="inputOwnRequisitionPosicion" placeholder="" ng-model="formOwnRequisition.inputOwnRequisitionPosicion" readonly>-->
                <label class="form-control with-primary-addon">@{{formOwnRequisition.inputOwnRequisitionPosicion}}</label>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-empresa">Empresa</span>
                <!--<input type="text" class="form-control with-primary-addon" id="inputOwnRequisitionEmpresa" name="inputOwnRequisitionEmpresa" placeholder="" ng-model="formOwnRequisition.inputOwnRequisitionEmpresa" readonly>-->
                <label class="form-control with-primary-addon">@{{formOwnRequisition.inputOwnRequisitionEmpresa}}</label>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-tipo">Tipo</span>
                <!--<input type="text" class="form-control with-primary-addon" id="inputOwnRequisitionTipoPosicion" name="inputOwnRequisitionTipoPosicion" placeholder="" ng-model="formOwnRequisition.inputOwnRequisitionTipoPosicion" readonly>-->
                <label class="form-control with-primary-addon">@{{formOwnRequisition.inputOwnRequisitionTipoPosicion}}</label>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-sutituye_a">Sustituye a</span>
                <!--<input type="text" class="form-control" id="inputOwnRequisitionSustituyeA" name="inputOwnRequisitionSustituyeA" ng-model="formOwnRequisition.inputOwnRequisitionSustituyeA" placeholder="" readonly>-->
                <label class="form-control with-primary-addon">@{{formOwnRequisition.inputOwnRequisitionSustituyeA}}</label>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-proyecto">Proyecto</span>
                <!--<input type="text" class="form-control" id="inputOwnRequisitionProyecto" name="inputOwnRequisitionProyecto" ng-model="formOwnRequisition.inputOwnRequisitionProyecto" placeholder="" readonly>-->
                <label class="form-control with-primary-addon">@{{formOwnRequisition.inputOwnRequisitionProyecto}}</label>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-clave_proyecto">Clave del Proyecto</span>
                <!--<input type="text" class="form-control" id="inputOwnRequisitionClaveProyecto" name="inputOwnRequisitionClaveProyecto" ng-model="formOwnRequisition.inputOwnRequisitionClaveProyecto" placeholder="" readonly>-->
                <label class="form-control with-primary-addon">@{{formOwnRequisition.inputOwnRequisitionClaveProyecto}}</label>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-costo">Costo Máximo</span>
                <!--<input type="text" class="form-control with-primary-addon" id="inputOwnRequisitionCostoMaximo" name="inputOwnRequisitionCostoMaximo" placeholder="" ng-model="formOwnRequisition.inputOwnRequisitionCostoMaximo" readonly>-->
                <label class="form-control with-primary-addon">@{{formOwnRequisition.inputOwnRequisitionCostoMaximo}}</label>
            </div>
            
        </div>
        
        <div class="col-md-6">

            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-recidencia">Residencia</span>
                <!--<input type="text" class="form-control with-primary-addon" id="inputOwnRequisitionRecidencia" name="inputOwnRequisitionRecidencia" placeholder="" ng-model="formOwnRequisition.inputOwnRequisitionRecidencia" readonly>-->
                <label class="form-control with-primary-addon">@{{formOwnRequisition.inputOwnRequisitionRecidencia}}</label>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-lugar_trabajo">Lugar de Trabajo</span>
                <!--<input type="text" class="form-control with-primary-addon" id="inputOwnRequisitionLugarTrabajo" name="inputOwnRequisitionLugarTrabajo" placeholder="" ng-model="formOwnRequisition.inputOwnRequisitionLugarTrabajo" readonly>-->
                <label class="form-control with-primary-addon">@{{formOwnRequisition.inputOwnRequisitionLugarTrabajo}}</label>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-domicilio_cliente">Domicilio del Cliente</span>
                <!--<input type="text" class="form-control" id="inputOwnRequisitionDomicilioCliente" name="inputOwnRequisitionDomicilioCliente" ng-model="formOwnRequisition.inputOwnRequisitionDomicilioCliente" placeholder="" readonly>-->
                <label class="form-control with-primary-addon">@{{formOwnRequisition.inputOwnRequisitionDomicilioCliente}}</label>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-contratacion">Contrataci&oacute;n</span>
                <!--<input type="text" class="form-control with-primary-addon" id="inputOwnRequisitionContratacion" name="inputOwnRequisitionContratacion" placeholder="" ng-model="formOwnRequisition.inputOwnRequisitionContratacion" readonly>-->
                <label class="form-control with-primary-addon">@{{formOwnRequisition.inputOwnRequisitionContratacion}}</label>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-evaluador_tecnico">Evaluador T&eacute;cnico</span>
                <!--<input type="text" class="form-control" id="inputOwnRequisitionEvaluadorTecnico" name="inputOwnRequisitionEvaluadorTecnico" ng-model="formOwnRequisition.inputOwnRequisitionEvaluadorTecnico" placeholder="" readonly>-->
                <label class="form-control with-primary-addon">@{{formOwnRequisition.inputOwnRequisitionEvaluadorTecnico}}</label>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-motivo">Disponibilidad de Viajar</span>
                <!--<input type="text" class="form-control with-primary-addon" id="inputOwnRequisitionDisponibilidadViajar" name="inputOwnRequisitionDisponibilidadViajar" placeholder="" ng-model="formOwnRequisition.inputOwnRequisitionDisponibilidadViajar" readonly>-->
                <label class="form-control with-primary-addon">@{{formOwnRequisition.inputOwnRequisitionDisponibilidadViajar}}</label>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-edad1">Edad de</span>
                <!--<input type="text" class="form-control with-primary-addon" id="inputOwnRequisitionEdadDe" name="inputOwnRequisitionEdadDe" placeholder="" ng-model="formOwnRequisition.inputOwnRequisitionEdadDe" readonly>-->
                <label class="form-control with-primary-addon">@{{formOwnRequisition.inputOwnRequisitionEdadDe}}</label>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-edad2">A</span>
                <!--<input type="text" class="form-control with-primary-addon" id="inputOwnRequisitionA" name="inputOwnRequisitionA" placeholder="" ng-model="formOwnRequisition.inputOwnRequisitionA" readonly>-->
                <label class="form-control with-primary-addon">@{{formOwnRequisition.inputOwnRequisitionA}}</label>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-sexo">Sexo</span>
                <!--<input type="text" class="form-control with-primary-addon" id="inputOwnRequisitionSexo" name="inputOwnRequisitionSexo" placeholder="" ng-model="formOwnRequisition.inputOwnRequisitionSexo" readonly>-->
                <label class="form-control with-primary-addon">@{{formOwnRequisition.inputOwnRequisitionSexo}}</label>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-nivel_estudios">Nivel de estudios</span>
                <!--<input type="text" class="form-control with-primary-addon" id="inputOwnRequisitionNivelEstudios" name="inputOwnRequisitionNivelEstudios" placeholder="" ng-model="formOwnRequisition.inputOwnRequisitionNivelEstudios" readonly>-->
                <label class="form-control with-primary-addon">@{{formOwnRequisition.inputOwnRequisitionNivelEstudios}}</label>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-carera">Carrera</span>
                <!--<input type="text" class="form-control" id="inputOwnRequisitionCarrera" name="inputOwnRequisitionCarrera" ng-model="formOwnRequisition.inputOwnRequisitionCarrera" placeholder="" readonly>-->
                <label class="form-control with-primary-addon">@{{formOwnRequisition.inputOwnRequisitionCarrera}}</label>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-ingles_oral">Ingl&eacute;s Oral</span>
                <!--<input type="text" class="form-control with-primary-addon" id="inputOwnRequisitionInglesOral" name="inputOwnRequisitionInglesOral" placeholder="" ng-model="formOwnRequisition.inputOwnRequisitionInglesOral" readonly>-->
                <label class="form-control with-primary-addon">@{{formOwnRequisition.inputOwnRequisitionInglesOral}}</label>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-ingles_lectura">Ingl&eacute;s Lectura</span>
                <!--<input type="text" class="form-control with-primary-addon" id="inputOwnRequisitionInglesLectura" name="inputOwnRequisitionInglesLectura" placeholder="" ng-model="formOwnRequisition.inputOwnRequisitionInglesLectura" readonly>-->
                <label class="form-control with-primary-addon">@{{formOwnRequisition.inputOwnRequisitionInglesLectura}}</label>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-ingles_escritura">Ingl&eacute;s Escritura</span>
                <!--<input type="text" class="form-control with-primary-addon" id="inputOwnRequisitionInglesEscritura" name="inputOwnRequisitionInglesEscritura" placeholder="" ng-model="formOwnRequisition.inputOwnRequisitionInglesEscritura" readonly>-->
                <label class="form-control with-primary-addon">@{{formOwnRequisition.inputOwnRequisitionInglesEscritura}}</label>
            </div>
            
        </div>

    </div>
    
    <div class="row">
        <div class="col-md-12">
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-experiencia">Experiencia / Conocimientos en</span>
                <!--<textarea placeholder="Áreas que debe dominar para la vacante." class="form-control" id="inputRequisitionExperiencia" readonly>@{{formOwnRequisition.inputOwnRequisitionExperiencia}}</textarea>-->
                <p class="form-control">@{{formOwnRequisition.inputOwnRequisitionExperiencia}}</p>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-caracteristicas">Características / Habilidades Deseadas</span>
                <!--<textarea placeholder="Habilidades deseadas que el/la aspirante cubra para la vacante." class="form-control" id="inputRequisitionCaracteristicas" readonly>@{{formOwnRequisition.inputOwnRequisitionCaracteristicas}}</textarea>-->
                <p class="form-control">@{{formOwnRequisition.inputOwnRequisitionCaracteristicas}}</p>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-funciones">Funciones a Desempeñar</span>
                <!--<textarea placeholder="Resposabilidades que realizará en la posición" class="form-control" id="inputRequisitionFunciones" readonly>@{{formOwnRequisition.inputOwnRequisitionFunciones}}</textarea>-->
                <p class="form-control">@{{formOwnRequisition.inputOwnRequisitionFunciones}}</p>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-observaciones">Observaciones</span>
                <!--<textarea placeholder="Consideraciones adicionales a tomar en cuenta para la búsqueda de personal" class="form-control" id="inputRequisitionObservaciones" readonly>@{{formOwnRequisition.inputOwnRequisitionObservaciones}}</textarea>-->
                <p class="form-control">@{{formOwnRequisition.inputOwnRequisitionObservaciones}}</p>
            </div>
            
            <div class="input-group" ng-if="formOwnRequisition.inputOwnRequisitionStatus == 5">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-motivo">Motivo Rechazo</span>
                <p class="form-control">@{{formOwnRequisition.inputOwnRequisitionRazonCancelacion}}</p>
            </div>
        </div>
    </div>

    <!--<button type="submit" class="btn btn-primary btn-with-icon" ng-show="(selectedBoss.selected.id) && ((selectedAuthorizer.selected.id) || ((selectedBoss.selected.id == 1)|| (selectedBoss.selected.id == 2) || (selectedBoss.selected.id == 51)) ) && (selectedArea.selected.id) && (selectedTrack.selected.id) && (selectedPosition.selected.id) && (selectedCompany.selected.id) && (selectedType.selected.id) && (selectedCosto.selected.id) && (selectedResidencia.selected.id) && (selectedLugarTrabajo.selected.id) && (selectedContratacion.selected.id) && (selectedDisponibilidadViajar.selected.id) && (selectedEdad1.selected.id) && (selectedEdad2.selected.id) && (selectedSexo.selected.id) && (selectedNivelEstudios.selected.id) && (selectedInglesOral.selected.id) && (selectedInglesLectura.selected.id) && (selectedInglesEscritura.selected.id) && (formRequestRequisition.dt)">
      <i class="ion-ios-checkmark-outline"></i>Enviar
    </button>-->
  
</form>