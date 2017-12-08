    <section class="password-change">
        <div class="container">
            <div class="row">
			  <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="headline">
                    <h2>ADDRESS</h2>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="change-form change_form">
                        <form method="POST" action="<?php echo base_url()?>web/update_address">
						
						
						  <input type="hidden" id="id"  name="id" class="required" value="<?php echo $address->cid; ?> ">
						
								NAME* <span id="error_name" class="error_class"></span>
                            <br>
                            <input type="text" id="name"  name="name" class="required" value="<?php echo $address->address_name; ?> ">
                            <br>   
								HOUSE NO* <span id="error_house" class="error_class"></span>
                            <br>
                            <input type="text" id="house"  name="house" class="required" value="<?php echo $address->house_no; ?> ">
                            <br> 
							
								RESIDENTIAL* <span id="error_residential" class="error_class"></span>
                            <br>
                            <input type="text" id="residential"  name="residential" class="required" value="<?php echo $address->residential; ?>">
                            <br> 
							
								STREET* <span id="error_street" class="error_class"></span>
                            <br>
                            <input type="text" id="street"  name="street" class="required" value="<?php echo $address->street;?>">
                            <br> 	
							
							AREA* <span id="error_area" class="error_class"></span>
                            <br>
                            <input type="text" id="area"  name="area" class="required" value="<?php echo $address->area;?> ">
                            <br> 
							
							CITY* <span id="error_city" class="error_class"></span>
                            <br>
                            	<select name="city" id="city" class="form-control mak">
									<option value="">Select..</option>
									<?php
									foreach($city as $tmp){
									?>
									<option value="<?php echo $tmp->city_id; ?>"<?php if(isset($city) && $tmp->city_id == $address->city){  ?> selected <?php }?>
									><?php echo $tmp->name; ?></option>
									<?php
									}
									?>
									</select>
                            <br> 	
							LANDMARK* <span id="error_landmark" class="error_landmark"></span>
                            <br>
                            <input type="text" id="landmark"  name="landmark" class="required" value="<?php echo $address->landmark;?> ">
                            <br> 
							       <input type="submit" >
                        </form>
                    </div> 
				</div> 
			</div> 
		</div> 
	</div> 
	</section> 
					