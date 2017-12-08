 <!-- PAGE-TITLE-AREA -->
    <section class="page-title-area">
        <img src="<?php echo base_url();?>site/web/images/banner_12.jpg" style="width:100%;">
    </section>
    <!-- PAGE-TITLE-AREA:END -->
	
    
    <!-- PRODUCT-LIST-AREA  -->
    <div class="product-list-area section-padding">
        <div class="container">
            <div class="row">
			
                <div class="col-md-3 col-sm-3 col-xs-12">
                    <div class="brands">
                        <h3><?php echo get_lang('Categories');?></h3>
                        <ul>
							<?php
							if(isset($categories) && !empty($categories)){
								foreach($categories as $tmp){
							?>
                            <li> 
								<input type="checkbox" <?php echo in_array($tmp->cid,$selCategories)?"checked":"";?> class="categories" value="<?php echo $tmp->cid; ?>"> <?php echo $tmp->category_name_english; ?> <span>(0)</span>
							</li>
							<?php
								}
							}
							?>
                            
                        </ul>
                    </div>
					<div class="brands">
                        <h3><?php echo get_lang('PLANT_TYPE');?>  </h3>
                        <ul>
							<?php
							if(isset($plant_types) && !empty($plant_types)){
								foreach($plant_types as $tmp){
							?>
                            <li> 
								<input type="checkbox" <?php echo in_array($tmp->type_id,$selTypes)?"checked":"";?> class="plant_types" value="<?php echo $tmp->type_id; ?>"> <?php echo $tmp->type_english; ?> <span>(0)</span>
							</li>
							<?php
								}
							}
							?>
                            
                        </ul>
                    </div>
					<div class="brands">
                        <h3><?php echo get_lang('PLANT_PLACEMENT');?>  </h3>
                        <ul> 
							<?php
							if(isset($plant_placements) && !empty($plant_placements)){
								foreach($plant_placements as $tmp){
							?>
                            <li> 
								<input type="checkbox" <?php echo in_array($tmp->id,$selPlacements)?"checked":"";?> class="plant_placements" value="<?php echo $tmp->id; ?>"> <?php echo $tmp->placement_english; ?> <span>(0)</span>
							</li>
                            <?php
								}
							}
							?>
                            
                        </ul>
                    </div>
					<div class="brands">
                        <h3><?php echo get_lang('PLANT_USE');?>  </h3>
                        <ul>
							<?php
							if(isset($plant_use) && !empty($plant_use)){
								foreach($plant_use as $tmp){
							?>
                            <li> 
								<input type="checkbox" <?php echo in_array($tmp->id,$selUses)?"checked":"";?> class="plant_use" value="<?php echo $tmp->id; ?>"> <?php echo $tmp->use_english; ?> <span>(0)</span>
                            </li>
                            <?php
								}
							}
							?>
							
                            
                        </ul>
                    </div>
                    <!-- <div class="filter">
                        <h3>Filter by price</h3>
                        <div class="filter_inner">
							<div id="slider-range"></div>
							<div class="f_price">
								<div class="filter_a">
									<a href="">Filter</a>
								</div>
								<div class="cat_filter_box">
									<p>
									  <input type="text" id="amount" readonly style="border:0; color:#000; font-weight:bold;">
									</p>
								</div>
							</div>
						</div>
                    </div>
                      -->
                   
                </div>
                <div class="col-md-9 col-sm-9 col-xs-12">
				 <ul class="nav nav-tabs women-tab" role="tablist">
                                    <li role="presentation" ><a class="cursor"></a>
                                    </li>
                                    <li role="presentation"><a class="cursor"><?php echo get_lang(' Price_High_to_Low');?></a>
                                    </li>
                                    <li role="presentation" class="<?php if($selLatest == 0){?>active<?php } ?> old_first"><a class="cursor"><?php echo get_lang('Oldest_First');?></a>
                                    </li>
									<li role="presentation" class="<?php if($selLatest == 1){?>active<?php } ?> new_first"><a class="cursor"><?php echo get_lang('Newest_First');?></a>
                                    </li>
                                </ul>
                    <div class="row">
					
					
					<?php 
					if(isset($products) && !empty($products)){
						foreach($products as $tmp){
					?>
					
                        <div class="col-md-3 col-sm-3 col-xs-12">
                            <div class="hot-single">
						<a href="<?php echo base_url()?>web/product/<?php echo $tmp->pid;?>"><img src="<?php echo get_product_image($tmp->pid);?>" alt="" style="height:200px;width:100%">
						</a>
						 
						<div class="wid-rating">
							<h4>
								<a href="<?php echo base_url()?>web/product/<?php echo $tmp->pid;?>" id="shopPname_<?php echo $tmp->pid;?>">
									<?php $name = "product_name_".lang(); echo $tmp->$name;?>
								</a>
							</h4>
						 
							<div class="product-wid-price">
								<ins><?php echo get_lang('Rs');?><span id="shopPrice_<?php echo $tmp->pid;?>"><?php echo $tmp->sale_price;?></span></ins>  
								<a href="#"><img 	class="plant-seeds" src="<?php echo base_url();?>site/web/images/plant.png"></a>
							</div>  
							<div style="clear:both;"></div>
						 	<div class="product-wid-price" style="display:table;margin-top:-20px;">
							 
								<a href="#" class="add-cart-btn add-cart-btn-shop" style="margin:0px;" id="shop_<?php echo $tmp->pid;?>"><?php echo get_lang('Add_Cart');?></a>
							</div>
						</div>
					</div>
                        </div>
						
                    <?php
						}
					}else{
					?>
					<br><br><br>
					<center>
						<h2><?php echo get_lang('No_Products');?></h2>
					</center>
					<?php } ?>
                      
                        
                       
                       
                      
                     
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- PRODUCT-LIST:END -->
	<style>
	a.add-cart-btn{padding: 5px 10px;}
	.cursor{
		cursor:pointer;
	}
	</style>
