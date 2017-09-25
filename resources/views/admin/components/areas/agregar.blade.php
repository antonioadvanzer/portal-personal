<form name="newArea" ng-submit="save()">
    
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

                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-addon1">Nombre</span>
                <input type="text" class="form-control" id="inputAreaName" name="inputAreaName" ng-model="area.inputAreaName" placeholder="" required>
                
            </div>
            
        </div>
        
        <div class="col-md-6">
            
            <div class="input-group">

                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-addon2">Direcci&oacute;n</span>
                <ui-select id="inputAreaDirection" ng-model="selectedDirection.selected"
                   class="btn-group bootstrap-select form-control"
                   ng-disabled="false"
                   append-to-body="true"
                   search-enabled="false">
                  <ui-select-match placeholder="Seleccionar">
                    <span> @{{$select.selected.name}}</span>
                  </ui-select-match>
                  <ui-select-choices repeat="standardDirection in standardSelectDirection | filter: $select.search">
                    <span ng-bind-html="standardDirection.name"></span>
                  </ui-select-choices>
                </ui-select>
                
            </div>
            
        </div>
        
    </div>
    
    <h3 class="with-line">Permisos</h3>
    
    <div class="notification row clearfix">
        
        <div class="col-md-12">
            
              <div class="input-group">
                  
                  <div class="checkbox-demo-row">
                    <div class="input-demo checkbox-demo row">
                      <div class="col-md-4">
                        <label class="checkbox-inline custom-checkbox nowrap">
                          <input type="checkbox" id="inputAreaPermission1" name="inputAreaPermission1" ng-model="area.inputAreaPermission1">
                          <span>Administraci&oacute;n</span>
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label class="checkbox-inline custom-checkbox nowrap">
                          <input type="checkbox" id="inputAreaPermission2" name="inputAreaPermission2" ng-model="area.inputAreaPermission2">
                          <span>Personal a cargo</span>
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label class="checkbox-inline custom-checkbox nowrap">
                          <input type="checkbox" id="inputAreaPermission3" name="inputAreaPermission3" ng-model="area.inputAreaPermission3">
                          <span>Capturista de Gastos de Viaje</span>
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label class="checkbox-inline custom-checkbox nowrap">
                          <input type="checkbox" id="inputAreaPermission4" name="inputAreaPermission4" ng-model="area.inputAreaPermission4">
                          <span>Capturista de Harvest</span>
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label class="checkbox-inline custom-checkbox nowrap">
                          <input type="checkbox" id="inputAreaPermission5" name="inputAreaPermission5" ng-model="area.inputAreaPermission5">
                          <span>Vacaciones</span>
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label class="checkbox-inline custom-checkbox nowrap">
                          <input type="checkbox" id="inputAreaPermission6" name="inputAreaPermission6" ng-model="area.inputAreaPermission6">
                          <span>Permisos de Ausencia</span>
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label class="checkbox-inline custom-checkbox nowrap">
                          <input type="checkbox" id="inputAreaPermission7" name="inputAreaPermission7" ng-model="area.inputAreaPermission7">
                          <span>Cartas y Constancias</span>
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label class="checkbox-inline custom-checkbox nowrap">
                          <input type="checkbox" id="inputAreaPermission8" name="inputAreaPermission8" ng-model="area.inputAreaPermission8">
                          <span>Requisiciones</span>
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label class="checkbox-inline custom-checkbox nowrap">
                          <input type="checkbox" id="inputAreaPermission9" name="inputAreaPermission9" ng-model="area.inputAreaPermission9">
                          <span>Evaluaciones</span>
                        </label>
                      </div>
                    </div>
                  </div>
                  
              </div>
            </div>
        
    </div>
    
    <div class="row">
        <div class="col-sm-4 col-xs-6">
            <button type="submit" class="btn btn-primary btn-with-icon" ng-disabled="(!selectedDirection.selected)">
                <i class="ion-plus-circled"></i>Agregar
            </button>
            <button type="button" class="btn btn-danger btn-with-icon" ng-click="cancelAdd()">
                <i class="ion-android-cancel"></i>Cancelar
            </button>
        </div>
    </div>
        
    </div>
  
</form>