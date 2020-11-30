<?php
ob_start();
?>
<?php
session_start();
require_once 'autoload.php';
require_once 'config/database.php';
require_once 'config/parametros.php';
require_once 'helpers/utils.php';
require_once 'views/layout/header.php';
require_once 'views/layout/sidebar.php';

//conexion con la base  de datos
$db = Database::conectar();
function show_error()
{
          $error = new ErrorController();
          $error->index();
}

if (isset($_GET['controlador'])) {
          $nombre_controlador = $_GET['controlador'] . 'Controller';
} elseif (!isset($_GET['controlador']) && !isset($_GET['action'])) {
          $nombre_controlador = controller_default;
} else {
          show_error();
          exit();
}

if (class_exists($nombre_controlador)) {

          $controlador = new $nombre_controlador();

          if (isset($_GET['action']) && method_exists($controlador, $_GET['action'])) {
                    $action = $_GET['action'];
                    $controlador->$action();
          } elseif (!isset($_GET['controlador']) && !isset($_GET['action'])) {
                    $action_default = action_default;
                    $controlador->$action_default();
          } else {
                    show_error();
          }

} else {
          show_error();
}
?>
<?php
ob_end_flush();
