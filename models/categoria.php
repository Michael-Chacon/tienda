<?php

class Categoria
{
          public $nombre;
          public $db;

          public function __construct()
          {
                    $this->db = Database::conectar();
          }

          public function getNombre()
          {
                    return $this->nombre;
          }

          public function setNombre($nombre)
          {
                    $this->nombre = $this->db->real_escape_string($nombre);
          }

          public function getAll()
          {
                    $categorias = $this->db->query("SELECT * FROM categorias ORDER BY id DESC");
                    return $categorias;
          }

          public function save()
          {
                    $sql     = "INSERT INTO categorias VALUES(null, '{$this->getNombre()}');";
                    $guardar = $this->db->query($sql);

                    $result = false;
                    if ($guardar) {
                              $result = true;
                    }
                    return $result;
          }
} //fin de la clase
