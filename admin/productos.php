<?php
// productos.php (admin) - lista de productos y formulario de carga
require __DIR__ . '/../config.php';
$titulo = 'Productos';
$activo = 'productos';
include __DIR__ . '/../plantillas/panel-cabecera.php';
?>

<div id="aviso"></div>

<div class="d-flex justify-content-between align-items-center flex-wrap mb-3">
    <div class="form-inline">
        <select id="filtroCat" class="form-control form-control-sm mr-2 mb-2 mb-sm-0">
            <option value="">Todas las categorias</option>
            <?php foreach ($categorias as $c): ?>
                <option value="<?php echo $c->nombre ?>"><?php echo $c->nombre ?></option>
            <?php endforeach; ?>
        </select>
        <select id="filtroSub" class="form-control form-control-sm mb-2 mb-sm-0">
            <option value="">Todas las subcategorias</option>
            <?php foreach ($categorias as $c): ?>
                <?php foreach ($c->subcategorias as $s): ?>
                    <option value="<?php echo $s->nombre ?>" data-cat="<?php echo $c->nombre ?>"><?php echo $s->nombre ?></option>
                <?php endforeach; ?>
            <?php endforeach; ?>
        </select>
    </div>
    <button id="btnNuevo" class="boton"><i class="fas fa-plus"></i> Agregar producto</button>
</div>

<!-- formulario de alta/edicion (aparece al tocar Nuevo) -->
<div id="cajaForm" class="caja-form" style="display:none">
    <h5 class="mb-3">Cargar / editar producto</h5>
    <form class="form-sim" data-ok="Producto guardado (simulado, todavia sin base de datos)." novalidate>
        <div class="form-row">
            <div class="form-group col-md-8">
                <label for="pNombre">Nombre</label>
                <input type="text" class="form-control" id="pNombre" required>
            </div>
            <div class="form-group col-md-4">
                <label for="pPrecio">Precio</label>
                <input type="number" class="form-control" id="pPrecio" min="0" required>
            </div>
        </div>
        <div class="form-group">
            <label for="pDesc">Descripcion</label>
            <textarea class="form-control" id="pDesc" rows="2"></textarea>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="pCat">Categoria</label>
                <select class="form-control" id="pCat" required>
                    <option value="">Elegir...</option>
                    <?php foreach ($categorias as $c): ?>
                        <option value="<?php echo $c->nombre ?>"><?php echo $c->nombre ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group col-md-4">
                <label for="pSub">Subcategoria</label>
                <select class="form-control" id="pSub">
                    <option value="">Elegir...</option>
                    <?php foreach ($categorias as $c): ?>
                        <?php foreach ($c->subcategorias as $s): ?>
                            <option value="<?php echo $s->nombre ?>"><?php echo $s->nombre ?></option>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group col-md-4">
                <label for="pMarca">Marca</label>
                <select class="form-control" id="pMarca" required>
                    <option value="">Elegir...</option>
                    <?php foreach ($marcas as $m): ?>
                        <option value="<?php echo $m->nombre ?>"><?php echo $m->nombre ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="pModelo">Modelo / presentacion</label>
                <input type="text" class="form-control" id="pModelo">
            </div>
            <div class="form-group col-md-6">
                <label for="pImagen">Imagen</label>
                <input type="file" class="form-control-file" id="pImagen" accept="image/*">
            </div>
        </div>
        <div class="form-check mb-3">
            <input type="checkbox" class="form-check-input" id="pDestacado">
            <label class="form-check-label" for="pDestacado">Destacado (aparece en la home)</label>
        </div>
        <button type="submit" class="boton">Guardar</button>
    </form>
</div>

<input type="text" id="buscador" class="buscar-tabla mb-3" placeholder="Buscar en la tabla...">

<div class="table-responsive">
    <table class="tabla-datos">
        <thead>
            <tr>
                <th>Producto</th><th>Categoria</th><th>Subcategoria</th><th>Marca</th>
                <th>Precio</th><th>Ranking</th><th>Destacado</th><th>Estado</th><th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productos as $p): ?>
                <tr data-cat="<?php echo $p->categoria ?>" data-sub="<?php echo $p->subcategoria ?>">
                    <td>
                        <img src="<?php echo RUTA ?>/img/productos/<?php echo $p->imagen ?>" alt="<?php echo $p->nombre ?>" width="42" height="32" style="object-fit:cover;border-radius:4px">
                        <?php echo $p->nombre ?><br><small class="text-muted"><?php echo $p->modelo ?></small>
                    </td>
                    <td><?php echo $p->categoria ?></td>
                    <td><?php echo $p->subcategoria ?></td>
                    <td><?php echo $p->marca ?></td>
                    <td><?php echo $p->precioFormato() ?></td>
                    <td><span class="estrellas"><?php echo $p->estrellas() ?></span></td>
                    <td>
                        <?php if ($p->destacado): ?>
                            <i class="fas fa-star" style="color:var(--estrella)"></i>
                        <?php else: ?>
                            -
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if ($p->activo): ?>
                            <span class="chip chip-si">Activo</span>
                        <?php else: ?>
                            <span class="chip chip-no">Inactivo</span>
                        <?php endif; ?>
                    </td>
                    <td style="white-space:nowrap">
                        <a class="accion" title="Modificar"><i class="fas fa-pen"></i></a>
                        <?php if ($p->activo): ?>
                            <a class="accion" title="Inactivar"><i class="fas fa-toggle-on"></i></a>
                        <?php else: ?>
                            <a class="accion" title="Activar"><i class="fas fa-toggle-off"></i></a>
                        <?php endif; ?>
                        <a class="accion" title="Ver comentarios" href="<?php echo RUTA ?>/admin/comentarios.php?producto=<?php echo $p->id ?>"><i class="fas fa-comment-dots"></i></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script>
// filtro por categoria y subcategoria (JS comun, todavia sin base de datos)
function filtrar() {
    var cat = document.getElementById('filtroCat').value;
    var sub = document.getElementById('filtroSub').value;
    var filas = document.querySelectorAll('.tabla-datos tbody tr');
    for (var i = 0; i < filas.length; i++) {
        var okCat = (cat == '' || filas[i].getAttribute('data-cat') == cat);
        var okSub = (sub == '' || filas[i].getAttribute('data-sub') == sub);
        filas[i].style.display = (okCat && okSub) ? '' : 'none';
    }
}
document.getElementById('filtroCat').addEventListener('change', filtrar);
document.getElementById('filtroSub').addEventListener('change', filtrar);
</script>

<?php include __DIR__ . '/../plantillas/panel-pie.php'; ?>
