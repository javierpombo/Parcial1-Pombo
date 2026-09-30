<?php
// datos.php
// Datos de prueba del sitio. Como todavia no hay base de datos armo los
// objetos a mano. En la instancia 2 esto sale de MySQL.

// marcas
$marcas = array(
    new Marca(1, 'Elea', true),
    new Marca(2, 'Bago', true),
    new Marca(3, 'Roemmers', true),
    new Marca(4, 'Centrum', true),
    new Marca(5, 'Maybelline', true),
    new Marca(6, 'Avene', true),
    new Marca(7, 'Vichy', true),
    new Marca(8, 'Oral-B', true),
    new Marca(9, 'Pantene', true),
    new Marca(10, 'Huggies', true),
    new Marca(11, 'Natura', false),
    new Marca(12, "L'Oreal", true)
);

// categorias con sus subcategorias
$categorias = array();

$salud = new Categoria(1, 'Salud', true);
$salud->agregarSub(new Subcategoria(1, 'Dolor y fiebre', true));
$salud->agregarSub(new Subcategoria(2, 'Resfrio y alergia', true));
$salud->agregarSub(new Subcategoria(3, 'Vitaminas', true));
$categorias[] = $salud;

$belleza = new Categoria(2, 'Belleza', true);
$belleza->agregarSub(new Subcategoria(4, 'Maquillaje', true));
$belleza->agregarSub(new Subcategoria(5, 'Cuidado facial', true));
$belleza->agregarSub(new Subcategoria(6, 'Protectores solares', true));
$categorias[] = $belleza;

$higiene = new Categoria(3, 'Higiene', true);
$higiene->agregarSub(new Subcategoria(7, 'Cuidado bucal', true));
$higiene->agregarSub(new Subcategoria(8, 'Cabello', true));
$higiene->agregarSub(new Subcategoria(9, 'Cuerpo', true));
$categorias[] = $higiene;

$bebes = new Categoria(4, 'Maternidad y bebes', true);
$bebes->agregarSub(new Subcategoria(10, 'Pañales', true));
$bebes->agregarSub(new Subcategoria(11, 'Cremas para bebe', false));
$categorias[] = $bebes;

$nutricion = new Categoria(5, 'Nutricion deportiva', false);
$nutricion->agregarSub(new Subcategoria(12, 'Proteinas', true));
$categorias[] = $nutricion;

