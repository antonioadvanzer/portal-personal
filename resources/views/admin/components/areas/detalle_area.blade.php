<form name="editArea">
    
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
                <div ng-if="!formEditArea.editArea">
                    <label class="form-control">@{{formEditArea.inputAreaName}}</label>
                </div>
                <div ng-if="formEditArea.editArea">
                    <input type="text" class="form-control" id="inputAreaName" name="inputAreaName" ng-model="formEditArea.inputAreaName" placeholder="" required>
                </div>
                
            </div>
            
        </div>
        
        <div class="col-md-6">
            
            <div class="input-group">

                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-addon2">Direcci&oacute;n</span>
                <div ng-if="!formEditArea.editArea">
                    <label class="form-control">@{{formEditArea.inputAreaDirection}}</label>
                </div>
                <div ng-if="formEditArea.editArea">
                    <ui-select id="inputAreaDirection" ng-model="ae_selectedDirection.selected"
                       class="btn-group bootstrap-select form-control"
                       ng-disabled="false"
                       append-to-body="true"
                       search-enabled="false">
                      <ui-select-match placeholder="Seleccionar">
                        <span> @{{$select.selected.name}}</span>
                      </ui-select-match>
                      <ui-select-choices repeat="ae_standardDirection in ae_standardSelectDirections | filter: $select.search">
                        <span ng-bind-html="ae_standardDirection.name"></span>
                      </ui-select-choices>
                    </ui-select>
                </div>
                
            </div>
            
        </div>
        
    </div>
    
    <h3 class="with-line">Permisos</h3>
    
    <div class="notification row clearfix" ng-if="!formEditArea.editArea">
        
        <div class="col-md-12">
            
              <div class="input-group">
                  
                  <div class="checkbox-demo-row">
                    <div class="input-demo checkbox-demo row">
                      <div class="col-md-4">
                        <label class="checkbox-inline custom-checkbox nowrap">
                          <input type="checkbox" id="ea_inputAreaPermission1" name="ea_inputAreaPermission1" ng-model="formEditArea.ea_inputAreaPermission1" disabled>
                          <span>Administraci&oacute;n</span>
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label class="checkbox-inline custom-checkbox nowrap">
                          <input type="checkbox" id="ea_inputAreaPermission2" name="ea_inputAreaPermission2" ng-model="formEditArea.ea_inputAreaPermission2" disabled>
                          <span>Personal a cargo</span>
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label class="checkbox-inline custom-checkbox nowrap">
                          <input type="checkbox" id="ea_inputAreaPermission3" name="ea_inputAreaPermission3" ng-model="formEditArea.ea_inputAreaPermission3" disabled>
                          <span>Capturista de Gastos de Viaje</span>
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label class="checkbox-inline custom-checkbox nowrap">
                          <input type="checkbox" id="ea_inputAreaPermission4" name="ea_inputAreaPermission4" ng-model="formEditArea.ea_inputAreaPermission4" disabled>
                          <span>Capturista de Harvest</span>
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label class="checkbox-inline custom-checkbox nowrap">
                          <input type="checkbox" id="ea_inputAreaPermission5" name="ea_inputAreaPermission5" ng-model="formEditArea.ea_inputAreaPermission5" disabled>
                          <span>Vacaciones</span>
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label class="checkbox-inline custom-checkbox nowrap">
                          <input type="checkbox" id="ea_inputAreaPermission6" name="ea_inputAreaPermission6" ng-model="formEditArea.ea_inputAreaPermission6" disabled>
                          <span>Permisos de Ausencia</span>
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label class="checkbox-inline custom-checkbox nowrap">
                          <input type="checkbox" id="ea_inputAreaPermission7" name="ea_inputAreaPermission7" ng-model="formEditArea.ea_inputAreaPermission7" disabled>
                          <span>Cartas y Constancias</span>
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label class="checkbox-inline custom-checkbox nowrap">
                          <input type="checkbox" id="ea_inputAreaPermission8" name="ea_inputAreaPermission8" ng-model="formEditArea.ea_inputAreaPermission8" disabled>
                          <span>Requisiciones</span>
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label class="checkbox-inline custom-checkbox nowrap">
                          <input type="checkbox" id="ea_inputAreaPermission9" name="ea_inputAreaPermission9" ng-model="formEditArea.ea_inputAreaPermission9" disabled>
                          <span>Evaluaciones</span>
                        </label>
                      </div>
                    </div>
                  </div>
                  
              </div>
            </div>
        
    </div>
    
    <div class="notification row clearfix" ng-if="formEditArea.editArea">
        
        <div class="col-md-12">
            
              <div class="input-group">
                  
                  <div class="checkbox-demo-row">
                    <div class="input-demo checkbox-demo row">
                      <div class="col-md-4">
                        <label class="checkbox-inline custom-checkbox nowrap">
                          <input type="checkbox" id="inputAreaPermission1" name="inputAreaPermission1" ng-model="formEditArea.inputAreaPermission1">
                          <span>Administraci&oacute;n</span>
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label class="checkbox-inline custom-checkbox nowrap">
                          <input type="checkbox" id="inputAreaPermission2" name="inputAreaPermission2" ng-model="formEditArea.inputAreaPermission2">
                          <span>Personal a cargo</span>
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label class="checkbox-inline custom-checkbox nowrap">
                          <input type="checkbox" id="inputAreaPermission3" name="inputAreaPermission3" ng-model="formEditArea.inputAreaPermission3">
                          <span>Capturista de Gastos de Viaje</span>
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label class="checkbox-inline custom-checkbox nowrap">
                          <input type="checkbox" id="inputAreaPermission4" name="inputAreaPermission4" ng-model="formEditArea.inputAreaPermission4">
                          <span>Capturista de Harvest</span>
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label class="checkbox-inline custom-checkbox nowrap">
                          <input type="checkbox" id="inputAreaPermission5" name="inputAreaPermission5" ng-model="formEditArea.inputAreaPermission5">
                          <span>Vacaciones</span>
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label class="checkbox-inline custom-checkbox nowrap">
                          <input type="checkbox" id="inputAreaPermission6" name="inputAreaPermission6" ng-model="formEditArea.inputAreaPermission6">
                          <span>Permisos de Ausencia</span>
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label class="checkbox-inline custom-checkbox nowrap">
                          <input type="checkbox" id="inputAreaPermission7" name="inputAreaPermission7" ng-model="formEditArea.inputAreaPermission7">
                          <span>Cartas y Constancias</span>
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label class="checkbox-inline custom-checkbox nowrap">
                          <input type="checkbox" id="inputAreaPermission8" name="inputAreaPermission8" ng-model="formEditArea.inputAreaPermission8">
                          <span>Requisiciones</span>
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label class="checkbox-inline custom-checkbox nowrap">
                          <input type="checkbox" id="inputAreaPermission9" name="inputAreaPermission9" ng-model="formEditArea.inputAreaPermission9">
                          <span>Evaluaciones</span>
                        </label>
                      </div>
                    </div>
                  </div>
                  
              </div>
            </div>
        
    </div>
    
    <div ng-if="formEditArea.eliminable && formEditArea.editArea" class="row">
        <div class="col-md-6">
            <div class="alert bg-warning">
                  Para eliminar esta <strong>Area</strong>, primero cambie los <strong>Empleados</strong> a otras <strong>Areas</strong>
            </div>
        </div>
    </div>
    
    <div class="row">
        
        <div ng-if="formEditArea.editArea">
            
            <div class="col-sm-6 col-xs-8">
                
                <button type="submit" class="btn btn-primary btn-with-icon" ng-click="formEditArea.updateArea()">
                    <i class="ion-edit"></i>Guardar cambios
                </button>
                
                <button ng-if="!formEditArea.eliminable" type="button" class="btn btn-danger btn-with-icon" ng-click="formEditArea.delete()">
                  <i class="ion-ios-trash"></i>Eliminar
                </button>
                
                <button type="button" class="btn btn-warning btn-with-icon" ng-click="formEditArea.cancelEdit()">
                  <i class="ion-android-cancel"></i>Cancelar
                </button>
            </div>
        </div>
        
        <div ng-if="!formEditArea.editArea">
            <div class="col-sm-4 col-xs-6">
                <button type="button" class="btn btn-info btn-with-icon " ng-click="goBack()">
                  <i class="ion-arrow-return-left"></i>Regresar
                </button>
                <button type="submit" class="btn btn-primary btn-with-icon" ng-click="formEditArea.enableEdit()">
                    <i class="ion-android-options"></i>Editar
                </button>
            </div>
        </div>
        
    </div>
  
    </div>
        
</form>