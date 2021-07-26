<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class test extends MX_Controller{
	function index(){
		$data['clients'] = $this->get_data_from_db()->result();
		$data['view_file'] = 'index';
		$this->load->module('template');
		$this->template->admin($data);
	}

	function get_data_from_db(){

		$this->load->model('Mdl_test');
		$result = $this->Mdl_test->_get();
		return $result;
	}
	function create(){	
		$id = $this->uri->segment(4);
		$data['client'] = $this->get_data_by_id($id)->row_array();	
		$data['view_file'] = 'create';
		$this->load->module('template');
		$this->template->admin($data);

	}
	function get_data_by_modal($id){
		$this->load->model('Mdl_test');
		$result = $this->Mdl_test->get_data($id);
		return $result;
	}
	function delete(){
		$id = $this->input->post('id');
		$this->load->model('Mdl_test');
		$id = $this->Mdl_test->delete($id);
	}
	function get_data_by_id($id){
		$this->load->model('Mdl_test');
		$record = $this->Mdl_test->get_data_by_id($id);
		return $record;
	}
	function insert(){
		$update_id = $this->uri->segment(4);
		if(isset($update_id) && $update_id > 0)
		{
			$data = $this->get_data_from_post();
		$this->load->model('Mdl_test');
		$this->Mdl_test->update($data, $update_id);
		}else{
			$data = $this->get_data_from_post();
		$this->load->model('Mdl_test');
		$id = $this->Mdl_test->insert($data);
		}
		return redirect(ADMIN_BASE_URL.'/test');

	}
	function get_data_from_post(){
		$formArray = array();
		$formArray['name'] = $this->input->post('name');
		$formArray['email'] = $this->input->post('email');
		$formArray['password'] = $this->input->post('password');

		return $formArray;
	}
}
	