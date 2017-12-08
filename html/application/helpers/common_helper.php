<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


function get_order_id($id){
	return "MYCHEDI".sprintf("%05d",$id);
}

function adminid(){
	$CI = get_instance();
	$adminid = $CI->session->userData('mychedi_admin_id');
	if($adminid)
		return $adminid;
	else
		return false;
}

function get_customer_id(){
	$CI = get_instance();	
	return $CI->session->userdata('mychedi_cid');
}
function get_customer_name($id=""){	
	$CI = get_instance();
    $CI->load->model("common_model");
	if(!$id) {
	$id = $CI->session->userdata("mychedi_cid");	
	}
	$data = $CI->common_model->get_record("customers","firstname",array("cid"=>$id));
	return $data->firstname;	
}

function logged_in(){
	$CI = get_instance();	
	return $CI->session->userdata('mychedi_user_logged_in');
}

function get_product_quantity($pid){
	$CI = get_instance();
	$CI->load->model('Web_model');

	$quantity = $CI->Web_model->get_product_quantity($pid);
	
	return $quantity->added - $quantity->removed;
	
}

function get_product_image($pid){
	$CI = get_instance();
	$CI->load->model('Common_model');

	$image = $CI->Common_model->get_record('product_images','image_1',array('pid'=>$pid));
	if(isset($image->image_1)){
		return base_url()."site/products/".$image->image_1;		
	}else{
		return base_url()."site/web/no-image.png";		
	}	
}

function get_lang($key){
	$CI = get_instance();

	return $CI->lang->line($key, FALSE);	
}

function lang(){
	$CI = get_instance();

	if($CI->session->userdata('lang') == 'ta'){
		return "tamil";
	}else if($CI->session->userdata('lang') == 'en'){
		return "english";
	}
	
}

function get_customer_address($cid = ''){
	$CI = get_instance();
	if(!$cid){
		$cid = $CI->session->userdata('mychedi_cid');
	}
	$CI->load->model("Web_model");	
	return $address = $CI->Web_model->get_customer_address($cid);	
	//return $address = $CI->Common_model->get_records('address','*',array('cid'=>$cid,'status'=>0));	
}

function check_offer($amount){
	$CI = get_instance();
    $CI->load->model("Web_model");	
	$offer = $CI->Web_model->get_todays_offer($amount);
	if(isset($offer->type)){
		
		if($offer->type == 1){
			return $offer->offer_val;
		}else{
			return ($amount * $offer->offer_val)/100;
		}			
		
	}else{
		return 0;
	}
}

function check_delivery_charge($amount){
	$CI = get_instance();
    $CI->load->model("Common_model");	
	$shipping = $CI->Common_model->get_record('delivery_settings');
	if(isset($shipping->delivery_charge) && $shipping->delivery_charge == 'yes'){
		
		if($shipping->delivery_limit == 'yes'){
			
			if($shipping->delivery_minimum > $amount){
				return $shipping->delivery_amount;
			}else{
				return 0;
			}			
		}else{
			return $shipping->delivery_amount;
		}			
		
	}else{
		return 0;
	}
}

function check_loyalty_points($amount){
	$CI = get_instance();
    $CI->load->model("Common_model");	
	$loyalty = $CI->Common_model->get_record('loyalty_settings');
	if(isset($loyalty->loyalty) && $loyalty->loyalty == 'yes'){
				
		return round($amount/$loyalty->point_amount);
	}else{
		return 0;
	}
}

function get_customer_loyalty_points($cid){
	$CI = get_instance();
    $CI->load->model("Web_model");	
	$loyalty = $CI->Web_model->customer_loyalty_points($cid);
	if(isset($loyalty->added)){
		return $loyalty->added - $loyalty->remove;
	}else{
		return 0;
	}
}

function get_loyalty_redeem_amount(){
	$CI = get_instance();
    $CI->load->model("Common_model");	
	$loyalty = $CI->Common_model->get_record('loyalty_settings');
	if(isset($loyalty->point_redeem)){
		return $loyalty->point_redeem;
	}else{
		return 0;
	}
}

function coupon_code(){
	$characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < 8; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}


function send_email($email,$subject,$message){
	
		$CI = get_instance();
		
		//Mail
		$CI->load->library('email');

		$CI->email->initialize(array(
		  'protocol' => 'smtp',
		  'smtp_host' => 'smtp.sendgrid.net',
		  'smtp_user' => 'rajasekarsirs',
		  'smtp_pass' => 'Pass@12#',
		  'smtp_port' => 2525,
		  'crlf' => "\r\n",
		  'newline' => "\r\n"
		));

		$CI->email->from('contact@mychedi.com', 'MYCHEDI');
		$CI->email->to($email);
		$CI->email->subject($subject);
		$CI->email->set_mailtype("html");
		$CI->email->message($message);
		$CI->email->send();		
		//Mail
		
}

function check_coupon_usage($cid,$coupon){
	$CI = get_instance();
    $CI->load->model("Common_model");
	$coupon = $CI->Common_model->get_record('coupon_usage','coupon_id',array('coupon_code'=>$coupon,'cid'=>$cid));
	if(isset($coupon->coupon_id))
		return $coupon->coupon_id;
	else	
		return 0;
}

function check_offer_id($amount){
	$CI = get_instance();
    $CI->load->model("Web_model");	
	$offer = $CI->Web_model->get_todays_offer($amount);
	if(isset($offer->type)){
		
		
		return $offer->offer_id;
				
		
	}else{
		return 0;
	}
}

function generate_verififation($length = 32){
	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function get_coupon_id($coupon){
	$CI = get_instance();
    $CI->load->model("Common_model");
	$coupon = $CI->Common_model->get_record('coupons','coupon_id',array('code'=>$coupon));
	if(isset($coupon->coupon_id))
		return $coupon->coupon_id;
	else	
		return 0;
}

function get_product_tax($pid){
	$CI = get_instance();
    $CI->load->model("Common_model");
	$product = $CI->Common_model->get_record('products','tax',array('pid'=>$pid));
	if(isset($product->tax))
		return $product->tax;
	else	
		return 0;
}

function send_sms($number, $message){

	$ch = curl_init();

	curl_setopt($ch, CURLOPT_URL, "http://smsmsg.celladpay.com/api/sendhttp.php?authkey=164405AmHK99sW5960c763&mobiles=$number&message=$message&sender=MYCHED&route=4&country=91");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

	$result = curl_exec($ch);

	curl_close ($ch);
}
function get_customer_mobile($cid = ''){
	$CI = get_instance();
    $CI->load->model("Common_model");
	
	if(!$cid){
		$cid = get_customer_id();
	}
	
	$customer = $CI->Common_model->get_record('customers','mobile',array('cid'=>$cid));
	if(isset($customer->mobile))
		return $customer->mobile;
	else	
		return 0;
}

function get_city($id){
	$CI=get_instance();
	$CI->load->model("common_model");
	$data=$CI->load->common_model->get_record('delivery_city','name',array('city_id'=>$id));
	return $data->name;
}
