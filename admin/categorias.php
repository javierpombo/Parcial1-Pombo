<?php
// categorias.php (admin) - lista de categorias y subcategorias
require __DIR__ . '/../config.php';
$titulo = 'Categorias';
$activo = 'categorias';

// si viene ?padre= busco esa categoria por id
$padre = null;
if (isset($_GET['padre'])) {
    foreach ($categorias as $c) {
        if ($c->id == $_GET['padre']) {
            $padre = $c;
        }
    }
}
include __DIR__ . '/../plantillas/panel-cabecera.php';
?>

<div id="aviso"></div>

<div class="d-flex justify-content-end mb-3">
    <button id="btnNuevo" class="boton"><i class="fas fa-plus"></i> Nuevo</button>
</div>

<div id="cajaForm" class="caja-form" style="display:none">
    <h5 class="mb-3">Cargar / editar categoria</h5>
    <form class="form-sim" data-ok="Categoria guardada (simulado, todavia sin base de datos)." novalidate>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="cNombre">Nombre</label>
                <input type="text" class="form-control" id="cNombre" required>
            </div>
            <div class="form-group col-md-6">
                <label for="cPadre">Pertenece a (opcional)</label>
                <select class="form-control" id="cPadre">
                    <option value="">Ninguna (categoria principal)</option>
                    <?php foreach ($categorias as $c): ?>
                        <option value="<?php echo $c->id ?>"><?php echo $c->nombre ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <button type="submit" class="boton">Guardar</button>
    </form>
</div>

<input type="text" id="buscador" class="buscar-tabla mb-3" placeholder="Buscar...">

<?php if ($padre): ?>
    <h5 class="mb-3">Subcategorías de: <?php echo $padre->nombre ?></h5>
    <p><a href="<?php echo RUTA ?>/admin/categorias.php"><i class="fas fa-arrow-left"></i> Volver a todas las categorias</a></p>
    <div class="table-responsive">
        <table class="tabla-datos">
            <thead>
                <tr><th>Nombre</th><th>Estado</th><th>Acciones</th></tr>
            </thead>
            <tbody>
                <?php foreach ($padre->subcategorias as $s): ?>
                    <tr>
                        <td><?php echo $s->nombre ?></td>
                        <td>
                            <?php if ($s->activo): ?>
                                <span class="chip chip-si">Activo</span>
                            <?php else: ?>
                                <span class="chip chip-no">Inactivo</span>
                            <?php endif; ?>
                        </td>
                        <td style="white-space:nowrap">
                            <a class="accion" title="Modificar"><i class="fas fa-pen"></i></a>
                            <?php if ($s->activo): ?>
                                <a class="accion" title="Inactivar"><i class="fas fa-toggle-on"></i></a>
                            <?php else: ?>
                                <a class="accion" title="Activar"><i class="fas fa-toggle-off"></i></a>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php else: ?>
    <div class="table-responsive">
        <table class="tabla-datos">
            <thead>
                <tr><th>Nombre</th><th>Subcategorías</th><th>Estado</th><th>Acciones</th></tr>
            </thead>
            <tbody>
                <?php foreach ($categorias as $c): ?>
                    <tr>
                        <td><?php echo $c->nombre ?></td>
                        <td><?php echo count($c->subcategorias) ?></td>
                        <td>
                            <?php if ($c->activo): ?>
                                <span class="chip chip-si">Activo</span>
                            <?php else: ?>
                                <span class="chip chip-no">Inactivo</span>
                            <?php endif; ?>
                        </td>
                        <td style="white-space:nowrap">
                            <a class="accion" title="Modificar"><i class="fas fa-pen"></i></a>
                            <?php if ($c->activo): ?>
                                <a class="accion" title="Inactivar"><i class="fas fa-toggle-on"></i></a>
                            <?php else: ?>
                                <a class="accion" title="Activar"><i class="fas fa-toggle-off"></i></a>
                            <?php endif; ?>
                            <a class="accion" title="Ver subcategorias" href="?padre=<?php echo $c->id ?>"><i class="fas fa-sitemap"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php endif; ?>

<?php include __DIR__ . '/../plantillas/panel-pie.php'; ?>
