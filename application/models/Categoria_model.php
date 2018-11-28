<?php

/*
 * Generated by CRUDigniter v3.2
 * www.crudigniter.com
 */
 
class Categoria_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get Categoria por nombre
     */
    public function get_categoria($nombre)
    {
        return $this->db->get_where('categoria', array('nombre'=>$nombre))->row_array();
    }
        
    /*
     * Get all Categoria
     */
    public function get_all_recurso($filters="")
    {
        if ($filters!="") {
            $this->db->where($filters);
        }

        $this->db->order_by('nombre', 'desc');
        return $this->db->get('categoria')->result_array();
    }
        
    /*
     * function to add new categoria
     */
    public function add_categoria($params)
    {
        $this->db->insert('categoria',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update categoria
     */
    public function update_categoria($nombre,$params)
    {
        $this->db->where('nombre', $nombre);
        return $this->db->update('categoria', $params);
    }
    
    /*
     * function to delete categoria
     */
    public function delete_categoria($nombre)
    {
        return $this->db->delete('categoria', array('nombre'=>$nombre));
    }
}
