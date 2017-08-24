<div class="horizontal-scroll">
  <div class="form-group select-page-size-wrap ">
    <label>Filas por p&aacute;gina
      <select class="form-control selectpicker show-tick" title="Rows on page" selectpicker
              ng-model="requests_table.tamanioTablaSolicitudesCanceladas" ng-options="i for i in [5,10,15,20,25]">
      </select>
    </label>
  </div>
  <table class="table table-hover table-condensed" st-table="requests_table.solicitudesCanceladas">
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
    <tr ng-repeat="sc in requests_table.solicitudesCanceladas" ng-click="showRequest(sc.id)" ng-class="{'primary': ((sc.alerta == 1) && (sc.status == 3))}">
      <td class="table-id">@{{sc.id}}</td>
      <td>@{{sc.folio}}</td>
      <td>@{{sc.tipo}}</td>
      <td>@{{sc.fecha}}</td>
      <td>@{{sc.colaborador}}</td>
      <td>@{{sc.autorizador}}</td>
      <td>@{{sc.dias}}</td>
      <td>@{{sc.desde}}</td>
      <td>@{{sc.hasta}}</td>
      <td>@{{sc.estado}}</td>
        <td><i ng-if="((sc.alerta == 1) && (sc.status == 3))" class="fa fa fa-bell"></i></td>
    </tr>
    </tbody>
    <tfoot>
    <tr>
      <td colspan="6" class="text-center">
        <div st-pagination="" st-items-by-page="requests_table.tamanioTablaSolicitudesCanceladas" st-displayed-pages="5"></div>
      </td>
    </tr>
    </tfoot>
  </table>
</div>