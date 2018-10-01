<?php
class Usuario_model extends CI_Model {
    function getData(){
        $query=$this->db->get('usuario');
        return $query->result();
    }



}
?>