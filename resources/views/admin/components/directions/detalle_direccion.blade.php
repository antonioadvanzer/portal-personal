<form name="editDirection">
    
    <div class="progress ng-scope" ng-show="sending">
      <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="40" style="width: 100%">
        <span class="sr-only">100% Complete (success)</span>
      </div>
    </div>
    
    <div class="row">
        
        <div class="col-md-6">
            
            <div class="input-group">

                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-addon1">Nombre</span>
                <div ng-if="!formEditDirection.editDirection">
                    <label class="form-control">@{{formEditDirection.inputDirectionName}}</label>
                </div>
                <div ng-if="formEditDirection.editDirection">
                    <input type="text" class="form-control" id="inputDirectionName" name="inputDirectionName" ng-model="formEditDirection.inputDirectionName" placeholder="" required>
                </div>
                
            </div>
            
        </div>
        
    </div>
    
    <h3 class="with-line">Areas</h3>

    <div class="row">

        <div class="col-md-8">
            <div include-with-scope="admin-theme/modules/direction/tabla_areas_por_direccion"></div>
        </div>

    </div>
    
    <br>
    
    <div ng-if="formEditDirection.eliminable && formEditDirection.editDirection" class="row">
        <div class="col-md-6">
            <div class="alert bg-warning">
                  Para eliminar esta <strong>Direcci&oacute;n</strong>, primero cambie las <strong>Areas</strong> a otra <strong>Direcci&oacute;n</strong>
            </div>
        </div>
    </div>
    
    <div class="row">
        
        <div ng-if="formEditDirection.editDirection">
            <div class="col-sm-6 col-xs-8">
                <button type="submit" class="btn btn-primary btn-with-icon" ng-click="formEditDirection.updateDirection()">
                    <i class="ion-android-options"></i>Guardar cambios
                </button>
                
                <button ng-if="!formEditDirection.eliminable" type="button" class="btn btn-danger btn-with-icon" ng-click="formEditDirection.delete()">
                  <i class="ion-ios-trash"></i>Eliminar
                </button>
                
                <button type="button" class="btn btn-warning btn-with-icon" ng-click="formEditDirection.cancelEdit()">
                  <i class="ion-android-cancel"></i>Cancelar
                </button>
            </div>
        </div>
        
        <div ng-if="!formEditDirection.editDirection">
            <div class="col-sm-4 col-xs-6">
                <button type="submit" class="btn btn-primary btn-with-icon" ng-click="formEditDirection.enableEdit()">
                    <i class="ion-android-options"></i>Editar
                </button>
            </div>
        </div>
        
    </div>
  
</form>