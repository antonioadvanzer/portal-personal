<form name="newSolicitud" ng-submit="save()">
    
    <div class="progress ng-scope" ng-show="sending">
      <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="40" style="width: 100%">
        <span class="sr-only">100% Complete (success)</span>
      </div>
    </div>
    
    <div class="row">

        <div class="col-md-6">
            
            <div class="input-group">
                <!--<label for="input01">Text</label>-->
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-addon1">Autorizador</span>
                <!--<input type="text" class="form-control" id="input01" placeholder="Text">-->
                    {{--<select class="form-control selectpicker" selectpicker title="Seleccionar">
                        <option>Julio Luna</option>
                        <option>Mauricio Cruz</option>
                    </select>--}}

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
                <input type="text" class="form-control with-primary-addon" id="inputNomina" placeholder="" value="@{{ user.nomina }}"  readonly>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-area">Área Actual</span>
                <input type="text" class="form-control with-primary-addon" id="inputArea" placeholder="" value="@{{ user.area_actual }}"  readonly>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-fecha">Fecha de Ingreso</span>
                <input type="text" class="form-control with-primary-addon" id="inputFecha" placeholder="" value="@{{ user.fecha_ingreso }}"  readonly>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-antiguedad">Antigüedad</span>
                <input type="text" class="form-control with-primary-addon" id="inputAntiguedad" placeholder="" value="@{{ user.antiguedad }}" readonly>
            </div>
            
        </div>
        
        <div class="col-md-6">
        
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-motivo">Motivo</span>
                <ui-select name="motivo" ng-model="selectedOcacion.selected"
                   class="btn-group bootstrap-select form-control"
                   ng-disabled="false"
                   append-to-body="true"
                   search-enabled="false"
                           on-select="setDays($item, $model)">
                  <ui-select-match placeholder="Seleccionar">
                    <span> @{{$select.selected.name}}</span>
                  </ui-select-match>
                  <ui-select-choices repeat="standardOcacion in standardSelectOcacions | filter: $select.search">
                    <span ng-bind-html="standardOcacion.name"></span>
                  </ui-select-choices>
                </ui-select>
            </div>
            
            <div class="input-group" ng-show="selectedOcacion.selected.id == 8">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-comprobante">Comprobante</span>
                <input type="file" class="form-control with-primary-addon" id="inputAbsenceComprobante" name="inputAbsenceComprobante" ng-model="formAbsence.inputAbsenceComprobante" accept=".pdf,image/*" valid-file ng-required="selectedOcacion.selected.id == 8">
            </div>
            <!--onchange="alert(this.files[0])"-->
            <!--<div class="input-group" ng-hide="(selectedOcacion.selected.id == 8) || (selectedOcacion.selected.id == 9)">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-dias">Días</span>
                <input type="text" class="form-control with-primary-addon" id="inputAbsenceDias" name="inputAbsenceDias" placeholder="" value="@{{selectedOcacion.selected.dias}}" readonly>
            </div>-->
            <!--<div class="input-group" ng-show="(selectedOcacion.selected.id == 8) || (selectedOcacion.selected.id == 9)">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-dias">Días a Solicitar</span>
                <input type="number" class="form-control with-primary-addon" min="1" id="inputAbsenceDiasSolicitar" name="inputAbsenceDiasSolicitar" ng-model="formAbsence.inputAbsenceDiasSolicitar" placeholder="">
            </div>-->
            
            <div class="input-group" >
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-dias">Días</span>
                <input type="number" class="form-control with-primary-addon" ng-disabled="!((selectedOcacion.selected.id == 8) || (selectedOcacion.selected.id == 9))" min="1" id="inputAbsenceDiasSolicitar" name="inputAbsenceDiasSolicitar" ng-model="formAbsence.inputAbsenceDiasSolicitar" ng-change="setDate()" placeholder="">
            </div>
            
            <div ng-show="selectedBoss.selected.id && selectedOcacion.selected.id">
            <div class="input-group" ng-controller="PermisosDeAusenciaModuleCtrl">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-desde">Desde</span>
                {{--<input type="text" class="form-control with-primary-addon" id="input01" placeholder="">--}}
                {{--<label>Fecha Seleccionada: <em>@{{formUser.dt | date:'fullDate' }}</em></label>--}}
                
                    <input id="inputAbsenceFechaInicio" type="text" class="form-control" uib-datepicker-popup="@{{format}}" datepicker-options="options" ng-model="dt" is-open="opened" ng-required="true" close-text="Close" alt-input-formats="altInputFormats" show-button-bar="false" ng-change="setDate()" readonly/>
                  <span class="input-group-btn" >
                    <button type="button" class="btn btn-default" ng-click="open()"><i class="glyphicon glyphicon-calendar"></i></button>
                  </span>
                
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-hasta">Hasta</span>
                <input type="text" class="form-control with-primary-addon" id="inputAbsenceFechaFin" name="inputAbsenceFechaFin" ng-model="formAbsence.inputAbsenceFechaFin" placeholder="" readonly>
            </div>
            </div>
        
        </div>
        
        

    </div>
    
    <div class="row">
        <div class="col-md-12">
            <div class="alert bg-warning" ng-show="(selectedOcacion.selected.id == 8) || (selectedOcacion.selected.id == 9)">
              Favor de redactar el detalle de tu ausencia en el campo <strong>Observaciones</strong> para facilitar la resolución de la solicitud
            </div>
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-observaciones">Observaciones</span>
                <textarea placeholder="Agrega cualquier comentario que consideres relevante para la autorización de tus días" class="form-control" id="inputAbsenceObservations" ng-required="(selectedOcacion.selected.id == 8) || (selectedOcacion.selected.id == 9)"></textarea>
            </div>
            
        </div>
    </div>

    <button type="submit" class="btn btn-primary btn-with-icon" ng-show="(selectedBoss.selected.id) && (selectedOcacion.selected.id) && (dt)">
      <i class="ion-ios-checkmark-outline"></i>Solicitar
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
  
  {{--<!--<div class="form-group">
    <label for="input01">Text</label>
    <input type="text" class="form-control" id="input01" placeholder="Text">
  </div>
  <div class="form-group">
    <label for="input02">Password</label>
    <input type="password" class="form-control" id="input02" placeholder="Password">
  </div>
  <div class="form-group">
    <label for="input03">Rounded Corners</label>
    <input type="text" class="form-control form-control-rounded" id="input03" placeholder="Rounded Corners">
  </div>
  <div class="form-group">
    <label for="input04">With help</label>
    <input type="text" class="form-control" id="input04" placeholder="With help">
    <span class="help-block sub-little-text">A block of help text that breaks onto a new line and may extend beyond one line.</span>
  </div>
  <div class="form-group">
    <label for="input05">Disabled Input</label>
    <input type="text" class="form-control" id="input05" placeholder="Disabled Input" disabled>
  </div>

  <div class="form-group">
    <label for="textarea01">Textarea</label>
    <textarea placeholder="Default Input" class="form-control" id="textarea01"></textarea>
  </div>

  <div class="form-group">
    <input type="text" class="form-control input-sm" id="input2" placeholder="Small Input">
  </div>
  <div class="form-group">
    <input type="text" class="form-control input-lg" id="input4" placeholder="Large Input">
  </div>-->--}}
</form>