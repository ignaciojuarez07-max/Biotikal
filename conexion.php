<?php
// conexion.php

$host = 'aws-0-us-east-1.pooler.supabase.com'; 
$dbname = 'postgres'; 
$username = 'postgres.koltwkcxjijbqvctovnn'; 
$password = 'BioTikal2026'; 
$port = '6543'; 

try {
    $dsn = "pgsql:host=$host;port=$port;dbname=$dbname;";
    $pdo = new PDO($dsn, $username, $password);
    
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    
} catch (PDOException $e) {
    die("Error crítico de conexión con Supabase (BioTikal): " . $e->getMessage());
}
?>
