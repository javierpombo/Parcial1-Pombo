<?php
// panel.php (admin) - inicio del panel con resumen
require __DIR__ . '/../config.php';
$titulo = 'Inicio';
$activo = 'inicio';

// cuento los comentarios que todavia no estan aprobados
$pendientes = 0;
foreach ($comentarios as $c) {
    if (!$c->aprobado) {
        $pendientes++;
    }
}

// secciones del panel: archivo, nombre e icono
$tarjetas = array(
    array('productos.php',   'Productos',   'fa-pills'),
    array('categorias.php',  'Categorias',  'fa-sitemap'),
    array('marcas.php',      'Marcas',      'fa-tags'),
    array('comentarios.php', 'Comentarios', 'fa-comments'),
    array('usuarios.php',    'Usuarios',    'fa-users'),
    array('perfiles.php',    'Perfiles',    'fa-user-shield')
);
include __DIR__ . '/../plantillas/panel-cabecera.php';
?>

<div id="aviso"></div>

<p class="lead">Bienvenida al panel de City Farmac</p>

<div class="row mb-4">
    <div class="col-md-4 mb-3">
        <div class="tarjeta-numero">
            <div class="n"><?php echo count($productos) ?></div>
            <div>Productos</div>
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="tarjeta-numero">
            <div class="n"><?php echo count($categorias) ?></div>
            <div>Categorias</div>
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="tarjeta-numero">
            <div class="n"><?php echo $pendientes ?></div>
            <div>Opiniones sin revisar</div>
        </div>
    </div>
</div>

<div class="row">
    <?php foreach ($tarjetas as $t): ?>
        <div class="col-6 col-md-4 mb-3">
            <a class="tarjeta-seccion d-block" href="<?php echo RUTA ?>/admin/<?php echo $t[0] ?>">
                <i class="fas <?php echo $t[2] ?> fa-2x"></i>
                <h5 class="mt-2 mb-0"><?php echo $t[1] ?></h5>
            </a>
        </div>
    <?php endforeach; ?>
</div>

<?php include __DIR__ . '/../plantillas/panel-pie.php'; ?>
