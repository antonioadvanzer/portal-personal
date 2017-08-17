<table class="table table-bordered">
  <thead>
    <tr>
      <th class="primary">Años</th>
      <th ng-class="{'danger': ta1 = (user.anios_trabajando == 1)}">1</th>
      <th ng-class="{'danger': ta2 = (user.anios_trabajando == 2)}">2</th>
      <th ng-class="{'danger': ta3 = (user.anios_trabajando == 3)}">3</th>
      <th ng-class="{'danger': ta4 = (user.anios_trabajando == 4)}">4</th>
      <th ng-class="{'danger': ta5 = ((user.anios_trabajando > 4) && (user.anios_trabajando < 10))}">5-9</th>
      <th ng-class="{'danger': ta6 = ((user.anios_trabajando > 9) && (user.anios_trabajando < 15))}">10-14</th>
      <th ng-class="{'danger': ta7 = ((user.anios_trabajando > 14) && (user.anios_trabajando < 20))}">15-19</th>
      <th ng-class="{'danger': ta8 = ((user.anios_trabajando > 19) && (user.anios_trabajando < 25))}">20-24</th>
      <th ng-class="{'danger': ta9 = (user.anios_trabajando >= 25)}">25-26</th>
    </tr>
  </thead>
  <tbody>
    <tr >
      <td class="primary">Dias</td>
      <td ng-class="{'danger': ta1}">6</td>
      <td ng-class="{'danger': ta2}">8</td>
      <td ng-class="{'danger': ta3}">10</td>
      <td ng-class="{'danger': ta4}">12</td>
      <td ng-class="{'danger': ta5}">14</td>
      <td ng-class="{'danger': ta6}">16</td>
      <td ng-class="{'danger': ta7}">18</td>
      <td ng-class="{'danger': ta8}">20</td>
      <td ng-class="{'danger': ta9}">22</td>
    </tr>
  </tbody>
</table>