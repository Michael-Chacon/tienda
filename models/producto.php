<?php

class Producto
{
          private $id;
          private $categoria_id;
          private $nombre;
          private $descripcion;
          private $precio;
          private $stock;
          private $oferta;
          private $fecha;
          private $imagen;

          private $db;

          public function __construct()
          {
                    $this->db = Database::conectar();
          }

          //motodos get
          public function getId()
          {
                    return $this->id;
          }

          public function getCategoriaId()
          {
                    return $this->categoria_id;
          }

          public function getNombre()
          {
                    return $this->nombre;
          }

          public function getDescripcion()
          {
                    return $this->descripcion;
          }

          public function getPrecio()
          {
                    return $this->precio;
          }

          public function getStock()
          {
                    return $this->stock;
          }

          public function getOferta()
          {
                    return $this->oferta;
          }

          public function getFecha()
          {
                    return $this->fecha;
          }

          public function getImagen()
          {
                    return $this->imagen;
          }

          //metodos set
          public function setId($id)
          {
                    $this->id = $this->db->real_escape_string($id);
          }

          public function setCategoriaId($categoria_id)
          {
                    $this->categoria_id = $this->db->real_escape_string($categoria_id);
          }

          public function setNombre($nombre)
          {
                    $this->nombre = $this->db->real_escape_string($nombre);
          }

          public function setDescripcion($descripcion)
          {
                    $this->descripcion = $this->db->real_escape_string($descripcion);
          }

          public function setPrecio($precio)
          {
                    $this->precio = $this->db->real_escape_string($precio);
          }

          public function setStock($stock)
          {
                    $this->stock = $this->db->real_escape_string($stock);
          }

          public function setOferta($oferta)
          {
                    $this->oferta = $this->db->real_escape_string($oferta);
          }

          public function setFecha($fecha)
          {
                    $this->fecha = $this->db->real_escape_string($fecha);
          }

          public function setImagen($imagen)
          {
                    $this->imagen = $this->db->real_escape_string($imagen);
          }

          public function getAll()
          {
                    $productos = $this->db->query("SELECT * FROM productos ORDER BY id DESC;");
                    return $productos;
          }

          public function getOnly()
          {
                    $producto = $this->db->query("SELECT * FROM productos WHERE id = {$this->getId()};");
                    return $producto->fetch_object();
          }

          public function save()
          {
                    $sql = "INSERT INTO productos VALUES(null, {$this->getCategoriaId()}, '{$this->getNombre()}', '{$this->getDescripcion()}', {$this->getPrecio()}, {$this->getStock()}, null, CURDATE(), '{$this->getImagen()}');";

                    $insertar = $this->db->query($sql);

                    $resultado = false;
                    if ($insertar) {
                              $resultado = $insertar;
                    }
                    return $resultado;
          }
          public function editar()
          {
                    $sql = "UPDATE productos SET categoria_id =  {$this->getCategoriaId()}, nombre = '{$this->getNombre()}',  descripcion = '{$this->getDescripcion()}',  precio ={$this->getPrecio()},  stock = {$this->getStock()}";

                    if ($this->getImagen() != null) {
                              $sql .= ", imagen = '{$this->getImagen()}'";
                    }
                    $sql .= " WHERE id = {$this->getId()};";

                    $insertar = $this->db->query($sql);

                    $resultado = false;
                    if ($insertar) {
                              $resultado = $insertar;
                    }
                    return $resultado;
          }

          public function delete()
          {
                    $sql      = "DELETE FROM productos WHERE id = {$this->id};";
                    $eliminar = $this->db->query($sql);

                    $resultado = false;
                    if ($eliminar) {
                              $resultado = $eliminar;
                    }
                    return $resultado;
          }

} //final de  la clase
