<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- tooltips tippy -->
    <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.min.js"></script>
    <script src="https://unpkg.com/tippy.js@6/dist/tippy-bundle.umd.js"></script>




    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" ></script>

    <!--iconos desde internet font Awesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!--icono del colegio-->
    <link rel="shortcut icon" href="/images/iconoCol.png">
</head>
<body >
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light  shadow-sm" style="background-color: #fff;">
            <div class="container">

                <a class="navbar-brand" href="#">
                    <img class="navbar-light" src="/images/logoCol.png">
                </a>

                @if (auth()->check())
                <a class="navbar-brand">
                    <button type="button" data-tippy-content="Menu de navegación" class="openbtn btn btn-light" onclick="openNav()"><i class="fas fa-align-justify"></i></button>
                </a>
                
                @endif

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="#"></a>
                                
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('home') }}"><i class="fas fa-home"></i> {{ __('Home') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}"><i class="fas fa-user-friends"></i> {{ __('Docentes') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('mensajes.create') }}"><i class="fas fa-envelope-open-text"></i> {{ __('Contacto') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('acudientes/login') }}"><i class="fas fa-sign-in-alt"></i> {{ __('Acceso Acudientes') }}</a>
                            </li>
                            
                            
                        @else

                            <a class="navbar-brand">
                                <a class="nav-link"  href="{{ url('acudientes/area') }}"><i class="fas fa-home"></i> {{ __('Inicio') }}</a>
                            </a>

                            <li class="nav-item dropdown" >
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre >
                                    {{ Auth::user()->email }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                       <i class="fas fa-sign-out-alt"></i> {{ __('Cerrar Sesion') }} 
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
        {{-- menu con jquery --}} 
        @if (auth()->check()) 
        <div class="contenedor-menu">
          <div class="row">
            <div class="col-lg-12">
              <div id="mySidebar" class="sidebar">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
               
               <a href="#" class="btn-menu">Menu<i class="icono fas fa-bars"></i></a> <!--enlace para dispositivos moviles, con icono fas fa-bars-->
               <ul class="menu">

                    @if (auth()->user()->hasRoles(['Administrador']))     
                    <li><a href="#"><i class="icono izquierda fas fa-chalkboard-teacher"></i> Docentes <i class="icono derecha fas fa-chevron-down"></i></a>
                        <ul>
                            <li><a href="{{ url('docente/create') }}">Crear Docente</a></li>
                            <li><a href="{{ url('docente') }}">Lista Docentes</a></li>    
                        </ul>
                    </li>

                    <li><a href="#"><i class="icono izquierda fas fa-restroom"></i> Acudientes <i class="icono derecha fas fa-chevron-down"></i></a>
                        <ul>
                            <li><a href="{{ url('lista/acudientes/create') }}">Agregar Acudiente</a>
                            <li><a href="{{ url('lista/acudientes') }}">Lista de Acudientes</a>
                        </ul>
                    </li>

                    <li><a href="#"><i class="icono izquierda far fa-credit-card"></i> Matriculas <i class="icono derecha fas fa-chevron-down"></i></a>
                        <ul>
                            <li><a href="#">Agregar Matricula</a>
                            <li><a href="#">Lista de Matriculas</a>
                        </ul>
                    </li>

                    <li><a href="#"><i class="icono izquierda fas fa-users"></i> Alumnos <i class="icono derecha fas fa-chevron-down"></i></a>
                        <ul>
                            <!-- <li><a href="{{ url('lista/alumnos/create') }}">Agregar Alumno</a> -->
                            <li><a href="{{ url('lista/alumnos') }}">Lista de Alumnos</a>
                        </ul>
                    </li>


                    @endif


                    @if (auth()->user()->hasRoles(['Responsable']))
                    <li><a href="#"><i class="icono izquierda far fa-folder-open"></i>  PreMatricular Estudiante <i class="icono derecha fas fa-chevron-down"></i></a>
                        <ul>
                            <li><a href="{{ url('crear/alumnosmatricula/create') }}">Estudiante Nuevo</a>
                            
                        </ul>
                    </li>
                    <li><a href="#"><i class="icono izquierda fas fa-folder-open"></i> Mis Matriculas <i class="icono derecha fas fa-chevron-down"></i></a>
                        <ul>
                            <li><a href="{{ url('matricula') }}">iformacion de las matriculas</a>
                            
                        </ul>
                    </li>
                    <li><a href="#"><i class="icono izquierda fas fa-folder-open"></i> Mis Calificaciones <i class="icono derecha fas fa-chevron-down"></i></a>
                        <ul>
                            <li><a href="#">Calificaciones</a>
                            
                        </ul>
                    </li>
                    @endif




                    @if (auth()->user()->hasRoles(['Empleado']))
                    <li><a href="#"><i class="icono izquierda fas fa-book-open"></i> Asignaturas <i class="icono derecha fas fa-chevron-down"></i></a>
                        <ul>
                            <li><a href="#">Crear Asignatura</a>
                            <li><a href="#">Lista de Asignaturas</a>
                        </ul>
                    </li>
                    
                
                    <li><a href="#"><i class="icono izquierda fas fa-bookmark"></i> Logros <i class="icono derecha fas fa-chevron-down"></i></a>
                        <ul>
                            <li><a href="#">Crear Logro</a>
                            <li><a href="#">Lista de Logros</a>
                        </ul>
                    </li>
                    <li><a href="#"><i class="icono izquierda fas fa-pencil-alt"></i> Calificaciones <i class="icono derecha fas fa-chevron-down"></i></a>
                        <ul>
                            {{-- <li><a href="#">Agregar Calificaciones</a></li> --}}
                            <li><a href="#">Lista de Calificaciones</a></li> 
                        </ul>
                    </li>

                    <li><a href="#"><i class="icono izquierda fas fa-building"></i> Cursos <i class="icono derecha fas fa-chevron-down"></i></a>
                        <ul>
                            <li><a href="#">Agregar Curso</a>
                            <li><a href="#">Lista de Cursos</a>
                        </ul>
                    </li>

                    


                    <li><a href="#"><i class="icono izquierda fas fa-cloud-upload-alt"></i> Cargar Calificaciones <i class="icono derecha fas fa-chevron-down"></i></a>
                        <ul>
                            <li><a href="#">Cargar Calificaciones</a>
                            
                        </ul> 
                    </li>
                   


                    
                    <li><a href="#"><i class="icono izquierda fas fa-book-reader"></i> Item <i class="icono derecha fas fa-chevron-down"></i></a>
                        <ul>
                            <li><a href="#">Item 1</a>
                            
                        </ul>
                    </li>
                    <li><a href="#"><i class="icono izquierda fas fa-book"></i> Item<i class="icono derecha fas fa-chevron-down"></i></a>
                        <ul>
                            <li><a href="#">Item 1</a>
                            
                        </ul>
                    </li>
                    

                    

                    
                    <li><a href="#"><i class="icono izquierda fas fa-box-open"></i>Item <i class="icono derecha fas fa-chevron-down"></i></a>
                        <ul>
                            <li><a href="#">Item 1 </a>
                                
                            {{-- <li><a href="#">Registrar Entradas</a>
                            <li><a href="#">Registrar Traslados</a> --}}    
                        </ul>

                    </li>
                    @endif            

                    
                </ul>   
            
              </div>
            </div>
          </div>
        </div>
        @endif
            @yield('content')
        </main>
    </div>








<script src="{{ asset('js/jquery-3.4.1.min.js') }}" ></script>
<script src="{{ asset('js/main.js') }}" defer></script>
<link href="{{asset('css/select2.css')}}" rel="stylesheet" />
<script src="{{asset('js/select2.js')}}"></script>
<script src="{{ asset('js/parsley.min.js') }}"></script>
<script src="{{ asset('js/sweetalert2.min.js') }}"></script>
<link href="{{asset('css/sweetalert2.min.css')}}" rel="stylesheet" />
<!-- <link href="{{asset('css/wordpress-admin.css')}}" rel="stylesheet" /> -->
<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@3/dark.css"> -->
<script src="{{ asset('js/myjs.min.js') }}" defer></script>








 



</body>
</html>
