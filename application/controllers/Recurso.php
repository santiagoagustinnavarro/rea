<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Recurso extends CI_Controller
{
    public function listar($usuario="")
    {
        if ($usuario!="") {
            $recursos=$this->Recurso_model->get_all_recurso(array('nombreUsuario'=>$usuario));
        } else {
            $recursos=$this->Recurso_model->get_all_recurso();
        }
       
        if (count($recursos)>0) {
            print_r($recursos);
        }
    }
}
