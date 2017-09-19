<form name="editTrack">
    
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
                <div ng-if="!formEditTrack.editTrack">
                    <label class="form-control">@{{formEditTrack.inputTrackName}}</label>
                </div>
                <div ng-if="formEditTrack.editTrack">
                    <input type="text" class="form-control" id="inputTrackName" name="inputTrackName" ng-model="formEditTrack.inputTrackName" placeholder="" required>
                </div>
                
            </div>
            
        </div>
        
    </div>
    
    <h3 class="with-line">Posiciones Relacionadas</h3>

    <div class="row">

        <div class="col-md-8">
            <div include-with-scope="admin-theme/modules/track/tabla_posiciones_por_track"></div>
        </div>

    </div>
    
    <br>
    
    <div ng-if="formEditTrack.eliminable && formEditTrack.editTrack" class="row">
        <div class="col-md-6">
            <div class="alert bg-warning">
                  Para eliminar este <strong>Track</strong>, primero desvincule las <strong>Posiciones</strong>
            </div>
        </div>
    </div>
    
    <div class="row">
        
        <div ng-if="formEditTrack.editTrack">
            <div class="col-sm-6 col-xs-8">
                <button type="submit" class="btn btn-primary btn-with-icon" ng-click="formEditTrack.updateTrack()">
                    <i class="ion-android-options"></i>Guardar cambios
                </button>
                
                <button ng-if="!formEditTrack.eliminable" type="button" class="btn btn-danger btn-with-icon" ng-click="formEditTrack.delete()">
                  <i class="ion-ios-trash"></i>Eliminar
                </button>
                
                <button type="button" class="btn btn-warning btn-with-icon" ng-click="formEditTrack.cancelEdit()">
                  <i class="ion-android-cancel"></i>Cancelar
                </button>
            </div>
        </div>
        
        <div ng-if="!formEditTrack.editTrack">
            <div class="col-sm-4 col-xs-6">
                <button type="submit" class="btn btn-primary btn-with-icon" ng-click="formEditTrack.enableEdit()">
                    <i class="ion-android-options"></i>Editar
                </button>
            </div>
        </div>
        
    </div>
  
    </div>
        
</form>