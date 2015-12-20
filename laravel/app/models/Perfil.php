<?php

class Perfil extends Eloquent {

    protected $table = 'perfil';

    protected $fillable = array('id', 'nombre', 'descripcion');

}