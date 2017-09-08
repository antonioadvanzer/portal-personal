<form name="showVacationsSend">
    
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
                <!--<input type="text" class="form-control with-primary-addon" id="inputOwnRequestAutorizador" name="inputOwnRequestAutorizador"  placeholder="" ng-model="formOwnRequest.inputOwnRequestAutorizador" readonly>-->
                <label class="form-control with-primary-addon">@{{formOwnRequest.inputOwnRequestAutorizador}}</label>
            </div>
            
            <div class="input-group" >
                <span class="input-group-addon input-group-addon-primary addon-left" id="label-dias">Días</span>
                <!--<input type="text" class="form-control with-primary-addon" id="inputOwnRequestDias" name="inputOwnRequestDias" placeholder="" ng-model="formOwnRequest.inputOwnRequestDias" readonly>-->
                <label class="form-control with-primary-addon">@{{formOwnRequest.inputOwnRequestDias}}</label>
            </div>
            
            <div class="input-group" >
                <span class="input-group-addon input-group-addon-primary addon-left" id="label-estado">Estado</span>
                <!--<input type="text" class="form-control with-primary-addon" id="inputOwnRequestEstado" name="inputOwnRequestEstado" placeholder="" ng-model="formOwnRequest.inputOwnRequestEstado" readonly>-->
                <label class="form-control with-primary-addon">@{{formOwnRequest.inputOwnRequestEstado}}</label>
            </div>
            
        </div>
        
        <div class="col-md-6">
        
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="label-desde">Desde</span>
                <!--<input type="text" class="form-control with-primary-addon" id="inputOwnRequestDesde" name="inputOwnRequestDesde" placeholder="" ng-model="formOwnRequest.inputOwnRequestDesde" readonly>-->
                <label class="form-control with-primary-addon">@{{formOwnRequest.inputOwnRequestDesde}}</label>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="label-hasta">Hasta</span>
                <!--<input type="text" class="form-control with-primary-addon" id="inputOwnRequestHasta" name="inputOwnRequestHasta"  placeholder="" ng-model="formOwnRequest.inputOwnRequestHasta" readonly>-->
                <label class="form-control with-primary-addon">@{{formOwnRequest.inputOwnRequestHasta}}</label>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-regresa">Regresa</span>
                <!--<input type="text" class="form-control with-primary-addon" id="inputOwnRequestRegresa" name="inputOwnRequestRegresa"  placeholder="" ng-model="formOwnRequest.inputOwnRequestRegresa" readonly>-->
                <label class="form-control with-primary-addon">@{{formOwnRequest.inputOwnRequestRegresa}}</label>
            </div>
            
        </div>
        
        

    </div>
    
    <div class="row">
        <div class="col-md-12">
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-observaciones">Observaciones</span>
                <!--<textarea placeholder="" class="form-control" id="inputOwnRequestObservaciones" name="inputOwnRequestObservaciones" ng-model="formOwnRequest.inputOwnRequestObservaciones" readonly>@{{formOwnRequest.inputOwnRequestObservaciones}}</textarea>-->
                <p class="form-control">@{{formOwnRequest.inputOwnRequestObservaciones}}</p>
            </div>
            
        </div>
    </div>
    
    <div class="row" ng-show="formOwnRequest.inputOwnRequestStatus == 4">
        <div class="col-md-12">
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-observaciones">Motivo Cancelaci&oacute;n </span>
                <!--<textarea placeholder="" class="form-control" id="inputOwnRequestMotivoCancelacion" name="inputOwnRequestMotivoCancelacion" ng-model="formOwnRequest.inputOwnRequestMotivoCancelacion" readonly></textarea>-->
                <p class="form-control">@{{formOwnRequest.inputOwnRequestMotivoCancelacion}}</p>
            </div>
            
        </div>
    </div>
    
    <h3 class="with-line">Autorizadores</h3>
    
    <div class="row">
        <div class="col-md-6">
            <div class="input-group">
                <h5 class="button-title">Jefe Directo/Jefe de Proyecto</h5><br>
                <div type="button" ng-show="formOwnRequest.inputOwnRequestAuthBoss == 1" class="btn btn-success btn-icon"><i class="ion-android-checkmark-circle"></i></div>
                <div type="button" ng-show="formOwnRequest.inputOwnRequestAuthBoss == 0" class="btn btn-info btn-icon"><i class="ion-help"></i></div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="input-group">
                <h5 class="button-title">Capital Humano</h5><br>
                <div type="button" ng-show="formOwnRequest.inputOwnRequestAuthCh == 1" class="btn btn-success btn-icon"><i class="ion-android-checkmark-circle"></i></div>
                <div type="button" ng-show="formOwnRequest.inputOwnRequestAuthCh == 0" class="btn btn-info btn-icon"><i class="ion-help"></i></div>
            </div>
        </div>
    </div>
    
</form>