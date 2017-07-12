<form name="newLetter" ng-submit="save()">
    
    <div class="progress ng-scope" ng-show="sending">
      <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="40" style="width: 100%">
        <span class="sr-only">100% Complete (success)</span>
      </div>
    </div>
    
    <div class="row">
        
        <div class="col-md-6">
            
            <div class="input-group">

                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-addon1">Nombre Completo</span>
                <input type="text" class="form-control" id="inputRequestLetterFullName" name="inputRequestLetterFullName" placeholder="" value="@{{ user.full_name }}" readonly>
                
            </div>
            
        </div>
        
        <div class="col-md-6">
            
            <div class="input-group">

                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-addon1">A Quien va Dirigida la Carta</span>
                <input type="text" class="form-control" id="inputRequestLetterDirigidoA" name="inputLetterDetailDirigidoA" ng-model="formLetterDetail.inputLetterDetailDirigidoA" placeholder="" readonly>

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
                          <input type="checkbox" id="inputLetterDetailSueldo" name="inputLetterDetailSueldo" ng-model="formLetterDetail.inputLetterDetailSueldo" disabled>
                          <span>Sueldo</span>
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label class="checkbox-inline custom-checkbox nowrap">
                          <input type="checkbox" id="inputLetterDetailIMSS" name="inputLetterDetailIMSS" ng-model="formLetterDetail.inputLetterDetailIMSS" disabled>
                          <span>IMSS</span>
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label class="checkbox-inline custom-checkbox nowrap">
                          <input type="checkbox" id="inputLetterDetailRFC" name="inputLetterDetailRFC" ng-model="formLetterDetail.inputLetterDetailRFC" disabled>
                          <span>RFC</span>
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label class="checkbox-inline custom-checkbox nowrap">
                          <input type="checkbox" id="inputLetterDetailCURP" name="inputLetterDetailCURP" ng-model="formLetterDetail.inputLetterDetailCURP" disabled>
                          <span>CURP</span>
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label class="checkbox-inline custom-checkbox nowrap">
                          <input type="checkbox" id="inputLetterDetailAntiguedad" name="inputLetterDetailAntiguedad" ng-model="formLetterDetail.inputLetterDetailAntiguedad" disabled>
                          <span>Antigüedad</span>
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label class="checkbox-inline custom-checkbox nowrap">
                          <input type="checkbox" id="inputLetterDetailPuesto" name="inputLetterDetailPuesto" ng-model="formLetterDetail.inputLetterDetailPuesto" disabled>
                          <span>Puesto</span>
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label class="checkbox-inline custom-checkbox nowrap">
                          <input type="checkbox" id="inputLetterDetailDomicilio" name="inputLetterDetailDomicilio" ng-model="formLetterDetail.inputLetterDetailDomicilio" disabled>
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
                <textarea placeholder="" class="form-control" id="inputLetterDetailObservaciones" name="inputLetterDetailObservaciones" ng-model="formLetterDetail.inputLetterDetailObservaciones" readonly></textarea>
            </div>
        </div>
    </div>
    
</form>