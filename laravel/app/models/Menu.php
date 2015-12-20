<?php

class Menu extends Eloquent {

    protected $table = 'menu';

    protected $fillable = array('id', 'nombre', 'descripcion');

    public function itemsMenu()
    {
        return $this->hasmany('ItemMenu');
    }

}