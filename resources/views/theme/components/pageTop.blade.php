<div class="page-top clearfix" scroll-position="scrolled" max-height="50" ng-class="{'scrolled': scrolled}">
  <a href="#/dashboard" class="al-logo clearfix" style="width: 13%;">
  <!--<span>Blur</span>Admin-->
    @if(Auth::user()->company == 1)
    <img src="{{ URL::to('assets/img/logos/AD_logo.png') }}" width="80%" style="">
    @elseif(Auth::user()->company == 2)
    <img src="{{ URL::to('assets/img/logos/EN_logo.png') }}" width="80%" style="">
    @endif
  </a>
  <a href class="collapse-menu-link ion-navicon" ba-sidebar-toggle-menu></a>

  <!--<div class="search">
    <i class="ion-ios-search-strong" ng-click="startSearch()"></i>
    <input id="searchInput" type="text" placeholder="Search for...">
  </div>-->

  <div class="user-profile clearfix">
    <div class="al-user-profile" uib-dropdown><a class="name-user">@{{ user.short_name+' '+user.apellido_paterno }}</a>
      <a uib-dropdown-toggle class="profile-toggle-link">
        <img ng-src="@{{::( user.picture_name | profilePicture:user.picture_ext )}}">
      </a>
      <ul  class="top-dropdown-menu profile-dropdown" uib-dropdown-menu>
        <li><i class="dropdown-arr"></i></li>
        <li><a href="#/profile"><i class="fa fa-user"></i>Perfil</a></li>
        {{--<li><a href><i class="fa fa-cog"></i>Ajustes</a></li>--}}
        <li ng-if="user.is_admin"><a href="{{ URL::to('/advanzer-admin') }}"><i class="fa fa-cogs"></i>Modo Administrador</a></li>
        {{--<li><a href class="signout"><i class="fa fa-power-off"></i>Cerrar Sesión</a></li>--}}
        <li>
            <a href="{{ route('logout') }}" class="signout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fa fa-power-off"></i>Cerrar Sesión
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>  
        </li>
      </ul>
    </div>
    <msg-center></msg-center>
  </div>
</div>