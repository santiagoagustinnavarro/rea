<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Recurso extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library("session");
    }

    /*
    * Editing a recurso
    */
    public function edit($recursos)
    {
        foreach ($recursos as $idRecurso) {
            $data['recurso'] = $this->Recurso_model->get_recurso($idRecurso);
        
            if (isset($data['recurso']['idRecurso'])) {
                if (isset($_POST) && count($_POST) > 0) {
                    $params = array(
                        'validado' => 1,
                    );
                    $this->Recurso_model->update_recurso($idRecurso, $params);
                    redirect('rol/index');
                } else {
                    $data['_view'] = 'rol/edit';
                    $this->load->view('layouts/main', $data);
                }
            } else {
                show_error('The rol you are trying to edit does not exist.');
            }
        }
    }
    // check if the rol exists before trying to edit it
      
    public function index()
    {
        $recursos = $this->listarConArchivos();
        $this->load->view("header", ["title" => "Administrar usuarios"]);
        $this->load->view('recurso/index', ['recursos' => $recursos]);
        $this->load->view("footer");
    }
    /**
     * Funcion encargada de listar todos los recursos(con paginacion)
     */
    public function listar()
    {
        $this->load->model("Tema_model");
		$this->load->model("Nivel_model");
        $this->load->model("Categoria_model");
        $data["temas"]=array();
        $filtros=$_POST;//Array con los filtros de categoria,tema,niveles y el filtrado de la busqueda
        if (count($filtros)<=0) {//No se han recibido filtros
            $filtros="";
        } else {//Se han recibido filtros
            if($filtros["categoria"]!=""){
                $data["temas"]=$this->Tema_model->get_all_tema($filtros["categoria"]);//Para el select de temas
            }
            $filtros['niveles']=json_decode($filtros["niveles"]);//Decodificamos el array de niveles
            if(count($filtros["niveles"])<=0 && $filtros["categoria"]=="" && $filtros["busqueda"]==""){//Los filtros estan vacios(nada seleccionado)
                $filtros="";
            }
        }
        
        $this->load->helper('url');
        $this->load->library("pagination");
        //Comienza la configuracion para la paginacion de los recursos
        $config = array();
        //Para ponerle bootstrap a la pagination
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
        $config["base_url"] = base_url()."recurso/listar";//Lugar en el que se cargaran los recursos
        $config["per_page"] = 9;//Numero de elementos por pagina
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;//Si el numero en la uri(3ra posicion) no existe por defecto sera el 0
        $config["total_rows"] = $this->Recurso_model->row_count($filtros);//LLamamos al modelo que nos brindara el total de filas
        $config["uri_segment"] = 3;//Ubicacion de la uri en la cual aparecera el numero de pagina
        $this->pagination->initialize($config);//Inicializa la paginacion con las configuraciones proporcionadas
        $data["results"] = $this->Recurso_model->fetch_recurso($config["per_page"], $page, $filtros);//Recursos a mostrar
        $data["links"] = $this->pagination->create_links();//Generamos los links de las paginaciones
        $data["categoria"]=$this->Categoria_model->get_all_categoria();//Para el select de categorias
        $data["niveles"]=$this->Nivel_model->get_all_nivel();//Para el select de niveles
        $this->load->view('header', ["title"=>'Recursos',"scripts"=>["busquedaRecurso.js"]]);
        $this->load->view('inicio/area',$data);
        $this->load->view('footer');
    }
    public function view($idRecurso)
    {
        $unRecurso=$this->listarConArchivos("", $idRecurso);
        $this->load->view("header", ["title"=>"Un recurso"]);
        $this->load->view("area/recurso", ["unRecurso"=>$unRecurso]);
        $this->load->view("footer");
    }
    private function listarConArchivos($usuario="", $idRecurso="")
    {
        if ($usuario!="" && $idRecurso=="") {
            $recursos=$this->Recurso_model->get_all_recurso(array('recurso.nombreUsuario'=>$usuario));
        } elseif ($idRecurso!="") {
            $recursos=$this->Recurso_model->get_all_recurso(array('recurso.idRecurso'=>$idRecurso));
        } else {
            $recursos=$this->Recurso_model->get_all_recurso();
        }
        $anterior=-1;//Esta variable hara referencia al recurso anterior en el array
        

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
        }
        return $recursos;
    }
}
