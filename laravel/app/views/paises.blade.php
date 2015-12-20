@extends('layouts.master')

@section('js')
<script src="<?= asset('js/controllers/paisesController.js') ?>"></script>
@show

@section('content')
<h2>Administrar Paises</h2>

<div ng-controller="paisesController">
    <table class="table">
        <thead>
        <tr>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>
                <button id="btn-add" class="btn btn-primary btn-xs" ng-click="toggle('add', 0)">Nuevo pais</button>
            </th>
        </tr>
        </thead>
        <tbody>
        <tr ng-repeat="pais in dataPaises.paises">
            <td><% pais.nombre %></td>
            <td><% pais.descripcion %></td>
            <td>
                <button class="btn btn-default btn-xs btn-detail" ng-click="toggle('edit', pais.id)">Editar</button>
                <button class="btn btn-danger btn-xs btn-delete" ng-click="confirmDelete(pais.id)">Eliminar</button>
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
                    <form name="frmpaises" class="form-horizontal" novalidate="">

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Nombre</label>

                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="nombre" name="nombre"
                                       placeholder="Nombre" value="<%nombre%>"
                                       ng-model="pais.nombre" ng-required="true">
                                        <span class="help-inline"
                                              ng-show="frmpaises.nombre.$invalid && frmpaises.nombre.$touched">Nombre es requerido</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Descripción</label>

                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="descripcion" name="descripcion"
                                       placeholder="Descripción" value="<%descripcion%>"
                                       ng-model="pais.descripcion" ng-required="true">
                                    <span class="help-inline"
                                          ng-show="frmpaises.descripcion.$invalid && frmpaises.descripcion.$touched">Descripción es requerido</span>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="btn-save" ng-click="save(modalstate, id)"
                            ng-disabled="frmpaises.$invalid">Guardar
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@stop