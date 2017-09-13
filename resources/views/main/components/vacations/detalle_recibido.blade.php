<form name="showVacationsReceived">
    
    <div class="progress ng-scope" ng-show="sending">
      <div class="progress-bar progress-bar-primary progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="40" style="width: 100%">
        <span class="sr-only">100% Complete (success)</span>
      </div>
    </div>
    
    <div class="row">

        <div class="col-md-6">
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="label-colaborador">Colaborador</span>
                <!--<input type="text" class="form-control with-primary-addon" id="inputRequestReceivedColaborador" name="inputRequestReceivedColaborador" placeholder="" ng-model="formRequestReceived.inputRequestReceivedColaborador" readonly>-->
                <label class="form-control with-primary-addon">@{{formRequestReceived.inputRequestReceivedColaborador}}</label>
            </div>
            
            <!--<div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="label-autorizador">Autorizador</span>
                <input type="text" class="form-control with-primary-addon" id="inputAbsenceReceivedAutorizador" name="inputAbsenceReceivedAutorizador"  placeholder="" ng-model="formAbsenceReceived.inputAbsenceReceivedAutorizador" readonly>
            </div>-->
            
            <div class="input-group" >
                <span class="input-group-addon input-group-addon-primary addon-left" id="label-dias">D&iacute;as</span>
                <!--<input type="text" class="form-control with-primary-addon" id="inputRequestReceivedDias" name="inputRequestReceivedDias" placeholder="" ng-model="formRequestReceived.inputRequestReceivedDias" readonly>-->
                <label class="form-control with-primary-addon">@{{formRequestReceived.inputRequestReceivedDias}}</label>
            </div>
            
            <div class="input-group" >
                <span class="input-group-addon input-group-addon-primary addon-left" id="label-estado">Estado</span>
                <!--<input type="text" class="form-control with-primary-addon" id="inputRequestReceivedEstado" name="inputRequestReceivedEstado" placeholder="" ng-model="formRequestReceived.inputRequestReceivedEstado" readonly>-->
                <label class="form-control with-primary-addon">@{{formRequestReceived.inputRequestReceivedEstado}}</label>
            </div>
            
        </div>
        
        <div class="col-md-6">
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="label-desde">Desde</span>
                <!--<input type="text" class="form-control with-primary-addon" id="inputRequestReceivedDesde" name="inputRequestReceivedDesde" placeholder="" ng-model="formRequestReceived.inputRequestReceivedDesde" readonly>-->
                <label class="form-control with-primary-addon">@{{formRequestReceived.inputRequestReceivedDesde}}</label>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="label-hasta">Hasta</span>
                <!--<input type="text" class="form-control with-primary-addon" id="inputRequestReceivedHasta" name="inputRequestReceivedHasta" placeholder="" ng-model="formRequestReceived.inputRequestReceivedHasta" readonly>-->
                <label class="form-control with-primary-addon">@{{formRequestReceived.inputRequestReceivedHasta}}</label>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-hasta">Regresa</span>
                <!--<input type="text" class="form-control with-primary-addon" id="inputRequestReceivedRegresa" name="inputRequestReceivedRegresa" placeholder="" ng-model="formRequestReceived.inputRequestReceivedRegresa" readonly>-->
                <label class="form-control with-primary-addon">@{{formRequestReceived.inputRequestReceivedRegresa}}</label>
            </div>
            
        </div>
        
    </div>
    
    <div class="row">
        <div class="col-md-12">
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-observaciones">Observaciones</span>
                <!--<textarea placeholder="" class="form-control" id="inputRequestReceivedObservaciones" name="inputRequestReceivedObservaciones" ng-model="formRequestReceived.inputRequestReceivedObservaciones" readonly>@{{formRequestReceived.inputRequestReceivedObservaciones}}</textarea>-->
                <p class="form-control">@{{formRequestReceived.inputRequestReceivedObservaciones}}</p>
            </div>
            
        </div>
    </div>
    
    <div class="row" ng-show="formRequestReceived.inputRequestReceivedStatus == 4">
        <div class="col-md-12">
            <div class="alert bg-danger">
              Favor de redactar el motivo de la cancelaci&oacute;n 
            </div>
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-observaciones">Motivo Cancelaci&oacute;n </span>
                <textarea placeholder="" class="form-control" id="inputRequestReceivedMotivoCancelacion" ng-model="formRequestReceived.inputRequestReceivedMotivoCancelacion"></textarea>
            </div>
            
        </div>
    </div>
    
    <h3 class="with-line">Autorizadores</h3>
    
    <div class="row">
        <div class="col-md-6">
            <div class="input-group" align="center">
                <h5 class="button-title">Jefe Directo/Jefe de Proyecto</h5><br>
                <div ng-show="formRequestReceived.inputRequestReceivedAuthBoss == 1" class="alert bg-success col-md-4" align="center"><!--<i class="ion-android-checkmark-circle"></i>--><h3>Autorizado</h3></div>
                <div ng-show="formRequestReceived.inputRequestReceivedAuthBoss == 0" class="alert bg-info col-md-4" align="center"><!--<i class="ion-help"></i>--><h3>En Espera</h3></div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="input-group" align="center">
                <h5 class="button-title">Capital Humano</h5><br>
                <div ng-show="formRequestReceived.inputRequestReceivedAuthCh == 1" class="alert bg-success col-md-4" align="center"><!--<i class="ion-android-checkmark-circle"></i>--><h3>Autorizado</h3></div>
                <div ng-show="formRequestReceived.inputRequestReceivedAuthCh == 0" class="alert bg-info col-md-4" align="center"><!--<i class="ion-help"></i>--><h3>En Espera</h3></div>
            </div>
        </div>
    </div>
  
    <div ng-show="((formRequestReceived.inputRequestReceivedOcacion != 8) || (formRequestReceived.inputRequestReceivedOcacion != 9)) && (formRequestReceived.inputRequestReceivedStatus == 2)">
    <h3 class="with-line"></h3>

    <!--<button type="submit" class="btn btn-primary btn-with-icon" ng-show="(selectedBoss.selected.id) && (selectedOcacion.selected.id) && (dt)">
      <i class="ion-ios-checkmark-outline"></i>Solicitar
    </button>-->
    <div class="row">
        <div class="col-sm-4 col-xs-6">
            <button type="button" ng-click="acceptRequest()" class="btn btn-info btn-lg">Aceptar</button>
        </div>
        <div class="col-sm-4 col-xs-6">
            <button type="button" ng-click="rejectRequest()" class="btn btn-warning btn-lg">Rechazar</button>
        </div>
    </div>
    
    </div>
    
    <div ng-show="formRequestReceived.inputRequestReceivedStatus == 4">
    <h3 class="with-line"></h3>

    <!--<button type="submit" class="btn btn-primary btn-with-icon" ng-show="(selectedBoss.selected.id) && (selectedOcacion.selected.id) && (dt)">
      <i class="ion-ios-checkmark-outline"></i>Solicitar
    </button>-->
    <div class="row">
        <div class="col-sm-4 col-xs-6">
            <button type="button" ng-click="sendRejectRequest()"class="btn btn-info btn-lg" ng-disabled="formRequestReceived.inputRequestReceivedMotivoCancelacion == ''" >Continuar</button>
        </div>
        <div class="col-sm-4 col-xs-6">
            <button type="button" ng-click="cancelRejectRequest()" class="btn btn-warning btn-lg">Cancelar</button>
        </div>
    </div>
    
    </div>
    
</form>