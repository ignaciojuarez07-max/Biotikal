<?php
// conexion.php

$host = 'db.koltwkcxjijbqvctovnn.supabase.co'; 
$dbname = 'postgres'; 
$username = 'postgres'; 
$password = 'BioTikal2026'; 
$port = '5432'; // Si en algún momento tienes problemas de conexión o límite de clientes, puedes probar cambiándolo a '6543' (puerto del pooler)

try {
    $dsn = "pgsql:host=$host;port=$port;dbname=$dbname;";
    $pdo = new PDO($dsn, $username, $password);
    
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    
} catch (PDOException $e) {
    die("Error crítico de conexión con Supabase (BioTikal): " . $e->getMessage());
}
?>