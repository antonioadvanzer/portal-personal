<div class="horizontal-scroll">
  <div class="form-group select-page-size-wrap ">
    <label>Filas por p&aacute;gina
      <select class="form-control selectpicker show-tick" title="Filas por pagina" selectpicker
              ng-model="perfil.tamanioTablaPersonalACargo" ng-options="i for i in [5,10,15,20,25]">
      </select>
    </label>
  </div>
  <table class="table table-hover table-condensed" st-table="perfil.personalACargo" st-safe-src="perfil.aCargo">
    <thead>
        <th class="table-id" st-sort="id" st-sort-default="true">#</th>
        <th st-sort="name">Nombre</th>
    </thead>
    <tbody>
    <tr ng-repeat="pc in perfil.personalACargo" ng-click="showUser(pc.id)" class="row-table">
      <td>
          <a class="al-user-profile">
            <img ng-src="@{{::( pc.picture | profilePicture )}}" width="50" height="50">
          </a>
          </td>
      <td ng-class="nowrap">@{{pc.name}}</td>
    </tr>
    </tbody>
    <tfoot>
    <tr>
      <td colspan="6" class="text-center">
        <div st-pagination="" st-items-by-page="perfil.tamanioTablaPersonalACargo" st-displayed-pages="5"></div>
      </td>
    </tr>
    </tfoot>
  </table>
</div>