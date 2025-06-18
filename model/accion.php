<?php
session_start();

$productoId = $_POST['producto_id'];
$accion = $_POST['accion'];

switch ($accion) {
    case 'sumar':
        $_SESSION['carrito'][$productoId]++;
        break;
    case 'restar':
        $_SESSION['carrito'][$productoId]--;
        if ($_SESSION['carrito'][$productoId] <= 0) {
            unset($_SESSION['carrito'][$productoId]);
        }
        break;
    case 'eliminar':
        unset($_SESSION['carrito'][$productoId]);
        break;
}
header("Location: carrito.php");
