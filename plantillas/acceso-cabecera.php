<?php
// acceso-cabecera.php - para el login y el registro (pantallas sin menu)
if (!isset($titulo)) { $titulo = 'Acceso'; }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $titulo ?> | City Farmac</title>
    <link rel="stylesheet" href="<?php echo RUTA ?>/bootstrap/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo RUTA ?>/bootstrap/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="<?php echo RUTA ?>/css/panel.css">
</head>
<body>
<div class="fondo-acceso">
