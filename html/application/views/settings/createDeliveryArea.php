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

				<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?php echo base_url()?>settings/saveDeliveryArea">
				
					  <input type="hidden" name="area_id" value="<?php echo isset($area->area_id)?$area->area_id:"";?>">
					  
					 
					  
					<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">  
					  <label for="fullname">City Name * :</label>
                      <select id="city_id" class="form-control" name="city_id" required>
					  <?php
					  if(isset($cities) && !empty($cities)){
						  foreach($cities as $tmp){
							  if(isset($area->city_id) && $area->city_id == $tmp->city_id)
									echo "<option value='".$tmp->city_id."' selected>$tmp->name</option>";
							  else
									echo "<option value='".$tmp->city_id."'>$tmp->name</option>";
						  }
					  }
					  ?>
					  </select>
					</div> 
					  
					<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">  
					  <label for="fullname">Area Name * :</label>
                      <input type="text" id="name" class="form-control" name="name" required value="<?php echo isset($area->name)?$area->name:"";?>" />
					</div> 
					
					<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">  
					  <label for="fullname">Pincode :</label>
                      <input type="text" id="pincode" class="form-control" name="pincode" required value="<?php echo isset($area->pincode)?$area->pincode:"";?>" />
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


