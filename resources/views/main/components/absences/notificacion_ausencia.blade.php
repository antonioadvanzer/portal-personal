@extends('layouts.email_format')

@section('message')

    <h2>Notificación de Ausencia</h2>

    <p><b>{!! $data['usuario'] !!}</b> ha registrado una <b>Solicitud de Permiso de Ausencia</b> con Folio #<b>{!! $data['id'] !!}</b> en la que solicitó {!! $data['dias'] !!} días comprendido(s) entre {!! $data['desde'] !!} hasta el {!! $data['hasta'] !!} por motivo de: <b>{!! $data['motivo'] !!}</b></p>
    
@endsection