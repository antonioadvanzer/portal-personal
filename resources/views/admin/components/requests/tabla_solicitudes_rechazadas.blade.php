<div class="horizontal-scroll">
  <div class="form-group select-page-size-wrap ">
    <label>Filas por p&aacute;gina
      <select class="form-control selectpicker show-tick" title="Rows on page" selectpicker
              ng-model="requests_table.tamanioTablaSolicitudesRechazadas" ng-options="i for i in [5,10,15,20,25]">
      </select>
    </label>
  </div>
  <table class="table table-hover table-condensed" st-table="requests_table.solicitudesRechazadas" st-safe-src="requests_table.rechazadas">
    <thead>
    <tr class="sortable ">
      <th class="table-id" st-sort="id" st-sort-default="false">#</th>
      <th st-sort="folio">Folio</th>
      <th st-sort="tipo">Tipo</th>
      <th st-sort="fecha">Fecha de Solicitud</th>
      <th st-sort="colabordor">Colaborador</th>
      <th st-sort="autorizador">Autorizador</th>
      <th st-sort="dias">Días</th>
      <th st-sort="desde">Desde</th>
      <th st-sort="hasta">Hasta</th>
      <th st-sort="estado">Estado</th>
      <th st-sort="alerta"> --- </th>
    </tr>
    {{--<!--<tr>
      <th></th>
      <th><input st-search="firstName" placeholder="Search First Name" class="input-sm form-control search-input"
                 type="search"/></th>
      <th><input st-search="lastName" placeholder="Search Last Name" class="input-sm form-control search-input"
                 type="search"/></th>
      <th><input st-search="username" placeholder="Search Username" class="input-sm form-control search-input"
                 type="search"/></th>
      <th><input st-search="email" placeholder="Search Email" class="input-sm form-control search-input" type="search"/>
      </th>
      <th><input st-search="age" placeholder="Search Age" class="input-sm form-control search-input" type="search"/>
      </th>
    </tr>-->--}}
    </thead>
    <tbody>
    <tr ng-repeat="sr in requests_table.solicitudesRechazadas" ng-click="showRequest(sr.id)" ng-class="{'primary': ((sr.alerta == 1) && (sr.status == 3))}" class="row-table">
      <td class="table-id">@{{sr.id}}</td>
      <td>@{{sr.folio}}</td>
      <td>@{{sr.tipo}}</td>
      <td>@{{sr.fecha}}</td>
      <td>@{{sr.colaborador}}</td>
      <td>@{{sr.autorizador}}</td>
      <td>@{{sr.dias}}</td>
      <td>@{{sr.desde}}</td>
      <td>@{{sr.hasta}}</td>
      <td>@{{sr.estado}}</td>
        <td><i ng-if="((sr.alerta == 1) && (sr.status == 3))" class="fa fa fa-bell"></i></td>
    </tr>
    </tbody>
    <tfoot>
    <tr>
      <td colspan="6" class="text-center">
        <div st-pagination="" st-items-by-page="requests_table.tamanioTablaSolicitudesRechazadas" st-displayed-pages="5"></div>
      </td>
    </tr>
    </tfoot>
  </table>
    
    <div ng-if="(requests_table.solicitudesRechazadas.length == 0) && solicitudesRechazadas_loaded" class="alert bg-warning text-center">
        <h4><i class="fa fa-exclamation-triangle"></i> Sin datos para mostrar</h4>
    </div>
    <div ng-if="(requests_table.solicitudesRechazadas.length == 0) && !solicitudesRechazadas_loaded" class="alert bg-info text-center">
        <h4><i class="fa fa-spinner fa-spin"></i> Cargando datos ...</h4>
    </div>
    
</div>