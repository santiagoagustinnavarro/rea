<?php
class Registro extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->library("session");
    }
    function index(){
        $this->load->library("form_validation");
        if($this->input->post()){
           $this->form_validation->set_rules('nombreUsuario','usuario','callback_validaUsuario');
           $this->form_validation->set_rules('clave2','clave','callback_verificarClaves[clave]');
           $this->form_validation->set_rules('email','email','callback_validaEmail');  
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
                }
    //Los datos son correctos
                }else{
                    $this->load->view("header", ["title" => "Registro"]);
                    $this->load->view('logeo/registrarse',array("mensaje"=>'<div class="col-md-offset-2 col-md-8 alert alert-danger text-center"><h4>'."Datos proporcionados incorrectos".'</h4></div>'));
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
        if($existe==null){
            $validacion=true;
        }else{
            $validacion=false;
            $this->form_validation->set_message("validaUsuario", "El nombre de usuario ya existe");
          
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
    function verificarClaves($repeticion,$clave){
        $clave=hash('sha224',$clave);
        $clave2=hash('sha224',$repeticion);
        if($clave==$clave2){
            $validacion=true;
        }else{
            $validacion=false;
            $this->form_validation->set_message("verificarClaves", "Las claves no coinciden");
        }
        return $validacion;
    }
    
}


