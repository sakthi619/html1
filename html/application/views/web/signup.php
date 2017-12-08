<br>
     <br>
    <!-- CHANGE-PASSWORD-AREA   -->
    <section class="password-change">
        <div class="container">
            <div class="row">
				<!--<div class="col-md-6 col-sm-6 col-xs-12">
                <div class="headline left-arrow">
                    <h2>SIGN IN</h2>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="change-form">
                        <form method="post" action="<?php echo base_url()?>web/login_check">
                             Email Address * 
                            <br>
                            <input type="text">
                            <br> Password
                            <br>
                       
                            <input type="text">
                            <br>
                        
                        <button type="submit" class="btn btn-default">Sign In</button>
						</form>
                    </div>
                </div>
            </div>-->
			<div class="col-md-6 col-sm-6 col-xs-12">
                <div class="headline">
                  <h2><?php echo get_lang('sign_up'); ?></h2>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="change-form">
                        <form>
                             <?php echo get_lang('First_Name'); ?> * <span id="error_firstname" class="error_class"></span>
                            <br>
                            <input type="text" name="firstname" id="firstname" class="required">
                            <br> <?php echo get_lang('Last_Name'); ?>* <span id="error_lastname" class="error_class"></span> 
                            <br>
                       
                            <input type="text" name="lastname" id="lastname" class="required">
                            <br>
							 <?php echo get_lang('Email_Address'); ?>* <span id="error_email" class="error_class"></span> 
                            <br>
                            <input type="email" name="email" id="email" class="required">
							 <?php echo get_lang('Password'); ?> * <span id="error_password" class="error_class"></span> 
                            <br>
							<input type="password" class="field required" name="password" id="password" />
							<?php echo get_lang('Mobile'); ?> *  <span id="error_mobile" class="error_class"></span> 
                            <br>
                            <input type="text" name="mobile" id="mobile" class="required" onkeypress="return isNumberKey(event)">
                        
							<button type="button" class="btn btn-default signup"><?php echo get_lang('sign_up'); ?></button>
						</form>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </section>
    <!-- CHANGE-PASSWORD-AREA:END -->
	
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
	
	$(".signup").click(function(){
			
			if($(".signup").html() == 'Submitting...')
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
				
				if($.isNumeric($("#mobile").val())){
					if($("#mobile").val().length != 10){
						$("#error_mobile").text("Please enter 10digit mobile only");
						req = false;
					}
				}else{
					$("#error_mobile").text("Please enter numbers only");
					req = false;
				}
			}
			
			
			if(req == true){
				$(".signup").html('Submitting...');
				
					$.ajax({
					  url: "<?php echo base_url();?>web/register",
					  type: "POST",
					  dataType: "json",
					  data: {
						firstname: $("#firstname").val(),
						lastname: $("#lastname").val(),
						email: $("#email").val(),
						password: $("#password").val(),
						mobile: $("#mobile").val()
					  },
					  success: function( data ) {
						if(data.success){
							window.location.href = "<?php echo base_url()?>web/verify_mobile";
						}else{
							$.each(data.error,function(id,val){
								$("#error_"+id).text(val);
							});
							$(".signup").html('SIGN UP');
						}
					  }
					});
				
			}
			
		
	});
	$(".required").keypress(function(){
				
		id = $(this).attr("id");
		
		if($(this).val() == ""){
			//$("#error_"+id).text("This field is required");
		}else{
			$("#error_"+id).text("");
		}
		
	});
});
</script>	

<style>
.error_class{
	color:red;
	font-size:12px;
}
</style>