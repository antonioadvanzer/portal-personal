<form name="newRequisition" ng-submit="send()">
    
    <div class="progress ng-scope" ng-show="sending">
      <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="40" style="width: 100%">
        <span class="sr-only">100% Complete (success)</span>
      </div>
    </div>
    
    <div class="row">
        
        <div class="col-md-6">
            
            <div class="input-group">
                
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-addon1">Director de Area</span>

                <ui-select ng-model="selectedBoss.selected"
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
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-motivo">Autorizador</span>
                <ui-select name="motivo" ng-model="selectedAuthorizer.selected"
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
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-hasta">Fecha de Solicitud</span>
                <input type="text" class="form-control with-primary-addon" id="fecha_solicitud" name="fecha_solicitud" ng-model="formRequestRequisition.fecha_solicitud" placeholder="" readonly>
            </div>
            
            <div class="input-group" ng-controller="RequisicionesModuleCtrl">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-desde">Fecha Estimada de Ingreso</span>
                
                    <input id="FechaIngreso" type="text" class="form-control" uib-datepicker-popup="@{{format}}" datepicker-options="options" ng-model="formRequestRequisition.dt" is-open="opened" ng-required="true" close-text="Close" alt-input-formats="altInputFormats" show-button-bar="false" ng-change="setDate()" readonly/>
                  <span class="input-group-btn" >
                    <button type="button" class="btn btn-default" ng-click="open()"><i class="glyphicon glyphicon-calendar"></i></button>
                  </span>
                
            </div>
                        
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-motivo">&Aacute;rea</span>
                <ui-select name="motivo" ng-model="selectedArea.selected"
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
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-motivo">Track</span>
                <ui-select name="motivo" ng-model="selectedTrack.selected"
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
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-motivo">Posici&oacute;n</span>
                <ui-select name="motivo" ng-model="selectedPosition.selected"
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
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-motivo">Empresa</span>
                <ui-select name="motivo" ng-model="selectedCompany.selected"
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
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-motivo">Tipo</span>
                <ui-select name="motivo" ng-model="selectedType.selected"
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
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-nomina">Sustituye a</span>
                <input type="text" class="form-control" id="inputUserName" name="inputUserName" ng-model="formUser.inputUserName" placeholder="" required>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-nomina">Proyecto</span>
                <input type="text" class="form-control" id="inputUserName" name="inputUserName" ng-model="formUser.inputUserName" placeholder="" required>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-nomina">Clave del Proyecto</span>
                <input type="text" class="form-control" id="inputUserName" name="inputUserName" ng-model="formUser.inputUserName" placeholder="" required>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-motivo">Costo Máximo</span>
                <ui-select name="motivo" ng-model="selectedCosto.selected"
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
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-nomina">Define el Costo</span>
                <input type="text" class="form-control" id="inputUserName" name="inputUserName" ng-model="formUser.inputUserName" placeholder="" required>
            </div>
            
        </div>
        
        <div class="col-md-6">

            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-motivo">Residencia</span>
                <ui-select name="motivo" ng-model="selectedResidencia.selected"
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
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-nomina">Especifique</span>
                <input type="text" class="form-control" id="inputUserName" name="inputUserName" ng-model="formUser.inputUserName" placeholder="" required>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-motivo">Lugar de Trabajo</span>
                <ui-select name="motivo" ng-model="selectedLugarTrabajo.selected"
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
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-nomina">Domicilio del Cliente</span>
                <input type="text" class="form-control" id="inputUserName" name="inputUserName" ng-model="formUser.inputUserName" placeholder="" required>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-motivo">Contrataci&oacute;n</span>
                <ui-select name="motivo" ng-model="selectedContratacion.selected"
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
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-nomina">Evaluador T&eacute;cnico</span>
                <input type="text" class="form-control" id="inputUserName" name="inputUserName" ng-model="formUser.inputUserName" placeholder="" required>
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
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-motivo">Edad de</span>
                <ui-select name="motivo" ng-model="selectedEdad1.selected"
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
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-motivo">A</span>
                <ui-select name="motivo" ng-model="selectedEdad2.selected"
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
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-motivo">Sexo</span>
                <ui-select name="motivo" ng-model="selectedSexo.selected"
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
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-motivo">Nivel de estudios</span>
                <ui-select name="motivo" ng-model="selectedNivelEstudios.selected"
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
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-nomina">Carrera</span>
                <input type="text" class="form-control" id="inputUserName" name="inputUserName" ng-model="formUser.inputUserName" placeholder="" required>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-motivo">Ingl&eacute;s Oral</span>
                <ui-select name="motivo" ng-model="selectedInglesOral.selected"
                   class="btn-group bootstrap-select form-control"
                   ng-disabled="false"
                   append-to-body="true"
                   search-enabled="false"
                           on-select="setDays($item, $model)">
                  <ui-select-match placeholder="Seleccionar">
                    <span> @{{$select.selected.name}}</span>
                  </ui-select-match>
                  <ui-select-choices repeat="standardInglesOral in standardSelectInglesOral | filter: $select.search">
                    <span ng-bind-html="standardInglesOral.name"></span>
                  </ui-select-choices>
                </ui-select>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-motivo">Ingl&eacute;s Lectura</span>
                <ui-select name="motivo" ng-model="selectedInglesLectura.selected"
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
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-motivo">Ingl&eacute;s Escritura</span>
                <ui-select name="motivo" ng-model="selectedInglesEscritura.selected"
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
                <textarea placeholder="Áreas que debe dominar para la vacante." class="form-control" id="inputAbsenceObservations" ng-required="(selectedOcacion.selected.id == 8) || (selectedOcacion.selected.id == 9)"></textarea>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-caracteristicas">Características / Habilidades Deseadas</span>
                <textarea placeholder="Habilidades deseadas que el/la aspirante cubra para la vacante." class="form-control" id="inputAbsenceObservations" ng-required="(selectedOcacion.selected.id == 8) || (selectedOcacion.selected.id == 9)"></textarea>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-funciones">Funciones a Desempeñar</span>
                <textarea placeholder="Resposabilidades que realizará en la posición" class="form-control" id="inputAbsenceObservations" ng-required="(selectedOcacion.selected.id == 8) || (selectedOcacion.selected.id == 9)"></textarea>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-observaciones">Observaciones</span>
                <textarea placeholder="Consideraciones adicionales a tomar en cuenta para la búsqueda de personal" class="form-control" id="inputAbsenceObservations" ng-required="(selectedOcacion.selected.id == 8) || (selectedOcacion.selected.id == 9)"></textarea>
            </div>
            
        </div>
    </div>

    <button type="submit" class="btn btn-primary btn-with-icon" ng-show="(selectedBoss.selected.id) && (selectedOcacion.selected.id) && (dt)">
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