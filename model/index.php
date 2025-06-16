<?php
session_start();


$productos = $Ruta->query("SELECT * FROM productos")->fetch_all(MYSQLI_ASSOC);
?>


    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="estilos.css">
    </head>
    <body>
        
        <?php if (isset($_SESSION['usuario'])): ?>
            <h2>Bienvenido, <?= $_SESSION['usuario']['nombre'] ?> | <a href="logout.php"><strong style="color: purple">Cerrar sesión</strong></a></h2>

            <div style="display: flex; gap: 20px;">
                <?php foreach ($productos as $producto): ?>
                    <div style="border: 1px solid #ccc; padding: 20px; text-align: center; width: 200px;">
                        <img src="<?= $producto['imagen'] ?>" alt="<?= $producto['nombre'] ?>" width="100">
                        <h3><?= $producto['nombre'] ?></h3>
                        <p>$<?= number_format($producto['precio'], 2, ',', '.') ?></p>
                        <form method="post" action="agregar.php">
                            <input type="hidden" name="producto_id" value="<?= $producto['id'] ?>">
                            <button type="submit">Agregar al carrito</button>
                        </form>
                    </div>
                <?php endforeach; ?>
            </div>  

            <p><a href="carrito.php">🛒 Ver carrito</a></p>
        <?php else: ?>
            <p>Iniciá sesión para ver productos.</p>
        <?php endif; ?>
    </body>
    </html>
