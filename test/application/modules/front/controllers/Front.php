<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Front extends MX_Controller {
protected $data = '';
	function __construct() {
	    parent::__construct();
	    $this->load->library("pagination");
	    $this->load->helper("url");

	}
	function index() {
		$data['clients'] = $this->get_data_from_db()->result();
        $this->load->module('template');
	    $data['view_file'] = 'home_page';
	    $this->template->front($data);
	}
function get_data_from_db(){
		$this->load->model('Mdl_front');
		$result = $this->Mdl_front->get();
		return $result;
	}


function login(){
	$this->load->module('template');
	$data['view_file'] = 'login';
	 $this->template->front($data);
}
function login_form(){
		$status = 'error';
		$message = "Fill the all fields";
		$email = $this->input->post('email');

		$password = $this->input->post('password');
		if(isset($email) && !empty($email) && isset($password) && !empty($password)) {
			$result = Modules::run('api/get_specific_table_data',array('email'=> $email, 'password' => $password),'id','id,email,password','test','1','')->row_array();
			if(isset($result['id'])&& !empty($result['id'])) {
				$message = "User login successfully";
				$data['view_file'] = 'home_page';
				$status = "success";
				
			}
			else{
				$message = "Invalid email/password";
			}
		}
		elseif(empty($email))
			$message = "Enter the email address";
		else
			$message = "Enter the password";
	
		$this->session->set_flashdata('message', $message);
        $this->session->set_flashdata('status', $status);
		redirect(($status != 'error' ? BASE_URL : BASE_URL.'login'));
}
	 function register(){
	 	$this->load->view('register');
	 }
	function registration_form(){
		
		$data = $this->get_data_from_registration_form();
		$this->load->model('Mdl_front');
		$query = $this->Mdl_front->insert_into($data);
		return redirect('/');
	}
	function get_data_from_registration_form(){

		$formArray= array();
		$formArray['name']= $this->input->post('name');
		$formArray['email']= $this->input->post('email');
		$formArray['password']= $this->input->post('password');
		return $formArray;

	}
}
