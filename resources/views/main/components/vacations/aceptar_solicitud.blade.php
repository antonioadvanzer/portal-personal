@extends('layouts.email_format')

@section('message')

    <h2>Se ha autorizado una nueva Solicitud y requiere aprobación por parte de Capital Humano</h2>
    <h4><b>Folio</b> #<b>{!! $data['id'] !!}</b></h4>
    <p><b>Solicita: </b>{!! $data['usuario'] !!}</p>
    <p><b>Autoriza: </b>{!! $data['autorizador'] !!}</p>
    <p><b>Días: </b>{!! $data['dias'] !!}</p>
    <p><b>Tipo: </b> Vacaciones </p>
    <p><b>Desde: </b>{!! $data['desde'] !!}</p>
    <p><b>Hasta: </b>{!! $data['hasta'] !!}</p>
    <p>Ingresa a <a href="{!! URL::to('/') !!}">Portal Personal >> Solicitudes</a> para darle seguimiento a la solicitud</p>

@endsection