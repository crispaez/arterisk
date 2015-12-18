<!DOCTYPE html>
<html lang="es-CO" ng-app="arterisk">
<head>
    <title>Prueba Arterisk</title>

    <!-- CSS -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">
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
<h2>Administrar Clientes</h2>

<div ng-controller="clientesController">

    <table class="table">
        <thead>
        <tr>
            <th>Nit</th>
            <th>Nombre</th>
            <th>Dirección</th>
            <th>Telefono</th>
            <th>Celular</th>
            <th>Correo</th>
            <th>Dias de plazo para pagar</th>
            <th>Estado</th>
            <th>Ciudad</th>
            <th>
                <button id="btn-add" class="btn btn-primary btn-xs" ng-click="toggle('add', 0)">Nuevo Cliente</button>
            </th>
        </tr>
        </thead>
        <tbody>
        <tr ng-repeat="cliente in clientes">
            <td>{{ cliente.nit }}</td>
            <td>{{ cliente.nombre }}</td>
            <td>{{ cliente.direccion }}</td>
            <td>{{ cliente.telefono }}</td>
            <td>{{ cliente.celular }}</td>
            <td>{{ cliente.correo }}</td>
            <td>{{ cliente.dias_plazo_pago }}</td>
            <td>{{ cliente.estado }}</td>
            <td>{{ cliente.ciudad_id }}</td>
            <td>
                <button class="btn btn-default btn-xs btn-detail" ng-click="toggle('edit', cliente.id)">Editar</button>
                <button class="btn btn-danger btn-xs btn-delete" ng-click="confirmDelete(cliente.id)">Eliminar</button>
            </td>
        </tr>
        </tbody>
    </table>
    <!-- Modal (Pop up when detail button clicked) -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel">{{form_title}}</h4>
                </div>
                <div class="modal-body">
                    <form name="frmclientes" class="form-horizontal" novalidate="">

                        <div class="form-group error">
                            <label for="inputEmail3" class="col-sm-3 control-label">Nit</label>

                            <div class="col-sm-9">
                                <input type="text" class="form-control has-error" id="nit" name="nit"
                                       placeholder="Nit" value="{{nit}}"
                                       ng-model="cliente.nit" ng-required="true">
                                        <span class="help-inline"
                                              ng-show="frmclientes.nit.$invalid && frmclientes.nit.$touched">Nit es requerido</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Nombre</label>

                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="nombre" name="nombre"
                                       placeholder="Nombre" value="{{nombre}}"
                                       ng-model="cliente.nombre" ng-required="true">
                                        <span class="help-inline"
                                              ng-show="frmclientes.nombre.$invalid && frmclientes.nombre.$touched">Nombre es requerido</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Dirección</label>

                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="direccion" name="direccion"
                                       placeholder="Dirección" value="{{direccion}}"
                                       ng-model="cliente.direccion" ng-required="true">
                                    <span class="help-inline"
                                          ng-show="frmclientes.direccion.$invalid && frmclientes.direccion.$touched">Dirección es requerido</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Telefono</label>

                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="telefono" name="telefono"
                                       placeholder="Telefono" value="{{telefono}}"
                                       ng-model="cliente.telefono" ng-required="true">
                                    <span class="help-inline"
                                          ng-show="frmclientes.telefono.$invalid && frmclientes.telefono.$touched">Telefono es requerido</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Celular</label>

                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="celular" name="celular"
                                       placeholder="Celular" value="{{celular}}"
                                       ng-model="cliente.celular" ng-required="true">
                                    <span class="help-inline"
                                          ng-show="frmclientes.celular.$invalid && frmclientes.celular.$touched">Celular es requerido</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Correo</label>

                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="correo" name="correo"
                                       placeholder="Correo" value="{{correo}}"
                                       ng-model="cliente.correo" ng-required="true">
                                    <span class="help-inline"
                                          ng-show="frmclientes.correo.$invalid && frmclientes.correo.$touched">Correo es requerido</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Dias de plazo para pagar</label>

                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="dias_plazo_pago" name="dias_plazo_pago"
                                       placeholder="Dias de plazo para pagar" value="{{dias_plazo_pago}}"
                                       ng-model="cliente.dias_plazo_pago" ng-required="true">
                                    <span class="help-inline"
                                          ng-show="frmclientes.dias_plazo_pago.$invalid && frmclientes.dias_plazo_pago.$touched">Dias de plazo para pagar es requerido</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Activo</label>

                            <div class="col-sm-9">
                                <input type="checkbox" id="estado" name="estado"
                                       ng-model="cliente.estado">

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Ciudad</label>

                            <div class="col-sm-9">
                                <select name="ciudad_id" id="ciudad_id" ng-model="cliente.ciudad_id" ng-required="true">
                                    <option ng-repeat="option in data.availableOptions" value="{{option.id}}">{{option.name}}</option>
                                </select>
                                    <span class="help-inline"
                                          ng-show="frmclientes.ciudad_id.$invalid && frmclientes.ciudad_id.$touched">Ciudad es requerido</span>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="btn-save" ng-click="save(modalstate, id)"
                            ng-disabled="frmclientes.$invalid">Save changes
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.8/angular.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>

<script src="<?= asset('js/app.js') ?>"></script>
<script src="<?= asset('js/controllers/mainCtrl.js') ?>"></script>
</body>
</html>