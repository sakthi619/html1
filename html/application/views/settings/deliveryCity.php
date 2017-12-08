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
		
		<a class="btn btn-primary fa fa-plus" href="<?php echo base_url()?>settings/createDeliveryCity"> Add New</a>
		
		<div class="x_content">

				<table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th width="10%">S.No</th>
                          <th>City Name</th>                
                          <th width="20%">Action</th>
                        </tr>
                      </thead>


                      <tbody>
					
						<?php
						if(isset($cities) && !empty($cities)){
							$i = 1;
							foreach($cities as $tmp){
						?>
                        <tr>
                          <td><?php echo $i++;?></td>
                          <td><?php echo $tmp->name;?></td>
                          <td><a href="<?php echo base_url()?>settings/editDeliveryCity/<?php echo $tmp->city_id;?>" class="fa fa-pencil"> Edit</a> | <a href="<?php echo base_url()?>settings/deleteDeliveryCity/<?php echo $tmp->city_id;?>" class="fa fa-trash delete"> Delete</a></td>
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
			c = confirm("Do you want to delete the delivery city?");
			if(c)
				window.location.href = $(this).attr("href");
	});
});
</script>
