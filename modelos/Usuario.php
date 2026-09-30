<?php
// Usuario.php

class Usuario {

    public $id;
    public $nombre;
    public $email;
    public $perfil;
    public $activo;

    public function __construct($id, $nombre, $email, $perfil, $activo) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->email = $email;
        $this->perfil = $perfil;
        $this->activo = $activo;
    }
}
?>
