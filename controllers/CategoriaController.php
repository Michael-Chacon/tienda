<?php
require_once 'models/categoria.php';
class CategoriaController
{
          public function index()
          {
                    Utils::isAdmin();
                    $categoria  = new Categoria();
                    $categorias = $categoria->getAll();
                    require_once 'views/categoria/index.php';
          }

          public function crear()
          {
                    Utils::isAdmin();
                    require_once 'views/categoria/crear.php';
          }

          public function save()
          {
                    Utils::isAdmin();
                    if (isset($_POST) && isset($_POST['nombre'])) {
                              //guardar la categoria
                              $categoria = new Categoria();
                              $categoria->setNombre($_POST['nombre']);
                              $categoria->save();
                              // var_dump($categoria->save());
                              // die();
                    }
                    header("Location: " . base_url . "Categoria/index");

          }
}
