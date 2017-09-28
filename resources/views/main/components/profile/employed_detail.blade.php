<div ba-panel ba-panel-class="profile-page">
    
    <div class="row">
        <h3 class="with-line"></h3>
            <button type="button" class="btn btn-primary btn-with-icon save-profile" ng-click="goBack()">
              <i class="ion-arrow-return-left"></i>Regresar
            </button>
        <h3 class="with-line"></h3>
    </div>
    
    <uib-tabset active="$tabSetStatus.activeTab">
        
        <uib-tab heading="General">
            
            <div class="panel-content">

              <form name="editUser" novalidate>

                <!--<div ng-show="sending">
                    <div class="progress ng-scope">
                      <div class="progress-bar progress-bar-primary progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="40" style="width: 100%">
                        <span class="sr-only">100% Complete (success)</span>
                      </div>
                    </div>
                    <h2>Enviando datos ...</h2>
                </div>-->

                <h3 class="with-line">Informaci&oacute;n del Empleado</h3>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row clearfix">
                      <label for="inputUserName" class="col-sm-3 control-label">Foto</label>

                        <div>

                            <div class="col-sm-9">
                                <div class="userpic">
                                  <div class="userpic-wrapper">
                                    <img id="inputUserPicture" src="@{{ formEditUser.imageProfile }}">
                                  </div>
                                </div>
                              </div>

                        </div>
                        
                    </div>
                  </div>
                  <div class="col-md-6"></div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row clearfix">
                      <label for="inputUserName" class="col-sm-3 control-label">Nombre(s)</label>

                      <div class="col-sm-9">
                          <div>
                                <label class="form-control">@{{formEditUser.inputUserName}}</label>
                          </div>
                      </div>
                    </div>
                    <div class="form-group row clearfix">
                      <label for="inputUserApellidoP" class="col-sm-3 control-label">Apellido Paterno</label>

                      <div class="col-sm-9">
                          <div>
                                <label class="form-control">@{{formEditUser.inputUserApellidoP}}</label>
                          </div>
                      </div>

                    </div>
                    <div class="form-group row clearfix">
                      <label for="inputUserApellidoM" class="col-sm-3 control-label">Apellido Materno</label>

                      <div class="col-sm-9">
                          <div>
                                <label class="form-control">@{{formEditUser.inputUserApellidoM}}</label>
                          </div>
                      </div>

                    </div>
                  </div>
                </div>

                <h3 class="with-line">Informaci&oacute;n de Puesto</h3>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row clearfix">
                      <label for="inputUserEmail" class="col-sm-3 control-label">Email</label>

                      <div class="col-sm-9">
                          <div>
                                <label class="form-control">@{{formEditUser.inputUserEmail}}</label>
                          </div>
                      </div>

                    </div>
                    <div class="form-group row clearfix">
                      <label for="inputUserPlaza" class="col-sm-3 control-label">Plaza</label>

                      <div class="col-sm-9">
                          <div>
                                <label class="form-control">@{{formEditUser.inputUserPlaza}}</label>
                          </div>
                      </div>

                    </div>
                    <div class="form-group row clearfix">
                      <label for="inputUserNomina" class="col-sm-3 control-label"># Nomina</label>

                      <div class="col-sm-9">
                          <div>
                                <label class="form-control">@{{formEditUser.inputUserNomina}}</label>
                          </div>
                      </div>

                    </div>
                    <div class="form-group row clearfix">
                      <label for="inputUserFechaIngreso" class="col-sm-3 control-label">Fecha de Ingreso</label>

                        <div class="col-sm-9">
                            <label class="form-control">@{{formEditUser.inputUserFechaIngreso}}</label>
                        </div>
                        
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row clearfix">
                      <label class="col-sm-3 control-label">&Aacute;rea</label>

                      <div class="col-sm-9">

                          <div>
                            <label class="form-control">@{{formEditUser.inputUserArea}}</label>
                          </div>
                          
                      </div>
                    </div>
                    <div class="form-group row clearfix">
                      <label for="inputUserDireccion" class="col-sm-3 control-label">Direcci&oacute;n</label>

                      <div class="col-sm-9">
                          <div>
                              <p class="form-control">@{{formEditUser.inputUserDireccion}}</p>
                          </div>
                          
                      </div>
                    </div>
                    <div class="form-group row clearfix">
                      <label class="col-sm-3 control-label">Track</label>

                      <div class="col-sm-9">

                          <div>
                                <label class="form-control">@{{formEditUser.inputUserTrack}}</label>
                          </div>
                          
                      </div>
                    </div>
                    <div class="form-group row clearfix">
                      <label class="col-sm-3 control-label">Posici&oacute;n</label>

                      <div class="col-sm-9">

                        <div>
                            <label class="form-control">@{{formEditUser.inputUserPosicion}}</label>
                        </div>
                        
                      </div>
                    </div>
                    <div class="form-group row clearfix">
                      <label class="col-sm-3 control-label">Empresa</label>

                      <div class="col-sm-9">

                        <div>
                            <label class="form-control">@{{formEditUser.inputUserCompany}}</label>
                        </div>
                        
                      </div>
                    </div>
                    <div class="form-group row clearfix">
                      <label class="col-sm-3 control-label">Jefe Directo</label>

                      <div class="col-sm-9">

                        <div>
                            <label class="form-control">@{{formEditUser.inputUserBoss}}</label>
                        </div>
                        
                      </div>
                    </div>
                  </div>
                </div>
                    
                </form>

              </div>
            
        </uib-tab>
        
        <uib-tab heading="Solicitudes">
            
            <div class="panel-content" ng-if="!formRequest.active_view_request">
                <h3 class="with-line">Solicitudes realizadas</h3>
                <div class="notification row clearfix">
                    <div class="col-md-12">
                        <div include-with-scope="theme/modules/user/lista_solicitudes_por_usuario"></div>
                    </div>
                </div>
            </div>
            <div class="panel-content" ng-if="formRequest.active_view_request">
                <h3 class="with-line">Solicitud Detalle</h3>
                <div class="notification row clearfix">
                    <div class="col-md-12">
                        <div ng-include="'theme/modules/user/solicitada_por_usuario'"></div>
                    </div>
                </div>
            </div>
            
        </uib-tab>
        
        <uib-tab heading="Constancias">
            
            <div class="panel-content" ng-if="!formLetter.active_view_letter">
                <h3 class="with-line">Constancias solicitadas</h3>
                <div class="notification row clearfix">
                    <div class="col-md-12">
                        <div include-with-scope="theme/modules/user/lista_cartas_solicitadas_por_usuario"></div>
                    </div>
                </div>
            </div>
            <div class="panel-content" ng-if="formLetter.active_view_letter">
                <h3 class="with-line">Carta Detalle</h3>
                <div class="notification row clearfix">
                    <div class="col-md-12">
                        <div ng-include="'theme/modules/user/carta_solicitada_por_usuario'"></div>
                    </div>
                </div>
            </div>
            
        </uib-tab>
        
        <uib-tab heading="Vacaciones">
            
            <div class="panel-content">
                <h3 class="with-line">Dias Acumulados</h3>
                <div class="notification row clearfix">
                    <div class="col-md-4">
                        <div class="input-group">
                            <span class="input-group-addon input-group-addon-primary addon-left" id="label-autorizador">Fecha Ingreso</span>
                            <label class="form-control with-primary-addon">@{{formEditUser.inputUserFechaIngreso}}</label>
                        </div>
                    </div>
                </div>
                <div class="notification row clearfix">
                    <div class="col-md-8">
                        <!--<div include-with-scope="theme/modules/user/lista_dias_por_usuario"></div>-->
                        <div include-with-scope="theme/modules/vacations/reporte_dias_por_usuario"></div>
                    </div>
                </div><br>
                <div class="notification row clearfix">
                    <div class="col-md-4">
                        <div class="input-group">
                            <span class="input-group-addon input-group-addon-primary addon-left" id="label-autorizador">Total de d&iacute;as disponibles</span>
                            <label class="form-control with-primary-addon">@{{formEditUser.inputTotalDays}}</label>
                        </div>
                    </div>
                </div>
            </div>
        
        </uib-tab>
        
        <!--<uib-tab heading="Estado Laboral">
            
            <div class="panel-content">

                <form name="editUser" novalidate>
                    
                    <h3 class="with-line">Estado actual del colaborador</h3>
                    
                    <div class="row">
                      <div class="col-md-6">
                          
                        <div class="input-group" align="center">
                            <div ng-show="formEditUser.inputUserStatus == 1" class="alert bg-success col-md-4" align="center"><h3>Activo</h3></div>
                            <div ng-show="formEditUser.inputUserStatus == 0" class="alert bg-warning col-md-4" align="center"><h3>Inactivo</h3></div>
                        </div>

                      </div>
                    </div>
                    
                    <div class="row" ng-show="formEditUser.inputShowMotivo">
                        <div class="col-md-12">
                            <div class="input-group">
                                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-observaciones">Motivo </span>
                                <p class="form-control">@{{formEditUser.inputMotivoBaja}}</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row" ng-show="formEditUser.inputUserBaja">
                        <div class="col-md-12">
                            <div class="alert bg-danger">
                            Favor de redactar el motivo de la baja 
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon input-group-addon-primary addon-left" id="basic-observaciones">Motivo </span>
                                <textarea placeholder="" class="form-control" id="inputMotivoBaja" name="inputMotivoBaja" ng-model="formEditUser.inputMotivoBaja" required></textarea>
                            </div>
                        </div>
                    </div>
                    
                    <h3 class="with-line">Opciones</h3>
                    
                    <div ng-if="!formEditUser.inputEliminable">
                    
                    <div ng-if="!formEditUser.inputUserBaja">
                        <button type="button" class="btn btn-primary btn-with-icon save-profile" ng-if="formEditUser.inputUserStatus" ng-click="deleteUser()">
                          <i class="ion-toggle"></i>Dar de baja
                        </button>
                        <button type="button" class="btn btn-primary btn-with-icon save-profile" ng-if="!formEditUser.inputUserStatus" ng-click="reactiveUser()">
                          <i class="ion-toggle-filled"></i>Dar de alta
                        </button>
                    </div>
                    
                    <div ng-if="formEditUser.inputUserBaja">
                        <button type="submit" class="btn btn-primary btn-with-icon save-profile" ng-click="confirmDelete()" ng-disabled="(formEditUser.inputMotivoBaja == '')">
                          <i class="ion-arrow-return-left"></i>Continuar
                        </button>

                        <button type="button" class="btn btn-warning btn-with-icon save-profile" ng-click="cancelDelete()">
                          <i class="ion-android-options"></i>Cancelar
                        </button>

                    </div>
                        
                    </div>
                    
                    <div ng-if="formEditUser.inputEliminable">
                        <div class="col-md-12">
                            <div class="alert bg-danger">
                            Este usuario tiene gente a cargo, tendra que cambiar de jefe a los empleados antes de poder eliminar al usuario
                            </div>
                        </div>
                    </div>
                    
                </form>
            
            </div>
        
        </uib-tab>-->
        
    </uib-tabset>
    
    <!--<div class="row">
        <h3 class="with-line"></h3>
            <button type="button" class="btn btn-primary btn-with-icon save-profile" ng-click="formEditUser.goBack()">
              <i class="ion-arrow-return-left"></i>Regresar
            </button>
        <h3 class="with-line"></h3>
    </div>-->
    
</div>