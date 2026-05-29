<?php
// conexion.php

// 1. Pega aquí el NUEVO host que tiene la palabra "pooler"
$host = 'db.koltwkcxjijbqvctovnn.supabase.co'; 

$dbname = 'postgres'; 
$username = 'postgres'; // OJO: a veces en el pooler el usuario cambia un poco (revisa si en la ventanita te agregó el nombre del proyecto al usuario)
$password = 'BioTikal2026'; 

// 2. CAMBIA EL PUERTO A 6543
$port = '5432'; 

try {
    $dsn = "pgsql:host=$host;port=$port;dbname=$dbname;";
    $pdo = new PDO($dsn, $username, $password);
    
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    
} catch (PDOException $e) {
    die("Error crítico de conexión con Supabase (BioTikal): " . $e->getMessage());
}
?>
