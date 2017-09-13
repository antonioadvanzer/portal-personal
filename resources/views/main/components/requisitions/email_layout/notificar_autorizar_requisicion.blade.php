@extends('layouts.email_format')

@section('message')

    <h2>Se ha Autorizdo tu Requisición de Personal</h2>
    <h4><b>Folio</b> #<b>{!! $data['id'] !!}</b></h4>
    <p><b>Acepta: </b> <b>{!! $data['director'] !!}</b></p>
    <p><b>Autoriza: </b> <b>{!! $data['autorizador'] !!}</b></p>

@endsection