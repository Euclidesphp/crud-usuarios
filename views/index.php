<?php
require_once '../actions/functions.php';
$usuarios = obtenerUsuarios();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Usuarios</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <h1>Usuarios</h1>
    <a class="create-button" href="crear.php">Crear Usuario</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombres</th>
                <th>Correo</th>
                <th>Telf.</th>
                <th>Rol</th>
                <th>Fecha Creación</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usuarios as $usuario): ?>
                <tr>
                    <td><?= htmlspecialchars($usuario['id_usuario']) ?></td>
                    <td><?= htmlspecialchars($usuario['nom_usuario']) ?></td>
                    <td><?= htmlspecialchars($usuario['correo_usuario']) ?></td>
                    <td><?= htmlspecialchars($usuario['telf_usuario']) ?></td>
                    <td><?= htmlspecialchars($usuario['rol_usuario']) ?></td>
                    <td><?= htmlspecialchars($usuario['fecha_registro_usuario']) ?></td>
                    <td>
                        <a href="editar.php?id=<?= $usuario['id_usuario'] ?>">Editar</a>
                        <a href="eliminar.php?id=<?= $usuario['id_usuario'] ?>">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>