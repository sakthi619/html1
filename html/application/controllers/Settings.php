<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {
	
	
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
	

	/*****************Delivery Charge Settings******************/
	public function delivery(){
		$data['pagetitle'] = 'Delivery Settings';
		$data['content'] = 'settings/delivery';
		$data['settings'] = $this->Common_model->get_record('delivery_settings');
		$this->load->view('admin/template',$data);				
	}
	
	public function saveDelivery(){
		$values['delivery_charge'] = trim(strip_tags($this->input->post('delivery_charge')));
		$values['delivery_limit'] = trim(strip_tags($this->input->post('delivery_limit')));
		$values['delivery_minimum'] = trim(strip_tags($this->input->post('delivery_minimum')));
		$values['delivery_amount'] = trim(strip_tags($this->input->post('delivery_amount')));
		
		$this->Common_model->update_record('delivery_settings',$values,array('id'=>1));
		
		redirect('settings/delivery');	
	}
	/*****************Delivery Charge Settings******************/
	
	
	
	
	/*****************Delivery Area******************/
	
	public function deliveryArea(){
		$data['pagetitle'] = 'Delivery Area List';
		$data['content'] = 'settings/deliveryArea';
		//$data['areas'] = $this->Common_model->get_records('delivery_areas','*',array('status'=>0));
		$this->load->model('Web_model');
		$data['areas'] = $this->Web_model->get_area_list_with_city();
		$this->load->view('admin/template',$data);				
	}
		
	public function createDeliveryArea(){
		$data['pagetitle'] = 'Add Delivery Area';
		$data['content'] = 'settings/createDeliveryArea';		
		$data['cities'] = $this->Common_model->get_records('delivery_city','*',array('status'=>0));
		$this->load->view('admin/template',$data);				
	}
	
	public function editDeliveryArea($id){
		$data['pagetitle'] = 'Edit Delivery Area';
		$data['content'] = 'settings/createDeliveryArea';
		$data['area'] = $this->Common_model->get_record('delivery_areas','*',array('status'=>0,'area_id'=>$id));
		$data['cities'] = $this->Common_model->get_records('delivery_city','*',array('status'=>0));
		$this->load->view('admin/template',$data);				
	}
	
	
	public function saveDeliveryArea(){
		$area_id = trim(strip_tags($this->input->post('area_id')));
		
		$values['city_id'] = trim(strip_tags($this->input->post('city_id')));
		$values['name'] = trim(strip_tags($this->input->post('name')));
		$values['pincode'] = trim(strip_tags($this->input->post('pincode')));
		
		if($area_id){
			$where['area_id'] = $area_id;
			$values['modifiedBy'] = adminid();
			$values['modifiedTime'] = date('Y-m-d H:i:s');
			$this->Common_model->update_record('delivery_areas',$values,$where);
		}else{
			$values['status'] = 0;
			$values['createdBy'] = adminid();
			$values['createdTime'] = date('Y-m-d H:i:s');
			$this->Common_model->insert_record('delivery_areas',$values);
		}
		
		redirect('settings/deliveryArea');	
	}	
	
	public function statusDeliveryArea($id,$status){
		
		if($status == 0)
			$values['status'] = 1;
		if($status == 1)
			$values['status'] = 0;
		
		$where['area_id'] = $id;		
		$values['modifiedBy'] = adminid();
		$values['modifiedTime'] = date('Y-m-d H:i:s');
		
		$this->Common_model->update_record('delivery_areas',$values,$where);
		
		redirect('settings/deliveryArea');	
	}
	
	public function deleteDeliveryArea($id = ''){
		
		$where['area_id'] = $id;
		$values['status'] = 2;
		$values['modifiedBy'] = adminid();
		$values['modifiedTime'] = date('Y-m-d H:i:s');
		
		$this->Common_model->update_record('delivery_areas',$values,$where);
		
		redirect('settings/deliveryArea');		
	}
	
	/*****************Delivery Area******************/
	
	
	/*****************Delivery Timings******************/
	
	public function deliveryTimings(){
		$data['pagetitle'] = 'Delivery Timing List';
		$data['content'] = 'settings/deliveryTimings';
		$data['time'] = $this->Common_model->get_records('delivery_time','*',array('status'=>0));
		$this->load->view('admin/template',$data);				
	}
	
	public function savedeliveryTimings(){
		$tid = trim(strip_tags($this->input->post('tid')));
		
		$values['time_slot'] = trim(strip_tags($this->input->post('deliveryTimings')));
		
		if($tid){
			$where['tid'] = $tid;
			$values['modifiedBy'] = adminid();
			$values['modifiedTime'] = date('Y-m-d H:i:s');
			$this->Common_model->update_record('delivery_time',$values,$where);
			echo json_encode(array('success'=>true,'update'=>true));
		}else{
			$values['status'] = 0;
			$values['createdBy'] = adminid();
			$values['createdTime'] = date('Y-m-d H:i:s');
			$this->Common_model->insert_record('delivery_time',$values);
			echo json_encode(array('success'=>true,'redirect'=>true));
		}
	}	
	
	
	public function deleteDeliveryTimings($id = ''){
		
		$where['tid'] = $id;
		$values['status'] = 2;
		$values['modifiedBy'] = adminid();
		$values['modifiedTime'] = date('Y-m-d H:i:s');
		
		$this->Common_model->update_record('delivery_time',$values,$where);
		
		redirect('settings/deliveryTimings');		
	}
	
	/*****************Delivery Timings******************/
	
	/*****************Delivery City******************/
	public function deliveryCity(){
		$data['pagetitle'] = 'Delivery City List';
		$data['content'] = 'settings/deliveryCity';
		$data['cities'] = $this->Common_model->get_records('delivery_city','*',array('status'=>0));
		$this->load->view('admin/template',$data);				
	}
		
	public function createDeliveryCity(){
		$data['pagetitle'] = 'Add Delivery City';
		$data['content'] = 'settings/createDeliveryCity';
		$this->load->view('admin/template',$data);				
	}
	
	public function editDeliveryCity($id){
		$data['pagetitle'] = 'Edit Delivery City';
		$data['content'] = 'settings/createDeliveryCity';
		$data['city'] = $this->Common_model->get_record('delivery_city','*',array('status'=>0,'city_id'=>$id));
		$this->load->view('admin/template',$data);				
	}
	
	public function saveDeliveryCity(){
		$city_id = trim(strip_tags($this->input->post('city_id')));
		
		$values['name'] = trim(strip_tags($this->input->post('name')));
		
		if($city_id){
			$where['city_id'] = $city_id;
			$this->Common_model->update_record('delivery_city',$values,$where);
		
		}else{
			$values['status'] = 0;
			$this->Common_model->insert_record('delivery_city',$values);
			
		}
		
		redirect('settings/deliveryCity');		
	}
	
	public function deleteDeliveryCity($id = ''){
		
		$where['city_id'] = $id;
		$values['status'] = 2;
		
		$this->Common_model->update_record('delivery_city',$values,$where);
		
		redirect('settings/deliveryCity');		
	}
	/*****************Delivery City******************/
	
	
	
	/*****************User Details******************/
	public function userDetails($id){
		$data['pagetitle'] = 'User Details';
		$data['content'] = 'settings/userDetails';
		$data['area_id'] = $id;
		$data['area'] = $this->Common_model->get_record('delivery_areas','*',array('area_id'=>$id));
		$data['limit'] = $this->Common_model->get_records('delivery_areas_limit','*',array('area_id'=>$id));
		$this->load->model('Web_model');
		$data['areas'] = $this->Web_model->get_area_list_from_same_city($id);
		$this->load->view('admin/template',$data);		
	}
	
	public function saveUserDetails(){
		
				
		$where['area_id'] = trim(strip_tags($this->input->post('area_id')));	
		
		$values['username'] = trim(strip_tags($this->input->post('username')));		
		$password = $this->input->post('password');			
		
		$exists = $this->Common_model->get_record('delivery_areas','*',$where);
		if($exists->password != $password){
			$values['password'] =  do_hash($password, 'md5');
		}
		
		$this->Common_model->update_record('delivery_areas',$values,$where);
		unset($values);
		
		$areas = $this->input->post('areas');
		
		if(isset($areas) && !empty($areas)){
			$this->Common_model->delete_record('delivery_areas_limit',$where);
			foreach($areas as $tmp){
				$values['area_id'] = $where['area_id'];
				$values['delivery'] = $tmp;
				$this->Common_model->insert_record('delivery_areas_limit',$values);
			}
		}
		
		redirect('settings/deliveryArea');		
	}
	/*****************User Details******************/
	
	/*****************loyaltyPoints******************/
	public function loyaltyPoints(){
		$data['pagetitle'] = 'Loyalty Points';
		$data['content'] = 'settings/loyaltyPoints';
		$data['settings'] = $this->Common_model->get_record('loyalty_settings');
		$this->load->view('admin/template',$data);				
	}
	
	public function saveLoyalty(){
		$values['loyalty'] = trim(strip_tags($this->input->post('loyalty')));
		$values['point_amount'] = trim(strip_tags($this->input->post('point_amount')));
		$values['point_redeem'] = trim(strip_tags($this->input->post('point_redeem')));
		
		$this->Common_model->update_record('loyalty_settings',$values,array('lid'=>1));
		
		redirect('settings/loyaltyPoints');	
	}
	/*****************loyaltyPoints******************/
}
