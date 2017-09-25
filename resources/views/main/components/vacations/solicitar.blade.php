<form name="newSolicitud" ng-submit="save()">
    
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
        <div class="col-md-12">
            <div class="alert bg-warning" ng-show="diasDisponibles == 0">
              No tienes dias disponibles para tomar
            </div>
        </div>
    </div>
    
    <div class="row">

        <div class="col-md-6">
            
            <div class="input-group">
                <!--<label for="input01">Text</label>-->
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-addon1">Autorizador</span>
                
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
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-nomina"># Nómina</span>
                <!--<input type="text" class="form-control with-primary-addon" id="inputNomina" placeholder="" value="@{{ user.nomina }}"  readonly>-->
                <label class="form-control">@{{user.nomina}}</label>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-area">Área Actual</span>
                <!--<input type="text" class="form-control with-primary-addon" id="inputArea" placeholder="" value="@{{ user.area_actual }}"  readonly>-->
                <label class="form-control">@{{user.area_actual}}</label>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-fecha">Fecha de Ingreso</span>
                <!--<input type="text" class="form-control with-primary-addon" id="inputFecha" placeholder="" value="@{{ user.fecha_ingreso }}"  readonly>-->
                <label class="form-control">@{{user.fecha_ingreso}}</label>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-antiguedad">Antigüedad</span>
                <!--<input type="text" class="form-control with-primary-addon" id="inputAntiguedad" placeholder="" value="@{{ user.antiguedad }}" readonly>-->
                <label class="form-control">@{{user.antiguedad}}</label>
            </div>
            
        </div>
        
        <div class="col-md-6">
        
            <div class="input-group" >
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-dias">Días</span>
                <!--<input type="number" class="form-control with-primary-addon" ng-disabled="!((selectedOcacion.selected.id == 8) || (selectedOcacion.selected.id == 9))" min="1" id="inputAbsenceDiasSolicitar" name="inputAbsenceDiasSolicitar" ng-model="formAbsence.inputAbsenceDiasSolicitar" ng-change="setDate()" placeholder="">-->
                
                <input type="hidden" id="inputRequestDiasSolicitar" name="inputRequestDiasSolicitar" value="">
                
                <ui-select ng-model="selectedDays.selected"
                   class="btn-group bootstrap-select form-control"
                   ng-disabled="false"
                   append-to-body="true"
                   search-enabled="false"
                           on-select="setDays($item, $model)">
                  <ui-select-match placeholder="Seleccionar">
                    <span> @{{$select.selected.days}}</span>
                  </ui-select-match>
                  <ui-select-choices repeat="selectedDays in standardSelectDays | filter: $select.search">
                    <span ng-bind-html="selectedDays.days"></span>
                  </ui-select-choices>
                </ui-select>
            </div>
            
            <div ng-show="selectedBoss.selected.id && selectedDays.selected.dias">
            <div class="input-group" ng-controller="VacacionesModuleCtrl">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-desde">Desde</span>
                
                    <input id="inputRequestFechaInicio" type="text" class="form-control" uib-datepicker-popup="@{{format}}" datepicker-options="options" ng-model="dt" is-open="opened" ng-required="true" close-text="Close" alt-input-formats="altInputFormats" show-button-bar="false" ng-change="setDate()" readonly/>
                  <span class="input-group-btn" >
                    <button type="button" class="btn btn-default" ng-click="open()"><i class="glyphicon glyphicon-calendar"></i></button>
                  </span>
                
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-hasta">Hasta</span>
                <input type="text" class="form-control with-primary-addon" id="inputRequestFechaFin" name="inputRequestFechaFin" ng-model="formRequest.inputRequestFechaFin" placeholder="" readonly>
            </div>
                
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-regresa">Regresa a Laborar</span>
                <input type="text" class="form-control with-primary-addon" id="inputRequestFechaRetorno" name="inputRequestFechaRetorno" ng-model="formRequest.inputRequestFechaRetorno" placeholder="" readonly>
            </div>
            </div>
            
        </div>
        
        

    </div>
    
    <div class="row">
        <div class="col-md-12">
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-observaciones">Observaciones</span>
                <textarea placeholder="Agrega cualquier comentario que consideres relevante para la autorización de tus días" class="form-control" id="inputRequestObservations"></textarea>
            </div>
            
        </div>
    </div>

    <button type="submit" class="btn btn-primary btn-with-icon" ng-show="(selectedBoss.selected.id) && (selectedDays.selected.dias) && (dt)">
      <i class="ion-ios-checkmark-outline"></i>Solicitar
    </button>
    
    <button type="button" class="btn btn-danger btn-with-icon" ng-click="goBack()">
        <i class="ion-android-cancel"></i>Cancelar
    </button>
        
    </div>
    
</form>