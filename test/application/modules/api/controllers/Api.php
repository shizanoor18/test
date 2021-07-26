<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
//include_once APPPATH . 'modules/outlet/controllers/outlet.php';

class Api extends MX_Controller {

    protected $data = '';

    function __construct() {
        $this->lang->load('english', 'english');
        parent::__construct();
        date_default_timezone_set("Asia/Karachi");
    }

    function image_path_with_default($image_path,$image_name,$default_path,$default_name) {
        $path= $default_path.$default_name;
        if(isset($image_name) && !empty($image_name)) {
            $mystring = 'abc';
            $findme   = 'https://';
            $findme2   = 'http://';
            $pos = strpos($image_name, $findme);
            $pos2 = strpos($image_name, $findme2);
            if (is_numeric($pos) || is_numeric($pos2)){
                if(file_exists($image_name))
                    $path = $image_name;
            }
            else
              if(file_exists($image_path.$image_name))
                $path = $image_path.$image_name;
        }
        $path=BASE_URL.$path;
        $path= str_replace(BASE_URL.BASE_URL, BASE_URL, $path);
        $path= str_replace(BASE_URL.BASE_URL.BASE_URL, BASE_URL, $path);
        return $path;
    }
    function upload_dynamic_image($actual,$large,$medium,$small,$nId,$input_name,$image_field,$image_id_fild,$table) {
        $upload_image_file = $_FILES[$input_name]['name'];
        $extension = pathinfo($upload_image_file, PATHINFO_EXTENSION);
        $upload_image_file = str_replace(' ', '_', $upload_image_file);
        $upload_image_file = str_replace($extension, '', $upload_image_file);
        $upload_image_file = str_replace('.', '_', $upload_image_file);
        $file_name = 'custom_image_'.substr(md5(uniqid(rand(), true)), 8, 8). $nId . '_' . $upload_image_file;
        $file_name = strtolower(str_replace(['  ', '/','-','--','---','----', '_', '__'], '-',$file_name));
        $file_name = $file_name.'.'.$extension;
        $config['upload_path'] = $actual;
        $config['allowed_types'] = 'gif|jpg|png|jpeg|JPEG|JPG|PNG|PDF|pdf';
        $config['max_size'] = '2000000000000';
        $config['max_width'] = '2000000000000000';
        $config['max_height'] = '200000000000000';
        $config['file_name'] = $file_name;
        $this->load->library('upload');
        $this->upload->initialize($config);
        if (isset($_FILES[$input_name])) {
            $this->upload->do_upload($input_name);
        }
        $upload_data = $this->upload->data();

        /////////////// Large Image ////////////////
        $config['source_image'] = $upload_data['full_path'];
        $config['image_library'] = 'gd2';
        $config['maintain_ratio'] = true;
        $config['width'] = 500;
        $config['height'] = 400;
        $config['new_image'] = $large;
        $this->load->library('image_lib');
        $this->image_lib->initialize($config);
        $this->image_lib->resize();
        $this->image_lib->clear();

        /////////////  Medium Size /////////////////// 
        $config['source_image'] = $upload_data['full_path'];
        $config['image_library'] = 'gd2';
        $config['maintain_ratio'] = true;
        $config['width'] = 300;
        $config['height'] = 200;
        $config['new_image'] = $medium;
        $this->image_lib->initialize($config);
        $this->image_lib->resize();
        $this->image_lib->clear();

        ////////////////////// Small Size ////////////////
        $config['source_image'] = $upload_data['full_path'];
        $config['image_library'] = 'gd2';
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['width'] = 100;
        $config['height'] = 100;
        $config['new_image'] =$small;
        $this->image_lib->initialize($config);
        $this->image_lib->resize();
        $this->image_lib->clear();
        unset($data);unset($where);
        $data = array($image_field => $file_name);
        $where[$image_id_fild] = $nId;
        $this->insert_or_update_specific_image($where,$data,$table,$table.$image_id_fild);
    }
    function delete_images_by_name($actual_path,$large_path,$medium_path,$small_pathm,$name) {
        if (file_exists($actual_path.$name))
            unlink($actual_path.$name);
        if (file_exists($large_path.$name))
            unlink($large_path.$name);
        if (file_exists($medium_path.$name))
            unlink($medium_path.$name);
        if (file_exists($small_pathm.$name))
            unlink($small_pathm.$name);
    }

    function string_length($first,$limit,$default_text,$second) {
        if(!isset($default_text))
            $default_text="";
        if(!isset($first))
            $first="";
        if(!isset($second))
            $second="";
        $string=$default_text;
        if(!empty($first))
            $string=$first;
        if(!empty($second))
            $string=$first." ".$second;
        if(strlen($string) > $limit)
            $string= substr($string,0,$limit)."...";
        return $string;
    }

    function get_session_fields($session_name,$field){
        $return_field="";
        if(isset($this->session->userdata[$session_name][$field]) && !empty($this->session->userdata[$session_name][$field]))
            $return_field=$this->session->userdata[$session_name][$field];
        return $return_field;
    }
    function insert_or_delete($where,$data,$table){
        $this->load->model('mdl_api');
        return $this->load->mdl_api->insert_or_delete($where,$data,$table);

    }
    function insert_or_update($where,$data,$table){
        $this->load->model('mdl_api');
        return $this->load->mdl_api->insert_or_update($where,$data,$table);
    }
    function insert_into_specific_table($data,$table){
        $this->load->model('mdl_api');
        return $this->load->mdl_api->_insert_into_specific_table($data,$table);
    }
    function delete_from_specific_table($where,$table) {
        $this->load->model('mdl_api');
        return $this->load->mdl_api->delete_from_specific_table($where,$table);

    }
    function insert_or_update_specific_image($where,$data,$table,$index){
        $this->load->model('mdl_api');
        return $this->mdl_api->insert_or_update_specific_image($where,$data,$table,$index);
    }
    function update_specific_table($where,$data,$table){
        $this->load->model('mdl_api');
        return $this->mdl_api->update_specific_table($where,$data,$table);
    }
    function _get_specific_table_with_pagination($cols, $order_by,$table,$select,$page_number,$limit){
        $this->load->model('mdl_api');
        $query = $this->mdl_api->_get_specific_table_with_pagination($cols, $order_by,$table,$select,$page_number,$limit);
        return $query;
    }
    function get_specific_table_data($where,$order,$select,$table_name,$page_number,$limit) {
        $this->load->model('mdl_api');
        return $this->mdl_api->get_specific_table_data($where,$order,$select,$table_name,$page_number,$limit);
    }
    function get_specific_table_with_pagination_where_groupby($cols, $order_by,$group_by='',$table,$select,$page_number,$limit,$or_where,$and_where,$having){
            $this->load->model('mdl_api');
        $query = $this->mdl_api->get_specific_table_with_pagination_where_groupby($cols, $order_by,$group_by,$table,$select,$page_number,$limit,$or_where,$and_where,$having='');
        return $query;
    }
 
}