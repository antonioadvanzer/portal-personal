<ul class="al-msg-center clearfix">
  <!--<li uib-dropdown>
    <a href uib-dropdown-toggle>
      <i class="fa fa-bell-o"></i><span>2</span>

      <div class="notification-ring"></div>
    </a>

    <div uib-dropdown-menu class="top-dropdown-menu">
      <i class="dropdown-arr"></i>

      <div class="header clearfix">
        <strong>Notificaciones</strong>
        <a href>Marcar todos como leidos</a>
        <a href>Ajustes</a>
      </div>
      <div class="msg-list">
        <a href class="clearfix" ng-repeat="msg in notifications">
          <div class="img-area"><img ng-class="{'photo-msg-item' : !msg.image}" ng-src="@{{::( msg.image ||  (users[msg.userId].name | profilePicture) )}}"></div>
          <div class="msg-area">
            <div ng-bind-html="getMessage(msg)"></div>
            <span>@{{ msg.time }}</span>
          </div>
        </a>
      </div>
      <a href>Ver todad las notificaciones</a>
    </div>
  </li>-->
  <!--<li uib-dropdown>
    <a href class="msg" uib-dropdown-toggle>
      <i class="fa fa-envelope-o"></i><span>5</span>
      <div class="notification-ring"></div>
    </a>
    <div uib-dropdown-menu class="top-dropdown-menu">
      <i class="dropdown-arr"></i>
      <div class="header clearfix">
        <strong>Mensajes</strong>
        <a href>Marcar todos como leidos</a>
        <a href>Ajustes</a>
      </div>
      <div class="msg-list">
        <a href class="clearfix" ng-repeat="msg in messages">
          <div class="img-area"><img class="photo-msg-item" ng-src="@{{::( users[msg.userId].name | profilePicture )}}"></div>
          <div class="msg-area">
            <div>@{{ msg.text }}</div>
            <span>@{{ msg.time }}</span>
          </div>
        </a>
      </div>
      <a href>Ver todos los mensajes</a>
    </div>
  </li>-->
      <li uib-dropdown ng-if="notification.cant_vacations_received > 0">
    <!--<a href="#/sevicios/vacaciones/solicitudes_recibidas" class="msg" uib-dropdown-toggle>-->
      <a href="#/vacaciones/solicitudes" class="msg" >
      <i class="fa fa-plane"></i><span>@{{notification.cant_vacations_received}}</span>

      <div class="notification-ring"></div>
    </a>
  </li>
  <li uib-dropdown ng-if="notification.cant_absences_received > 0">
    <!--<a href="#/sevicios/permisos_de_ausencia/solicitudes_recibidas" class="msg" uib-dropdown-toggle>-->
      <a href="#/permisos_de_ausencia/solicitudes" class="msg" >
      <i class="fa fa-hourglass-start"></i><span>@{{notification.cant_absences_received}}</span>

      <div class="notification-ring"></div>
    </a>
  </li>
  <li uib-dropdown ng-if="notification.cant_requisitions_received > 0">
    <!--<a href="#/requisiciones/solicitudes_recibidas" class="msg" uib-dropdown-toggle>-->
      <a href="#/requisiciones/requisiciones" class="msg" >
      <i class="fa fa-file-text-o"></i><span>@{{notification.cant_requisitions_received}}</span>

      <div class="notification-ring"></div>
    </a>
  </li>
</ul>