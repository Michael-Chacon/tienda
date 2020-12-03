<?php
require_once 'models/producto.php';
class CarritoController
{
          public function index()
          {

                    $carrito = $_SESSION['carrito'];
                    require_once 'views/carrito/index.php';
          }

          public function add()
          {
                    if (isset($_GET['id'])) {
                              $producto_id = $_GET['id'];
                    } else {
                              header('Location: ' . base_url);
                    }

                    if (isset($_SESSION['carrito'])) {
                              $contador = 0;
                              foreach ($_SESSION['carrito'] as $indice => $elemento) {
                                        if ($elemento['id_producto'] == $producto_id) {
                                                  $_SESSION['carrito'][$indice]['unidades']++;
                                                  $contador++;
                                        }
                              }
                    }
                    if (!isset($contador) || $contador == 0) {
                              // consegui producto
                              $producto = new Producto();
                              $producto->setId($producto_id);
                              $productos = $producto->getOnly();

                              //Añadir al carrito
                              if (is_object($productos)) {
                                        $_SESSION['carrito'][] = array(
                                                  "id_producto" => $productos->id,
                                                  "precio"      => $productos->precio,
                                                  "unidades"    => 1,
                                                  "producto"    => $productos,
                                        );
                              }
                    }
                    header('Location: ' . base_url . 'Carrito/index');
          }

          public function delete_all()
          {
                    unset($_SESSION['carrito']);
                    header('Location: ' . base_url . 'Carrito/index');
          }
} //fin del controlador
