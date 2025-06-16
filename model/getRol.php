<?php
session_start();
header('Content-Type: application/json');

if (isset($_SESSION['usuario']['rol'])) {
    echo json_encode(['rol' => $_SESSION['usuario']['rol']]);
} else {
    echo json_encode(['rol' => 'visitante']);
}
?>
