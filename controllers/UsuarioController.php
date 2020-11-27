<?php
require_once 'models/usuario.php';
class UsuarioController
{

          public function index()
          {
                    echo 'contriolador usuario, accion index';
          }
          public function registro()
          {
                    require_once 'views/usuario/registro.php';
          }
          public function save()
          {
                    // var_dump($_POST['nombre']);
                    // die();
                    if (isset($_POST)) {

                              $nombre    = isset($_POST['nombre']) ? $_POST['nombre'] : false;
                              $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : false;
                              $email     = isset($_POST['email']) ? $_POST['email'] : false;
                              $password  = isset($_POST['password']) ? $_POST['password'] : false;

                              if ($nombre && $apellidos && $email && $password) {

                                        $usuario = new Usuario();
                                        $usuario->setNombre($nombre);
                                        $usuario->setApellidos($apellidos);
                                        $usuario->setEmail($email);
                                        $usuario->setPassword($password);
                                        $save = $usuario->save();

                                        if ($save) {
                                                  echo 'Registro EXITOSO';
                                                  $_SESSION['register'] = 'completado';
                                        } else {
                                                  $_SESSION['register'] = 'fallo';
                                                  echo 'REgistro FALLIDO';
                                        }
                              } else {
                                        $_SESSION['register'] = 'fallo';
                              }
                    } else {
                              $_SESSION['register'] = 'fallo';
                    }
                    header("Location:" . base_url . 'Usuario/registro');
          }

}
