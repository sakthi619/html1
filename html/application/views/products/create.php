
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
					  
					 
					 <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback parent">  
					  <label for="fullname">Categroy Name * :</label>
                        <select id="category_id" name="category_id" required="required" class="form-control">
							<option value=''>--- Choose Category ---</option>
							<?php
							if(isset($categories) && !empty($categories)){
								foreach($categories as $tmp){
									
									
									if(isset($product->cid) && $product->cid == $tmp->cid)
										echo "<option value='".$tmp->cid."' selected>".$tmp->category_name_english."</option>";
									else
										echo "<option value='".$tmp->cid."'>".$tmp->category_name_english."</option>";
									
								}
							}
							?>
						</select>
					</div> 
					
					 <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback parent">  
					  <label for="fullname">Sub Categroy Name :</label>
                        <select id="subcategory_id" name="subcategory_id" class="form-control">
							<option value=''>--- Choose Subcategory ---</option>
						</select>
					</div>  
					
					
					<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback parent">  
					  <label for="fullname">Supplier Name * :</label>
                        <select id="supplier_id" name="supplier_id" required="required" class="form-control">
							<option value=''>--- Choose Supplier ---</option>
							<?php
							if(isset($suppliers) && !empty($suppliers)){
								foreach($suppliers as $tmp){
									if(isset($product->supplier_id) && $product->supplier_id == $tmp->sid)
										echo "<option value='".$tmp->sid."' selected>".$tmp->name."</option>";
									else
										echo "<option value='".$tmp->sid."'>".$tmp->name."</option>";
								}
							}
							?>
						</select>
					</div>  
					
					  
					<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">  
					  <label for="fullname">Product Name (In English) * :</label>
                      <input type="text" id="product_name_english" class="form-control" name="product_name_english" required value="<?php echo isset($product->product_name_english)?$product->product_name_english:"";?>" />
					</div>
					<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">  
					  <label for="fullname">Product Name (In Tamil) * :</label>
                      <input type="text" id="product_name_tamil" class="form-control" name="product_name_tamil" required value="<?php echo isset($product->product_name_tamil)?$product->product_name_tamil:"";?>" />
					</div>
					
					
					
					<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback parent">  
					  <label for="fullname">Plant Type :</label>
                        <select id="plant_type" name="plant_type" class="form-control">
							<option value=''>--- Choose Plant Type ---</option>
							<?php
							if(isset($plant_types) && !empty($plant_types)){
								foreach($plant_types as $tmp){
									if(isset($product->plant_type) && $product->plant_type == $tmp->type_id)
										echo "<option value='".$tmp->type_id."' selected>".$tmp->type_english."</option>";
									else
										echo "<option value='".$tmp->type_id."'>".$tmp->type_english."</option>";
								}
							}
							?>
						</select>
					</div>  
					
					<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback parent">  
					  <label for="fullname">Plant Placement :</label>
                        <select id="plant_placement" name="plant_placement" class="form-control">
							<option value=''>--- Choose Plant Placement ---</option>
							<?php
							if(isset($plant_placements) && !empty($plant_placements)){
								foreach($plant_placements as $tmp){
									if(isset($product->plant_placement) && $product->plant_placement == $tmp->id)
										echo "<option value='".$tmp->id."' selected>".$tmp->placement_english."</option>";
									else
										echo "<option value='".$tmp->id."'>".$tmp->placement_english."</option>";
								}
							}
							?>
						</select>
					</div>  
					
					<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback parent">  
					  <label for="fullname">Plant Use :</label>
                        <select id="plant_use" name="plant_use" class="form-control">
							<option value=''>--- Choose Plant Use ---</option>
							<?php
							if(isset($plant_use) && !empty($plant_use)){
								foreach($plant_use as $tmp){
									if(isset($product->plant_use) && $product->plant_use == $tmp->id)
										echo "<option value='".$tmp->id."' selected>".$tmp->use_english."</option>";
									else
										echo "<option value='".$tmp->id."'>".$tmp->use_english."</option>";
								}
							}
							?>
						</select>
					</div>  
					
					
					<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">  
					  <label for="fullname">Product Tax :</label>
                      <input type="number" min="0" id="tax" class="form-control" name="tax" value="<?php echo isset($product->tax)?$product->tax:"";?>" />
					</div> 
					<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">  
					  <label for="fullname">Tags :</label>
                      <input type="text"  id="hashtag" class="form-control" name="hashtag" value="<?php echo isset($product->hashtag)?$product->hashtag:"";?>" />
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
                       <input type="text" id="quantity" class="form-control" name="quantity" onkeypress="return isNumberKey(event)" <?php if(isset($product)){ echo "readonly"; }?> value="<?php if(isset($product)){ echo get_product_quantity($product->pid); } ?>" />
					  </div> 
					  
					  <div class="col-md-3 col-sm-6 col-xs-12 form-group has-feedback">  
					   <label for="fullname">Bar Code :</label>
                       <input type="text" id="barcode" class="form-control" name="barcode" value="<?php echo isset($product->barcode)?$product->barcode:"";?>" />
					  </div> 
					  
					  <div class="col-md-3 col-sm-6 col-xs-12 form-group has-feedback">  
					   <label for="fullname">SKU :</label>
                       <input type="text" id="sku" class="form-control" name="sku" value="<?php echo isset($product->sku)?$product->sku:"";?>" />
					  </div> 
					  
					  <div class="col-md-3 col-sm-6 col-xs-12 form-group has-feedback">  
					   <label for="fullname">Retail Price :</label>
                       <input type="text" id="retail_price" class="form-control" name="retail_price" onkeypress="return isNumberKeyPeriod(event)" value="<?php echo isset($product->retail_price)?$product->retail_price:"";?>" />
					  </div> 
					  <div class="col-md-3 col-sm-6 col-xs-12 form-group has-feedback">  
					   <label for="fullname">Sale Price * :</label>
                       <input type="text" id="sale_price" class="form-control" name="sale_price" onkeypress="return isNumberKeyPeriod(event)" value="<?php echo isset($product->sale_price)?$product->sale_price:"";?>" />
					  </div> 
					  <div class="col-md-3 col-sm-6 col-xs-12 form-group has-feedback">  
					   <label for="fullname">Short Name  :</label>
                       <input type="text" id="shortname" class="form-control" name="shortname" value="<?php echo isset($product->shortname)?$product->shortname:"";?>" />
					  </div>
					  <div class="col-md-3 col-sm-6 col-xs-12 form-group has-feedback">  
					   <label for="fullname">Purchase Price  :</label>
                       <input type="text" id="purchase_price" class="form-control" name="purchase_price" onkeypress="return isNumberKeyPeriod(event)"value="<?php echo isset($product->purchase_price)?$product->purchase_price:"";?>" />
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
					   <label for="fullname">Image1 :</label>
                       <input type="file" id="image1" name="image[]" value="" <?php if(isset($images) && $images->image_1){ ?> style="display:none;" <?php } ?> />
					   <?php if(isset($images) && $images->image_1){ ?>
						   <br>
						   <img src="<?php echo base_url()?>site/products/<?php echo $images->image_1;?>" class="image_1" width="100px" height="100px">
						   <br>
						   <a class="remove_1">Remove</a>
					   <?php } ?>
					  </div> 
					  <div class="col-md-4 col-sm-6 col-xs-12 form-group has-feedback">  
					   <label for="fullname">Image2 :</label>
                       <input type="file" id="image2" name="image[]" value="" <?php if(isset($images) && $images->image_2){ ?> style="display:none;" <?php } ?> />
					   <?php if(isset($images) && $images->image_2){ ?>
					       <br>
						   <img src="<?php echo base_url()?>site/products/<?php echo $images->image_2;?>" class="image_2" width="100px" height="100px">
						   <br>
						   <a class="remove_2">Remove</a>
					   <?php } ?>
					  </div> 
					  <div class="col-md-4 col-sm-6 col-xs-12 form-group has-feedback">  
					   <label for="fullname">Image3 :</label>
                       <input type="file" id="image3" name="image[]" value="" <?php if(isset($images) && $images->image_3){ ?> style="display:none;" <?php } ?> />
					   <?php if(isset($images) && $images->image_3){ ?>
						   <br>
						   <img src="<?php echo base_url()?>site/products/<?php echo $images->image_3;?>" class="image_3" width="100px" height="100px">
						   <br>
						   <a class="remove_3">Remove</a>
					   <?php } ?>
					  </div> 
			</div>  
		</div>  
	</div>  
