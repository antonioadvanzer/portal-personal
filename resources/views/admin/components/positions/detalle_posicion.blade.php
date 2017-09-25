<form name="editPosition">
    
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
                <div ng-if="!formEditPosition.editPosition">
                    <label class="form-control">@{{formEditPosition.inputPositionName}}</label>
                </div>
                <div ng-if="formEditPosition.editPosition">
                    <input type="text" class="form-control" id="inputPositionName" name="inputPositionName" ng-model="formEditPosition.inputPositionName" placeholder="" required>
                </div>
                
            </div>
            
        </div>
        
        <div class="col-md-6">
            
            <div class="input-group">

                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-addon2">Nivel</span>
                <div ng-if="!formEditPosition.editPosition">
                    <label class="form-control">@{{formEditPosition.inputPositionLevel}}</label>
                </div>
                <div ng-if="formEditPosition.editPosition">
                    <ui-select id="inputPositionLevel" ng-model="pe_selectedLevel.selected"
                       class="btn-group bootstrap-select form-control"
                       ng-disabled="false"
                       append-to-body="true"
                       search-enabled="false">
                      <ui-select-match placeholder="Seleccionar">
                        <span> @{{$select.selected.name}}</span>
                      </ui-select-match>
                      <ui-select-choices repeat="pe_standardLevel in pe_standardSelectLevels | filter: $select.search">
                        <span ng-bind-html="pe_standardLevel.name"></span>
                      </ui-select-choices>
                    </ui-select>
                </div>
                
            </div>
            
        </div>
        
    </div>
    
    <h3 class="with-line">Tracks Relacionados</h3>
    
    <div class="notification row clearfix" ng-if="!formEditPosition.editPosition">
        
        <div class="col-md-12">
            
              <div class="input-group">
                  
                  <div class="checkbox-demo-row">
                    <div class="input-demo checkbox-demo row">
                      <div class="col-md-4" ng-repeat="tl in formEditPosition.pe_tracksList">
                        <label class="checkbox-inline custom-checkbox nowrap">
                          <input type="checkbox" name="@{{tl.name}}" ng-model="formEditPosition.pe_tracksBool[tl.indice]" disabled>
                          <span>@{{tl.name}}</span>
                        </label>
                      </div>
                    </div>
                  </div>
                  
              </div>
            </div>
        
    </div>
    
    <div class="notification row clearfix" ng-if="formEditPosition.editPosition">
        
        <div class="col-md-12">
            
              <div class="input-group">
                  
                  <div class="checkbox-demo-row">
                    <div class="input-demo checkbox-demo row">
                      <div class="col-md-4" ng-repeat="tl in formEditPosition.tracksList">
                        <label class="checkbox-inline custom-checkbox nowrap">
                          <input type="checkbox" id="@{{tl.id}}" name="@{{'tp'+tl.name}}" ng-model="formEditPosition.tracksBool[tl.indice]" ng-disabled="!tl.active">
                          <span>@{{tl.name}}</span>
                        </label>
                      </div>
                    </div>
                  </div>
                  
              </div>
            </div>
        
    </div>
    
    <h3 class="with-line">Permisos</h3>
    
    <div class="notification row clearfix" ng-if="!formEditPosition.editPosition">
        
        <div class="col-md-12">
            
              <div class="input-group">
                  
                  <div class="checkbox-demo-row">
                    <div class="input-demo checkbox-demo row">
                      <div class="col-md-4">
                        <label class="checkbox-inline custom-checkbox nowrap">
                          <input type="checkbox" id="ep_inputPositionPermission1" name="ep_inputPositionPermission1" ng-model="formEditPosition.ep_inputPositionPermission1" disabled>
                          <span>Administraci&oacute;n</span>
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label class="checkbox-inline custom-checkbox nowrap">
                          <input type="checkbox" id="ep_inputPositionPermission2" name="ep_inputPositionPermission2" ng-model="formEditPosition.ep_inputPositionPermission2" disabled>
                          <span>Personal a cargo</span>
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label class="checkbox-inline custom-checkbox nowrap">
                          <input type="checkbox" id="ep_inputPositionPermission3" name="ep_inputPositionPermission3" ng-model="formEditPosition.ep_inputPositionPermission3" disabled>
                          <span>Capturista de Gastos de Viaje</span>
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label class="checkbox-inline custom-checkbox nowrap">
                          <input type="checkbox" id="ep_inputPositionPermission4" name="ep_inputPositionPermission4" ng-model="formEditPosition.ep_inputPositionPermission4" disabled>
                          <span>Capturista de Harvest</span>
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label class="checkbox-inline custom-checkbox nowrap">
                          <input type="checkbox" id="ep_inputPositionPermission5" name="ep_inputPositionPermission5" ng-model="formEditPosition.ep_inputPositionPermission5" disabled>
                          <span>Vacaciones</span>
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label class="checkbox-inline custom-checkbox nowrap">
                          <input type="checkbox" id="ep_inputPositionPermission6" name="ep_inputPositionPermission6" ng-model="formEditPosition.ep_inputPositionPermission6" disabled>
                          <span>Permisos de Ausencia</span>
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label class="checkbox-inline custom-checkbox nowrap">
                          <input type="checkbox" id="ep_inputPositionPermission7" name="ep_inputPositionPermission7" ng-model="formEditPosition.ep_inputPositionPermission7" disabled>
                          <span>Cartas y Constancias</span>
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label class="checkbox-inline custom-checkbox nowrap">
                          <input type="checkbox" id="ep_inputPositionPermission8" name="ep_inputPositionPermission8" ng-model="formEditPosition.ep_inputPositionPermission8" disabled>
                          <span>Requisiciones</span>
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label class="checkbox-inline custom-checkbox nowrap">
                          <input type="checkbox" id="ep_inputPositionPermission9" name="ep_inputPositionPermission9" ng-model="formEditPosition.ep_inputPositionPermission9" disabled>
                          <span>Evaluaciones</span>
                        </label>
                      </div>
                    </div>
                  </div>
                  
              </div>
            </div>
        
    </div>
    
    <div class="notification row clearfix" ng-if="formEditPosition.editPosition">
        
        <div class="col-md-12">
            
              <div class="input-group">
                  
                  <div class="checkbox-demo-row">
                    <div class="input-demo checkbox-demo row">
                      <div class="col-md-4">
                        <label class="checkbox-inline custom-checkbox nowrap">
                          <input type="checkbox" id="inputPositionPermission1" name="inputPositionPermission1" ng-model="formEditPosition.inputPositionPermission1">
                          <span>Administraci&oacute;n</span>
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label class="checkbox-inline custom-checkbox nowrap">
                          <input type="checkbox" id="inputPositionPermission2" name="inputPositionPermission2" ng-model="formEditPosition.inputPositionPermission2">
                          <span>Personal a cargo</span>
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label class="checkbox-inline custom-checkbox nowrap">
                          <input type="checkbox" id="inputPositionPermission3" name="inputPositionPermission3" ng-model="formEditPosition.inputPositionPermission3">
                          <span>Capturista de Gastos de Viaje</span>
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label class="checkbox-inline custom-checkbox nowrap">
                          <input type="checkbox" id="inputPositionPermission4" name="inputPositionPermission4" ng-model="formEditPosition.inputPositionPermission4">
                          <span>Capturista de Harvest</span>
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label class="checkbox-inline custom-checkbox nowrap">
                          <input type="checkbox" id="inputPositionPermission5" name="inputPositionPermission5" ng-model="formEditPosition.inputPositionPermission5">
                          <span>Vacaciones</span>
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label class="checkbox-inline custom-checkbox nowrap">
                          <input type="checkbox" id="inputPositionPermission6" name="inputPositionPermission6" ng-model="formEditPosition.inputPositionPermission6">
                          <span>Permisos de Ausencia</span>
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label class="checkbox-inline custom-checkbox nowrap">
                          <input type="checkbox" id="inputPositionPermission7" name="inputPositionPermission7" ng-model="formEditPosition.inputPositionPermission7">
                          <span>Cartas y Constancias</span>
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label class="checkbox-inline custom-checkbox nowrap">
                          <input type="checkbox" id="inputPositionPermission8" name="inputPositionPermission8" ng-model="formEditPosition.inputPositionPermission8">
                          <span>Requisiciones</span>
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label class="checkbox-inline custom-checkbox nowrap">
                          <input type="checkbox" id="inputPositionPermission9" name="inputPositionPermission9" ng-model="formEditPosition.inputPositionPermission9">
                          <span>Evaluaciones</span>
                        </label>
                      </div>
                    </div>
                  </div>
                  
              </div>
            </div>
        
    </div>
    
    <div ng-if="formEditPosition.eliminable && formEditPosition.editPosition" class="row">
        <div class="col-md-6">
            <div class="alert bg-warning">
                  Para eliminar esta <strong>Posici&oacute;n</strong>, primero cambie los <strong>Empleados</strong> a otras <strong>Posiciones</strong>
            </div>
        </div>
    </div>
    
    <div ng-if="formEditPosition.total_reg && formEditPosition.editPosition" class="row">
        <div class="col-md-6">
            <div class="alert bg-warning">
                  Para desactivar un <strong>Track</strong>, debera actualizar los <strong>Empleados</strong> con estos parametros
            </div>
        </div>
    </div>
    
    <div class="row">
        
        <div ng-if="formEditPosition.editPosition">
            
            <div class="col-sm-6 col-xs-8">
                
                <button type="submit" class="btn btn-primary btn-with-icon" ng-click="formEditPosition.updatePosition()">
                    <i class="ion-edit"></i>Guardar cambios
                </button>
                
                <button ng-if="!formEditPosition.eliminable" type="button" class="btn btn-danger btn-with-icon" ng-click="formEditPosition.delete()">
                  <i class="ion-ios-trash"></i>Eliminar
                </button>
                
                <button type="button" class="btn btn-warning btn-with-icon" ng-click="formEditPosition.cancelEdit()">
                  <i class="ion-android-cancel"></i>Cancelar
                </button>
            </div>
        </div>
        
        <div ng-if="!formEditPosition.editPosition">
            <div class="col-sm-4 col-xs-6">
                <button type="button" class="btn btn-info btn-with-icon " ng-click="goBack()">
                  <i class="ion-arrow-return-left"></i>Regresar
                </button>
                <button type="submit" class="btn btn-primary btn-with-icon" ng-click="formEditPosition.enableEdit()">
                    <i class="ion-android-options"></i>Editar
                </button>
            </div>
        </div>
        
    </div>
  
    </div>
        
</form>