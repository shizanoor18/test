<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Partners extends MX_Controller{
	
	function __construct() {
		parent::__construct();
		Modules::run('site_security/is_login');
		Modules::run('site_security/has_permission');
	}

	function index() {
		$data['result'] = $this->get_data_from_db();
		$data['view_file'] = 'index';
		$this->load->module('template');
		$this->template->admin($data);
	}
	function create() {
	
		$data['view_file'] = 'create';
		$this->load->module('template');
		$this->template->admin($data);
	}


	function get_data_from_db(){
		$this->load->model('mdl_partners');
		return $this->mdl_partners->get_data_from_db();
		
	}

	function delete_data_by_id($id){
		$this->load->model('mdl_partners');
		return $this->mdl_partners->delete_data_by_id($id);
		
	}

	function get_data_from_post(){
		$data['title']=$this->input->post('title');
	    $data['link']=$this->input->post('link');
		return $data;
	}

	function delete_from_specific_table(){
		$this->load->model('mdl_partners');
		return $this->mdl_partners->delete_from_specific_table();
	}

	function update_status($id,$data){
		$this->load->model('mdl_partners');
		$this->mdl_partners->update_status($id,$data);
	}

	function detail(){
		$data['result']= $this->get_data_from_db()->row_array();
		$this->load->view('detail', $data);
			
	}

	function submit(){
		$data = $this->get_data_from_post();
		$this->load->model('mdl_partners');
		$id = $this->mdl_partners->insert($data);
		redirect('partners');
	}


	function delete() {
		$id = $this->input->post('id');
		$data['result'] = $this->delete_data_by_id($id);
		
	}

	function change_status(){
	$id = $this->input->post('id');
	$status = $this->input->post('status');
	if($status == 1){
		$status = 0;
	}
	else{
		$status = 1;
	}
	
	$data['result'] = $this->update_status($id,array("status"=>$status));

	}

	


}