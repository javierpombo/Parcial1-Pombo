<?php
// login.php (admin) - pantalla de ingreso
require __DIR__ . '/../config.php';
$titulo = 'Iniciar sesion';
include __DIR__ . '/../plantillas/acceso-cabecera.php';
?>

<div class="tarjeta-acceso">
    <div class="logo-grande">+</div>
    <h4 class="text-center mb-4">Iniciar sesión</h4>
    <form action="<?php echo RUTA ?>/admin/panel.php" method="get">
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="clave">Contraseña</label>
            <input type="password" class="form-control" id="clave" name="clave" required>
        </div>
        <button type="submit" class="boton btn-block">Ingresar</button>
    </form>
    <p class="text-center mt-3 mb-1">¿No tenés cuenta? <a href="<?php echo RUTA ?>/admin/registro.php">Registrate</a></p>
    <p class="text-center mb-0"><a href="<?php echo RUTA ?>/front/inicio.php">Ir a la tienda</a></p>
</div>

<?php include __DIR__ . '/../plantillas/acceso-pie.php'; ?>
