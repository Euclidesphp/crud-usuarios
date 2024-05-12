<?php
require_once '../conections/database.php';

//Obtener usuarios
function obtenerUsuarios()
{
    global $pdo;
    $query = $pdo->prepare("SELECT * FROM usuarios");
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

//Eliminar usuario
function eliminarUsuario($id)
{
    global $pdo;
    $stmt = $pdo->prepare("DELETE FROM usuarios WHERE id_usuario = ?");
    $stmt->execute([$id]);
}

function crearUsuario($nombres, $correo, $telf, $rol, $fechaRegistro)
{
    global $pdo;
    $query = "INSERT INTO usuarios (nom_usuario,correo_usuario,telf_usuario,rol_usuario,fecha_registro_usuario)
    VALUES (?,?,?,?,?)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$nombres, $correo, $telf, $rol, $fechaRegistro]);
}

function editarUsuario($id, $nombres, $correo, $telf, $rol)
{
    global $pdo;
    $query = "UPDATE usuarios SET nom_usuario = ?, correo_usuario = ?, telf_usuario=?, rol_usuario = ?
            WHERE id_usuario = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$nombres, $correo, $telf, $rol, $id]    );
}

function obtenerUsuarioPorID($id)
{
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM usuarios where id_usuario = ?");
    $stmt->execute([$id]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
