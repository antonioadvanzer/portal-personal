<form name="showCarta">
    
    <div class="progress ng-scope" ng-show="sending">
      <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="40" style="width: 100%">
        <span class="sr-only">100% Complete (success)</span>
      </div>
    </div>
    
    <div class="row">
        <div class="col-sm-4 col-xs-6">
            <button type="button" ng-click="returnLetterByUser()" class="btn btn-info btn-lg">Regresar</button>
        </div>
    </div>
    <h3 class="with-line"></h3>
    
    <div class="row">
        
        <div class="col-md-6">
            
            <div class="input-group">

                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-addon1">Nombre Completo</span>
                <input type="text" class="form-control" id="inputLetterColaborador" name="inputLetterColaborador" ng-model="formLetter.inputLetterColaborador"placeholder="" readonly>
                
            </div>
            
        </div>
        
        <div class="col-md-6">
            
            <div class="input-group">

                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-addon1">A Quien va Dirigida la Carta</span>
                <input type="text" class="form-control" id="inputLetterDirigidoA" name="inputLetterDirigidoA" ng-model="formLetter.inputLetterDirigidoA" placeholder="" readonly>

            </div>
            
        </div>
        
    </div>
    
    <h3 class="with-line"><label>Selecciona los datos deberá contener:</label></h3>
    
    <div class="row">
        
        <div class="col-md-12">
            
              <div class="input-group">
                  
                  <div class="checkbox-demo-row">
                    <div class="input-demo checkbox-demo row">
                      <div class="col-md-4">
                        <label class="checkbox-inline custom-checkbox nowrap">
                          <input type="checkbox" id="inputLetterSueldo" name="inputLetterSueldo" ng-model="formLetter.inputLetterSueldo" disabled>
                          <span>Sueldo</span>
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label class="checkbox-inline custom-checkbox nowrap">
                          <input type="checkbox" id="inputLetterIMSS" name="inputLetterIMSS" ng-model="formLetter.inputLetterIMSS" disabled>
                          <span>IMSS</span>
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label class="checkbox-inline custom-checkbox nowrap">
                          <input type="checkbox" id="inputLetterRFC" name="inputLetterRFC" ng-model="formLetter.inputLetterRFC" disabled>
                          <span>RFC</span>
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label class="checkbox-inline custom-checkbox nowrap">
                          <input type="checkbox" id="inputLetterCURP" name="inputLetterCURP" ng-model="formLetter.inputLetterCURP" disabled>
                          <span>CURP</span>
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label class="checkbox-inline custom-checkbox nowrap">
                          <input type="checkbox" id="inputLetterAntiguedad" name="inputLetterAntiguedad" ng-model="formLetter.inputLetterAntiguedad" disabled>
                          <span>Antigüedad</span>
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label class="checkbox-inline custom-checkbox nowrap">
                          <input type="checkbox" id="inputLetterPuesto" name="inputLetterPuesto" ng-model="formLetter.inputLetterPuesto" disabled>
                          <span>Puesto</span>
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label class="checkbox-inline custom-checkbox nowrap">
                          <input type="checkbox" id="inputLetterDomicilio" name="inputLetterDomicilio" ng-model="formLetter.inputLetterDomicilio" disabled>
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
                <textarea placeholder="" class="form-control" id="inputLetterObservaciones" name="inputLetterObservaciones" ng-model="formLetter.inputLetterObservaciones" readonly></textarea>
            </div>
        </div>
    </div>
    
</form>