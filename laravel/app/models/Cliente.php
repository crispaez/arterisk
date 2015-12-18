<?php

class Cliente extends Eloquent {

    protected $table = 'cliente';

    protected $fillable = array('id', 'nit', 'nombre', 'direccion', 'telefono', 'celular', 'correo', 'dias_plazo_pago', 'estado','ciudad_id');

}