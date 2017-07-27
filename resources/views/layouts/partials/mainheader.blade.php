<header class="main-header">
<!-- Logo -->

<a href="#" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>M</b>SF</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>Medic</b>Soft</span>
</a>
<!-- Header Navbar: style can be found in header.less -->
<nav class="navbar navbar-static-top skin-blue-light">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Barra de Navegación</span>
    </a>
    <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <img src="{{ asset('logo-mini3.png') }}" class="user-image" alt="User Image">
                    <span class="hidden-xs">Perfil</span>
                </a>
            <ul class="dropdown-menu">
            <!-- User image -->
                <li class="user-header">
                    <img src="{{ asset('logo-mini3.png') }}" class="img-circle" alt="User Image">
                    <p>
                       Usuario: {{ ucwords(Auth::user()->name) }}
                        <small>Unidad Médica José Gregorio Hernández<br> y La Chinita C.A.</small>
                    </p>
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                    <div class="pull-left">
                        <a href="#" class="btn btn-default btn-flat">Perfil</a>
                    </div>
                    <div class="pull-right">
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-default btn-flat">Salir</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </div>
                </li>

            </ul>

            </li>
        </ul>
    </div>
</nav>

</header>