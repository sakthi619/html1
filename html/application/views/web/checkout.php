<section class="check-contact section-padding">
        <div class="container">
            <div class="row">
			
			   <div class="col-md-7 col-sm-7 col-xs-12">
			   <div class="accordion">
			   
  <div class="item">
    <div class="heading">1 . <?php echo get_lang('login'); ?></div>
    <div class="content">
								<div class="mail-left">
								<?php if(!logged_in()){?>
                                    <form>
                                       <?php echo get_lang('Email');?> * <span id="error_email" class="error_class"></span>
                                        <br>
                                        <input type="text" id="email" class="required">
                                        <br><?php echo get_lang('Password');?> * <span id="error_password" class="error_class"></span>
                                        <br>
                                        <input type="password" id="password" class="required">
										  <div class="mail-btn">
                                        <button type="button" class="btn btn-default checkout_login"><?php echo get_lang('Sign_In');?></button>
                                        <a href="<?php echo base_url()?>signup/?redirect=checkout" style='width:80px;'><?php echo get_lang('New_User');?>?</a>
										<a href="<?php echo base_url()?>forgotPassword"><?php echo get_lang('Forgot_password');?>?</a>
                                    </div>
                                    </form>
									
                                <?php }else{ ?>  
									<center><h4><?php echo get_lang('Welcome');?></h4></center><br>
								<?php } ?>
                                </div>
	
	</div>
  </div>
  
  <div class="item <?php if(!logged_in()){?> guest <?php } ?>">
    <div class="heading">2. <?php echo get_lang('Delivery_Address');?></div>
    <div class="content" >
	<div class="row">
                <div class="col-md-12 col-sm-6 col-xs-12">
             
                    <div class="billing">
                        <div class="bill-tow">
						
							<?php 
							if(logged_in()){
								$address = get_customer_address();
								if(isset($address) && !empty($address)){
									foreach($address as $tmp){
										$addressArr = array();
										$addressArr[] = $tmp->house_no;
										$addressArr[] = $tmp->residential;										
										$addressArr[] = $tmp->street;
										$addressArr[] = $tmp->landmark;
										$addressArr = array_filter($addressArr);
										
							?>							
                            <div class="bill-left address_list">							
                                <input type="checkbox" class="exist_address" value="<?php echo $tmp->aid; ?>" id="address_id"><?php echo $tmp->address_name; ?>  
								<br>
								<?php echo implode(",<br>",$addressArr);?>
                            </div> 
							<?php	
									}
								}
							}
							?>
							
							<div class="bill-left exist_add">
							
                                <input type="text" class="address_required  form-control" id="address_name" placeholder="Address name">
                                <span class="error_class" id="error_address_name"></span>
                            
                            </div>
							
                            <div class="bill-right exist_add">
							
                                <input type="text" id="house_no" class="address_required form-control" placeholder="House No">
								<span class="error_class" id="error_house_no"></span>
                          
                            </div>
                        </div>
                        <div class="bill-single exist_add">
                            
                            
                                <input type="text" id="address" class="address_required form-control" placeholder="Address">
								<span class="error_class" id="error_address"></span>
                           
                           
                                <input type="text" id="residential" class="form-control" placeholder="Residential Complex">
                           
								<input type="text" id="area" class="address_required form-control" placeholder="Area">
								<span class="error_class" id="error_area"></span>
						   
                                <select id="city" class="address_required form-control">
								<?php
								if(isset($cities) && !empty($cities)){
									foreach($cities as $tmp){
								?>
									<option value='<?php echo $tmp->city_id;?>'><?php echo $tmp->name;?></option>
								<?php		
									}
								}
								?>
								</select>
								<span class="error_class" id="error_city"></span>
								
                           
                        </div>
                        <div class="bill-tow exist_add">
                           <!-- <div class="bill-left">
                                <form>
                                <input type="text" name="name" placeholder="Postcode">
                            </form>
                            </div>-->
                            <div class="bill-right">
                              
                                <input type="text" id="landmark" class="exist_add form-control" placeholder="Landmark">
                          
                            </div>
                        </div>
                        <div class="bill-text exist_add">
                        <input type="checkbox" id="default" class="" value="1"> <?php echo get_lang('Make_this_address_as_default'); ?>
                        </div>
                    </div>
					<div class="clear"></div>
					<button type="button" class="btn btn-default pull-right next_summary"><?php echo get_lang('Next'); ?></button>
					<div style="clear:both;height:25px;display:table;">
					
					</div>
                </div>
               
                <div style="clear:both;margin-bottom:15px;"></div>
            </div>
	
	</div>
  </div>
  <div class="item <?php if(!logged_in()){?> guest <?php } ?>">
    <div class="heading">3.<?php echo get_lang('Delivery_Options'); ?></div>
    <div class="content">
	 <section class="bill-ship section-padding">
        <div class="container">
            <div class="row">
			 <div class="col-md-3 col-sm-6 col-xs-12">
                  <div class="bill-single">                            
                            
								<select id="delivery_date" class="form-control">
								<?php 
								for($i = 0; $i <= 5; $i++){
									echo "<option>".date('d-m-Y',strtotime('+'.$i.' days'))."</option>";								
								}
								?>
								</select>								
								<span class="error_class" id="error_delivery_date"></span>
                           
                                <select id="delivery_time" class="form-control">
								<?php
								if(isset($time) && !empty($time)){
									foreach($time as $tmp){
								?>
									<option value='<?php echo $tmp->tid;?>'><?php echo $tmp->time_slot;?></option>
								<?php		
									}
								}
								?>
								</select>
								<span class="error_class" id="error_delivery_time"></span>
                            </form>
                        </div>
                    
                </div>
				
				
			</div>
			<div class="row">
			
			<div class="clear"></div>
				<div class="col-md-3 col-sm-6 col-xs-12">
				<button type="button" class="btn btn-default pull-left back_address"><?php echo get_lang('Back'); ?></button>
				 </div>	
				 <div class="col-md-3 col-sm-6 col-xs-12">
				 <button type="button" class="btn btn-default pull-right next_payment"><?php echo get_lang('Next'); ?></button>
				 </div>
			</div>
	</div>
	</section>
	</div>
  </div>
  <div class="item <?php if(!logged_in()){?> guest <?php } ?>">
    <div class="heading">4.<?php echo get_lang('Payment_Option'); ?></div>
    <div class="content">
	<section class="payment-area">
        <div class="container">
            <div class="row">
                 <div class="col-md-3 col-sm-6 col-xs-12">
                  <div class="bill-single">                            
                            
								<input type="text" id="coupon" placeholder="Coupon Code" style="text-transform: uppercase;">	
								<a id="coupon_apply"><?php echo get_lang('Apply'); ?></a>								
								<a id="coupon_remove" style="display:none;"><?php echo get_lang('Remove'); ?></a>								
                            
                        </div>
                    
                </div>
				<div class="col-md-3 col-sm-6 col-xs-12">
						<div class="bill-single">                            
                           <span class="error_class" id="coupon_error"></span>
                        </div>
                    
                </div>
			</div>
			
			<div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="headline">
                        <h2><?php echo get_lang('Select_Payment_Mode'); ?></h2>
                    </div>
                    <div class="payment">
                    
                    <div class="bank-radio">
                        <label>
                            <input type="radio" name="payment_mode" class="payment_mode" value="cod"><?php echo get_lang('Cash_On_Delivery'); ?></label>
                        <br/>
                       <!-- <label>
                            <input type="radio" name="payment_mode" class="payment_mode" value="net">Paypal<img src="<?php echo base_url()?>site/web/images/master-card.png" alt="">
                        </label><br/>-->
                        <button type="button" class="btn btn-default right-cart place_order"><?php echo get_lang('Place_order'); ?></button>
                    </div>
					</div>
				</div>
			</div>
        </div>
    </section>
	
	</div>
  </div>
