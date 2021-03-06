<div class="horizontal-scroll">
  <div class="form-group select-page-size-wrap ">
    <label>Filas por p&aacute;gina
      <select class="form-control selectpicker show-tick" title="Rows on page" selectpicker
              ng-model="requests_table.tamanioTablaSolicitudesEnviadas" ng-options="i for i in [5,10,15,20,25]">
      </select>
    </label>
  </div>
  <table class="table table-hover table-condensed" st-table="requests_table.solicitudesEnviadas" st-safe-src="requests_table.enviadas">
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
    <tr ng-repeat="se in requests_table.solicitudesEnviadas" ng-click="showRequest(se.id)" ng-class="{'primary': ((se.alerta == 1) && (se.status == 3))}" class="row-table">
      <td class="table-id">@{{se.id}}</td>
      <td>@{{se.folio}}</td>
      <td>@{{se.tipo}}</td>
      <td>@{{se.fecha}}</td>
      <td>@{{se.colaborador}}</td>
      <td>@{{se.autorizador}}</td>
      <td>@{{se.dias}}</td>
      <td>@{{se.desde}}</td>
      <td>@{{se.hasta}}</td>
      <td>@{{se.estado}}</td>
        <td><i ng-if="((se.alerta == 1) && (se.status == 3))" class="fa fa fa-bell"></i></td>
    </tr>
    </tbody>
    <tfoot>
    <tr>
      <td colspan="6" class="text-center">
        <div st-pagination="" st-items-by-page="requests_table.tamanioTablaSolicitudesEnviadas" st-displayed-pages="5"></div>
      </td>
    </tr>
    </tfoot>
  </table>
    
    <div ng-if="(requests_table.solicitudesEnviadas.length == 0) && solicitudesEnviadas_loaded" class="alert bg-warning text-center">
        <h4><i class="fa fa-exclamation-triangle"></i> Sin datos para mostrar</h4>
    </div>
    <div ng-if="(requests_table.solicitudesEnviadas.length == 0) && !solicitudesEnviadas_loaded" class="alert bg-info text-center">
        <h4><i class="fa fa-spinner fa-spin"></i> Cargando datos ...</h4>
    </div>
    
</div>