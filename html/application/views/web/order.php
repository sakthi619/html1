 <!-- SHOPING-CART-AREA   -->
    <div class="shoping-cart section-padding">
        <div class="container">
            <div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="headline">
                    <h2><?php echo get_lang('Order_Details '); ?>- <?php echo get_order_id($oid);?>
					</h2>
					
					<a href="<?php echo base_url()?>web/myorders" class="btn btn-primary" style="float:right"><?php echo get_lang('my_Orders'); ?></a>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="cart-product item"><?php echo get_lang('Product'); ?></th>
                                <th class="cart-product-name item"><?php echo get_lang('Product_Name'); ?></th>
                                <th class="cart-qty item"><?php echo get_lang('Quantity'); ?></th>
                                <th class="cart-unit item"><?php echo get_lang('Unit_price'); ?></th>
                                <th class="cart-unit item"><?php echo get_lang('Tax'); ?></th>
                                <th class="cart-sub-total last-item"><?php echo get_lang('Sub_total'); ?></th>
                            </tr>
                        </thead>
                        <!-- /thead -->                    
                        <tbody>
							<?php
							$total = array();
							if(isset($details) && !empty($details)){
								foreach($details as $tmp){
									
							?>
						
                            <tr>
                                <td class="cart-image">
                                    <a href="#" class="entry-thumbnail">
                                        <img src="<?php echo get_product_image($tmp->pid);?>" alt="">
                                    </a>
                                </td>
                                <td class="cart-product-name-info">
									<div class="cc-tr-inner">
										<h4 class="cart-product-description">
											<a href="<?php echo base_url();?>web/product/<?php echo $tmp->pid;?>">
												<?php echo $tmp->product_name_english;?>
											</a>
										</h4>
								   </div>
                                </td>
                                <td class="cart-product-quantity">
                                    <div class="quant-input">
                                        <?php echo $tmp->quantity;?>
                                    </div>
                                </td>
                                <td class="cart-product-price"><div class="cc-pr"><?php echo get_lang('Rs'); ?><?php echo number_format($tmp->price,2);?></div></td>
                                <td class="cart-product-price"><div class="cc-pr"><?php echo number_format($tmp->tax,2);?>%</div></td>
                                <td class="cart-product-sub-total"><div class="cc-pr"><?php echo get_lang('Rs'); ?><?php echo number_format(($tmp->price * $tmp->quantity),2);?></div></td>
                                
                            </tr>
                           
							<?php
								$total[] = $tmp->price * $tmp->quantity;
								}
							?>	
							<tr>
								<td colspan='5' align="right"><h4><?php echo get_lang('Sub_total'); ?></h4></td>
								<td class="cart-product-price"><h4><?php echo get_lang('Rs'); ?><?php echo number_format($order->subtotal,2);?></h4></td>
							</tr>
							<tr>
								<td colspan='5' align="right"><?php echo get_lang('Offer_Discount'); ?></td>
								<td class="cart-product-price"><?php echo get_lang('Rs'); ?><?php echo number_format($order->offer_amount,2);?></td>
							</tr>
							<tr>
								<td colspan='5' align="right"><?php echo get_lang('Coupon_Discount'); ?></td>
								<td class="cart-product-price"><?php echo get_lang('Rs'); ?><?php echo number_format($order->coupon_amount,2);?></td>
							</tr>
							<tr>
								<td colspan='5' align="right"><?php echo get_lang('Shipping_Charge'); ?></td>
								<td class="cart-product-price"><?php echo get_lang('Rs'); ?><?php echo number_format($order->delivery,2);?></td>
							</tr>
							<tr>
								<td colspan='5' align="right"><h3><?php echo get_lang('Total'); ?></h3></td>
								<td class="cart-product-price"><h3><?php echo get_lang('Rs'); ?><?php echo number_format(($order->subtotal + $order->delivery - ($order->offer_amount + $order->coupon_amount)),2);?></h3></td>
							</tr>
							<?php	
							}else{ 
							?>
							<tr>
								<td colspan="6"><center><h2><?php echo get_lang('Cart_is_empty'); ?></h2></center></td>
							</tr>
							<?php } ?>
                        </tbody>
						
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
			
			$("#total_"+variant).text(price * quantity);
		
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
							$(".logo_right .summary").html(data.cart);
							
							total = 0;
							$(".totalAmt").each(function(){
								total = parseFloat(total) + parseFloat($(this).text());
							});
							
							if(total < 200){
								$(".minimum_error").show();
								$(".right-margin").removeClass("checkout");
							}else{
								$(".minimum_error").hide();
								$(".right-margin").addClass("checkout");
							}
							
						}
					  }
					});
		
	});
});
</script>