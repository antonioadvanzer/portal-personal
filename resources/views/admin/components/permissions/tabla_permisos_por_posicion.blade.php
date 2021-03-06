<div class="horizontal-scroll">
  <div class="form-group select-page-size-wrap ">
    <label>Filas por p&aacute;gina
      <select class="form-control selectpicker show-tick" title="Filas por pagina" selectpicker
              ng-model="permissions_table.tamanioTablaPermisosPorPosicion" ng-options="i for i in [5,10,15,20,25]">
      </select>
    </label>
  </div>
  <table class="table" st-table="permissions_table.listaPermisosPorPosicion" st-safe-src="permissions_table.permisosPorPosicion">
    <thead>
    <tr class="sortable ">
      <th class="table-id" st-sort="id" st-sort-default="true">#</th>
      <th st-sort="name">Nombre</th>
      <th st-sort="permissions">Permisos</th>
      
    </tr>
    <tr>
      {{--<th></th>
      <th><input st-search="name" placeholder="" class="input-sm form-control search-input"
                 type="search"/></th>
      <th><input st-search="description" placeholder="" class="input-sm form-control search-input"
                 type="search"/></th>
      <th><input st-search="access" placeholder="" class="input-sm form-control search-input"
                 type="search"/></th>--}}
  </tr>
    </thead>
    <tbody>
    <tr ng-repeat="lpa in permissions_table.listaPermisosPorPosicion">
        <td class="table-id">@{{lpa.id}}</td>
        <td>@{{lpa.name}}</td>
        <td ng-bind-html="lpa.permissions">{{--@{{lpa.permissions}}--}}</td>
    </tr>
    </tbody>
    <tfoot>
    <tr>
      <td colspan="6" class="text-center">
        <div st-pagination="" st-items-by-page="permissions_table.tamanioTablaPermisosPorPosicion" st-displayed-pages="5"></div>
      </td>
    </tr>
    </tfoot>
  </table>
    
    <div ng-if="!permissions_table.listaPermisosPorPosicion.length" class="alert bg-warning text-center">
        <h4>Sin datos para mostrar</h4>
    </div>
    
</div>