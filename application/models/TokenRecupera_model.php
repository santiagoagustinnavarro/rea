<?php
class TokenRecupera_model extends CI_Model
{
    /*
     * Get tokenrecupera by idtoken
     */
    public function get_tokenrecupera($nroToken, $params=array())
    {
        if (count($params)>0) {
            $params['nroToken']=$nroToken;
            $tokenR=$this->db->get_where('tokenRecupera', $params)->row_array();
        } else {
            $tokenR= $this->db->get_where('tokenRecupera', array('nroToken'=>$nroToken))->row_array();
        }
        return $tokenR;
    }

    /*
    * function to add new tokenrecupera
    */
    public function add_tokenrecupera($params)
    {
       return $this->db->insert('tokenRecupera', $params);
        //return $this->db->insert_id();
    }
}
