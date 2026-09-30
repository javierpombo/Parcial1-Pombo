<?php
// contacto.php - formulario de contacto
require __DIR__ . '/../config.php';
$titulo = 'Contacto';
$activo = 'contacto';

include __DIR__ . '/../plantillas/cabecera.php';
?>

<h1 class="titulo-seccion">Contacto</h1>

<div class="caja mb-4">
    <div id="aviso"></div>
    <form class="form-sim" data-ok="Gracias por escribirnos, te respondemos a la brevedad." novalidate>
        <div class="form-group">
            <label for="nombre">Nombre y apellido</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="telefono">Telefono</label>
            <input type="tel" class="form-control" id="telefono" name="telefono" required>
        </div>
        <div class="form-group">
            <label for="area">Area</label>
            <select class="form-control" id="area" name="area" required>
                <option value="">Elegi un area</option>
                <?php foreach ($areas as $a): ?>
                    <option value="<?php echo $a ?>"><?php echo $a ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="comentario">Comentario</label>
            <textarea class="form-control" id="comentario" name="comentario" rows="5" required></textarea>
        </div>
        <button type="submit" class="boton">Enviar</button>
    </form>
</div>

<?php include __DIR__ . '/../plantillas/pie.php'; ?>
