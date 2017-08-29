<div class="horizontal-scroll" ng-controller="CartasYConstanciasLaboralesModuleCtrl">
  <div class="form-group select-page-size-wrap ">
    
  </div>
  <table id="solicitudesCartas" class="display table table-hover table-condensed" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Folio</th>
                <th>A Quien va Dirigida la Carta</th>
                <th>Observaciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($solicitudes as $s)
            <tr>
                <td>{{ $s->id }}</td>
                <td>{{ $s->receiver}}</td>
                <td>{{ $s->observations }}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>Folio</th>
                <th>A Quien va Dirigida la Carta</th>
                <th>Observaciones</th>
            </tr>
        </tfoot>
    </table>
</div>