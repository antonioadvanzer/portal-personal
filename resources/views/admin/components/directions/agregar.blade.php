<form name="newDirection" ng-submit="save()">
    
    <div class="progress ng-scope" ng-show="sending">
      <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="40" style="width: 100%">
        <span class="sr-only">100% Complete (success)</span>
      </div>
    </div>
    
    <div class="row">
        
        <div class="col-md-6">
            
            <div class="input-group">

                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-addon1">Nombre</span>
                <input type="text" class="form-control" id="inputDirectionName" name="inputDirectionName" ng-model="direction.inputDirectionName" placeholder="" required>
                
            </div>
            
        </div>
        
    </div>
    
    <div class="row">
        <div class="col-sm-4 col-xs-6">
            <button type="submit" class="btn btn-primary btn-with-icon">
                <i class="ion-plus-circled"></i>Agregar
            </button>
        </div>
    </div>
  
</form>