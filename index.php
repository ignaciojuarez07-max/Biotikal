<!DOCTYPE html>
<html lang="es">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta charset="UTF-8">
    <title>BioTikal | Inicio</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>

    <header class="bienvenida" id="inicio">
        
        <nav class="navbar-principal">
            <div class="logo-nav">BIOTIKAL</div>
            <ul class="enlaces-nav">
                <li><a href="index.php" class="activo">Inicio</a></li>
                <li><a href="apartados.php">Categorías</a></li>
                <li><a href="mapa.php">Mapa</a></li> 
                <li><a href="#introduccion">Quiénes Somos</a></li>
            </ul>
        </nav>

        <div class="bienvenida-box">
            <h1>BIOTIKAL</h1>
            <p class="frase-motivadora">Descubre, aprende y protege el latido verde de nuestro planeta.</p>
            <div class="botones-inicio">
                <a href="apartados.php" class="btn-explorar">EXPLORAR BIODIVERSIDAD</a>
                <a href="mapa.php" class="btn-mapa-inicio"><i class="fas fa-map-marked-alt"></i> VER MAPA</a>
            </div>
        </div>
        
        <a href="#introduccion" class="flecha-scroll">
            <i class="fas fa-chevron-down"></i>
        </a>
    </header>

    <main class="introduccion" id="introduccion">
        <div class="contenedor-intro">
            <h2>Quiénes Somos</h2>
            <div class="divisor"></div>
            
            <p>
                Bienvenidos a BioTikal, tu ventana digital a la asombrosa riqueza natural del departamento de Petén. Esta plataforma está diseñada de forma intuitiva para que cualquier persona pueda adentrarse y explorar la vitalidad de nuestra flora y fauna regional.
            </p>
            
            <p>
                A través de BioTikal, podrás navegar por fascinantes categorías de vida silvestre. Desde los majestuosos Mamíferos y las coloridas Aves, hasta la esencial y misteriosa Flora que sustenta todo el ecosistema.
            </p>

            <div class="mini-features">
                <div class="feat">
                    <i class="fas fa-database"></i>
                    <span>Base de datos Científica</span>
                </div>
                <div class="feat">
                    <i class="fas fa-leaf"></i>
                    <span>+150 Especies</span>
                </div>
                <div class="feat">
                    <i class="fas fa-chart-line"></i>
                    <span>Monitoreo en Tiempo Real</span>
                </div>
            </div>
            
            <p class="final-intro">
                Nuestro principal objetivo es fomentar el conocimiento y la conservación de este invaluable patrimonio natural. ¡Prepárate para un viaje de descubrimiento visual y científico!
            </p>
        </div>
    </main>

    <footer class="footer-inicio">
        <p>&copy; 2026 Proyecto BioTikal - Monitor de Biodiversidad de Petén.</p>
    </footer>

</body>
</html>
