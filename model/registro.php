<?php
// Activamos modo estricto para que los errores de mysqli se lancen como excepciones
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

if (!empty($_POST["ingreso"])) {
    if (!empty($_POST["nombre"]) && !empty($_POST["email"])  && !empty($_POST["password"]) ) {
        // Sanitizamos y almacenamos los datos
        $nombre = $_POST["nombre"];
        $email = $_POST["email"];
        $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

        try {
            // Preparamos la consulta
            $stmt = $Ruta->prepare("INSERT INTO usuarios(nombre, email, password) 
                                    VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $nombre, $email, $password);
            $stmt->execute();

            echo "Registrado correctamente";

        } catch (mysqli_sql_exception $e) {
            // Error 1062 = entrada duplicada (email u otro campo UNIQUE)
            if ($e->getCode() == 1062) {
                echo "El email ya está registrado";
            } else {
                echo "Error al registrar: " . $e->getMessage();
            }
        }

    } else {
        echo 'Debe completar todos los datos';
    }
}
?>


<!-- <form method="post">
    <h2>Registro</h2>
    <input type="text" name="nombre" placeholder="Nombre" required><br>
    <input type="email" name="email" placeholder="Correo" required><br>
    <input type="password" name="password" placeholder="Contraseña" required><br>
    <button type="submit">Registrarse</button>
</form> -->
