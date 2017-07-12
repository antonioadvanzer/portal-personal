<div ba-panel ba-panel-class="profile-page">
  <div class="panel-content">
      
      <form name="editUser" novalidate>
          
    <div class="progress ng-scope" ng-show="sending">
      <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="40" style="width: 100%">
        <span class="sr-only">100% Complete (success)</span>
      </div>
    </div>

    <h3 class="with-line">Informaci&oacute;n del Empleado</h3>

    <div class="row">
      <div class="col-md-6">
        <div class="form-group row clearfix">
          <label for="inputUserName" class="col-sm-3 control-label">Foto</label>

            <div ng-if="!formEditUser.editUser">
                
                <div class="col-sm-9">
                    <div class="userpic">
                      <div class="userpic-wrapper">
                        <img id="inputUserPicture" src="@{{ formEditUser.imageProfile }}">
                      </div>
                    </div>
                  </div>
                
            </div>
            <div ng-if="formEditUser.editUser">
                
              <div class="col-sm-9">
                <div class="userpic">
                  <div class="userpic-wrapper">
                    <img id="inputUserPicture" src="@{{ formEditUser.imageSrc }}" ng-click="formEditUser.uploadPicture()">
                  </div>
                  <i class="ion-ios-close-outline" ng-click="formEditUser.removePicture()" ng-if="(formEditUser.noPicture && formEditUser.imageSrc != '')"></i>
                  <a href class="change-userpic" ng-click="formEditUser.uploadPicture()" ng-if="!(formEditUser.noPicture)">Agrega Foto de Perfil</a>
                  <input type="file" id="uploadFile" name="uploadFile" ng-show="false" ng-file-select="onFileSelect($files)" ng-model="formEditUser.imageSrc" accept="image/*">
                </div>
              </div>
                
            </div>
                
        </div>
      </div>
      <div class="col-md-6"></div>
    </div>

    <div class="row">
      <div class="col-md-6">
        <div class="form-group row clearfix" ng-class="{'has-error': validIUN}">
          <label for="inputUserName" class="col-sm-3 control-label">Nombre(s)</label>

          <div class="col-sm-9">
              <div ng-if="!formEditUser.editUser">
                    <label class="form-control">@{{formEditUser.inputUserName}}</label>
              </div>
              <div ng-if="formEditUser.editUser">
                    <input type="text" class="form-control" id="inputUserName" name="inputUserName" ng-model="formEditUser.inputUserName" placeholder="" required>
              </div>
          </div>
            
            <div class="col-sm-9" ng-show="validIUN=(editUser.inputUserName.$dirty && editUser.inputUserName.$invalid)">
                <br>
                <span class="alert bg-danger" ng-show="editUser.inputUserName.$error.required">El Nombre es requerido</span>
                <br><br>
            </div>
        </div>
        <div class="form-group row clearfix" ng-class="{'has-error': validIUAP}">
          <label for="inputUserApellidoP" class="col-sm-3 control-label">Apellido Paterno</label>

          <div class="col-sm-9">
              <div ng-if="!formEditUser.editUser">
                    <label class="form-control">@{{formEditUser.inputUserApellidoP}}</label>
              </div>
              <div ng-if="formEditUser.editUser">
                    <input type="text" class="form-control" id="inputUserApellidoP" name="inputUserApellidoP" ng-model="formEditUser.inputUserApellidoP" placeholder="" value="" required>
              </div>
          </div>
            
            <div class="col-sm-9" ng-show="validIUAP=(editUser.inputUserApellidoP.$dirty && editUser.inputUserApellidoP.$invalid)">
                <br>
                <span class="alert bg-danger" ng-show="editUser.inputUserApellidoP.$error.required">El Apellido Paterno es requerido</span>
                <br><br>
            </div>
        </div>
        <div class="form-group row clearfix" ng-class="{'has-error': validIUAM}">
          <label for="inputUserApellidoM" class="col-sm-3 control-label">Apellido Materno</label>

          <div class="col-sm-9">
              <div ng-if="!formEditUser.editUser">
                    <label class="form-control">@{{formEditUser.inputUserApellidoM}}</label>
              </div>
              <div ng-if="formEditUser.editUser">
                    <input type="text" class="form-control" id="inputUserApellidoM" name="inputUserApellidoM" ng-model="formEditUser.inputUserApellidoM" placeholder="" value="" required>
              </div>
          </div>
            
            <div class="col-sm-9" ng-show="validIUAM=(editUser.inputUserApellidoM.$dirty && editUser.inputUserApellidoM.$invalid)">
                <br>
                <span class="alert bg-danger" ng-show="editUser.inputUserApellidoM.$error.required">El Apellido Materno es requerido</span>
                <br><br>
            </div>
        </div>
      </div>
    </div>

    {{--<h3 class="with-line">Contraseña</h3>

    <div class="row">
      <div class="col-md-6">
        <div class="form-group row clearfix">
          <label for="inputUserPassword" class="col-sm-3 control-label">Contraseña</label>

          <div class="col-sm-9">
            <input type="text" class="form-control" id="inputUserPassword" placeholder="" value="Generada automaticamente" readonly>
          </div>
        </div>
      </div>
    </div>--}}

    <h3 class="with-line">Informaci&oacute;n de Puesto</h3>

    <div class="row">
      <div class="col-md-6">
        <div class="form-group row clearfix" ng-class="{'has-error': validIUE}">
          <label for="inputUserEmail" class="col-sm-3 control-label">Email</label>

          <div class="col-sm-9">
              <div ng-if="!formEditUser.editUser">
                    <label class="form-control">@{{formEditUser.inputUserEmail}}</label>
              </div>
              <div ng-if="formEditUser.editUser">
                    <input type="email" class="form-control" id="inputUserEmail" name="inputUserEmail" ng-model="formEditUser.inputUserEmail" placeholder="" value="" required>
              </div>
          </div>
            
            <div class="col-sm-9" ng-show="validIUE=(editUser.inputUserEmail.$dirty && editUser.inputUserEmail.$invalid)">
                <br>
                <span class="alert bg-danger" ng-show="editUser.inputUserEmail.$error.required">El Email es requerido</span>
                <span class="alert bg-danger" ng-show="editUser.inputUserEmail.$error.email">El Email es invalido</span>
                <br><br>
            </div>
        </div>
        <div class="form-group row clearfix" ng-class="{'has-error': validIUP}">
          <label for="inputUserPlaza" class="col-sm-3 control-label">Plaza</label>

          <div class="col-sm-9">
              <div ng-if="!formEditUser.editUser">
                    <label class="form-control">@{{formEditUser.inputUserPlaza}}</label>
              </div>
              <div ng-if="formEditUser.editUser">
                    <input type="text" class="form-control" id="inputUserPlaza" name="inputUserPlaza" ng-model="formEditUser.inputUserPlaza" placeholder="" value="" required>
              </div>
          </div>
            
            <div class="col-sm-9" ng-show="validIUP=(editUser.inputUserPlaza.$dirty && editUser.inputUserPlaza.$invalid)">
                <br>
                <span class="alert bg-danger" ng-show="editUser.inputUserPlaza.$error.required">La Plaza es requerida</span>
                <br><br>
            </div>
        </div>
        <div class="form-group row clearfix" ng-class="{'has-error': validIUN}">
          <label for="inputUserNomina" class="col-sm-3 control-label"># Nomina</label>

          <div class="col-sm-9">
              <div ng-if="!formEditUser.editUser">
                    <label class="form-control">@{{formEditUser.inputUserNomina}}</label>
              </div>
              <div ng-if="formEditUser.editUser">
                    <input type="number" class="form-control" id="inputUserNomina" name="inputUserNomina" ng-model="formEditUser.inputUserNomina" placeholder="" min="0" value="" required>
              </div>
          </div>
            
            <div class="col-sm-9" ng-show="validIUN=(editUser.inputUserNomina.$dirty && editUser.inputUserNomina.$invalid)">
                <br>
                <span class="alert bg-danger" ng-show="editUser.inputUserNomina.$error.required">El Numero de empleado es requerido</span>
                <span class="alert bg-danger" ng-show="editUser.inputUserNomina.$error.number">El Numero de empleado debe ser numerico</span>
                <br><br>
            </div>
        </div>
        <div class="form-group row clearfix">
          <label for="inputUserFechaIngreso" class="col-sm-3 control-label">Fecha de Ingreso</label>
            
            <div class="col-sm-9"  ng-if="!formEditUser.editUser">
                    <label class="form-control">@{{formEditUser.inputUserFechaIngreso}}</label>
              </div>
            <div class="col-sm-9" ng-if="formEditUser.editUser" ng-controller="UsuariosModuleCtrl">
                <label>Fecha Seleccionada: <em>@{{formEditUser.dt | date:'fullDate' }}</em></label>
                <p class="input-group">
                    <input id="inputUserFechaIngreso" type="text" class="form-control" uib-datepicker-popup="@{{format}}" datepicker-options="options" ng-model="formEditUser.dt" is-open="opened" ng-required="true" close-text="Close" alt-input-formats="altInputFormats" show-button-bar="false" readonly/>
                  <span class="input-group-btn">
                    <button type="button" class="btn btn-default" ng-click="open()"><i class="glyphicon glyphicon-calendar"></i></button>
                  </span>
                </p>
            </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group row clearfix">
          <label class="col-sm-3 control-label">Area</label>

          <div class="col-sm-9">
              
              <div ng-if="!formEditUser.editUser">
                <label class="form-control">@{{formEditUser.inputUserArea}}</label>
              </div>
              <div ng-if="formEditUser.editUser">
                <ui-select id="inputUserArea" ng-model="ue_selectedArea.selected"
                   class="btn-group bootstrap-select form-control"
                   ng-disabled="false"
                   append-to-body="true"
                   search-enabled="false"
                            on-select="formEditUser.getDirection($item, $model)">
                  <ui-select-match placeholder="Seleccionar">
                    <span> @{{$select.selected.name}}</span>
                  </ui-select-match>
                  <ui-select-choices repeat="ue_standardArea in ue_standardSelectAreas | filter: $select.search">
                    <span ng-bind-html="ue_standardArea.name"></span>
                  </ui-select-choices>
                </ui-select>
              </div>
              
          </div>
        </div>
        <div class="form-group row clearfix">
          <label for="inputUserDireccion" class="col-sm-3 control-label">Direcci&oacute;n</label>

          <div class="col-sm-9">
              <div ng-if="!formEditUser.editUser">
                    <label class="form-control">@{{formEditUser.inputUserDireccion}}</label>
              </div>
              <div ng-if="formEditUser.editUser">
                    <input type="text" class="form-control" id="inputUserDireccion" ng-model="formEditUser.inputUserDireccion" placeholder="" value="" readonly>
              </div>
            
          </div>
        </div>
        <div class="form-group row clearfix">
          <label class="col-sm-3 control-label">Track</label>

          <div class="col-sm-9">
              
              <div ng-if="!formEditUser.editUser">
                    <label class="form-control">@{{formEditUser.inputUserTrack}}</label>
              </div>
              <div ng-if="formEditUser.editUser">
                    <ui-select ng-model="ue_selectedTrack.selected"
                   class="btn-group bootstrap-select form-control"
                   ng-disabled="false"
                   append-to-body="true"
                   search-enabled="false"
                           on-select="formEditUser.getPositions($item, $model);">
                      <ui-select-match placeholder="Seleccionar">
                        <span> @{{$select.selected.name}}</span>
                      </ui-select-match>
                      <ui-select-choices repeat="ue_standardArea in ue_standardSelectTracks | filter: $select.search">
                        <span ng-bind-html="ue_standardArea.name"></span>
                      </ui-select-choices>
                    </ui-select>
              </div>
                
          </div>
        </div>
        <div class="form-group row clearfix">
          <label class="col-sm-3 control-label">Posici&oacute;n</label>

          <div class="col-sm-9">
              
            <div ng-if="!formEditUser.editUser">
                <label class="form-control">@{{formEditUser.inputUserPosicion}}</label>
            </div>
            <div ng-if="formEditUser.editUser">
                <ui-select ng-model="ue_selectedPosition.selected"
               class="btn-group bootstrap-select form-control"
               ng-disabled="false"
               append-to-body="true"
               search-enabled="false"
                       on-select="formEditUser.getPermissionsPositions($item, $model)">
                  <ui-select-match placeholder="Seleccionar">
                    <span> @{{$select.selected.name}}</span>
                  </ui-select-match>
                  <ui-select-choices repeat="ue_standardPosition in ue_standardSelectPositions | filter: $select.search">
                    <span ng-bind-html="ue_standardPosition.name"></span>
                  </ui-select-choices>
                </ui-select>
            </div>
              
          </div>
        </div>
        <div class="form-group row clearfix">
          <label class="col-sm-3 control-label">Empresa</label>

          <div class="col-sm-9">
              
            <div ng-if="!formEditUser.editUser">
                <label class="form-control">@{{formEditUser.inputUserCompany}}</label>
            </div>
            <div ng-if="formEditUser.editUser">
                <ui-select ng-model="ue_selectedCompany.selected"
               class="btn-group bootstrap-select form-control"
               ng-disabled="false"
               append-to-body="true"
               search-enabled="false">
                  <ui-select-match placeholder="Seleccionar">
                    <span> @{{$select.selected.name}}</span>
                  </ui-select-match>
                  <ui-select-choices repeat="ue_standardCompany in ue_standardSelectCompanies | filter: $select.search">
                    <span ng-bind-html="ue_standardCompany.name"></span>
                  </ui-select-choices>
                </ui-select>
            </div>
              
          </div>
        </div>
        <div class="form-group row clearfix">
          <label class="col-sm-3 control-label">Jefe Directo</label>

          <div class="col-sm-9">
              
            <div ng-if="!formEditUser.editUser">
                <label class="form-control">@{{formEditUser.inputUserBoss}}</label>
            </div>
            <div ng-if="formEditUser.editUser">
                <ui-select ng-model="ue_selectedBoss.selected"
               class="btn-group bootstrap-select form-control"
               ng-disabled="false"
               append-to-body="true"
               search-enabled="false">
                  <ui-select-match placeholder="Seleccionar">
                    <span> @{{$select.selected.name}}</span>
                  </ui-select-match>
                  <ui-select-choices repeat="ue_standardBoss in ue_standardSelectBosses | filter: $select.search">
                    <span ng-bind-html="ue_standardBoss.name"></span>
                  </ui-select-choices>
                </ui-select>
            </div>
              
          </div>
        </div>
      </div>
    </div>
    
    <div ng-if="formEditUser.inputUserPermission2">
        <h3 class="with-line">Personal a Cargo</h3>

        <div class="notification row clearfix">

            <div class="col-md-12">
                <div include-with-scope="admin-theme/modules/user/tabla_personal_a_cargo"></div>
            </div>

        </div>
          
    </div>
          
    <h3 class="with-line">Permisos Especiales</h3>
      
    <div class="notification row clearfix" ng-if="!formEditUser.editUser">
        
        <div class="col-md-12">
            
              <div class="input-group">
                  
                  <div class="checkbox-demo-row">
                    <div class="input-demo checkbox-demo row">
                      <div class="col-md-4">
                        <label class="checkbox-inline custom-checkbox nowrap">
                          <input type="checkbox" id="inputUserPermission1" name="inputUserPermission1" ng-model="formEditUser.inputUserPermission1" disabled>
                          <span>Administraci&oacute;n</span>
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label class="checkbox-inline custom-checkbox nowrap">
                          <input type="checkbox" id="inputUserPermission2" name="inputUserPermission2" ng-model="formEditUser.inputUserPermission2" disabled>
                          <span>Personal a cargo</span>
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label class="checkbox-inline custom-checkbox nowrap">
                          <input type="checkbox" id="inputUserPermission3" name="inputUserPermission3" ng-model="formEditUser.inputUserPermission3" disabled>
                          <span>Capturista de Gastos de Viaje</span>
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label class="checkbox-inline custom-checkbox nowrap">
                          <input type="checkbox" id="inputUserPermission4" name="inputUserPermission4" ng-model="formEditUser.inputUserPermission4" disabled>
                          <span>Capturista de Harvest</span>
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label class="checkbox-inline custom-checkbox nowrap">
                          <input type="checkbox" id="inputUserPermission5" name="inputUserPermission5" ng-model="formEditUser.inputUserPermission5" disabled>
                          <span>Vacaciones</span>
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label class="checkbox-inline custom-checkbox nowrap">
                          <input type="checkbox" id="inputUserPermission6" name="inputUserPermission6" ng-model="formEditUser.inputUserPermission6" disabled>
                          <span>Permisos de Ausencia</span>
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label class="checkbox-inline custom-checkbox nowrap">
                          <input type="checkbox" id="inputUserPermission7" name="inputUserPermission7" ng-model="formEditUser.inputUserPermission7" disabled>
                          <span>Cartas y Constancias</span>
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label class="checkbox-inline custom-checkbox nowrap">
                          <input type="checkbox" id="inputUserPermission8" name="inputUserPermission8" ng-model="formEditUser.inputUserPermission8" disabled>
                          <span>Requisiciones</span>
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label class="checkbox-inline custom-checkbox nowrap">
                          <input type="checkbox" id="inputUserPermission9" name="inputUserPermission9" ng-model="formEditUser.inputUserPermission9" disabled>
                          <span>Evaluaciones</span>
                        </label>
                      </div>
                    </div>
                  </div>
                  
              </div>
            </div>
        
    </div>
          
    <div class="notification row clearfix" ng-if="formEditUser.editUser">
        
        <div class="col-md-12">
            
              <div class="input-group">
                  
                  <div class="checkbox-demo-row">
                    <div class="input-demo checkbox-demo row">
                      <div class="col-md-4">
                        <label class="checkbox-inline custom-checkbox nowrap">
                          <input type="checkbox" id="inputUserPermission1" name="inputUserPermission1" ng-model="formEditUser.inputUserPermission1">
                          <span>Administraci&oacute;n</span>
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label class="checkbox-inline custom-checkbox nowrap">
                          <input type="checkbox" id="inputUserPermission2" name="inputUserPermission2" ng-model="formEditUser.inputUserPermission2">
                          <span>Personal a cargo</span>
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label class="checkbox-inline custom-checkbox nowrap">
                          <input type="checkbox" id="inputUserPermission3" name="inputUserPermission3" ng-model="formEditUser.inputUserPermission3">
                          <span>Capturista de Gastos de Viaje</span>
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label class="checkbox-inline custom-checkbox nowrap">
                          <input type="checkbox" id="inputUserPermission4" name="inputUserPermission4" ng-model="formEditUser.inputUserPermission4">
                          <span>Capturista de Harvest</span>
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label class="checkbox-inline custom-checkbox nowrap">
                          <input type="checkbox" id="inputUserPermission5" name="inputUserPermission5" ng-model="formEditUser.inputUserPermission5">
                          <span>Vacaciones</span>
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label class="checkbox-inline custom-checkbox nowrap">
                          <input type="checkbox" id="inputUserPermission6" name="inputUserPermission6" ng-model="formEditUser.inputUserPermission6">
                          <span>Permisos de Ausencia</span>
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label class="checkbox-inline custom-checkbox nowrap">
                          <input type="checkbox" id="inputUserPermission7" name="inputUserPermission7" ng-model="formEditUser.inputUserPermission7">
                          <span>Cartas y Constancias</span>
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label class="checkbox-inline custom-checkbox nowrap">
                          <input type="checkbox" id="inputUserPermission8" name="inputUserPermission8" ng-model="formEditUser.inputUserPermission8">
                          <span>Requisiciones</span>
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label class="checkbox-inline custom-checkbox nowrap">
                          <input type="checkbox" id="inputUserPermission9" name="inputUserPermission9" ng-model="formEditUser.inputUserPermission9">
                          <span>Evaluaciones</span>
                        </label>
                      </div>
                    </div>
                  </div>
                  
              </div>
            </div>
        
    </div>
          
  {{--<h3 class="with-line">Permisos Especiales</h3>
      <h5 class="with-line">(Si el permiso no se puede habilitar o deshabilitar, significa que el Area o Posicición ya los tienen de manera predeterminada)</h5>

    <div class="notification row clearfix">
     
        @foreach($permissions as $p)
            <div class="col-sm-6">
                <div class="form-group row clearfix">
                    <label class="col-xs-8">{{$p->name}}</label>

                    <div id="{{'ps'.$p->id}}" class="col-xs-4">
                        <switch id="{{'pss'.$p->id}}" color="primary" ng-model="switches[ '{{ 'ps'.$p->id }}' ]"></switch>
                    </div>
                    
                </div>
            </div>
        @endforeach
    </div>--}}
    
    <div ng-if="formEditUser.editUser">
        <button type="button" class="btn btn-primary btn-with-icon save-profile" ng-click="formEditUser.updateUser()" ng-disabled="editUser.inputUserName.$invalid || editUser.inputUserApellidoP.$invalid || editUser.inputUserApellidoM.$invalid || editUser.inputUserEmail.$invalid || editUser.inputUserPlaza.$invalid || editUser.inputUserNomina.$invalid || (!selectedArea.selected.id) || (!selectedTrack.selected.id) || (!selectedPosition.selected) || (!selectedCompany.selected) || (!selectedBoss.selected) || (editUser.uploadFile.$invalid) || !(formEditUser.imageSrc != '')">
          <i class="ion-android-checkmark-circle"></i>Guardar cambios
        </button>
        
        <button type="button" class="btn btn-danger btn-with-icon save-profile" ng-click="formEditUser.cancelEdit()">
          <i class="ion-android-cancel"></i>Cancelar
        </button>
    </div>
     
    <div ng-if="!formEditUser.editUser">
        <button type="button" class="btn btn-primary btn-with-icon save-profile" ng-click="formEditUser.returnTable()">
          <i class="ion-arrow-return-left"></i>Regresar
        </button>

        <button type="button" class="btn btn-success btn-with-icon save-profile" ng-click="formEditUser.enableEdit()">
          <i class="ion-android-options"></i>Habilidar Edici&oacute;n
        </button>

        <button type="button" class="btn btn-warning btn-with-icon save-profile" ng-click="formEditUser.resetPassword()">
          <i class="ion-wand"></i>Reiniciar Contraseña
        </button>
    </div>
    
    </form>
      
  </div>
</div>