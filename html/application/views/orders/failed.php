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
                          <th>S.No</th>
						  <th width="10%">Order No</th>
                          <th>Customer</th>
                          <th>Mobile</th>                         
                          <th>City</th>                         
                          <th width="10%">Total</th>
                          <th width="15%">Delivery</th>
                          <th width="15%">Status</th>
                          <th width="15%">Action</th>
                        </tr>
                      </thead>


                      <tbody>
					
						<?php
						if(isset($orders) && !empty($orders)){
							$i = 1;
							$status = array('1'=>'New','2'=>'Dispatched','3'=>'Delivered');
							foreach($orders as $tmp){
						?>
                        <tr>
                          <td align='right'><?php echo $i++;?></td>
                          <td align='right'><?php echo get_order_id($tmp->oid);?></td>
                          <td><?php echo $tmp->firstname;?></td>
                          <td align='right'><?php echo $tmp->mobile;?></td>
                          <td align='right'><?php echo $tmp->city;?></td>
                          <td align='right'><?php echo $tmp->total;?></td>
                          <td align='right'><?php echo date('d-m-Y',strtotime($tmp->delivery_date))."<br>".$tmp->slot;?></td>
                          <td>
						  Failed					 
						  </td>
                          <td><a class="fa fa-eye view" id="o_<?php echo $tmp->oid;?>"></a> | <a class="fa fa-print print" id="print_<?php echo $tmp->oid;?>"></a></td>
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
<style>
.view, .print{
	cursor:pointer;
}

.order tr td{
		padding:10px;
}
.order_details tr td{
		padding:10px;
}

.order_details tr th{
		padding:10px;
		color: #fff;
		background-color: #555;
}
</style>
<script src="<?php echo base_url()?>site/admin/jquery-ui.js"></script>
<script src="<?php echo base_url()?>site/admin/jquery.ui.timepicker.js"></script>
<link rel="stylesheet" href="<?php echo base_url()?>site/admin/jquery-ui.css">
<link rel="stylesheet" href="<?php echo base_url()?>site/admin/jquery.ui.timepicker.css">
<script>
$(document).ready(function(){
	
	dialog = $( "#dialog" ).dialog({
      autoOpen: false,
      height: 500,
      width: 800,
      modal: true
    });
	
	
	
	$(document).on("change",".status",function(e){
		
				id = $(this).attr("id");
				id = id.split("_");
		
				$.ajax({
					url: "<?php echo base_url()?>orders/update_order_status",
					method: "POST",
					data: {
						oid: id[1],
						status: $(this).val()
					},
					success: function( data ) {		
						 
					}
				});
		
	});
	
	
	$(document).on("click",".view",function(e){
		
		id = $(this).attr("id");
		id = id.split("_");
		
		
				$.ajax({
					url: "<?php echo base_url()?>orders/get_order_details",
					method: "POST",
					data: {
						oid: id[1]
					},
					success: function( data ) {		
						 $( "#dialog" ).html(data);
						 dialog.dialog( "open" );
					}
				});
		
		
	});
	
	$(document).on("click",".print",function(){
			id = $(this).attr("id");
			id = id.split("_");
			window.open("<?php echo base_url()?>orders/print_order/"+id[1], "_blank");
			
			//, "toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=325,height=400"
	});
	
	$(document).on("click",".delete",function(e){
			e.preventDefault();
			c = confirm("Do you want to delete the order?");
			if(c)
				window.location.href = $(this).attr("href");
	});
});
</script>
<div id="dialog" title="Order Details">
 
</div>