 <!-- SHOPING-CART-AREA   -->
    <div class="shoping-cart section-padding">
        <div class="container">
            <div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="headline">
                    <h2><?php echo get_lang('Shopping_cart'); ?></h2>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="cart-product item"><?php echo get_lang('Product'); ?></th>
                                <th class="cart-product-name item"><?php echo get_lang('Product_Name'); ?></th>
                                <th class="cart-qty item"><?php echo get_lang('Quantity'); ?></th>
                                <th class="cart-unit item"><?php echo get_lang('Unit_price'); ?></th>
                                <th class="cart-sub-total last-item"><?php echo get_lang('Sub total'); ?></th>
                                <th class="cart-romove item"><?php echo get_lang('Remove'); ?></th>
                            </tr>
                        </thead>
                        <!-- /thead -->                    
                        <tbody>
							<?php
							$total = array();
							if(isset($cart) && !empty($cart)){
								foreach($cart as $var => $tmp){
									
							?>
						
                            <tr>
                                <td class="cart-image">
                                    <a href="#" class="entry-thumbnail">
                                        <img src="<?php echo get_product_image($var);?>" alt="">
                                    </a>
                                </td>
                                <td class="cart-product-name-info">
									<div class="cc-tr-inner">
										<h4 class="cart-product-description">
											<a href="<?php echo base_url();?>web/product/<?php echo $var;?>">
												<?php echo $tmp['productname'];?>
											</a>
										</h4>
										
								   </div>
                                </td>
                                <td class="cart-product-quantity">
                                    <div class="quant-input">
                                        <input type="number" size="4" class="input-text qty text" title="Qty" value="<?php echo $tmp['quantity'];?>" id="<?php echo $var;?>" name="quantity[113]" max="100" min="0" step="1">
                                    </div>
                                </td>
                                <td class="cart-product-price"><div class="cc-pr"><?php echo get_lang('Rs'); ?><span id="price_<?php echo $var;?>"><?php echo number_format($tmp['price'],2);?></span></div></td>
                                <td class="cart-product-sub-total"><div class="cc-pr"><?php echo get_lang('Rs'); ?><span class="totalAmt" id="total_<?php echo $var;?>"><?php echo number_format($tmp['quantity']*$tmp['price'],2);?></span></div></td>
                                <td class="romove-item">
                                    <a href="<?php echo base_url()?>web/remove_cart_item/<?php echo $var;?>"><img src="<?php echo base_url()?>site/web/images/remove.png" alt="">
                                    </a>
                                </td>
                            </tr>
                           
							<?php
								$total[] = $tmp['quantity']*$tmp['price'];
								}
							}else{ 
							?>
							<tr>
								<td colspan="6"><center><h2><?php echo get_lang('Cart_is_empty'); ?></h2></center></td>
							</tr>
							<?php } ?>
                        </tbody>
						<tfoot>
                            <tr>
                                <td colspan="6">
                                    <div class="shopping-cart-btn">
                                        <button type="button" class="btn btn-default left-cart continue_shop"><?php echo get_lang('Continue_Shopping'); ?></button>
										
                                     <button type="button" class="btn btn-default right-cart right-margin checkout_btn"><?php echo get_lang('Checkout'); ?></button>
									
									
                                        <button type="button" class="btn btn-default right-cart clear_cart"><?php echo get_lang('Clear_shopping_cart'); ?></button>
                                    </div>
									
					<!---				
					<div class="shopping-cart-btn minimum_error" style="<?php if(array_sum($total) >= 200){ ?> display:none;	<?php } ?>">
						<p class="pull-right" style="margin-right:40px;color:red;">Minimum Amount to checkout is Rs.200</p>
					</div> -->
									
                                    <!-- /.shopping-cart-btn -->
                                </td>
                            </tr>
                        </tfoot>
                        <!-- /tbody -->
                    </table>
                    <!-- /table -->
                </div>
				</div>
            </div>
        </div>
    </div>
    <!-- SHOPING-CART-AREA:END   -->
	
<script>
$(document).ready(function(){
	
	$(document).on("change",".qty",function(){
		
			variant = $(this).attr("id");
			
			price = $("#price_"+variant).text();
			quantity = $(this).val();
			
			$("#total_"+variant).text((price * quantity).toFixed(2));
		
					$.ajax({
					  url: "<?php echo base_url();?>web/update_cart_quantity",
					  type: "POST",
					  dataType: "json",
					  data: {						
						quantity: $(this).val(),
						variant: variant
					  },
					  success: function( data ) {
						if(data.success){
							$(".categories .summary").html(data.cart);
							$(".cart_count").html(" ("+data.quantity+")");
							
							total = 0;
							$(".totalAmt").each(function(){
								total = parseFloat(total) + parseFloat($(this).text());
							});
							
							/*if(total < 200){
								$(".minimum_error").show();
								$(".right-margin").removeClass("checkout");
							}else{
								$(".minimum_error").hide();
								$(".right-margin").addClass("checkout");
							}
							*/
						}
					  }
					});
		
	});
	
	
	$(".continue_shop").click(function(){
		window.location.href = "<?php echo base_url()?>web/shop";
	});
	
	$(".clear_cart").click(function(){
		window.location.href = "<?php echo base_url()?>web/clearcart";
	});
	$(".checkout_btn").click(function(){
		window.location.href = "<?php echo base_url()?>web/checkout";
	});
});
</script>