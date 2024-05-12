<?php
$host = 'localhost:3307';
$dbname = 'usuarios';
$username = 'root';
$password = 'Euclides26';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("No se pudo conectar con la base de datos $dbname :" . $e->getMessage());
}
