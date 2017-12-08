<br>
     <br>
   <!--CHANGE-PASSWORD-AREA   -->
    <section class="password-change">
        <div class="container">
            <div class="row">
		
			<div class="col-md-6 col-sm-6 col-xs-12">
                <div class="headline">
                  <h2><?php echo get_lang('Mobile_Verification'); ?></h2>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="change-form">
                        <form>
                            
							<?php if(isset($mobile) && $mobile){ ?>
							
							<input type="hidden" id="mobile" value="<?php echo $mobile;?>">
							
							<?php }else{ ?>
							
							<?php echo get_lang('Mobile'); ?> * <span id="error_mobile" class="error_class"></span>
                            <br>
                            <input type="text" id="mobile" class="required" autocomplete="off" onkeypress="return isNumberKey(event)" value="">
							
							<?php } ?>
							
							<?php echo get_lang('OTP'); ?> * <span id="error_otp" class="error_class"></span>
                            <br>
                            <input type="text" id="otp" class="required" autocomplete="off" onkeypress="return isNumberKey(event)">
							
							
                        </form>
                        <button type="button" class="btn btn-default verify"><?php echo get_lang('Verify'); ?> </button>
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
function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
   
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
}
$(document).ready(function(){
	
	$(".verify").click(function(){
			
			if($(".verify").html() == 'Verifying...')
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
				$(".verify").html('Verifying...');
				
					$.ajax({
					  url: "<?php echo base_url();?>web/otp_check",
					  type: "POST",
					  dataType: "json",
					  data: {
						mobile: $("#mobile").val(),
						otp: $("#otp").val()
					  },
					  success: function( data ) {
						if(data.success){
							window.location.href = data.url;
						}else{
							$.each(data.error,function(id,val){
								$("#error_"+id).text(val);
							});
							$(".verify").html('Verify');
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