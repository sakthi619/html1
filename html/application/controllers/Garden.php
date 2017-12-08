<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Garden extends CI_Controller {
	
	
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
		$data['pagetitle'] = 'Products List';
		$data['content'] = 'products/index';	
		$data['products'] = $this->Common_model->get_records('products');
		$this->load->view('admin/template',$data);				
	}

	

		
	public function create(){
		$data['pagetitle'] = 'Add Garden';
		$data['content'] = 'garden/create';
		
		$data['products'] = $this->Common_model->get_records('products','*',array('status'=>0));
		
		
		
		$this->load->view('admin/template',$data);				
	}
	
	public function add_variant(){
		echo $this->load->view('products/variants','',true);				
	}
	
	public function get_sizes(){
		$term = trim(strip_tags($this->input->post('term')));
		
		$this->load->model('Web_model');
		$sizes = $this->Web_model->get_sizes($term);
		
		$mainarray = array();
		if(!empty($sizes)){
			foreach($sizes as $tmp){
				$subarray['value'] = $tmp->size;
				
				array_push($mainarray,$subarray);
			}
		}
		
		echo json_encode($mainarray);
		
	}
	
	public function edit($id = ''){
		$data['pagetitle'] = 'Edit Product';
		$data['content'] = 'products/create';
		$data['categories'] = $this->Common_model->get_records('categories','*',array('status'=>0));
		$data['suppliers'] = $this->Common_model->get_records('suppliers','*',array('status'=>0));
		
		$data['plant_types'] = $this->Common_model->get_records('plant_types','*',array('status'=>0));
		$data['plant_use'] = $this->Common_model->get_records('plant_use','*',array('status'=>0));
		$data['plant_placements'] = $this->Common_model->get_records('plant_placements','*',array('status'=>0));
		
		$data['product'] = $this->Common_model->get_record('products','*',array('status'=>0,'pid'=>$id));
		
		$this->load->view('admin/template',$data);				
	}
	
	
	public function save(){
		
		$values['cid'] = trim(strip_tags($this->input->post('category_id')));
		$values['supplier_id'] = trim(strip_tags($this->input->post('supplier_id')));
		$values['product_name_english'] = trim(strip_tags($this->input->post('product_name_english')));
		$values['product_name_tamil'] = trim(strip_tags($this->input->post('product_name_tamil')));
		
		$values['plant_type'] = trim(strip_tags($this->input->post('plant_type')));
		$values['plant_placement'] = trim(strip_tags($this->input->post('plant_placement')));
		$values['plant_use'] = trim(strip_tags($this->input->post('plant_use')));
		
		$values['tax'] = trim(strip_tags($this->input->post('tax')));
		$values['description_english'] = $this->input->post('description_english');
		$values['description_tamil'] = $this->input->post('description_tamil');
		
		
		$values['barcode'] = $this->input->post('barcode');
		$values['sku'] = $this->input->post('sku');
		$values['retail_price'] = $this->input->post('retail_price');
		$values['sale_price'] = $this->input->post('sale_price');
		$values['shortname'] = $this->input->post('shortname');
		
	
		$values['status'] = 0;
		$values['createdBy'] = adminid();
		$values['createdTime'] = date('Y-m-d H:i:s');
		$pid = $this->Common_model->insert_record('products',$values);
		
		unset($values);
		
						
		$values['pid'] = $pid;
		$values['quantity'] = $this->input->post('quantity');
		$values['purchase_price'] = $this->input->post('purchase_price');
		$values['supplier'] = trim(strip_tags($this->input->post('supplier_id')));
		$values['type'] = 'A';
		$values['createdTime'] = date('Y-m-d H:i:s');					
		$this->Common_model->insert_record('product_quantity',$values);
		
		unset($values);
		unset($where);
		
		
		unset($values);
		if(isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])){			
			foreach($_FILES['image']['name'] as $key=>$tmp){	
			
				if($tmp){
					$filetmp = pathinfo($tmp);					
					$values['image_'.($key+1)] = $tmpfile = "mychedi_".time().rand(10000,99999).rand(10000,99999).".".$filetmp['extension'];
					move_uploaded_file($_FILES["image"]["tmp_name"][$key],"site/products/" . $tmpfile);	
				}
				
			}	
			$values['pid'] = $pid;
			$this->Common_model->insert_record('product_images',$values);			
		}	
		
		redirect('products/index');	
	}	
	
	
	
	public function update(){

		
		//update product table start
		$where['pid'] = $pid = trim(strip_tags($this->input->post('pid')));
		$values['cid'] = trim(strip_tags($this->input->post('category_id')));
		$values['supplier_id'] = trim(strip_tags($this->input->post('supplier_id')));
		
		$values['product_name_english'] = trim(strip_tags($this->input->post('product_name_english')));
		$values['product_name_tamil'] = trim(strip_tags($this->input->post('product_name_tamil')));
		
		$values['plant_type'] = trim(strip_tags($this->input->post('plant_type')));
		$values['plant_placement'] = trim(strip_tags($this->input->post('plant_placement')));
		$values['plant_use'] = trim(strip_tags($this->input->post('plant_use')));
		
		$values['tax'] = trim(strip_tags($this->input->post('tax')));
		$values['description_english'] = $this->input->post('description_english');
		$values['description_tamil'] = $this->input->post('description_tamil');
		
		
		$values['barcode'] = $this->input->post('barcode');
		$values['sku'] = $this->input->post('sku');
		$values['retail_price'] = $this->input->post('retail_price');
		$values['sale_price'] = $this->input->post('sale_price');
		$values['shortname'] = $this->input->post('shortname');
		
		$values['modifiedBy'] = adminid();
		$values['modifiedTime'] = date('Y-m-d H:i:s');
		$this->Common_model->update_record('products',$values,$where);
		//update product table end
		unset($values);
		unset($where);
		
		
	
				
		$values['pid'] = $pid;
		$values['quantity'] = $this->input->post('quantity');
		$values['purchase_price'] = $this->input->post('purchase_price');
		$values['supplier'] = trim(strip_tags($this->input->post('supplier_id')));
		$values['type'] = 'A';
		$values['createdTime'] = date('Y-m-d H:i:s');					
		$this->Common_model->insert_record('product_quantity',$values);
		
		unset($values);
		unset($where);
				
		unset($values);
		if(isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])){			
			foreach($_FILES['image']['name'] as $key=>$tmp){	
			
				if($tmp){
					$filetmp = pathinfo($tmp);					
					$values['image_'.($key+1)] = $tmpfile = "mychedi_".time().rand(10000,99999).rand(10000,99999).".".$filetmp['extension'];
					move_uploaded_file($_FILES["image"]["tmp_name"][$key],"site/products/" . $tmpfile);	
				}
				
			}	
			if(isset($values) && !empty($values)){
				$where['pid'] = $pid;
				$this->Common_model->update_record('product_images',$values,$where);			
			}
		}	
		
		
		redirect('products/index');	
		
	}
	
	
	public function delete($id = ''){
		
		$where['pid'] = $id;
		$values['status'] = 2;
		$values['modifiedBy'] = adminid();
		$values['modifiedTime'] = date('Y-m-d H:i:s');
		
		$this->Common_model->update_record('products',$values,$where);
		
		redirect('products/index');		
	}
	
	public function trending($id,$trending){
		
		$where['pid'] = $id;
		if($trending == 1)
			$values['trending'] = 0;
		else
			$values['trending'] = 1;
		$values['modifiedBy'] = adminid();
		$values['modifiedTime'] = date('Y-m-d H:i:s');
		
		$this->Common_model->update_record('products',$values,$where);
		
		redirect('products/index');		
	}
	
	
	
}
