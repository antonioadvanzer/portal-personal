<form name="showAbsenceSend">
    
    <!--<div class="progress ng-scope" ng-show="sending">
      <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="40" style="width: 100%">
        <span class="sr-only">100% Complete (success)</span>
      </div>
    </div>-->
    
    <div class="row">
        <!--<span>@{{vm.var}}</span>-->
        <div class="col-md-6">
            
            <!--<div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="label-colaborador">Colaborador</span>
                <input type="text" class="form-control with-primary-addon" id="inputOwnAbsenceColaborador" name="inputOwnAbsenceColaborador" placeholder="" ng-model="formOwnAbsence.inputOwnAbsenceColaborador" readonly>
            </div>-->
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="label-autorizador">Autorizador</span>
                <!--<input type="text" class="form-control with-primary-addon" id="inputOwnAbsenceAutorizador" name="inputOwnAbsenceAutorizador" placeholder="" ng-model="formOwnAbsence.inputOwnAbsenceAutorizador" readonly>-->
                <label class="form-control with-primary-addon">@{{formOwnAbsence.inputOwnAbsenceAutorizador}}</label>
            </div>
            
            <div class="input-group" >
                <span class="input-group-addon input-group-addon-primary addon-left" id="label-dias">Días</span>
                <!--<input type="text" class="form-control with-primary-addon" id="inputOwnAbsenceDias" name="inputOwnAbsenceDias" placeholder="" ng-model="formOwnAbsence.inputOwnAbsenceDias" readonly>-->
                <label class="form-control with-primary-addon">@{{formOwnAbsence.inputOwnAbsenceDias}}</label>
            </div>
            
            <div class="input-group" >
                <span class="input-group-addon input-group-addon-primary addon-left" id="label-estado">Estado</span>
                <!--<input type="text" class="form-control with-primary-addon" id="inputOwnAbsenceEstado" name="inputOwnAbsenceEstado" placeholder="" ng-model="formOwnAbsence.inputOwnAbsenceEstado" readonly>-->
                <label class="form-control with-primary-addon">@{{formOwnAbsence.inputOwnAbsenceEstado}}</label>
            </div>
            
        </div>
        
        <div class="col-md-6">
        
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="label-motivo">Motivo</span>
                <!--<input type="text" class="form-control with-primary-addon" id="inputOwnAbsenceMotivo" name="inputOwnAbsenceMotivo" placeholder="" ng-model="formOwnAbsence.inputOwnAbsenceMotivo" readonly>-->
                <label class="form-control with-primary-addon">@{{formOwnAbsence.inputOwnAbsenceMotivo}}</label>
                <span class="input-group-btn" ng-show="(formOwnAbsence.inputOwnAbsenceOcacion == 8)">
                  <button class="btn btn-info" ng-click="getRecibo()" type="button">Ver Comprobante</button>
              </span>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="label-desde">Desde</span>
                <!--<input type="text" class="form-control with-primary-addon" id="inputOwnAbsenceDesde" name="inputOwnAbsenceDesde" placeholder="" ng-model="formOwnAbsence.inputOwnAbsenceDesde" readonly>-->
                <label class="form-control with-primary-addon">@{{formOwnAbsence.inputOwnAbsenceDesde}}</label>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="label-hasta">Hasta</span>
                <!--<input type="text" class="form-control with-primary-addon" id="inputOwnAbsenceHasta" name="inputOwnAbsenceHasta"  placeholder="" ng-model="formOwnAbsence.inputOwnAbsenceHasta" readonly>-->
                <label class="form-control with-primary-addon">@{{formOwnAbsence.inputOwnAbsenceHasta}}</label>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-hasta">Regresa</span>
                <!--<input type="text" class="form-control with-primary-addon" id="inputOwnAbsenceRegresa" name="inputOwnAbsenceRegresa"  placeholder="" ng-model="formOwnAbsence.inputOwnAbsenceRegresa" readonly>-->
                <label class="form-control with-primary-addon">@{{formOwnAbsence.inputOwnAbsenceRegresa}}</label>
            </div>
            
        </div>
        
        

    </div>
    
    <div class="row">
        <div class="col-md-12">
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-observaciones">Observaciones</span>
                <!--<textarea placeholder="" class="form-control" id="inputOwnAbsenceObservaciones" name="inputOwnAbsenceObservaciones" ng-model="formOwnAbsence.inputOwnAbsenceObservaciones" readonly>@{{formOwnAbsence.inputOwnAbsenceObservaciones}}</textarea>-->
                <p class="form-control">@{{formOwnAbsence.inputOwnAbsenceObservaciones}}</p>
            </div>
        </div>
    </div>
    
    <div class="row" ng-if="formOwnAbsence.inputOwnAbsenceStatus == 4">
        <div class="col-md-12">
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-observaciones">Motivo Cancelaci&oacute;n </span>
                <!--<textarea placeholder="" class="form-control" id="inputOwnAbsenceMotivoCancelacion" name="inputOwnAbsenceMotivoCancelacion" ng-model="formOwnAbsence.inputOwnAbsenceMotivoCancelacion" readonly></textarea>-->
                <p class="form-control">@{{formOwnAbsence.inputOwnAbsenceMotivoCancelacion}}</p>
            </div>
            
        </div>
    </div>
    
    <h3 class="with-line">Autorizadores</h3>
    
    <div class="row">
        <div class="col-md-6">
            <div class="input-group" align="center">
                <h5 class="button-title">Jefe Directo/Jefe de Proyecto</h5><br>
                <div ng-show="formOwnAbsence.inputOwnAbsenceAuthBoss == 1" class="alert bg-success col-md-4" align="center"><!--<i class="ion-android-checkmark-circle"></i>--><h3>Autorizado</h3></div>
                <div ng-show="formOwnAbsence.inputOwnAbsenceAuthBoss == 0" class="alert bg-info col-md-4" align="center"><!--<i class="ion-help"></i>--><h3>En Espera</h3></div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="input-group" align="center">
                <h5 class="button-title">Capital Humano</h5><br>
                <div ng-show="formOwnAbsence.inputOwnAbsenceAuthCh == 1" class="alert bg-success col-md-4" align="center"><!--<i class="ion-android-checkmark-circle"></i>--><h3>Autorizado</h3></div>
                <div ng-show="formOwnAbsence.inputOwnAbsenceAuthCh == 0" class="alert bg-info col-md-4" align="center"><!--<i class="ion-help"></i>--><h3>En Espera</h3></div>
            </div>
        </div>
    </div>
    
</form>