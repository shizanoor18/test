<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mdl_front extends CI_Model {
    
 function insert_into($formArray){
        $this->db->insert('test', $formArray);
    }
    function get(){
        $result = $this->db->get('test');
        return $result;
    }
}
