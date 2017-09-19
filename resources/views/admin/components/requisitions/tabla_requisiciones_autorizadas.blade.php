<div class="horizontal-scroll">
  <div class="form-group select-page-size-wrap ">
    <label>Filas por p&aacute;gina
      <select class="form-control selectpicker show-tick" title="Rows on page" selectpicker
              ng-model="requisitions_table.tamanioTablaRequisicionesAutorizadas" ng-options="i for i in [5,10,15,20,25]">
      </select>
    </label>
  </div>
  <table class="table table-hover table-condensed" st-table="requisitions_table.requisicionesAutorizadas" st-safe-src="requisitions_table.autorizadas">
    <thead>
    <tr class="sortable ">
      <th class="table-id" st-sort="id" st-sort-default="false">#</th>
      <th st-sort="folio">Folio</th>
      <th st-sort="fecha">Fecha de Solicitud</th>
      <th st-sort="solicita">Solicita</th>
      <th st-sort="director">Director de Area</th>
      <th st-sort="autorizador">Autorizador</th>
      <th st-sort="proyecto">Proyecto</th>
      <th st-sort="track">Track</th>
      <th st-sort="posicion">Posici&oacute;n</th>
      <th st-sort="area">Area</th>
      <th st-sort="empresa">Empresa</th>
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
    <tr ng-repeat="sl in requisitions_table.requisicionesAutorizadas" ng-click="showRequisitionDetail(sl.id)" ng-class="{'primary': ((sl.alerta == 1) && (sl.status == 4))}" class="row-table">
      <td class="table-id">@{{sl.id}}</td>
      <td>@{{sl.folio}}</td>
      <td>@{{sl.fecha}}</td>
      <td>@{{sl.solicita}}</td>
      <td>@{{sl.director}}</td>
      <td>@{{sl.autorizador}}</td>
      <td>@{{sl.proyecto}}</td>
      <td>@{{sl.track}}</td>
      <td>@{{sl.posicion}}</td>
      <td>@{{sl.area}}</td>
      <td>@{{sl.empresa}}</td>
      <td>@{{sl.estado}}</td>
        <td><i ng-if="((sl.alerta == 1) && (sl.status == 4))" class="fa fa fa-bell"></i></td>
    </tr>
    </tbody>
    <tfoot>
    <tr>
      <td colspan="6" class="text-center">
        <div st-pagination="" st-items-by-page="requisitions_table.tamanioTablaRequisicionesAutorizadas" st-displayed-pages="5"></div>
      </td>
    </tr>
    </tfoot>
  </table>
    
    <div ng-if="(requisitions_table.requisicionesAutorizadas.length == 0) && requisicionesAutorizadas_loaded" class="alert bg-warning text-center">
        <h4><i class="fa fa-exclamation-triangle"></i> Sin datos para mostrar</h4>
    </div>
    <div ng-if="(requisitions_table.requisicionesAutorizadas.length == 0) && !requisicionesAutorizadas_loaded" class="alert bg-info text-center">
        <h4><i class="fa fa-spinner fa-spin"></i> Cargando datos ...</h4>
    </div>
    
</div>