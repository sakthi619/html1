<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Suppliers extends CI_Controller {
	
	
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
		$data['pagetitle'] = 'Suppliers List';
		$data['content'] = 'suppliers/index';

		$data['suppliers'] = $this->Common_model->get_records('suppliers','*',array('status'=>0));
		$this->load->view('admin/template',$data);				
	}
		
	public function create(){
		$data['pagetitle'] = 'Add Supplier';
		$data['content'] = 'suppliers/create';
		$this->load->view('admin/template',$data);				
	}
	
	public function edit($id = ''){
		$data['pagetitle'] = 'Edit Supplier';
		$data['content'] = 'suppliers/create';
		$data['supplier'] = $this->Common_model->get_record('suppliers','*',array('status'=>0,'sid'=>$id));
		$this->load->view('admin/template',$data);				
	}
	
	
	public function save(){
		$sid = trim(strip_tags($this->input->post('sid')));
		
		$values['name'] = trim(strip_tags($this->input->post('name')));
		$values['address'] = trim(strip_tags($this->input->post('address')));
		$values['city'] = trim(strip_tags($this->input->post('city')));
		$values['phone'] = trim(strip_tags($this->input->post('phone')));
		
		if($sid){
			$where['sid'] = $sid;
			$values['modifiedBy'] = adminid();
			$values['modifiedTime'] = date('Y-m-d H:i:s');
			$this->Common_model->update_record('suppliers',$values,$where);
		}else{
			$values['status'] = 0;
			$values['createdBy'] = adminid();
			$values['createdTime'] = date('Y-m-d H:i:s');
			$this->Common_model->insert_record('suppliers',$values);
		}
		
		redirect('suppliers/index');	
	}	
	
	public function delete($id = ''){
		
		$where['sid'] = $id;
		$values['status'] = 2;
		$values['modifiedBy'] = adminid();
		$values['modifiedTime'] = date('Y-m-d H:i:s');
		
		$this->Common_model->update_record('suppliers',$values,$where);
		
		redirect('suppliers/index');		
	}
	
}
