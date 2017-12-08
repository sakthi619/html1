 <!-- PAGE-TITLE-AREA -->
    <section class="page-title-area">
        <img src="<?php echo base_url();?>site/web/images/banner_12.jpg" style="width:100%;">
    </section>
    <!-- PAGE-TITLE-AREA:END -->
	
    
    <!-- PRODUCT-LIST-AREA  -->
    <div class="product-list-area section-padding">
        <div class="container">
            <div class="row">
			
                
                <div class="col-md-12 col-sm-9 col-xs-12">
				 <ul class="nav nav-tabs women-tab" role="tablist">
                                    <li role="presentation" ><a class="cursor"><?php echo get_lang('Price_Low_to_High'); ?></a>
                                    </li>
                                    <li role="presentation"><a class="cursor"><?php echo get_lang('Price_High_to_Low'); ?></a>
                                    </li>
                                    <li role="presentation" class="active"><a class="cursor"><?php echo get_lang('Oldest_First'); ?></a>
                                    </li>
									<li role="presentation" class=""><a class="cursor"><?php echo get_lang('Newest_First'); ?></a>
                                    </li>
                                </ul>
                    <div class="row">
					
					
					<?php 
					if(isset($garden) && !empty($garden)){
						foreach($garden as $tmp){
					?>
					
                        <div class="col-md-3 col-sm-3 col-xs-12">
                            <div class="hot-single">
						<a href="<?php echo base_url()?>web/gardenView/<?php echo $tmp->gid;?>"><img src="<?php echo get_product_image($tmp->gid);?>" alt="">
						</a>
						 
						<div class="wid-rating">
							<h4>
								<a href="<?php echo base_url()?>web/gardenView/<?php echo $tmp->gid;?>" id="shopPname_<?php echo $tmp->gid;?>">
									<?php $name = "garden_name_".lang(); echo $tmp->$name;?>
								</a>
							</h4>
						 
							<div class="product-wid-price">
								<ins><?php echo get_lang('Rs'); ?><span id="shopPrice_<?php echo $tmp->gid;?>"><?php echo $tmp->price;?></span></ins>  
								<a href="#"><img 	class="plant-seeds" src="<?php echo base_url();?>site/web/images/plant.png"></a>
							</div>  
							<div style="clear:both;"></div>
						 	<div class="product-wid-price" style="display:table;margin-top:-20px;">
							 
								<a href="#" class="add-cart-btn add-cart-btn-shop" style="margin:0px;" id="shop_<?php echo $tmp->gid;?>"><?php echo get_lang('Add_Cart'); ?></a>
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
						<h2><?php echo get_lang('No_Garden'); ?></h2>
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
				 window.location.href = "<?php echo base_url()?>web/shop/cat_"+cat.join("-")+"/plantType_"+plant_types.join("-")+"/plantPlacement_"+plant_placements.join("-")+"/plantUse_"+plant_use.join("-")+"/latest_0";
			 }else{
				window.location.href = "<?php echo base_url()?>web/shop/cat_"+cat.join("-")+"/plantType_"+plant_types.join("-")+"/plantPlacement_"+plant_placements.join("-")+"/plantUse_"+plant_use.join("-")+"/latest_1";
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
			 
			
		     window.location.href = "<?php echo base_url()?>web/shop/cat_"+cat.join("-")+"/plantType_"+plant_types.join("-")+"/plantPlacement_"+plant_placements.join("-")+"/plantUse_"+plant_use.join("-")+"/latest_1";
			 
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
			 
			
		     window.location.href = "<?php echo base_url()?>web/shop/cat_"+cat.join("-")+"/plantType_"+plant_types.join("-")+"/plantPlacement_"+plant_placements.join("-")+"/plantUse_"+plant_use.join("-")+"/latest_0";
			 
		});
		
});
</script>			