<h2><?php echo get_lang('Products'); ?><span>Total</span></h2>
<?php
$total = array();
if(isset($cart) && !empty($cart)){
	
	foreach($cart as $tmp){
?>
<p><?php echo $tmp['productname'];?><?php echo get_lang('x'); ?> <?php echo $tmp['quantity'];?>
<span><?php echo get_lang('Rs');?><?php echo $tmp['quantity'] * $tmp['price'];?></span>
</p>
<?php 
	$total[] = $tmp['quantity'] * $tmp['price'];
	}

?>

<hr>

<h5><?php echo get_lang('Order Total Price'); ?><span><?php echo get_lang('Rs');?><?php echo array_sum($total);?></span></h5>
<?php
}
?>