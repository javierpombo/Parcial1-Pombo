<?php
// comentarios.php (admin) - moderacion de comentarios
require __DIR__ . '/../config.php';
$titulo = 'Comentarios';
$activo = 'comentarios';

// filtro por estado (?estado=aprobados|pendientes)
$estado = '';
if (isset($_GET['estado'])) {
    $estado = $_GET['estado'];
}

// filtro por producto (?producto=ID)
$nombreProducto = '';
$idProducto = '';
if (isset($_GET['producto'])) {
    $idProducto = $_GET['producto'];
    foreach ($productos as $p) {
        if ($p->id == $idProducto) {
            $nombreProducto = $p->nombre;
        }
    }
}

include __DIR__ . '/../plantillas/panel-cabecera.php';
?>

<div id="aviso"></div>

<?php if ($nombreProducto != ''): ?>
    <p class="mb-3">
        <strong>Comentarios de: <?php echo $nombreProducto ?></strong>
        - <a href="<?php echo RUTA ?>/admin/comentarios.php">Ver todos</a>
    </p>
<?php endif; ?>

<div class="d-flex justify-content-between align-items-center flex-wrap mb-3">
    <form method="get" class="form-inline">
        <?php if ($idProducto != ''): ?>
            <input type="hidden" name="producto" value="<?php echo $idProducto ?>">
        <?php endif; ?>
        <label for="filtroEstado" class="mr-2">Estado</label>
        <select id="filtroEstado" name="estado" class="form-control form-control-sm mr-2" onchange="this.form.submit()">
            <option value="" <?php if ($estado == '') { echo 'selected'; } ?>>Todos</option>
            <option value="aprobados" <?php if ($estado == 'aprobados') { echo 'selected'; } ?>>Aprobados</option>
            <option value="pendientes" <?php if ($estado == 'pendientes') { echo 'selected'; } ?>>Pendientes</option>
        </select>
    </form>
</div>

<input type="text" id="buscador" class="buscar-tabla mb-3" placeholder="Buscar...">

<div class="table-responsive">
    <table class="tabla-datos">
        <thead>
            <tr>
                <th>Comentario</th><th>Ranking</th><th>Fecha</th><th>Producto</th><th>Estado</th><th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($comentarios as $c): ?>
                <?php
                // decido si la fila se muestra segun los filtros
                $mostrar = true;
                if ($estado == 'aprobados' && !$c->aprobado) { $mostrar = false; }
                if ($estado == 'pendientes' && $c->aprobado) { $mostrar = false; }
                if ($nombreProducto != '' && $c->producto != $nombreProducto) { $mostrar = false; }
                ?>
                <?php if ($mostrar): ?>
                    <tr>
                        <td><?php echo $c->texto ?><br><small class="text-muted"><?php echo $c->email ?></small></td>
                        <td><span class="estrellas"><?php echo $c->estrellas() ?></span></td>
                        <td><?php echo $c->fecha ?></td>
                        <td><?php echo $c->producto ?></td>
                        <td>
                            <?php if ($c->aprobado): ?>
                                <span class="chip chip-si">Aprobado</span>
                            <?php else: ?>
                                <span class="chip chip-no">Pendiente</span>
                            <?php endif; ?>
                        </td>
                        <td style="white-space:nowrap">
                            <?php if ($c->aprobado): ?>
                                <a class="accion" title="Desaprobar"><i class="fas fa-times"></i></a>
                            <?php else: ?>
                                <a class="accion" title="Aprobar"><i class="fas fa-check"></i></a>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include __DIR__ . '/../plantillas/panel-pie.php'; ?>
