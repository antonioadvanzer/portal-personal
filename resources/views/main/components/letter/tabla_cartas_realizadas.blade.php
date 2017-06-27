<div class="horizontal-scroll">
  <div class="form-group select-page-size-wrap ">
    <label>Filas por pagina
      <select class="form-control selectpicker show-tick" title="Rows on page" selectpicker
              ng-model="tamanioTablaSolicitudes" ng-options="i for i in [5,10,15,20,25]">
      </select>
    </label>
  </div>
  <table class="table table-hover table-condensed" st-table="solicitudesPropias">
    <thead>
    <tr class="sortable ">
      <th class="table-id" st-sort="id" st-sort-default="false">#</th>
      <th st-sort="folio">Folio</th>
      <th st-sort="dirigido">A Quien va Dirigida la Carta</th>
      <th st-sort="observaciones">Observaciones</th>
    </tr>
    <!--<tr>
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
    </tr>-->
    </thead>
    <tbody>
    <tr ng-repeat="sl in solicitudesPropias" ng-click="showLetterDetail(sl.id)">
      <td class="table-id">@{{sl.id}}</td>
      <td>@{{sl.folio}}</td>
      <td>@{{sl.dirigido}}</td>
      <td>@{{sl.observaciones}}</td>
    </tr>
    </tbody>
    <tfoot>
    <tr>
      <td colspan="6" class="text-center">
        <div st-pagination="" st-items-by-page="tamanioTablaSolicitudes" st-displayed-pages="5"></div>
      </td>
    </tr>
    </tfoot>
  </table>
</div>