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
		
		<a class="btn btn-primary fa fa-plus" href="<?php echo base_url()?>settings/createDeliveryArea"> Add New</a>
		
		<div class="x_content">

				<table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th width="10%">S.No</th>
                          <th>City Name</th>
                          <th>Area Name</th>
                          <th>Pincode</th>                        
                          <th width="20%">Action</th>
                        </tr>
                      </thead>


                      <tbody>
					
						<?php
						if(isset($areas) && !empty($areas)){
							$i = 1;
							foreach($areas as $tmp){
						?>
                        <tr>
                          <td><?php echo $i++;?></td>
                          <td><?php echo $tmp->city_name;?></td>
                          <td><?php echo $tmp->name;?></td>
                          <td><?php echo $tmp->pincode;?></td>
                          <td>
						  <a href="<?php echo base_url()?>settings/editDeliveryArea/<?php echo $tmp->area_id;?>" class="fa fa-pencil" title="Edit"></a> | 
						  <a href="<?php echo base_url()?>settings/statusDeliveryArea/<?php echo $tmp->area_id.'/'.$tmp->status;?>" class="fa fa-eye<?php if($tmp->status == 1){ echo "-slash";}?> areaShow" title="Show/Hide"></a> | 
						  <a href="<?php echo base_url()?>settings/deleteDeliveryArea/<?php echo $tmp->area_id;?>" class="fa fa-trash delete" title="Delete"></a> | 
						  <a href="<?php echo base_url()?>settings/userDetails/<?php echo $tmp->area_id;?>" class="fa fa-user" title="User Details"></a>
						  </td>
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
			c = confirm("Do you want to delete the delivery area?");
			if(c)
				window.location.href = $(this).attr("href");
	});
});
</script>
