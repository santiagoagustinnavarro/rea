<?php
class Usuario_model extends CI_Model {
    function getData(){
        $query=$this->db->get('usuario');
        return $query->result();
    }

    function login($user="santiagoo",$pass="38365920"){
        $res=true;
        $query=$this->db->get('usuario');
        $res=$query->result();
        foreach($res as $unUsuario){
            
                $res=$res && strtolower($unUsuario->nombre)==$user;

        }
        return $res;
    }



}
?>