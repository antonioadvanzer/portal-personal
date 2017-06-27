<form name="showSolicitud">
    
    <!--<div class="progress ng-scope" ng-show="sending">
      <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="40" style="width: 100%">
        <span class="sr-only">100% Complete (success)</span>
      </div>
    </div>-->
    
    <div class="row">

        <div class="col-md-6">
            
            <!--<div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="label-colaborador">Colaborador</span>
                <input type="text" class="form-control with-primary-addon" id="inputOwnAbsenceColaborador" name="inputOwnAbsenceColaborador" placeholder="" ng-model="formOwnAbsence.inputOwnAbsenceColaborador" readonly>
            </div>-->
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="label-autorizador">Autorizador</span>
                <input type="text" class="form-control with-primary-addon" id="inputOwnAbsenceAutorizador" name="inputOwnAbsenceAutorizador"  placeholder="" ng-model="formOwnAbsence.inputOwnAbsenceAutorizador" readonly>
            </div>
            
            <div class="input-group" >
                <span class="input-group-addon input-group-addon-primary addon-left" id="label-dias">Días</span>
                <input type="text" class="form-control with-primary-addon" id="inputOwnAbsenceDias" name="inputOwnAbsenceDias" placeholder="" ng-model="formOwnAbsence.inputOwnAbsenceDias" readonly>
            </div>
            
            <div class="input-group" >
                <span class="input-group-addon input-group-addon-primary addon-left" id="label-estado">Estado</span>
                <input type="text" class="form-control with-primary-addon" id="inputOwnAbsenceEstado" name="inputOwnAbsenceEstado" placeholder="" ng-model="formOwnAbsence.inputOwnAbsenceEstado" readonly>
            </div>
            
        </div>
        
        <div class="col-md-6">
        
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="label-motivo">Motivo</span>
                <input type="text" class="form-control with-primary-addon" id="inputOwnAbsenceMotivo" name="inputOwnAbsenceMotivo" placeholder="" ng-model="formOwnAbsence.inputOwnAbsenceMotivo" readonly>
                <span class="input-group-btn" ng-show="(formOwnAbsence.inputOwnAbsenceOcacion == 8)">
                  <button class="btn btn-info" ng-click="getRecibo()" type="button">Ver Comprobante</button>
              </span>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="label-desde">Desde</span>
                <input type="text" class="form-control with-primary-addon" id="inputOwnAbsenceDesde" name="inputOwnAbsenceDesde" placeholder="" ng-model="formOwnAbsence.inputOwnAbsenceDesde" readonly>
                
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="label-hasta">Hasta</span>
                <input type="text" class="form-control with-primary-addon" id="inputOwnAbsenceHasta" name="inputOwnAbsenceHasta"  placeholder="" ng-model="formOwnAbsence.inputOwnAbsenceHasta" readonly>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-hasta">Regresa</span>
                <input type="text" class="form-control with-primary-addon" id="inputOwnAbsenceRegresa" name="inputOwnAbsenceRegresa"  placeholder="" ng-model="formOwnAbsence.inputOwnAbsenceRegresa" readonly>
            </div>
            
        </div>
        
        

    </div>
    
    <div class="row">
        <div class="col-md-12">
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-observaciones">Observaciones</span>
                <textarea placeholder="" class="form-control" id="inputOwnAbsenceObservaciones" name="inputOwnAbsenceObservaciones" ng-model="formOwnAbsence.inputOwnAbsenceObservaciones" readonly>@{{formOwnAbsence.inputOwnAbsenceObservaciones}}</textarea>
            </div>
            
        </div>
    </div>
    
    <div class="row" ng-show="formAbsenceReceived.inputAbsenceReceivedStatus == 4">
        <div class="col-md-12">
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-observaciones">Motivo Cancelaci&oacute;n </span>
                <textarea placeholder="" class="form-control" id="inputOwnAbsenceMotivoCancelacion" name="inputOwnAbsenceMotivoCancelacion" ng-model="formOwnAbsence.inputOwnAbsenceMotivoCancelacion" readonly></textarea>
            </div>
            
        </div>
    </div>
    
    <h3 class="with-line">Autorizadores</h3>
    
    <div class="row">
        <div class="col-md-6">
            <div class="input-group" align="center">
                <h5 class="button-title">Jefe Directo/Jefe de Proyecto</h5><br>
                <div type="button" ng-show="formOwnAbsence.inputOwnAbsenceAuthBoss == 1" class="btn btn-success btn-icon"><i class="ion-android-checkmark-circle"></i></div>
                <div type="button" ng-show="formOwnAbsence.inputOwnAbsenceAuthBoss == 0" class="btn btn-info btn-icon"><i class="ion-help"></i></div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="input-group">
                <h5 class="button-title">Capital Humano</h5><br>
                <div type="button" ng-show="formOwnAbsence.inputOwnAbsenceAuthCh == 1" class="btn btn-success btn-icon"><i class="ion-android-checkmark-circle"></i></div>
                <div type="button" ng-show="formOwnAbsence.inputOwnAbsenceAuthCh == 0" class="btn btn-info btn-icon"><i class="ion-help"></i></div>
            </div>
        </div>
    </div>
    
</form>