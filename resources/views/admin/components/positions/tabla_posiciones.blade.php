<div class="horizontal-scroll">
  <div class="form-group select-page-size-wrap ">
    <label>Filas por pagina
      <select class="form-control selectpicker show-tick" title="Filas por pagina" selectpicker
              ng-model="tamanioTablaPosiciones" ng-options="i for i in [5,10,15,20,25]">
      </select>
    </label>
  </div>
  <table class="table table-hover table-condensed" st-table="listaPosiciones">
    <thead>
    <tr class="sortable ">
      <th class="table-id" st-sort="id" st-sort-default="true">#</th>
      <th st-sort="name">Nombre</th>
      <th st-sort="direction">Nivel en Organigrama</th>
    </tr>
    <tr>
      {{--<th></th>
      <th><input st-search="name" placeholder="" class="input-sm form-control search-input"
                 type="search"/></th>--}}
  </tr>
    </thead>
    <tbody>
    <tr ng-repeat="pn in listaPosiciones" ng-click="showPosition(pn.id)">
        <td class="table-id">@{{pn.id}}</td>
        <td>@{{pn.name}}</td>
        <td>@{{pn.level}}</td>
    </tr>
    </tbody>
    <tfoot>
    <tr>
      <td colspan="6" class="text-center">
        <div st-pagination="" st-items-by-page="tamanioTablaPosiciones" st-displayed-pages="5"></div>
      </td>
    </tr>
    </tfoot>
  </table>
</div>