<script>
$(document).ready(function(){

		$(document).on("click",".add-cart-btn-shop",function(){
			
			id = $(this).attr("id");
			id = id.split("_");
			pid = id[1];
			
			product = pid;
			quantity = 1;
			productname = $("#shopPname_"+pid).text();
						
			price = $("#shopPrice_"+pid).text();
					
					$.ajax({
					  url: "<?php echo base_url();?>web/update_cart",
					  type: "POST",
					  dataType: "json",
					  data: {
						productname: productname,
						quantity: quantity,
						product: product,
						price: price
					  },
					  success: function( data ) {
						if(data.success){
							$(".categories .summary").html(data.cart);
							$(".cart_count").html(" ("+data.quantity+")");
							//$(".added_sucess").show();
						}
					  }
					});
			
		});
		
		
		
		
		$(document).on("change",".categories",function(){
			 cat = [];
			 $(".categories:checked").each(function(){
				 cat.push($(this).val());
			 });
			 
			 plant_types = [];
			 $(".plant_types:checked").each(function(){
				 plant_types.push($(this).val());
			 });
			 
			 plant_placements = [];
			 $(".plant_placements:checked").each(function(){
				 plant_placements.push($(this).val());
			 });
			 
			 plant_use = [];
			 $(".plant_use:checked").each(function(){
				 plant_use.push($(this).val());
			 });
			 
			 
			 if($(".old_first").hasClass("active")){
				 window.location.href = "<?php echo base_url()?>web/subcategory/cat_"+cat.join("-")+"/plantType_"+plant_types.join("-")+"/plantPlacement_"+plant_placements.join("-")+"/plantUse_"+plant_use.join("-")+"/latest_0";
			 }else{
				window.location.href = "<?php echo base_url()?>web/subcategory/cat_"+cat.join("-")+"/plantType_"+plant_types.join("-")+"/plantPlacement_"+plant_placements.join("-")+"/plantUse_"+plant_use.join("-")+"/latest_1";
			 }		
		     
			 
		});
		
		$(document).on("change",".plant_types",function(){
			$(".categories").trigger("change");
		});
		$(document).on("change",".plant_placements",function(){
			$(".categories").trigger("change");
		});
		$(document).on("change",".plant_use",function(){
			
		});
		
		$(document).on("click",".new_first",function(){			
			 cat = [];
			 $(".categories:checked").each(function(){
				 cat.push($(this).val());
			 });
			 
			 plant_types = [];
			 $(".plant_types:checked").each(function(){
				 plant_types.push($(this).val());
			 });
			 
			 plant_placements = [];
			 $(".plant_placements:checked").each(function(){
				 plant_placements.push($(this).val());
			 });
			 
			 plant_use = [];
			 $(".plant_use:checked").each(function(){
				 plant_use.push($(this).val());
			 });
			 
			
		     window.location.href = "<?php echo base_url()?>web/subcategory/cat_"+cat.join("-")+"/plantType_"+plant_types.join("-")+"/plantPlacement_"+plant_placements.join("-")+"/plantUse_"+plant_use.join("-")+"/latest_1";
			 
		});
		$(document).on("click",".old_first",function(){			
			 cat = [];
			 $(".categories:checked").each(function(){
				 cat.push($(this).val());
			 });
			 
			 plant_types = [];
			 $(".plant_types:checked").each(function(){
				 plant_types.push($(this).val());
			 });
			 
			 plant_placements = [];
			 $(".plant_placements:checked").each(function(){
				 plant_placements.push($(this).val());
			 });
			 
			 plant_use = [];
			 $(".plant_use:checked").each(function(){
				 plant_use.push($(this).val());
			 });
			 
			
		     window.location.href = "<?php echo base_url()?>web/subcategory/cat_"+cat.join("-")+"/plantType_"+plant_types.join("-")+"/plantPlacement_"+plant_placements.join("-")+"/plantUse_"+plant_use.join("-")+"/latest_0";
			 
		});
		
});
</script>			