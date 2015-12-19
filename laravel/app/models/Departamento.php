<?php

class Departamento extends Eloquent {

    protected $table = 'departamento';

    protected $fillable = array('id', 'nombre', 'descripcion', 'pais_id');

    public function ciudades()
    {
        return $this->hasMany('ciudad');
    }

    public function pais()
    {
        return $this->hasOne('Pais', 'id', 'pais_id');
    }

}