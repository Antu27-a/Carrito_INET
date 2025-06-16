<?php
session_start();


if (isset($_SESSION['usuario']) && isset($_SESSION['carrito'])) {
    $usuarioId = $_SESSION['usuario']['id'];
    $carrito = $_SESSION['carrito'];

    // Eliminar carrito anterior
    $stmt = $Ruta->prepare("DELETE FROM carritos WHERE usuario_id = ?");
    $stmt->bind_param("i", $usuarioId);
    $stmt->execute();

    // Guardar carrito actual
    $stmt = $Ruta->prepare("INSERT INTO carritos (usuario_id, producto_id, cantidad) VALUES (?, ?, ?)");
    foreach ($carrito as $productoId => $cantidad) {
        $stmt->bind_param("iii", $usuarioId, $productoId, $cantidad);
        $stmt->execute();
    }
}

session_destroy();
header("Location: login.php");
exit;
