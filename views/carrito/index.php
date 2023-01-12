<h1>Carrito</h1>

<table>

    <tr>
        <th>Imagen</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Unidades</th>
    </tr>
    <?php foreach ($carrito as $indice => $elemento) :
        $producto = $elemento['producto'];
    ?>

        <tr>
            <td>
                <?php if ($producto->imagen != null) : ?>
                    <img src="<?= BASE_URL ?>uploads/images/<?= $producto->imagen ?>" class="img-carrito">
                <?php else : ?>
                    <img src="<?= BASE_URL ?>assets/img/camiseta.png" class="img-carrito">
                <?php endif; ?>
            </td>
            <td>
                <a href="<?= BASE_URL ?>producto/verProduct&id=<?= $producto->id ?>"><?= $producto->nombre ?></a>
            </td>
            <td>
                <?= $producto->precio ?>
            </td>
            <td>
                <?= $elemento['unidades'] ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table> <br> <br>
<div class="total-carrito">
    <?php $stats = utils::statsCarrito() ?>
    <h3>Total: $USD<?= $stats['total'] ?></h3>
    <a href="<?= BASE_URL ?>pedido/hacerPedido" class="button button-pedido">Continuar pedido</a>
</div>