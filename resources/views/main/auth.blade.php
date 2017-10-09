@extends('layout.main')

@section('css')
  <!-- build:css({.tmp/serve,src}) styles/auth.css -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ URL::to('app/auth.css') }}">
  <!-- endinject -->
  <!-- endbuild -->
@endsection

@section('content')
<canvas id="c"></canvas>
<main class="auth-main">
  <div class="auth-block">
      
      <div class="navbar-inverse"></div>
      
    <div class="jumbotron">
        <div class="container">
            <div class="col-md-6 logo" align="center"><img vspace="8%" width="100%" src="{{ URL::to('/assets/img/logos/AD_logo.png') }}"></div>

            <div class="col-md-6 logo" align="center"><img vspace="8%" width="100%" src="{{ URL::to('/assets/img/logos/EN_logo.png') }}"></div>
        </div>
    </div>
      
    <h1>Bienvenido(a) a tu Portal Personal</h1>
    <!--<a href="reg.html" class="auth-link">New to Blur Admin? Sign up!</a>-->

    <!--<form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
        {{ csrf_field() }}
        
      <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <label for="email" class="col-sm-2 control-label">Email</label>

        <div class="col-sm-10">
          <input id="email" type="email" class="form-control" name="email" placeholder="" value="{{ old('email') }}" required autofocus>
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
      </div>
        
      <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        <label for="password" class="col-sm-2 control-label">Contraseña</label>

        <div class="col-sm-10">
          <input id="password" type="password" class="form-control" name="password" placeholder="" required>
            
            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
      </div>
        
        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Recuerdarme
                    </label>
                </div>
            </div>
        </div>
        
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-default btn-auth">Iniciar Sesión</button>
          <a href="{{ route('password.request') }}" class="forgot-pass">¿Olvidaste tu contraseña?</a>
        </div>
      </div>
    </form>-->
      
    @if (session('status'))
	    <div class="alert alert-danger">
	        {{ session('status') }}
	    </div>
	@endif
      
    <div class="auth-sep"><span><span>Ingresa con un click</span></span></div>

    <div class="al-share-auth">
      <ul class="al-share clearfix">
        <!--<li><i class="socicon socicon-facebook" title="Share on Facebook"></i></li>
        <li><i class="socicon socicon-twitter" title="Share on Twitter"></i></li>-->
        <li><a href="{{ URL::to('/auth/google') }}"><i class="socicon socicon-google" title="Share on Google Plus"></i></a></li>
      </ul>
    </div>
  </div>
</main>
<script src="{{ URL::to('js/index.js') }}"></script>
@endsection