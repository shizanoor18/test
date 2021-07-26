<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Services extends MX_Controller{
	
	function __construct() {
		parent::__construct();
		Modules::run('site_security/is_login');
		Modules::run('site_security/has_permission');
	}

	function index() {
		$where=array("del_status"=>"0");
		$data['query'] = Modules::run('api/get_specific_table_data',$where,'id desc','*','newservices','','');
		$data['view_file'] = 'index';
		$this->load->module('template');
		$this->template->admin($data);
	}


	function create() {
		$update_id = $this->uri->segment(4);
		if (is_numeric($update_id) && $update_id != 0) {
			$data['record'] = $this->_get_data_from_db($update_id);
			$where=array("s_id"=>$update_id);
			$data['sub_data'] = Modules::run('api/get_specific_table_data',$where,'id desc','*','multidata','','')->result_array();
		} else {
			$data['record'] = $this->_get_data_from_post();
		}
		$data['update_id'] = $update_id;
		$data['view_file'] = 'create';
		$this->load->module('template');
		$this->template->admin($data);
	}

	function _get_data_from_post() {
	    $data['c_name']=$this->input->post('c_name');
	    $data['o_name']=$this->input->post('o_name');
		
		return $data;
	}

	function _get_data_from_db($update_id) {
		
		$where['id'] = $update_id;
		$query = Modules::run('api/get_specific_table_data',$where,'id desc','*','newservices','','');
		foreach ($query->result() as $row) {
			$data['c_name'] = $row->c_name;
			$data['o_name'] = $row->o_name;
			
			
		}
		return $data;
	}

	function multidata($update_id)
	{
		$name=$this->input->post('name');
		$description=$this->input->post('description');
		$count=count($name);
		for($i=0;$i<$count;$i++)
		{
			$temp['s_id']=$update_id;
			$temp['name']=$name[$i];
			$temp['description']=$description[$i];
			Modules::run('api/insert_into_specific_table',$temp,'multidata');
		}
	}
	function submit(){
		
		$update_id = $this->input->post('update_id');
			$data = $this->_get_data_from_post();
			if ($update_id != 0) {
				
					$where['id'] = $update_id;
					Modules::run('api/update_specific_table',$where,$data,'newservices');
					$this->session->set_flashdata('message', 'Service updated successfully.');
				
			}
			if ($update_id == 0) {
				$update_id = Modules::run('api/insert_into_specific_table',$data,'newservices');
				
				$this->multidata($update_id);
				$this->session->set_flashdata('message', 'Service added Successfully.');
			}
			redirect(ADMIN_BASE_URL.'services');
	}

	
	function delete() {
		$page_id = $this->input->post('id');
		$where_main_page['id'] = $page_id; 
		$result = Modules::run('api/delete_from_specific_table',$where_main_page,'newservices');
	}

	function delete_record() {
		$page_id = $this->input->post('id');
		$where_main_page['id'] = $page_id; 
		$result = Modules::run('api/delete_from_specific_table',$where_main_page,'multidata');
	}

	function detail() {	
		$update_id = $this->input->post('id');
		$data['post'] = $this->_get_data_from_db($update_id);
		$this->load->view('detail', $data);
	}

			
	function change_status() {
		$id = $this->input->post('id');
		$status = $this->input->post('status');
		if ($status == 1)
			$status = 0;
		else {
			$status = 1;
		}
		$data = array('status' => $status);
		$where['id']=$id;
		$status = Modules::run('api/update_specific_table',$where,$data,'newservices');
		echo $status;
	}


	function get_data_by_join($where){
		$this->load->model('mdl_services');
		return $this->mdl_services->get_data_by_join($where);
	}

	

}