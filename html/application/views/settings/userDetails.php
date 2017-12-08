<link href="<?php echo base_url()?>site/admin/vendors/select2/dist/css/select2.min.css" rel="stylesheet">
 <script src="<?php echo base_url()?>site/admin/vendors/select2/dist/js/select2.full.min.js"></script>
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
<?php
$delivery = array();
if(isset($limit) && !empty($limit)){
	foreach($limit as $tmp){
		$delivery[] = $tmp->delivery;
	}
}
?>
				<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?php echo base_url()?>settings/saveUserDetails">
				
					  <input type="hidden" name="area_id" value="<?php echo $area_id;?>">
					  
					 
					  
					<div class="col-md-4 col-sm-6 col-xs-12 form-group has-feedback">  
					  <label for="fullname">User Name * :</label>
                      <input type="text" id="username" class="form-control" name="username" required value="<?php echo isset($area->username)?$area->username:"";?>" />
					</div> 
					<div class="col-md-4 col-sm-6 col-xs-12 form-group has-feedback">  
					  <label for="fullname">Password * :</label>
                      <input type="password" id="password" class="form-control" name="password" required value="<?php echo isset($area->password)?$area->password:"";?>" />
					</div> 
					
					  
                      <div class="clear"></div>
					  
					  
					  <div class="col-md-12 col-sm-6 col-xs-12 form-group has-feedback">  
						  <label for="fullname">Delivery Areas * :</label>
						  <select id="password" class="form-control select2_multiple" name="areas[]" multiple="multiple">
							<?php					  
							  if(!empty($areas)){
								  foreach($areas as $tmp){
									  if(in_array($tmp->area_id,$delivery))
											echo "<option value='".$tmp->area_id."' selected>".$tmp->name."</option>";
									  else if(isset($area_id) && $area_id == $tmp->area_id)
											echo "<option value='".$tmp->area_id."' selected>".$tmp->name."</option>";
									  else
											echo "<option value='".$tmp->area_id."'>".$tmp->name."</option>";
								  }
							  }
						    ?>
						  </select>
					  </div>
					  
                      <div class="clear"></div>
					  
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <a class="btn btn-primary" href="<?php echo base_url()?>settings/deliveryArea">Cancel</a>
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
$(".select2_multiple").select2();
</script>

