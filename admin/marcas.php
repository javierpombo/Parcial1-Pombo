<?php
// marcas.php (admin) - lista de marcas y formulario de alta
require __DIR__ . '/../config.php';
$titulo = 'Marcas';
$activo = 'marcas';
include __DIR__ . '/../plantillas/panel-cabecera.php';
?>

<div id="aviso"></div>

<div class="d-flex justify-content-end align-items-center flex-wrap mb-3">
    <button id="btnNuevo" class="boton"><i class="fas fa-plus"></i> Nueva marca</button>
</div>

<!-- formulario de alta/edicion (aparece al tocar Nuevo) -->
<div id="cajaForm" class="caja-form" style="display:none">
    <h5 class="mb-3">Cargar / editar marca</h5>
    <form class="form-sim" data-ok="Marca guardada (simulado, todavia sin base de datos)." novalidate>
        <div class="form-group">
            <label for="mNombre">Nombre</label>
            <input type="text" class="form-control" id="mNombre" required>
        </div>
        <button type="submit" class="boton">Guardar</button>
    </form>
</div>

<input type="text" id="buscador" class="buscar-tabla mb-3" placeholder="Buscar...">

<div class="table-responsive">
    <table class="tabla-datos">
        <thead>
            <tr>
                <th>Nombre</th><th>Estado</th><th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($marcas as $m): ?>
                <tr>
                    <td><?php echo $m->nombre ?></td>
                    <td>
                        <?php if ($m->activo): ?>
                            <span class="chip chip-si">Activo</span>
                        <?php else: ?>
                            <span class="chip chip-no">Inactivo</span>
                        <?php endif; ?>
                    </td>
                    <td style="white-space:nowrap">
                        <a class="accion" title="Modificar"><i class="fas fa-pen"></i></a>
                        <?php if ($m->activo): ?>
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

<?php include __DIR__ . '/../plantillas/panel-pie.php'; ?>
