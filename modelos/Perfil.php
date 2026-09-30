<?php
// Perfil.php

class Perfil {

    public $id;
    public $nombre;
    public $secciones;   // array con las secciones del panel a las que entra
    public $activo;

    public function __construct($id, $nombre, $secciones, $activo) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->secciones = $secciones;
        $this->activo = $activo;
    }

    // devuelve true si el perfil tiene acceso a una seccion
    public function tieneAcceso($seccion) {
        return in_array($seccion, $this->secciones);
    }
}
?>
