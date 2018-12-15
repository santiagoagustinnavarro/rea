<?php
/*
 * Generated by CRUDigniter v3.2
 * www.crudigniter.com
 */
 
class Tema extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Tenercategoria_model');
        $this->load->model('Categoria_model');
        $this->load->model('Tema_model');
    }

    /*
     * Listing of tenercategoria
     */
    public function index()
    {
        $params['limit'] = RECORDS_PER_PAGE;
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('tema/index?');
        $config['total_rows'] = $this->Tenercategoria_model->get_all_tenercategoria_count();
        $this->pagination->initialize($config);

        $data['tenercategoria'] = $this->Tenercategoria_model->get_all_tenercategoria($params);
        $this->load->view("header", ["title"=>"Temas"]);
        $this->load->view('tema/index', $data);
        $this->load->view("footer");
    }

    /*
     * Adding a new tenercategoria
     */
    public function add()
    {
        if (isset($_POST) && count($_POST) > 0) {
            $params = array(
            );
            
            $tenercategoria_id = $this->Tenercategoria_model->add_tenercategoria($params);
            redirect('tema/index');
        } else {
            $data['_view'] = 'tema/add';
            $this->load->view('layouts/main', $data);
        }
    }

    /*
     * Editing a tenercategoria
     */
    public function edit($nombreTema, $nombreCategoria)
    {
        $this->load->library("form_validation");
        $nombreTema=str_replace("%20", " ", $nombreTema);
        $nombreCategoria=str_replace("%20", " ", $nombreCategoria);
        // check if the tenercategoria exists before trying to edit it
        $data['tenercategoria'] = $this->Tenercategoria_model->get_tenercategoria($nombreTema, $nombreCategoria);
        $data["categorias"]=$this->Categoria_model->get_all_categoria();
        
        if (isset($data['tenercategoria']['nombreTema']) && isset($data['tenercategoria']['nombreCategoria'])) {
            $data['tema']=$this->Tema_model->get_tema($nombreTema);
            if (isset($_POST) && count($_POST) > 0) {
                $this->form_validation->set_rules('nombreTema', 'Nombre del tema', 'required');
                $this->form_validation->set_rules('descripcion', 'Descripcion', 'max_length[45]');
                if ($this->form_validation->run()) {
                    $params = array(
                    'nombre' => $this->input->post('nombreTema'),
                    'descripcion' => $this->input->post('descripcion'),
                );
                    $existeTenerCategoria= $this->Tenercategoria_model->get_tenercategoria($this->input->post('nombreTema'), $this->input->post('categoria'));
                    if ($existeTenerCategoria==null) {
                        $this->Tema_model->update_tema($nombreTema, $params);
                        $paramsTener= array(
                        'nombreTema' => $this->input->post('nombreTema'),
                        'nombreCategoria' => $this->input->post('categoria'),
                    );
                        $this->Tenercategoria_model->update_tenercategoria($nombreTema, $nombreCategoria, $paramsTener);
                        redirect('tema/index');
                    } else {
                        $data["mensaje"]="Ya existe esta entrada";
                        $this->load->view("header", ["title"=>"Editar Tema"]);
                        $this->load->view('tema/edit', $data);
                        $this->load->view("footer");
                    }
                    
                } else {
                   
                    $this->load->view("header", ["title"=>"Editar Tema"]);
                    $this->load->view('tema/edit', $data);
                    $this->load->view("footer");
                }
            } else {
                $this->load->view("header", ["title"=>"Editar Tema"]);
                $this->load->view('tema/edit', $data);
                $this->load->view("footer");
            }
        } else {
            show_error('The tenercategoria you are trying to edit does not exist.');
        }
    }

    /*
     * Deleting tenercategoria
     */
    public function remove($nombreTema)
    {
        $nombreTema=str_replace("%20", " ", $nombreTema);
        $nombreCategoria=str_replace("%20", " ", $nombreCategoria);
        $tenercategoria = $this->Tenercategoria_model->get_tenercategoria($nombreTema);

        // check if the tenercategoria exists before trying to delete it
        if (isset($tenercategoria['nombreTema'])) {
            $this->Tenercategoria_model->delete_tenercategoria($nombreTema);
            redirect('tema/index');
        } else {
            show_error('The tenercategoria you are trying to delete does not exist.');
        }
    }
}
