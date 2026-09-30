<?php
// productos.php - catalogo con filtros y orden
require __DIR__ . '/../config.php';
$titulo = 'Productos';
$activo = 'productos';

// leo los filtros de la url
$cat = '';
if (isset($_GET['cat'])) { $cat = $_GET['cat']; }
$sub = '';
if (isset($_GET['sub'])) { $sub = $_GET['sub']; }
$marcaSel = '';
if (isset($_GET['marca'])) { $marcaSel = $_GET['marca']; }
$orden = 'destacados';
if (isset($_GET['orden'])) { $orden = $_GET['orden']; }
$busqueda = '';
if (isset($_GET['busqueda'])) { $busqueda = trim($_GET['busqueda']); }

// funciones para ordenar
function porRanking($a, $b) {
    if ($a->ranking == $b->ranking) { return 0; }
    return ($a->ranking < $b->ranking) ? 1 : -1;
}
function porNombre($a, $b) {
    return strcmp($a->nombre, $b->nombre);
}
function porDestacado($a, $b) {
    if ($a->destacado == $b->destacado) { return 0; }
    return $a->destacado ? -1 : 1;
}

// filtro los productos activos
$lista = array();
foreach ($productos as $p) {
    if (!$p->activo) { continue; }
    if ($cat != '' && $p->categoria != $cat) { continue; }
    if ($sub != '' && $p->subcategoria != $sub) { continue; }
    if ($marcaSel != '' && $p->marca != $marcaSel) { continue; }
    if ($busqueda != '' && stripos($p->nombre, $busqueda) === false) { continue; }
    $lista[] = $p;
}

// aplico el orden
if ($orden == 'ranking') {
    usort($lista, 'porRanking');
} elseif ($orden == 'az') {
    usort($lista, 'porNombre');
} elseif ($orden == 'za') {
    usort($lista, 'porNombre');
    $lista = array_reverse($lista);
} else {
    usort($lista, 'porDestacado');
}

include __DIR__ . '/../plantillas/cabecera.php';
?>

<h1 class="titulo-seccion">Productos</h1>

<div class="row">
    <div class="col-lg-3 mb-4">
        <div class="caja">
            <h2 class="h6 font-weight-bold">Categorias</h2>
            <ul class="lista-categorias">
                <?php foreach ($categorias as $c): ?>
                    <?php if ($c->activo): ?>
                        <li>
                            <a href="?cat=<?php echo urlencode($c->nombre) ?>"><?php echo $c->nombre ?></a>
                            <ul>
                                <?php foreach ($c->subcategorias as $s): ?>
                                    <?php if ($s->activo): ?>
                                        <li><a href="?sub=<?php echo urlencode($s->nombre) ?>"><?php echo $s->nombre ?></a></li>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </ul>
                        </li>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>

            <form method="get">
                <?php if ($cat != ''): ?>
                    <input type="hidden" name="cat" value="<?php echo $cat ?>">
                <?php endif; ?>
                <?php if ($sub != ''): ?>
                    <input type="hidden" name="sub" value="<?php echo $sub ?>">
                <?php endif; ?>
                <?php if ($busqueda != ''): ?>
                    <input type="hidden" name="busqueda" value="<?php echo $busqueda ?>">
                <?php endif; ?>

                <div class="form-group">
                    <label for="marca">Marca</label>
                    <select name="marca" id="marca" class="form-control">
                        <option value="">Todas</option>
                        <?php foreach ($marcas as $m): ?>
                            <?php if ($m->activo): ?>
                                <option value="<?php echo $m->nombre ?>" <?php if ($m->nombre == $marcaSel) { echo 'selected'; } ?>><?php echo $m->nombre ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="orden">Ordenar por</label>
                    <select name="orden" id="orden" class="form-control">
                        <option value="destacados" <?php if ($orden == 'destacados') { echo 'selected'; } ?>>Destacados</option>
                        <option value="ranking" <?php if ($orden == 'ranking') { echo 'selected'; } ?>>Mejor rankeados</option>
                        <option value="az" <?php if ($orden == 'az') { echo 'selected'; } ?>>A-Z</option>
                        <option value="za" <?php if ($orden == 'za') { echo 'selected'; } ?>>Z-A</option>
                    </select>
                </div>

                <button type="submit" class="boton">Filtrar</button>
                <a href="<?php echo RUTA ?>/front/productos.php" class="ml-2">Limpiar</a>
            </form>
        </div>
    </div>

    <div class="col-lg-9">
        <?php if (count($lista) > 0): ?>
            <div class="row">
                <?php foreach ($lista as $p): ?>
                    <div class="col-6 col-md-4 mb-4">
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
        <?php else: ?>
            <div class="vacio">
                <i class="fas fa-box-open fa-3x"></i>
                <p>No hay productos para mostrar</p>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php include __DIR__ . '/../plantillas/pie.php'; ?>
