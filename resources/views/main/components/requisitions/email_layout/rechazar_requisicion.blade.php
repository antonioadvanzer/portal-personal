@extends('layouts.email_format')

@section('message')

    <h2>Se ha rechazado tu Requisición de Personal</h2>
    <h4><b>Folio</b> #<b>{!! $data['id'] !!}</b></h4>
    <h4><b>Director</b> <b>{!! $data['director'] !!}</b></h4>
    <p><b>Motivo de rechazo: </b>{!! $data['razon'] !!}</p>

@endsection