<?php
class Utils
{
          public static function deleteSession($name)
          {
                    if (isset($_SESSION[$name])) {
                              $_SESSION[$name] = null;
                              unset($_SESSION[$name]);
                    }
                    return $name;
          }

          public static function isAdmin()
          {
                    if (!isset($_SESSION['admin'])) {
                              header("Location: " . base_url);
                    } else {
                              return true;
                    }
          }

          public static function showCategorias()
          {
                    require_once 'models/categoria.php';
                    $categoria  = new Categoria();
                    $categorias = $categoria->getAll();
                    return $categorias;
          }

          public static function statsCarrito()
          {
                    $stats = [
                              "count" => 0,
                              "total" => 0,
                    ];
                    if (isset($_SESSION['carrito'])) {
                              $stats['count'] = count($_SESSION['carrito']);
                              foreach ($_SESSION['carrito'] as $producto) {
                                        $stats['total'] += $producto['precio'] * $producto['unidades'];
                              }
                    }
                    return $stats;
          }
} // fin de la clase
