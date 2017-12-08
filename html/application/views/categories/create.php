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

				<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?php echo base_url()?>categories/save" enctype="multipart/form-data">
				
					  <input type="hidden" name="cid" value="<?php echo isset($category->cid)?$category->cid:"";?>">
					  
				
					
					
					<div class="clear"></div>
					
				    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback name">  
						<label for="fullname">Category Name (English) * :</label>	
                        <input type="text" id="category_name_english" name="category_name_english" required="required" class="form-control" value="<?php echo isset($category->category_name_english)?$category->category_name_english:"";?>">
					</div> 
					
					<div class="clear"></div>
					
				    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback name">  
						<label for="fullname">Category Name (Tamil) * :</label>	
                        <input type="text" id="category_name_tamil" name="category_name_tamil" required="required" class="form-control" value="<?php echo isset($category->category_name_tamil)?$category->category_name_tamil:"";?>">
					</div> 
					<div class="clear"></div>
					
				    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback name">  
						<label for="fullname">Category Image * :</label>	
                        <input type="file" id="image" name="image" required="required" class="">
						<?php
						if(isset($category->image) && $category->image){
						?>
						<img src="<?php echo base_url()?>site/categories/<?php echo $category->image;?>" width="20%">
						<?php } ?>
					</div> 
					
					<div class="clear"></div>
					
                     
                      <div class="clear"></div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <a class="btn btn-primary" href="<?php echo base_url()?>categories/index">Cancel</a>
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>

                    </form>
				
				
        </div>      
	</div>      
   </div>      
</div>      
 <br />

</div>
<!-- /page content -->
<style>
.remove_image{
	cursor:pointer;
}
</style>

<script>
$(document).ready(function(){
	/*$(".category2").hide();
	$("#category2").attr("disabled",true);
	
	$("#category1").change(function(){
		
			if($(this).val() != 0){
				
				$(".category2").show();
				$("#category2").removeAttr("disabled");
			
				$.ajax({
					url: "<?php echo base_url()?>categories/get_subcategories",
					method: "POST",
					dataType: "json",
					data: {
						parent: $("#category1").val()
					},
					success: function( data ) {
						
						if(data){
							$("#category2").empty();
							$("#category2").append("<option value='"+$("#category1").val()+"'>--Parent Category--</option>");
							$.each(data, function(id,val){								
								$("#category2").append("<option value='"+val.id+"'>"+val.name+"</option>");
							});
							
						}else{
							
						}
						
					}
				});
			
			}else{
				
				$(".category2").hide();
				$("#category2").attr("disabled",true);
				
			}
				
		
	});*/
	
	$("#parent").change(function(){
		
		if($("#parent").find(':selected').attr('sub') == 1){
			$("#image").removeAttr("required");
		}else{
			$("#image").attr("required",true);
		}
		
	});
	
	$(".remove_image").click(function(){
		$("#image").show();
		$("#image").removeAttr("disabled");
		
		$(".remove_image").remove();
		$(".cat_image").remove();
	});
	
	
	
});
</script>