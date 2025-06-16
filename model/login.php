<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once(__DIR__ . "/../controller/db.php");



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $Ruta->prepare("SELECT * FROM usuarios WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $usuario = $resultado->fetch_assoc();

    if ($usuario && password_verify($password, $usuario['password'])) {
        $_SESSION['usuario'] = [
            "id" => $usuario->id,
            "nombre" => $usuario->nombre,
            "email" => $usuario->email,
            "rol" => $usuario->rol
        ];

        // Cargar carrito guardado
        $_SESSION['carrito'] = [];
        $stmt = $Ruta->prepare("SELECT producto_id, cantidad FROM carritos WHERE usuario_id = ?");
        $stmt->bind_param("i", $usuario['id']);
        $stmt->execute();
        $result = $stmt->get_result();
        while ($item = $result->fetch_assoc()) {
            $_SESSION['carrito'][$item['producto_id']] = $item['cantidad'];
        }

        header("Location: index.php");
        exit;
    } else {
        echo "Correo o contraseña incorrectos.";
    }
}
?>

<!-- <form method="post">
    <h2>Login</h2>
    <input type="email" name="email" placeholder="Correo" required><br>
    <input type="password" name="password" placeholder="Contraseña" required><br>
    <button type="submit">Ingresar</button>
</form>
<a href="registro.php">Registrarme</a> -->
