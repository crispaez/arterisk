<?php

class Marca extends Eloquent {

    protected $table = 'marca';

    protected $fillable = array('id', 'marca', 'descripcion');

}