<form name="newRequisition" ng-submit="send()">
    
    <div class="progress ng-scope" ng-show="sending">
      <div class="progress-bar progress-bar-primary progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="40" style="width: 100%">
        <span class="sr-only">100% Complete (success)</span>
      </div>
    </div>
    
    <div class="row">
        
        <div class="col-md-6">
            
            <div class="input-group">
                
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-director_area">Director de Area</span>

                <ui-select name="director_area" ng-model="selectedBoss.selected"
                   class="btn-group bootstrap-select form-control"
                   ng-disabled="false"
                   append-to-body="true"
                   search-enabled="false">
                  <ui-select-match placeholder="Seleccionar">
                    <span> @{{$select.selected.name}}</span>
                  </ui-select-match>
                  <ui-select-choices repeat="standardBoss in standardSelectBosses | filter: $select.search">
                    <span ng-bind-html="standardBoss.name"></span>
                  </ui-select-choices>
                </ui-select>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-autorizador">Autorizador</span>
                <div ng-if="!((selectedBoss.selected.id == 1)|| (selectedBoss.selected.id == 2) || (selectedBoss.selected.id == 51))">
                    <ui-select name="autorizador" ng-model="selectedAuthorizer.selected"
                       class="btn-group bootstrap-select form-control"
                       ng-disabled="false"
                       append-to-body="true"
                       search-enabled="false"
                               on-select="">
                      <ui-select-match placeholder="Seleccionar">
                        <span> @{{$select.selected.name}}</span>
                      </ui-select-match>
                      <ui-select-choices repeat="standardAuthorizer in standardSelectAuthorizers | filter: $select.search">
                        <span ng-bind-html="standardAuthorizer.name"></span>
                      </ui-select-choices>
                    </ui-select>
                </div>
                <div ng-if="((selectedBoss.selected.id == 1)|| (selectedBoss.selected.id == 2) || (selectedBoss.selected.id == 51))">
                    <input type="text" class="form-control" id="socio" name="socio"  value="@{{selectedBoss.selected.name}}" placeholder="" disabled>
                </div>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-fecha_solicitud">Fecha de Solicitud</span>
                <input type="text" class="form-control with-primary-addon" id="fecha_solicitud" name="fecha_solicitud" ng-model="formRequestRequisition.fecha_solicitud" placeholder="" readonly>
            </div>
            
            <div class="input-group" ng-controller="RequisicionesModuleCtrl">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-fecha_ingreso">Fecha Estimada de Ingreso</span>
                
                    <input id="inputRequestFechaIngreso" type="text" class="form-control" uib-datepicker-popup="@{{format}}" datepicker-options="options" ng-model="formRequestRequisition.dt" is-open="opened" ng-required="true" close-text="Close" alt-input-formats="altInputFormats" show-button-bar="false" ng-change="setDate()" readonly/>
                  <span class="input-group-btn" >
                    <button type="button" class="btn btn-default" ng-click="open()"><i class="glyphicon glyphicon-calendar"></i></button>
                  </span>
                
            </div>
                        
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-area">&Aacute;rea</span>
                <ui-select name="area" ng-model="selectedArea.selected"
                   class="btn-group bootstrap-select form-control"
                   ng-disabled="false"
                   append-to-body="true"
                   search-enabled="false"
                           on-select="">
                  <ui-select-match placeholder="Seleccionar">
                    <span> @{{$select.selected.name}}</span>
                  </ui-select-match>
                  <ui-select-choices repeat="standardArea in standardSelectAreas | filter: $select.search">
                    <span ng-bind-html="standardArea.name"></span>
                  </ui-select-choices>
                </ui-select>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-track">Track</span>
                <ui-select name="track" ng-model="selectedTrack.selected"
                   class="btn-group bootstrap-select form-control"
                   ng-disabled="false"
                   append-to-body="true"
                   search-enabled="false"
                           on-select="getPositions($item, $model)">
                  <ui-select-match placeholder="Seleccionar">
                    <span> @{{$select.selected.name}}</span>
                  </ui-select-match>
                  <ui-select-choices repeat="standardTrack in standardSelectTracks | filter: $select.search">
                    <span ng-bind-html="standardTrack.name"></span>
                  </ui-select-choices>
                </ui-select>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-posicion">Posici&oacute;n</span>
                <ui-select name="posicion" ng-model="selectedPosition.selected"
                   class="btn-group bootstrap-select form-control"
                   ng-disabled="false"
                   append-to-body="true"
                   search-enabled="false"
                           on-select="">
                  <ui-select-match placeholder="Seleccionar">
                    <span> @{{$select.selected.name}}</span>
                  </ui-select-match>
                  <ui-select-choices repeat="standardPosition in standardSelectPositions | filter: $select.search">
                    <span ng-bind-html="standardPosition.name"></span>
                  </ui-select-choices>
                </ui-select>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-empresa">Empresa</span>
                <ui-select name="empresa" ng-model="selectedCompany.selected"
                   class="btn-group bootstrap-select form-control"
                   ng-disabled="false"
                   append-to-body="true"
                   search-enabled="false"
                           on-select="">
                  <ui-select-match placeholder="Seleccionar">
                    <span> @{{$select.selected.name}}</span>
                  </ui-select-match>
                  <ui-select-choices repeat="standardCompany in standardSelectCompanies | filter: $select.search">
                    <span ng-bind-html="standardCompany.name"></span>
                  </ui-select-choices>
                </ui-select>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-tipo">Tipo</span>
                <ui-select name="tipo" ng-model="selectedType.selected"
                   class="btn-group bootstrap-select form-control"
                   ng-disabled="false"
                   append-to-body="true"
                   search-enabled="false"
                           on-select="">
                  <ui-select-match placeholder="Seleccionar">
                    <span> @{{$select.selected.name}}</span>
                  </ui-select-match>
                  <ui-select-choices repeat="standardType in standardSelectTypes | filter: $select.search">
                    <span ng-bind-html="standardType.name"></span>
                  </ui-select-choices>
                </ui-select>
            </div>
            
            <div class="input-group" ng-if="selectedType.selected.id == 2">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-sutituye_a">Sustituye a</span>
                <input type="text" class="form-control" id="sustituye_a" name="sustituye_a" ng-model="formRequestRequisition.sustituye_a" placeholder="" required>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-proyecto">Proyecto</span>
                <input type="text" class="form-control" id="proyecto" name="proyecto" ng-model="formRequestRequisition.proyecto" placeholder="" required>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-clave_proyecto">Clave del Proyecto</span>
                <input type="text" class="form-control" id="clave_proyecto" name="clave_proyecto" ng-model="formRequestRequisition.clave_proyecto" placeholder="" required>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-costo">Costo Máximo</span>
                <ui-select name="costo" ng-model="selectedCosto.selected"
                   class="btn-group bootstrap-select form-control"
                   ng-disabled="false"
                   append-to-body="true"
                   search-enabled="false"
                           on-select="">
                  <ui-select-match placeholder="Seleccionar">
                    <span> @{{$select.selected.name}}</span>
                  </ui-select-match>
                  <ui-select-choices repeat="standardCosto in standardSelectCosto | filter: $select.search">
                    <span ng-bind-html="standardCosto.name"></span>
                  </ui-select-choices>
                </ui-select>
            </div>
            
            <div class="input-group" ng-if="selectedCosto.selected.id == 2">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-define_costo">Define el Costo</span>
                <input type="text" class="form-control" id="define_costo" name="define_costo" ng-model="formRequestRequisition.define_costo" placeholder="" required>
            </div>
            
        </div>
        
        <div class="col-md-6">

            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-recidencia">Residencia</span>
                <ui-select name="recidencia" ng-model="selectedResidencia.selected"
                   class="btn-group bootstrap-select form-control"
                   ng-disabled="false"
                   append-to-body="true"
                   search-enabled="false"
                           on-select="">
                  <ui-select-match placeholder="Seleccionar">
                    <span> @{{$select.selected.name}}</span>
                  </ui-select-match>
                  <ui-select-choices repeat="standardResidencia in standardSelectResidencia | filter: $select.search">
                    <span ng-bind-html="standardResidencia.name"></span>
                  </ui-select-choices>
                </ui-select>
            </div>
            
            <div class="input-group" ng-if="selectedResidencia.selected.id == 4">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-especifique_residencia">Especifique</span>
                <input type="text" class="form-control" id="especifique_residencia" name="especifique_residencia" ng-model="formRequestRequisition.especifique_residencia" placeholder="" required>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-lugar_trabajo">Lugar de Trabajo</span>
                <ui-select name="lugar_trabajo" ng-model="selectedLugarTrabajo.selected"
                   class="btn-group bootstrap-select form-control"
                   ng-disabled="false"
                   append-to-body="true"
                   search-enabled="false"
                           on-select="">
                  <ui-select-match placeholder="Seleccionar">
                    <span> @{{$select.selected.name}}</span>
                  </ui-select-match>
                  <ui-select-choices repeat="standardLugarTrabajo in standardSelectLugarTrabajo | filter: $select.search">
                    <span ng-bind-html="standardLugarTrabajo.name"></span>
                  </ui-select-choices>
                </ui-select>
            </div>
            
            <div class="input-group" ng-if="(selectedLugarTrabajo.selected.id == 2) || (selectedLugarTrabajo.selected.id == 3)">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-domicilio_cliente">Domicilio del Cliente</span>
                <input type="text" class="form-control" id="domicilio_cliente" name="domicilio_cliente" ng-model="formRequestRequisition.domicilio_cliente" placeholder="" required>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-contratacion">Contrataci&oacute;n</span>
                <ui-select name="contratacion" ng-model="selectedContratacion.selected"
                   class="btn-group bootstrap-select form-control"
                   ng-disabled="false"
                   append-to-body="true"
                   search-enabled="false"
                           on-select="">
                  <ui-select-match placeholder="Seleccionar">
                    <span> @{{$select.selected.name}}</span>
                  </ui-select-match>
                  <ui-select-choices repeat="standardContratacion in standardSelectContratacion | filter: $select.search">
                    <span ng-bind-html="standardContratacion.name"></span>
                  </ui-select-choices>
                </ui-select>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-evaluador_tecnico">Evaluador T&eacute;cnico</span>
                <input type="text" class="form-control" id="evaluador_tecnico" name="evaluador_tecnico" ng-model="formRequestRequisition.evaluador_tecnico" placeholder="" required>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-motivo">Disponibilidad de Viajar</span>
                <ui-select name="motivo" ng-model="selectedDisponibilidadViajar.selected"
                   class="btn-group bootstrap-select form-control"
                   ng-disabled="false"
                   append-to-body="true"
                   search-enabled="false"
                           on-select="">
                  <ui-select-match placeholder="Seleccionar">
                    <span> @{{$select.selected.name}}</span>
                  </ui-select-match>
                  <ui-select-choices repeat="standardDisponibilidadViajar in standardSelectDisponibilidadViajar | filter: $select.search">
                    <span ng-bind-html="standardDisponibilidadViajar.name"></span>
                  </ui-select-choices>
                </ui-select>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-edad1">Edad de</span>
                <ui-select name="edad1" ng-model="selectedEdad1.selected"
                   class="btn-group bootstrap-select form-control"
                   ng-disabled="false"
                   append-to-body="true"
                   search-enabled="false"
                           on-select="">
                  <ui-select-match placeholder="Seleccionar">
                    <span> @{{$select.selected.name}}</span>
                  </ui-select-match>
                  <ui-select-choices repeat="standardEdad1 in standardSelectEdad1 | filter: $select.search">
                    <span ng-bind-html="standardEdad1.name"></span>
                  </ui-select-choices>
                </ui-select>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-edad2">A</span>
                <ui-select name="edad2" ng-model="selectedEdad2.selected"
                   class="btn-group bootstrap-select form-control"
                   ng-disabled="false"
                   append-to-body="true"
                   search-enabled="false"
                           on-select="">
                  <ui-select-match placeholder="Seleccionar">
                    <span> @{{$select.selected.name}}</span>
                  </ui-select-match>
                  <ui-select-choices repeat="standardEdad2 in standardSelectEdad2 | filter: $select.search">
                    <span ng-bind-html="standardEdad2.name"></span>
                  </ui-select-choices>
                </ui-select>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-sexo">Sexo</span>
                <ui-select name="sexo" ng-model="selectedSexo.selected"
                   class="btn-group bootstrap-select form-control"
                   ng-disabled="false"
                   append-to-body="true"
                   search-enabled="false"
                           on-select="">
                  <ui-select-match placeholder="Seleccionar">
                    <span> @{{$select.selected.name}}</span>
                  </ui-select-match>
                  <ui-select-choices repeat="standardsexo in standardSelectSexo | filter: $select.search">
                    <span ng-bind-html="standardsexo.name"></span>
                  </ui-select-choices>
                </ui-select>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-nivel_estudios">Nivel de estudios</span>
                <ui-select name="nivel_estudios" ng-model="selectedNivelEstudios.selected"
                   class="btn-group bootstrap-select form-control"
                   ng-disabled="false"
                   append-to-body="true"
                   search-enabled="false"
                           on-select="">
                  <ui-select-match placeholder="Seleccionar">
                    <span> @{{$select.selected.name}}</span>
                  </ui-select-match>
                  <ui-select-choices repeat="standardNivelEstudios in standardSelectNivelEstudios | filter: $select.search">
                    <span ng-bind-html="standardNivelEstudios.name"></span>
                  </ui-select-choices>
                </ui-select>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-carera">Carrera</span>
                <input type="text" class="form-control" id="carrera" name="carrera" ng-model="formRequestRequisition.carrera" placeholder="" required>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-ingles_oral">Ingl&eacute;s Oral</span>
                <ui-select name="ingles_oral" ng-model="selectedInglesOral.selected"
                   class="btn-group bootstrap-select form-control"
                   ng-disabled="false"
                   append-to-body="true"
                   search-enabled="false"
                           on-select="">
                  <ui-select-match placeholder="Seleccionar">
                    <span> @{{$select.selected.name}}</span>
                  </ui-select-match>
                  <ui-select-choices repeat="standardInglesOral in standardSelectInglesOral | filter: $select.search">
                    <span ng-bind-html="standardInglesOral.name"></span>
                  </ui-select-choices>
                </ui-select>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-ingles_lectura">Ingl&eacute;s Lectura</span>
                <ui-select name="ingles_lectura" ng-model="selectedInglesLectura.selected"
                   class="btn-group bootstrap-select form-control"
                   ng-disabled="false"
                   append-to-body="true"
                   search-enabled="false"
                           on-select="">
                  <ui-select-match placeholder="Seleccionar">
                    <span> @{{$select.selected.name}}</span>
                  </ui-select-match>
                  <ui-select-choices repeat="standardInglesLectura in standardSelectInglesLectura | filter: $select.search">
                    <span ng-bind-html="standardInglesLectura.name"></span>
                  </ui-select-choices>
                </ui-select>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-ingles_escritura">Ingl&eacute;s Escritura</span>
                <ui-select name="ingles_escritura" ng-model="selectedInglesEscritura.selected"
                   class="btn-group bootstrap-select form-control"
                   ng-disabled="false"
                   append-to-body="true"
                   search-enabled="false"
                           on-select="">
                  <ui-select-match placeholder="Seleccionar">
                    <span> @{{$select.selected.name}}</span>
                  </ui-select-match>
                  <ui-select-choices repeat="standardInglesEscritura in standardSelectInglesEscritura | filter: $select.search">
                    <span ng-bind-html="standardInglesEscritura.name"></span>
                  </ui-select-choices>
                </ui-select>
            </div>
            
        </div>

    </div>
    
    <div class="row">
        <div class="col-md-12">
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-experiencia">Experiencia / Conocimientos en</span>
                <textarea placeholder="Áreas que debe dominar para la vacante." class="form-control" id="inputRequisitionExperiencia" required></textarea>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-caracteristicas">Características / Habilidades Deseadas</span>
                <textarea placeholder="Habilidades deseadas que el/la aspirante cubra para la vacante." class="form-control" id="inputRequisitionCaracteristicas" required></textarea>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-funciones">Funciones a Desempeñar</span>
                <textarea placeholder="Resposabilidades que realizará en la posición" class="form-control" id="inputRequisitionFunciones" required></textarea>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-observaciones">Observaciones</span>
                <textarea placeholder="Consideraciones adicionales a tomar en cuenta para la búsqueda de personal" class="form-control" id="inputRequisitionObservaciones" required></textarea>
            </div>
            
        </div>
    </div>

    <button type="submit" class="btn btn-primary btn-with-icon" ng-show="(selectedBoss.selected.id) && ((selectedAuthorizer.selected.id) || ((selectedBoss.selected.id == 1)|| (selectedBoss.selected.id == 2) || (selectedBoss.selected.id == 51)) ) && (selectedArea.selected.id) && (selectedTrack.selected.id) && (selectedPosition.selected.id) && (selectedCompany.selected.id) && (selectedType.selected.id) && (selectedCosto.selected.id) && (selectedResidencia.selected.id) && (selectedLugarTrabajo.selected.id) && (selectedContratacion.selected.id) && (selectedDisponibilidadViajar.selected.id) && (selectedEdad1.selected.id) && (selectedEdad2.selected.id) && (selectedSexo.selected.id) && (selectedNivelEstudios.selected.id) && (selectedInglesOral.selected.id) && (selectedInglesLectura.selected.id) && (selectedInglesEscritura.selected.id) && (formRequestRequisition.dt)">
      <i class="ion-ios-checkmark-outline"></i>Enviar
    </button>
    
    <!--<button type="submit" class="btn btn-primary btn-with-icon" ng-show="(selectedBoss.selected.id) && (selectedOcacion.selected.id) && (selectedOcacion.selected.id != 8) && (selectedOcacion.selected.id != 9)">
      <i class="ion-ios-checkmark-outline"></i>Solicitar
    </button>-->
    
    <!--<button type="submit" class="btn btn-primary btn-with-icon" ng-show="(selectedBoss.selected.id) && (selectedOcacion.selected.id == 8)" value="@{{ !newSolicitud.$valid && 'invalid' || 'valid'}}">
      <i class="ion-checkmark"></i>Solicitar
    </button>-->
    
    <!-- && formAbsence.inputAbsenceComprobante.$invalid-->
    
    <!--<button type="submit" class="btn btn-primary btn-with-icon" ng-show="(selectedBoss.selected.id) && (selectedOcacion.selected.id == 9)">
      <i class="ion-log-in"></i>Solicitar
    </button>-->
  
</form>