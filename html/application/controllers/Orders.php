<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends CI_Controller {
	
	
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
	

	public function active(){
		$data['pagetitle'] = 'Orders List';
		$data['content'] = 'orders/active';
		$this->load->model('Web_model');
		
		$data['orders'] = $this->Web_model->get_orders_with_status(1);
		
		$this->load->view('admin/template',$data);				
	}

	public function dispatched(){
		$data['pagetitle'] = 'Orders List';
		$data['content'] = 'orders/dispatched';
		$this->load->model('Web_model');
		
		$data['orders'] = $this->Web_model->get_orders_with_status(2);
		
		$this->load->view('admin/template',$data);				
	}
	
	public function delivered(){
		$data['pagetitle'] = 'Delivered Orders List';
		$data['content'] = 'orders/delivered';
		$this->load->model('Web_model');
		$data['orders'] = $this->Web_model->get_orders_with_status(3);
		$this->load->view('admin/template',$data);				
	}
	
	
	
	public function failed(){
		$data['pagetitle'] = 'Failed Orders List';
		$data['content'] = 'orders/failed';
		$this->load->model('Web_model');
		$data['orders'] = $this->Web_model->get_orders_with_status(0);
		$this->load->view('admin/template',$data);				
	}
	
	public function deleted(){
		$data['pagetitle'] = 'Deleted Orders List';
		$data['content'] = 'orders/deleted';
		$this->load->model('Web_model');
		$data['orders'] = $this->Web_model->get_orders_with_status(4);
		$this->load->view('admin/template',$data);				
	}
		
	public function get_order_details(){
		$oid = trim(strip_tags($this->input->post('oid')));
		
		$this->load->model('Web_model');
		$data['details'] = $this->Web_model->get_order_details($oid);
		$data['order'] = $order = $this->Web_model->get_order_record($oid);
		
		$data['address'] = $this->Web_model->get_address($order->aid);
		
		/*$data['order'] = $order = $this->Common_model->get_record('orders','*',array('oid'=>$oid));
		$data['address'] = $this->Common_model->get_record('address','*',array('aid'=>$order->aid));*/
		
		echo $this->load->view('orders/order_details',$data,true);	
	}
	
	public function print_order($oid){
		$this->load->model('Web_model');
		$data['details'] = $this->Web_model->get_order_details($oid);
		$data['order'] = $this->Web_model->get_order_record($oid);
		
		$this->load->view('orders/print_order',$data);	
	}
	
	public function delete($id = ''){
		
		$where['oid'] = $id;
		$values['status'] = 4;
		
		$this->Common_model->update_record('orders',$values,$where);
		
		redirect('orders/index');		
	}
	
	public function update_order_status(){
		
		$oid = trim(strip_tags($this->input->post('oid')));
		$status = trim(strip_tags($this->input->post('status')));
		
		$where['oid'] = $oid;
		$values['status'] = $status;		
		$this->Common_model->update_record('orders',$values,$where);
		unset($values);
		unset($where);
		
		
		$values['oid'] = $oid;
		$values['status'] = $status;
		$values['createdTime'] = date('Y-m-d H:i:s');
		$this->Common_model->insert_record('order_history',$values);	
		
		$this->load->model('Web_model');
		$customer = $this->Web_model->get_customer_details_by_order($oid);
		
		
		$statusArr = array('1'=>'New','2'=>'Dispatched','3'=>'Delivered');
		
		//send sms			
		//$message = "Your EGROZERY order ".get_order_id($oid)." status changed to ".$statusArr[$status];
		//send_sms($customer->mobile,$message);
		//send sms
		
		//send email
		//$details['orderid'] = get_order_id($oid);
		//$details['status'] = $statusArr[$status];
		//$message = $this->load->view('email/order_status',$details,true);
		//send_email($customer->email,"Order Status Update",$message);
		//send email
	
		echo json_encode(array('success'=>true));
	}
	
}
