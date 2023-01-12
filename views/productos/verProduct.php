<?php if (isset($product)) : ?>
    <h1><?= $product->nombre ?></h1>
    <div class="details-product">
        <div class="img">
            <?php if ($product->imagen != null) : ?>
                <img src="<?= BASE_URL ?>uploads/images/<?= $product->imagen ?>">
            <?php else : ?>
                <img src="<?= BASE_URL ?>assets/img/camiseta.png">
            <?php endif; ?>
        </div>
        <div class="data">
            <p class="description"><?= $product->descripcion ?></p>
            <p class="price">$USD <?= $product->precio ?></p>
            <a href="<?=BASE_URL?>carrito/add&id=<?=$product->id?>" class="button">Comprar</a>
        </div>
    </div>
<?php else : ?>
    <h1>El producto No existe</h1>
<?php endif; ?>