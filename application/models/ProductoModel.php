<?php
    class ProductoModel extends CI_Model{
        public $id_producto;
        public $nombre_producto;
        public $cantidad;
        public $id_categoria;

        public function __construct(){
            $this->load->database();
        }

        public function nuevo($nombre_producto, $cantidad,$id_categoria){
            $this->nombre_producto = $nombre_producto;
            $this->cantidad = $cantidad;
            $this->id_categoria = $id_categoria;
            return $this->db->insert('productos', $this);
        }

        public function guardarCambios($id_producto,$nombre_producto, $cantidad,$id_categoria){
            $this->id_producto = $id_producto;
            $this->nombre_producto = $nombre_producto;
            $this->cantidad = $cantidad;
            $this->id_categoria = $id_categoria;
            return $this->db->update('productos', $this, array("id_producto" => $id_producto));
        }

        public function todos(){
            $this->db->select("p.*, c.nombre_categoria as nombre_categoria");
            $this->db->join("categoria c", "c.id_categoria = p.id_categoria");
            //$resultados = $this->db->get("productos p");
            return $this->db->get("productos p")->result();
        }

        public function eliminar($id_producto){
            return $this->db->delete("productos", array("id_producto" => $id_producto));
        }

        public function uno($id_producto){
            return $this->db->get_where("productos", array("id_producto" => $id_producto))->row();
        }

    }
?>