<!DOCTYPE html>
<!--<html lang="en">-->
<html lang="{{ config('app.locale') }}" ng-app="PortalPersonal">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}"/>
    
    <meta http-equiv="cache-control" content="no-cache, must-revalidate, post-check=0, pre-check=0" />
    <meta http-equiv="cache-control" content="max-age=0" />
    <meta http-equiv="expires" content="0" />
    <meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
    <meta http-equiv="pragma" content="no-cache" />
  
  <title>{{ config('app.name', 'Portal Personal') }}</title>

  <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900italic,900&subset=latin,greek,greek-ext,vietnamese,cyrillic-ext,latin-ext,cyrillic' rel='stylesheet' type='text/css'>

  <!--<link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon-16x16.png">
  <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon-96x96.png">-->
  <link rel="icon" type="image/png" sizes="96x96" href="{{ URL::to('assets/img/favicon.ico') }}">  

  <!-- build:css({.tmp/serve,src}) styles/vendor.css -->
  <!-- bower:css -->
  <link rel="stylesheet" href="{{ URL::to('lib/ionicons.css') }}" >
  <link rel="stylesheet" href="{{ URL::to('lib/angular-toastr.css') }}" >
  <link rel="stylesheet" href="{{ URL::to('lib/animate.css') }}" >
  <link rel="stylesheet" href="{{ URL::to('lib/bootstrap.css') }}" >
  <link rel="stylesheet" href="{{ URL::to('lib/bootstrap-select.css') }}" >
  <link rel="stylesheet" href="{{ URL::to('lib/bootstrap-switch.css') }}" >
  <link rel="stylesheet" href="{{ URL::to('lib/bootstrap-tagsinput.css') }}" >
  <link rel="stylesheet" href="{{ URL::to('lib/font-awesome.css') }}" >
  <link rel="stylesheet" href="{{ URL::to('lib/fullcalendar.css') }}" >
  <link rel="stylesheet" href="{{ URL::to('lib/leaflet.css') }}" >
  <link rel="stylesheet" href="{{ URL::to('lib/angular-progress-button-styles.min.css') }}" >
  <link rel="stylesheet" href="{{ URL::to('lib/chartist.min.css') }}" >
  <link rel="stylesheet" href="{{ URL::to('lib/morris.css') }}" >
  <link rel="stylesheet" href="{{ URL::to('lib/ion.rangeSlider.css') }}" >
  <link rel="stylesheet" href="{{ URL::to('lib/ion.rangeSlider.skinFlat.css') }}" >
  <link rel="stylesheet" href="{{ URL::to('lib/textAngular.css') }}" >
  <link rel="stylesheet" href="{{ URL::to('lib/xeditable.css') }}" >
  <link rel="stylesheet" href="{{ URL::to('lib/style.css') }}" >
  <link rel="stylesheet" href="{{ URL::to('lib/select.css') }}" >
  <!-- endbower -->
  <!-- endbuild -->
    
    @yield('css')
    
    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
    @yield('content')
</body>
</html>