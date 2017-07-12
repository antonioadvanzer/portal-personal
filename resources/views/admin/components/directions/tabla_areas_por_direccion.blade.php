<div class="horizontal-scroll">
  <table class="table table-bordered">
    <thead>
    <!--<tr>
      <th class="browser-icons"></th>
      <th class="align-right"></th>
    </tr>-->
    </thead>
    <tbody>
    <tr ng-repeat="ad in formEditDirection.areasPorDireccion">
      <td ng-class="nowrap">@{{ad.name}}</td>
    </tr>
    </tbody>
  </table>
</div>