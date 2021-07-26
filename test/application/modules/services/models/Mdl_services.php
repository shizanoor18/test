<?php
/*************************************************
Modified By: Akabir Abbasi
Date: 17-12-2015
*************************************************/

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mdl_services extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_data_from_db()
    {
        return $this->db->get('newservices');
       
    }

    function get_data_by_join($where){
        $this->db->select("c_name, o_name,s_name, s_description, name, description");
        $this->db->from("newservices");
        $this->db->join('multidata', 'newservices.id = multidata.s_id', 'inner join'); 
        $this->db->where($where);
        return $this->db->get();
        }

       
}