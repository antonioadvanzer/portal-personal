@extends('layouts.email_format')

@section('message')

    <h2>Se ha completado tu Requisición de Personal</h2>
    <h4><b>Folio</b> #<b>{!! $data['id'] !!}</b></h4>

@endsection