// productos
$productos = array(
    new Producto(array('id'=>1,'nombre'=>'Paracetamol 500 mg','marca'=>'Elea','modelo'=>'x16 comprimidos','precio'=>1850,'categoria'=>'Salud','subcategoria'=>'Dolor y fiebre','ranking'=>4.3,'destacado'=>true,'activo'=>true,'imagen'=>'prod-1.svg','descripcion'=>'Analgesico y antifebril de uso comun. Alivia dolores leves a moderados y baja la fiebre.')),
    new Producto(array('id'=>2,'nombre'=>'Ibuprofeno 600 mg','marca'=>'Bago','modelo'=>'x10 comprimidos','precio'=>2400,'categoria'=>'Salud','subcategoria'=>'Dolor y fiebre','ranking'=>4.0,'destacado'=>false,'activo'=>true,'imagen'=>'prod-2.svg','descripcion'=>'Antiinflamatorio para dolores musculares, de cabeza y menstruales.')),
    new Producto(array('id'=>3,'nombre'=>'Antigripal Dia','marca'=>'Roemmers','modelo'=>'x12 capsulas','precio'=>3900,'categoria'=>'Salud','subcategoria'=>'Resfrio y alergia','ranking'=>3.8,'destacado'=>true,'activo'=>true,'imagen'=>'prod-3.svg','descripcion'=>'Para los sintomas del resfrio: congestion, dolor de cabeza y fiebre. No da sueño.')),
    new Producto(array('id'=>4,'nombre'=>'Loratadina 10 mg','marca'=>'Elea','modelo'=>'x10 comprimidos','precio'=>2100,'categoria'=>'Salud','subcategoria'=>'Resfrio y alergia','ranking'=>4.1,'destacado'=>false,'activo'=>true,'imagen'=>'prod-4.svg','descripcion'=>'Antialergico de toma diaria. Ayuda con estornudos, picazon y ojos llorosos.')),
    new Producto(array('id'=>5,'nombre'=>'Multivitaminico A-Z','marca'=>'Centrum','modelo'=>'x30 comprimidos','precio'=>11500,'categoria'=>'Salud','subcategoria'=>'Vitaminas','ranking'=>4.6,'destacado'=>true,'activo'=>true,'imagen'=>'prod-5.svg','descripcion'=>'Vitaminas y minerales para completar la alimentacion de todos los dias.')),
    new Producto(array('id'=>6,'nombre'=>'Base Fit Me','marca'=>'Maybelline','modelo'=>'30 ml','precio'=>15900,'categoria'=>'Belleza','subcategoria'=>'Maquillaje','ranking'=>4.4,'destacado'=>false,'activo'=>true,'imagen'=>'prod-6.svg','descripcion'=>'Base liquida de acabado natural. Se adapta al tono de la piel.')),
    new Producto(array('id'=>7,'nombre'=>'Mascara de pestañas Colossal','marca'=>'Maybelline','modelo'=>'9,2 ml','precio'=>12800,'categoria'=>'Belleza','subcategoria'=>'Maquillaje','ranking'=>4.7,'destacado'=>true,'activo'=>true,'imagen'=>'prod-7.svg','descripcion'=>'Da volumen desde la primera pasada. Color negro intenso.')),
    new Producto(array('id'=>8,'nombre'=>'Agua micelar','marca'=>'Avene','modelo'=>'200 ml','precio'=>17600,'categoria'=>'Belleza','subcategoria'=>'Cuidado facial','ranking'=>4.5,'destacado'=>false,'activo'=>true,'imagen'=>'prod-8.svg','descripcion'=>'Limpia y desmaquilla sin enjuague. Apta para piel sensible.')),
    new Producto(array('id'=>9,'nombre'=>'Serum Mineral 89','marca'=>'Vichy','modelo'=>'50 ml','precio'=>38900,'categoria'=>'Belleza','subcategoria'=>'Cuidado facial','ranking'=>4.8,'destacado'=>true,'activo'=>true,'imagen'=>'prod-9.svg','descripcion'=>'Serum hidratante con acido hialuronico. Fortalece la barrera de la piel.')),
    new Producto(array('id'=>10,'nombre'=>'Protector solar corporal FPS 50','marca'=>'Avene','modelo'=>'200 ml','precio'=>29900,'categoria'=>'Belleza','subcategoria'=>'Protectores solares','ranking'=>4.2,'destacado'=>false,'activo'=>true,'imagen'=>'prod-10.svg','descripcion'=>'Proteccion muy alta para el cuerpo. Resistente al agua.')),
    new Producto(array('id'=>11,'nombre'=>'Cepillo electrico Vitality','marca'=>'Oral-B','modelo'=>'1 unidad','precio'=>34500,'categoria'=>'Higiene','subcategoria'=>'Cuidado bucal','ranking'=>4.6,'destacado'=>true,'activo'=>true,'imagen'=>'prod-11.svg','descripcion'=>'Cepillo recargable con cabezal redondo y temporizador de 2 minutos.')),
    new Producto(array('id'=>12,'nombre'=>'Acondicionador Liso Extremo','marca'=>'Pantene','modelo'=>'400 ml','precio'=>5200,'categoria'=>'Higiene','subcategoria'=>'Cabello','ranking'=>3.9,'destacado'=>false,'activo'=>true,'imagen'=>'prod-12.svg','descripcion'=>'Controla el frizz y deja el pelo suave y facil de peinar.')),
    new Producto(array('id'=>13,'nombre'=>'Pañales Supreme Care G','marca'=>'Huggies','modelo'=>'x36 unidades','precio'=>21800,'categoria'=>'Maternidad y bebes','subcategoria'=>'Pañales','ranking'=>4.7,'destacado'=>true,'activo'=>true,'imagen'=>'prod-13.svg','descripcion'=>'Pañales suaves con gel absorbente. Hasta 12 horas secos.')),
    new Producto(array('id'=>14,'nombre'=>'Jabon Ekos maracuya','marca'=>'Natura','modelo'=>'90 g','precio'=>3100,'categoria'=>'Higiene','subcategoria'=>'Cuerpo','ranking'=>4.0,'destacado'=>false,'activo'=>false,'imagen'=>'prod-14.svg','descripcion'=>'Jabon en barra con aceite de maracuya. Perfuma y humecta.'))
);