</div>  
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">

			<div class="x_content">
					<div class="form-group has-feedback">  
					  <label for="fullname">Product Description (English) * :</label>
                      <textarea style="resize:none;height:200px;" id="description_english" class=" form-control summernote  description_english" name="description_english" required><?php echo isset($product->description_english)?$product->description_english:"";?></textarea>
					</div> 
			</div>  
			<div class="x_content">
					<div class="form-group has-feedback">  
					  <label for="fullname">Product Description (Tamil) * :</label>
                      <textarea style="resize:none;height:200px;" id="description_tamil" class="jqte-test form-control summernote description_english" name="description_tamil" required><?php echo isset($product->description_tamil)?$product->description_tamil:"";?></textarea>
					</div> 
			</div>  
			
			<div class="x_content">
					<div class="form-group has-feedback">  
					  <label for="fullname">Product Short Description (English) * :</label>
                      <textarea style="resize:none;height:200px;" id="short_description_english" class="jqte-test form-control product" name="short_description_english" required><?php echo isset($product->short_description_english)?$product->short_description_english:"";?></textarea>
					</div> 
			</div>  
			<div class="x_content">
					<div class="form-group has-feedback">  
					  <label for="fullname">Product Short Description (Tamil) * :</label>
                      <textarea style="resize:none;height:200px;" id="short_description_tamil" class="jqte-test form-control product" name="short_description_tamil" required><?php echo isset($product->short_description_tamil)?$product->short_description_tamil:"";?></textarea>
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
	
	$('.summernote').summernote({
	height:300,
	
   toolbar: [
                ["style", ["style"]],
                ["font", ["bold", "underline", "clear"]],
                ["fontname", ["fontname"]],
                ["color", ["color"]],
                ["para", ["ul", "ol", "paragraph"]],
                ["table", ["table"]],
                ["insert", ["link","video"]],
                ["view", ["fullscreen", "codeview", "help"]]
            ],
	
    });
	$('.product').summernote({
	height:300,
	
   toolbar: [
                ["style", ["style"]],
                ["font", ["bold", "underline", "clear"]],
                ["fontname", ["fontname"]],
                ["color", ["color"]],
                ["para", ["ul", "ol", "paragraph"]],
                ["table", ["table"]],
                ["insert", ["link"]],
                ["view", ["fullscreen", "codeview", "help"]]
            ],
	
    });
              
	$("input").on("paste",function(e){
    	$("#documentID").focus();
	});
		
	$("#category_id").change(function(){
		
				
				$.ajax({
					url: "<?php echo base_url()?>products/get_subcategories",
					method: "POST",
					dataType: "json",
					data: {
						category_id: $(this).val()
					},
					success: function( data ) {		
						str = '';
						$.each(data,function(id,val){
							str += '<option value="'+val.id+'">'+val.value+'</option>';
						});
						if(str)
							$("#subcategory_id").html(str);
						else
							$("#subcategory_id").html("<option value='0'>No Subcategory</option>");
					}
				});
		
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
	
	
				$(document).on('click',".remove_1, .remove_2, .remove_3", function() {
						cls = $(this).attr("class");
						cls = cls.split("_");
						
						$("#image"+cls[1]).show();
						$(".image_"+cls[1]).remove();
						$(this).remove();
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

<style>
.remove_1, .remove_2, .remove_3{
	cursor:pointer;
}
</style>