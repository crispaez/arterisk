<!DOCTYPE html>
<html lang="es-CO" ng-app="arterisk">
<head>
    <title>Prueba Arterisk</title>

    <!-- CSS -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">

    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.8/angular.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>

    <script src="<?= asset('js/app.js') ?>"></script>
    @section('js')
    @show

    <style>
        form {
            padding-bottom: 20px;
        }
    </style>
</head>
<body>
@if (Auth::check())
<?php $items = Menu::find(1)->itemsMenu()->join('permiso','item_menu.permiso_id','=','permiso.id')->where('permiso.perfil_id', '=', Auth::user()->perfil_id)->orderBy('item_menu.id', 'desc')->get()?>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Prueba Arterisk</a>
        </div>
        <div>
            <ul class="nav navbar-nav">
                @foreach ($items as $item)
                <li class="{{ URL::route($item->ruta) === URL::current() ? 'active' : '' }}">{{ HTML::linkRoute($item->ruta, $item->etiqueta) }}</li>
                @endforeach
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->username }} <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <?php $itemsDerecha = Menu::find(2)->itemsMenu()->join('permiso','item_menu.permiso_id','=','permiso.id')->where('permiso.perfil_id', '=', Auth::user()->perfil_id)->get()?>
                        @foreach ($itemsDerecha as $item2)
                        <li class="{{ URL::route($item->ruta) === URL::current() ? 'active' : '' }}">{{ HTML::linkRoute($item2->ruta, $item2->etiqueta) }}</li>
                        @endforeach
                        <li class="{{ URL::route('logout') === URL::current() ? 'active' : '' }}">{{ HTML::linkRoute('logout', 'Cerrar sesión') }}</li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
@endif
<div class="container">
    @yield('content')
</div>

</body>
</html>