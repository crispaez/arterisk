@extends('layouts.master')

@section('js')
<script src="<?= asset('js/controllers/ciudadesController.js') ?>"></script>
@show

@section('content')
<h2>Administrar Ciudades</h2>

<div ng-controller="ciudadesController">
    <table class="table">
        <thead>
        <tr>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Departamento</th>
            <th>
                <button id="btn-add" class="btn btn-primary btn-xs" ng-click="toggle('add', 0)">Nueva Ciudad</button>
            </th>
        </tr>
        </thead>
        <tbody>
        <tr ng-repeat="ciudad in dataCiudades.ciudades">
            <td><% ciudad.nombre %></td>
            <td><% ciudad.descripcion %></td>
            <td><% ciudad.departamento.nombre %></td>
            <td>
                <button class="btn btn-default btn-xs btn-detail" ng-click="toggle('edit', ciudad.id)">Editar</button>
                <button class="btn btn-danger btn-xs btn-delete" ng-click="confirmDelete(ciudad.id)">Eliminar</button>
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
                    <form name="frmciudades" class="form-horizontal" novalidate="">

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Nombre</label>

                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="nombre" name="nombre"
                                       placeholder="Nombre" value="<%nombre%>"
                                       ng-model="ciudad.nombre" ng-required="true">
                                        <span class="help-inline"
                                              ng-show="frmciudades.nombre.$invalid && frmciudades.nombre.$touched">Nombre es requerido</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Descripción</label>

                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="descripcion" name="descripcion"
                                       placeholder="Descripción" value="<%descripcion%>"
                                       ng-model="ciudad.descripcion" ng-required="true">
                                    <span class="help-inline"
                                          ng-show="frmciudades.descripcion.$invalid && frmciudades.descripcion.$touched">Descripción es requerido</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Departamento</label>

                            <div class="col-sm-9">
                                <select name="departamento_id" id="departamento_id" class="form-control" ng-model="ciudad.departamento_id" ng-required="true">
                                    <option ng-repeat="option in dataCiudades.departamentos" value="<%option.id%>"><%option.nombre%></option>
                                </select>
                                    <span class="help-inline"
                                          ng-show="frmciudades.departamento_id.$invalid && frmciudades.departamento_id.$touched">Departamento es requerido</span>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="btn-save" ng-click="save(modalstate, id)"
                            ng-disabled="frmciudades.$invalid">Guardar
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@stop