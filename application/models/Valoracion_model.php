<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Valoracion_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function promedio($idRecurso){
        $this->db->select("avg(puntaje)");
       $this->db->where(array("idRecurso"=>$idRecurso));
        $this->db->get('valoracion')->row();
    }
    /*
     * Get valoracion by idValoracion
     */
    function get_valoracion($idValoracion)
    {
        return $this->db->get_where('valoracion',array('idValoracion'=>$idValoracion))->row_array();
    }
    
    /*
     * Get all valoracion count
     */
    function get_all_valoracion_count()
    {
        $this->db->from('valoracion');
        return $this->db->count_all_results();
    }
        
    /*
     * Get all valoracion
     */
    function get_all_valoracion($params = array())
    {
        $this->db->order_by('idValoracion', 'desc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get('valoracion')->result_array();
    }
        
    /*
     * function to add new valoracion
     */
    function add_valoracion($params)
    {
       return $this->db->insert('valoracion',$params);
       
    }
    
    /*
     * function to update valoracion
     */
    function update_valoracion($idValoracion,$params)
    {
        $this->db->where('idValoracion',$idValoracion);
        return $this->db->update('valoracion',$params);
    }
    
    /*
     * function to delete valoracion
     */
    function delete_valoracion($idValoracion)
    {
        return $this->db->delete('valoracion',array('idValoracion'=>$idValoracion));
    }
}
