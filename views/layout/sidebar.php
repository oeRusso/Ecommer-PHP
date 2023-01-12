<aside id="lateral">

    <div id="login" class="block-aside">
        <h3>Mi carrito</h3>
        <ul>
            <?php $stats = utils::statsCarrito() ?>
            <?php if (isset($stats)) : ?>
                <li> <a href="<?= BASE_URL ?>carrito/index">Productos(<?= $stats['count'] ?>)</a></li>
                <li> <a href="<?= BASE_URL ?>carrito/index">Total:<?= $stats['total'] ?>$USD </a></li>
            <?php endif; ?>
            <li> <a href="<?= BASE_URL ?>carrito/index"> Ver el carrito</a></li>
        </ul>
    </div>

    <div id="login" class="block-aside">
        <?php if (!isset($_SESSION['identity'])) : ?>
            <h3>Entrar a la web</h3>
            <form action="<?= BASE_URL ?>usuario/login" method="POST">
                <label for="email">Email</label>
                <input type="email" name="email">

                <label for="password">Password</label>
                <input type="password" name="password">

                <input type="submit" values="Enviar">
            </form>
        <?php else : ?>
            <h3><?= $_SESSION['identity']->nombre ?> <?= $_SESSION['identity']->apellido ?></h3>
        <?php endif; ?>
        <ul>
            <?php if (isset($_SESSION['admin'])) : ?>
                <li><a href="<?= BASE_URL ?>categoria/index">Gestionar categorias</a></li>
                <li><a href="<?= BASE_URL ?>producto/gestion">Gestionar productos</a></li>
                <li><a href="#">Gestionar pedidos</a></li>
            <?php endif; ?>

            <?php if (isset($_SESSION['identity'])) : ?>
                <li><a href="#">Mis pedidos</a></li>
                <li><a href="<?= BASE_URL ?>usuario/logout">Cerrar Sesion</a></li>
            <?php else : ?>
                <li><a href="<?= BASE_URL ?>usuario/registro">Registrate Aqui</a></li>
            <?php endif; ?>

        </ul>
    </div>

</aside>
<div id="central">