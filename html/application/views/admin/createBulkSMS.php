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

				<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?php echo base_url()?>admin/saveBulkSMS">
				
				
					  
					<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">  
					  <label for="fullname">Text * :</label>
                      <textarea class="form-control" name="sms_text" required></textarea>
					</div> 
					
				
					
					
                      <div class="clear"></div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="reset" class="btn btn-primary">Cancel</button>
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>

                    </form>
				
				<span style="color:green;">
				<?php
				$update = $this->session->flashdata('passwordUpdate');
				if($update){
					echo "Password updated successfully...";
				}
				?>
				</span>
        </div>      
	</div>      
   </div>      
</div>      
 <br />

</div>
<!-- /page content -->
<script>
$(document).ready(function(){
	
	
	
});
</script>

