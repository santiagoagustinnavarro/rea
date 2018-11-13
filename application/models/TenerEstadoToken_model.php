<?php
/*
 * Generated by CRUDigniter v3.2
 * www.crudigniter.com
 */
 
class TenerEstadoToken_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get tienerol by nombreUsuario
     */
    public function get_tenerestadotoken($nroToken, $params=array())
    { 

        if (count($params)>0) {
            $params["nroToken"]=$nroToken;
            $estado=$this->db->get_where('tenerestadotoken',$params)->row_array();
        } else {
            $estado=$this->db->get_where('tenerestadotoken', array('nroToken'=>$nroToken,'fechaFin'=>null))->row_array();
        }
        return $estado;
    }
        
    /*
     * Get all tienerol
     */
    public function get_all_tenerestadotoken()
    {
        $this->db->order_by('idToken', 'desc');
        return $this->db->get('tenerestadotoken')->result_array();
    }
        
    /*
     * function to add new tienerol
     */
    public function add_tenerestadotoken($params)
    {
       // return
        return $this->db->insert('tenerestadotoken', $params);
         //return $this->db->insert_id();
    }
    
    /*
     * function to update tienerol
     */
    public function update_tenerestadotoken($params=array(), $where=array())
    {
        foreach ($where as $key=>$value) {
            $this->db->where($key, $value);
        }
        return $this->db->update('tenerestadotoken', $params);
    }
    
    /*
     * function to delete tienerol
     */
    public function delete_tienerol($where)
    {
        return $this->db->delete('tieneRol', $where);
    }
}
