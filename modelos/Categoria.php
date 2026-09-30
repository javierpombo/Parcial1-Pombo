<?php
// Categoria.php

class Categoria {

    public $id;
    public $nombre;
    public $activo;
    public $subcategorias;   // array de objetos Subcategoria

    public function __construct($id, $nombre, $activo) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->activo = $activo;
        $this->subcategorias = array();
    }

    // agrega una subcategoria a esta categoria
    public function agregarSub($sub) {
        $this->subcategorias[] = $sub;
    }
}
?>
