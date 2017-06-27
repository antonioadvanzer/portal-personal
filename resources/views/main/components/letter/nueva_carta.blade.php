@extends('layouts.email_format')

@section('message')

    <h2>Solicitud de Carta o Constancia Laboral</h2>
    <h3><b>Nombre del Solicitante:</b> <b>{!! $data['nombre'] !!}</b></h3>
    <p><b>A quien va dirigida la carta: </b>{!! $data['persona'] !!}</p>
    <p><b>Datos a contener: </b><br>
        {!! ($data['sueldo'] == "1" ? "Sueldo"."<br>" : "") !!} 
        {!! ($data['imss'] == "1" ? "IMSS"."<br>" : "") !!}
        {!! ($data['rfc'] == "1" ? "RFC"."<br>" : "") !!}
        {!! ($data['curp'] == "1" ? "CURP"."<br>" : "") !!}
        {!! ($data['antiguedad'] == "1" ? "Antiguedad"."<br>" : "") !!}
        {!! ($data['puesto'] == "1" ? "Puesto"."<br>" : "") !!}
        {!! ($data['domicilio'] == "1" ? "Domicilio Particular"."<br>" : "") !!}
    </p>

    <p><b>Observaciones: </b>{!! $data['observaciones'] !!}</p>

@endsection