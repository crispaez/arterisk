<?php

class Producto extends Eloquent {

    protected $table = 'producto';

    protected $fillable = array('id', 'nombre', 'referencia', 'pvp', 'marca_id', 'unidad_medida_id');

    public function marca()
    {
        return $this->hasOne('Marca', 'id', 'marca_id');
    }

    public function unidadMedida()
    {
        return $this->hasOne('UnidadMedida', 'id', 'unidad_medida_id');
    }

}