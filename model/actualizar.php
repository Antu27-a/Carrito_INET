<?php
session_start();
$id = $_POST['id'];
$accion = $_POST['accion'];

if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}

switch ($accion) {
    case 'agregar':
    case 'sumar':
        $_SESSION['carrito'][$id] = ($_SESSION['carrito'][$id] ?? 0) + 1;
        break;
    case 'restar':
        if (isset($_SESSION['carrito'][$id])) {
            $_SESSION['carrito'][$id]--;
            if ($_SESSION['carrito'][$id] <= 0) {
                unset($_SESSION['carrito'][$id]);
            }
        }
        break;
    case 'eliminar':
        unset($_SESSION['carrito'][$id]);
        break;
}

header('Location: carrito.php');
exit;
