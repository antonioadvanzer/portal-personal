<div class="horizontal-scroll">
  <table class="table table-bordered">
    <thead>
    <!--<tr>
      <th class="browser-icons"></th>
      <th class="align-right"></th>
    </tr>-->
    </thead>
    <tbody>
    <tr ng-repeat="pt in formEditTrack.posicionesPorTrack">
      <td ng-class="nowrap">@{{pt.name}}</td>
    </tr>
    </tbody>
  </table>
</div>