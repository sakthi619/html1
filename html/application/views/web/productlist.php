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
                        <h3><?php echo get_lang('PLANT_TYPE');?>  </h3>
                        <ul>
                            <li> <input type="checkbox" name="vehicle" value="Bike"><?php echo get_lang('Herbs');?>  <span>(03)</span></li>
                            <li> <input type="checkbox" name="vehicle" value="Bike"><?php echo get_lang('Shrubs');?><span>(03)</span></li>
                            <li> <input type="checkbox" name="vehicle" value="Bike"><?php echo get_lang('Pernnials');?> <span>(05)</span>
                            </li>
                            
                        </ul>
                    </div>
					<div class="brands">
                        <h3><?php echo get_lang('PLANT_PLACEMENT');?></h3>
                        <ul> 
                            <li> <input type="checkbox" name="vehicle" value="Bike"><?php echo get_lang('ndoor');?><span>(03)</span></li>
                            <li> <input type="checkbox" name="vehicle" value="Bike"><?php echo get_lang('Terrace');?><span>(03)</span></li>
                            <li> <input type="checkbox" name="vehicle" value="Bike"><?php echo get_lang('Balcony');?><span>(05)</span>
                            </li>
                            
                        </ul>
                    </div>
					<div class="brands">
                        <h3><?php echo get_lang('PLANT_USE');?></h3>
                        <ul>
                            <li> <input type="checkbox" name="vehicle" value="Bike"><?php echo get_lang('Aromatic');?>  <span>(03)</span>
                            </li>
                            <li> <input type="checkbox" name="vehicle" value="Bike"><?php echo get_lang(' Ornamental');?>  <span>(05)</span>
                            </li>
                            
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
                                    <li role="presentation" ><a href="#"><?php echo get_lang('Price_Low_to_High');?></a>
                                    </li>
                                    <li role="presentation"><a href="#"><?php echo get_lang('Price_High to_Low');?></a>
                                    </li>
                                    <li role="presentation" class="active"><a href="#" ><?php echo get_lang('Newest_First');?></a>
                                    </li>
                                </ul>
                    <div class="row">
					
					
					<?php 
					if(isset($products) && !empty($products)){
						foreach($products as $tmp){
					?>
					
                        <div class="col-md-3 col-sm-3 col-xs-12">
                            <div class="hot-single">
						<a href="<?php echo base_url()?>web/product/<?php echo $tmp->pid;?>"><img src="<?php echo get_product_image($tmp->pid);?>" alt="">
						</a>
						 
						<div class="wid-rating">
							<h4>
								<a href="<?php echo base_url()?>web/product/<?php echo $tmp->pid;?>">
									<?php $name = "product_name_".lang(); echo $tmp->$name;?>
								</a>
							</h4>
						 
							<div class="product-wid-price">
								<ins><?php echo get_lang('Rs');?><?php echo $tmp->sale_price;?></ins>  
								<a href="#"><img 	class="plant-seeds" src="<?php echo base_url();?>site/web/images/plant.png"></a>
							</div>  
							<div style="clear:both;"></div>
						 	<div class="product-wid-price" style="display:table;margin-top:-20px;">
							 
								<a href="#" class="add-cart-btn" style="margin:0px;"><?php echo get_lang('Add_Cart');?></a>
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
	
	</style>