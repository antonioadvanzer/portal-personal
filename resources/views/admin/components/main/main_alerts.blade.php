<h2></h2>
<div class="row">
  
  <div class="col-md-6 col-lg-4">
    <div class="panel panel-primary contextual-main-panel bootstrap-panel">
      <div class="panel-heading">Solicitudes de Vacaciones</div>
      <div class="panel-body">
          <h2>@{{notification.cant_vacations_received}}</h2>
          Pendientes de aprobar
          <br><br>
          <a href="#/vacaciones/solicitudes" class="btn btn-primary btn-with-icon"><i class="ion-ios-search-strong"></i>Ir</a>
        </div>
    </div>
  </div>
    
  <div class="col-md-6 col-lg-4">
    <div class="panel panel-primary contextual-main-panel bootstrap-panel">
      <div class="panel-heading">Solicitudes de Permisos de Ausencia</div>
      <div class="panel-body">
          <h2>@{{notification.cant_absences_received}}</h2>
          Pendientes de aprobar
          <br><br>
          <a href="#/permisos_de_ausencia/solicitudes" class="btn btn-primary btn-with-icon"><i class="ion-ios-search-strong"></i>Ir</a>
        </div>
    </div>
  </div>

  <div class="col-md-6 col-lg-4">
    <div class="panel panel-primary contextual-main-panel bootstrap-panel">
      <div class="panel-heading">Requisiciones</div>
      <div class="panel-body">
          <h2>@{{notification.cant_requisitions_received}}</h2>
          Pendientes de revisar
          <br><br>
          <a href="#/requisiciones/requisiciones" class="btn btn-primary btn-with-icon"><i class="ion-ios-search-strong"></i>Ir</a>
        </div>
    </div>
  </div>

</div>