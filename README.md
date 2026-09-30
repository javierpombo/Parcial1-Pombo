# City Farmac - TP Instancia 1

Maquetado del sitio de la farmacia City Farmac y de su panel de administracion
(PP: Produccion Web - Da Vinci).

Todavia no usa base de datos: los datos son de ejemplo y estan armados como objetos
(clases en la carpeta `modelos`, los objetos se crean en `datos/datos.php`).

## Tecnologias

- PHP 8 (probado con el PHP de XAMPP)
- Programacion orientada a objetos (clases Producto, Categoria, Marca, etc.)
- HTML, CSS, JavaScript
- Bootstrap 4 y Font Awesome

## Como levantarlo

Con XAMPP: copiar la carpeta `city-farmac-v2` en `xampp/htdocs`, prender Apache y
entrar a http://localhost/city-farmac-v2

O con el servidor de PHP, parado en la carpeta del proyecto:

    php -S localhost:8000

y entrar a http://localhost:8000 (redirige solo a la home).

## Ruta base

Se calcula en `config.php` y queda en la constante `RUTA`. Todos los links, css,
js e imagenes la usan, asi que funciona en cualquier carpeta. Si hiciera falta se
puede poner a mano en ese mismo archivo.

## Carpetas

- `front/` vistas del sitio publico
- `admin/` vistas del panel
- `plantillas/` partes que se repiten (cabecera, pie, menu del panel)
- `modelos/` clases
- `datos/` datos de ejemplo
- `css/`, `js/`, `img/`, `bootstrap/` (librerias)

## Vistas

Sitio:

- front/inicio.php - inicio con productos destacados
- front/productos.php - listado con categorias, filtro por marca y orden
- front/producto.php?id=1 - detalle del producto
- front/contacto.php - contacto
- front/error404.php - pagina de error

Panel:

- admin/login.php - ingreso
- admin/registro.php - registro
- admin/panel.php - inicio del panel
- admin/productos.php - productos
- admin/categorias.php - categorias y subcategorias
- admin/marcas.php - marcas
- admin/comentarios.php - comentarios
- admin/usuarios.php - usuarios
- admin/perfiles.php - perfiles
