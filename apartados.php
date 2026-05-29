<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BioTikal | Categorías</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>

    <nav class="nav-sencilla">
        <a href="index.php" class="btn-regresar">
            <i class="fas fa-arrow-left"></i> Volver al Inicio
        </a>
        <div class="logo-pequeno">BIOTIKAL</div>
    </nav>

    <main class="pantalla-categorias">
        <div class="encabezado-cat">
            <h2>¿Qué deseas explorar hoy?</h2>
            <p>Selecciona un reino para descubrir sus especies.</p>
        </div>

      <div class="grid-interactivo">
            <a href="subcategorias.php?categoria=mamiferos" class="tarjeta-cat">
                <div class="icono-cat"><i class="fas fa-hippo"></i></div>
                <h3>Mamíferos</h3>
                <div class="info-oculta">Jaguares, monos, dantos y más.</div>
            </a>

            <a href="subcategorias.php?categoria=aves" class="tarjeta-cat">
                <div class="icono-cat"><i class="fas fa-dove"></i></div>
                <h3>Aves</h3>
                <div class="info-oculta">Águilas, tucanes y loros coloridos.</div>
            </a>

            <a href="subcategorias.php?categoria=reptiles" class="tarjeta-cat">
                <div class="icono-cat"><i class="fas fa-dragon"></i></div>
                <h3>Reptiles</h3>
                <div class="info-oculta">Cocodrilos, tortugas e iguanas.</div>
            </a>

            <a href="subcategorias.php?categoria=anfibios" class="tarjeta-cat">
                <div class="icono-cat"><i class="fas fa-frog"></i></div>
                <h3>Anfibios</h3>
                <div class="info-oculta">Ranas arborícolas y sapos gigantes.</div>
            </a>

            <a href="subcategorias.php?categoria=plantas" class="tarjeta-cat verde">
                <div class="icono-cat"><i class="fas fa-leaf"></i></div>
                <h3>Flora</h3>
                <div class="info-oculta">Árboles maderables y orquídeas.</div>
            </a>
        </div>
    </main>

</body>
</html>