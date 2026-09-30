<?php
// index.php - redirige a la home del sitio
require __DIR__ . '/config.php';
header('Location: ' . RUTA . '/front/inicio.php');
?>
