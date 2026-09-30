<?php
// cabecera.php - parte de arriba del sitio, se incluye en todas las paginas del front
if (!isset($titulo)) { $titulo = 'City Farmac'; }
if (!isset($activo)) { $activo = ''; }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $titulo ?> | City Farmac</title>
    <link rel="stylesheet" href="<?php echo RUTA ?>/bootstrap/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo RUTA ?>/bootstrap/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="<?php echo RUTA ?>/css/estilo.css">
</head>
<body>

<div class="barra">
    <div class="container contenedor">
        <nav class="navbar navbar-expand-lg p-0">
            <a class="marca" href="<?php echo RUTA ?>/front/inicio.php"><span class="logo">+</span> City Farmac</a>
            <button class="navbar-toggler bg-light" type="button" data-toggle="collapse" data-target="#menu" aria-label="Menu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="menu">
                <form class="buscador form-inline mx-lg-auto my-2 my-lg-0" method="get" action="<?php echo RUTA ?>/front/productos.php">
                    <div class="input-group">
                        <input class="form-control" type="text" name="busqueda" placeholder="Buscar productos...">
                        <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                    </div>
                </form>
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link <?php if ($activo == 'inicio') { echo 'font-weight-bold'; } ?>" href="<?php echo RUTA ?>/front/inicio.php">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link <?php if ($activo == 'productos') { echo 'font-weight-bold'; } ?>" href="<?php echo RUTA ?>/front/productos.php">Productos</a></li>
                    <li class="nav-item"><a class="nav-link <?php if ($activo == 'contacto') { echo 'font-weight-bold'; } ?>" href="<?php echo RUTA ?>/front/contacto.php">Contacto</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo RUTA ?>/admin/login.php"><i class="fas fa-lock"></i> Admin</a></li>
                </ul>
            </div>
        </nav>
    </div>
</div>

<div class="container contenedor">
