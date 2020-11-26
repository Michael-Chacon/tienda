<?php

require_once 'autoload.php';
require_once 'views/layout/header.php';
require_once 'views/layout/sidebar.php';

if (isset($_GET['controlador'])) {
    $nombre_controlador = $_GET['controlador'] . 'Controller';
} else {
    echo "La pagina que buscas no existe-- ontrolador--";
    exit();
}

if (class_exists($nombre_controlador)) {

    $controlador = new $nombre_controlador();

    if (isset($_GET['action']) && method_exists($controlador, $_GET['action'])) {
        $action = $_GET['action'];
        $controlador->$action();
    } else {
        echo "La pagina no existe-- metodo";
    }

} else {
    echo "La pagina que buscas no existe -- clase controlador";
}
