<?php

class ItemMenu extends Eloquent {

    protected $table = 'item_menu';

    protected $fillable = array('id', 'permiso_id', 'menu_id');

    public function permiso()
    {
        return $this->hasOne('Permiso', 'id', 'permiso_id');
    }

}