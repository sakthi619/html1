<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web extends CI_Controller {
	
	var $publicMethods  = array("index","restricted","login_check","signout","change_lang","category","signup","register","signin","verify_mobile","otp_check","welcome","product","shop","shop1","update_cart","checkout","clearcart","garden","gardenView","subcategory", "search","cart","remove_cart_item","update_cart_quantity","forgot_password","send_pass_verification","check_reset_otp","reset_password","update_password"); 
	 
	function __construct() {
        parent::__construct();
		
		$logged_in = $this->session->userdata('mychedi_user_logged_in');		
		$currentMethod = $this->router->fetch_method();
	
		if($this->session->userdata('lang')){
			$this->lang->load('global', $this->session->userdata('lang'));
		}
		else{
			$this->session->set_userdata('lang','en');
			$this->lang->load('global', 'en');
		}
		
		if(in_array($currentMethod,$this->publicMethods) == false){
			if(!$logged_in){
				redirect('web/restricted');
			}
		}
    }
	
	
	public function forgot_password(){
		$data['content'] = 'web/forgot_password';		
		$this->load->view('web/template',$data);	
	}
	
	public function send_pass_verification(){
		$where['email'] = trim(strip_tags($this->input->post('email')));		
		$exists = $this->Common_model->get_record('customers','cid',$where);
		if(isset($exists->cid)){
			
			$values['verification'] = time().generate_verififation();
			$this->Common_model->update_record('customers',$values,$where);
			
			//send email
			$message = $this->load->view('email/reset_pass',$values,true);
			send_email($where['email'],"Reset Password",$message);
			//send email
			
			
			
			echo json_encode(array('success'=>true,'message'=>"Password reset email sent to ".$where['email'].". Please follow the instructions in the email to reset the password",'type'=>'email'));		
			exit;
		}
		
		
		unset($where);
		$where['mobile'] = trim(strip_tags($this->input->post('mobile')));
		$exists = $this->Common_model->get_record('customers','cid',$where);
		if(isset($exists->cid)){
			$values['verification'] = rand(100000,999999);
			$this->Common_model->update_record('customers',$values,$where);
			
			//send sms
			$message = "Your MYCHEDI One Time Password (OTP) for Password Reset is ".$values['verification'];
			send_sms($where['mobile'],$message);
			//send sms
			
			echo json_encode(array('success'=>true,'message'=>"OTP sent to ".$where['mobile'].".",'type'=>'mobile'));
			exit;
		}
		
	
		
		echo json_encode(array('success'=>false,'message'=>"Email/Mobile is registered with us"));
	}
	
	public function check_reset_otp(){
		$where['verification'] = trim(strip_tags($this->input->post('otp')));		
		$where['mobile'] = trim(strip_tags($this->input->post('mobile')));	
		$exists = $this->Common_model->get_record('customers','cid',$where);
			
		if(isset($exists->cid)){
			
			$this->session->set_flashdata('reset_pass',$where['verification']); 
			
			echo json_encode(array('success'=>true,'message'=>""));		
			exit;
		}else{
			echo json_encode(array('success'=>false,'message'=>"OTP is not correct. Please check again"));		
			exit;
			
		}		
	}
	
	
	public function reset_password($verification = ''){
		
		if($verification){
			$data['verification'] = $verification;
			$data['content'] = 'web/reset_password';		
			$this->load->view('web/template',$data);	
		}else if($verification = $this->session->flashdata('reset_pass')){		
			$data['verification'] = $verification;
			$data['content'] = 'web/reset_password';		
			$this->load->view('web/template',$data);	
		}else{
			redirect('index');
		}
	}
	
	public function update_password(){
		$where['verification'] = trim(strip_tags($this->input->post('verification')));		
		$values['password'] = trim(strip_tags($this->input->post('password')));		
		$values['verification'] = "";		
		
		$this->Common_model->update_record('customers',$values,$where);
			
		echo json_encode(array('success'=>true));		
	}

	public function index()
	{
		$this->load->model('Web_model');
		$data['offer'] = $this->Web_model->get_offer_products();
		$data['trending'] = $this->Web_model->get_trending_products();
		
		$data['banners'] = $this->Common_model->get_records_order_by('banners','*',array('status'=>0),'bid','desc');
		
		$data['content'] = 'web/home';
		$this->load->view('web/template',$data);				
	}
	
	public function change_lang($lang,$uri1='',$uri2='',$uri3='') {
		
		
		
		
	  $this->session->set_userdata('lang',$lang);
	  
	  
	  if($uri1 && $uri2 && $uri3)
		redirect($uri1."/".$uri2."/".$uri3);
	else
		redirect('web/index');
	}
	
	public function garden() {
		$data['garden'] = $this->Common_model->get_records('garden','*',array('status'=>0));	

		$data['content'] = 'web/garden';
		$this->load->view('web/template',$data);		
	}
	
	public function gardenView($gid){
		$data['garden'] = $this->Common_model->get_record('garden','*',array('gid'=>$gid));	
		
		$this->load->model('Web_model');
		$data['products'] = $this->Web_model->get_garden_products($gid);	
		
		$data['content'] = 'web/gardenView';
		$this->load->view('web/template',$data);	
	}
	
	public function shop($latest='',$price = ''){
		$sql = array('status = 0');
		
		$orderBy = "";
		if($latest == ''){
			$orderBy = "order by createdTime desc";
			$data['selLatest'] = 1;	
		}
		if($latest){
			$latest = explode("_",$latest);
			if(isset($latest[1]) && $latest[1] == 1){				
				$orderBy = "order by createdTime desc";
				$data['selLatest'] = 1;
			}
			if(isset($latest[1]) && $latest[1] == 0){				
				$orderBy = "order by createdTime asc";
				$data['selLatest'] = 0;
			}			
		}
		
		if($price){
			$price = explode("_",$price);
			if(isset($price[1]) && $price[1] == 1){				
				$orderBy = "order by sale_price desc";
				$data['selPrice'] = 1;
			}
			if(isset($price[1]) && $price[1] == 0){				
				$orderBy = "order by sale_price asc";
				$data['selPrice'] = 0;
			}			
		}
		
		$sql = implode(" and ",$sql)." ".$orderBy;
		$data['categories'] = $this->Common_model->get_records('categories','*',array('status'=>0));
		$this->load->model('Web_model');
		$data['products'] = $this->Web_model->select_table('products',$sql);
		$data['content'] = 'web/shop';
		$this->load->view('web/template',$data);		
	}
	

	
	public function subcategory($cat='',$type='',$placement='',$use='',$latest='') {
		
		$sql = array('status = 0');
		$categories = array();
		if($cat){
			$cat = explode("_",$cat);
			if(isset($cat[1]) && !empty($cat[1])){
				$cat = explode("-",$cat[1]);				
				$categories = $cat;
				$sql[] = "cid in (".implode(',',$categories).")";
			}
		}
		$types = array();
		if($type){
			$type = explode("_",$type);
			if(isset($type[1]) && !empty($type[1])){
				$type = explode("-",$type[1]);				
				$types = $type;
				$sql[] = "plant_type in (".implode(',',$types).")";
			}
		}
		$placements = array();
		if($placement){
			$placement = explode("_",$placement);
			if(isset($placement[1]) && !empty($placement[1])){
				$placement = explode("-",$placement[1]);				
				$placements = $placement;
				$sql[] = "plant_placement in (".implode(',',$placements).")";
			}
		}
		$uses = array();
		if($use){
			$use = explode("_",$use);
			if(isset($use[1]) && !empty($use[1])){
				$use = explode("-",$use[1]);				
				$uses = $use;
				$sql[] = "plant_use in (".implode(',',$uses).")";
			}
		}
		
		$orderBy = "order by createdTime desc";
		$data['selLatest'] = 1;
		if($latest){
			$latest = explode("_",$latest);
			if(isset($latest[1]) && $latest[1] == 1){				
				$orderBy = "order by createdTime desc";
				$data['selLatest'] = 1;
			}
			if(isset($latest[1]) && $latest[1] == 0){				
				$orderBy = "order by createdTime asc";
				$data['selLatest'] = 0;
			}
			
		}
		
		$data['selCategories'] = $categories;
		$data['selTypes'] = $types;
		$data['selPlacements'] = $placements;
		$data['selUses'] = $uses;
		
		$sql = implode(" and ",$sql)." ".$orderBy;
		
		$this->load->model('Web_model');
		$data['products'] = $this->Web_model->select_table('products',$sql);
		
		//$data['products'] = $this->Common_model->get_records('products','*',array('status'=>0));
		$data['categories'] = $this->Common_model->get_records('categories','*',array('status'=>0));
		$data['plant_types'] = $this->Common_model->get_records('plant_types','*',array('status'=>0));
		$data['plant_use'] = $this->Common_model->get_records('plant_use','*',array('status'=>0));
		$data['plant_placements'] = $this->Common_model->get_records('plant_placements','*',array('status'=>0));
		
		$data['content'] = 'web/subcategory';
		$this->load->view('web/template',$data);		
	}
	
	public function category($latest= '', $price = '', $cid) {
		
		$sql = array('status = 0',"cid = $cid");
		
		$orderBy = "";
		if($latest == ''){
			$orderBy = "order by createdTime desc";
			$data['selLatest'] = 1;	
		}
		if($latest){
			$latest = explode("_",$latest);
			if(isset($latest[1]) && $latest[1] == 1){				
				$orderBy = "order by createdTime desc";
				$data['selLatest'] = 1;
			}
			if(isset($latest[1]) && $latest[1] == 0){				
				$orderBy = "order by createdTime asc";
				$data['selLatest'] = 0;
			}			
		}
		
		
		if($price){
			$price = explode("_",$price);
			if(isset($price[1]) && $price[1] == 1){				
				$orderBy = "order by sale_price desc";
				$data['selPrice'] = 1;
			}
			if(isset($price[1]) && $price[1] == 0){				
				$orderBy = "order by sale_price asc";
				$data['selPrice'] = 0;
			}			
		}
		
		$sql = implode(" and ",$sql)." ".$orderBy;
		$data['subcategories'] = $this->Common_model->get_records('subcategories','*',array('status'=>0,'cid'=>$cid));
		$this->load->model('Web_model');
		$data['products'] = $this->Web_model->select_table('products',$sql);
		$data['content'] = 'web/category';
		$data['category'] = $cid;
		$this->load->view('web/template',$data);		
		
	}
	
	public function signup() {
		$data['content'] = 'web/signup';
		$this->load->view('web/template',$data);		
	}
	
	public function signin() {
		$data['content'] = 'web/signin';
		$this->load->view('web/template',$data);		
	}
	
	public function register() {
		$where1['email'] = trim(strip_tags($this->input->post('email')));
		$where1['status <> '] = 3; 
		$e_exists = $this->Common_model->get_record('customers','cid',$where1);
		
		$where2['mobile'] = trim(strip_tags($this->input->post('mobile')));
		$where2['status <> '] = 3;
		$m_exists = $this->Common_model->get_record('customers','cid',$where2);
		
		$error = array();
		if(isset($e_exists->cid)){
			$error['email'] = "Email already registered with us";
		}
		
		if(isset($m_exists->cid)){
			$error['mobile'] = "Mobile already registered with us";
		}
		
		if(count($error)){		
			echo json_encode(array('success'=>false,'error'=>$error));
			exit;
		}
		
		$values['firstname'] = trim(strip_tags($this->input->post('firstname')));
		$values['lastname'] = trim(strip_tags($this->input->post('lastname')));
		$values['email'] = trim(strip_tags($this->input->post('email')));
		$values['password'] = trim(strip_tags($this->input->post('password')));
		$values['mobile'] = trim(strip_tags($this->input->post('mobile')));
		$values['otp'] = rand(100000,999999);
		$values['status'] = 0;
		$values['createdTime'] = date('Y-m-d H:i:s');
				
		$this->Common_model->insert_record('customers',$values);
		
		$this->session->set_flashdata('mobile',$values['mobile']);
		
		//send sms
		$message = "Your Mychedi One Time Password (OTP) is ".$values['otp'];
		send_sms($values['mobile'],$message);
		//send sms
		
		echo json_encode(array('success'=>true,'mobile'=>$values['mobile']));
	}
	
	public function verify_mobile() {
		$data['content'] = 'web/verify_mobile';
		$data['mobile'] = $this->session->flashdata('mobile');
		$this->load->view('web/template',$data);		
	}
	
	public function otp_check(){
		$where['mobile'] = trim(strip_tags($this->input->post('mobile')));
		$otp = trim(strip_tags($this->input->post('otp')));
		
		$exists = $this->Common_model->get_record('customers','cid,otp,email',$where);
		if(isset($exists->cid)){
			if($exists->otp == $otp && $otp){
				
				$values['status'] = 1;
				$values['otp'] = "";
				$values['mobile_verified'] = 0;
				$this->Common_model->update_record('customers',$values,$where);
				
				$this->session->set_flashdata('welcome_msg',true);
				
				//send email
				//$message = $this->load->view('email/welcome_mail','',true);
				//send_email($exists->email,"Account Creation",$message);
				//send email
				
				$redirect = $this->session->userdata("redirect");
				if($redirect == 'checkout'){
					$url = base_url()."checkout";
					$this->session->set_userdata("redirect","");
					
					
					$user = array('mychedi_cid'=>$exists->cid,'mychedi_email'=>$exists->email,'mychedi_user_logged_in'=>true);
					$this->session->set_userdata($user);
					
				}else{
					
					$user = array('mychedi_cid'=>$exists->cid,'mychedi_email'=>$exists->email,'mychedi_user_logged_in'=>true);
					$this->session->set_userdata($user);
					
					$url = base_url()."web/welcome";
				}
				
				echo json_encode(array('success'=>true,'url'=>$url));
				exit;
			}else{
				$error['otp'] = "Please check the OTP";
				echo json_encode(array('success'=>false,'error'=>$error));
				exit;
			}
		}else{
			$error['mobile'] = "Please check the mobile number";
			echo json_encode(array('success'=>false,'error'=>$error));
			exit;
		}
		
	}
	
	public function welcome() {
		$data['content'] = 'web/welcome';
		$this->load->view('web/template',$data);		
	}
	
	public function login_check(){
		$where['email'] = trim(strip_tags($this->input->post('email')));
		$where['password'] = trim(strip_tags($this->input->post('password')));
		
		$exists = $this->Common_model->get_record('customers','*',$where);
		
		if(isset($exists->cid)){
			
			if($exists->status == 1){
				
				$user = array('mychedi_cid'=>$exists->cid,'mychedi_email'=>$exists->email,'mychedi_user_logged_in'=>true);
				$this->session->set_userdata($user);
				echo json_encode(array('success'=>true));
				exit;
			}else{
				$error['result'] = "Your account is not active. Please contact contact@mychedi.com";
				echo json_encode(array('success'=>false,'error'=>$error));
				exit;				
			}
			
		}else{
			$error['result'] = "Invalid Email/Password";
			echo json_encode(array('success'=>false,'error'=>$error));
			exit;
		}
		
	}
	
	public function logout(){
		
		$user = array('mychedi_cid'=>"",'mychedi_email'=>"",'mychedi_user_logged_in'=>"");
		$this->session->set_userdata($user);
		
		redirect('web/index');
	}
	
	public function product($id) {
		
		$data['pid'] = $id;
		$data['product'] = $this->Common_model->get_record('products','*',array('pid'=>$id));
		$data['images'] = $this->Common_model->get_record('product_images','*',array('pid'=>$id));
		
		$data['related'] = $this->Common_model->get_records('products','*',array('cid'=>$data['product']->cid,'pid <> '=>$id));
		
		$data['content'] = 'web/product';
		$this->load->view('web/template',$data);		
	}
	
	public function update_cart(){
		
		$quantity = trim(strip_tags($this->input->post('quantity')));		
		$product = trim(strip_tags($this->input->post('product')));
		$price = trim(strip_tags($this->input->post('price')));
		$productname = trim(strip_tags($this->input->post('productname')));
		
		
		$cart = $this->session->userdata('cart');

			
		$cart[$product] = array('quantity'=>$quantity,'price'=>$price,'productname'=>$productname);
		
		$this->session->set_userdata('cart',$cart);
		
		$data['cart'] = $cart;
		
		$list = $this->load->view('web/ajax_cart',$data,true);
		
		$totalquantity = array();
		if(isset($cart) && !empty($cart)){			
			foreach($cart as $tmp){		 
				$totalquantity[] = $tmp['quantity'];
			}			
		}
		
		echo json_encode(array('success'=>true,'cart'=>$list,'quantity'=>array_sum($totalquantity)));
	}
	
	public function clearcart(){		
	
		$cart = $this->session->set_userdata('cart','');
		//echo json_encode(array('success'=>true));		
		redirect('web/index');
	}
	
	public function cart(){		
	
		$cart = $this->session->userdata('cart');
		$data['cart'] = $cart;
	
		$data['content'] = 'web/cart';		
		$this->load->view('web/template',$data);				
	}
	
	public function remove_cart_item($id){
		
		$cart = $this->session->userdata('cart');	

		unset($cart[$id]);
		
		$this->session->set_userdata('cart',$cart);	
		
		redirect('web/cart');
	}
	
	public function update_cart_quantity(){
		
		$quantity = trim(strip_tags($this->input->post('quantity')));
		$variant = trim(strip_tags($this->input->post('variant')));
		
		$cart = $this->session->userdata('cart');
			
		$cart[$variant]['quantity'] = $quantity;
		
		$this->session->set_userdata('cart',$cart);
		
		$data['cart'] = $cart;
		
		$list = $this->load->view('web/ajax_cart',$data,true);
		
		$totalquantity = array();
		if(isset($cart) && !empty($cart)){			
			foreach($cart as $tmp){		 
				$totalquantity[] = $tmp['quantity'];
			}			
		}
		
		echo json_encode(array('success'=>true,'cart'=>$list,'quantity'=>array_sum($totalquantity)));
		
	}
	
	public function checkout(){		
	
		$this->session->set_userdata('coupon_discount','');
		$this->session->set_userdata('coupon','');
	
		$cart = $this->session->userdata('cart');
		$data['cart'] = $cart;
		
		
		$this->load->model('Web_model');
	
		$data['time'] = $this->Common_model->get_records('delivery_time','*',array('status'=>0));
		$data['cities'] = $this->Common_model->get_records('delivery_city','*',array('status'=>0));
		
		$data['content'] = 'web/checkout';		
		$this->load->view('web/template',$data);				
	}
	
	
	public function check_coupon(){
		$cart = $this->session->userdata('cart');
		
		$total = array();
		if(isset($cart) && !empty($cart)){			
			foreach($cart as $tmp){		
				$total[] = $tmp['quantity'] * $tmp['price'];
			}
		}
		$this->load->model('Web_model');
		$coupon = trim(strip_tags($this->input->post('coupon')));
		
		if(check_coupon_usage(get_customer_id(),$coupon)){			
			echo json_encode(array('success'=>false,'message'=>'Already you used this coupon code'));			
			exit;
		}
		
		$exists = $this->Web_model->get_todays_coupon($coupon);
		if(isset($exists->coupon_id)){			
			$totalAmt = array_sum($total);	
			$discount = 0;
			if($exists->purchase_limit == 1){				
				if($totalAmt >= $exists->amount){
					if($exists->type == 1){
						$discount = $exists->offer_val;
					}else{
						$discount = ($totalAmt * $exists->offer_val)/100;
					}
					$message = 'Valid Coupon. Discount amount added in the final checkout amount';
				}else{
					$message = 'Valid Coupon. But you have to purchase for Rs.'.$exists->amount;
				}
			}else{
				if($exists->type == 1){
					$discount = $exists->offer_val;
				}else{
					$discount = ($totalAmt * $exists->offer_val)/100;
				}
				
				$message = 'Valid Coupon. Discount amount added in the final checkout amount';
			}
			
			$this->session->set_userdata('coupon_discount',$discount);
			$this->session->set_userdata('coupon',$coupon);
			
			$discount = number_format($discount,2);
			echo json_encode(array('success'=>true,'discount'=>$discount,'message'=>$message));			
		}else{
			echo json_encode(array('success'=>false,'message'=>'Invalid coupon code'));			
		}
		
	}
	
	
	public function remove_coupon(){
		$this->session->set_userdata('coupon_discount','');
		$this->session->set_userdata('coupon','');
		
		echo json_encode(array('success'=>true,'message'=>'Coupon Removed'));		
	}
	
	public function place_order(){
		
		
		$payment_mode = trim(strip_tags($this->input->post('payment_mode')));
		$address_id = trim(strip_tags($this->input->post('address_id')));
		$address_name = trim(strip_tags($this->input->post('address_name')));
		$house_no = trim(strip_tags($this->input->post('house_no')));
		$address = trim(strip_tags($this->input->post('address')));
		$residential = trim(strip_tags($this->input->post('residential')));
		$area = trim(strip_tags($this->input->post('area')));
		$landmark = trim(strip_tags($this->input->post('landmark')));
		$default_address = trim(strip_tags($this->input->post('default_address')));
		$delivery_date = trim(strip_tags($this->input->post('delivery_date')));
		$delivery_time = trim(strip_tags($this->input->post('delivery_time')));
		
		
		//address
		if($address_id){
			$values['aid'] = $address_id;
		}else{
			$addressV['cid'] = get_customer_id();
			$addressV['address_name'] = $address_name;
			$addressV['house_no'] = $house_no;
			$addressV['residential'] = $residential;
			$addressV['area'] = $area;
			$addressV['street'] = $address;
			$addressV['landmark'] = $landmark;
			$addressV['default_address'] = $default_address;
			$addressV['status'] = 0;
			$addressV['createdTime'] = date('Y-m-d H:i:s');
			$values['aid'] = $this->Common_model->insert_record('address',$addressV);
		}
		//address
		
		
		$cart = $this->session->userdata('cart');	
		$couponcode = $this->session->userdata('coupon');		

		$total = array();
		$quantity = array();
		if(isset($cart) && !empty($cart)){			
			foreach($cart as $tmp){		 
				$total[] = $tmp['quantity'] * $tmp['price'];
				$quantity[] = $tmp['quantity'];
			}			
		}

		$subTotal = array_sum($total);	
		
		
		$offer = check_offer($subTotal);
		$delivery = check_delivery_charge($subTotal);
		$coupon = $this->session->userdata('coupon_discount');
		
		$totalAmt = $subTotal + $delivery - ($coupon + $offer);
		
		
		
		$values['cid'] = get_customer_id();
		$values['quantity'] = array_sum($quantity);	
		$values['subtotal'] = $subTotal;	
		$values['delivery'] = $delivery;	
		$values['loyalty'] = get_loyalty_redeem_amount() * get_customer_loyalty_points(get_customer_id());
		$values['total'] = $totalAmt;	
		$values['payment_type'] = $payment_mode == 'cod'?0:1;	
		$values['delivery_date'] = date('Y-m-d',strtotime($delivery_date));	
		$values['delivery_time'] = $delivery_time;	
		$values['offer_id'] = check_offer_id($subTotal);	
		$values['offer_amount'] = $offer;	
		$values['coupon_id'] = get_coupon_id($couponcode);	
		$values['coupon_amount'] = $coupon;	
		
		if($payment_mode == 'cod')
			$values['status'] = 1;
		else
			$values['status'] = 0;
		
		$values['createdTime'] = date('Y-m-d H:i:s');
		$orderid = $this->Common_model->insert_record('orders',$values);
		
		
		
		if(isset($cart) && !empty($cart)){			
			foreach($cart as $var => $tmp){		 
				$product = $var;
				
				$details['oid'] = $orderid;
				$details['pid'] = $product;
				$details['quantity'] = $tmp['quantity'];
				$details['price'] = $tmp['price'];
				$details['subtotal'] = $tmp['quantity'] * $tmp['price'];
				$details['tax'] = get_product_tax($product);
				$details['total'] = $tmp['quantity'] * $tmp['price'];
				$this->Common_model->insert_record('order_details',$details);
				
				
				$quantityV['pid'] = $product;
				$quantityV['quantity'] = $tmp['quantity'];
				$quantityV['type'] = 'R';
				$quantityV['createdTime'] = date('Y-m-d H:i:s');
				$this->Common_model->insert_record('product_quantity',$quantityV);
				
			}			
		}
		
		if($couponcode){
			$couponV['coupon_id'] = $values['coupon_id'];
			$couponV['coupon_code'] = $couponcode;
			$couponV['oid'] = $orderid;
			$couponV['cid'] = get_customer_id();
			$couponV['createdTime'] = date('Y-m-d H:i:s');
			$this->Common_model->insert_record('coupon_usage',$couponV);
		}
		
		
		$redeemP = get_customer_loyalty_points(get_customer_id());
		if($redeemP){
			$loyalty['cid'] = get_customer_id();
			$loyalty['oid'] = $orderid;
			$loyalty['points'] = $redeemP;
			$loyalty['type'] = 'R';
			$loyalty['createdTime'] = date('Y-m-d H:i:s');
			$this->Common_model->insert_record('loyalty_points',$loyalty);
		}
		
		
		$loyalty['cid'] = get_customer_id();
		$loyalty['oid'] = $orderid;
		$loyalty['points'] = check_loyalty_points($totalAmt);
		$loyalty['type'] = 'A';
		$loyalty['createdTime'] = date('Y-m-d H:i:s');
		$this->Common_model->insert_record('loyalty_points',$loyalty);
		
		
		
		
		if($payment_mode == 'cod'){
			$this->session->set_flashdata('order_confirmation',true);		
			$url = base_url()."web/orderConfirmation";
			
			$this->session->set_userdata('cart','');	
			$this->session->set_userdata('coupon_discount','');
			$this->session->set_userdata('coupon','');
			
			
			//send sms
			$data['message'] = "Your MYCHEDI order ID is ".get_order_id($orderid)." for the purchase. Pay Rs.".number_format($totalAmt,2)." at the time of delivery";
			send_sms(get_customer_mobile(),$data['message']);
			//send sms
			
			
			//send email
			//$confirm['orderid'] = $orderid;
			//$confirm['totalAmt'] = number_format($totalAmt,2);
			//$message = $this->load->view('email/order_confirmation',$confirm,true);
			//send_email(get_customer_email(),"Order Confirmation",$message);
			//send email
		}else{
			
			$this->session->set_flashdata('order_confirmation',true);		
			$url = base_url()."web/orderConfirmation";
			$this->session->set_userdata('cart','');	
			$this->session->set_userdata('coupon_discount','');
			$this->session->set_userdata('coupon','');
		}
		
		echo json_encode(array('success'=>true,'redirect'=>$url));
		
		
	}
	
	public function orderConfirmation(){
		$data['content'] = 'web/order_confirmation';
		$this->load->view('web/template',$data);		
	}
	
	public function search(){
	
		$search = $_GET['search'];
		
		$search = preg_replace('~[^a-zA-Z0-9\s]+~', '', $search);
		
		$search = array_map('trim', explode(' ', $search));
	
		$sql = array();
		if(is_array($search) && !empty($search)){
			foreach($search as $tmp){	
				$sql[] = "product_name_english like '%$tmp%' or hashtag like '%$tmp%'";
			}
		}
		
		$sql = implode(" or ",$sql);
		$this->load->model('Web_model');
		$data['products'] = $this->Web_model->select_table('products',$sql);
		
		$data['content'] = 'web/search';
		$this->load->view('web/template',$data);	
	}
	
	/* its my code*/
	
	public function myaccount(){
		$data['content'] = 'web/myaccount';	
		$data['customer'] = $this->Common_model->get_record('customers','*',array('cid'=>get_customer_id()));
		$data['address'] = $this->Common_model->get_records('address','*',array('cid'=>get_customer_id(),'status'=>'0'));
		$this->load->view('web/template',$data);		
	}
	
	public function edit_address($id=""){
		$data['content'] = 'web/edit_address';	
		$data['address'] = $this->Common_model->get_record('address','*',array('cid'=>get_customer_id()));
		$data['city'] = $this->Common_model->get_records('delivery_city','*');
		$this->load->view('web/template',$data);		
	}

	public function update_address($id=""){
	
		if(!$id){
		$id=$this->input->post('id');
		$values['address_name']=$this->input->post('name');
		$values['house_no']=$this->input->post('house');
		$values['residential']=$this->input->post('residential');
		$values['street']=$this->input->post('street');
		$values['area']=$this->input->post('area');
		$values['city']=$this->input->post('city');
		$values['landmark']=$this->input->post('landmark');
		$values['default_address']='0';
		$this->Common_model->update_record('address',$values,array('cid'=>$id));
		
		redirect('web/myaccount');
		}
		else
		{
			$values['status']='2';
			$this->Common_model->update_record('address',$values,array('cid'=>$id));
			redirect('web/myaccount');
		}	
	}
	
	/* the end*/
	
	public function myorders(){
		$data['content'] = 'web/myorders';	
		$data['orders'] = $this->Common_model->get_records('orders','*',array('cid'=>get_customer_id()));
		$this->load->view('web/template',$data);		
	}
	
	public function order($oid){
		$data['content'] = 'web/order';	
		
		$data['order'] = $order = $this->Common_model->get_record('orders','*',array('oid'=>$oid,'cid'=>get_customer_id()));
		if(isset($order->oid)){
			$data['oid'] = $oid;			
			$this->load->model('Web_model');
			$data['details'] = $this->Web_model->get_order_details($order->oid);			
			$this->load->view('web/template',$data);		
		}else{
			redirect('index');			
		}	
		
	}
		
	public function change_password(){
		
		$where['cid'] = get_customer_id();
		$values['password'] = trim(strip_tags($this->input->post('password')));				
		
		$this->Common_model->update_record('customers',$values,$where);
			
		echo json_encode(array('success'=>true,'message'=>'Password updated successfully.'));		
	}
	
	public function change_contacts(){
		
		$email = trim(strip_tags($this->input->post('email')));			
		$mobile = trim(strip_tags($this->input->post('mobile')));			
		
		$where['cid'] = get_customer_id();
		$exists = $this->Common_model->get_record('customers','email,mobile',$where);
		
		
		if($exists->mobile <> $mobile){
			
			$values['mobile'] = $mobile;
			$values['otp'] = rand(100000,999999);
			$values['mobile_verified'] = 1;
			$this->Common_model->update_record('customers',$values,$where);
						
			//send sms			
			$message = "Your Mychedi One Time Password (OTP) for change your current mobile number is ".$values['otp'];
			send_sms($mobile,$message);
			//send sms
			
			echo json_encode(array('success'=>true,'message'=>"Verification OTP sent to ".$mobile,'type'=>'mobile'));		
			exit;
		}else{
			echo json_encode(array('success'=>false));		
			exit;
		}
		
	}
	
	public function change_mobile_otp(){
		
		$where['cid'] = get_customer_id();
		$where['otp'] = trim(strip_tags($this->input->post('otp')));
		
		$exists = $this->Common_model->get_record('customers','cid',$where);
			
		if(isset($exists->cid)){
			
			 $values['otp'] = "";
			 $values['mobile_verified'] = 0;
			 $this->Common_model->update_record('customers',$values,$where);
			
			echo json_encode(array('success'=>true,'message'=>""));		
			exit;
		}else{
			echo json_encode(array('success'=>false,'message'=>"OTP is not correct. Please check again"));		
			exit;
			
		}		
	}
}
