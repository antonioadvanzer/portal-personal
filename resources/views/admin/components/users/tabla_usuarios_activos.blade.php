<div class="horizontal-scroll">
  <div class="form-group select-page-size-wrap ">
    <label>Filas por p&aacute;gina
      <select class="form-control selectpicker show-tick" title="Filas por pagina" selectpicker
              ng-model="users_table.tamanioTablaEmpleadosActivos" ng-options="i for i in [5,10,15,20,25]">
      </select>
    </label>
  </div>
  <table class="table table-hover table-condensed" st-table="users_table.empleadosActivos" st-safe-src="users_table.activos">
    <thead>
    <tr class="sortable ">
      <th class="table-id" st-sort="id" st-sort-default="true">#</th>
      <th st-sort="nomina">N&oacute;mina</th>
        <th st-sort="nombre">Nombre</th>
      <th st-sort="email">E-Mail</th>
      <th st-sort="empresa">Empresa</th>
        <th st-sort="track">Track</th>
        <th st-sort="posicion">Posici&oacute;n</th>
        <th st-sort="area">&Aacute;rea</th>
        <th st-sort="plaza">Plaza</th>
    </tr>
    <tr>
      <th></th>
      <th><input st-search="nomina" placeholder="" class="input-sm form-control search-input"
                 type="search"/></th>
      <th><input st-search="nombre" placeholder="" class="input-sm form-control search-input"
                 type="search"/></th>
      <th><input st-search="email" placeholder="" class="input-sm form-control search-input"
                 type="search"/></th>
      <th><input st-search="empresa" placeholder="" class="input-sm form-control search-input" type="search"/>
      </th>
      <th><input st-search="track" placeholder="" class="input-sm form-control search-input" type="search"/>
      </th>
        <th><input st-search="posicion" placeholder="" class="input-sm form-control search-input" type="search"/>
      </th>
        <th><input st-search="area" placeholder="" class="input-sm form-control search-input" type="search"/>
      </th>
        <th><input st-search="plaza" placeholder="" class="input-sm form-control search-input" type="search"/>
      </th>
    </tr>
    </thead>
    <tbody>
    <tr ng-repeat="ea in users_table.empleadosActivos" ng-click="showUser(ea.id)">
        <td class="table-id">@{{ea.id}}</td>
        <td>@{{ea.nomina}}</td>
        <td>@{{ea.nombre}}</td>
        <td>@{{ea.email}}</td>
        <td>@{{ea.empresa}}</td>
        <td>@{{ea.track}}</td>
        <td>@{{ea.posicion}}</td>
        <td>@{{ea.area}}</td>
        <td>@{{ea.plaza}}</td>
    </tr>
    </tbody>
    <tfoot>
    <tr>
      <td colspan="6" class="text-center">
        <div st-pagination="" st-items-by-page="users_table.tamanioTablaEmpleadosActivos" st-displayed-pages="5"></div>
      </td>
    </tr>
    </tfoot>
  </table>
</div>