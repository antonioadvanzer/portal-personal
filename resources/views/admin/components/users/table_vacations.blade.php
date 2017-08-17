<table class="table table-bordered">
  <thead>
    <tr class="primary">
      <th>Tipo</th>
      <th>Dias</th>
      <th>Expiraci&oacute;n</th>
    </tr>
  </thead>
  <tbody>
    <tr ng-repeat="vd in vacations_table.vacations_days">
      <td>@{{vd.type}}</td>
      <td>@{{vd.days}}</td>
      <td>@{{vd.days == 0 ? " ": vd.expire}}</td>
    </tr>
  </tbody>
</table>