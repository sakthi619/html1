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
		
		<a class="btn btn-primary fa fa-plus" href="<?php echo base_url()?>products/create"> Add New</a>
		
		<div class="x_content">

				<table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th width="10%">S.No</th>
                          <th width="25%">Product Name</th>                        
                          <th>Quantity</th>
                          <th>Retail Price</th>
                          <th>Sale Price</th>
                          <th width="15%">Action</th>
                        </tr>
                      </thead>


                      <tbody>
					
						<?php
						if(isset($products) && !empty($products)){
							$i = 1;
							foreach($products as $tmp){
						?>
                        <tr>
                          <td><?php echo $i++;?></td>
                          <td><?php echo $tmp->product_name_english;?></td>
                          <td><?php echo get_product_quantity($tmp->pid);?></td>
                          <td><?php echo $tmp->retail_price;?></td>
                          <td><?php echo $tmp->sale_price;?></td>
                          <td>
						  <a href="<?php echo base_url()?>products/edit/<?php echo $tmp->pid;?>" class="fa fa-pencil" title="Edit"></a> | 
						  <a href="<?php echo base_url()?>products/delete/<?php echo $tmp->pid;?>" class="fa fa-trash delete" title="Delete"></a> | 
						  <a class="fa fa-plus add" id="v_<?php echo $tmp->pid;?>" title="Add Quantity"></a>| 
						  <a class="fa fa-bell<?php echo $tmp->trending==0?"-slash":"";?> trending" href="<?php echo base_url()?>products/trending/<?php echo $tmp->pid;?>/<?php echo $tmp->trending?>" title="Trending"></a>
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
<?php

?>
</div>
<!-- /page content -->
<style>
.variants, .barcode, .add{
	cursor:pointer;
}
.variants_list tr td a{
	color: #fff;
}

.variants_list tr th{
	padding:7px;
	text-align:center;
}

.variants_list tr td{
	padding:7px;
}
.variants_images tr td{
	padding:7px;
	align:center;
}
</style>
<script src="<?php echo base_url()?>site/admin/jquery-ui.js"></script>
<link rel="stylesheet" href="<?php echo base_url()?>site/admin/jquery-ui.css">
<script>
$(document).ready(function(){
	
	$(document).on("click",".delete",function(e){
			e.preventDefault();
			c = confirm("Do you want to delete the product?");
			if(c)
				window.location.href = $(this).attr("href");
	});
	
	dialog = $( "#dialog" ).dialog({
      autoOpen: false,
      height: 500,
      width: 800,
      modal: true
    });
	
	barcode = $( "#barcode" ).dialog({
      autoOpen: false,
      height: 500,
      width: 600,
      modal: true
    });
	
	var quantity = $( "#quantity" ).dialog({
      autoOpen: false,
      height: 500,
      width: 800,
      modal: true
    });
	
	$(document).on("click",".variants",function(e){
			id = $(this).attr("id");
			id = id.split("_");
			
						
				$.ajax({
					url: "<?php echo base_url()?>products/get_variants_list",
					method: "POST",
					data: {
						pid: id[1]
					},
					success: function( data ) {		
						$( "#dialog" ).html(data);
						$( "#dialog" ).dialog( "open" );
					}
				});
				
				
	});
	
	$(document).on("click",".barcode",function(e){
			id = $(this).attr("id");
			id = id.split("_");
			
						
				$.ajax({
					url: "<?php echo base_url()?>products/get_variants_barcode",
					method: "POST",
					data: {
						pid: id[1]
					},
					success: function( data ) {		
						$( "#barcode" ).html(data);
						$( "#barcode" ).dialog( "open" );
					}
				});				
	});
	
	$(document).on("click",".add",function(e){
			id = $(this).attr("id");
			id = id.split("_");
			
						
				$.ajax({
					url: "<?php echo base_url()?>products/get_variant_quantity",
					method: "POST",
					data: {
						pid: id[1]
					},
					success: function( data ) {		
						$( "#quantity" ).html(data);
						$( "#quantity" ).dialog( "open" );
					}
				});				
	});
	
	$(document).on("click",".update_quantity",function(e){
			id = $(this).attr("id");
			id = id.split("_");
			
			quantity = $("#quantity_"+id[1]).val();
			purchase = $("#purchase_"+id[1]).val();
			supplier = $("#supplier_"+id[1]).val();
			
			$.ajax({
				url: "<?php echo base_url()?>products/update_variant_quantity",
				method: "POST",
				data: {
					supplier: supplier,
					quantity: quantity,
					purchase: purchase,
					vid: id[1]
				},
				success: function( data ) {		
					 $( "#quantity" ).dialog( "close" );
				}
			});	
			
	});
	
	
	$(document).on("click",".print_barcode",function(e){
			id = $(this).attr("id");
			id = id.split("_");
			
			count = $("#count_"+id[1]).val();
			
			window.open('<?php echo base_url()?>products/print_barcode/'+id[1]+'/'+count);		
			
			$( "#barcode" ).dialog( "close" );
	});
});
</script>
<div id="dialog" title="Variants">
 
</div>
<div id="barcode" title="Barcodes">
 
</div>
<div id="quantity" title="Quantity">
 
</div>