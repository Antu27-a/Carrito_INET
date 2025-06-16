<?php
session_start();


$carrito = $_SESSION['carrito'] ?? [];

$total = 0;
?>

<h2>Tu carrito</h2>

<?php if (!empty($carrito)): ?>
    <table border="1" cellpadding="10">
        <tr>
            <th>Producto</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Subtotal</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($carrito as $id => $cantidad): 
            $stmt = $Ruta->prepare("SELECT nombre, precio FROM productos WHERE id = ?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $res = $stmt->get_result()->fetch_assoc();
            $subtotal = $res['precio'] * $cantidad;
            $total += $subtotal;
        ?>
            <tr>
                <td><?= $res['nombre'] ?></td>
                <td>$<?= number_format($res['precio'], 2, ',', '.') ?></td>
                <td><?= $cantidad ?></td>
                <td>$<?= number_format($subtotal, 2, ',', '.') ?></td>
                <td>
                    <form action="accion.php" method="post" style="display:inline">
                        <input type="hidden" name="producto_id" value="<?= $id ?>">
                        <button name="accion" value="sumar">+</button>
                        <button name="accion" value="restar">-</button>
                        <button name="accion" value="eliminar">🗑️</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <h3>Total: $<?= number_format($total, 2, ',', '.') ?></h3>
    <a href="index.php">Seguir comprando</a>
<?php else: ?>
    <p>El carrito está vacío.</p>
<?php endif; ?>
