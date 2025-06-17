<?php
require_once __DIR__ . '/../env.php';

$host = $database['host'];
$port = $database['port'];
$dbname = $database['dbname'];
$user = $database['user'];
$password = $database['password'];

$dsn = "pgsql:host=$host;port=$port;dbname=$dbname";

try {
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Verbinding met de PostgreSQL-database is gelukt!";
} catch (PDOException $e) {
    echo "Fout bij verbinden: " . $e->getMessage();
}