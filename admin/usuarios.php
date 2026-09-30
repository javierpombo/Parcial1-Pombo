<?php
// usuarios.php (admin) - lista de usuarios y formulario de alta
require __DIR__ . '/../config.php';
$titulo = 'Usuarios';
$activo = 'usuarios';
include __DIR__ . '/../plantillas/panel-cabecera.php';
?>

<div id="aviso"></div>

<div class="d-flex justify-content-end align-items-center flex-wrap mb-3">
    <button id="btnNuevo" class="boton"><i class="fas fa-plus"></i> Nuevo usuario</button>
</div>

<!-- formulario de alta/edicion (aparece al tocar Nuevo) -->
<div id="cajaForm" class="caja-form" style="display:none">
    <h5 class="mb-3">Cargar / editar usuario</h5>
    <form class="form-sim" data-ok="Usuario guardado (simulado, todavia sin base de datos)." novalidate>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="uNombre">Nombre</label>
                <input type="text" class="form-control" id="uNombre" required>
            </div>
            <div class="form-group col-md-6">
                <label for="uEmail">Email</label>
                <input type="email" class="form-control" id="uEmail" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="uClave">Contrasena</label>
                <input type="password" class="form-control" id="uClave" minlength="6" required>
            </div>
            <div class="form-group col-md-6">
                <label for="uPerfil">Perfil</label>
                <select class="form-control" id="uPerfil" required>
                    <option value="">Elegir...</option>
                    <?php foreach ($perfiles as $perfil): ?>
                        <option value="<?php echo $perfil->nombre ?>"><?php echo $perfil->nombre ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <button type="submit" class="boton">Guardar</button>
    </form>
</div>

<input type="text" id="buscador" class="buscar-tabla mb-3" placeholder="Buscar...">

<div class="table-responsive">
    <table class="tabla-datos">
        <thead>
            <tr>
                <th>Nombre</th><th>Email</th><th>Perfil</th><th>Estado</th><th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usuarios as $u): ?>
                <tr>
                    <td><?php echo $u->nombre ?></td>
                    <td><?php echo $u->email ?></td>
                    <td><?php echo $u->perfil ?></td>
                    <td>
                        <?php if ($u->activo): ?>
                            <span class="chip chip-si">Activo</span>
                        <?php else: ?>
                            <span class="chip chip-no">Inactivo</span>
                        <?php endif; ?>
                    </td>
                    <td style="white-space:nowrap">
                        <a class="accion" title="Modificar"><i class="fas fa-pen"></i></a>
                        <?php if ($u->activo): ?>
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
