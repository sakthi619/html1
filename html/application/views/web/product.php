 <!-- PRODUCT-LIST-AREA -->
    <div class="single-product-area section-padding">
        <div class="container">
            <div class="row">
                
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="single-product-details">
                        <div class="row">
                            <div class="col-md-5 col-sm-6 col-xs-12">
                                <div class="product-img-detail">
										
									<div class="single_product_image">
										<input type="hidden" id="__VIEWxSTATE" />
										<ul id='zoom1' class=''>
											<?php 
											if(file_exists('./site/products/'.$images->image_1)){
											?>
											<li>
												<img src="<?php echo base_url();?>site/products/<?php echo $images->image_1;?>" alt='image1' />
											</li>
											<?php } if($images->image_2 && file_exists('./site/products/'.$images->image_2)){ ?>
											<li>
												<img src="<?php echo base_url();?>site/products/<?php echo $images->image_2;?>" alt='image2' />
											</li>
											<?php } if($images->image_3 && file_exists('./site/products/'.$images->image_3)){ ?>
											<li>
												<img src="<?php echo base_url();?>site/products/<?php echo $images->image_3;?>" alt='image3' />
											</li>
											<?php } ?>
										</ul>
									</div>
									
                                </div>
                            </div>
                            <div class="col-md-7 col-sm-6 col-xs-12">
                                <div class="single-product-content">
                                    <h3 id="viewPname"><?php $name = "product_name_".lang(); echo $product->$name;?></h3>
                                    <div class="product-review">
                                       <div class="product-wid-price">
                                            <ins><?php echo get_lang('Price'); ?>:&#8377 <span id="viewPrice"><?php echo $product->sale_price;?></span></ins> <del>&#8377 <?php echo $product->retail_price;?></del>
                                        </div>
                                      <?php $name = "short_description_".lang(); echo $product->$name;?>
                                    
                                        
                                      
                                    </div>  <p></p>
									<!--  <p></p>
                                    <div class="single-color">
                                       
                                        <div class="product-size">
                                            <p>Weight :</p>
                                            <select>
                                                <option>100 Grms</option>
                                                <option>200 Grams</option>
                                                <option>500 Grams</option>
                                             
                                            </select>
                                        </div>
                                    </div>
                                    -->
                                    <div class="single-color last-color-child">
                                        <div class="size-heading">
                                            <h5><?php echo get_lang('Qty'); ?> :</h5>
                                        </div>
                                        <div class="size-down">
                                            <input type="number" step="1" min="1" max="10" name="quantity[]" value="1" title="Qty" class="input-text qty text" id="viewQuanity" style="width:75px">
                                        </div>
										<br><br>
                                        <div class="size-cart" style="margin-left:50px;">
										<a class="fa fa-shopping-cart add_cart_product"><?php echo get_lang('Add_Cart'); ?></a>
                                        </div>
                                    </div>
									<?php $name = "description_".lang(); echo $product->$name;?>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                    
                </div>
            </div>
        </div>
    </div>

	<section class="hot-deal-area section-padding">
        <div class="container">
			<h3><?php echo get_lang('Related_Products'); ?></h3>
			<div class="row">

			
			<div class="col-md-12 col-sm-9 col-xs-12">
				
				<div class="hot-deal">
				
					<?php
					if(isset($related) && !empty($related)){
						foreach($related as $tmp){
					?>
				
					<div class="hot-single" style="height:325px !important;">
						<a href="<?php echo base_url();?>web/product/<?php echo $tmp->pid;?>">
						<img src="<?php echo get_product_image($tmp->pid);?>" alt="" style="height:200px;width:100%">
						</a>
						 
						<div class="wid-rating">
							<h4><a href="<?php echo base_url();?>web/product/<?php echo $tmp->pid;?>"><?php echo $tmp->product_name_english;?></a></h4>
						 
							<div class="product-wid-price" id="rprice_<?php echo $tmp->pid;?>">
								<ins><?php echo get_lang('Rs'); ?><span><?php echo $tmp->sale_price;?></span></ins>  
								  								
							</div>
							
							
							<div class="product-wid-price">
								 <div class="product-size1">
                                
                                        </div>
							<a class="add-cart-btn" style="cursor:pointer" id="add_<?php echo $tmp->pid;?>"  tproduct="<?php echo $tmp->pid;?>"><?php echo get_lang('Add_Cart'); ?></a>
							</div>
						 
						</div>
					</div>
					
					<?php
						}
					}
					?>
				</div>
			</div>
			</div>
        </div>
    </section>
	
	
<script src="<?php echo base_url();?>site/web/js/modernizr-2.6.2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>site/web/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>site/web/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>	
<script src="<?php echo base_url();?>site/web/js/jquery.glasscase.minf195.js"></script>
<link rel="stylesheet" href="<?php echo base_url();?>site/web/css/glasscase.css">
<link rel="stylesheet" href="<?php echo base_url();?>site/web/css/glasscase.minf195.css">
<script type="text/javascript">
	$(function () {
		//ZOOM 
		$("#zoom1").glassCase({ 'widthDisplay': 456, 'heightDisplay': 470, 'isSlowZoom': true });
	});
</script>
<style>
.product-wid-price ins{width:50%;border-bottom:0px;}
.add_cart_product{
	cursor:pointer;
}
</style>	



<script>
$(document).ready(function(){

		$(document).on("click",".add_cart_product",function(){
			
			pid = <?php echo $pid;?>;
			
			product = pid;
			quantity = $("#viewQuanity").val();
			productname = $("#viewPname").text();
						
			price = $("#viewPrice").text();
					
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
});
</script>			