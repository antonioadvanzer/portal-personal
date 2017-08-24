<div class="horizontal-scroll">
  <div class="form-group select-page-size-wrap ">
    <label>Filas por p&aacute;gina
      <select class="form-control selectpicker show-tick" title="Filas por pagina" selectpicker
              ng-model="positions_table.tamanioTablaPosiciones" ng-options="i for i in [5,10,15,20,25]">
      </select>
    </label>
  </div>
  <table class="table table-hover table-condensed" st-table="positions_table.listaPosiciones">
    <thead>
    <tr class="sortable ">
      <th class="table-id" st-sort="id" st-sort-default="true">#</th>
      <th st-sort="name">Nombre</th>
      <th st-sort="level">Nivel en Organigrama</th>
    </tr>
    <tr>
      {{--<th></th>
      <th><input st-search="name" placeholder="" class="input-sm form-control search-input"
                 type="search"/></th>--}}
  </tr>
    </thead>
    <tbody>
    <tr ng-repeat="pn in positions_table.listaPosiciones" ng-click="showPosition(pn.id)">
        <td class="table-id">@{{pn.id}}</td>
        <td>@{{pn.name}}</td>
        <td>@{{pn.level}}</td>
    </tr>
    </tbody>
    <tfoot>
    <tr>
      <td colspan="6" class="text-center">
        <div st-pagination="" st-items-by-page="positions_table.tamanioTablaPosiciones" st-displayed-pages="5"></div>
      </td>
    </tr>
    </tfoot>
  </table>
</div>