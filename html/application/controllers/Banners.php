<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banners extends CI_Controller {
	
	
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
		$data['pagetitle'] = 'Banner List';
		$data['content'] = 'banners/index';
		$data['banners'] = $this->Common_model->get_records('banners','*',array('status'=>0));
		
		$this->load->view('admin/template',$data);				
	}
		
	public function create(){
		$data['pagetitle'] = 'Add Banner';
		$data['content'] = 'banners/create';
		
		$this->load->view('admin/template',$data);				
	}
	
	
	public function edit($id = ''){
		$data['pagetitle'] = 'Edit Banner';
		$data['content'] = 'banners/create';
		$data['banner'] = $this->Common_model->get_record('banners','*',array('status'=>0,'bid'=>$id));
		$this->load->view('admin/template',$data);				
	}
	
	
	public function save(){
		
		$bid = trim(strip_tags($this->input->post('bid')));
		
		$values['hashtag'] =$this->input->post('hashtag');
				
		
	
		
		if(isset($_FILES["image"]["name"]) && !empty($_FILES["image"]["name"])){
			$filetmp = pathinfo($_FILES["image"]["name"]);					
			$values['image'] = $tmpfile = "mychedi_".time().rand(10000,99999).rand(10000,99999).".".$filetmp['extension'];
			move_uploaded_file($_FILES["image"]["tmp_name"],"site/banners/" . $tmpfile);	
		}
		
		
		if($bid){
			
			$where['bid'] = $bid;
			
			$this->Common_model->update_record('banners',$values,$where);
		}else{
						
			$values['status'] = 0;
		
			$this->Common_model->insert_record('banners',$values);
		}
		
		redirect('banners/index');	
	}	
	
	public function delete($id = ''){
		
		$where['bid'] = $id;
		$values['status'] = 2;
		
		$this->Common_model->update_record('banners',$values,$where);
		
		redirect('banners/index');		
	}
	
}