// comentarios
$comentarios = array(
    new Comentario(array('id'=>1,'producto'=>'Serum Mineral 89','email'=>'agus.romero@gmail.com','texto'=>'Lo uso a la noche y se nota la piel mas hidratada.','ranking'=>5,'fecha'=>'2026-09-10','aprobado'=>true)),
    new Comentario(array('id'=>2,'producto'=>'Serum Mineral 89','email'=>'meli_22@hotmail.com','texto'=>'Muy bueno pero rinde poco para el precio.','ranking'=>3,'fecha'=>'2026-09-14','aprobado'=>true)),
    new Comentario(array('id'=>3,'producto'=>'Paracetamol 500 mg','email'=>'nico.fernandez@yahoo.com.ar','texto'=>'Siempre tengo en casa, cumple.','ranking'=>4,'fecha'=>'2026-09-12','aprobado'=>true)),
    new Comentario(array('id'=>4,'producto'=>'Mascara de pestañas Colossal','email'=>'cami.lopez@gmail.com','texto'=>'La mejor que probe, no se corre.','ranking'=>5,'fecha'=>'2026-09-20','aprobado'=>true)),
    new Comentario(array('id'=>5,'producto'=>'Mascara de pestañas Colossal','email'=>'ofertas@ventas-ya.com','texto'=>'Entra a mi pagina y compra mas barato!!','ranking'=>1,'fecha'=>'2026-09-21','aprobado'=>false)),
    new Comentario(array('id'=>6,'producto'=>'Pañales Supreme Care G','email'=>'mama.de.tomi@gmail.com','texto'=>'No se paspa nada, los recomiendo.','ranking'=>5,'fecha'=>'2026-09-18','aprobado'=>true)),
    new Comentario(array('id'=>7,'producto'=>'Cepillo electrico Vitality','email'=>'fede.g@outlook.com','texto'=>'La bateria dura bastante, estoy conforme.','ranking'=>4,'fecha'=>'2026-09-25','aprobado'=>false)),
    new Comentario(array('id'=>8,'producto'=>'Antigripal Dia','email'=>'rocio.m@gmail.com','texto'=>'Me ayudo con el resfrio pero tarda en hacer efecto.','ranking'=>3,'fecha'=>'2026-09-26','aprobado'=>true))
);

// perfiles
$perfiles = array(
    new Perfil(1, 'Superadmin', array('inicio','productos','categorias','marcas','comentarios','usuarios','perfiles'), true),
    new Perfil(2, 'Catalogo', array('inicio','productos','categorias','marcas'), true),
    new Perfil(3, 'Moderacion de opiniones', array('inicio','comentarios'), true),
    new Perfil(4, 'Consulta', array('inicio'), false)
);

// usuarios
$usuarios = array(
    new Usuario(1, 'Lucia Benitez', 'lbenitez@cityfarmac.com', 'Superadmin', true),
    new Usuario(2, 'Martin Aguirre', 'maguirre@cityfarmac.com', 'Catalogo', true),
    new Usuario(3, 'Paula Rios', 'prios@cityfarmac.com', 'Moderacion de opiniones', true),
    new Usuario(4, 'Tomas Herrera', 'therrera@cityfarmac.com', 'Catalogo', false),
    new Usuario(5, 'Julieta Sosa', 'jsosa@cityfarmac.com', 'Consulta', true)
);

// areas para el formulario de contacto
$areas = array('Consultas generales', 'Pedidos y envios', 'Atencion farmaceutica', 'Reclamos', 'Trabaja con nosotros');
?>
