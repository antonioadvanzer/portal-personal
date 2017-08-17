<div class="horizontal-scroll">
  <table class="table table-bordered">
    <thead>
    <!--<tr>
      <th class="browser-icons"></th>
      <th class="align-right"></th>
    </tr>-->
    </thead>
    <tbody>
    <tr ng-repeat="pc in personalACargo">
      <td><img ng-src="@{{::( pc.picture | profilePicture )}}" width="50" height="50"></td>
      <td ng-class="nowrap">@{{pc.name}}</td>
    </tr>
    </tbody>
  </table>
</div>