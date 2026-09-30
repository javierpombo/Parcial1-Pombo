<?php
// inicio.php - pagina principal del sitio
require __DIR__ . '/../config.php';
$titulo = 'Inicio';
$activo = 'inicio';

// busco 6 productos destacados que esten activos
$destacados = array();
foreach ($productos as $p) {
    if ($p->destacado && $p->activo) {
        $destacados[] = $p;
    }
    if (count($destacados) == 6) {
        break;
    }
}

include __DIR__ . '/../plantillas/cabecera.php';
?>

<div class="portada mt-0" style="border-radius:0 0 12px 12px">
    <div class="container contenedor">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h1>Todo lo que necesitás, cerca tuyo</h1>
                <p class="lead">Más de 40 sucursales en CABA y GBA. Comprá online y recibí o retirá tu pedido.</p>
                <a href="<?php echo RUTA ?>/front/productos.php" class="boton"><i class="fas fa-capsules"></i> Ver productos</a>
            </div>
            <div class="col-lg-4 text-center d-none d-lg-block">
                <i class="fas fa-plus-circle" style="font-size:9rem;opacity:.85"></i>
            </div>
        </div>
    </div>
</div>

<div class="row text-center mt-4">
    <div class="col-md-4 mb-3">
        <div class="caja h-100">
            <i class="fas fa-store fa-2x" style="color:var(--cyan)"></i>
            <h6 class="mt-2 font-weight-bold">Retiro en sucursal</h6>
            <p class="text-muted small mb-0">Compra online y retira en 2 horas en la sucursal mas cerca.</p>
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="caja h-100">
            <i class="fas fa-credit-card fa-2x" style="color:var(--cyan)"></i>
            <h6 class="mt-2 font-weight-bold">Hasta 6 cuotas sin interes</h6>
            <p class="text-muted small mb-0">Con todas las tarjetas de credito bancarias.</p>
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="caja h-100">
            <i class="fas fa-clock fa-2x" style="color:var(--cyan)"></i>
            <h6 class="mt-2 font-weight-bold">Farmacia de turno</h6>
            <p class="text-muted small mb-0">Sucursales abiertas las 24 horas todos los dias.</p>
        </div>
    </div>
</div>

<h3 class="titulo-seccion">Lo más elegido</h3>
<div class="row">
    <?php foreach ($destacados as $p): ?>
        <div class="col-6 col-md-4 col-lg-2 mb-4">
            <div class="tarjeta">
                <a href="<?php echo RUTA ?>/front/producto.php?id=<?php echo $p->id ?>" class="foto">
                    <img src="<?php echo RUTA ?>/img/productos/<?php echo $p->imagen ?>" alt="<?php echo $p->nombre ?>">
                </a>
                <div class="datos">
                    <span class="marca-prod"><?php echo $p->marca ?></span>
                    <a class="nombre-prod" href="<?php echo RUTA ?>/front/producto.php?id=<?php echo $p->id ?>"><?php echo $p->nombre ?></a>
                    <div class="estrellas"><?php echo $p->estrellas() ?></div>
                    <span class="valor"><?php echo $p->precioFormato() ?></span>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<div class="text-center mb-4">
    <a href="<?php echo RUTA ?>/front/productos.php" class="boton-borde">Ver todo el catalogo</a>
</div>

<?php include __DIR__ . '/../plantillas/pie.php'; ?>
