@extends('layout.main')

@section('css')
  <!-- build:css({.tmp/serve,src}) styles/404.css -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ URL::to('app/404.css') }}">
  <!-- endinject -->
  <!-- endbuild -->
@endsection

@section('content')
<canvas id="c"></canvas>
<div class="page-not-found-modal">
  <h1>Error 404</h1>

  <p>La página que estás buscando no se encuentra. <!--<a href="/">Ir a la pagina principal.</a>--></p>
</div>
<script src="{{ URL::to('js/index.js') }}"></script>
@endsection