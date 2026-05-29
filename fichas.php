<?php
require_once 'conexion.php';

$categoria = $_GET['categoria'] ?? 'mamiferos';
$sub = $_GET['subdivision'] ?? '';

$stmt = $pdo->prepare("SELECT * FROM $categoria WHERE subdivision = :sub ORDER BY nombre_comun");
$stmt->execute(['sub' => $sub]);
$especies = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BioTikal | <?php echo htmlspecialchars($sub); ?></title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="fondo-claro">

    <nav class="navbar-principal barra-oscura">
        <div class="logo-nav">BIOTIKAL</div>
        <ul class="enlaces-nav">
            <li><a href="index.php">Inicio</a></li>
            <li><a href="apartados.php" class="activo">Categorías</a></li>
            <li><a href="mapa.php">Mapa</a></li>
        </ul>
    </nav>

    <main class="contenedor-fichas">
        <a href="subcategorias.php?categoria=<?php echo $categoria; ?>" class="enlace-regresar">
            <i class="fas fa-arrow-left"></i> Volver a <?php echo ucfirst($categoria); ?>
        </a>

        <div class="carrusel-libro">
            <button class="flecha-nav prev" onclick="cambiarPagina(-1)"><i class="fas fa-chevron-left"></i></button>

            <div class="visor-especies">
                <?php foreach ($especies as $index => $sp): 
                    $cientifico = str_replace(' ', '_', $sp['nombre_cientifico']);
                    $minusculas = strtolower($cientifico);
                    $mayuscula = ucfirst($minusculas); 
                    $comun = str_replace(' ', '_', strtolower($sp['nombre_comun'])); // Por si se guardó con nombre común

                    $extensiones = ["jpg", "JPG", "jpeg", "JPEG", "png", "PNG", "webp", "WEBP"];
                    $directorios = ["img/", ""]; // Busca primero en img/ y luego en la raíz

                    $ruta_final = ""; 
                    foreach ($directorios as $dir) {
                        foreach ($extensiones as $ext) {
                            $opciones = [$dir.$cientifico, $dir.$minusculas, $dir.$mayuscula, $dir.$comun];
                            foreach ($opciones as $ruta) {
                                if (file_exists($ruta . "." . $ext)) {
                                    $ruta_final = $ruta . "." . $ext;
                                    break 3; // ¡Encontrada! Rompe los 3 ciclos
                                }
                            }
                        }
                    }
                ?>
                    <div class="tarjeta-especie <?php echo $index === 0 ? 'activa' : ''; ?>" id="especie-<?php echo $index; ?>">
                        <div class="col-imagen" onclick="abrirDetalles(<?php echo $index; ?>)">
                            <img src="<?php echo $ruta_final; ?>" alt="<?php echo $sp['nombre_comun']; ?>" onerror="this.src='https://via.placeholder.com/600x450?text=Foto+No+Encontrada'">
                            <div class="clic-overlay"><i class="fas fa-search-plus"></i> Ver más detalles</div>
                        </div>
                        
                        <div class="col-texto">
                            <span class="tag-estado"><?php echo $sp['estado_conservacion']; ?></span>
                            <h2><?php echo $sp['nombre_comun']; ?></h2>
                            <p class="cientifico"><em><?php echo $sp['nombre_cientifico']; ?></em></p>
                            <div class="divisor-fichas"></div>
                            <p class="resumen-corto"><?php echo $sp['descripcion']; ?></p>
                            <p class="habitat-info"><strong>Hábitat:</strong> <?php echo $sp['habitat']; ?></p>
                            
                            <div id="data-tecnica-<?php echo $index; ?>" style="display:none;">
                                <?php echo $sp['detalles_tecnicos'] ?: 'Información técnica en proceso...'; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <button class="flecha-nav next" onclick="cambiarPagina(1)"><i class="fas fa-chevron-right"></i></button>
        </div>

        <p class="contador-paginas">Especie <span id="num-actual">1</span> de <?php echo count($especies); ?></p>
    </main>

    <div id="modalDetalles" class="modal-info">
        <div class="modal-contenido-fichas">
            <span class="cerrar-modal" onclick="cerrarModal()">&times;</span>
            <div class="modal-grid">
                <div class="m-col-img">
                    <img id="m-img" src="" alt="">
                </div>
                <div class="m-col-data">
                    <h2 id="m-titulo"></h2>
                    <p id="m-sub"><em></em></p>
                    <div class="divisor-fichas"></div>
                    <h3>Importancia Ecológica y Detalles Técnicos</h3>
                    <div class="scroll-texto" id="m-tecnico"></div>
                </div>
            </div>
        </div>
    </div>

    <script>
        let indiceActual = 0;
        const total = <?php echo count($especies); ?>;

        function cambiarPagina(direccion) {
            document.getElementById(`especie-${indiceActual}`).classList.remove('activa');
            indiceActual = (indiceActual + direccion + total) % total;
            document.getElementById(`especie-${indiceActual}`).classList.add('activa');
            document.getElementById('num-actual').innerText = indiceActual + 1;
        }

        function abrirDetalles(idx) {
            const sp = document.querySelector(`#especie-${idx}`);
            document.getElementById('m-titulo').innerText = sp.querySelector('h2').innerText;
            document.getElementById('m-sub').innerHTML = sp.querySelector('.cientifico').innerHTML;
            document.getElementById('m-img').src = sp.querySelector('img').src;
            document.getElementById('m-tecnico').innerHTML = document.getElementById(`data-tecnica-${idx}`).innerHTML;
            document.getElementById('modalDetalles').style.display = 'flex';
        }

        function cerrarModal() {
            document.getElementById('modalDetalles').style.display = 'none';
        }
    </script>
</body>
</html>
