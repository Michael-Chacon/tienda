<?php
require_once 'models/producto.php';
class ProductoController
{
          public function index()
          {

                    require_once 'views/producto/destacados.php';
          }
          public function gestion()
          {
                    Utils::isAdmin();
                    $productos = new Producto();
                    $producto  = $productos->getAll();
                    require_once 'views/producto/gestion.php';
          }
          public function crear()
          {
                    Utils::isAdmin();
                    require_once 'views/producto/crear.php';
          }

          public function save()
          {

                    if (isset($_POST)) {
                              $categoria   = isset($_POST['categoria']) ? $_POST['categoria'] : false;
                              $nombre      = isset($_POST['nombre']) ? $_POST['nombre'] : false;
                              $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : false;
                              $precio      = isset($_POST['precio']) ? $_POST['precio'] : false;
                              $stock       = isset($_POST['stock']) ? $_POST['stock'] : false;

                              if ($categoria && $nombre && $descripcion && $precio && $stock) {

                                        Utils::isAdmin();
                                        $producto = new Producto();
                                        $producto->setCategoriaId($_POST{'categoria'});
                                        $producto->setNombre($_POST{'nombre'});
                                        $producto->setDescripcion($_POST{'descripcion'});
                                        $producto->setPrecio($_POST{'precio'});
                                        $producto->setStock($_POST{'stock'});
                                        $producto->setImagen($_POST{'imagen'});
                                        $save = $producto->save();

                                        if ($save) {
                                                  $_SESSION['producto'] = 'completado';
                                        } else {
                                                  $_SESSION['producto'] = "fallido";
                                        }

                              } else {
                                        $_SESSION['producto'] = 'fallido';
                              }
                    } else {
                              $_SESSION['producto'] = 'fallido,';
                    }
                    // var_dump($_SESSION['producto']);
                    // die();
                    header("Location:" . base_url . "Producto/gestion");
          }
} //fin de la clase
