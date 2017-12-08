<br>
     <br>
   <!--CHANGE-PASSWORD-AREA   -->
    <section class="password-change">
        <div class="container">
            <div class="row">
			  <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="headline">
                    <h2> <?php echo get_lang('Sign_In'); ?> </h2>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="change-form">
                        <form>
                            <?php echo get_lang('Email'); ?>  * <span id="error_email" class="error_class"></span>
                            <br>
                            <input type="text" id="email" class="required">
                            <br> <?php echo get_lang('Password'); ?> * <span id="error_password" class="error_class"></span>
                            <br>
                       
                            <input type="password" id="password" class="required">
                            <br>
                        </form>
                        <button type="button" class="btn btn-default signin"><?php echo get_lang('Sign_In'); ?></button>
						<a href="<?php echo base_url()?>forgotPassword" class="forget_pass"><?php echo get_lang('Forgot_password'); ?>?</a>
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
</style>
<script>
function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}
$(document).ready(function(){
	
	$(".signin").click(function(){
			
			if($(".signin").html() == 'Signing in...')
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
				$(".signin").html('Signing in...');
				
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
							window.location.href = "<?php echo base_url()?>web/index";
						}else{
							$.each(data.error,function(id,val){
								$("#error_"+id).text(val);
							});
							$(".signin").html('Sign In');
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