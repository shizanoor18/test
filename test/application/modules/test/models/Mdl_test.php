<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mdl_test extends CI_Model{
	function _get(){
		$result = $this->db->get('test');
		return $result;
	}
	function create(){		
		$data['view_file'] = 'create';
		$this->load->module('template');
		$this->template->admin($data);

	}

	function insert($formArray){
    	$this->db->insert('test', $formArray);

   }

   function update($data , $id){

		$this->db->where('id', $id);
   		$this->db->update('test' ,$data);
   }
   function get_data($id){

		$this->db->where('id', $id);
   		$result = $this->db->get('test');
		return $result;
	}

    function delete($id)
   {
   		$this->db->where('id', $id);
   		$this->db->delete('test');
   }
   function get_data_by_id($id){
	   	$this->db->where('id', $id);
	   	$record = $this->db->get('test');
	   	return $record;
   }
}