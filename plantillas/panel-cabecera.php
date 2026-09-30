<?php
// panel-cabecera.php - barra superior y menu del panel
if (!isset($titulo)) { $titulo = 'Panel'; }
if (!isset($activo)) { $activo = ''; }

$secciones = array(
    'inicio'      => array('panel.php',       'Inicio'),
    'productos'   => array('productos.php',   'Productos'),
    'categorias'  => array('categorias.php',  'Categorias'),
    'marcas'      => array('marcas.php',       'Marcas'),
    'comentarios' => array('comentarios.php', 'Comentarios'),
    'usuarios'    => array('usuarios.php',     'Usuarios'),
    'perfiles'    => array('perfiles.php',     'Perfiles')
);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $titulo ?> | Admin City Farmac</title>
    <link rel="stylesheet" href="<?php echo RUTA ?>/bootstrap/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo RUTA ?>/bootstrap/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="<?php echo RUTA ?>/css/panel.css">
</head>
<body>

<div class="barra-panel">
    <div class="container contenedor d-flex justify-content-between align-items-center">
        <a class="titulo-panel" href="<?php echo RUTA ?>/admin/panel.php"><span class="logo">+</span> City Farmac Admin</a>
        <div>
            <a href="<?php echo RUTA ?>/front/inicio.php" class="text-white mr-3" style="text-decoration:none"><i class="fas fa-globe"></i> Ver sitio</a>
            <a href="<?php echo RUTA ?>/admin/login.php" class="text-white" style="text-decoration:none"><i class="fas fa-sign-out-alt"></i> Salir</a>
        </div>
    </div>
</div>

<div class="menu-panel">
    <div class="container contenedor">
        <?php foreach ($secciones as $clave => $s): ?>
            <a href="<?php echo RUTA ?>/admin/<?php echo $s[0] ?>" class="<?php if ($activo == $clave) { echo 'activo'; } ?>"><?php echo $s[1] ?></a>
        <?php endforeach; ?>
    </div>
</div>

<div class="contenido-panel">
    <h2 class="titulo-pagina"><?php echo $titulo ?></h2>
