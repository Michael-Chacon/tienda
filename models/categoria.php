<?php

class Categoria
{
          private $id;
          public $nombre;
          public $db;

          public function __construct()
          {
                    $this->db = Database::conectar();
          }

          public function getId()
          {
                    return $this->id;
          }

          public function getNombre()
          {
                    return $this->nombre;
          }

          public function setNombre($nombre)
          {
                    $this->nombre = $this->db->real_escape_string($nombre);
          }

          public function setId($id)
          {
                    $this->id = $this->db->real_escape_string($id);
          }

          public function getAll()
          {
                    $categorias = $this->db->query("SELECT * FROM categorias ORDER BY id DESC;");
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

          public function categoria()
          {
                    $categoria = $this->db->query("SELECT *  FROM categorias WHERE id = {$this->getId()}");
                    return $categoria->fetch_object();
          }
} //fin de la clase
