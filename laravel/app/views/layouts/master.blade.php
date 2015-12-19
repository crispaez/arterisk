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
    <script src="<?= asset('js/controllers/mainCtrl.js') ?>"></script>

    <style>
        body {
            padding-top: 30px;
        }

        form {
            padding-bottom: 20px;
        }
    </style>
</head>
<body>
@section('sidebar')
This is the master sidebar.
@show
<div class="container">
    @yield('content')
</div>

</body>
</html>