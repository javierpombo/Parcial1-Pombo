<?php
// config.php

// armo la ruta base del proyecto para que los links anden en cualquier carpeta.
// si hiciera falta se puede escribir a mano, por ejemplo: define('RUTA', '/city-farmac-v2');
$carpeta = str_replace('\\', '/', __DIR__);
$raizServidor = str_replace('\\', '/', $_SERVER['DOCUMENT_ROOT']);
define('RUTA', rtrim(str_replace($raizServidor, '', $carpeta), '/'));

// cargo las clases del modelo
require_once __DIR__ . '/modelos/Subcategoria.php';
require_once __DIR__ . '/modelos/Categoria.php';
require_once __DIR__ . '/modelos/Marca.php';
require_once __DIR__ . '/modelos/Producto.php';
require_once __DIR__ . '/modelos/Comentario.php';
require_once __DIR__ . '/modelos/Usuario.php';
require_once __DIR__ . '/modelos/Perfil.php';

// cargo los datos de ejemplo (crea los objetos)
require_once __DIR__ . '/datos/datos.php';
?>
