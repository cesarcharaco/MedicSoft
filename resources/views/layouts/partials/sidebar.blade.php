<aside class="main-sidebar">
<!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
    <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('logo-mini3.png') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ ucwords(Auth::user()->name) }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i>En Línea</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MENU DE NAVEGACIÓN</li>
            <li class="active treeview">
                <a href="#">
                    <i class="fa fa-user"></i> <span>Pacientes</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href="{{ URL('admin/pacientes')}}"><i class="fa fa-circle-o"></i>Titulares</a></li>
                    <li><a href="{{ URL('admin/pacientes/create')}}"><i class="fa fa-circle-o"></i>Nuevo Titular</a></li>
                    <li><a href="{{ URL('admin/pacientes_nt')}}"><i class="fa fa-circle-o"></i>Beneficiarios</a></li>
                </ul>
            </li>
            <li class="active treeview">
                <a href="#">
                    <i class="fa fa-user-md"></i> <span>Médicos</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href="{{ URL('admin/medicos')}}"><i class="fa fa-circle-o"></i>Lista</a></li>
                    @if(Auth::user()->tipo_user=="Administrador")
                    <li><a href="{{ URL('admin/medicos/create')}}"><i class="fa fa-circle-o"></i>Nuevo</a></li>
                    @endif
                </ul>
            </li>
            <li class="active treeview">
                <a href="#">
                    <i class="fa fa-calendar"></i> <span>Horarios</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href="{{ URL('admin/horarios')}}"><i class="fa fa-circle-o"></i>Horario</a></li>
                    @if(Auth::user()->tipo_user=="Administrador")
                    <li><a href="{{ URL('admin/horarios/create')}}"><i class="fa fa-circle-o"></i>Asignar</a></li>
                    @endif
                    <li><a href="{{ URL('admin/horarios/show')}}"><i class="fa fa-circle-o"></i>Por Especialidad</a></li>
                </ul>
            </li>
            <li class="active treeview">
                <a href="#">
                    <i class="fa fa-stethoscope"></i> <span>Consultas</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href="{{ URL('admin/consultas')}}"><i class="fa fa-circle-o"></i>Lista del día</a></li>
                    <li><a href="{{ URL('admin/consultas/create')}}"><i class="fa fa-circle-o"></i>Nueva</a></li>
                    <li><a href="{{ URL('admin/laboratorios',0)}}"><i class="fa fa-circle-o"></i>Laboratorio</a></li>
                    
                    <li><a href="{{ URL('admin/mostrarpacientes')}}"><i class="fa fa-circle-o"></i>Pacientes</a></li>
                   @if(Auth::user()->tipo_user=="Administrador")
                   <li><a href="{{ URL('admin/consultas/show')}}"><i class="fa fa-circle-o"></i>Anteriores</a></li>
                    <li><a href="{{ URL('admin/reportediariovistas')}}"><i class="fa fa-circle-o"></i>Reporte diario</a></li>
                    @endif
                </ul>
            </li>
            @if(Auth::user()->tipo_user=="Administrador")
            <li class="active treeview">
                <a href="#">
                    <i class="fa fa-medkit"></i> <span>Inventario</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href="{{ URL('admin/materiales')}}"><i class="fa fa-circle-o"></i>Materiales</a></li>
                    <li><a href="{{ URL('admin/materiales/create')}}"><i class="fa fa-circle-o"></i>Nuevo</a></li>
                    <li><a href="{{ URL('admin/pedidos_oficinas')}}"><i class="fa fa-circle-o"></i>Pedidos Por Oficina</a></li>
                    <li><a href="{{ URL('admin/pedidos_oficinas/show')}}"><i class="fa fa-circle-o"></i>Pedidos Por Materiales</a></li>
                    <li><a href="{{ URL('admin/seleccionarfecha')}}"><i class="fa fa-circle-o"></i>Reporte Diario de Pedidos</a></li>
                    <li><a href="{{ URL('admin/solicitud_materiales')}}"><i class="fa fa-circle-o"></i>Materiales Solicitados</a></li>

                </ul>
            </li>
            <li class="active treeview">
                <a href="#">
                    <i class="fa fa-gears"></i> <span>Configuracion</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href="{{ URL('admin/especialidades')}}"><i class="fa fa-circle-o text-aqua"></i></i>Especialidades</a></li>
                    <li class="active"><a href="{{ URL('admin/tipoconsultas')}}"><i class="fa fa-circle-o text-aqua"></i></i>Tipo de Consultas</a></li>
                    <li class="active"><a href="{{ URL('admin/consultasmontos')}}"><i class="fa fa-circle-o text-red"></i></i>Montos de Consultas</a></li>
                    <li class="active"><a href="{{ URL('admin/oficinas')}}"><i class="fa fa-circle-o text-aqua"></i></i>Oficinas</a></li>
                    <li class="active"><a href="{{ URL('admin/laboratorios')}}"><i class="fa fa-circle-o text-aqua"></i></i>Laboratorios</a></li>
                </ul>
            </li>
            @endif
            <!-- <li class="header">CONFIGURACIÓN</li>
            <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Importante</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Alerta</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Información</span></a></li> -->
        </ul>
    </section>
<!-- /.sidebar -->
</aside>