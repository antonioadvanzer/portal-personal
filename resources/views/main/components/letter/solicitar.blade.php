<form name="newLetter" ng-submit="save()">
    
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

                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-addon1">Nombre Completo</span>
                <input type="text" class="form-control" id="inputRequestLetterFullName" name="inputRequestLetterFullName" placeholder="" value="@{{ user.full_name }}" readonly>
                
            </div>
            
        </div>
        
        <div class="col-md-6">
            
            <div class="input-group">

                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-addon1">A Qui&eacute;n va Dirigida la Carta</span>
                <input type="text" class="form-control" id="inputRequestLetterDirigidoA" name="inputRequestLetterDirigidoA" ng-model="formRequestLetter.inputRequestLetterDirigidoA" placeholder="" required>

            </div>
            
        </div>
        
    </div>
    
    <h3 class="with-line"><label>Selecciona los datos que deberá contener:</label></h3>
    
    <div class="row">
        
        <div class="col-md-12">
            
              <div class="input-group">
                  
                  <div class="checkbox-demo-row">
                    <div class="input-demo checkbox-demo row">
                      <div class="col-md-4">
                        <label class="checkbox-inline custom-checkbox nowrap">
                          <input type="checkbox" id="inputRequestLetterSueldo" name="inputRequestLetterSueldo" ng-model="formRequestLetter.inputRequestLetterSueldo">
                          <span>Sueldo</span>
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label class="checkbox-inline custom-checkbox nowrap">
                          <input type="checkbox" id="inputRequestLetterIMSS" name="inputRequestLetterIMSS" ng-model="formRequestLetter.inputRequestLetterIMSS">
                          <span>IMSS</span>
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label class="checkbox-inline custom-checkbox nowrap">
                          <input type="checkbox" id="inputRequestLetterRFC" name="inputRequestLetterRFC" ng-model="formRequestLetter.inputRequestLetterRFC">
                          <span>RFC</span>
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label class="checkbox-inline custom-checkbox nowrap">
                          <input type="checkbox" id="inputRequestLetterCURP" name="inputRequestLetterCURP" ng-model="formRequestLetter.inputRequestLetterCURP">
                          <span>CURP</span>
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label class="checkbox-inline custom-checkbox nowrap">
                          <input type="checkbox" id="inputRequestLetterAntiguedad" name="inputRequestLetterAntiguedad" ng-model="formRequestLetter.inputRequestLetterAntiguedad">
                          <span>Antigüedad</span>
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label class="checkbox-inline custom-checkbox nowrap">
                          <input type="checkbox" id="inputRequestLetterPuesto" name="inputRequestLetterPuesto" ng-model="formRequestLetter.inputRequestLetterPuesto">
                          <span>Puesto</span>
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label class="checkbox-inline custom-checkbox nowrap">
                          <input type="checkbox" id="inputRequestLetterDomicilio" name="inputRequestLetterDomicilio" ng-model="formRequestLetter.inputRequestLetterDomicilio">
                          <span>Domicilio Particular</span>
                        </label>
                      </div>
                    </div>
                  </div>
                  
              </div>
            </div>
    </div>
    
    <div class="row">
        <div class="col-md-12">
            <div class="input-group">
                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-addon1">Observaciones o Datos Adicionales</span>
                <textarea placeholder="" class="form-control" id="inputRequestLetterObervaciones" name="inputRequestLetterObervaciones" ng-model="formRequestLetter.inputRequestLetterObervaciones"></textarea>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-sm-4 col-xs-6">
            <button type="submit" class="btn btn-primary btn-with-icon">
                <i class="ion-ios-checkmark-outline"></i>Solicitar
            </button>
            <button type="button" class="btn btn-danger btn-with-icon" ng-click="goBack()">
                <i class="ion-android-cancel"></i>Cancelar
            </button>
        </div>
    </div>
  
    </div>
        
</form>