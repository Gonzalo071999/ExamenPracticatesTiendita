<?php
class Productos extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model("ProductoModel");
        $this->load->model("CategoriasModel");
        $this->load->library('session');
        $this->load->library('form_validation');
    }

    public function agregar(){
        $this->load->view("header");
        $this->load->view("productos/agregar");
        $this->load->view("pie");
    }

    public function guardarCambios(){

        $id_producto = $this->input->post("id_prodcuto");
        $nombre_producto  = $this->input->post("nombre_producto");
        $this->form_validation->set_rules('nombre_producto', 'Nombre', 'trim|required', array('required' => 'Debes proporcionar un %s.'));
       
        if ($this->form_validation->run() == false) {
            $this->editar($id_producto);
        } else {
        $resultado = $this->ProductoModel->guardarCambios(
            $this->input->post("id_producto"),
            $this->input->post("nombre_producto"),
            $this->input->post("cantidad"),
            $this->input->post("id_categoria")

        );
        
        if($resultado){
            $mensaje = "Producto actualizado correctamente";
            $clase = "success";
        }else{
            $mensaje = "Error al actualizar el producto";
            $clase = "danger";
        }
        $this->session->set_flashdata(array(
            "mensaje" => $mensaje,
            "clase" => $clase,
        ));
        redirect("productos/");
    }

    }

    public function editar($id_producto){
        $producto = $this->ProductoModel->uno($id_producto);
        $categoria = $this->CategoriasModel->todos();
        if(null === $producto){
            $this->session->set_flashdata(array(
                "mensaje" => "El producto que quieres editar no existe",
                "clase" => "danger",
            ));
            redirect("productos/");
        }
        $this->load->view("header");
        $this->load->view("productos/editar", array("producto" => $producto,"categoria"=>$categoria));
        $this->load->view("pie");
    }

    public function eliminar($id){
        $resultado = $this->ProductoModel->eliminar($id);
        if($resultado){
            $mensaje = "Producto eliminado correctamente";
            $clase = "success";
        }else{
            $mensaje = "Error al eliminar el producto";
            $clase = "danger";
        }
        $this->session->set_flashdata(array(
            "mensaje" => $mensaje,
            "clase" => $clase,
        ));
        redirect("productos/");
    }

    public function index(){
        
        $this->load->view("header");
        $this->load->view("productos/listar", array("productos" => $this->ProductoModel->todos()));
        $this->load->view("pie");
    }

   public function guardar(){
        $resultado = $this->ProductoModel->nuevo(
                $this->input->post("nombre_producto"),
                $this->input->post("cantidad"),
                $this->input->post("id_categoria"),
            );
        if($resultado){
            $mensaje = "Producto guardado correctamente";
            $clase = "success";
        }else{
            $mensaje = "Error al guardar el producto";
            $clase = "danger";
        }
        $this->session->set_flashdata(array(
            "mensaje" => $mensaje,
            "clase" => $clase,
        ));
        redirect("productos/agregar");
    }
}
?>
