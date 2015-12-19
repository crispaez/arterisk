<?php

class Pais extends Eloquent {

    protected $table = 'pais';

    protected $fillable = array('id', 'nombre', 'descripcion');

    public function departamentos()
    {
        return $this->hasMany('departamento');
    }

}