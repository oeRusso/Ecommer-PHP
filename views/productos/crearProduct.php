<!-- juegan todos estos -->
<?php if (isset($edit) && isset($pro) && is_object($pro)) : ?>
    <h1>Editar productos <?= $pro->nombre ?></h1>
    <?php $url_action = BASE_URL . "producto//saveProduct&id=" . $pro->id ?>
<?php else : ?>
    <h1>Crear nuevos productos</h1>
    <?php $url_action = BASE_URL . "producto/saveProduct" ?>
<?php endif; ?>
<div class="form-container">
    <form action="<?= $url_action ?>" method="POST" enctype="multipart/form-data">

        <label for="categoria">CATEGORIA</label>
        <?php $categorias = utils::showCategorias(); ?>
        <select name="categoria">
            <?php while ($cat = $categorias->fetch_object()) : ?>
                <option value="<?= $cat->id ?>" <?= isset($pro) && is_object($pro) && $cat->id == $pro->categoria_id ? 'selected' : ''; ?>>
                    <?= $cat->nombre ?>
                </option>
            <?php endwhile; ?>
        </select>

        <label for="nombre">NOMBRE</label>
        <input type="text" name="nombre" value="<?= isset($pro) && is_object($pro) ? $pro->nombre : ''; ?>">

        <label for="descripcion">DESCRIPCION</label>
        <textarea name="descripcion"><?= isset($pro) && is_object($pro) ? $pro->descripcion : ''; ?></textarea>

        <label for="precio">PRECIO</label>
        <input type="text" name="precio" value="<?= isset($pro) && is_object($pro) ? $pro->precio : ''; ?>">

        <label for="stock">STOCK</label>
        <input type="text" name="stock" value="<?= isset($pro) && is_object($pro) ? $pro->stock : ''; ?>">

        <label for="imagen">IMAGEN</label>
        <?php if (isset($pro) && is_object($pro) && !empty($pro->imagen)) : ?>
            <img src="<?= BASE_URL ?>uploads/images/<?= $pro->imagen ?>" class="thumb">
        <?php endif; ?>
        <input type="file" name="imagen">

        <input type="submit" value="guardar">

    </form>
</div>