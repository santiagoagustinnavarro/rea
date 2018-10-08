<?php
class Usuario_model extends CI_Model {
    function getData(){
        $query=$this->db->get('usuario');
        return $query->result();
    }
    
    function login($user="snavarro",$pass="38365920"){
        $this->db->select('*');
        $this->db->from('usuario');
        $this->db->where(array('nombreUsuario' => $user,'clave'=>$pass));
        $query=$this->db->get();
        $res=$query->result();

        return $res;
    }



}
?>