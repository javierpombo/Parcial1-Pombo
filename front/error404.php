<?php
// error404.php - pagina no encontrada
require __DIR__ . '/../config.php';
$titulo = 'Pagina no encontrada';
$activo = '';

include __DIR__ . '/../plantillas/cabecera.php';
?>

<div class="error404">
    <div class="numero">404</div>
    <h1>No encontramos la pagina</h1>
    <p>La pagina que buscas no existe o el producto ya no esta disponible.</p>
    <a href="<?php echo RUTA ?>/front/inicio.php" class="boton">Ir a la página principal</a>
</div>

<?php include __DIR__ . '/../plantillas/pie.php'; ?>
