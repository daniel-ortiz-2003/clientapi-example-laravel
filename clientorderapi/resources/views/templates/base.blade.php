<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <!-- Fuentes personalizadas para esta plantilla -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet" />
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet"> 
    <link href="{{ asset('datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

</head>
<body id="page-top">
    <div id="wrapper">
        @include('templates/nav')                        
        <!-- Fin de la barra lateral -->

        <!-- Contenedor del contenido -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Contenido principal -->
            <div id="content">
                <!-- Barra superior -->
                @include('templates/topbar')
                <!-- Fin de la barra superior -->

                <!-- Inicio del contenido de la página -->
                <div class="container-fluid">
                    <!-- Encabezado de la página -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Bienvenido {{ session('users') ? session('users')->name : 'Invitado' }} </h1>                            
                    </div>

                    <div class="row">
                        <div class="col-lg-12 mb-4">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">@yield('header')</h6>
                                </div>

                                <div class="card-body">
                                    <!-- Aquí se insertan las páginas que heredan de esta plantilla -->
                                    @yield('content')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Fin del contenedor principal -->                    

            </div>
            <!-- Fin del contenido principal -->

            <!-- Pie de página -->
            @include('templates/footer')
            <!-- Fin del pie de página -->
        </div>
        <!-- Fin del contenedor de contenido -->


    </div>
    <!-- Fin del contenedor de la página -->

    <!-- Botón para volver arriba -->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <script src="{{ asset('jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js"></script>
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
    <script src="{{ asset('datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('datatables/dataTables.bootstrap4.min.js') }}"></script>     
    
    @yield('scripts')

</body>

</html>