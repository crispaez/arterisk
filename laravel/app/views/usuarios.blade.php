@extends('layouts.master')

@section('js')
<script src="<?= asset('js/controllers/usuariosController.js') ?>"></script>
@show

@section('content')
<h2>Administrar Usuarios</h2>

<div ng-controller="usuariosController">
    <table class="table">
        <thead>
        <tr>
            <th>Nombre de Usuario</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Correo</th>
            <th>Perfil</th>
            <th>
                <button id="btn-add" class="btn btn-primary btn-xs" ng-click="toggle('add', 0)">Nuevo Usuario</button>
            </th>
        </tr>
        </thead>
        <tbody>
        <tr ng-repeat="usuario in dataUsuarios.usuarios">
            <td><% usuario.username %></td>
            <td><% usuario.nombres %></td>
            <td><% usuario.apellidos %></td>
            <td><% usuario.correo %></td>
            <td><% usuario.perfil.nombre %></td>
            <td>
                <button class="btn btn-default btn-xs btn-detail" ng-click="toggle('edit', usuario.id)">Editar</button>
                <button class="btn btn-danger btn-xs btn-delete" ng-click="confirmDelete(usuario.id)">Eliminar</button>
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
                    <h4 class="modal-title" id="myModalLabel"><%form_title%></h4>
                </div>
                <div class="modal-body">
                    <form name="frmusuarios" class="form-horizontal" novalidate="">

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Nombre de Usuario</label>

                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="username" name="username"
                                       placeholder="Nombre de Usuario" value="<%username%>"
                                       ng-model="usuario.username" ng-required="true">
                                        <span class="help-inline"
                                              ng-show="frmusuarios.username.$invalid && frmusuarios.username.$touched">Nombre de usuario es requerido</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Nombre</label>

                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="nombres" name="nombres"
                                       placeholder="Nombres" value="<%nombres%>"
                                       ng-model="usuario.nombres" ng-required="true">
                                        <span class="help-inline"
                                              ng-show="frmusuarios.nombres.$invalid && frmusuarios.nombres.$touched">Nombres es requerido</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Apellidos</label>

                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="apellidos" name="apellidos"
                                       placeholder="Apellidos" value="<%apellidos%>"
                                       ng-model="usuario.apellidos" ng-required="true">
                                    <span class="help-inline"
                                          ng-show="frmusuarios.apellidos.$invalid && frmusuarios.apellidos.$touched">Apellidos es requerido</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Contraseña</label>

                            <div class="col-sm-9">
                                <input type="password" class="form-control" id="password" name="password"
                                       placeholder="Contraseña" value="<%password%>"
                                       ng-model="usuario.password">
                                    <span class="help-inline"
                                          ng-show="frmusuarios.password.$invalid && frmusuarios.password.$touched">Contraseña es requerido</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Correo</label>

                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="correo" name="correo"
                                       placeholder="Correo" value="<%correo%>"
                                       ng-model="usuario.correo" ng-required="true">
                                    <span class="help-inline"
                                          ng-show="frmusuarios.correo.$invalid && frmusuarios.correo.$touched">Correo es requerido</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Perfil</label>

                            <div class="col-sm-9">
                                <select name="perfil_id" id="perfil_id" class="form-control" ng-model="usuario.perfil_id" ng-required="true">
                                    <option ng-repeat="option in dataUsuarios.perfiles" value="<%option.id%>"><%option.nombre%></option>
                                </select>
                                    <span class="help-inline"
                                          ng-show="frmusuarios.perfil_id.$invalid && frmusuarios.perfil_id.$touched">Perfil es requerido</span>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="btn-save" ng-click="save(modalstate, id)"
                            ng-disabled="frmusuarios.$invalid">Guardar
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@stop