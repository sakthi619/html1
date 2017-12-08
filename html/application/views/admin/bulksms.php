<link href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" rel="stylesheet">

<!-- page content -->
<div class="right_col" role="main">
 <div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
	 <div class="x_title">
			<h2><?php echo $pagetitle;?> </h2><a href="<?php echo base_url()?>admin/createBulkSMS" class="btn btn-primary pull-right">Create SMS</a>
			<div class="clearfix"></div>
		</div>
		
	
		<div class="x_content">

				<table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th width="10%">S.No</th>
                          <th>SMS Text</th>
                          <th>Created Time</th>
                          <th>Status</th>
                          <th width="20%">Action</th>
                        </tr>
                      </thead>


                      <tbody>
					
						<?php
						if(isset($sms) && !empty($sms)){
							$i = 1;
							foreach($sms as $tmp){
						?>
                        <tr>
                          <td><?php echo $i++;?></td>
                          <td><?php echo $tmp->sms_text;?></td>
                          <td><?php echo $tmp->createdTime;?></td>
                          <td>
						  <?php 
							if($tmp->status == 0){
								echo "Active";
							}else if($tmp->status == 1){
								echo "SMS Sent";
							}
						  ?>
						  </td>
                          <td><a href="<?php echo base_url()?>admin/deleteSMS/<?php echo $tmp->id;?>" class="fa fa-trash delete"> Delete</a></td>
                        </tr>
						<?php 
							}
						}
						?>
                      </tbody>
                    </table>
            </div>      
		</div>      
		</div>      
	</div>      
 <br />

</div>
<!-- /page content -->

<script>
$(document).ready(function(){
	$(document).on("click",".delete",function(e){
			e.preventDefault();
			c = confirm("Do you want to delete the sms?");
			if(c)
				window.location.href = $(this).attr("href");
	});
});
</script>
