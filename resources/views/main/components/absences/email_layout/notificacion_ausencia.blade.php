@extends('layouts.email_format')

@section('message')

<h2>Notificación de Ausencia</h2>

<p><b>{!! $data['usuario'] !!}</b> ha registrado una <b>Solicitud de Permiso de Ausencia</b> con Folio #<b>{!! $data['id'] !!}</b> en la que solicitó <b>{!! $data['dias'] !!}</b> días comprendido(s) entre <b>{!! $data['desde'] !!}</b> hasta el <b>{!! $data['hasta'] !!}</b> por motivo de: <b>{!! $data['motivo'] !!}</b></p>
    
@endsection