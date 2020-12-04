<?php
require_once 'models/pedido.php';
class PedidoController
{
          public function hacer()
          {
                    require_once 'views/pedido/hacer.php';
          }

          public function add()
          {
                    if (isset($_SESSION['usuario'])) {
                              //guardar datos en el base de datos
                              $ciudad     = isset($_POST['ciudad']) ? $_POST['ciudad'] : false;
                              $barrio     = isset($_POST['barrio']) ? $_POST['barrio'] : false;
                              $direccion  = isset($_POST['direccion']) ? $_POST['direccion'] : false;
                              $usuario_id = $_SESSION['usuario']->id;
                              $pedidos    = Utils::statsCarrito();
                              $costo      = $pedidos['total'];

                              if ($ciudad && $barrio && $direccion) {

                                        $pedido = new Pedido();
                                        $pedido->setUsuarioId($usuario_id);
                                        $pedido->setCiudad($ciudad);
                                        $pedido->setBarrio($barrio);
                                        $pedido->setDireccion($direccion);
                                        $pedido->setCosto($costo);

                                        $save = $pedido->save();

                                        //guardar linea pedido
                                        $save_linea = $pedido->save_linea();

                                        if ($save && save_linea) {
                                                  $_SESSION['pedido'] = 'completado';
                                                  header('Location:' . base_url . 'Pedido/hacer');
                                        } else {
                                                  $_SESSION['pedido'] = 'fallido';
                                        }

                              } else {
                                        $_SESSION['pedido'] = 'fallido';
                              }
                    } else {
                              header('Location:' . base_url);
                    }
                    header('Location: ' . base_url . 'Pedido/confirmado');

          }

          public function confirmado()
          {
                    if (isset($_SESSION['usuario'])) {
                              $usuario_id = $_SESSION['usuario'];
                              $pedido     = new Pedido();
                              $pedido->setUsuarioId($usuario_id->id);
                              $pedidos         = $pedido->getOnlyUser();
                              $producto_pedios = new Pedido();
                              $producto        = $producto_pedios->getPedidosByUser($pedidos->id);
                    }
                    require_once 'views/pedido/confirmado.php';
          }
} //fin del controlador
