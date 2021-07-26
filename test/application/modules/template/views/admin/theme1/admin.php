<?php $this->load->view('admin/theme1/header');
 $this->load->view('admin/theme1/right_panel');
 $this->load->view('admin/theme1/left_panel');
 
if(!isset($view_file)){
		$view_file = '';
	}

if(!isset($module)){
		$module = $this->uri->segment(2);
	}
	
$path = $module.'/'.$view_file;
$this->load->view($path);
$this->load->view('admin/theme1/footer');?>



