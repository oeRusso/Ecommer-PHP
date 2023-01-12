<h1>Registrarse</h1>

<?php
require_once 'helpers/utils.php';
if (isset($_SESSION['register']) && $_SESSION['register'] == 'Complete') : ?>
    <strong class="alert-green">Registro completado satisfactoriamente</strong>

<?php elseif (isset($_SESSION['register']) && $_SESSION['register'] == 'Failed') : ?>

    <strong class="alert-red">Registro fallido, introduce bien los datos</strong>

<?php endif; ?>

<?php utils::deleteSession('register'); ?>




<form action="<?= BASE_URL ?>usuario/save" method="POST">
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" required>

    <label for="apellidos">Apellidos</label>
    <input type="text" name="apellidos" required>

    <label for="email">Email</label>
    <input type="email" name="email" required>

    <label for="password">Password</label>
    <input type="password" name="password" required>

    <input type="submit" value="Registrarse">

</form>