<?php
require_once '../actions/functions.php';
$id = $_GET['id'] ?? '';
$response = obtenerUsuarioPorID($id);

foreach ($response as $aux) :
    $usuario = $aux;
endforeach;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombres = $_POST['nombres'] ?? '';
    $correo = $_POST['correo'] ?? '';
    $telf = $_POST['telf'] ?? '';
    $rol = $_POST['rol'] ?? '';
    editarUsuario($id, $nombres, $correo, $telf, $rol);
    header("Location: index.php?status=OK");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <div class="header-back">
        <a href="index.php" class="back-button">&#8592 Atrás</a>
        <h1>Editar Usuario</h1>
    </div>
    <form action="editar.php?id=<?= $usuario['id_usuario'] ?>" method="post">
        <label for="id_usuario">ID Usuario:</label>
        <input type="number" id="id_usuario" name="id_usuario" readonly value="<?= htmlspecialchars($usuario['id_usuario']) ?>"><br>
        <label for="nombres">Nombres:</label>
        <input type="text" id="nombres" name="nombres" value="<?= htmlspecialchars($usuario['nom_usuario']) ?>" required><br>
        <label for="correo">Correo:</label>
        <input type="email" id="correo" name="correo" value="<?= htmlspecialchars($usuario['correo_usuario']) ?>" required><br>
        <label for="telf">Telf:</label>
        <input type="tel" id="telf" name="telf" value="<?= htmlspecialchars($usuario['telf_usuario']) ?>" required><br>
        <label for="rol">Rol:</label>
        <input type="text" id="rol" name="rol" value="<?= htmlspecialchars($usuario['rol_usuario']) ?>" required><br>
        <label for="registro">Fecha Registro:</label>
        <input type="datetime-local" id="registro" name="registro" value="<?= htmlspecialchars($usuario['fecha_registro_usuario']) ?>" readonly><br>
        <button type="submit">Editar Usuario</button>
    </form>
</body>

</html>