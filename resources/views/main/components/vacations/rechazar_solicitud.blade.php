@extends('layouts.email_format')

@section('message')

    <h2>Se ha rechazado tu Solicitud</h2>
    <h4><b>Folio</b> #<b>{!! $data['id'] !!}</b></h4>
    <p><b>Autoriza: </b>{!! $data['autorizador'] !!}</p>
    <p><b>Días: </b>{!! $data['dias'] !!}</p>
    <p><b>Tipo: </b> Vacaciones </p>
    <p><b>Motivo de rechazo: </b>{!! $data['razon'] !!}</p>
    
@endsection