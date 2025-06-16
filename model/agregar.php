<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productoId = $_POST['producto_id'];
    if (!isset($_SESSION['carrito'][$productoId])) {
        $_SESSION['carrito'][$productoId] = 1;
    } else {
        $_SESSION['carrito'][$productoId]++;
    }
}
header("Location: index.php");
