<?php

class Ciudad extends Eloquent {

    protected $table = 'ciudad';

    protected $fillable = array('id', 'nombre', 'descripcion', 'departamento_id');

    public function clientes()
    {
        return $this->hasMany('Cliente');
    }

    public function departamento()
    {
        return $this->hasOne('Departamento', 'id', 'departamento_id');
    }

}