</div>


 
			   </div>
			
			
			<?php if(logged_in()){?>
              
                <div class="col-md-5 col-sm-5 col-xs-12">
                    <div class="headline">
                        <h2><?php echo get_lang('Order_summary'); ?></h2>
                    </div>
                   <div class="summary">
                        <h2><?php echo get_lang('Products'); ?><span><?php echo get_lang('Total'); ?></span></h2>
						<?php 
						$total = array();
						$offerAmount = 0;
						if(isset($cart) && !empty($cart)){
							foreach($cart as $tmp){
						?>
                       <p><?php echo $tmp['productname'];?><?php echo get_lang('x'); ?> <?php echo $tmp['quantity'];?>
						<span><?php echo get_lang('Rs'); ?><?php echo $tmp['quantity'] * $tmp['price'];?></span>
						</p>
						<?php		
							$total[] = $tmp['quantity'] * $tmp['price'];
							}
							
							$offerAmount = check_offer(array_sum($total));
						}
						?>
						
                        <h3 class="line"><?php echo get_lang('Cart subtotal'); ?><span><?php echo get_lang('Rs'); ?><span class="subtotal_amt"><?php echo number_format(array_sum($total),2);?></span></span></h3>
                        <h3 class="line2"><?php echo get_lang('Offer'); ?><span class="mcolor"><?php echo get_lang('Rs'); ?><span class="offer_amt"><?php echo $offerAmount;?></span></span></h3>
						
						<?php 
						$shipping = check_delivery_charge(array_sum($total));
						$couponAmt = $this->session->userdata('coupon_discount');
						if($couponAmt){							
						?>
						
                        <h3 class="line2 coupon_li" style="line-height:10px;"><?php echo get_lang('Coupon_Discount'); ?><span class="mcolor"><?php echo get_lang('Rs') ?><span class="coupon_amt"><?php echo number_format($couponAmt,2);?></span></span></h3>
						
						<?php }else{ ?>
						
						<h3 class="line2 coupon_li" style="line-height:10px; display:none;"><?php echo get_lang('Coupon_Discount'); ?><span class="mcolor"><?php echo get_lang('Rs') ?><span class="coupon_amt"></span></span></h3>
						
						<?php } ?>
						
                        <h3 class="line2"><?php echo get_lang('Shipping'); ?><span class="mcolor"><?php echo get_lang('Rs'); ?><span class="shipping_amt"><?php echo number_format($shipping,2);?></span></span></h3>
						
                        <h3 class="line2"><?php echo get_lang('Redeem_Loyaty_Points'); ?> (<?php echo get_customer_loyalty_points(get_customer_id());?>)<span class="mcolor"><span class=""><?php echo $redeem = get_loyalty_redeem_amount() * get_customer_loyalty_points(get_customer_id());?></span></span></h3>
						
                        <h5><?php echo get_lang('Order_Total_Price'); ?>
						<span><?php echo get_lang('Rs'); ?>
						<span class="final_amt">
						<?php 
						$totalAmt = array_sum($total)-($offerAmount+$couponAmt)+$shipping-$redeem;
						echo number_format($totalAmt,2);
						?>
						</span></span>
						</h5>
						
						
						<h3 class="line2"><?php echo get_lang('Loyaty_Points'); ?><span class="mcolor"><span class=""><?php echo check_loyalty_points($totalAmt);?></span></span></h3>

                    </div>
                </div>
				
			<?php  } ?>

			
				
            </div>
        </div>
    </section>
