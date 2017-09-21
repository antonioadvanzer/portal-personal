<div ba-panel ba-panel-class="profile-page">
    
    <uib-tabset active="$tabSetStatus.activeTab">
        
        <uib-tab heading="Personal">
            
            <div class="panel-content">

              <form name="editUser" novalidate>

                <div class="progress ng-scope" ng-show="sending">
                  <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="40" style="width: 100%">
                    <span class="sr-only">100% Complete (success)</span>
                  </div>
                </div>

                <h3 class="with-line">Informaci&oacute;n del Personal</h3>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row clearfix">
                      <label for="inputUserName" class="col-sm-3 control-label">Foto</label>

                        <div>

                            <div class="col-sm-9">
                                <div class="userpic">
                                  <div class="userpic-wrapper">
                                    <img id="inputUserPicture" ng-src="@{{::( user.picture_name | profilePicture:user.picture_ext )}}">
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
                      <label class="col-sm-3 control-label">Nombre(s)</label>

                      <div class="col-sm-9">
                          <div>
                                <label class="form-control">@{{user.name}}</label>
                          </div>
                      </div>

                    </div>
                    <div class="form-group row clearfix">
                      <label class="col-sm-3 control-label">Apellido Paterno</label>

                      <div class="col-sm-9">
                          <div>
                                <label class="form-control">@{{user.apellido_paterno}}</label>
                          </div>
                      </div>

                    </div>
                    <div class="form-group row clearfix">
                      <label class="col-sm-3 control-label">Apellido Materno</label>

                      <div class="col-sm-9">
                          <div>
                                <label class="form-control">@{{user.apellido_materno}}</label>
                          </div>
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
                    <div class="form-group row clearfix">
                      <label class="col-sm-3 control-label">Email</label>

                      <div class="col-sm-9">
                          <div>
                                <label class="form-control">@{{user.email}}</label>
                          </div>
                      </div>

                    </div>
                    <div class="form-group row clearfix">
                      <label class="col-sm-3 control-label">Plaza</label>

                      <div class="col-sm-9">
                          <div>
                                <label class="form-control">@{{user.plaza}}</label>
                          </div>
                      </div>

                    </div>
                    <div class="form-group row clearfix">
                      <label class="col-sm-3 control-label"># Nomina</label>

                      <div class="col-sm-9">
                          <div>
                                <label class="form-control">@{{user.nomina}}</label>
                          </div>
                      </div>

                    </div>
                    <div class="form-group row clearfix">
                      <label class="col-sm-3 control-label">Fecha de Ingreso</label>

                        <div class="col-sm-9">
                            <div>
                                <label class="form-control">@{{user.fecha_ingreso}}</label>
                            </div>
                        </div>

                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row clearfix">
                      <label class="col-sm-3 control-label">Area</label>

                      <div class="col-sm-9">
                          <div>
                            <label class="form-control">@{{user.area_name}}</label>
                          </div>
                      </div>

                    </div>
                    <div class="form-group row clearfix">
                      <label for="inputUserDireccion" class="col-sm-3 control-label">Direcci&oacute;n</label>

                      <div class="col-sm-9">
                          <div>
                                <label class="form-control">@{{user.direction_name}}</label>
                          </div>
                      </div>

                    </div>
                    <div class="form-group row clearfix">
                      <label class="col-sm-3 control-label">Track</label>

                      <div class="col-sm-9">
                          <div>
                                <label class="form-control">@{{user.track_name}}</label>
                          </div>
                      </div>

                    </div>
                    <div class="form-group row clearfix">
                      <label class="col-sm-3 control-label">Posici&oacute;n</label>

                      <div class="col-sm-9">
                        <div>
                            <label class="form-control">@{{user.position_name}}</label>
                        </div>
                      </div>

                    </div>
                    <div class="form-group row clearfix">
                      <label class="col-sm-3 control-label">Empresa</label>

                      <div class="col-sm-9">
                        <div>
                            <label class="form-control">@{{user.company_name}}</label>
                        </div>  
                      </div>

                    </div>
                    <div class="form-group row clearfix">
                      <label class="col-sm-3 control-label">Jefe Directo</label>

                      <div class="col-sm-9">
                        <div >
                            <label class="form-control">@{{user.boss_name}}</label>
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

            </form>

            </div>
            
        </uib-tab>
        
        <uib-tab heading="Equipo" ng-if="user.is_boss">
            
            <div class="panel-content">
                <div class="row">
                    <div include-with-scope="theme/modules/user/tabla_personal_a_cargo"></div>
                </div>
            </div>
            
        </uib-tab>
        
    </uib-tabset>
    
</div>