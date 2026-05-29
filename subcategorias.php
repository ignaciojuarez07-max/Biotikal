<?php
require_once 'conexion.php';

$categoria = isset($_GET['categoria']) ? $_GET['categoria'] : 'mamiferos';
$tablas_validas = ['mamiferos', 'aves', 'reptiles', 'anfibios', 'plantas'];

if (in_array($categoria, $tablas_validas)) {
    $query = "SELECT DISTINCT subdivision FROM $categoria WHERE subdivision IS NOT NULL ORDER BY subdivision";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $subdivisiones = $stmt->fetchAll();
} else {
    header("Location: apartados.php");
    exit();
}

// Lógica para asignar un ícono dependiendo de la categoría
$icono_cat = 'fas fa-paw'; // Por defecto (Mamíferos)
if ($categoria == 'aves') $icono_cat = 'fas fa-feather-alt';
if ($categoria == 'reptiles') $icono_cat = 'fas fa-dragon';
if ($categoria == 'anfibios') $icono_cat = 'fas fa-frog';
if ($categoria == 'plantas') $icono_cat = 'fas fa-leaf';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BioTikal | Familias de <?php echo ucfirst($categoria); ?></title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="fondo-claro">

    <nav class="navbar-principal barra-oscura">
        <div class="logo-nav">BIOTIKAL</div>
        <ul class="enlaces-nav">
            <li><a href="index.php">Inicio</a></li>
            <li><a href="apartados.php" class="activo">Categorías</a></li>
            <li><a href="#">Mapa</a></li>
        </ul>
    </nav>

    <main class="contenedor-subcategorias">
        <a href="apartados.php" class="enlace-regresar">
            <i class="fas fa-arrow-left"></i> Volver a los Reinos
        </a>

        <div class="encabezado-sencillo">
            <h2>Familias de <?php echo ucfirst($categoria); ?></h2>
            <div class="divisor-pequeno"></div>
            <p>Selecciona un grupo para explorar las especies que lo conforman.</p>
        </div>

        <div class="grid-subcategorias">
            <?php foreach ($subdivisiones as $sub): ?>
                <a href="fichas.php?categoria=<?php echo $categoria; ?>&subdivision=<?php echo urlencode($sub['subdivision']); ?>" class="tarjeta-sub">
                    <div class="info-izq">
                        <i class="<?php echo $icono_cat; ?> icono-principal"></i>
                        <span class="nombre-sub"><?php echo htmlspecialchars($sub['subdivision']); ?></span>
                    </div>
                    <i class="fas fa-arrow-right icono-flecha"></i>
                </a>
            <?php endforeach; ?>
        </div>
    </main>

</body>
</html>
