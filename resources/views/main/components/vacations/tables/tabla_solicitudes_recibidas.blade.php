<div class="horizontal-scroll" ng-controller="VacacionesModuleCtrl">
  <div class="form-group select-page-size-wrap ">
    
  </div>
    <table id="solicitudesRecibidasVacaciones" class="display table table-hover table-condensed" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Folio</th>
                <th>Tipo</th>
                <th>Fecha de Solicitud</th>
                <th>Colaborador</th>
                <th>Días</th>
                <th>Desde</th>
                <th>Hasta</th>
                <th>Estado</th>
                <th> --- </th>
            </tr>
        </thead>
        <tbody>
            @foreach($solicitudes as $s)
            <tr class="{{ ($s->alert == 1) ? 'primary' : ''}}">
                <td>{{ $s->id }}</td>
                <td>{{ $s->getTypeAssociated()->first()->name }}</td>
                <td>{{ $s['created_at']->toDateTimeString() }}</td>
                <td>{{ $s->getEmployedAssociated()->first()->name }}</td>
                <td>{{ $s->dias }}</td>
                <td>{{ $s->fecha_inicio }}</td>
                <td>{{ $s->fecha_fin }}</td>
                <td>{{ $s->getStatusAssociated()->first()->name }}</td>
                <td>
                    @if($s->alert == 1)
                        <i class="fa fa fa-bell"></i>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>Folio</th>
                <th>Tipo</th>
                <th>Fecha de Solicitud</th>
                <th>Autorizador</th>
                <th>Días</th>
                <th>Desde</th>
                <th>Hasta</th>
                <th>Estado</th>
                <th> --- </th>
            </tr>
        </tfoot>
    </table>
</div>