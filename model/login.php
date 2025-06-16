<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!empty($_POST["ingresar"])) { 
    if (!empty($_POST["email"]) && !empty($_POST["password"])) {
        $email = $_POST["email"];
        $password = $_POST["password"];

        // Consulta preparada
        $stmt = $Ruta->prepare("SELECT * FROM usuario WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($usuario = $resultado->fetch_object()) {
            // Verifica la contraseña ingresada contra la hasheada
            if (password_verify($password, $usuario->password)) {
                $_SESSION['usuario'] = [
                    "id" => $usuario['id'],
                    "nombre" => $usuario['nombre'],
                    "email" => $usuario['email']
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

                header("Location: ../view/carrito.html");
                exit;
            } else {
                echo 'Error en Usuario y/o Contraseña';
            }
        } else {
            echo 'Error en Usuario y/o Contraseña';
        }
    } else {
        echo 'Todos los campos son obligatorios';
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
