<?php 
class TokenRecupera_model extends CI_Model{
    /*
     * Get tokenrecupera by idtoken
     */
    public function get_tokenrecupera($idToken, $params=array())
    {
        if (count($params)>0) {
            $params['nombreUsuario']=$idToken;
            $tokenR=$this->db->get_where('tokenrecupera', $params)->row_array();
        } else {
            $tokenR= $this->db->get_where('tokenrecupera', array('idToken'=>$idToken))->row_array();
           
        }
        return $tokenR;
    }

     /*
     * function to add new tokenrecupera
     */
    public function add_tokenrecupera($params)
    {
       $this->db->insert('tokenrecupera', $params);
       return $this->db->insert_id();
    }
        
}





?>