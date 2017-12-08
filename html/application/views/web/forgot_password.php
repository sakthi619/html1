<br>
     <br>
   <!--CHANGE-PASSWORD-AREA   -->
    <section class="password-change">
        <div class="container">
            <div class="row">
			
			  <div class="col-md-6 col-sm-6 col-xs-12 forget_password">
                <div class="headline">
                    <h2>Forgot Password</h2>
                </div>
                <div class="col-md-12 col-sm-6 col-xs-12">
                    <div class="change-form">
                        <form>
                             Email * <span id="error_email" class="error_class"></span>
                            <br>
                            <input type="text" id="email" class="required">
							<br>
							<center>(OR)</center>
                           Mobile * <span id="error_mobile" class="error_class"></span>
                            <br>
                       
                            <input type="text" id="mobile" class="required" onkeypress="return isNumberKey(event)">
                            <br>
                        </form>
                        <button type="button" class="btn btn-default reset_verify">Submit</button>
						<br>
						<span id="error_result" class="error_class"></span>
                    </div>
                </div>
            </div>
			
			  <div class="col-md-6 col-sm-6 col-xs-12 mobile_type">
                <div class="headline">
                    <h2>Enter OTP</h2>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="change-form">
                        <form>
						 
                           OTP * <span id="error_otp" class="error_class"></span>
                            <br>
                       
                            <input type="text" id="otp" class="required" onkeypress="return isNumberKey(event)">
                            <br>
                        </form>
                        <button type="button" class="btn btn-default check_otp">Submit</button>
						<br>
						<span id="error_result" class="error_class"></span>
                    </div>
                </div>
            </div>
			
			
            </div>
        </div>
    </section>
    <!-- CHANGE-PASSWORD-AREA:END -->
<style>
.error_class{
	color:red;
	font-size:12px;
}

.mobile_type{
	display:none;
}
</style>
<script>

function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
   
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
}

function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}
$(document).ready(function(){
	
	$(document).on("click",".check_otp",function(){
		
		if($("#otp").val() == ''){
			$("#error_otp").text("Please enter OTP");		
			return false;
		}
		
		
					$.ajax({
					  url: "<?php echo base_url();?>web/check_reset_otp",
					  type: "POST",
					  dataType: "json",
					  data: {
						otp: $("#otp").val(),
						mobile: $("#mobile").val()
					  },
					  success: function( data ) {
						if(data.success){
							window.location.href = "<?php echo base_url();?>resetPassword";							
						}else{
							$("#error_otp").text(data.message);		
						}
					  }
					});
		
		
	});
	
	$(".reset_verify").click(function(){
			
			if($(".reset_verify").html() == 'Submitting...')
				return false;
		
		
				req = true;
		
				if($("#email").val() == '' && $("#mobile").val() == ''){
					$("#error_email").text("Please enter email or mobile");		
					req = false;
				}
			
			
				if($("#email").val() != '' && !validateEmail($("#email").val())){
					$("#error_email").text("Please enter valid email");
					req = false;
				}
		
			
			if(req == true){
				$(".reset_verify").html('Submitting...');
				
					$.ajax({
					  url: "<?php echo base_url();?>web/send_pass_verification",
					  type: "POST",
					  dataType: "json",
					  data: {
						email: $("#email").val(),
						mobile: $("#mobile").val()
					  },
					  success: function( data ) {
						if(data.success){
							
							if(data.type == 'email'){									
								$("#error_email").text(data.message);	
								$("#email").val("");								
							}
							if(data.type == 'mobile'){
								$(".forget_password").hide();		
								$(".mobile_type").show();		
								$("#error_otp").text(data.message);		
							}
							
							$(".reset_verify").html('Submit');
							
						}else{
							
							$("#error_email").text(data.message);		
							
							$(".reset_verify").html('Submit');
						}
					  }
					});
				
			}
		
		
	});
	
	
	$(".required").keypress(function(){
				
		id = $(this).attr("id");
		
		if($(this).val() == ""){
			
		}else{
			$("#error_"+id).text("");
		}
		
	});
	
});
</script>