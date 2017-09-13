@extends('layouts.email_format')

@section('message')

    <h2>Se ha registrado una nueva Requisición de Personal</h2>
    <h4><b>Folio</b> #<b>{!! $data['id'] !!}</b></h4>
    <p><b>Solicita: </b>{!! $data['usuario'] !!}</p>
    <p>Ingresa a <a href="{!! URL::to('/') !!}">Portal Personal >> Requisiciones</a> para darle seguimiento a la solicitud</p>

@endsection