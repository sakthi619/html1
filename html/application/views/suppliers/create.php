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

				<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?php echo base_url()?>suppliers/save">
				
					  <input type="hidden" name="sid" value="<?php echo isset($supplier->sid)?$supplier->sid:"";?>">
					  
					 
					  
					<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">  
					  <label for="fullname">Supplier Name * :</label>
                      <input type="text" id="name" class="form-control" name="name" required value="<?php echo isset($supplier->name)?$supplier->name:"";?>" />
					</div> 
					
					<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">  
					  <label for="fullname">Address :</label>
                      <input type="text" id="address" class="form-control" name="address" value="<?php echo isset($supplier->address)?$supplier->address:"";?>" />
					</div> 
					
					<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">  
					  <label for="fullname">City :</label>
                      <input type="text" id="city" class="form-control" name="city" value="<?php echo isset($supplier->city)?$supplier->city:"";?>" />
					</div> 
					
					<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">  
					  <label for="fullname">Phone :</label>
                      <input type="text" id="phone" class="form-control" name="phone" value="<?php echo isset($supplier->phone)?$supplier->phone:"";?>" />
					</div> 
					  
                      <div class="clear"></div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <a class="btn btn-primary" href="<?php echo base_url()?>suppliers/index">Cancel</a>
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


