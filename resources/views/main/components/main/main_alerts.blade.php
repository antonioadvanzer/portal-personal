<div class="row">
  
  <div class="col-md-6 col-lg-4" ng-if="notification.cant_vacations_sended > 0">
    <div class="panel panel-primary contextual-main-panel bootstrap-panel">
      <div class="panel-heading">Solicitudes de Vacaciones Enviadas</div>
      <div class="panel-body">
          <h2>@{{notification.cant_vacations_sended}}</h2>
          Pendientes de revisar
          <br><br>
          <a href="#/sevicios/vacaciones/solicitudes_realizadas" class="btn btn-primary btn-with-icon"><i class="ion-ios-search-strong"></i>Ir</a>
        </div>
    </div>
  </div>
    
  <div class="col-md-6 col-lg-4" ng-if="notification.cant_absences_sended > 0">
    <div class="panel panel-primary contextual-main-panel bootstrap-panel">
      <div class="panel-heading">Solicitudes de Permisos de Ausencia Enviadas</div>
      <div class="panel-body">
          <h2>@{{notification.cant_absences_sended}}</h2>
          Pendientes de revisar
          <br><br>
          <a href="#/sevicios/permisos_de_ausencia/solicitudes_realizadas" class="btn btn-primary btn-with-icon"><i class="ion-ios-search-strong"></i>Ir</a>
        </div>
    </div>
  </div>

  <div class="col-md-6 col-lg-4" ng-if="notification.cant_requisitions_sended > 0">
    <div class="panel panel-primary contextual-main-panel bootstrap-panel">
      <div class="panel-heading">Requisiciones Enviadas</div>
      <div class="panel-body">
          <h2>@{{notification.cant_requisitions_sended}}</h2>
          Pendientes de revisar
          <br><br>
          <a href="#/requisiciones/solicitudes_realizadas" class="btn btn-primary btn-with-icon"><i class="ion-ios-search-strong"></i>Ir</a>
        </div>
    </div>
  </div>

  <div class="col-md-6 col-lg-4" ng-if="notification.cant_vacations_received > 0">
    <div class="panel panel-primary contextual-main-panel bootstrap-panel">
      <div class="panel-heading">Solicitudes de Vacaciones Recibidas</div>
      <div class="panel-body">
          <h2>@{{notification.cant_vacations_received}}</h2>
          Pendientes de aprobar
          <br><br>
          <a href="#/sevicios/vacaciones/solicitudes_recibidas" class="btn btn-primary btn-with-icon"><i class="ion-ios-search-strong"></i>Ir</a>
        </div>
    </div>
  </div>
    
  <div class="col-md-6 col-lg-4" ng-if="notification.cant_absences_received > 0">
    <div class="panel panel-primary contextual-main-panel bootstrap-panel">
      <div class="panel-heading">Solicitudes de Permisos de Ausencia Recibidas</div>
      <div class="panel-body">
          <h2>@{{notification.cant_absences_received}}</h2>
          Pendientes de aprobar
          <br><br>
          <a href="#/sevicios/permisos_de_ausencia/solicitudes_recibidas" class="btn btn-primary btn-with-icon"><i class="ion-ios-search-strong"></i>Ir</a>
        </div>
    </div>
  </div>
    
  <div class="col-md-6 col-lg-4" ng-if="notification.cant_requisitions_received > 0">
    <div class="panel panel-primary contextual-main-panel bootstrap-panel">
      <div class="panel-heading">Requisiciones Recibidas</div>
      <div class="panel-body">
          <h2>@{{notification.cant_requisitions_received}}</h2>
          Pendientes de autorizar
          <br><br>
          <a href="#/requisiciones/solicitudes_recibidas" class="btn btn-primary btn-with-icon"><i class="ion-ios-search-strong"></i>Ir</a>
        </div>
    </div>
  </div>

</div>