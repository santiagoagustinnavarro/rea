<?php
/*
 * Generated by CRUDigniter v3.2
 * www.crudigniter.com
 */
 
class Tema_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get tema by nombre
     */
    public function get_tema($nombre)
    {
        return $this->db->get_where('tema', array('nombre'=>$nombre))->row_array();
    }
        
    /*
     * Get all tema
     */
    public function get_all_tema($nombreCat="",$params = array())
    {
        if ($nombreCat!="") {
            $this->db->select("tema.nombre");
            $this->db->from("tema");
            $this->db->join("tenercategoria","tenercategoria.nombreTema=tema.nombre");
            $this->db->join("categoria","tenercategoria.nombreCategoria=categoria.nombre");
            $this->db->where(["tenercategoria.nombreCategoria"=>$nombreCat]);
            return $this->db->get()->result_array();
            //echo $this->db->last_query(); 
        } else {
            if(isset($params) && !empty($params))
            {
                $this->db->limit($params['limit'], $params['offset']);
            }
            $this->db->order_by('nombre', 'desc');
            return $this->db->get('tema')->result_array();
        }
    }
     /*
     * Get all tema count
     */
    function get_all_tema_count()
    {
        $this->db->from('tema');
        return $this->db->count_all_results();
    }
        
    /*
     * function to add new tema
     */
    public function add_tema($params)
    {
        $this->db->insert('tema', $params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update tema
     */
    public function update_tema($nombre, $params)
    {
        $this->db->where('nombre', $nombre);
        return $this->db->update('tema', $params);
    }
    
    /*
     * function to delete tema
     */
    public function delete_tema($nombre)
    {
        return $this->db->delete('tema', array('nombre'=>$nombre));
    }
}
