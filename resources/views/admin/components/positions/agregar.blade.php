<form name="newPosition" ng-submit="save()">
    
    <div class="progress ng-scope" ng-show="sending">
      <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="40" style="width: 100%">
        <span class="sr-only">100% Complete (success)</span>
      </div>
    </div>
    
    <div class="row">
        
        <div class="col-md-6">
            
            <div class="input-group">

                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-addon1">Nombre</span>
                <input type="text" class="form-control" id="inputPositionName" name="inputPositionName" ng-model="position.inputPositionName" placeholder="" required>
                
            </div>
            
        </div>
        
        <div class="col-md-6">
            
            <div class="input-group">

                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-addon2">Nivel</span>
                <ui-select id="inputAreaDirection" ng-model="selectedLevel.selected"
                   class="btn-group bootstrap-select form-control"
                   ng-disabled="false"
                   append-to-body="true"
                   search-enabled="false">
                  <ui-select-match placeholder="Seleccionar">
                    <span> @{{$select.selected.name}}</span>
                  </ui-select-match>
                  <ui-select-choices repeat="standardNivel in standardSelectLevel | filter: $select.search">
                    <span ng-bind-html="standardNivel.name"></span>
                  </ui-select-choices>
                </ui-select>
                
            </div>
            
        </div>
        
    </div>
    
    <h3 class="with-line">Tracks</h3>
    
    <div class="notification row clearfix">
        
        <div class="col-md-12">
            
              <div class="input-group">
                  
                  <div class="checkbox-demo-row">
                    <div class="input-demo checkbox-demo row">
                      <div class="col-md-4" ng-repeat="tl in position.tracksList">
                        <label class="checkbox-inline custom-checkbox nowrap">
                          <input type="checkbox" name="@{{tl.name}}" ng-model="position.tracksBool[tl.indice]">
                          <span>@{{tl.name}}</span>
                        </label>
                      </div>
                    </div>
                  </div>
                  
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
                          <input type="checkbox" id="inputPositionPermission1" name="inputPositionPermission1" ng-model="position.inputPositionPermission1">
                          <span>Administraci&oacute;n</span>
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label class="checkbox-inline custom-checkbox nowrap">
                          <input type="checkbox" id="inputPositionPermission2" name="inputPositionPermission2" ng-model="position.inputPositionPermission2">
                          <span>Personal a cargo</span>
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label class="checkbox-inline custom-checkbox nowrap">
                          <input type="checkbox" id="inputPositionPermission3" name="inputPositionPermission3" ng-model="position.inputPositionPermission3">
                          <span>Capturista de Gastos de Viaje</span>
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label class="checkbox-inline custom-checkbox nowrap">
                          <input type="checkbox" id="inputPositionPermission4" name="inputPositionPermission4" ng-model="position.inputPositionPermission4">
                          <span>Capturista de Harvest</span>
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label class="checkbox-inline custom-checkbox nowrap">
                          <input type="checkbox" id="inputPositionPermission5" name="inputPositionPermission5" ng-model="position.inputPositionPermission5">
                          <span>Vacaciones</span>
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label class="checkbox-inline custom-checkbox nowrap">
                          <input type="checkbox" id="inputPositionPermission6" name="inputPositionPermission6" ng-model="position.inputPositionPermission6">
                          <span>Permisos de Ausencia</span>
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label class="checkbox-inline custom-checkbox nowrap">
                          <input type="checkbox" id="inputPositionPermission7" name="inputPositionPermission7" ng-model="position.inputPositionPermission7">
                          <span>Cartas y Constancias</span>
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label class="checkbox-inline custom-checkbox nowrap">
                          <input type="checkbox" id="inputPositionPermission8" name="inputPositionPermission8" ng-model="position.inputPositionPermission8">
                          <span>Requisiciones</span>
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label class="checkbox-inline custom-checkbox nowrap">
                          <input type="checkbox" id="inputAreaPermission9" name="inputAreaPermission9" ng-model="position.inputPositionPermission9">
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
            <button type="submit" class="btn btn-primary btn-with-icon" ng-disabled="(!selectedLevel.selected)">
                <i class="ion-plus-circled"></i>Agregar
            </button>
        </div>
    </div>
  
</form>