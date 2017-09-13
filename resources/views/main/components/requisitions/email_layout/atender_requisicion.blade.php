@extends('layouts.email_format')

@section('message')

    <h2>Tu requisición está siendo atendia por Capita Humano</h2>
    <h4><b>Folio</b> #<b>{!! $data['id'] !!}</b></h4>

@endsection