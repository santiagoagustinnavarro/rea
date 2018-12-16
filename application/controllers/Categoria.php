
<?php 
class Categoria extends CI_Controller
{
    function __construct(){
        parent::__construct();
        $this->load->model("Categoria_model");
    }
    /** Lista todas las caterias de la base de datos */
    public function add()
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
            $this->load->view("categoria/add", ['categorias'=>$categoria,'temas'=>array()]);
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
                    $this->load->view("header", ["title"=>"Agregar Seccion ","scripts"=>["agregarCat.js"]]);
                    $this->load->view("categoria/add", ['mensaje'=>'Agregado con exito','categorias'=>$categoria,'temas'=>array()]);
                    $this->load->view("footer");
                } else {
                    $this->load->view("header", ["title"=>"Agregar Seccion ","scripts"=>["agregarCat.js"]]);
                    $this->load->view("categoria/add", ['mensaje'=>'La categoria ya existe','categorias'=>$categoria,'temas'=>array()]);
                    $this->load->view("footer");
                }
                ////////////////////Añadimos a la tabla de vinculacion///////////////////////////////////
            } else {//Selecciono una categoria ya existente
                $existeTenerCat=$this->Tenercategoria_model->get_tenercategoria($this->input->post("nuevoTema"), $this->input->post("categoria"));
                if ($existeTenerCat==null) {
                    $this->Tenercategoria_model->add_tenercategoria(array("nombreCategoria"=>$this->input->post("categoria"),"nombreTema"=>$this->input->post("nuevoTema")));
                    $this->load->view("header", ["title"=>"Agregar Seccion ","scripts"=>["agregarCat.js"]]);
                    $this->load->view("categoria/add", ['mensaje'=>'Agregado con exito','categorias'=>$categoria,'temas'=>array()]);
                    $this->load->view("footer");
                } else {
                    $this->load->view("header", ["title"=>"Agregar Seccion ","scripts"=>["agregarCat.js"]]);
                    $this->load->view("categoria/add", ['mensaje'=>'El tema ya se encuentra vinculado a la categoria','categorias'=>$categoria,'temas'=>array()]);
                    $this->load->view("footer");
                }
            }
        }
        if (count($_GET)>0) {//Caso ajax
            $tema=$this->Tema_model->get_all_tema($this->input->post("seleccionado"));
            $this->load->view("header", ["title"=>"Agregar Seccion","scripts"=>["agregarCat.js"]]);
            $this->load->view("categoria/add", ["categorias"=>$categoria,"temas"=>$tema]);
            $this->load->view("footer");
        }
    }


    /////////////////////////////////////////////////////////////////////////////////////////////////////////


    /*
     * Listing of categoria
     */
    function index()
    {
        $params['limit'] = RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('categoria/index?');
        $config['total_rows'] = $this->Categoria_model->get_all_categoria_count();
        $this->pagination->initialize($config);

        $data['categoria'] = $this->Categoria_model->get_all_categoria($params);
        
        
        $this->load->view("header",["title"=>"Categorias"]);
        $this->load->view('categoria/index',$data);
        $this->load->view("footer");
    }

    /*
     * Editing a categoria
     */
    function edit($nombre)
    {   
         $nombre=str_replace("%20"," ",$nombre);
        // check if the categoria exists before trying to edit it
        $data['categoria'] = $this->Categoria_model->get_categoria($nombre);
        
        if(isset($data['categoria']['nombre']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('descripcion','Descripcion','max_length[45]');
		
			if($this->form_validation->run())     
            {   
                $params = array(
                    'nombre' => $this->input->post('nombre'),
					'descripcion' => $this->input->post('descripcion'),
                );

                $this->Categoria_model->update_categoria($nombre,$params);            
                redirect('categoria/index');
            }
            else
            {
               $this->load->view("header",["title"=>"Editar categoria"]);
                $this->load->view('categoria/edit',$data);
                $this->load->view("footer");
            }
        }
        else
            show_error('The categoria you are trying to edit does not exist.');
    } 

    /*
     * Deleting categoria
     */
    function remove($nombre)
    {
        $nombre=str_replace("%20"," ",$nombre);
        $categoria = $this->Categoria_model->get_categoria($nombre);

        // check if the categoria exists before trying to delete it
        if(isset($categoria['nombre']))
        {
            $this->Categoria_model->delete_categoria($nombre);
            redirect('categoria/index');
        }
        else
            show_error('The categoria you are trying to delete does not exist.');
    }
}
?>
