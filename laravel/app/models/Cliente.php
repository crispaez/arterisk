<?php

class Cliente extends Eloquent {

    protected $table = 'cliente';

    protected $fillable = array('id', 'nit', 'nombre', 'direccion', 'telefono', 'celular', 'correo', 'dias_plazo_pago', 'estado', 'pais_id', 'departamento_id', 'ciudad_id');

    public function ciudad()
    {
        return $this->hasOne('Ciudad', 'id', 'ciudad_id');
    }
}