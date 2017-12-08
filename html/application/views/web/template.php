<?php
//$data['categories'] = $this->Common_model->get_records('categories','*',array('status'=>0,'parent_id'=>0));

$data['cart'] = $where['cart'] = $this->session->userdata('cart');
$data['list'] = $this->load->view('web/ajax_cart',$where,true);

$this->load->view('web/include/header.php',$data);
$this->load->view($content);
$this->load->view('web/include/footer.php');

