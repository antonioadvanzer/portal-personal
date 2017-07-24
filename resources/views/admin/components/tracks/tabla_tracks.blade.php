<div class="horizontal-scroll">
  <div class="form-group select-page-size-wrap ">
    <label>Filas por pagina
      <select class="form-control selectpicker show-tick" title="Filas por pagina" selectpicker
              ng-model="tamanioTablaTracks" ng-options="i for i in [5,10,15,20,25]">
      </select>
    </label>
  </div>
  <table class="table table-hover table-condensed" st-table="listaTracks">
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
    <tr ng-repeat="tr in listaTracks" ng-click="showTrack(tr.id)">
        <td class="table-id">@{{tr.id}}</td>
        <td>@{{tr.name}}</td>
    </tr>
    </tbody>
    <tfoot>
    <tr>
      <td colspan="6" class="text-center">
        <div st-pagination="" st-items-by-page="tamanioTablaTracks" st-displayed-pages="5"></div>
      </td>
    </tr>
    </tfoot>
  </table>
</div>