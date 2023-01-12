<?php

session_start();
require_once 'autoload.php';
require_once 'config/db.php';
require_once 'config/parameters.php';
require_once 'helpers/utils.php';
require_once 'views/layout/header.php';
require_once 'views/layout/sidebar.php';



function showEror()
{
    $error = new errorController();
    $error->index();
}

if (isset($_GET['controller'])) {
    $nombre_controlador = $_GET['controller'] . 'Controller';
} elseif (!isset($_GET['controller']) && !isset($_GET['action'])) {
    $nombre_controlador = controllerDefault;
} else {
    showEror();
    exit;
}

if (class_exists($nombre_controlador)) {;
    $controlador = new $nombre_controlador();

    if (isset($_GET['action']) && method_exists($controlador, $_GET['action'])) {

        $action = $_GET['action'];
        $controlador->$action();
    } elseif (!isset($_GET['controller']) && !isset($_GET['action'])) {
        $action_default = action_default;
        $controlador->$action_default();
    } else {
        showEror();
    }
} else {
    showEror();
}

require_once 'views/layout/footer.php';

// no me carga el footer cuando quito el htacees, lo que cambio de antes que me andaba todo era que le agregue ese htaccees, despues el error controller, parameters