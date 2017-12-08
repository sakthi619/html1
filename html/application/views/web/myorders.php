 <!-- SHOPING-CART-AREA   -->
    <div class="shoping-cart section-padding">
        <div class="container">
            <div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="headline">
                    <h2><?php echo get_lang('my_orders'); ?></h2>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="cart-product item"><?php echo get_lang('Order_ID'); ?></th>
                                <th class="cart-product-name item"><?php echo get_lang('Order_Date'); ?></th>
                                <th class="cart-qty item"><?php echo get_lang('Quantity'); ?></th>
                                <th class="cart-unit item"><?php echo get_lang('Total_Price'); ?></th>
                                <th class="cart-unit item"><?php echo get_lang('Status'); ?></th>
                                <th class="cart-romove item"><?php echo get_lang('Action'); ?></th>
                            </tr>
                        </thead>
                        <!-- /thead -->                    
                        <tbody>
							<?php
							$total = array();
							if(isset($orders) && !empty($orders)){
								foreach($orders as $tmp){
									
							?>
						
                            <tr>
                                <td class="cart-image">
                                    <?php echo get_order_id($tmp->oid);?>
                                </td>
                                <td class="cart-image" align="right">
                                    <?php echo date('d-m-Y H:i:s',strtotime($tmp->createdTime));?>
                                </td>
                                <td class="cart-image" align="right">
                                    <?php echo $tmp->quantity;?>
                                </td>
                                <td class="cart-image" align="right">
                                    <?php echo get_lang('Rs');?><?php echo $tmp->total;?>
                                </td>
                                <td class="cart-image" align="right">
                                   <?php 
								   if($tmp->status == 1){
									   echo "New";
								   }else  if($tmp->status == 2){
									   echo "Dispatched";
								   }else if($tmp->status == 3){
									   echo "Delivered";
								   }else{
									   echo "Failed";
								   }
								   ?>
                                </td>
                                <td class="cart-image" align="center">
									<a href="<?php echo base_url()?>web/order/<?php echo $tmp->oid;?>">
										<?php echo get_lang('View_Order'); ?>
									</a>
                                </td>
                                
                               
                            </tr>
                           
							<?php
								
								}
							}else{ 
							?>
							<tr>
								<td colspan="5"><center><h2><?php echo get_lang('No_Orders'); ?></h2></center></td>
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