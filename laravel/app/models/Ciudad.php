<?php

class Ciudad extends Eloquent {

    protected $table = 'ciudad';

    protected $fillable = array('id', 'nombre', 'descripcion', 'departamento_id');

}