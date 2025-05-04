<?php
// Parámetros de conexión
$host     = getenv('MYSQL_HOST')     ?: 'localhost';
$db       = getenv('MYSQL_DATABASE') ?: 'usuario';
$user     = getenv('MYSQL_USER')     ?: 'usuario';
$pass     = getenv('MYSQL_PASSWORD') ?: 'usuario';
$charset  = 'utf8mb4';

// Conexión con PDO (sin try/catch)
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$pdo = new PDO($dsn, $user, $pass, [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
]);
echo "Conectado a la base de datos: PDO\n";

// Conexión con MySQLi (sin try/catch)
$mysqli = new mysqli($host, $user, $pass, $db);

if ($mysqli->connect_errno) {
    die("Error en conexión MySQLi ({$mysqli->connect_errno}): {$mysqli->connect_error}\n");
}

$mysqli->set_charset('utf8mb4');
echo "Conectado a la base de datos: MySQLi\n";
