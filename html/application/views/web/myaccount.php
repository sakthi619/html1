<br>
     <br>
   <!--CHANGE-PASSWORD-AREA   -->
    <section class="password-change">
        <div class="container">
            <div class="row">
			
			  <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="headline">
                    <h2><?php echo get_lang('my_account'); ?></h2>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="change-form change_form">
                        <form>
                             <?php echo get_lang('Email'); ?> * <span id="error_email" class="error_class"></span>
                            <br>
                            <input type="text" id="email" class="required" value="<?php echo $customer->email; ?>" readonly>
                            <br>  <?php echo get_lang('Mobile'); ?> * <span id="error_mobile" class="error_class"></span>
                            <br>
                       
                            <input type="text" id="mobile" class="required" onkeypress="return isNumberKey(event)" value="<?php echo $customer->mobile; ?>">
                            <br>
                        </form>
						<?php if($customer->mobile_verified == 0){ ?>
                        <button type="button" class="btn btn-default update_account"><?php echo get_lang('Update'); ?></button>
						<?php }else{ ?>
                        <button type="button" class="btn btn-default verify_mobile"><?php echo get_lang('Verify_Mobile'); ?></button>
						<?php } ?>
						<br>
						<span id="error_result" class="error_class"></span>
                    </div> 
					
					<div class="change-form change_mobile">
                        <form>
                             <?php echo get_lang('OTP'); ?> * <span id="error_otp" class="error_class"></span>
                            <br>
                            <input type="text" id="otp" class="orequired"  onkeypress="return isNumberKey(event)">
                            <br> 
                        </form>
                        <button type="button" class="btn btn-default update_account_otp"><?php echo get_lang('Update'); ?></button>
						<br>
						<span id="error_result" class="error_class"></span>
                    </div>
					
                </div>
            </div>
			
			  <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="headline">
                    <h2><?php echo get_lang('Change_Password'); ?>Change Password</h2>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="change-form">
                        <form>
                             <?php echo get_lang('New_Password '); ?>New Password * <span id="error_password" class="error_class"></span>
                            <br>
                            <input type="password" id="password" class="prequired">
                            <br><?php echo get_lang('Confirm_Password'); ?> Confirm Password * <span id="error_confirm" class="error_class"></span>
                            <br>
                       
                            <input type="password" id="confirm" class="prequired">
                            <br>
                        </form>
                        <button type="button" class="btn btn-default update_password"><?php echo get_lang('Change');?></button>
						<br>
						<span id="error_result_pass" class="error_class"></span>
                    </div>
                </div>
            </div>
			
            </div>
			  <h2>Address</h2>
			<div class="table-responsive" style="margin-bottom:150px">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="cart-product item">Name</th>
                                <th class="cart-product-name item">House No</th>
                                <th class="cart-qty item">Residential</th>
                                <th class="cart-unit item">Street</th>
                                <th class="cart-sub-total last-item">Area</th>
                                <th class="cart-romove item">City</th>
                                <th class="cart-romove item">Landmark</th>
                                <th class="cart-romove item">Edit/Delete</th>
                            </tr>
                        </thead>
                        <!-- /thead -->                    
                        <tbody>
                           <?php
							$total = array();
							if(isset($address) && !empty($address)){
							
							 foreach($address as $tmp){?>
							<tr>
                                <td class="cart-product-sub-total"><?php echo ucfirst($tmp->address_name);?></td>
                                <td class="cart-product-sub-total"> <?php echo ucfirst($tmp->house_no);?></td>
                                <td class="cart-product-sub-total"><?php echo ucfirst($tmp->residential);?> </td>
                                <td class="cart-product-sub-total"><?php echo ucfirst($tmp->street);?></td>
                                <td class="cart-product-sub-total"><?php echo ucfirst($tmp->area);?></td>
                                <td class="cart-product-sub-total"><?php echo ucfirst(get_city($tmp->city));?></td>
                                <td class="cart-product-sub-total"><?php echo ucfirst($tmp->landmark);?></td>
                       <td><a href="<?php echo base_url()?>web/edit_address/<?php echo $tmp->aid;?>" class="fa fa-pencil"> Edit</a> | <a href="<?php echo base_url()?>web/update_address/<?php echo $tmp->aid;?>" class="fa fa-trash delete"> Delete</a></td>
							</tr>
							 <?php } }else{
							?>
							<tr>
								<td colspan="8"><center><h2>No Record</h2></center></td>
							</tr>
							<?php } ?>
                           
                        </tbody>

                        <!-- /tbody -->
                    </table>
                    <!-- /table -->
                </div>
        </div>
    </section>
	
	
    <!-- CHANGE-PASSWORD-AREA:END -->
<style>
.error_class{
	color:red;
	font-size:12px;
}
.change_mobile{
	display:none;
}
</style>
<script>
function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}
function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
   
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
}
$(document).ready(function(){
	
	$(".update_account_otp").click(function(){
			
				if($("#otp").val() == ""){
					$("#error_otp").text("This field is required");
					return false;
				}
				
				
					$(".update_account_otp").html('Submitting...');
				
					$.ajax({
					  url: "<?php echo base_url();?>web/change_mobile_otp",
					  type: "POST",
					  dataType: "json",
					  data: {
						otp: $("#otp").val()
					  },
					  success: function( data ) {
						if(data.success){
							window.location.href = "";
						}else{
							
						}
					  }
					});
				
				
	});
	
	$(".verify_mobile").click(function(){
		$(".change_form").hide();
		$(".change_mobile").show();
	});
	
	$(".update_password").click(function(){
		
			if($(".update_password").html() == 'Submitting...')
				return false;
		
			req = true;
		
			$(".prequired").each(function(){
				
				id = $(this).attr("id");
				
				if($(this).val() == ""){
					$("#error_"+id).text("This field is required");
					req = false;
				}else{
					$("#error_"+id).text("");
				}
				
			});
			
			
			if($("#password").val() != $("#confirm").val()){
				$("#error_password").text("Passwords are not same");
				req = false;
			}
			
			
			if(req == true){
				
					$(".update_password").html('Submitting...');
				
					$.ajax({
					  url: "<?php echo base_url();?>web/change_password",
					  type: "POST",
					  dataType: "json",
					  data: {
						password: $("#password").val()
					  },
					  success: function( data ) {
						if(data.success){
							$(".update_password").html('Change');
							$("#password").val("");
							$("#confirm").val("");
							$("#error_result_pass").html(data.message);
						}else{
							
						}
					  }
					});
				
			}
		
	});
	
	$(".update_account").click(function(){
			
			if($(".update_account").html() == 'Submitting...')
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
				$(".update_account").html('Submitting...');
				
					$.ajax({
					  url: "<?php echo base_url();?>web/change_contacts",
					  type: "POST",
					  dataType: "json",
					  data: {
						mobile: $("#mobile").val()
					  },
					  success: function( data ) {
						if(data.success){
				
							if(data.type == 'mobile'){
								$(".error_mobile").text(data.message);
								
								$(".change_form").hide();
								$(".change_mobile").show();
							}
							
							$(".update_account").html('Update');
						}else{
							
							$(".update_account").html('Update');
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
	
});
</script>