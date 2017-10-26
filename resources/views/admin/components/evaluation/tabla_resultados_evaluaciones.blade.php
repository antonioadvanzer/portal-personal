<div class="horizontal-scroll">
  <div class="form-group select-page-size-wrap ">
    <label>Filas por p&aacute;gina
      <select class="form-control selectpicker show-tick" title="Filas por pagina" selectpicker
              ng-model="evaluaciones_table.tamanioTablaResultadosEvaluaciones" ng-options="i for i in [5,10,15,20,25]">
      </select>
    </label>
  </div>
  <table class="table table-hover table-condensed" st-table="evaluaciones_table.resultadosEvaluaciones" st-safe-src="evaluaciones_table.resultados">
    <thead>
    <tr class="sortable ">
      <th class="table-id" st-sort="id" st-sort-default="true">#</th>
      <th st-sort="nombre">Nombre</th>
      <th st-sort="email">Rating</th>
      <th st-sort="empresa">Total</th>
        <th st-sort="track">Competencias</th>
        <th st-sort="posicion">Responsabilidades</th>
        <th st-sort="area">Feedback</th>
    </tr>
    <tr>
      <th></th>
      <th><input st-search="nombre" placeholder="" class="input-sm form-control search-input"
                 type="search"/></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <tr ng-repeat="re in evaluaciones_table.resultadosEvaluaciones" ng-click="showResultado(re.id)" class="row-table">
        <!--<td class="table-id">@{{ea.id}}</td>-->
        <!--<td class="table-id">
            <a class="al-user-profile"><img ng-src="@{{::( re.photo | profilePicture:re.photo_ext )}}"></a>
        </td>-->
        <td class="table-id">
            <a class="al-user-profile"><img ng-src="@{{::( re.photo | profilePicture:re.photo_ext )}}"></a>
        </td>
        <td>@{{ re.nombre + ' ' + re.apellido_paterno + ' (' + re.posicion + ' - ' + re.track + ')' }}</td>
        <td>@{{re.rating}}</td>
        <td>@{{re.nf_total}}</td>
        <td>
            <table class="table table-bordered">
              <thead>
                <tr class="primary">
                  <th>Resultados</th>
                  <th>Auto</th>
                  <th>Anual</th>
                  <th>360</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
              </tbody>
            </table>
        </td>
        <td>
            <table class="table table-bordered">
              <thead>
                <tr class="primary">
                  <th>Resultados</th>
                  <th>Anual</th>
                  <th>Proyecto</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
              </tbody>
            </table>
        </td>
        <td>@{{re.feedback}}</td>
    </tr>
    </tbody>
    <tfoot>
    <tr>
      <td colspan="6" class="text-center">
        <div st-pagination="" st-items-by-page="evaluaciones_table.tamanioTablaResultadosEvaluaciones" st-displayed-pages="5"></div>
      </td>
    </tr>
    </tfoot>
  </table>
    
    <div ng-if="(evaluaciones_table.resultadosEvaluaciones.length == 0) && resultadosEvaluaciones_loaded" class="alert bg-warning text-center">
        <h4><i class="fa fa-exclamation-triangle"></i> Sin datos para mostrar</h4>
    </div>
    <div ng-if="(evaluaciones_table.resultadosEvaluaciones.length == 0) && !resultadosEvaluaciones_loaded" class="alert bg-info text-center">
        <h4><i class="fa fa-spinner fa-spin"></i> Cargando datos ...</h4>
    </div>
    
</div>