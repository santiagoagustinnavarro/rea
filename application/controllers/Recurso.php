<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Recurso extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library("session");

    }
    public function listar($usuario="")
    {
        $this->load->helper('url');
        $this->load->library("pagination");
        $config = array();
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['attributes'] = ['class' => 'page-link'];
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a href="#" class="page-link">';
        $config['cur_tag_close'] = '<span class="sr-only">(current)</span></a></li>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config["base_url"] = base_url() . "recurso/listar";
        $config["total_rows"] = $this->Recurso_model->record_count();
        $config["per_page"] = 6;
        $config["uri_segment"] = 3;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["results"] = $this->Recurso_model->fetch_recurso($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();     
        $this->load->view('header', ["title"=>'Recursos']);
        $this->load->view('inicio/area', $data);
        $this->load->view('footer');




        function listarConArchivos($usuario="")
        {
            if ($usuario!="") {
                $recursos=$this->Recurso_model->get_all_recurso(array('nombreUsuario'=>$usuario));
            } else {
                $recursos=$this->Recurso_model->get_all_recurso();
            }
            $anterior=-1;//Esta variable hara referencia al recurso anterior en el array
        $recursos=$recursos;//Recursos aux contiene dentro un array con los archivos correspondientes a cada recurso

         for ($i=0;$i<count($recursos);$i++) {
             $actual=$recursos[$i]["idRecurso"];//Recurso en el que estoy situado
            if ($actual==$anterior) {//El anterior y el actual son el mismo recurso
                //Aqui generamos el array con el archivo asociado y lo añadimos al array de archivos del recurso
                $archivo['idArchivo']=$recursos[$i]["idArchivo"];
                $archivo['nombre']=$recursos[$i]["nombre"];
                $archivo['ruta']=$recursos[$i]["ruta"];
                $recursos[$i-1]['archivos'][]=$archivo;
                unset($recursos[$i]);//Eliminamos el recurso repetido(posicion en el array)
                $recursos=array_values($recursos);//Restablecemos los indices del array
                $archivo=array();//vaciamos los datos del archivo para proximas cargas
                $i=$i-1;//Como eliminamos una posicion del array y lo reordenamos debemos situarnos -1 posicion por el reacomodo
            } else {//El recurso ah cambiado
                //Aqui generamos el array con el archivo asociado y lo añadimos al array de archivos del recurso
                $archivo['idArchivo']=$recursos[$i]["idArchivo"];
                $archivo['nombre']=$recursos[$i]["nombre"];
                $archivo['ruta']=$recursos[$i]["ruta"];
                unset($recursos[$i]['idArchivo']);//Quitamos el key idArchivo ya no es necesario
                unset($recursos[$i]['nombre']);//Quitamos el key nombre (del archivo) ya no es necesario
                unset($recursos[$i]['ruta']);//Quitamos el key ruta ya no es necesario
                $recursos[$i]['archivos'][]=$archivo;//Cargamos el archivo dentro del array correspondiente al recurso
                $archivo=array();//vaciamos los datos del archivo para proximas cargas
                $anterior=$actual;//Cambiamos de recurso por lo cual ahora este sera el anterior
            }
             print_r($recursos);
         }
        }
    }
}
