<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	
	
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
	 

	public function restricted(){
		$data['header_home'] = 'active';
		$this->load->view('admin/restricted');				
	}
	
	public function index(){
		$this->load->view('admin/login');				
	}
	

	public function login_check(){
		$values['username'] = trim(strip_tags($this->input->post('username')));		
		$password = $this->input->post('password');			
		$values['password'] =  do_hash($password, 'md5');
		
		$exists = $this->Common_model->get_record('users','*',$values);
		if(isset($exists->status) && $exists->status == 0 && $exists->type == 1){			
			
			$userdata = array("mychedi_admin_id"=>$exists->uid,"mychedi_admin_loggedin"=>true);
			$this->session->set_userdata($userdata);
			
			redirect('admin/dashboard');	
		}else if(isset($exists->status) && $exists->status == 1){
			echo json_encode(array('failure'=>true,'message'=>''));		
			redirect('admin/index');	
		}else{
			echo json_encode(array('failure'=>true,'message'=>'Invalid email/password'));		
			redirect('admin/index');	
		}
		
	}
	
	
	public function signout(){
		$userdata = array("ub_admin_id"=>"","ub_admin_loggedin"=>false);
		$this->session->set_userdata($userdata);
		redirect('admin/index');
	}
	
	
	public function dashboard(){
		$data['pagetitle'] = 'Dashboard';
		
		$data['content'] = 'admin/dashboard';
		$this->load->view('admin/template',$data);	
	}
	
	public function customers(){
		$data['pagetitle'] = 'Customers';		
		$data['content'] = 'admin/customers';
		$data['customers'] =  $this->Common_model->get_records('customers','*',array('status <> '=>3));
		$this->load->view('admin/template',$data);	
	}
	
	public function blockCustomer($id,$status){
				
			if($status == 2){
				$values['status'] = 1;
			}else{
				$values['status'] = 2;
			}
			$where['cid'] = $id;
			
			$this->Common_model->update_record('customers',$values,$where);
			
			redirect('admin/customers');
	}
	public function deleteCustomer($id){			
			$values['status'] = 3;	
			$where['cid'] = $id;			
			$this->Common_model->update_record('customers',$values,$where);
			
			redirect('admin/customers');			
	}
	
	public function changePassword(){
		$data['pagetitle'] = 'Change Password';
		
		$data['content'] = 'admin/changePassword';
		$this->load->view('admin/template',$data);	
	}
	
	
	public function updatePassword(){
		
		$password = $this->input->post('password');			
		$values['password'] =  do_hash($password, 'md5');
	
		$where['uid'] = 1;
		
		$this->Common_model->update_record('users',$values,$where);
		
		$this->session->set_flashdata('passwordUpdate',true);
		
		redirect('admin/changePassword');
	}
	
	
	
	public function select($section){
		$data['pagetitle'] = 'Dashboard';	
		$data['section'] = $section;
		$data['content'] = 'admin/select';
		$this->load->view('admin/template',$data);	
	}
	
	
	public function orders($id){
		$data['pagetitle'] = 'Orders List';
		$data['content'] = 'admin/orders';
		$this->load->model('Web_model');
		$data['orders'] = $this->Web_model->get_orders_by_customer($id);
		$this->load->view('admin/template',$data);				
	}
	
	public function createBulkSMS(){
		$data['pagetitle'] = 'Bulk SMS';
		$data['content'] = 'admin/createBulkSMS';
		$this->load->view('admin/template',$data);				
	}
	
	
	public function saveBulkSMS(){
		
		$values['sms_text'] = $this->input->post('sms_text');
	
		$values['status'] = 0;
		$values['createdTime'] = date("Y-m-d H:i:s");
		
		$this->Common_model->insert_record('bulksms',$values);
		
		
		redirect('admin/bulksms');
	}
	
	public function bulksms(){
		$data['pagetitle'] = 'Bulk SMS List';
		$data['content'] = 'admin/bulksms';
		$data['sms'] = $this->Common_model->get_records('bulksms','*',array('status<>'=>2));
		$this->load->view('admin/template',$data);				
	}
	
	public function deleteSMS($id){			
		$values['status'] = 2;	
		$where['id'] = $id;			
		$this->Common_model->update_record('bulksms',$values,$where);
		
		redirect('admin/bulksms');			
	}
	
}
