<?php

class Permiso extends Eloquent {

    protected $table = 'permiso';

    protected $fillable = array('id', 'ruta', 'perfil_id');

    public function perfil()
    {
        return $this->hasOne('Perfil', 'id', 'perfil_id');
    }

}