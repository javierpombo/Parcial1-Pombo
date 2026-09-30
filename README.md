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

- inicio con productos destacados: http://localhost/city-farmac-v2/front/inicio.php
- listado con categorias, filtro por marca y orden: http://localhost/city-farmac-v2/front/productos.php
- detalle del producto: http://localhost/city-farmac-v2/front/producto.php?id=1
- contacto: http://localhost/city-farmac-v2/front/contacto.php
- pagina de error: http://localhost/city-farmac-v2/front/error404.php

Panel:

- ingreso: http://localhost/city-farmac-v2/admin/login.php
- registro: http://localhost/city-farmac-v2/admin/registro.php
- inicio del panel: http://localhost/city-farmac-v2/admin/panel.php
- productos: http://localhost/city-farmac-v2/admin/productos.php
- categorias y subcategorias: http://localhost/city-farmac-v2/admin/categorias.php
- marcas: http://localhost/city-farmac-v2/admin/marcas.php
- comentarios: http://localhost/city-farmac-v2/admin/comentarios.php
- usuarios: http://localhost/city-farmac-v2/admin/usuarios.php
- perfiles: http://localhost/city-farmac-v2/admin/perfiles.php
