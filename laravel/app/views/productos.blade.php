@extends('layouts.master')

@section('js')
<script src="<?= asset('js/controllers/productosController.js') ?>"></script>
@show

@section('content')
<h2>Administrar Productos</h2>

<div ng-controller="productosController">
    <table class="table">
        <thead>
        <tr>
            <th>Nombre</th>
            <th>Referencia</th>
            <th>Pvp</th>
            <th>Marca</th>
            <th>Unidad de Medida</th>
            <th>
                <button id="btn-add" class="btn btn-primary btn-xs" ng-click="toggle('add', 0)">Nuevo Producto</button>
            </th>
        </tr>
        </thead>
        <tbody>
        <tr ng-repeat="producto in dataProductos.productos">
            <td><% producto.nombre %></td>
            <td><% producto.referencia %></td>
            <td><% producto.pvp %></td>
            <td><% producto.marca.marca %></td>
            <td><% producto.unidad_medida.unidad_medida %></td>
            <td>
                <button class="btn btn-default btn-xs btn-detail" ng-click="toggle('edit', producto.id)">Editar</button>
                <button class="btn btn-danger btn-xs btn-delete" ng-click="confirmDelete(producto.id)">Eliminar</button>
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
                    <form name="frmproductos" class="form-horizontal" novalidate="">

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Nombre</label>

                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="nombre" name="nombre"
                                       placeholder="Nombre" value="<%nombre%>"
                                       ng-model="producto.nombre" ng-required="true">
                                        <span class="help-inline"
                                              ng-show="frmproductos.nombre.$invalid && frmproductos.nombre.$touched">Nombre es requerido</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Referencia</label>

                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="referencia" name="referencia"
                                       placeholder="Referencia" value="<%referencia%>"
                                       ng-model="producto.referencia" ng-required="true">
                                    <span class="help-inline"
                                          ng-show="frmproductos.referencia.$invalid && frmproductos.referencia.$touched">Referencia es requerido</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Pvp</label>

                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="pvp" name="pvp"
                                       placeholder="Pvp" value="<%pvp%>"
                                       ng-model="producto.pvp" ng-required="true">
                                    <span class="help-inline"
                                          ng-show="frmproductos.pvp.$invalid && frmproductos.pvp.$touched">Pvp es requerido</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Marca</label>

                            <div class="col-sm-9">
                                <select name="marca_id" id="marca_id" class="form-control" ng-model="producto.marca_id" ng-required="true">
                                    <option ng-repeat="option in dataProductos.marcas" value="<%option.id%>"><%option.marca%></option>
                                </select>
                                    <span class="help-inline"
                                          ng-show="frmproductos.marca_id.$invalid && frmproductos.marca_id.$touched">Marca es requerido</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Unidad de Medida</label>

                            <div class="col-sm-9">
                                <select name="unidad_medida_id" id="unidad_medida_id" class="form-control" ng-model="producto.unidad_medida_id" ng-required="true">
                                    <option ng-repeat="option in dataProductos.unidadesMedidas" value="<%option.id%>"><%option.unidad_medida%></option>
                                </select>
                                    <span class="help-inline"
                                          ng-show="frmproductos.unidad_medida_id.$invalid && frmproductos.unidad_medida_id.$touched">Unidad de Medida es requerido</span>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="btn-save" ng-click="save(modalstate, id)"
                            ng-disabled="frmproductos.$invalid">Guardar
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@stop