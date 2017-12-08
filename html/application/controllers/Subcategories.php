<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subcategories extends CI_Controller {
	
	
	var $publicMethods  = array("index","restricted","login_check","signout"); 
	 
	function __construct() {
        parent::__construct();
		
		$logged_in = $this->session->userdata('mychedi_admin_loggedin');		
		$currentMethod = $this->router->fetch_method();
		if(in_array($currentMethod,$this->publicMethods) == false){
			if(!$logged_in){
				redirect('admin/restricted');
			}
		}
    }
	

	public function index(){
		$data['pagetitle'] = 'SubCategories List';
		$data['content'] = 'subcategories/index';
		$data['subcategories'] = $this->Common_model->get_records('subcategories','*',array('status'=>0));
		
		$this->load->view('admin/template',$data);				
	}
		
	public function create(){
		$data['pagetitle'] = 'Add Category';
		$data['content'] = 'subcategories/create';
		$data['categories'] = $this->Common_model->get_records('categories','*',array('status'=>0));
		$this->load->view('admin/template',$data);				
	}
	
	
	public function edit($id = ''){
		$data['pagetitle'] = 'Edit Category';
		$data['content'] = 'subcategories/create';
		$data['categories'] = $this->Common_model->get_records('categories','*',array('status'=>0));
		$data['category'] = $this->Common_model->get_record('subcategories','*',array('status'=>0,'cid'=>$id));
		$this->load->view('admin/template',$data);				
	}
	
	
	public function save(){
		
		$scid = trim(strip_tags($this->input->post('scid')));
		
		$values['cid'] = trim(strip_tags($this->input->post('cid')));
		
		$values['subcategory_name_english'] =$this->input->post('subcategory_name_english');
		$values['subcategory_name_tamil'] =$this->input->post('subcategory_name_tamil');
		
		if(isset($_FILES["image"]["name"]) && !empty($_FILES["image"]["name"])){
			$filetmp = pathinfo($_FILES["image"]["name"]);					
			$values['image'] = $tmpfile = "mychedi_".time().rand(10000,99999).rand(10000,99999).".".$filetmp['extension'];
			move_uploaded_file($_FILES["image"]["tmp_name"],"site/categories/" . $tmpfile);	
		}
		
		if($scid){
			
			$where['scid'] = $scid;
			$values['modifiedBy'] = adminid();
			$values['modifiedTime'] = date('Y-m-d H:i:s');
			$this->Common_model->update_record('subcategories',$values,$where);
		}else{
						
			$values['status'] = 0;
			$values['createdBy'] = adminid();
			$values['createdTime'] = date('Y-m-d H:i:s');
			$this->Common_model->insert_record('subcategories',$values);
		}
		
		redirect('subcategories/index');	
	}	
	
	public function delete($id = ''){
		
		$where['scid'] = $id;
		$values['status'] = 2;
		$values['modifiedBy'] = adminid();
		$values['modifiedTime'] = date('Y-m-d H:i:s');
		
		$this->Common_model->update_record('subcategories',$values,$where);
		
		redirect('subcategories/index');		
	}
	
}
