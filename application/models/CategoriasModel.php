<?php
    class CategoriasModel extends CI_Model{
        public $id_categoria;
        public $nombre_categoria;
       

        public function __construct(){
            $this->load->database();
        }
        
        public function nuevo($nombre_categoria){
            $this->nombre_categoria = $nombre_categoria;
            return $this->db->insert('categoria', $this);
        }
        public function todos(){
            //$resultados = $this->db->get("productos p");
            return $this->db->get("categoria")->result();
        }

    }
?>