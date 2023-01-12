<h1>Gestion de productos</h1>

<a href="<?= BASE_URL ?>producto/crearProduct" class="button button-small">

    Crear productos

</a>
<?php if (isset($_SESSION['producto']) && $_SESSION['producto'] == 'Complete') : ?>
    <strong class="alert-green">Su producto se ha creado correctamente</strong>
<?php elseif (isset($_SESSION['producto']) && $_SESSION['producto'] != 'Complete') : ?>
    <strong class="alert-red">Su producto NO se ha creado correctamente</strong>
<?php endif; ?>
<?php utils::deleteSession('producto') ?>

<?php if (isset($_SESSION['delete']) && $_SESSION['delete'] == 'complete') : ?>
    <strong class="alert-green">Su producto se ha BORRADO exitosamente</strong>
<?php elseif (isset($_SESSION['delete']) && $_SESSION['delete'] != 'complete') : ?>
    <strong class="alert-red">Su producto NO se ha NO se ha borrado correctamente</strong>
<?php endif; ?>
<?php utils::deleteSession('delete') ?>

<table>
    <tr>
        <th>ID</th>
        <th>NOMBRE</th>
        <th>PRECIO</th>
        <th>STOCK</th>
        <th>ACCIONES</th>

    </tr>

    <?php while ($pro = $productos->fetch_object()) : ?>
        <tr>
            <td><?= $pro->id; ?></td>
            <td><?= $pro->nombre; ?></td>
            <td><?= $pro->precio; ?></td>
            <td><?= $pro->stock; ?></td>
            <td>
                <a href="<?=BASE_URL?>producto/editar&id=<?=$pro->id?>" class="button button-gestion ">Editar</a>
                <a href="<?=BASE_URL?>producto/eliminar&id=<?=$pro->id?>" class="button button-gestion button-red">Eliminar</a>
            </td>
        </tr>
    <?php endwhile; ?>
</table>