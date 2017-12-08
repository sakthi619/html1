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

				<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?php echo base_url()?>settings/saveLoyalty">
				
					  
					  
					<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">  
					  <label for="fullname">Loyalty Points * :</label><br>
                      <input type="radio" class="loyalty" <?php if($settings->loyalty == 'yes'){ echo "checked";} ?> name="loyalty" required value="yes" />&nbsp;Yes
                      <input type="radio" class="loyalty" <?php if($settings->loyalty == 'no'){ echo "checked";} ?> name="loyalty" required value="no" />&nbsp;No
					</div> 
					   <div class="clear"></div>
					
					<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">  
					  <label for="fullname">Amount Per Points :</label>
                      <input type="number" id="point_amount" class="form-control" name="point_amount" required value="<?php echo isset($settings->point_amount)?$settings->point_amount:"";?>" />
					</div> 
					
					<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">  
					  <label for="fullname">Redeem Amount Per Points :</label>
                      <input type="number" id="point_redeem" class="form-control" name="point_redeem" required value="<?php echo isset($settings->point_redeem)?$settings->point_redeem:"";?>" />
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

	$(document).on("change",".loyalty",function(){
		
			if($(".loyalty:checked").val() == 'yes'){
				$("#point_redeem").removeAttr("disabled");
				$("#point_amount").removeAttr("disabled");
			}else{				
				$("#point_redeem").attr("disabled",true);
				$("#point_amount").attr("disabled",true);
			}
		
	});
	
	
	$(".loyalty").trigger("change");

	

});
</script>
