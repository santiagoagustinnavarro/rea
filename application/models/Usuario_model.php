<?php
class Usuario_model extends CI_Model {
  
    
    /**
     * Esta función se encarga de constatar los datos proporcionados en el login con la BD
     * @param $user string
     * @param $pass string
     * @return stdClass
     */
    function login($user="snavarro",$pass="38365920"){
        $this->db->select('u.nombreUsuario,u.clave,eu.nombre');//Seleccionamos el nombre de usuario la clave y el nombre del estado del usuario
        $this->db->from('usuario u');//Tabla usuario
        $this->db->join('tenerusuario tu','u.nombreUsuario = tu.nombreUsuario');//Join con la tabla tener usuario(intermedia entre usuario y estadoUsuario)
        $this->db->join('estadousuario eu','eu.nombre = tu.nombreEstadoUsuario');//Join con la tabla estadoUsuario
        $this->db->where(array('u.nombreUsuario' => $user,'u.clave'=>$pass,"tu.fechaFin"=>NULL));/*Verificamos que la fecha fin sea nula,
                                                                                                    ya que en ese caso sería el estado actual 
                                                                                                    en el que se encuentra el usuario*/
        $query=$this->db->get();//Armamos la peticion ,enviamos la peticion y recibimos la información
        $res=$query->result();//Transformamos la respuesta en un array asociativo de objetos
       if(count($res)>0){//Verificamos que exista un usuario que cumpla con los datos proporcionados
            $retorno=$res[0];
       }else{//Caso en el que no exista un usuario con ese nombre de usuario o clave
        $retorno=new stdClass();
        $retorno->nombreUsuario=null;
        $retorno->nombre=null;//La variable nombre hace referencia al nombre del estado
       }
        return $retorno;
    }
/**
 * Esta función se encarga del registro de un usuario con los datos enviados
 * El parametro datos sera un array asociativo con los datos enviados en el formulario
 * @param $datos array
 * @return bool
 */
    function registro($datos=array("email"=>"s@hotmail.com","nombreUsuario"=>"snavasrro2","clave"=>"12345","nombre"=>"santiago","apellido"=>"navarro")){
        $existe=$this->buscarUsuario($datos["nombreUsuario"]);  
        if($existe!=null){//Si se cumple el usuario ya existe
               $retorno=false;
           }else{//El usuario no existe procedemos al registro
               $retorno= $this->db->insert("usuario",$datos);
           }
           
           return $retorno;
    }
    /**
     * Esta funcion se encarga de buscar un usuario dado su nombreUsuario
     * @param $unUsuario string
     * @return stdClass|null 
     */
    private function buscarUsuario($usuario){
        $this->db->select('*');//Seleccionamos el nombre de usuario la clave y el nombre del estado del usuario
        $this->db->from('usuario');//Tabla usuario
        $this->db->where(array('nombreUsuario' => $usuario));
        $query=$this->db->get();//Armamos la peticion ,enviamos la peticion y recibimos la información
        $res=$query->result();//Transformamos la respuesta en un array asociativo de objetos
        if(count($res)>0){
            $retorno=$res[0];
        }else{
            $retorno=null;
        }
        return $retorno;
    }

    


}
?>