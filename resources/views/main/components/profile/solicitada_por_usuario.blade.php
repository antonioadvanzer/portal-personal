<form name="showSolicitud">
    
    <div class="progress ng-scope" ng-show="sending">
      <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="40" style="width: 100%">
        <span class="sr-only">100% Complete (success)</span>
      </div>
    </div>
    
    <div class="row">
        <div class="col-sm-4 col-xs-6">
            <button type="button" ng-click="returnRequestByUser()" class="btn btn-info btn-lg">Regresar</button>
        </div>
    </div>
    <h3 class="with-line"></h3>
    
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
                <!--<textarea placeholder="" class="form-control" id="inputRequestObservationes" name="inputRequestObservationes" ng-model="formRequest.inputRequestObservationes" readonly></textarea>-->
                <p class="form-control">@{{formRequest.inputRequestObservationes}}</p>
            </div>
            
        </div>
    </div>
    
    <div class="row" ng-if="formRequest.labelRequestStatus == 4">
        <div class="col-md-12">
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-observaciones">Motivo Cancelaci&oacute;n </span>
                <!--<textarea placeholder="" class="form-control" id="inputRequestMotivoCancelacion" name="inputRequestMotivoCancelacion" ng-model="formRequest.inputRequestMotivoCancelacion" readonly></textarea>-->
                <p class="form-control">@{{formRequest.inputRequestMotivoCancelacion}}</p>
            </div>
            
        </div>
    </div>
    
    <h3 class="with-line">Autorizadores</h3>
    
    <div class="row">
        <div class="col-md-6">
            <div class="input-group" align="center">
                <h5 class="button-title">Jefe Directo/Jefe de Proyecto</h5><br>
                <div ng-show="formRequest.inputRequestAuthBoss == 1" class="alert bg-success col-md-4" align="center"><!--<i class="ion-android-checkmark-circle"></i>--><h3>Autorizado</h3></div>
                <div ng-show="formRequest.inputRequestAuthBoss == 0" class="alert bg-info col-md-4" align="center"><!--<i class="ion-help"></i>--><h3>En Espera</h3></div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="input-group" align="center">
                <h5 class="button-title">Capital Humano</h5><br>
                <div ng-show="formRequest.inputRequestAuthCh == 1" class="alert bg-success col-md-4" align="center"><!--<i class="ion-android-checkmark-circle"></i>--><h3>Autorizado</h3></div>
                <div ng-show="formRequest.inputRequestAuthCh == 0" class="alert bg-info col-md-4" align="center"><!--<i class="ion-help"></i>--><h3>En Espera</h3></div>
            </div>
        </div>
    </div>
    
    
</form>