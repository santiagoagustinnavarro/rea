<?php
class Registro extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->library("session");
    }
    function index(){
        $this->load->library("form_validation");
        if($this->input->post()){
           $this->form_validation->set_rules('nombre','nombre','required');
           $this->form_validation->set_rules('apellido','apellido','required');
           $this->form_validation->set_rules('estudio','estudio','required');
           $this->form_validation->set_rules('clave2','clave','required|matches[clave]',array('matches'=>'Las claves no coinciden'));
           $this->form_validation->set_rules('email','email','required|callback_validaEmail');  
           $this->form_validation->set_rules('nombreUsuario','nombreUsuario','required|callback_validaUsuario');
                if($this->form_validation->run() === true){
                    $insercion = $this->Usuario_model->add_usuario($params);
                    if ($insercion) {
                        $fecha = (getdate()["year"]) . "-" . (getdate()["mon"]) . "-" . (getdate()["mday"]);
                        $hora = (getdate()["hours"]) . ":" . (getdate()["minutes"]) . ":" . (getdate()["seconds"]);
                        $nombreEstadoUsuario = "pendiente";
                        $nombreRol="Profesor";
                        $nombreUsuario = $params["nombreUsuario"];
                        $datosEstado = array("fechaInicio"=>$fecha,"hora"=>$hora,"nombreUsuario"=>$nombreUsuario,"nombreEstadoUsuario"=>$nombreEstadoUsuario);
                        $datosRol=array("fechaInicio"=>$fecha,"nombreUsuario"=>$nombreUsuario,"nombreRol"=>$nombreRol);
                        $insercionEstado = $this->TenerEstadoUsuario_model->add_tenerEstadoUsuario($datosEstado);
                        $insercionProfesor = $this->Tienerol_model->add_tienerol($datosRol);
                        $this->load->view("header", ["title" => "Registro"]);
                        $this->load->view('logeo/registrarse', array("mensaje" => '<div class="col-md-offset-2 col-md-8 alert alert-success text-center"><h4>'."Se ha registrado correctamente espere a que un administrador valide su cuenta".'</h4></div>'));
                        $this->load->view("footer");
                }else{
                    $this->load->view("header", ["title" => "Registro"]);
                    $this->load->view('logeo/registrarse',array("mensaje"=>'<div class="col-md-offset-2 col-md-8 alert alert-danger text-center"><h4>'."Ah ocurrido un error con la base de datos".'</h4></div>'));
                    $this->load->view("footer");
                }
    //Los datos son correctos
                }else{
                    $this->load->view("header", ["title" => "Registro"]);
                    $this->load->view('logeo/registrarse',array("mensaje"=>'<div class="alert alert-danger text-center"><h4>'."Datos proporcionados incorrectos".'</h4></div>'));
                    $this->load->view("footer");
                  
    //Los datos no son correctos
}}else{
    $this->load->view("header", ["title" => "Registro"]);
    $this->load->view('logeo/registrarse',array("mensaje"=>""));
    $this->load->view("footer");
}

               
                
            
            
            // redirect('usuario/index');
        
    }
    function validaUsuario($nombreUsuario){
        $existe=$this->Usuario_model->get_usuario($nombreUsuario);
        if($existe==null && $nombreUsuario!=""){
            $validacion=true;
        }else{
            $validacion=false;
            if($nombreUsuario==""){
                $this->form_validation->set_message("validaUsuario", "El campo nombreUsuario es obligatorio");   
            }else{
            $this->form_validation->set_message("validaUsuario", "El nombre de usuario ya existe");}
          
        }
        return $validacion;
    }
    function validaEmail($email){
        $existeMail=$this->Usuario_model->get_usuario("",array("usuario.email"=>$email));
        if($existeMail==null){
            $validacion=true;
        }else{
            $validacion=false;
            $this->form_validation->set_message("validaEmail", "El email ya existe");
          
        }
        return $validacion;
    }
    
    
}


