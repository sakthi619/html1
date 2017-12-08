    <div class="main_slider">
        <div class="tp-banner-container">
            <div class="tp-banner">
                <ul class="mychedibanner">
				
				
				<?php
				if(isset($banners) && !empty($banners)){
					foreach($banners as $tmp){
				?>
				
                    <li data-transition="zoomout" data-slotamount="7" data-link="<?php echo base_url()?>web/search/?search=<?php echo $tmp->hashtag;?>" data-masterspeed="1000">
                        
                        <img src="<?php echo base_url()?>site/banners/<?php echo $tmp->image;?>" alt="darkblurbg" data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">                    
                       
                    </li>
				
				<?php 
					}
				}
				?>
					
                   
                </ul>
                <div class="tp-bannertimer"></div>
            </div>
        </div>
    </div>
  <?php if(isset($trending) && !empty($trending)){ ?>  
  <section class="hot-deal-area section-padding">
        <div class="container">
			<div class="row">
			 
			<div class="col-md-12 col-sm-9 col-xs-12">
				     <div class="headline left-arrow">
                        <h2><?php echo get_lang("What"); ?>?</h2>
                    </div>
				<div class="hot-deal">
					
					<?php 					
						foreach($trending as $tmp){
					?>
				
					<div class="hot-single">
						<a href="<?php echo base_url()?>web/product/<?php echo $tmp->pid;?>">
							<img src="<?php echo get_product_image($tmp->pid);?>" alt="" style="height:200px;width:100%">
						</a>
						 
						<div class="wid-rating">
							<h4>
								<a href="<?php echo base_url()?>web/product/<?php echo $tmp->pid;?>" id="trendPname_<?php echo $tmp->pid;?>">
									<?php $name = "product_name_".lang(); echo $tmp->$name;?>
								</a>
							</h4>
						 
							<div class="product-wid-price">
								<ins><?php echo get_lang('Rs'); ?><span id="trendPrice_<?php echo $tmp->pid;?>"><?php echo $tmp->sale_price;?></span></ins>  
								<a href="#"><img 	class="plant-seeds" src="<?php echo base_url()?>site/web/images/plant.png"></a>
							</div>  
							<div style="clear:both;"></div>
						 	<div class="product-wid-price" style="display:table;margin-top:-20px;">
							 
							<a class="add-cart-btn add-cart-btn-trend" style="margin:0px;" id="trend_<?php echo $tmp->pid;?>"><?php echo get_lang('Add_Cart'); ?></a>
							</div>
						</div>
					</div>
					
					<?php 	
						}
					?>
					
				</div>
			</div>
			</div>
        </div>
    </section>  
	<?php } ?>
	
	
	<?php if(isset($offer) && !empty($offer) && false){ ?>
	<section class="hot-deal-area section-padding">
        <div class="container">
			<div class="row">
		 
			<div class="col-md-12 col-sm-9 col-xs-12">
				<div class="headline left-arrow">
                        <h2><?php echo get_lang('Offers');?></h2>
                    </div>
				<div class="hot-deal">
				
				<?php				
					foreach($offer as $tmp){						
				?>
				
					<div class="hot-single">
						<a href="<?php echo base_url()?>web/product/<?php echo $tmp->pid;?>">
							<img src="<?php echo get_product_image($tmp->pid);?>" alt="">
						</a>
						 
						<div class="wid-rating">
							<h4>
							<a href="<?php echo base_url()?>web/product/<?php echo $tmp->pid;?>"  id="offerPname_<?php echo $tmp->pid;?>">
								<?php $name = "product_name_".lang(); echo $tmp->$name;?>								
							</a>
							</h4>
						 
							<div class="product-wid-price">
								<ins><?php echo get_lang('Rs');?> <span id="offerPrice_<?php echo $tmp->pid;?>"><?php echo $tmp->sale_price;?></span></ins>  
								<a href="#"><img 	class="plant-seeds" src="<?php echo base_url()?>site/web/images/plant.png"></a>
							</div>  
							<div style="clear:both;"></div>
						 	<div class="product-wid-price" style="display:table;margin-top:-20px;">
							 
								<a href="#" class="add-cart-btn add-cart-btn-offer" style="margin:0px;" id="offer_<?php echo $tmp->pid;?>"><?php echo get_lang('Add_Cart'); ?></a>
							</div>
						</div>
					</div>
				
				<?php				
					}				
				?>			
					
					
				</div>
			</div>
			</div>
        </div>
    </section>  
	<?php } ?>
	
  <section id="testimonial" class="section-padding">
        <div class="testimonial-overlay">
            <div class="testimonial" >
                <div class="container" style="border:1px dashed #000;">
				 <h1 class="ribbon">
   <strong class="ribbon-content"><?php echo get_lang('Connect_with_us');?>!</strong>
