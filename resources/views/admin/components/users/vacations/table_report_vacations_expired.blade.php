<table class="table table-bordered">
  <thead>
    <tr class="primary">
      <th>Fecha</th>
      <th>D&iacute;as</th>
      <th>Vencen</th>
      <th>Disfrutados</th>
      <th>Saldo Acumulado</th>
      <th>Status</th>
    </tr>
  </thead>
  <tbody>
    <tr ng-repeat="vd in vacations_table.vacations_days_expired">
        <td>@{{vd.fecha}}</td>
        <td>@{{vd.dias}}</td>
        <td>@{{vd.vencen}}</td>
        <td>@{{vd.disfrutados}}</td>
        <td>@{{vd.saldo}}</td>
        <td>@{{vd.status}}</td>
      
    </tr>
  </tbody>
</table>