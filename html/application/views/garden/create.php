
<!-- page content -->
<div class="right_col" role="main">
<?php if(isset($product->pid) && $product->pid){ ?>
	<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?php echo base_url()?>products/update" enctype="multipart/form-data">
<?php }else{ ?>
	<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?php echo base_url()?>products/save" enctype="multipart/form-data">
<?php } ?>
 <div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
	 <div class="x_title">
			<h2><?php echo $pagetitle;?> </h2>
			<div class="clearfix"></div>
		</div>
		<div class="x_content">

				
				
					  <input type="hidden" name="pid" value="<?php echo isset($product->pid)?$product->pid:"";?>">
					  
					 
					
					
					  
					<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">  
					  <label for="fullname">Garden Name (In English) * :</label>
                      <input type="text" id="product_name_english" class="form-control" name="product_name_english" required value="<?php echo isset($product->product_name_english)?$product->product_name_english:"";?>" />
					</div>
					<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">  
					  <label for="fullname">Garden Name (In Tamil) * :</label>
                      <input type="text" id="product_name_tamil" class="form-control" name="product_name_tamil" required value="<?php echo isset($product->product_name_tamil)?$product->product_name_tamil:"";?>" />
					</div>
					
					
					
					
					
					
					<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">  
					  <label for="fullname">Garden Size : (Sq.Ft)</label>
                      <input type="number" min="0" id="tax" class="form-control" name="tax" value="<?php echo isset($product->tax)?$product->tax:"";?>" />
					</div> 
					
					
					<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">  
					  <label for="fullname">Garden Price :</label>
                      <input type="number" min="0" id="tax" class="form-control" name="tax" value="<?php echo isset($product->tax)?$product->tax:"";?>" />
					</div> 
					<div class="clear"></div>
				
					
				
					  
                      <div class="clear"></div>
					  
					 
					  
					  
					  
					  
                      

                   
				
				
        </div>      
	</div>      
   </div>      
</div>     

<!-- Variants Start-->
<div class="row variants">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">

			<div class="x_content">
			
					
					  
<div class="col-md-3 col-sm-6 col-xs-12 form-group has-feedback">  
	<label for="fullname">Quantity * :</label>
	<select id="product" class="form-control select_multiple" name="product">
		<option value="">--Select--</option>
		<?php
		if(isset($products) && !empty($products)){
			foreach($products as $tmp){
				echo "<option value='$tmp->pid'>$tmp->product_name_english</option>";				
			}
		}
		?>
	</select>
</div> 
				
<div class="clear"></div>

<table border="1" width="50%" align="center" id="prod_table">
	<thead>
	<tr>
		<th width="60%">Product Name</th>
		<th>Quantity</th>
	</tr>
	</thead>
	<tbody>
	</tbody>
</table>				
					 
			
			
			</div>  
		</div>  
	</div>  
</div>  


<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">

			<div class="x_content">
					<div class="form-group has-feedback">  
					  <label for="fullname">Garden Description (English) * :</label>
                      <textarea style="resize:none;height:200px;" id="description_english" class="jqte-test form-control" name="description_english" required><?php echo isset($product->description_english)?$product->description_english:"";?></textarea>
					</div> 
			</div>  
			<div class="x_content">
					<div class="form-group has-feedback">  
					  <label for="fullname">Garden Description (Tamil) * :</label>
                      <textarea style="resize:none;height:200px;" id="description_tamil" class="jqte-test form-control" name="description_tamil" required><?php echo isset($product->description_tamil)?$product->description_tamil:"";?></textarea>
					</div> 
			</div>  
		</div>  
	</div>  
</div>  

<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">

			<div class="x_content">
					  <div class="col-md-4 col-sm-6 col-xs-12 form-group has-feedback">  
					   <label for="fullname">Garden Image :</label>
                       <input type="file" id="image1" name="image[]" value="" />
					  </div> 					 
					  
			</div>  
		</div>  
	</div>  
</div>  
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">

			<div class="x_content">
					<div class="clear"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <a class="btn btn-primary" href="<?php echo base_url()?>products/index">Cancel</a>
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>
			</div>  
		</div>  
	</div>  
</div>  



  </form>
 <br />

</div>
<!-- /page content -->

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="<?php echo base_url()?>site/admin/jquery-te-1.4.0.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="<?php echo base_url()?>site/admin/jquery-te-1.4.0.min.js"></script>

<link rel="stylesheet" href="<?php echo base_url()?>site\admin\vendors\select2\dist\css\select2.min.css">
<script src="<?php echo base_url()?>site\admin\vendors\select2\dist\js\select2.min.js"></script>

<style>
#prod_table tr th{
	padding:5px;
}
#prod_table tr td{
	padding:5px;
}
</style>

<script>
function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
   
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
}

function isNumberKeyPeriod(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if(charCode == 46)
        return true;
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
}

$(document).ready(function(){
	
	$('.jqte-test').jqte();
	
	//$(".select_multiple").select2();
	
	$("input").on("paste",function(e){
    	$("#documentID").focus();
	});
		
	$("#product").change(function(){
	
		if($(this).val() != ''){
			
			str = "<tr>";
			str += "<td>"+$("#product option:selected").text()+"</td>";
			str += "<td><input type='number' class='form-control'></td>";
			str += "</tr>";
		
			$("#prod_table tbody").append(str);
			$(this).val("");
		}
	
	});
	
	
	
	$(".variants_btn").click(function(){
		
				
				$.ajax({
					url: "<?php echo base_url()?>products/add_variant",
					method: "POST",
					data: {
						
					},
					success: function( data ) {		
						$(".variants").append(data);
					}
				});
		
	});
	
	
	
	$(document).on("click",".removeVariant",function(e){
			e.preventDefault();
			c = confirm("Do you want to remove this variant?");
			if(c)
				window.location.href = $(this).attr("href");
	});
	
	
	$(document).on("click",".remove_variant",function(){
		
		id = $(this).attr("id");
		id = id.split("_");
		
		$("#variants_"+id[1]).remove();
		
		
	});
	
	
				$(document).on('keypress',".size", function() {
					
					$(this).autocomplete({
						source: function( request, response ) {
						$.ajax({
							url: "<?php echo base_url()?>products/get_sizes",
							method: "POST",
							dataType: "json",
							data: {
								term: request.term,
							},
							success: function( data ) {
								response( data );
							}
						});
						}
					});
				});
	
	
	
});
</script>
