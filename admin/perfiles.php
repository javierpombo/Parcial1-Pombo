<?php
// perfiles.php (admin) - lista de perfiles y formulario de alta
require __DIR__ . '/../config.php';
$titulo = 'Perfiles';
$activo = 'perfiles';
include __DIR__ . '/../plantillas/panel-cabecera.php';

// secciones que se pueden asignar a un perfil
$opciones = array(
    'inicio'      => 'Inicio',
    'productos'   => 'Productos',
    'categorias'  => 'Categorias',
    'marcas'      => 'Marcas',
    'comentarios' => 'Comentarios',
    'usuarios'    => 'Usuarios',
    'perfiles'    => 'Perfiles'
);
?>

<div id="aviso"></div>

<div class="d-flex justify-content-end align-items-center flex-wrap mb-3">
    <button id="btnNuevo" class="boton"><i class="fas fa-plus"></i> Nuevo perfil</button>
</div>

<!-- formulario de alta/edicion (aparece al tocar Nuevo) -->
<div id="cajaForm" class="caja-form" style="display:none">
    <h5 class="mb-3">Cargar / editar perfil</h5>
    <form class="form-sim" data-ok="Perfil guardado (simulado, todavia sin base de datos)." novalidate>
        <div class="form-group">
            <label for="pfNombre">Perfil</label>
            <input type="text" class="form-control" id="pfNombre" required>
        </div>
        <fieldset class="mb-3">
            <legend class="h6">Secciones permitidas</legend>
            <div class="form-row">
                <?php foreach ($opciones as $clave => $etiqueta): ?>
                    <div class="form-group col-md-3 col-6">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="sec-<?php echo $clave ?>" value="<?php echo $clave ?>">
                            <label class="form-check-label" for="sec-<?php echo $clave ?>"><?php echo $etiqueta ?></label>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </fieldset>
        <button type="submit" class="boton">Guardar</button>
    </form>
</div>

<input type="text" id="buscador" class="buscar-tabla mb-3" placeholder="Buscar...">

<div class="table-responsive">
    <table class="tabla-datos">
        <thead>
            <tr>
                <th>Nombre</th><th>Secciones</th><th>Estado</th><th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($perfiles as $perfil): ?>
                <tr>
                    <td><?php echo $perfil->nombre ?></td>
                    <td>
                        <?php foreach ($perfil->secciones as $s): ?>
                            <span class="chip chip-si"><?php echo $s ?></span>
                        <?php endforeach; ?>
                    </td>
                    <td>
                        <?php if ($perfil->activo): ?>
                            <span class="chip chip-si">Activo</span>
                        <?php else: ?>
                            <span class="chip chip-no">Inactivo</span>
                        <?php endif; ?>
                    </td>
                    <td style="white-space:nowrap">
                        <a class="accion" title="Modificar"><i class="fas fa-pen"></i></a>
                        <?php if ($perfil->activo): ?>
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
