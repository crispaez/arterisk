app.controller('clientesController', function($scope, $http, API_URL) {
    //retrieve clientes listing from API
    $http.get(API_URL + "clientes")
        .success(function(response) {
            $scope.clientes = response;
        });

    //show modal form
    $scope.toggle = function(modalstate, id) {
        $scope.modalstate = modalstate;

        switch (modalstate) {
            case 'add':
                $scope.form_title = "Nuevo cliente";
                break;
            case 'edit':
                $scope.form_title = "Editar cliente";
                $scope.id = id;
                $http.get(API_URL + 'clientes/' + id)
                    .success(function(response) {
                        console.log(response);
                        $scope.cliente = response;
                    });
                break;
            default:
                break;
        }
        console.log(id);
        $('#myModal').modal('show');
    }

    //save new record / update existing record
    $scope.save = function(modalstate, id) {
        var url = API_URL + "clientes";

        //append cliente id to the URL if the form is in edit mode
        if (modalstate === 'edit'){
            url += "/" + id;
        }

        $http({
            method: 'POST',
            url: url,
            data: $.param($scope.cliente),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).success(function(response) {
            console.log(response);
            location.reload();
        }).error(function(response) {
            console.log(response);
            alert('Ha ocurrido un error guardando los datos.');
        });
    }

    //delete record
    $scope.confirmDelete = function(id) {
        var isConfirmDelete = confirm('Esta seguro de borrar este registro?');
        if (isConfirmDelete) {
            $http({
                method: 'DELETE',
                url: API_URL + 'clientes/' + id
            }).
                success(function(data) {
                    console.log(data);
                    location.reload();
                }).
                error(function(data) {
                    console.log(data);
                    alert('No se pudo eliminar el registro.');
                });
        } else {
            return false;
        }
    }
});