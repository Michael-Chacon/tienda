<?php

class Pedido
{
          private $id;
          private $usuario_id;
          private $ciudad;
          private $barrio;
          private $direccion;
          private $stock;
          private $costo;
          private $estado;
          private $fecha;
          private $hora;

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

          public function getUsuarioId()
          {
                    return $this->usuario_id;
          }

          public function getCiudad()
          {
                    return $this->ciudad;
          }

          public function getBarrio()
          {
                    return $this->barrio;
          }

          public function getDireccion()
          {
                    return $this->direccion;
          }

          public function getCosto()
          {
                    return $this->costo;
          }

          public function getEstado()
          {
                    return $this->estado;
          }

          public function getFecha()
          {
                    return $this->fecha;
          }

          public function getHora()
          {
                    return $this->hora;
          }

          //metodos set
          public function setId($id)
          {
                    $this->id = $this->db->real_escape_string($id);
          }

          public function setUsuarioId($usuario_id)
          {
                    $this->usuario_id = $this->db->real_escape_string($usuario_id);
          }

          public function setCiudad($ciudad)
          {
                    $this->ciudad = $this->db->real_escape_string($ciudad);
          }

          public function setBarrio($barrio)
          {
                    $this->barrio = $this->db->real_escape_string($barrio);
          }

          public function setDireccion($direccion)
          {
                    $this->direccion = $this->db->real_escape_string($direccion);
          }

          public function setCosto($costo)
          {
                    $this->costo = $this->db->real_escape_string($costo);
          }

          public function setEstado($estado)
          {
                    $this->estado = $this->db->real_escape_string($estado);
          }

          public function setFecha($fecha)
          {
                    $this->fecha = $this->db->real_escape_string($fecha);
          }

          public function setHora($hora)
          {
                    $this->hora = $this->db->real_escape_string($hora);
          }
          //mis metodos
          public function getAll()
          {
                    $pedidos = $this->db->query("SELECT * FROM pedidos ORDER BY id DESC;");
                    return $pedidos;
          }

          public function getOnly()
          {
                    $pedido = $this->db->query("SELECT * FROM pedidos WHERE id = {$this->getId()};");
                    return $pedido->fetch_object();
          }

          public function getOnlyUser()
          {
                    $sql = "SELECT p.id, p.costo  FROM pedidos p
                              INNER JOIN     lineas_pedidos lp ON lp.pedido_id = p.id
                              WHERE p.usuario_id   = {$this->getUsuarioId()} ORDER BY id DESC LIMIT 1;";

                    $pedido = $this->db->query($sql);
                    return $pedido->fetch_object();
          }

          public function getPedidosByUser($id)
          {
                    $sql = "SELECT pr.*, lp.unidades FROM productos pr
                    INNER JOIN lineas_pedidos lp ON   pr.id = lp.producto_id
                     WHERE pedido_id = {$id};";

                    $productos = $this->db->query($sql);

                    return $productos;
          }

          public function save()
          {
                    $sql = "INSERT INTO pedidos VALUES(null, {$this->getUsuarioId()}, '{$this->getCiudad()}', '{$this->getBarrio()}', '{$this->getDireccion()}', {$this->getCosto()}, 'confirmado', CURDATE(), CURTIME());";

                    $insertar = $this->db->query($sql);

                    $resultado = false;
                    if ($insertar) {
                              $resultado = $insertar;
                    }

                    return $resultado;
          }

          public function save_linea()
          {
                    $sql = "SELECT  LAST_INSERT_ID() AS 'pedido';";

                    $query = $this->db->query($sql);

                    $pedido_id = $query->fetch_object()->pedido;

                    foreach ($_SESSION['carrito'] as $elemento) {
                              $producto = $elemento['producto'];
                              $insert   = "INSERT INTO lineas_pedidos VALUES(null,  {$pedido_id}, {$producto->id}, {$elemento['unidades']});";
                              $save     = $this->db->query($insert);
                    }
                    $resultado = false;
                    if ($save) {
                              $resultado = true;
                    }
                    return $resultado;

          }

          public function ver()
          {
                    $productos = $this->db->query("SELECT *  FROM productos WHERE categoria_id = {$this->getCategoriaId()};");
                    return $productos;
          }

} //final de  la clase
