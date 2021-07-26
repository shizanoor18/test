<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class user_data extends MX_Controller{
	
	function __construct() {
		parent::__construct();
		Modules::run('site_security/is_login');
		Modules::run('site_security/has_permission');
	}

	
	function index() {
		$where=array("del_status"=>"0");
		$data['query'] = Modules::run('api/get_specific_table_data',array('del_status'=>0),'id desc','*','user_data','','');
		$data['view_file'] = 'index';
		$this->load->module('template');
		$this->template->admin($data);
	}

	function create() {
		$update_id = $this->uri->segment(4);
		
		if (is_numeric($update_id) && $update_id != 0) {
			$data['record'] = $this->_get_data_from_db($update_id);
		} else {
			$data['record'] = $this->_get_data_from_post();
		}
		$data['update_id'] = $update_id;
		$data['view_file'] = 'create';
		$this->load->module('template');
		$this->template->admin($data);
	}

	function user_name(){
		$user = $this->input->post('user_name');
		$user = Modules::run('api/insert_into_specific_table',$data,'user_data');

	}

	function _get_data_from_db($update_id) {
		$where['id'] = $update_id;
		$query = Modules::run('api/get_specific_table_data',$where,'id desc','*','user_data','','');
			foreach ($query->result() as $row) {
				$data['user_name'] = $row->username;
				$data['user_mail'] = $row->usermail;
				$data['user_pass'] = $row->userpass;
				$data['image'] = $row->image;
				
			} 
		return $data;
	}

	function _get_data_from_post() {
	    $data['username']=$this->input->post('user_name');
	    $data['usermail']=$this->input->post('user_mail');
        $data['userpass']=$this->encrypted_pass($this->input->post('user_pass'));
		return $data;
	}

	function encrypted_pass($password){
		$new_pass = md5($password);
		return $new_pass;
	}

	function submit() {
	
		$update_id = $this->input->post('update_id');
		$data = $this->_get_data_from_post();
		if ($update_id != 0) {
			
				$where['id'] = $update_id;
				Modules::run('api/update_specific_table',$where,$data,'user_data');

				
				if(isset($_FILES['news_file']) && !empty($_FILES['news_file'])) {
					if($_FILES['news_file']['size'] > 0) {
						
						$old_image_name = $this->input->post('old_image_name');
						if(!empty($old_image_name))
							Modules::run('api/delete_images_by_name',ACTUAL_FEATURE_IMAGE_PATH,LARGE_FEATURE_IMAGE_PATH,MEDIUM_FEATURE_IMAGE_PATH,SMALL_FEATURE_IMAGE_PATH,$old_image_name);
						Modules::run('api/upload_dynamic_image',ACTUAL_FEATURE_IMAGE_PATH,LARGE_FEATURE_IMAGE_PATH,MEDIUM_FEATURE_IMAGE_PATH,SMALL_FEATURE_IMAGE_PATH,$update_id,'news_file','image','id','user_data');
						
					}
					
				}
				//$this->_update_icon($update_id);
				

				$this->session->set_flashdata('message', 'Page updated successfully.');
			
		}
		if ($update_id == 0) {
			
			$update_id = Modules::run('api/insert_into_specific_table',$data,'user_data');
		

				if(isset($_FILES['news_file']) && !empty($_FILES['news_file'])) {
					if($_FILES['news_file']['size'] > 0) {
						Modules::run('api/upload_dynamic_image',ACTUAL_FEATURE_IMAGE_PATH,LARGE_FEATURE_IMAGE_PATH,MEDIUM_FEATURE_IMAGE_PATH,SMALL_FEATURE_IMAGE_PATH,$update_id,'news_file','image','id','user_data');
					}
					
					$this->session->set_flashdata('message', 'Page saved successfully.');
			}
		}
	redirect(ADMIN_BASE_URL.'user_data');
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
		$status = Modules::run('api/update_specific_table',$where,$data,'user_data');
		echo $status;
	}

	function valid_name(){
		$status = true;
		$id = $this->input->post('id');
		$name = $this->input->post('checkingname');
		if(!empty($name)) {
			$id = (empty($id) ? 0 :$id);
			$result = Modules::run('api/get_specific_table_with_pagination_where_groupby',array("lower(username)"=>strtolower($name)), "id desc","id",'user_data',"id","1","1","","","")->num_rows();
			if($result >= 1)
				$status = false;
		}
		echo $status;
	}

	function delete() {
		$page_id = $this->input->post('id');
		$where_main_page['id'] = $page_id; 
		$result = Modules::run('api/delete_from_specific_table',$where_main_page,'user_data');
	}

	
}