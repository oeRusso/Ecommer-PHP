<?php if (isset($categoria)) : ?>
    <h1><?= $categoria->nombre ?></h1>
    <?php if ($productos->num_rows == 0) : ?>
        <p>No hay productos para mostrar</p>
    <?php else : ?>
        
        <?php while ($product = $productos->fetch_object()) : ?>
            <div class="product">
                <a href="<?= BASE_URL ?>producto/verProduct&id=<?php echo $product->id ?>">
                    <?php if ($product->imagen != null) : ?>
                        <img src="<?= BASE_URL ?>uploads/images/<?= $product->imagen ?>">
                    <?php else : ?>
                        <img src="<?= BASE_URL ?>assets/img/camiseta.png">
                    <?php endif; ?>
                    <h2><?= $product->nombre ?></h2>
                </a>
                <p><?= $product->precio ?></p>
                <a href="<?=BASE_URL?>carrito/add&id=<?=$product->id?>" class="button">Comprar</a>

            </div>
        <?php endwhile; ?>
    <?php endif; ?>
<?php else : ?>
    <h1>La categoria No existe</h1>
<?php endif; ?>