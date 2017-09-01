<div class="horizontal-scroll">
  <div class="form-group select-page-size-wrap ">
    <label>Filas por p&aacute;gina
      <select class="form-control selectpicker show-tick" title="Filas por pagina" selectpicker
              ng-model="directions_table.tamanioTablaDirecciones" ng-options="i for i in [5,10,15,20,25]">
      </select>
    </label>
  </div>
  <table class="table table-hover table-condensed" st-table="directions_table.listaDirecciones" st-safe-src="directions_table.direcciones">
    <thead>
    <tr class="sortable">
      <th class="table-id" st-sort="id" st-sort-default="true">#</th>
      <th st-sort="name">Nombre</th>
    </tr>
    <tr>
      {{--<th></th>
      <th><input st-search="name" placeholder="" class="input-sm form-control search-input"
                 type="search"/></th>--}}
  </tr>
    </thead>
    <tbody>
    <tr ng-repeat="dr in directions_table.listaDirecciones" ng-click="showDirection(dr.id)">
        <td class="table-id">@{{dr.id}}</td>
        <td>@{{dr.name}}</td>
    </tr>
    </tbody>
    <tfoot>
    <tr>
      <td colspan="6" class="text-center">
        <div st-pagination="" st-items-by-page="directions_table.tamanioTablaDirecciones" st-displayed-pages="5"></div>
      </td>
    </tr>
    </tfoot>
  </table>
</div>