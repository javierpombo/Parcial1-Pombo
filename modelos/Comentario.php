<?php
// Comentario.php

class Comentario {

    public $id;
    public $producto;
    public $email;
    public $texto;
    public $ranking;
    public $fecha;
    public $aprobado;

    public function __construct($d) {
        $this->id = $d['id'];
        $this->producto = $d['producto'];
        $this->email = $d['email'];
        $this->texto = $d['texto'];
        $this->ranking = $d['ranking'];
        $this->fecha = $d['fecha'];
        $this->aprobado = $d['aprobado'];
    }

    public function estrellas() {
        $texto = '';
        for ($i = 1; $i <= 5; $i++) {
            if ($i <= $this->ranking) {
                $texto .= '<i class="fas fa-star"></i>';
            } else {
                $texto .= '<i class="far fa-star"></i>';
            }
        }
        return $texto;
    }
}
?>
