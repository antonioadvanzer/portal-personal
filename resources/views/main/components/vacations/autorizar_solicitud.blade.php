@extends('layouts.email_format')

@section('message')

    <h2>Se ha autorizado tu Solicitud</h2>
    <h4><b>Folio</b> #<b>{!! $data['id'] !!}</b></h4>
    <p><b>Días: </b>{!! $data['dias'] !!}</p>
    <p><b>Tipo: </b> Vacaciones </p>
    <p><b>Desde: </b>{!! $data['desde'] !!}</p>
    <p><b>Hasta: </b>{!! $data['hasta'] !!}</p>
    
@endsection