<?php
// registro.php (admin) - pantalla de alta de cuenta
require __DIR__ . '/../config.php';
$titulo = 'Crear cuenta';
include __DIR__ . '/../plantillas/acceso-cabecera.php';
?>

<div class="tarjeta-acceso">
    <div class="logo-grande">+</div>
    <h4 class="text-center mb-4">Crear cuenta</h4>
    <form action="<?php echo RUTA ?>/admin/login.php" method="get">
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="clave">Contraseña</label>
            <input type="password" class="form-control" id="clave" name="clave" minlength="6" required>
        </div>
        <div class="form-group">
            <label for="clave2">Confirmar contraseña</label>
            <input type="password" class="form-control" id="clave2" name="clave2" required>
        </div>
        <button type="submit" class="boton btn-block">Registrarme</button>
    </form>
    <p class="text-center mt-3 mb-0">¿Ya tenés cuenta? <a href="<?php echo RUTA ?>/admin/login.php">Iniciá sesión</a></p>
</div>

<?php include __DIR__ . '/../plantillas/acceso-pie.php'; ?>
