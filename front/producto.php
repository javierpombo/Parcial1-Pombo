<?php
// producto.php - detalle de un producto
require __DIR__ . '/../config.php';

// busco el producto por id
$id = 0;
if (isset($_GET['id'])) { $id = (int) $_GET['id']; }
$prod = null;
foreach ($productos as $p) {
    if ($p->id == $id) {
        $prod = $p;
        break;
    }
}

// si no existe o esta inactivo, va al 404
if ($prod === null || !$prod->activo) {
    header('Location: ' . RUTA . '/front/error404.php');
    exit;
}

$titulo = $prod->nombre;
$activo = 'productos';

include __DIR__ . '/../plantillas/cabecera.php';
?>

<nav class="mt-3 mb-3 small">
    <a href="<?php echo RUTA ?>/front/inicio.php">Inicio</a> /
    <a href="<?php echo RUTA ?>/front/productos.php">Productos</a> /
    <span><?php echo $prod->nombre ?></span>
</nav>

<div class="row mb-4">
    <div class="col-md-5 mb-3">
        <div class="foto-grande">
            <img src="<?php echo RUTA ?>/img/productos/<?php echo $prod->imagen ?>" alt="<?php echo $prod->nombre ?>">
        </div>
    </div>
    <div class="col-md-7">
        <span class="marca-prod"><?php echo $prod->marca ?></span>
        <h1><?php echo $prod->nombre ?></h1>
        <p class="text-muted"><?php echo $prod->modelo ?></p>
        <div class="estrellas"><?php echo $prod->estrellas() ?></div>
        <p class="valor h3 mt-2"><?php echo $prod->precioFormato() ?></p>
        <p><?php echo $prod->descripcion ?></p>
        <a href="<?php echo RUTA ?>/front/productos.php" class="boton-borde">Volver al catalogo</a>
    </div>
</div>

<h2 class="titulo-seccion">Opiniones</h2>
<?php
// junto los comentarios aprobados de este producto
$opiniones = array();
foreach ($comentarios as $c) {
    if ($c->producto == $prod->nombre && $c->aprobado) {
        $opiniones[] = $c;
    }
}
?>
<?php if (count($opiniones) > 0): ?>
    <?php foreach ($opiniones as $c): ?>
        <div class="comentario">
            <span class="autor"><?php echo $c->email ?></span>
            <div class="estrellas"><?php echo $c->estrellas() ?></div>
            <p class="mb-1"><?php echo $c->texto ?></p>
            <small class="text-muted"><?php echo $c->fecha ?></small>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <p>Todavia no hay opiniones para este producto.</p>
<?php endif; ?>

<h2 class="titulo-seccion">Dejanos tu opinion</h2>
<div class="caja mb-4">
    <div id="aviso"></div>
    <form class="form-sim" data-ok="Gracias por tu opinion, la vamos a revisar antes de publicarla." novalidate>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="texto">Comentario</label>
            <textarea class="form-control" id="texto" name="texto" rows="4" required></textarea>
        </div>
        <div class="form-group">
            <span class="d-block">Puntaje</span>
            <div class="elegir-estrellas">
                <input type="radio" id="p5" name="puntaje" value="5" required><label for="p5" title="5 estrellas"><i class="fas fa-star"></i></label>
                <input type="radio" id="p4" name="puntaje" value="4"><label for="p4" title="4 estrellas"><i class="fas fa-star"></i></label>
                <input type="radio" id="p3" name="puntaje" value="3"><label for="p3" title="3 estrellas"><i class="fas fa-star"></i></label>
                <input type="radio" id="p2" name="puntaje" value="2"><label for="p2" title="2 estrellas"><i class="fas fa-star"></i></label>
                <input type="radio" id="p1" name="puntaje" value="1"><label for="p1" title="1 estrella"><i class="fas fa-star"></i></label>
            </div>
        </div>
        <button type="submit" class="boton">Enviar opinion</button>
    </form>
</div>

<?php include __DIR__ . '/../plantillas/pie.php'; ?>
