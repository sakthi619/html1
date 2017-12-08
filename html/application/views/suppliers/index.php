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
		
		<a class="btn btn-primary fa fa-plus" href="<?php echo base_url()?>suppliers/create"> Add New</a>
		
		<div class="x_content">

				<table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th width="10%">S.No</th>
                          <th>Supplier Name</th>
                          <th>Address</th>
                          <th>City</th>
                          <th>Phone</th>
                          <th width="20%">Action</th>
                        </tr>
                      </thead>


                      <tbody>
					
						<?php
						if(isset($suppliers) && !empty($suppliers)){
							$i = 1;
							foreach($suppliers as $tmp){
						?>
                        <tr>
                          <td><?php echo $i++;?></td>
                          <td><?php echo $tmp->name;?></td>
                          <td><?php echo $tmp->address;?></td>
                          <td><?php echo $tmp->city;?></td>
                          <td><?php echo $tmp->phone;?></td>
                          <td><a href="<?php echo base_url()?>suppliers/edit/<?php echo $tmp->sid;?>" class="fa fa-pencil"> Edit</a> | <a href="<?php echo base_url()?>suppliers/delete/<?php echo $tmp->sid;?>" class="fa fa-trash delete"> Delete</a></td>
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
			c = confirm("Do you want to delete the supplier?");
			if(c)
				window.location.href = $(this).attr("href");
	});
});
</script>