</h1>
                    <div class="testimonial-slide" >
                        <div id="carousel-testimonial" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-testimonial" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-testimonial" data-slide-to="1" class=""></li>
                                <li data-target="#carousel-testimonial" data-slide-to="2" class=""></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="item">
								<div class="col-md-4 col-sm-9 col-xs-12">
								<iframe width="320" height="215" src="https://www.youtube.com/embed/I7J5XogSnVE" frameborder="0" allowfullscreen></iframe>
								<h4><?php echo get_lang('Roof_gardens');?></h4>
								</div>
								<div class="col-md-4 col-sm-9 col-xs-12">
								<iframe width="320" height="215" src="https://www.youtube.com/embed/I7J5XogSnVE" frameborder="0" allowfullscreen></iframe>
								<h4><?php echo get_lang('Roof_gardens');?></h4>
								</div>
								<div class="col-md-4 col-sm-9 col-xs-12">
								<iframe width="320" height="215" src="https://www.youtube.com/embed/I7J5XogSnVE" frameborder="0" allowfullscreen></iframe>
								<h4><?php echo get_lang('Roof_gardens');?></h4>
								</div>
								
								 
                                </div>
                                <div class="item active left">
                                   <div class="col-md-4 col-sm-9 col-xs-12">
								<iframe width="320" height="215" src="https://www.youtube.com/embed/I7J5XogSnVE" frameborder="0" allowfullscreen></iframe>
									<h4><?php echo get_lang('Roof_gardens');?></h4>
								</div>
								<div class="col-md-4 col-sm-9 col-xs-12">
								<iframe width="320" height="215" src="https://www.youtube.com/embed/I7J5XogSnVE" frameborder="0" allowfullscreen></iframe>
									<h4><?php echo get_lang('Roof_gardens');?></h4>
								</div>
								<div class="col-md-4 col-sm-9 col-xs-12">
								<iframe width="320" height="215" src="https://www.youtube.com/embed/I7J5XogSnVE" frameborder="0" allowfullscreen></iframe>
									<h4><?php echo get_lang('Roof_gardens');?></h4>
								</div>
                                </div>
                                <div class="item next left">
                                     <div class="col-md-4 col-sm-9 col-xs-12">
								<iframe width="320" height="215" src="https://www.youtube.com/embed/I7J5XogSnVE" frameborder="0" allowfullscreen></iframe>
									<h4><?php echo get_lang('Roof_gardens');?></h4>
								</div>
								<div class="col-md-4 col-sm-9 col-xs-12">
								<iframe width="320" height="215" src="https://www.youtube.com/embed/I7J5XogSnVE" frameborder="0" allowfullscreen></iframe>
									<h4><?php echo get_lang('Roof_gardens');?></h4>
								</div>
								<div class="col-md-4 col-sm-9 col-xs-12">
								<iframe width="320" height="215" src="https://www.youtube.com/embed/I7J5XogSnVE" frameborder="0" allowfullscreen></iframe>
									<h4><?php echo get_lang('Roof_gardens');?></h4>
								</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<style>
.add-cart-btn{
	cursor:pointer;
}
</style>	
	
<script>
$(document).ready(function(){

		$(document).on("click",".add-cart-btn-trend",function(){
			
			id = $(this).attr("id");
			id = id.split("_");
			pid = id[1];
			
			product = pid;
			quantity = 1;
			productname = $("#trendPname_"+pid).text();
						
			price = $("#trendPrice_"+pid).text();
					
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
		
		$(document).on("click",".add-cart-btn-offer",function(){
			
			id = $(this).attr("id");
			id = id.split("_");
			pid = id[1];
			
			product = pid;
			quantity = 1;
			productname = $("#offerPname_"+pid).text();
						
			price = $("#offerPrice_"+pid).text();
					
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
		
		
		$(".mychedibanner li img").click(function(){
			window.location.href = $(this).data("href");
		});
});
</script>  	