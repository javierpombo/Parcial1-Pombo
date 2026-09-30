<?php
// Subcategoria.php

class Subcategoria {

    public $id;
    public $nombre;
    public $activo;

    public function __construct($id, $nombre, $activo) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->activo = $activo;
    }
}
?>
