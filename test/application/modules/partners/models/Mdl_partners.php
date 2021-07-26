<?php
/*************************************************
Modified By: Akabir Abbasi
Date: 17-12-2015
*************************************************/

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mdl_partners extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_table() {
        $table = "partners";
        return $table;
    }
    function get_data_from_db()
    {
        return $this->db->get('partners');
       
    }

    function insert($data)
    {
        $this->db->insert("partners",$data);
        return $this->db->insert_id();
    }

    function delete_data_by_id($id){
        $this->db->where('id', $id);
         $this->db->delete('partners');
    }

    function update_status($id,$data){
        $this->db->where('id', $id);
        $this->db->update('partners',$data);
    }

}