<style>
.error_class{
	color:red;
	font-size:12px;
}

#coupon_apply, #coupon_remove{
	cursor:pointer;
}

.form-control, .form-control:focus{
	border:1px solid #000 !important;
	margin-bottom:10px;	
	margin-top:10px;	
}
</style>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>site/admin/jquery-ui.css" media="screen" />
<script type="text/javascript" src="<?php echo base_url();?>site/admin/jquery-ui.js"></script>

<script>
function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}
$('.accordion .item .heading').click(function() {
		
	/*var a = $(this).closest('.item');
	var b = $(a).hasClass('open');
	var c = $(a).closest('.accordion').find('.open');
		
	if(b != true) {
		$(c).find('.content').slideUp(200);
		$(c).removeClass('open');
	}

	$(a).toggleClass('open');
	
	if(a.hasClass('guest')){
		$("#email").focus();
	}else{	
		$(a).find('.content').slideToggle(200);
	}*/
	
	

});
$(".accordion .item:eq(0)").find('.content').slideToggle(200);

<?php if(logged_in()){?>
$(".accordion .item:eq(1)").toggleClass('open');
$(".accordion .item:eq(1)").find('.content').slideToggle(200);
<?php } ?>



$(document).ready(function(){
	
	
	/*$(document).on("change","#city",function(){
		
				$.ajax({
				  url: "<?php echo base_url();?>web/get_area_for_city",
				  type: "POST",
				  data: {
					city: $(this).val()
				  },
				  success: function( data ) {
					$("#area").html(data);
				  }
				});
		
	});*/
	
	//$("#city").trigger("change");
	
	$(document).on("change",".exist_address",function(){
				
		$('.exist_address').not(this).prop('checked', false);  
		
		if($(".exist_address").is(":checked")){
			$(".exist_add").hide();
		}else{
			$(".exist_add").show();
		}
		
	});
	
	$(document).on("click",".place_order",function(){
		
			if($(".place_order").text() == 'Submitting...')
				return false;
		
		
			if($(".payment_mode").is(":checked")){		
			
				payment_mode = $(".payment_mode:checked").val();
				
				//address
				address_id = $(".exist_address:checked").val();
				address_name = $("#address_name").val();
				house_no = $("#house_no").val();
				address = $("#address").val();
				residential = $("#residential").val();
				area = $("#area").val();
				landmark = $("#landmark").val();
				default_address = $("#default:checked").val();
				//address
				
				//delivery
				delivery_date = $("#delivery_date").val();
				delivery_time = $("#delivery_time").val();							
				//delivery
			
				$(".place_order").text("Submitting...");
				
				
					$.ajax({
					  url: "<?php echo base_url();?>web/place_order",
					  type: "POST",
					  dataType: "json",
					  data: {
						payment_mode: payment_mode,
						address_id: address_id,
						address_name: address_name,
						house_no: house_no,
						address: address,
						residential: residential,
						area: area,
						landmark: landmark,
						default_address: default_address,
						delivery_date: delivery_date,
						delivery_time: delivery_time
					  },
					  success: function( data ) {
						if(data.success){
							window.location.href = data.redirect;
						}else{
							
						}
					  }
					});
				
				
				
			}else{
				alert("Please select the payment method");
			}
			
			
		
	});
	
	
	
	$("#delivery_date").datepicker({  maxDate: 5,  minDate: 0  });
	
	$(document).on("click",".next_payment",function(){
		
		if($("#delivery_date").val() == ""){
			$("#error_delivery_date").text("This field is required");
		}else{
			var a = ".accordion .item:eq(3)";
			var c = $(a).closest('.accordion').find('.open');
			$(c).find('.content').slideUp(200);
			$(c).removeClass('open');
			
			$(a).toggleClass('open');
			$(a).find('.content').slideToggle(200);			
		}	
		
		
	});
	
	$(document).on("click",".back_address",function(){
				var a = ".accordion .item:eq(1)";
				var c = $(a).closest('.accordion').find('.open');
				$(c).find('.content').slideUp(200);
				$(c).removeClass('open');
				
				$(a).toggleClass('open');
				$(a).find('.content').slideToggle(200);
	});
	
	$(document).on("click",".next_summary",function(){
		
			check = true;
			
			if(!$(".exist_address").is(":checked")){
		
			$(".address_required").each(function(){
				
				id = $(this).attr("id");
				
				if($(this).val() == ""){
					$("#error_"+id).text("This field is required");
					check = false;
				}else{
					$("#error_"+id).text("");
				}
				
			});
			
			}
			
			if(check == true){
				var a = ".accordion .item:eq(2)";
				var c = $(a).closest('.accordion').find('.open');
				$(c).find('.content').slideUp(200);
				$(c).removeClass('open');
				
				$(a).toggleClass('open');
				$(a).find('.content').slideToggle(200);
			}
			
		
	});
	
	$(".address_required").keypress(function(){
		
				id = $(this).attr("id");
				
				if($(this).val() == ""){
					//$("#error_"+id).text("This field is required");
				}else{
					$("#error_"+id).text("");
				}
				
	});
	
	
	$(document).on("click",".checkout_login",function(){
		
			if($(".checkout_login").html() == 'Signing in...')
				return false;
		
			req = true;
		
			$(".required").each(function(){
				
				id = $(this).attr("id");
				
				if($(this).val() == ""){
					$("#error_"+id).text("This field is required");
					req = false;
				}else{
					$("#error_"+id).text("");
				}
				
			});
			
			if(req == true){
				if(!validateEmail($("#email").val())){
					$("#error_email").text("Please enter valid email");
					req = false;
				}
			}
			
			
			if(req == true){
				$(".checkout_login").html('Signing in...');
				
					$.ajax({
					  url: "<?php echo base_url();?>web/login_check",
					  type: "POST",
					  dataType: "json",
					  data: {
						email: $("#email").val(),
						password: $("#password").val()
					  },
					  success: function( data ) {
						if(data.success){
							//$(".accordion .item:eq(1)").find('.content').slideToggle(200);
							window.location.href = "<?php echo base_url()?>web/checkout";
						}else{
						
							$("#error_email").text(data.error.result);
						
							$(".checkout_login").html('Sign In');
						}
					  }
					});
				
			}
		
	});
	
	$(".required").keypress(function(){
				
		id = $(this).attr("id");
		
		if($(this).val() == ""){
			$("#error_"+id).text("This field is required");
		}else{
			$("#error_"+id).text("");
		}
		
	});
	
	
	$(document).on("click","#coupon_remove",function(){
			
			
			$.ajax({
			  url: "<?php echo base_url();?>web/remove_coupon",
			  type: "POST",
			  dataType: "json",
			  data: {
				
			  },
			  success: function( data ) {
				if(data.success){
					
					$(".coupon_li").hide();
					
					$(".coupon_amt").text('0');					
					
					subtotal = $(".subtotal_amt").text();
					offer = $(".offer_amt").text();
					shipping = $(".shipping_amt").text();
					
					finalAmt = parseFloat(subtotal) - parseFloat(offer) + parseFloat(shipping) ;
					
					$(".final_amt").text(finalAmt.toFixed(2));
					
					$("#coupon_error").text(data.message);
					
					$("#coupon_remove").hide();
					$("#coupon_apply").show();
					
					$("#coupon").removeAttr("readonly");
					
					$("#coupon").val("");
					
				}
			  }
			});
	});
	
	$(document).on("click","#coupon_apply",function(){
		
			coupon = $("#coupon").val();
 
			$.ajax({
			  url: "<?php echo base_url();?>web/check_coupon",
			  type: "POST",
			  dataType: "json",
			  data: {
				coupon: coupon
			  },
			  success: function( data ) {
				if(data.success){
					
					$(".coupon_li").show();
					
					$(".coupon_amt").text(data.discount);					
					
					subtotal = $(".subtotal_amt").text();
					offer = $(".offer_amt").text();
					shipping = $(".shipping_amt").text();
					
					finalAmt = parseFloat(subtotal) - (parseFloat(data.discount)+parseFloat(offer)) + parseFloat(shipping);
					
					$(".final_amt").text(finalAmt.toFixed(2));
					
					$("#coupon_error").text(data.message);
					
					$("#coupon_remove").show();
					$("#coupon_apply").hide();
					
					$("#coupon").attr("readonly",true);
					
				}else{
					$("#coupon_error").text(data.message);
				}
			  }
			});
			
	});
	
});

</script>