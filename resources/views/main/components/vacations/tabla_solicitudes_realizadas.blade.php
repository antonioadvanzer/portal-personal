<div class="row">
        <div class="col-md-6">
            <div class="input-group">
                <button type="button" class="btn btn-info btn-with-icon " ng-click="goBack()">
                  <i class="ion-arrow-return-left"></i>Regresar
                </button>
            </div>
        </div>
    </div>
<div class="horizontal-scroll">
  <div class="form-group select-page-size-wrap ">
    <label>Filas por p&aacute;gina
      <select class="form-control selectpicker show-tick" title="Rows on page" selectpicker
              ng-model="vacations_table.tamanioTablaSolicitudesRealizadas" ng-options="i for i in [5,10,15,20,25]">
      </select>
    </label>
  </div>
  <table class="table table-hover table-condensed" st-table="vacations_table.solicitudesPropias" st-safe-src="vacations_table.propias">
    <thead>
    <tr class="sortable ">
      <th class="table-id" st-sort="id" st-sort-default="false">#</th>
      <th st-sort="folio">Folio</th>
      <th st-sort="tipo">Tipo</th>
      <th st-sort="fecha">Fecha de Solicitud</th>
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
    <tr ng-repeat="sl in vacations_table.solicitudesPropias" ng-click="showOwnRequest(sl.id)" ng-class="{'primary': ((sl.alerta == 1) && ((sl.status == 1) || (sl.status == 4) || (sl.status == 5)))}" class="row-table">
      <td class="table-id">@{{sl.id}}</td>
      <td>@{{sl.folio}}</td>
      <td>@{{sl.tipo}}</td>
      <td>@{{sl.fecha}}</td>
      <td>@{{sl.autorizador}}</td>
      <td>@{{sl.dias}}</td>
      <td>@{{sl.desde}}</td>
      <td>@{{sl.hasta}}</td>
      <td>@{{sl.estado}}</td>
        <td><i ng-if="((sl.alerta == 1) && ((sl.status == 1) || (sl.status == 4) || (sl.status == 5)))" class="fa fa fa-bell"></i></td>
    </tr>
    </tbody>
    <tfoot>
    <tr>
      <td colspan="6" class="text-center">
        <div st-pagination="" st-items-by-page="vacations_table.tamanioTablaSolicitudesRealizadas" st-displayed-pages="5"></div>
      </td>
    </tr>
    </tfoot>
  </table>

    <div ng-if="(vacations_table.solicitudesPropias.length == 0) && solicitudesPropias_loaded" class="alert bg-warning text-center">
        <h4><i class="fa fa-exclamation-triangle"></i> Sin datos para mostrar</h4>
    </div>
    <div ng-if="(vacations_table.solicitudesPropias.length == 0) && !solicitudesPropias_loaded" class="alert bg-info text-center">
        <h4><i class="fa fa-spinner fa-spin"></i> Cargando datos ...</h4>
    </div>
    
</div>