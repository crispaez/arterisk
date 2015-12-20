app.controller('paisesController', function($scope, $http, API_URL) {
    $http.get(API_URL + "paises")
        .success(function(response) {
            $scope.dataPaises = response;
        });

    $scope.toggle = function(modalstate, id) {
        $scope.modalstate = modalstate;

        switch (modalstate) {
            case 'add':
                $scope.form_title = "Nuevo Pais";
                break;
            case 'edit':
                $scope.form_title = "Editar Pais";
                $scope.id = id;
                $http.get(API_URL + 'paises/' + id)
                    .success(function(response) {
                        console.log(response);
                        $scope.pais = response;
                    });
                break;
            default:
                break;
        }
        console.log(id);
        $('#myModal').modal('show');
    }

    $scope.save = function(modalstate, id) {
        var url = API_URL + "paises";

        if (modalstate === 'edit'){
            url += "/" + id;
        }

        $http({
            method: 'POST',
            url: url,
            data: $.param($scope.pais),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).success(function(response) {
            if(response.ok){
                //alert(response.msg);
                location.reload();
            }else{
                var str = '';
                $.each(response.msg, function(key, val){
                    str = str+val+'\n';
                    //$('#'+key).addClass('error');
                });
                alert(str);
            }
        }).error(function(response) {
            console.log(response);
            alert('Ha ocurrido un error guardando los datos.');
        });
    }

    $scope.confirmDelete = function(id) {
        var isConfirmDelete = confirm('Esta seguro de borrar este registro?');
        if (isConfirmDelete) {
            $http({
                method: 'DELETE',
                url: API_URL + 'paises/' + id
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