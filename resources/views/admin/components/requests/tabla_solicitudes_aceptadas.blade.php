<div class="horizontal-scroll">
  <div class="form-group select-page-size-wrap ">
    <label>Filas por p&aacute;gina
      <select class="form-control selectpicker show-tick" title="Rows on page" selectpicker
              ng-model="requests_table.tamanioTablaSolicitudesAceptadas" ng-options="i for i in [5,10,15,20,25]">
      </select>
    </label>
  </div>
  <table class="table table-hover table-condensed" st-table="requests_table.solicitudesAceptadas" st-safe-src="requests_table.aceptadas">
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
    <tr ng-repeat="sa in requests_table.solicitudesAceptadas" ng-click="showRequest(sa.id)" ng-class="{'primary': ((sa.alerta == 1) && (sa.status == 3))}" class="row-table">
      <td class="table-id">@{{sa.id}}</td>
      <td>@{{sa.folio}}</td>
      <td>@{{sa.tipo}}</td>
      <td>@{{sa.fecha}}</td>
      <td>@{{sa.colaborador}}</td>
      <td>@{{sa.autorizador}}</td>
      <td>@{{sa.dias}}</td>
      <td>@{{sa.desde}}</td>
      <td>@{{sa.hasta}}</td>
      <td>@{{sa.estado}}</td>
        <td><i ng-if="((sa.alerta == 1) && (sa.status == 3))" class="fa fa fa-bell"></i></td>
    </tr>
    </tbody>
    <tfoot>
    <tr>
      <td colspan="6" class="text-center">
        <div st-pagination="" st-items-by-page="requests_table.tamanioTablaSolicitudesAceptadas" st-displayed-pages="5"></div>
      </td>
    </tr>
    </tfoot>
  </table>
    
    <div ng-if="(requests_table.solicitudesAceptadas.length == 0) && solicitudesAceptadas_loaded" class="alert bg-warning text-center">
        <h4><i class="fa fa-exclamation-triangle"></i> Sin datos para mostrar</h4>
    </div>
    <div ng-if="(requests_table.solicitudesAceptadas.length == 0) && !solicitudesAceptadas_loaded" class="alert bg-info text-center">
        <h4><i class="fa fa-spinner fa-spin"></i> Cargando datos ...</h4>
    </div>
    
</div>