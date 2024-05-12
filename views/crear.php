<?php
require_once '../actions/functions.php';

//Comprobar si el formulario se envió
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombres = $_POST['nombres'] ?? '';
    $correo = $_POST['correo'] ?? '';
    $telf = $_POST['telf'] ?? '';
    $rol = $_POST['rol'] ?? '';
    $registro = $_POST['registro'] ?? '';

    // Crear el usuario
    try {
        crearUsuario($nombres, $correo, $telf, $rol, $registro);
        header("Location: index.php?status=OK");
        exit;
    } catch (Exception $e) {
        $error = $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Usuario</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <div class="header-back">
        <a href="index.php" class="back-button">&#8592 Atrás</a>
        <h1>Crear Usuario</h1>
    </div>
    <form action="crear.php" method="post">
        <label for="nombres">Nombres:</label>
        <input type="text" id="nombres" name="nombres" required><br>
        <label for="correo">Correo:</label>
        <input type="email" id="correo" name="correo" required><br>
        <label for="telf">Telf:</label>
        <input type="tel" id="telf" name="telf" required><br>
        <label for="rol">Rol:</label>
        <input type="text" id="rol" name="rol" required><br>
        <label for="registro">Fecha Registro:</label>
        <input type="datetime-local" id="registro" name="registro" required><br>
        <button type="submit">Crear Usuario</button>
    </form>
</body>

</html>