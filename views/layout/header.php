<!DOCTYPE html>
<html lang="es">
      <head>
            <meta charset="utf-8">
                  <meta content="width=device-width, initial-scale=1.0" name="viewport">
                        <title>
                              Tienda de camisetas
                        </title>
                        <link href="<?=base_url?>assets/css/estilos.css" rel="stylesheet">
                        </link>
                  </meta>
            </meta>
      </head>
      <body>
            <div id="container">
                  <!-- cabecera -->
                  <header id="header">
                        <div id="logo">
                              <img alt="comiseta" class="logo" src="<?=base_url?>assets/img/logo.jpg">
                                    <a href="index.php">
                                          Tienda de camisetas
                                    </a>
                              </img>
                        </div>
                  </header>
                  <!-- menu -->
                  <?php $listarCategorias = Utils::showCategorias();?>
                  <nav id="menu">
                        <ul>
                              <li>
                                    <a href="#">
                                          Inicio
                                    </a>
                              </li>
                              <?php while ($cat = $listarCategorias->fetch_object()): ?>
                              <li>
                                    <a href="#">
                                       <?=$cat->nombre;?>
                                    </a>
                              </li>
                             <?php endwhile;?>
                        </ul>
                  </nav>
                  <div id="content">
