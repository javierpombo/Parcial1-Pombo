<?php
// Producto.php

class Producto {

    public $id;
    public $nombre;
    public $marca;
    public $modelo;
    public $precio;
    public $categoria;
    public $subcategoria;
    public $ranking;
    public $destacado;
    public $activo;
    public $imagen;
    public $descripcion;

    public function __construct($d) {
        $this->id = $d['id'];
        $this->nombre = $d['nombre'];
        $this->marca = $d['marca'];
        $this->modelo = $d['modelo'];
        $this->precio = $d['precio'];
        $this->categoria = $d['categoria'];
        $this->subcategoria = $d['subcategoria'];
        $this->ranking = $d['ranking'];
        $this->destacado = $d['destacado'];
        $this->activo = $d['activo'];
        $this->imagen = $d['imagen'];
        $this->descripcion = $d['descripcion'];
    }

    // precio con el signo $ y los puntos de miles
    public function precioFormato() {
        return '$' . number_format($this->precio, 0, ',', '.');
    }

    // devuelve las estrellas del ranking como html (llenas y vacias)
    public function estrellas() {
        $texto = '';
        for ($i = 1; $i <= 5; $i++) {
            if ($i <= round($this->ranking)) {
                $texto .= '<i class="fas fa-star"></i>';
            } else {
                $texto .= '<i class="far fa-star"></i>';
            }
        }
        return $texto;
    }
}
?>
