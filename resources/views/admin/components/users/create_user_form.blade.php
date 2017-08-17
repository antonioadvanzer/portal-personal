<div ba-panel ba-panel-class="profile-page">
  <div class="panel-content">
      
      <form name="newUser" novalidate>
          
    {{--<div class="progress-info">Your profile is 70% Complete</div>
    <div class="progress">
      <div class="progress-bar progress-bar-primary progress-bar-striped active" role="progressbar"
           aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%">
      </div>
    </div>--}}
          
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

          <div class="col-sm-9">
            <div class="userpic">
              <div class="userpic-wrapper">
                <img id="inputUserPicture" src="@{{ formUser.imageSrc }}" ng-click="uploadPicture()">
              </div>
              <i class="ion-ios-close-outline" ng-click="removePicture()" ng-if="(formUser.noPicture && formUser.imageSrc != '')"></i>
              <a href class="change-userpic" ng-click="uploadPicture()" ng-if="!(formUser.noPicture)">Agrega Foto de Perfil</a>
              <input type="file" id="uploadFile" name="uploadFile" ng-show="false" ng-file-select="onFileSelect($files)" ng-model="formUser.imageSrc" accept="image/*">
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
            <input type="text" class="form-control" id="inputUserName" name="inputUserName" ng-model="formUser.inputUserName" placeholder="" required>
          </div>
            
            <div class="col-sm-9" ng-show="validIUN=(newUser.inputUserName.$dirty && newUser.inputUserName.$invalid)">
                <br>
                <span class="alert bg-danger" ng-show="newUser.inputUserName.$error.required">El Nombre es requerido</span>
                <br><br>
            </div>
        </div>
        <div class="form-group row clearfix" ng-class="{'has-error': validIUAP}">
          <label for="inputUserApellidoP" class="col-sm-3 control-label">Apellido Paterno</label>

          <div class="col-sm-9">
            <input type="text" class="form-control" id="inputUserApellidoP" name="inputUserApellidoP" ng-model="formUser.inputUserApellidoP" placeholder="" value="" required>
          </div>
            
            <div class="col-sm-9" ng-show="validIUAP=(newUser.inputUserApellidoP.$dirty && newUser.inputUserApellidoP.$invalid)">
                <br>
                <span class="alert bg-danger" ng-show="newUser.inputUserApellidoP.$error.required">El Apellido Paterno es requerido</span>
                <br><br>
            </div>
        </div>
        <div class="form-group row clearfix" ng-class="{'has-error': validIUAM}">
          <label for="inputUserApellidoM" class="col-sm-3 control-label">Apellido Materno</label>

          <div class="col-sm-9">
            <input type="text" class="form-control" id="inputUserApellidoM"  name="inputUserApellidoM" ng-model="formUser.inputUserApellidoM" placeholder="" value="" required>
          </div>
            
            <div class="col-sm-9" ng-show="validIUAM=(newUser.inputUserApellidoM.$dirty && newUser.inputUserApellidoM.$invalid)">
                <br>
                <span class="alert bg-danger" ng-show="newUser.inputUserApellidoM.$error.required">El Apellido Materno es requerido</span>
                <br><br>
            </div>
        </div>
      </div>
      {{--<div class="col-md-6">
        <div class="form-group row clearfix">
          <label class="col-sm-3 control-label">Department</label>

          <div class="col-sm-9">
            <select class="form-control" selectpicker>
              <option>Web Development</option>
              <option>System Development</option>
              <option>Sales</option>
              <option>Human Resources</option>
            </select>
          </div>
        </div>

        <div class="form-group row clearfix">
          <label for="inputOccupation" class="col-sm-3 control-label">Occupation</label>

          <div class="col-sm-9">
            <input type="text" class="form-control" id="inputOccupation" placeholder="" value="Front End Web Developer">
          </div>
        </div>
      </div>--}}
    </div>

    <h3 class="with-line">Contraseña</h3>

    <div class="row">
      <div class="col-md-6">
        <div class="form-group row clearfix">
          <label for="inputUserPassword" class="col-sm-3 control-label">Contraseña</label>

          <div class="col-sm-9">
            <input type="text" class="form-control" id="inputUserPassword" placeholder="" value="Generada automaticamente" readonly>
          </div>
        </div>
      </div>
      {{--<div class="col-md-6">
        <div class="form-group row clearfix">
          <label for="inputUserConfirmPassword" class="col-sm-3 control-label">Confirmar Contraseña</label>

          <div class="col-sm-9">
            <input type="password" class="form-control" id="inputUserConfirmPassword" placeholder="">
          </div>
        </div>
      </div>--}}
    </div>

    <h3 class="with-line">Informaci&oacute;n de Puesto</h3>

    <div class="row">
      <div class="col-md-6">
        <div class="form-group row clearfix" ng-class="{'has-error': validIUE}">
          <label for="inputUserEmail" class="col-sm-3 control-label">Email</label>

          <div class="col-sm-9">
            <input type="email" class="form-control" id="inputUserEmail" name="inputUserEmail" ng-model="formUser.inputUserEmail" placeholder="" value="" ng-keyup="formUser.checkEmail(newUser)" required>
          </div>
            
            <div class="col-sm-9" ng-show="formUser.email_available">
                <br>
                <span class="alert bg-warning">La direcci&oacute;n de correo electr&oacute;nico ya ha sido utilizado</span>
            </div>
            <div class="col-sm-9" ng-show="validIUE=(newUser.inputUserEmail.$dirty && newUser.inputUserEmail.$invalid)">
                <br>
                <span class="alert bg-danger" ng-show="newUser.inputUserEmail.$error.required">El Email es requerido</span>
                <span class="alert bg-danger" ng-show="newUser.inputUserEmail.$error.email">El Email es invalido</span>
                <br><br>
            </div>
        </div>
        <div class="form-group row clearfix" ng-class="{'has-error': validIUP}">
          <label for="inputUserPlaza" class="col-sm-3 control-label">Plaza</label>

          <div class="col-sm-9">
            <input type="text" class="form-control" id="inputUserPlaza" name="inputUserPlaza" ng-model="formUser.inputUserPlaza" placeholder="" value="" required>
          </div>
            
            <div class="col-sm-9" ng-show="validIUP=(newUser.inputUserPlaza.$dirty && newUser.inputUserPlaza.$invalid)">
                <br>
                <span class="alert bg-danger" ng-show="newUser.inputUserPlaza.$error.required">La Plaza es requerida</span>
                <br><br>
            </div>
        </div>
        <div class="form-group row clearfix" ng-class="{'has-error': validIUN}">
          <label for="inputUserNomina" class="col-sm-3 control-label"># Nomina</label>

          <div class="col-sm-9">
            <input type="number" class="form-control" id="inputUserNomina" name="inputUserNomina" ng-model="formUser.inputUserNomina" placeholder="" min="0" value="" ng-keyup="formUser.checkNomina(newUser)" required>
          </div>
            
            <div class="col-sm-9" ng-show="formUser.nomina_available">
                <br>
                <span class="alert bg-warning">El Numero de empleado ya ha sido utilizado</span>
            </div>
            <div class="col-sm-9" ng-show="validIUN=(newUser.inputUserNomina.$dirty && newUser.inputUserNomina.$invalid)">
                <br>
                <span class="alert bg-danger" ng-show="newUser.inputUserNomina.$error.required">El Numero de empleado es requerido</span>
                <span class="alert bg-danger" ng-show="newUser.inputUserNomina.$error.number">El Numero de empleado debe ser numerico</span>
                <br><br>
            </div>
        </div>
        <div class="form-group row clearfix">
          <label for="inputUserFechaIngreso" class="col-sm-3 control-label">Fecha de Ingreso</label>

          <div class="col-sm-9" ng-controller="UsuariosModuleCtrl">
            {{--<input type="text" class="form-control" id="inputUserFechaIngreso" placeholder="" value="">--}}
              
              <label>Fecha Seleccionada: <em>@{{formUser.dt | date:'fullDate' }}</em></label>
                <p class="input-group">
                    <input id="inputUserFechaIngreso" type="text" class="form-control" uib-datepicker-popup="@{{format}}" datepicker-options="options" ng-model="formUser.dt" is-open="opened" ng-required="true" close-text="Close" alt-input-formats="altInputFormats" show-button-bar="false" readonly/>
                  <span class="input-group-btn">
                    <button type="button" class="btn btn-default" ng-click="open()"><i class="glyphicon glyphicon-calendar"></i></button>
                  </span>
                </p>
              {{--<label>Format: <span class="muted-text">(manual alternate <em>@{{altInputFormats[0]}}</em>)</span></label> <select class="form-control" ng-model="format" ng-options="f for f in formats"><option></option></select>--}}
              
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group row clearfix">
          <label class="col-sm-3 control-label">Area</label>

          <div class="col-sm-9">
            {{--<select class="form-control" title="Standard Select" selectpicker>
              <option>San Francisco</option>
              <option>London</option>
              <option>Minsk</option>
              <option>Tokio</option>
            </select>--}}
              
              <ui-select id="inputUserArea" ng-model="selectedArea.selected"
               class="btn-group bootstrap-select form-control"
               ng-disabled="false"
               append-to-body="true"
               search-enabled="false"
                        on-select="getDirection($item, $model)">
              <ui-select-match placeholder="Seleccionar">
                <span> @{{$select.selected.name}}</span>
              </ui-select-match>
              <ui-select-choices repeat="standardArea in standardSelectAreas | filter: $select.search">
                <span ng-bind-html="standardArea.name"></span>
              </ui-select-choices>
            </ui-select>
          </div>
        </div>
        <div class="form-group row clearfix">
          <label for="inputUserDireccion" class="col-sm-3 control-label">Direcci&oacute;n</label>

          <div class="col-sm-9">
            <input type="text" class="form-control" id="inputUserDireccion" ng-model="direction" placeholder="" value="" readonly>
          </div>
        </div>
        <div class="form-group row clearfix">
          <label class="col-sm-3 control-label">Track</label>

          <div class="col-sm-9">
              
            <ui-select ng-model="selectedTrack.selected"
               class="btn-group bootstrap-select form-control"
               ng-disabled="false"
               append-to-body="true"
               search-enabled="false"
                       on-select="getPositions($item, $model);">
              <ui-select-match placeholder="Seleccionar">
                <span> @{{$select.selected.name}}</span>
              </ui-select-match>
              <ui-select-choices repeat="standardTrack in standardSelectTracks | filter: $select.search">
                <span ng-bind-html="standardTrack.name"></span>
              </ui-select-choices>
            </ui-select>
          </div>
        </div>
        <div class="form-group row clearfix">
          <label class="col-sm-3 control-label">Posici&oacute;n</label>

          <div class="col-sm-9">
            
            <ui-select ng-model="selectedPosition.selected"
               class="btn-group bootstrap-select form-control"
               ng-disabled="false"
               append-to-body="true"
               search-enabled="false"
                       on-select="getPermissionsPositions($item, $model)">
              <ui-select-match placeholder="Seleccionar">
                <span> @{{$select.selected.name}}</span>
              </ui-select-match>
              <ui-select-choices repeat="standardPosition in standardSelectPositions | filter: $select.search">
                <span ng-bind-html="standardPosition.name"></span>
              </ui-select-choices>
            </ui-select>
              
          </div>
        </div>
        <div class="form-group row clearfix">
          <label class="col-sm-3 control-label">Empresa</label>

          <div class="col-sm-9">
            
            <ui-select ng-model="selectedCompany.selected"
               class="btn-group bootstrap-select form-control"
               ng-disabled="false"
               append-to-body="true"
               search-enabled="false">
              <ui-select-match placeholder="Seleccionar">
                <span> @{{$select.selected.name}}</span>
              </ui-select-match>
              <ui-select-choices repeat="standardCompany in standardSelectCompanies | filter: $select.search">
                <span ng-bind-html="standardCompany.name"></span>
              </ui-select-choices>
            </ui-select>
              
          </div>
        </div>
        <div class="form-group row clearfix">
          <label class="col-sm-3 control-label">Jefe Directo</label>

          <div class="col-sm-9">
            
            <ui-select ng-model="selectedBoss.selected"
               class="btn-group bootstrap-select form-control"
               ng-disabled="false"
               append-to-body="true"
               search-enabled="false">
              <ui-select-match placeholder="Seleccionar">
                <span> @{{$select.selected.name}}</span>
              </ui-select-match>
              <ui-select-choices repeat="standardBoss in standardSelectBosses | filter: $select.search">
                <span ng-bind-html="standardBoss.name"></span>
              </ui-select-choices>
            </ui-select>
              
          </div>
        </div>
      </div>
    </div>

    {{--<h3 class="with-line">Social Profiles</h3>

    <div class="social-profiles row clearfix">
      <div class="col-md-3 col-sm-4" ng-repeat="item in socialProfiles">

        <a class="sn-link" href ng-click="showModal(item)" ng-if="!item.href">
          <i class="socicon @{{ item.icon }}"></i>
          <span>@{{ item.name }}</span>
        </a>

        <a class="sn-link connected" href="@{{ item.href }}" target="_blank" ng-if="item.href">
          <i class="socicon @{{ item.icon }}"></i>
          <span>@{{ item.name }}</span>
          <em class="ion-ios-close-empty sn-link-close" ng-mousedown="unconnect(item)"></em>
        </a>
      </div>
    </div>--}}

    <h3 class="with-line">Permisos Especiales</h3>
      <h5 class="with-line">(Si el permiso no se puede habilitar o deshabilitar, significa que el Area o Posicición ya los tienen de manera predeterminada)</h5>

    <div class="notification row clearfix">
      {{--<div class="col-sm-6">
        <div class="form-group row clearfix">
          <label class="col-xs-8">When I receive a message</label>

          <div class="col-xs-4">
            <switch color="primary" ng-model="switches[0]"></switch>
          </div>
        </div>
        <div class="form-group row clearfix">
          <label class="col-xs-8">When Someone sends me an invitation</label>

          <div class="col-xs-4">
            <switch color="primary" ng-model="switches[1]"></switch>
          </div>
        </div>
        <div class="form-group row clearfix">
          <label class="col-xs-8">When profile information changes</label>

          <div class="col-xs-4">
            <switch color="primary" ng-model="switches[2]"></switch>
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group row clearfix">
          <label class="col-xs-8">When anyone logs into your account from a new device or browser</label>

          <div class="col-xs-4">
            <switch color="primary" ng-model="switches[3]"></switch>
          </div>
        </div>
        <div class="form-group row clearfix">
          <label class="col-xs-8">Weekly Reports</label>

          <div class="col-xs-4">
            <switch color="primary" ng-model="switches[4]"></switch>
          </div>
        </div>
        <div class="form-group row clearfix">
          <label class="col-xs-8">Daily Reports</label>

          <div class="col-xs-4">
            <switch color="primary" ng-model="switches[5]"></switch>
          </div>
        </div>
      </div>--}}
        {{--<div ng-controller="UsuariosModuleCtrl as vm">--}}
        @foreach($permissions as $p)
            <div class="col-sm-6">
                <div class="form-group row clearfix">
                    <label class="col-xs-8">{{$p->name}}</label>

                    <div id="{{'ps'.$p->id}}" class="col-xs-4">
                        <switch id="{{'pss'.$p->id}}" color="primary" ng-model="switches[ '{{ 'ps'.$p->id }}' ]"></switch>
                        {{--<ba-switcher id="{{'pss'.$p->id}}" switcher-style="primary" switcher-value="{{'vm.switches.s'.$p->id}}"></ba-switcher>--}}
                    </div>
                </div>
            </div>
        @endforeach
        {{--</div>--}}
    </div>
    {{--<button type="button" class="btn btn-primary btn-with-icon save-profile" ng-click="saveUser()" ng-disabled="newUser.inputUserName.$dirty && newUser.inputUserName.$invalid || newUser.inputUserApellidoP.$dirty && newUser.inputUserApellidoP.$invalid || newUser.inputUserApellidoM.$dirty && newUser.inputUserApellidoM.$invalid || newUser.inputUserEmail.$dirty && newUser.inputUserEmail.$invalid || newUser.inputUserPlaza.$dirty && newUser.inputUserPlaza.$invalid || newUser.inputUserNomina.$dirty && newUser.inputUserNomina.$invalid "><i class="ion-android-checkmark-circle"></i>Guardar</button>--}}
    <button type="button" class="btn btn-primary btn-with-icon save-profile" ng-click="saveUser()" ng-disabled="newUser.inputUserName.$invalid || newUser.inputUserApellidoP.$invalid || newUser.inputUserApellidoM.$invalid || newUser.inputUserEmail.$invalid || newUser.inputUserPlaza.$invalid || newUser.inputUserNomina.$invalid || (!selectedArea.selected.id) || (!selectedTrack.selected.id) || (!selectedPosition.selected) || (!selectedCompany.selected) || (!selectedBoss.selected) || (newUser.uploadFile.$invalid) || !(formUser.imageSrc != '') || (formUser.nomina_available) || (formUser.email_available)">
      <i class="ion-android-checkmark-circle"></i>Guardar
    </button>
    
    </form>
      
  </div>
</div>