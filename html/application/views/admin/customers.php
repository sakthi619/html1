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

				<table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th width="10%">S.No</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Mobile</th>
                          <th>Status</th>
                          <th width="20%">Action</th>
                        </tr>
                      </thead>


                      <tbody>
					
						<?php
						if(isset($customers) && !empty($customers)){
							$i = 1;
							foreach($customers as $tmp){
						?>
                        <tr>
                          <td><?php echo $i++;?></td>
                          <td><?php echo $tmp->firstname.' '.$tmp->lastname;?></td>
                          <td><?php echo $tmp->email;?></td>
                          <td><?php echo $tmp->mobile;?></td>
                          <td>
						  <?php 
							if($tmp->status == 0){
								echo "Not Verified";
							}else if($tmp->status == 1){
								echo "Active";
							}else if($tmp->status == 2){
								echo "Locked";
							}
						  ?>
						  </td>
                          <td><a href="<?php echo base_url()?>admin/blockCustomer/<?php echo $tmp->cid.'/'.$tmp->status;?>" class="fa fa-<?php if($tmp->status == 2){ echo "un";}?>lock"> <?php if($tmp->status == 2){ echo "Un";}?>Lock</a> | <a href="<?php echo base_url()?>admin/deleteCustomer/<?php echo $tmp->cid;?>" class="fa fa-trash delete"> Delete</a> | <a href="<?php echo base_url()?>admin/orders/<?php echo $tmp->cid;?>" class=""> Orders</a></td>
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
			c = confirm("Do you want to delete the customer?");
			if(c)
				window.location.href = $(this).attr("href");
	});
});
</script>
