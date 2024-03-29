<h1>Carrito de la Compra</h1>
<?php if (isset($_SESSION['carrtito']) && count($_SESSION['carrito']) >= 1) : ?>
    <table>
        <tr>
            <th>Imagen</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Unidades</th>
            <th>Eliminar</th>
        </tr>
        <?php foreach ($carrito as $indice => $elemento) :
            $producto = $elemento['producto'];
        ?>

            <tr>
                <td>
                    <?php if ($producto->imagen != null) : ?>
                        <img src="<?= base_url ?>uploads/images/<?= $producto->imagen ?>" class="img_carrito">
                    <?php else : ?>
                        <img src="<?= base_url ?>assets/img/camiseta.png" alt="Camiseta " class="img_carrito">
                    <?php endif; ?>
                </td>
                <td>
                    <a href="<?= base_url ?>producto/ver&id=<?= $producto->id ?>"> <?= $producto->nombre ?></a>
                </td>
                <td>
                    <?= $producto->precio ?>
                </td>
                <td>
                    <?= $elemento['unidades'] ?>
                </td>
                <td>
                <a href="<?= base_url ?>carrito/delete&index=<?=$indice?>" class="button button-delete button-red">Eliminar articulo</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <br>
    <div class="delete-carrito">
        <a href="<?= base_url ?>carrito/deleteAll" class="button button-delete button-red">Vaciar Carrito</a>
    </div>
    <div class="total-carrito">
        <?php $stats = Utils::statsCarrito(); ?>
        <h3>precio total: $<?= $stats['total'] ?> Euros</h3>
        <a href="<?= base_url ?>pedido/hacer" class="button button-pedido">Hacer pedido</a>
    </div>

                    <?php else: ?>
                        <p>El carrito esta vacio Añade algun producto</p>

<?php endif; ?>