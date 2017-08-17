<form name="showSolicitud">
    
    <div class="progress ng-scope" ng-show="sending">
      <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="40" style="width: 100%">
        <span class="sr-only">100% Complete (success)</span>
      </div>
    </div>
    
    <div class="row">

        <div class="col-md-6">
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="label-colaborador">Colaborador</span>
                <!--<input type="text" class="form-control with-primary-addon" id="inputRequestColaborador" name="inputRequestColaborador" placeholder="" ng-model="formRequest.inputRequestColaborador" readonly>-->
                <label class="form-control">@{{formRequest.inputRequestColaborador}}</label>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="label-autorizador">Autorizador</span>
                <!--<input type="text" class="form-control with-primary-addon" id="inputRequestAutorizador" name="inputRequestAutorizador" placeholder="" ng-model="formRequest.inputRequestAutorizador" readonly>-->
                <label class="form-control">@{{formRequest.inputRequestAutorizador}}</label>
            </div>
            
            <div class="input-group" >
                <span class="input-group-addon input-group-addon-primary addon-left" id="label-dias">Días</span>
                <!--<input type="text" class="form-control with-primary-addon" id="inputRequestDias" name="inputRequestDias" placeholder="" ng-model="formRequest.inputRequestDias" readonly>-->
                <label class="form-control">@{{formRequest.inputRequestDias}}</label>
            </div>
            
            <div class="input-group" >
                <span class="input-group-addon input-group-addon-primary addon-left" id="label-tipo">Tipo</span>
                <!--<input type="text" class="form-control with-primary-addon" id="inputRequestTipo" name="inputRequestTipo" placeholder="" ng-model="formRequest.inputRequestTipo" readonly>-->
                <label class="form-control">@{{formRequest.inputRequestTipo}}</label>
            </div>
            
            <div class="input-group" >
                <span class="input-group-addon input-group-addon-primary addon-left" id="label-estado">Estado</span>
                <!--<input type="text" class="form-control with-primary-addon" id="inputRequestEstado" name="inputRequestEstado" placeholder="" ng-model="formRequest.inputRequestEstado" readonly>-->
                <label class="form-control">@{{formRequest.inputRequestEstado}}</label>
            </div>
            
        </div>
        
        <div class="col-md-6">
        
            <div class="input-group" ng-if="formRequest.labelRequestType == 2">
                <span class="input-group-addon input-group-addon-primary addon-left" id="label-motivo">Motivo</span>
                <!--<input type="text" class="form-control with-primary-addon" id="inputRequestMotivo" name="inputRequestMotivo" placeholder="" ng-model="formRequest.inputRequestMotivo" readonly>-->
                <label class="form-control">@{{formRequest.inputRequestMotivo}}</label>
                <span class="input-group-btn" ng-show="(formRequest.inputRequestOcacion == 8)">
                  <button class="btn btn-info" ng-click="getComprobante()" type="button">Ver Comprobante</button>
              </span>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="label-desde">Desde</span>
                <!--<input type="text" class="form-control with-primary-addon" id="inputRequestDesde" name="inputRequestDesde" placeholder="" ng-model="formRequest.inputRequestDesde" readonly>-->
                <label class="form-control">@{{formRequest.inputRequestDesde}}</label>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="label-hasta">Hasta</span>
                <!--<input type="text" class="form-control with-primary-addon" id="inputRequestHasta" name="inputRequestHasta" placeholder="" ng-model="formRequest.inputRequestHasta" readonly>-->
                <label class="form-control">@{{formRequest.inputRequestHasta}}</label>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-hasta">Regresa</span>
                <!--<input type="text" class="form-control with-primary-addon" id="inputRequestRegresa" name="inputRequestRegresa" placeholder="" ng-model="formRequest.inputRequestRegresa" readonly>-->
                <label class="form-control">@{{formRequest.inputRequestRegresa}}</label>
            </div>
            
        </div>
        
    </div>
    
    <div class="row">
        <div class="col-md-12">
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-observaciones">Observaciones</span>
                <textarea placeholder="" class="form-control" id="inputRequestObservationes" name="inputRequestObservationes" ng-model="formRequest.inputRequestObservationes" readonly></textarea>
            </div>
            
        </div>
    </div>
    
    <div class="row" ng-if="formRequest.labelRequestStatus == 4">
        <div class="col-md-12">
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-observaciones">Motivo Cancelaci&oacute;n </span>
                <textarea placeholder="" class="form-control" id="inputRequestMotivoCancelacion" name="inputRequestMotivoCancelacion" ng-model="formRequest.inputRequestMotivoCancelacion" readonly></textarea>
            </div>
            
        </div>
    </div>
    
    <div class="row" ng-if="!formRequest.requestStatus">
        <div class="col-md-12">
            <div class="alert bg-danger">
              Favor de redactar el motivo de la declinaci&oacute;n 
            </div>
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-motivo">Motivo</span>
                <textarea placeholder="" class="form-control" id="inputRequestMotivoCancelacion" ng-model="formRequest.inputRequestMotivoCancelacion"></textarea>
            </div>
            
        </div>
    </div>
    
    <h3 class="with-line">Autorizadores</h3>
    
    <div class="row">
        <div class="col-md-6">
            <div class="input-group">
                <h5 class="button-title">Jefe Directo/Jefe de Proyecto</h5><br>
                <div type="button" ng-show="formRequest.inputRequestAuthBoss == 1" class="btn btn-success btn-icon"><i class="ion-android-checkmark-circle"></i></div>
                <div type="button" ng-show="formRequest.inputRequestAuthBoss == 0" class="btn btn-info btn-icon"><i class="ion-help"></i></div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="input-group">
                <h5 class="button-title">Capital Humano</h5><br>
                <div type="button" ng-show="formRequest.inputRequestAuthCh == 1" class="btn btn-success btn-icon"><i class="ion-android-checkmark-circle"></i></div>
                <div type="button" ng-show="formRequest.inputRequestAuthCh == 0" class="btn btn-info btn-icon"><i class="ion-help"></i></div>
            </div>
        </div>
    </div>
  
    <div ng-if="formRequest.requestStatus">
    <h3 class="with-line"></h3>

    <div class="row">
        <div ng-if="formRequest.labelRequestStatus == 3">
        <div class="col-sm-4 col-xs-6">
            <button type="button" ng-click="authRequest()" class="btn btn-success btn-lg">Autorizar</button>
        </div>
        <div class="col-sm-4 col-xs-6">
            <button type="button" ng-click="rejectRequest()" class="btn btn-warning btn-lg">Declinar</button>
        </div>
        </div>
        <div class="col-sm-4 col-xs-6" ng-if="((formRequest.inputRequestOcacion==8) || (formRequest.inputRequestOcacion==9)) && ((formRequest.labelRequestStatus != 4) &&(formRequest.labelRequestStatus != 5) && (formRequest.labelRequestStatus != 1))">
            <button type="button" ng-click="cancelRequest()" class="btn btn-danger btn-lg">Cancelar</button>
        </div>
    </div>
    
    </div>
    
    <div ng-if="!formRequest.requestStatus">
    <h3 class="with-line"></h3>

    <!--<button type="submit" class="btn btn-primary btn-with-icon" ng-show="(selectedBoss.selected.id) && (selectedOcacion.selected.id) && (dt)">
      <i class="ion-ios-checkmark-outline"></i>Solicitar
    </button>-->
    <div class="row">
        <div class="col-sm-4 col-xs-6">
            <button type="button" ng-click="sendRejectRequest()"class="btn btn-info btn-lg" ng-disabled="formRequest.inputRequestMotivoCancelacion == ''" >Continuar</button>
        </div>
        <div class="col-sm-4 col-xs-6">
            <button type="button" ng-click="cancelRejectRequest()" class="btn btn-warning btn-lg">Cancelar</button>
        </div>
    </div>
    
    </div>
    
</form>