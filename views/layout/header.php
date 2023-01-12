<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo BASE_URL ?>assets/css/style.css">
    <title>TIENDA DE CAMISETAS</title>
</head>

<body>
    <div id="container">
        <header id="header">
            <div id="logo">
                <img src="<?php echo BASE_URL ?>assets/img/camiseta.png" alt="camiseta logo">
                <a href="<?=BASE_URL?>">
                    Tienda de camisetas

                </a>

            </div>

        </header>
        <?php  $categorias = utils::showCategorias(); ?>

        <nav id="menu">
            <ul>
                <li>
                    <a href="<?=BASE_URL?>">Inicio</a>
                </li>
                <?php while ($cat = $categorias->fetch_object()) : ?>
                    <li>
                        <a href="<?=BASE_URL?>categoria/verCategorias&id=<?=$cat->id?>"><?php echo $cat->nombre; ?></a>
                    </li>
                <?php endwhile; ?>


            </ul>

        </nav>
        <div id="content">