<?php
class Comentario extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library("session");
    }

    public function generarComentario($idRecurso="")
    {
        if ($this->session->iniciada && $idRecurso!="") {
            $usuario=$this->session->nombreUsuario;
            if ($this->input->method()==="post") {
                if (!$comentario=$this->input->post("descripcion")) {
                    $this->load->view("header", ["title"=>"Falta descripcion"]);
                    $this->load->view("comentario/generarComentario",["idRecurso"=>$idRecurso]);
                    $this->load->view("footer");
                }else{
                    $this->load->model("Comentario_model");
                    $this->Comentario_model->add_comentario(["fecha"=>date("Y-m-d"),"hora"=>date("H:i:s"),"nombreUsuario"=>$usuario,"descripcion"=>$comentario,"idRecurso"=>$idRecurso]);
                    $this->load->view("header", ["title"=>"Comentario agregado"]);
                    $this->load->view("comentario/generarComentario",["idRecurso"=>$idRecurso]);
                    $this->load->view("footer");
                }
            }
            else{
                $this->load->view("header", ["idRecurso"=>$idRecurso,"title"=>"Agregar comentario"]);
                $this->load->view("comentario/generarComentario" , ["idRecurso"=>$idRecurso]);
                $this->load->view("footer");

            }
        }
    }
}
?>
