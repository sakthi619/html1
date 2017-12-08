 <!-- PAGE-TITLE-AREA -->
    <section class="page-title-area">
        <img src="<?php echo base_url();?>site/web/images/banner_12.jpg" style="width:100%;">
    </section>
    <!-- PAGE-TITLE-AREA:END -->
	
    
    <!-- PRODUCT-LIST-AREA  -->
    <div class="product-list-area section-padding">
        <div class="container">
            <div class="row">
			
			<?php
			if(isset($subcategories) && !empty($subcategories)){?>
			<center>
				<h3><?php echo get_lang('Sub_Categories'); ?></h3>
			</center>
			<?php
				foreach($subcategories as $tmp){
			?>
				
				<div class="col-md-3 col-sm-3 col-xs-12">
					<div class="hot-single hot-category">
						<a href="<?php echo base_url()?>web/subcategory/latest_1/<?php echo $tmp->scid;?>"><img src="<?php echo base_url()?>site/categories/<?php echo $tmp->image;?>" alt="" style="height:200px;width:100%">
						</a>
						
						<div class="wid-rating">
							<h4>
								<a href="<?php echo base_url()?>web/subcategory/latest_1/<?php echo $tmp->scid;?>">
									<?php $name = "subcategory_name_".lang(); echo $tmp->$name;?>
								</a>
							</h4>
						</div>
						
					</div>
				</div>
				
			<?php	
				}
			}			
			?>
					
					
			
			
			
           
                <div class="col-md-12 col-sm-12 col-xs-12"><br><br>
				 <ul class="nav nav-tabs women-tab" role="tablist">
									<li role="presentation" class="<?php if(isset($selPrice) && $selPrice == 0){?>active<?php } ?> low_first" ><a class="cursor"><?php echo get_lang('Price_Low_to_High'); ?></a>
                                    </li>
                                    <li role="presentation" class="<?php if(isset($selPrice) && $selPrice == 1){?>active<?php } ?> high_first" ><a class="cursor"><?php echo get_lang('Price_High_to_Low');?></a>
                                    </li>
                                    <li role="presentation" class="<?php if(isset($selLatest) && $selLatest == 0){?>active<?php } ?> old_first"><a class="cursor"><?php echo get_lang('Oldest_First'); ?></a>
                                    </li>
									<li role="presentation" class="<?php if(isset($selLatest) && $selLatest == 1){?>active<?php } ?> new_first"><a class="cursor"><?php echo get_lang('Newest_First'); ?></a>
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
								<ins><?php echo get_lang('Rs'); ?><span id="shopPrice_<?php echo $tmp->pid;?>"><?php echo $tmp->sale_price;?></span></ins>  
								<a href="#"><img 	class="plant-seeds" src="<?php echo base_url();?>site/web/images/plant.png"></a>
							</div>  
							<div style="clear:both;"></div>
						 	<div class="product-wid-price" style="display:table;margin-top:-20px;">
							 
								<a class="cursor add-cart-btn add-cart-btn-shop" style="margin:0px;" id="shop_<?php echo $tmp->pid;?>"><?php echo get_lang('Add Cart');?></a>
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
						<h2><?php echo get_lang('No_Products'); ?></h2>
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
	
	.hot-category{
		min-height:230px !important;
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
		
		

		
		
		$(document).on("click",".new_first",function(){			
		     window.location.href = "<?php echo base_url()?>web/category/latest_1/0/<?php echo $category;?>";
			 
		});
		$(document).on("click",".old_first",function(){	
		     window.location.href = "<?php echo base_url()?>web/category/latest_0/0/<?php echo $category;?>";
			 
		});
		$(document).on("click",".low_first",function(){	
		     window.location.href = "<?php echo base_url()?>web/category/0/price_0/<?php echo $category;?>";		 
		});
		$(document).on("click",".high_first",function(){	
		     window.location.href = "<?php echo base_url()?>web/category/0/price_1/<?php echo $category;?>";		 
		});
});
</script>			