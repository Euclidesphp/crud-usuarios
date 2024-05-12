<?php
require_once '../actions/functions.php';
$id = $_GET['id'] ?? '';

//Comprobar si el formulario de confirmación fue enviado

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['CONFIRMAR']) && $_POST['CONFIRMAR'] === 'SI') {
        eliminarUsuario($id);
        header("Location: index.php?status=OK");
        exit;
    } else {
        header("Location: index.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Usuario</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <div class="header-back">
        <a href="index.php" class="back-button">&#8592 Atrás</a>
        <h1>Eliminar Usuario</h1>
    </div>
    <p>¿Quieres eliminar este usuario?</p>
    <form action="eliminar.php?id=<?= htmlspecialchars($id) ?>" method="post">
        <button type="submit" name="CONFIRMAR" value="SI">Si, eliminar</button>
        <button type="submit" name="CONFIRMAR" value="NO">Cancelar</button>
    </form>
</body>

</html>