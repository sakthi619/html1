<link href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" rel="stylesheet">

<!-- page content -->
<div class="right_col" role="main">
 <div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
	 <div class="x_title">
			<h2><?php echo $pagetitle;?> </h2>
			<div class="clearfix"></div>
		</div>
		<div class="x_content">

				<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?php echo base_url()?>settings/saveDelivery">
				
					  
					  
					<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">  
					  <label for="fullname">Delivery Charge * :</label><br>
                      <input type="radio" class="delivery_charge" <?php if($settings->delivery_charge == 'yes'){ echo "checked";} ?> name="delivery_charge" required value="yes" />&nbsp;Yes
                      <input type="radio" class="delivery_charge" <?php if($settings->delivery_charge == 'no'){ echo "checked";} ?> name="delivery_charge" required value="no" />&nbsp;No
					</div> 
					  
					<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">  
					  <label for="fullname">Delivery Limit * :</label><br>
                      <input type="radio" class="delivery_limit" <?php if($settings->delivery_limit == 'yes'){ echo "checked";} ?> name="delivery_limit" required value="yes" />&nbsp;Yes
                      <input type="radio" class="delivery_limit" <?php if($settings->delivery_limit == 'no'){ echo "checked";} ?> name="delivery_limit" required value="no" />&nbsp;No
					</div> 
					
					<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">  
					  <label for="fullname">Purchase Minimum Amount :</label>
                      <input type="number" id="delivery_minimum" class="form-control" name="delivery_minimum" required value="<?php echo isset($settings->delivery_minimum)?$settings->delivery_minimum:"";?>" />
					</div> 
					
					<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">  
					  <label for="fullname">Shipping Charge :</label>
                      <input type="number" id="delivery_amount" class="form-control" name="delivery_amount" required value="<?php echo isset($settings->delivery_amount)?$settings->delivery_amount:"";?>" />
					</div> 
					
					
					  
                      <div class="clear"></div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>

                    </form>
				
				
        </div>      
	</div>      
   </div>      
</div>      
 <br />

</div>
<!-- /page content -->

<script>
$(document).ready(function(){

	$(document).on("change",".delivery_charge",function(){
		
			if($(".delivery_charge:checked").val() == 'yes'){
				$("#delivery_minimum").removeAttr("disabled");
				$("#delivery_amount").removeAttr("disabled");
				$(".delivery_limit").removeAttr("disabled");
			}else{				
				$("#delivery_minimum").attr("disabled",true);
				$("#delivery_amount").attr("disabled",true);
				$(".delivery_limit").attr("disabled",true);
			}
		
	});
	
	$(document).on("change",".delivery_limit",function(){
		
			if($(".delivery_limit:checked").val() == 'yes'){
				$("#delivery_minimum").removeAttr("disabled");
			}else{				
				$("#delivery_minimum").attr("disabled",true);
			}
		
	});

	$(".delivery_charge").trigger("change");
	$(".delivery_limit").trigger("change");
	

});
</script>
