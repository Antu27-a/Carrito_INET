<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agencia de Turismo</title>
    <link rel="stylesheet" href="static/css/global.css">
    <link rel="stylesheet" href="static/css/styles.css">
    <script src="static/js/index.js"></script>
    <!-- <script src="static/js/menu.js"></script> -->
    <script src="static/js/menu-hamburguesa.js"></script>
    <link rel="icon" href="static/img/logo.png" type="image/x-icon">
</head>

<body>

    <header>
        <div class="logo-container">
            <img src="static/img/logo.png" alt="Logo" class="logo">
            <div class="slogan">
                <h1> DEST </h1>
                <p>Descubre el mundo, vive la experiencia</p>
            </div>
        </div>
        <nav>
            <ul id="nav-menu">
                <!-- Este contenido será reemplazado por JavaScript -->
                <?php
                    if (isset($_SESSION['usuario'])) {
                        // Usuario logueado
                        echo "<a href='model/logout.php' class='btn-login'>Cerrar sesión</a>";
                    } else {
                        // Usuario invitado
                        echo "<a href='view/pages/login.php' class='btn-login'>Iniciar sesión</a>";
                        echo "<a href='view/pages/registrar.php' class='btn-registrarse'>Registrarse</a>";
                    }
                ?>
            </ul>
        </nav>

        <!-- Botón Hamburguesa -->
        <button class="boton-hamburguesa" onclick="toggleMenu()">
            <div class="linea-hamburguesa"></div>
            <div class="linea-hamburguesa"></div>
            <div class="linea-hamburguesa"></div>
        </button>
    </header>


    <!-- Overlay para cerrar menú -->
    <div class="overlay-menu" onclick="cerrarMenu()"></div>

    <!-- Menú Móvil -->
    <div class="menu-movil">
        <ul>
            <li><a href="pages/productos.html"><img src="../static/img/encabezado-logueado/home.png" alt="home">
                    Inicio</a></li>
            <li><a href="pages/carrito.html"><img src="../static/img/encabezado-logueado/grocery-store.png"
                        alt="carrito"> Ver carrito</a></li>
            <li><a href="pages/ver-pedidos.html"><img src="../static/img/encabezado-logueado/bolsa-de-la-compra.png"
                        alt="pedidos"> Mis pedidos</a></li>
            <li><a class="cerrar-sesion" href="../index.html"><img src="../static/img/encabezado-logueado/salida.png"
                        alt="salir"> Cerrar sesión</a></li>
        </ul>
    </div>

    <!-- INDEX INVITADO -->
    <main>
        <section class="hero">
            <div class="slider-container">
                <div class="slider">
                    <div class="slide active">
                        <img src="static/img/Isla del Sol.jpg" alt="Playa paradisíaca">
                        <div class="slide-content">
                            <h2>Descubre paraísos inexplorados</h2>
                            <p>Las mejores playas te esperan</p>
                        </div>
                    </div>
                    <div class="slide">
                        <img src="static/img/descarga (27).jpg" Montañas majestuosas">
                        <div class="slide-content">
                            <h2>Aventuras en la montaña</h2>
                            <p>Explora paisajes impresionantes</p>
                        </div>
                    </div>
                    <div class="slide">
                        <img src="static/img/descarga (28).jpg" alt="Ciudad histórica">
                        <div class="slide-content">
                            <h2>Ciudades con historia</h2>
                            <p>Cultura y tradición en cada rincón</p>
                        </div>
                    </div>
                </div>
                <button class="slider-btn prev-btn"><i class="fas fa-chevron-left"></i></button>
                <button class="slider-btn next-btn"><i class="fas fa-chevron-right"></i></button>
                <div class="slider-dots">
                    <span class="dot active" data-index="0"></span>
                    <span class="dot" data-index="1"></span>
                    <span class="dot" data-index="2"></span>
                </div>
            </div>
        </section>

        <section class="welcome">
            <div class="welcome-content">
                <h2 class="section-title">Bienvenido a DEST la mejor agencia de viajes!! </h2>
                <p class="description">
                    En - nos dedicamos a crear experiencias de viaje inolvidables. Nuestro sistema
                    te permite planificar tus vacaciones de manera sencilla y personalizada, con acceso a los
                    mejores destinos, hoteles y actividades alrededor del mundo. Nuestro equipo de expertos
                    está listo para ayudarte a diseñar el viaje de tus sueños.
                </p>
                <div class="auth-buttons">
                    <button class="btn login-btn">Iniciar Sesión</button>
                    <button class="btn register-btn">Regístrate</button>
                </div>
            </div>
        </section>

        <!-- 12
        Panel exclusivo para usuarios
        <section id="panel-usuario" class="rol-section" style="display: none;">
            <h2>¡Hola viajero!</h2>
            <p>Podés ver tus pedidos, seguir explorando productos o planificar tu próxima aventura.</p>
        </section>

        Panel exclusivo para jefe de ventas
        <section id="panel-jefe" class="rol-section" style="display: none;">
            <h2>Panel de Jefe de Ventas</h2>
            <p>Desde aquí podés cargar productos nuevos, revisar pedidos y administrar tu cuenta.</p>
        </section> -->


        <section class="features">
            <div class="feature">
                <img src="static/img/tarjetas/viajar (1).png" alt="">
                <i class="fas fa-map-marked-alt"></i>
                <h3>Destinos Exclusivos</h3>
                <p>Accede a los lugares más increíbles del planeta.</p>
            </div>
            <div class="feature">
                <img src="static/img/tarjetas/mejor-precio (1).png" alt="">
                <i class="fas fa-percent"></i>
                <h3>Mejores Precios</h3>
                <p>Garantizamos las tarifas más competitivas.</p>
            </div>
            <div class="feature">
                <img src="static/img/tarjetas/servicio-al-cliente (1).png" alt="">
                <i class="fas fa-headset"></i>
                <h3>Atención 24/7</h3>
                <p>Estamos para ayudarte en cualquier momento.</p>
            </div>
        </section>
    </main>

    <footer>
        <div class="footer-content">
            <div class="footer-logo">
                <img src="static/img/tarjetas/viajar (1).png" alt="Logo" class="logo-small">
                <p>AGENCIA DE VIAJES </p>
            </div>

        </div>
    </footer>

    <!-- Modal de inicio de sesión -->
    <div class="modal" id="login-modal">
        <div class="modal-content">
            <span class="close-modal">&times;</span>
            <h2>Iniciar Sesión</h2>
            <form class="auth-form" method="post">
                <div class="form-group">
                    <label for="email">Correo electrónico</label>
                    <input type="email" id="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Contraseña</label>
                    <input type="password" id="password" required>
                </div>
                <button type="submit" class="btn submit-btn">Entrar</button>
                <p class="form-footer">¿No tienes cuenta? <a href="#" id="show-register">Regístrate</a></p>
            </form>
        </div>
    </div>

    <!-- Modal de registro -->
    <div class="modal" id="register-modal">
        <div class="modal-content">
            <span class="close-modal">&times;</span>
            <h2>Crear Cuenta</h2>
            <form onsubmit="return validarContraseñas()" class="auth-form" method="post">
                <div class="form-group">
                    <label for="reg-name">Nombre completo</label>
                    <input type="text" name="nombre" id="reg-name" required>
                </div>
                <div class="form-group">
                    <label for="reg-email">Correo electrónico</label>
                    <input type="email" name="email" id="reg-email" required>
                </div>
                <div class="form-group">
                    <label for="reg-password">Contraseña</label>
                    <input type="password" id="reg-password" required>
                </div>
                <div class="form-group">
                    <label for="reg-confirm">Confirmar contraseña</label>
                    <input type="password" name="password" id="reg-confirm" required>
                </div>
                <script>
                    function validarContraseñas() {
                        const pass = document.getElementById("reg-password").value;
                        const confirmPass = document.getElementById("reg-confirm").value;

                        if (pass !== confirmPass) {
                            alert("Las contraseñas no coinciden.");
                            return false; // Evita que se envíe el formulario
                        }
                        return true;
                    }
                </script>
                <button type="submit" name="ingreso" class="btn submit-btn">Registrarse</button>
                <p class="form-footer">¿Ya tienes cuenta? <a href="#" id="show-login">Inicia sesión</a></p>
                
            </form>
        </div>
    </div>
    <?php
        include("controller/db.php");
        include("model/registro.php");
        include("model/login.php");
    ?>

    <script src="static/js/index.js"></script>


</body>

</html>