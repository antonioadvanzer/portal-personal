<form name="showAbsenceReceived">
    
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
                <span class="input-group-addon input-group-addon-primary addon-left" id="label-colaborador">Colaborador</span>
                <!--<input type="text" class="form-control with-primary-addon" id="inputAbsenceReceivedColaborador" name="v" placeholder="" ng-model="formAbsenceReceived.inputAbsenceReceivedColaborador" readonly>-->
                <label class="form-control with-primary-addon">@{{formAbsenceReceived.inputAbsenceReceivedColaborador}}</label>
            </div>
            
            <!--<div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="label-autorizador">Autorizador</span>
                <input type="text" class="form-control with-primary-addon" id="inputAbsenceReceivedAutorizador" name="inputAbsenceReceivedAutorizador"  placeholder="" ng-model="formAbsenceReceived.inputAbsenceReceivedAutorizador" readonly>
            </div>-->
            
            <div class="input-group" >
                <span class="input-group-addon input-group-addon-primary addon-left" id="label-dias">Días</span>
                <!--<input type="text" class="form-control with-primary-addon" id="inputAbsenceReceivedDias" name="inputAbsenceReceivedDias" placeholder="" ng-model="formAbsenceReceived.inputAbsenceReceivedDias" readonly>-->
                <label class="form-control with-primary-addon">@{{formAbsenceReceived.inputAbsenceReceivedDias}}</label>
            </div>
            
            <div class="input-group" >
                <span class="input-group-addon input-group-addon-primary addon-left" id="label-estado">Estado</span>
                <!--<input type="text" class="form-control with-primary-addon" id="inputAbsenceReceivedEstado" name="inputAbsenceReceivedEstado" placeholder="" ng-model="formAbsenceReceived.inputAbsenceReceivedEstado" readonly>-->
                <label class="form-control with-primary-addon">@{{formAbsenceReceived.inputAbsenceReceivedEstado}}</label>
            </div>
            
        </div>
        
        <div class="col-md-6">
        
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="label-motivo">Motivo</span>
                <!--<input type="text" class="form-control with-primary-addon" id="inputAbsenceReceivedMotivo" name="inputAbsenceReceivedMotivo" placeholder="" ng-model="formAbsenceReceived.inputAbsenceReceivedMotivo" readonly>-->
                <label class="form-control with-primary-addon">@{{formAbsenceReceived.inputAbsenceReceivedMotivo}}</label>
                <span class="input-group-btn" ng-show="(formAbsenceReceived.inputAbsenceReceivedOcacion == 8)">
                  <button class="btn btn-info" ng-click="getComprobante()" type="button">Ver Comprobante</button>
              </span>
            </div>
            
            <!--<div class="input-group" >
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-comprobante">Comprobante</span>
                <input type="text" class="form-control with-primary-addon" id="inputComprobante" placeholder="" value="@{{ user.nomina }}"  readonly>
            </div>-->
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="label-desde">Desde</span>
                <!--<input type="text" class="form-control with-primary-addon" id="inputAbsenceReceivedDesde" name="inputAbsenceReceivedDesde" placeholder="" ng-model="formAbsenceReceived.inputAbsenceReceivedDesde" readonly>-->
                <label class="form-control with-primary-addon">@{{formAbsenceReceived.inputAbsenceReceivedDesde}}</label>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="label-hasta">Hasta</span>
                <!--<input type="text" class="form-control with-primary-addon" id="inputAbsenceReceivedHasta" name="inputAbsenceReceivedHasta" placeholder="" ng-model="formAbsenceReceived.inputAbsenceReceivedHasta" readonly>-->
                <label class="form-control with-primary-addon">@{{formAbsenceReceived.inputAbsenceReceivedHasta}}</label>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-hasta">Regresa</span>
                <!--<input type="text" class="form-control with-primary-addon" id="inputAbsenceReceivedRegresa" name="inputAbsenceReceivedRegresa" placeholder="" ng-model="formAbsenceReceived.inputAbsenceReceivedRegresa" readonly>-->
                <label class="form-control with-primary-addon">@{{formAbsenceReceived.inputAbsenceReceivedRegresa}}</label>
            </div>
            
        </div>
        
    </div>
    
    <div class="row">
        <div class="col-md-12">
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-observaciones">Observaciones</span>
                <!--<textarea placeholder="" class="form-control" id="inputAbsenceReceivedObservaciones" name="inputAbsenceReceivedObservaciones" ng-model="formAbsenceReceived.inputAbsenceReceivedObservaciones" readonly>@{{formAbsenceReceived.inputAbsenceReceivedObservaciones}}</textarea>-->
                <p class="form-control">@{{formAbsenceReceived.inputAbsenceReceivedObservaciones}}</p>
            </div>
            
        </div>
    </div>
    
    <div class="row" ng-show="formAbsenceReceived.inputAbsenceReceivedStatus == 4">
        <div class="col-md-12">
            <div class="alert bg-danger">
              Favor de redactar el motivo de la cancelaci&oacute;n 
            </div>
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-observaciones">Motivo Cancelaci&oacute;n </span>
                <textarea placeholder="" class="form-control" id="inputAbsenceReceivedMotivoCancelacion" ng-model="formAbsenceReceived.inputAbsenceReceivedMotivoCancelacion" required></textarea>
            </div>
            
        </div>
    </div>
    
    <h3 class="with-line">Autorizadores</h3>
    
    <div class="row">
        <div class="col-md-6">
            <div class="input-group" align="center">
                <h5 class="button-title">Jefe Directo/Jefe de Proyecto</h5><br>
                <div ng-show="formAbsenceReceived.inputAbsenceReceivedAuthBoss == 1" class="alert bg-success col-md-4" align="center"><!--<i class="ion-android-checkmark-circle"></i>--><h3>Autorizado</h3></div>
                <div ng-show="formAbsenceReceived.inputAbsenceReceivedAuthBoss == 0" class="alert bg-info col-md-4" align="center"><!--<i class="ion-help"></i>--><h3>En Espera</h3></div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="input-group" align="center">
                <h5 class="button-title">Capital Humano</h5><br>
                <div ng-show="formAbsenceReceived.inputAbsenceReceivedAuthCh == 1" class="alert bg-success col-md-4" align="center"><!--<i class="ion-android-checkmark-circle"></i>--><h3>Autorizado</h3></div>
                <div ng-show="formAbsenceReceived.inputAbsenceReceivedAuthCh == 0" class="alert bg-info col-md-4" align="center"><!--<i class="ion-help"></i>--><h3>En Espera</h3></div>
            </div>
        </div>
    </div>
  
    <div ng-show="((formAbsenceReceived.inputAbsenceReceivedOcacion != 8) || (formAbsenceReceived.inputAbsenceReceivedOcacion != 9)) && (formAbsenceReceived.inputAbsenceReceivedStatus == 2)">
    <h3 class="with-line"></h3>

    <!--<button type="submit" class="btn btn-primary btn-with-icon" ng-show="(selectedBoss.selected.id) && (selectedOcacion.selected.id) && (dt)">
      <i class="ion-ios-checkmark-outline"></i>Solicitar
    </button>-->
    <div class="row">
        <div class="col-sm-4 col-xs-6">
            <button type="button" ng-click="acceptAbsence()" class="btn btn-info btn-lg">Aceptar</button>
        </div>
        <div class="col-sm-4 col-xs-6">
            <button type="button" ng-click="rejectAbsence()" class="btn btn-warning btn-lg">Rechazar</button>
        </div>
    </div>
    
    </div>
    
    <div ng-show="formAbsenceReceived.inputAbsenceReceivedStatus == 4">
    <h3 class="with-line"></h3>

    <!--<button type="submit" class="btn btn-primary btn-with-icon" ng-show="(selectedBoss.selected.id) && (selectedOcacion.selected.id) && (dt)">
      <i class="ion-ios-checkmark-outline"></i>Solicitar
    </button>-->
    <div class="row">
        <div class="col-sm-4 col-xs-6">
            <button type="button" ng-click="sendRejectAbsence()"class="btn btn-info btn-lg" ng-disabled="formAbsenceReceived.inputAbsenceReceivedMotivoCancelacion == ''" >Continuar</button>
        </div>
        <div class="col-sm-4 col-xs-6">
            <button type="button" ng-click="cancelRejectAbsence()" class="btn btn-warning btn-lg">Cancelar</button>
        </div>
    </div>
    
    </div>
    
    </div>
    
</form>