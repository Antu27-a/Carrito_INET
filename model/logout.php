<?php
session_start();
require_once("../controller/db.php");

// Validar que haya un usuario logueado con ID definido
if (isset($_SESSION['usuario']['id'])) {
    $usuarioId = $_SESSION['usuario']['id'];
    $carrito = $_SESSION['carrito'] ?? [];

    try {
        // Eliminar carrito anterior del usuario
        $stmt = $Ruta->prepare("DELETE FROM carritos WHERE usuario_id = ?");
        $stmt->bind_param("i", $usuarioId);
        $stmt->execute();

        // Insertar cada ítem del carrito actual
        if (!empty($carrito)) {
            $stmt = $Ruta->prepare("INSERT INTO carritos (usuario_id, producto_id, cantidad) VALUES (?, ?, ?)");
            foreach ($carrito as $productoId => $cantidad) {
                $stmt->bind_param("iii", $usuarioId, $productoId, $cantidad);
                $stmt->execute();
            }
        }

    } catch (mysqli_sql_exception $e) {
        // Mostrar error si algo sale mal (opcional: loguearlo en vez de mostrarlo)
        echo "Error al guardar el carrito: " . $e->getMessage();
        // Podés hacer exit aquí si no querés que continúe
    }
}

// Destruir sesión y redirigir al login o index
session_destroy();
header("Location: ../index.php");
exit;
