<br>
     <br>
   <!--CHANGE-PASSWORD-AREA   -->
    <section class="password-change">
        <div class="container">
            <div class="row">
			 
			 <div class="col-md-6 col-sm-6 col-xs-12 resetBox">
                <div class="headline">
                    <h2>Reset Password</h2>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="change-form">
                        <form>
                             New Password * <span id="error_password" class="error_class"></span>
                            <br>
                            <input type="hidden" id="verification" value="<?php echo $verification;?>">
                            <input type="password" id="password" class="required">
                            <br> Confirm Password * <span id="error_confirm" class="error_class"></span>
                            <br>
                       
                            <input type="password" id="confirm" class="required">
                            <br>
                        </form>
                        <button type="button" class="btn btn-default resetPass">Submit</button>
						<br>
						<span id="error_result" class="error_class"></span>
                    </div>
                </div>
            </div>
			
			 <div class="col-md-6 col-sm-6 col-xs-12 resetMessage">
                <div class="headline">
                    <h2>Reset Password</h2>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="change-form">
                       Password Changed Successfully... 
					   <br><br>
					   <a href="<?php echo base_url()?>signin" class='btn btn-warning'>Login</a>
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

.resetMessage{
	display:none;
}
</style>
<script>

$(document).ready(function(){
	
	$(".resetPass").click(function(){
			
			if($(".resetPass").html() == 'Submitting...')
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
			
			
			
			if($("#password").val() != $("#confirm").val()){
				$("#error_password").text("Passwords are not same");
				req = false;
			}
			
			
			
			if(req == true){
				$(".resetPass").html('Submitting...');
				
					$.ajax({
					  url: "<?php echo base_url();?>web/update_password",
					  type: "POST",
					  dataType: "json",
					  data: {
						password: $("#password").val(),
						verification: $("#verification").val()
					  },
					  success: function( data ) {
						if(data.success){
							$(".resetBox").hide();
							$(".resetMessage").show();
						}else{
							
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