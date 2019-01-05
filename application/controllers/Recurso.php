<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Recurso extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library("session");
        $this->load->model("Estadorecurso_model");
        $this->load->model("Tenerestadorecurso_model");
        $this->load->model("Nivel_model");
    
    }
    public function editar_recurso($idRecurso)
    {  $this->load->model("Categoria_model");
        $this->load->model("Tema_model");
        $this->load->model("Poseenivel_model");
        $this->load->library('form_validation');
       $data["user"]=$this->session->nombreUsuario;
        $data['recurso'] = $this->Recurso_model->get_recurso($idRecurso);//Obtenemos el recurso
        if (isset($data['recurso']['idRecurso'])) {
            $tema=[];//Vacio en la primera carga(Sin seleccion de categoria)
            $categoria=$this->Categoria_model->get_all_categoria();//Para listar las categorias
            if (count($_GET)>0) {//Recibio datos del ajax
                if ($this->input->get("categoria")!="") {//AJAX segun categoria solicitada
                    $tema=$this->Tema_model->get_all_tema($this->input->get("categoria"));//Para listar los temas de la categoria      
                }
            }
            $data["tema"]=$tema;//Mandamos los temas a la vista
            $data["categoria"]=$categoria;//Mandamos los temas a la vista 
            $data["archivos"]=$this->Archivo_model->get_all_archivo("
            archivo.idRecurso =$idRecurso");
             $data["nivelesSelect"]=$this->Nivel_model->get_all_nivel("EXISTS (SELECT nombreNivel
             FROM poseenivel
            WHERE poseenivel.idRecurso =$idRecurso and poseenivel.nombreNivel=nombre)");
            $data["niveles"]=$this->Nivel_model->get_all_nivel();
            if (count($_POST)>0){
                
                    $aRemover=$this->input->post("removerArchivo");
                    if ($aRemover!="") {
                        foreach ($aRemover as $unArchivo) {//Eliminamos los archivos solicitados
                            $this->Archivo_model->delete_archivo($unArchivo);
                        }
                    }
                
                $update=array("nombreCategoria"=>$this->input->post("categoria"),"nombreTema"=>$this->input->post("tema"),"titulo"=>$this->input->post("nombre"),"descripcion"=>$this->input->post("descripcion"));
                $this->Recurso_model->update_recurso($data['recurso']['idRecurso'],$update);
                $nivelesRemovidos=$this->input->post("removerNivel");
                if (isset($nivelesRemovidos)!="") {
                    foreach ($nivelesRemovidos as $unNivel) {
                        if ($this->Poseenivel_model->get_poseenivel($data['recurso']['idRecurso'], $unNivel)!=null) {//Que exista lo que desmarco sino lo salteamos
                            $this->Poseenivel_model->delete_poseenivel($data['recurso']['idRecurso'], $unNivel);
                        }
                    }
                }
                $niveles=$this->input->post("niveles");
                foreach($niveles as $unNivel){
                    if($this->Poseenivel_model->get_poseenivel($data['recurso']['idRecurso'],$unNivel)==null){
                        $this->Poseenivel_model->add_poseenivel(array("idRecurso"=>$data['recurso']['idRecurso'],"nombreNivel"=>$unNivel));
                    }
                   
                }

    $data["mensaje"]="<div class=\"alert alert-info\"> Recurso actualizado</div>";
    $archivos=$_FILES["archivo"];
   
    if(($archivos["name"][0]!="")){
        $params=['arrArc'=>$archivos["name"],'arrTmp'=>$archivos["tmp_name"]];
        $archs=$params["arrArc"];
        foreach ($archs as  $etiqueta=>$valor) {
            $rutas=["./assets/upload/","./assets/upload/".$this->session->nombreUsuario,"./assets/upload/".$this->session->nombreUsuario."/".$idRecurso."/"];
            $ruta="./assets/upload/".$this->session->nombreUsuario."/".$idRecurso."/";
            foreach ($rutas as $unaRuta) {
                if (!is_dir($unaRuta)) {
                    mkdir($unaRuta, 0777, true);
                }
            }
            $idArchivo=$this->Archivo_model->add_archivo(array("nombre"=>$valor,"ruta"=>$ruta,"idRecurso"=>$idRecurso));
        }
        for ($i=0;$i<(count($params['arrTmp']));$i++) {
            $arch=$ruta.basename($archs[$i]);
            move_uploaded_file($params['arrTmp'][$i], $arch);
        }
    }
    $data["tema"]=$tema;//Mandamos los temas a la vista
    $data["categoria"]=$categoria;//Mandamos los temas a la vista 
    $data["archivos"]=$this->Archivo_model->get_all_archivo("
    archivo.idRecurso =$idRecurso");
     $data["nivelesSelect"]=$this->Nivel_model->get_all_nivel("EXISTS (SELECT nombreNivel
     FROM poseenivel
    WHERE poseenivel.idRecurso =$idRecurso and poseenivel.nombreNivel=nombre)");
    $data["niveles"]=$this->Nivel_model->get_all_nivel();
    $data['recurso'] = $this->Recurso_model->get_recurso($idRecurso);
  $this->load->view("header", ["title"=>"Modificar recurso","scripts"=>["jquery-ui/jquery-ui.min.js","editar_recurso.js"]]);
                $this->load->view("recurso/editar_recurso", $data);
                $this->load->view("footer");
            } else {
                $this->load->view("header", ["title"=>"Modificar recurso","scripts"=>["editar_recurso.js"]]);
                $this->load->view("recurso/editar_recurso", $data);
                $this->load->view("footer");
            }
        } else {
            show_error('The recurso you are trying to edit does not exist.');
        }
    }
   
    /*
    * Editing a recurso
    */
    public function edit($idRecurso)
    {
      if (strtolower($this->session->rol=="administrador de recursos")) {
    
        // check if the recurso exists before trying to edit it
          $data['recurso'] = $this->Recurso_model->get_recurso($idRecurso);
          if (isset($data['recurso']['idRecurso'])) {
              $this->load->library('form_validation');
              if (!$this->input->post('estados') && !$this->input->post('validado')) {
                  $this->form_validation->set_rules('titulo', 'Titulo', 'required|max_length[30]');
                  $this->form_validation->set_rules('descripcion', 'Descripcion', 'required|max_length[80]');
				  $this->form_validation->set_rules('nombreUsuario', 'NombreUsuario', 'required|max_length[30]');
				  $this->form_validation->set_rules('nombreCategoria', 'NombreCategoria', 'required|max_length[50]');
                  $this->form_validation->set_rules('nombreTema', 'NombreTema', 'required|max_length[50]');
                  if ($this->form_validation->run()) {
                      $params = array(
                    'titulo' => $this->input->post('titulo'),
                    'descripcion' => $this->input->post('descripcion'),
					'nombreUsuario' => $this->input->post('nombreUsuario'),
					'nombreCategoria' => $this->input->post('nombreCategoria'),
                    'nombreTema' => $this->input->post('nombreTema'),
                    );
                      $this->Recurso_model->update_recurso($idRecurso, $params);
                      redirect('recurso/index');
                  } else {
                      $this->load->view("header", ["title"=>"Editar Recurso"]);
                      $this->load->view('recurso/edit', $data);
                      $this->load->view("footer");
                  }
              } elseif ($this->input->post('estados')!="" && $this->input->post('validado')!="") {
                  $estado= $this->input->post('estados');
                  if (strtolower($estado)=="alta") {
                      if ($this->mailAlta($this->input->post('nombreUsuario'), $this->input->post('email'))) {
                          ?>
						<?php
                      }
                  }
                  $this->Tenerestadorecurso_model->update_tenerestadorecurso(array("fechaFin"=>date("Y-m-d")), array("idRecurso"=>$idRecurso,"fechaFin"=>null));
                  $this->Tenerestadorecurso_model->add_tenerestadorecurso(array("nombreEstadoRecurso"=>$this->input->post("estados"),"fechaInicio"=>date("Y-m-d"),"hora"=>date("H:i:s"),"idRecurso"=>$idRecurso));
                  $this->Recurso_model->update_recurso($idRecurso, array("validado"=>(int) $this->input->post("validado")));
                  redirect('recurso/index');
              } elseif ($this->input->post('estados')!="") {
                  $estado= $this->input->post('estados');
                  if (strtolower($estado)=="alta") {
                      if ($this->mailAlta($this->input->post('nombreUsuario'), $this->input->post('email'))) {
                          ?>
						<?php
                      }
                  }
                  $this->Tenerestadorecurso_model->update_tenerestadorecurso(array("fechaFin"=>date("Y-m-d")), array("idRecurso"=>$idRecurso,"fechaFin"=>null));
                  $this->Tenerestadorecurso_model->add_tenerestadorecurso(array("nombreEstadoRecurso"=>$this->input->post("estados"),"fechaInicio"=>date("Y-m-d"),"hora"=>date("H:i:s"),"idRecurso"=>$idRecurso));
                  redirect('recurso/index');
              } else {
                  $this->Recurso_model->update_recurso($idRecurso, array("validado"=>$this->input->post("validado")));
                  redirect('recurso/index');
              }
          } else {
              show_error('The recurso you are trying to edit does not exist.');
          }
      }else{
        echo "No tiene permisos";
    }
    }
    private function mailAlta($nombreUsuario, $email)
    {
        $config['protocol'] = 'sendmail';
        $config['mailpath'] = "\"D:\\xampp\\sendmail\\sendmail.exe\" -t";
        $config['charset'] = 'iso-8859-1';
        $config['wordwrap'] = true;
        $this->email->initialize($config);
        $this->email->from('reanotreply@gmail.com', 'Programacionnet');
        $this->email->subject('Test Email (TEXT)');
        $this->email->to($email);
        $this->email->message('Su recurso ah sido dado de alta felicitaciones');
        echo "<span class='fa fa-spinner fa-spin'></span>";
        if ($this->email->send()) {
            $res=true;
        } else {
            $res=false;
        }
        return $res;
    }
    // check if the rol exists before trying to edit it
    /*
      * Listado de usuarios
      */
    public function index()
    {
        if (strtolower($this->session->rol)!="administrador de recursos") {
            echo "Acceso prohibido";
        } else {
            $params['limit'] = RECORDS_PER_PAGE;
            $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
            $config = $this->config->item('pagination');
            $config['base_url'] = site_url('recurso/index?');
            $config['total_rows'] = $this->Recurso_model->get_all_recurso_count();
            $this->pagination->initialize($config);
            $data['recurso'] = $this->Recurso_model->get_all_recurso($params);
            $this->load->view('header', array("title"=>"Lista de Recursos"));
            $this->load->view('recurso/index', $data);
            $this->load->view("footer");
        }
	}

	public function misRecursos($idRecurso="")
    {
        if (strtolower($this->session->rol)!="profesor") {
            echo "Acceso prohibido";
        } else {
			if ($this->input->post("eliminar")!="") {
				$this->Tenerestadorecurso_model->update_tenerestadorecurso(array("fechaFin"=>date("Y-m-d")), array("idRecurso"=>$idRecurso,"fechaFin"=>null));
				$this->Tenerestadorecurso_model->add_tenerestadorecurso(array("nombreEstadoRecurso"=>"Baja","fechaInicio"=>date("Y-m-d"),"hora"=>date("H:i:s"),"idRecurso"=>$idRecurso));
				redirect("recurso/misRecursos");
			}
			$nombreUsuario=$this->session->nombreUsuario;
			$recursos=$this->Recurso_model->get_all_mis_recursos($nombreUsuario);
			$this->load->view('header', array("title"=>"Mis Recursos"));
            $this->load->view('recurso/misRecursos',["recursos"=>$recursos]);
            $this->load->view("footer");
        }
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
            if ($filtros["categoria"]!="") {
                $data["temas"]=$this->Tema_model->get_all_tema($filtros["categoria"]);//Para el select de temas
            }
            $filtros['niveles']=json_decode($filtros["niveles"]);//Decodificamos el array de niveles
            if (count($filtros["niveles"])<=0 && $filtros["categoria"]=="" && $filtros["busqueda"]=="") {//Los filtros estan vacios(nada seleccionado)
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
        $this->load->model("Valoracion_model");
        $this->load->view('header', ["title"=>'Recursos',"scripts"=>["busquedaRecurso.js","starrr.js"],"styles"=>["styles.css","responsive.css"]]);
        $this->load->view('inicio/area', $data);
        $this->load->view('footer');
    }
    public function view($idRecurso)
    {
        $unRecurso=$this->listarConArchivos("", $idRecurso);
        if (isset($unRecurso[0])){
        $estado=$this->Tenerestadorecurso_model->get_tenerestadorecurso(array("idRecurso"=>$idRecurso,"fechaFin"=>null));
        if (strtolower($estado["nombreEstadoRecurso"])=="alta") {
            if ($this->session->iniciada) {

                if ($unRecurso[0]["nombreUsuario"]==$this->session->nombreUsuario) {
                    if ($this->input->post("eliminar")!="") {
                        $this->Tenerestadorecurso_model->update_tenerestadorecurso(array("fechaFin"=>date("Y-m-d")), array("idRecurso"=>$idRecurso,"fechaFin"=>null));
                        $this->Tenerestadorecurso_model->add_tenerestadorecurso(array("nombreEstadoRecurso"=>"Baja","fechaInicio"=>date("Y-m-d"),"hora"=>date("H:i:s"),"idRecurso"=>$idRecurso));
                        redirect("recurso/listar");
                    }
                    $this->load->view("header", ["title"=>"Ver Recurso"]);
          
                    $this->load->view("recurso/view", ["usuario"=>$this->session->nombreUsuario,"iniciada"=>true,"edicion"=>true,"unRecurso"=>$unRecurso]);
                    $this->load->view("footer");
                } else {
                    $this->load->view("header", ["title"=>"Ver Recurso","scripts"=>["starrr.js"]]);
                    $this->load->view("recurso/view", ["usuario"=>$this->session->nombreUsuario,"iniciada"=>true,"edicion"=>false,"unRecurso"=>$unRecurso]);
                    $this->load->view("footer");
                }
            }else{
                $this->load->view("header", ["title"=>"Ver Recurso","scripts"=>["starrr.js"]]);
                    $this->load->view("recurso/view", ["edicion"=>false,"iniciada"=>false,"unRecurso"=>$unRecurso]);
                    $this->load->view("footer");
            }
        }else{
            echo "El recurso  se encuentra en  estado ".$estado["nombreEstadoRecurso"];
        }
    }else{
        echo "No existe el recurso";
    }
    }

    function obtenerValor($idRecurso,$nombreUsuario){
        $this->load->model("Valoracion_model");
        $valorizacion=$this->Valoracion_model->get_valoracion("",$nombreUsuario,$idRecurso);
   
        if($valorizacion!=null){
            echo $valorizacion["puntaje"];
        }else{
            echo "0";
        }
    }
   function valorizar($idRecurso,$valor,$nombreUsuario){
    $this->load->model("Valoracion_model");
    $valorizar=$this->Valoracion_model->add_valoracion(array("idRecurso"=>$idRecurso,"puntaje"=>$valor,"nombreUsuario"=>$nombreUsuario));
    if($valorizar){
       $info=["estado"=>true,"estrellas"=>$valor];
    }else{
        $valorizar=$this->Valoracion_model->update_valoracion($idRecurso,$nombreUsuario,['puntaje'=>$valor]);
        if ($valorizar) {
            $info=["estado"=>true,"estrellas"=>$valor];
        }else{
            $info=["estado"=>false];
        }
       echo json_encode($info);
    
    }
   }
    private function listarConArchivos($usuario="", $idRecurso="")
    {
        if ($usuario!="" && $idRecurso=="") {//Listamos por nombre de usuario
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
    /** Esta funcion es la encargada de subir los recursos con sus respectivos archivos */
    public function subirRecurso()
    {
        $this->load->model("Tema_model");
        $this->load->model("Categoria_model");
        $this->load->model("Nivel_model");
        $this->load->model("Tenerestadorecurso_model");
        $niveles=$this->Nivel_model->get_all_nivel();
        $tema=[];
        $categoria=$this->Categoria_model->get_all_categoria();
        if (count($_GET)>0) {//Recibio datos del ajax
            if ($this->input->get("categoria")!="") {
                $tema=$this->Tema_model->get_all_tema($this->input->get("categoria"));
            }
        }
        if (count($_POST)>0) {//Recibio los datos del formulario
            
            $categoriaRecibida=$this->input->post("categoria");
            $nombreRec=$this->input->post("nombre");
            $desc=$this->input->post("textarea");
            $archivos=$_FILES["archivo"];
            $total=0;
            foreach ($archivos["size"] as $size) {
                $total=$total+$size;
            }
            if (($total/1024)<6144) {
                $nivelesRecibidos=$this->input->post("niveles");
                $temaRecibido=$this->input->post("tema");
                if ($nombreRec!="" && count($archivos)>0 && $desc!="") {
                    $params=['nombreRecurso'=>$nombreRec,'arrArc'=>$archivos["name"],'descripcion'=>$desc,'arrTmp'=>$archivos["tmp_name"],'categoria'=>$categoriaRecibida,'niveles'=>$nivelesRecibidos,'tema'=>$temaRecibido];
                    $recurso=$this->subida($params);
                    if ($recurso) {
                        $this->load->view("header", ["title" => "Subir Recurso","scripts"=>["subirRecurso.js"]]);
                        $this->load->view('recurso/subirRecurso', ["mensaje"=>"<div class='col-md-12 alert alert-success text-center'><h4>".'Recurso subido con exito'."</h4></div>",'categoria'=>$categoria,'niveles'=>$niveles,'tema'=>$tema]);
                        $this->load->view("footer");
                    } else {
                    }
                } else {
                    // Error falta completar alguno de los campos
                    $this->load->view("header", ["title" => "Subir Recurso","scripts"=>["subirRecurso.js"]]);
                    $this->load->view('recurso/subirRecurso', ["mensaje"=>"<div class='col-md-12 alert alert-danger text-center'><h4>".'Faltan completar campos'."</h4></div>",'categoria'=>$categoria,'niveles'=>$niveles,'tema'=>$tema]);
                    $this->load->view("footer");
                }
            } else {
                //Se ah excedido el tamaño de los archivos (6MB)
                $this->load->view("header", ["title" => "Subir Recurso","scripts"=>["subirRecurso.js"]]);
                $this->load->view('recurso/subirRecurso', ['mensaje'=>"<div class='col-md-12 alert alert-danger text-center'><h4>".'Tamaño excedido'."</h4></div>",'categoria'=>$categoria,'niveles'=>$niveles,'tema'=>$tema]);
                $this->load->view("footer");
            }
        } else {
            // Si no subio ningun archivo, muestra vista del subir archivo
            $this->load->view("header", ["title" => "Subir Recurso","scripts"=>["subirRecurso.js"]]);
            $this->load->view('recurso/subirRecurso', ['categoria'=>$categoria,'niveles'=>$niveles,'tema'=>$tema]);
            $this->load->view("footer");
        }
    }
    /** La funcion es llamada por subirArchivo, con esta funcion se cargan los archivos del recurso */
    private function subida($parametros)
    {
        $recurso=array("nombreCategoria"=>$parametros["categoria"],"nombreTema"=>$parametros["tema"],"nombreUsuario"=>$_SESSION["nombreUsuario"],"titulo"=>$parametros["nombreRecurso"],"descripcion"=>$parametros['descripcion']);
        $idRecurso=$this->Recurso_model->add_recurso($recurso);
        
        if ($idRecurso>0) {
            $this->Tenerestadorecurso_model->add_tenerestadorecurso(array("nombreEstadoRecurso"=>"alta","hora"=>date("H:i:s"),"fechaInicio"=>date("Y-m-d"),"idRecurso"=>$idRecurso));
            $res=true;
            $categoria=$parametros['categoria'];
            $tema=$parametros['tema'];
            $niveles=$parametros['niveles'];
            $archivos=$parametros['arrArc'];
            $this->load->model("Poseenivel_model");
            foreach ($niveles as $unNivel) {
                $this->Poseenivel_model->add_poseenivel(["idRecurso"=>$idRecurso,"nombreNivel"=>$unNivel]);
            }
            /* TERMINAR LA FUNCION NIVEL, Y FILTRAR TEMA Y CATEGORIA
            if($tema=='selected'){
                $temaSel=$this->Tema_model->add_tema($params);
            }
            if($categoria=='selected'){
                $catSel=$this->Categoria_model->add_categoria($params);
            }
            foreach($niveles as $nivel){
                if($nivel=='checked'){
                    $param=$nivel['idRecurso']
                    $arrNivel=$this->Nivel_model->add_nivel($param);
                }
            }*/
            foreach ($archivos as $etiqueta=>$valor) {
                $rutas=["./assets/upload/","./assets/upload/".$this->session->nombreUsuario,"./assets/upload/".$this->session->nombreUsuario."/".$idRecurso."/"];
                $ruta="./assets/upload/".$this->session->nombreUsuario."/".$idRecurso."/";
                foreach ($rutas as $unaRuta) {
                    if (!is_dir($unaRuta)) {
                        mkdir($unaRuta, 0777, true);
                    }
                }
                $idArchivo=$this->Archivo_model->add_archivo(array("nombre"=>$valor,"ruta"=>$ruta,"idRecurso"=>$idRecurso));
            }
            for ($i=0;$i<(count($parametros['arrTmp']));$i++) {
                $arch=$ruta.basename($archivos[$i]);
                move_uploaded_file($parametros['arrTmp'][$i], $arch);
            }
        } else {
            $res=false;
        }
        return $res;
    }
    
    /** Lista todas las caterias de la base de datos */
    public function agregarSeccion()
    {
        $this->load->model("Tenercategoria_model");
        $this->load->library('form_validation');
        $this->load->model("Tema_model");
        $this->load->model("Categoria_model");
        $categoria=$this->Categoria_model->get_all_categoria();//Obtenemos todas las categorias
        $this->form_validation->set_rules('nuevoTema', 'nombre del tema', 'required');//Campo de tema requerido
        if ($this->input->post("categoria")=="") {
            //Cuando el usuario no selecciono ninguna opcion de categoria hacemos requerido el campo de nueva categoria
            $this->form_validation->set_rules('nuevaCategoria', 'nombre de categoria', 'required', array('required'=>"Debe seleccionar una categoria o ingresar una"));
        }
        if ($this->form_validation->run() == false) {//Si no se cumplen las validaciones del formulario
            $this->load->view("header", ["title"=>"Agregar Seccion","scripts"=>["agregarCat.js"]]);
            $this->load->view("recurso/agregarSeccion", ['categorias'=>$categoria,'temas'=>array()]);
            $this->load->view("footer");
        } else {//Se cumplen las validaciones del formulario
            ///////////////////Añadimos el tema///////////////////////////////////
            $existeTema=$this->Tema_model->get_tema($this->input->post("nuevoTema"));
            if ($existeTema==null) {//Si el tema existe lo añadimos sino no hacemos nada con el tema
                if ($this->input->post("descNuevoTema")=="") {//No dio descripcion del tema
                    $this->Tema_model->add_tema(array("nombre"=>$this->input->post("nuevoTema")));
                } else {//Dio descripcion del tema
                    $this->Tema_model->add_tema(array("nombre"=>$this->input->post("nuevoTema"),"descripcion"=>$this->input->post("descNuevoTema")));
                }
            }
            ////////////////////Añadimos la categoria///////////////////////////////////////////
            if ($this->input->post("categoria")=="") {
                $existeCat=$this->Categoria_model->get_categoria($this->input->post("nuevaCategoria"));
                if ($existeCat==null) {//La categoria no existe
                    if ($this->input->post("descNuevaCategoria")=="") {//No dio descripcion de la categoria
                        $this->Categoria_model->add_categoria(array("nombre"=>$this->input->post("nuevaCategoria")));
                    } else {//Dio descripcion de la categoria
                        $this->Categoria_model->add_categoria(array("nombre"=>$this->input->post("nuevaCategoria"),"descripcion"=>$this->input->post("descNuevaCategoria")));
                    }
                    $this->Tenercategoria_model->add_tenercategoria(array("nombreCategoria"=>$this->input->post("nuevaCategoria"),"nombreTema"=>$this->input->post("nuevoTema")));
                } else {
                    $this->load->view("header", ["title"=>"Agregar Seccion ","scripts"=>["agregarCat.js"]]);
                    $this->load->view("recurso/agregarSeccion", ['mensaje'=>'La categoria ya existe','categorias'=>$categoria,'temas'=>array()]);
                    $this->load->view("footer");
                }
                ////////////////////Añadimos a la tabla de vinculacion///////////////////////////////////
            } else {//Selecciono una categoria ya existente
                $existeTenerCat=$this->Tenercategoria_model->get_tenercategoria($this->input->post("nuevoTema"), $this->input->post("categoria"));
                if ($existeTenerCat==null) {
                    $this->Tenercategoria_model->add_tenercategoria(array("nombreCategoria"=>$this->input->post("categoria"),"nombreTema"=>$this->input->post("nuevoTema")));
                    $this->load->view("header", ["title"=>"Agregar Seccion ","scripts"=>["agregarCat.js"]]);
                    $this->load->view("recurso/agregarSeccion", ['mensaje'=>'Agregado con exito','categorias'=>$categoria,'temas'=>array()]);
                    $this->load->view("footer");
                } else {
                    $this->load->view("header", ["title"=>"Agregar Seccion ","scripts"=>["agregarCat.js"]]);
                    $this->load->view("recurso/agregarSeccion", ['mensaje'=>'El tema ya se encuentra vinculado a la categoria','categorias'=>$categoria,'temas'=>array()]);
                    $this->load->view("footer");
                }
            }
        }
        if (count($_GET)>0) {//Caso ajax
            $tema=$this->Tema_model->get_all_tema($this->input->post("seleccionado"));
            $this->load->view("header", ["title"=>"Agregar Seccion","scripts"=>["agregarCat.js"]]);
            $this->load->view("recurso/agregarSeccion", ["categorias"=>$categoria,"temas"=>$tema]);
            $this->load->view("footer");
        }
    }
}
