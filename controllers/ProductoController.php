<?php
require_once 'models/producto.php';
class ProductoController
{
          public function index()
          {
                    $productos = new Producto();
                    $producto  = $productos->getRandom(6);

                    require_once 'views/producto/destacados.php';
          }
          public function ver()
          {
                    if (isset($_GET['id'])) {
                              $id = $_GET['id'];

                              $producto = new Producto();
                              $producto->setId($id);
                              $pro = $producto->getOnly();
                              require_once 'views/producto/ver.php';
                    }
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

                                        //guardar imagenes
                                        if (isset($_FILES['imagen'])) {
                                                  $file     = $_FILES['imagen'];
                                                  $filename = $file['name'];
                                                  $mimetype = $file['type'];
                                                  if ($mimetype == "image/jpg" || $mimetype == "image/jpeg" || $mimetype == "image/png" || $mimetype == "image/gif") {

                                                            if (!is_dir('uploads/image/')) {
                                                                      mkdir('uploads/image/', 0777, true);
                                                            }
                                                            move_uploaded_file($file['tmp_name'], 'uploads/image/' . $filename);
                                                            $producto->setImagen($filename);
                                                  }
                                        }
                                        if (isset($_GET['id'])) {
                                                  $id = $_GET['id'];
                                                  $producto->setId($id);
                                                  $save = $producto->editar();
                                                  // var_dump($save);
                                                  // die();
                                        } else {
                                                  $save = $producto->save();
                                        }

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

          public function editar()
          {
                    Utils::isAdmin();
                    if (isset($_GET['id'])) {
                              $edit     = true;
                              $id       = $_GET['id'];
                              $producto = new Producto();
                              $producto->setId($id);
                              $pro = $producto->getOnly();

                              require_once 'views/producto/crear.php';
                    } else {
                              header('Location' . base_url . 'Producto/gestion');
                    }
          }

          public function eliminar()
          {
                    Utils::isAdmin();
                    if (isset($_GET['id'])) {
                              $productoDl = new Producto();
                              $productoDl->setId($_GET['id']);
                              $borrado = $productoDl->delete();
                              if ($borrado) {
                                        $_SESSION['borrado'] = 'exito';

                              } else {
                                        $_SESSION['borrado'] = 'fallido';
                              }

                    } else {
                              $_SESSION['borrado'] = 'fallido';
                    }
                    header('Location:' . base_url . 'Producto/gestion');
          }
} //fin de la clase
