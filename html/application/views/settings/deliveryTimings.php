<link href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" rel="stylesheet">

<!-- page content -->
<div class="right_col" role="main">
 <div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
	 <div class="x_title">
			<h2><?php echo $pagetitle;?> </h2>
			<div class="clearfix"></div>
		</div>
		
		<a class="btn btn-primary fa fa-plus addTiming"> Add New</a>
		
		<div class="x_content">

				<table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th width="10%">S.No</th>
                          <th>Time Slot</th>                      
                          <th width="20%">Action</th>
                        </tr>
                      </thead>


                      <tbody>
					
						<?php
						if(isset($time) && !empty($time)){
							$i = 1;
							foreach($time as $tmp){
						?>
                        <tr>
                          <td><?php echo $i++;?></td>
                          <td id="time_<?php echo $tmp->tid;?>"><?php echo $tmp->time_slot;?></td>
                          <td><a class="fa fa-pencil editSlot" id="<?php echo $tmp->tid;?>"> Edit</a> | <a href="<?php echo base_url()?>settings/deleteDeliveryTimings/<?php echo $tmp->tid;?>" class="fa fa-trash delete"> Delete</a></td>
                        </tr>
						<?php 
							}
						}
						?>
                      </tbody>
                    </table>
            </div>      
		</div>      
		</div>      
	</div>      
 <br />

</div>
<!-- /page content -->
<style>
.addTiming, .editSlot{
	cursor:pointer;
}
</style>
<script src="<?php echo base_url()?>site/admin/jquery-ui.js"></script>
<link rel="stylesheet" href="<?php echo base_url()?>site/admin/jquery-ui.css">
<script>
$(document).ready(function(){
	
	
	$(document).on("click",".delete",function(e){
			e.preventDefault();
			c = confirm("Do you want to delete the delivery timing?");
			if(c)
				window.location.href = $(this).attr("href");
	});
	
	dialog = $( "#dialog" ).dialog({
      autoOpen: false,
      height: 150,
      width: 250,
      modal: true
    });
	
	
	$(document).on("click",".addTimeSlot",function(e){
		
				$.ajax({
					url: "<?php echo base_url()?>settings/savedeliveryTimings",
					method: "POST",
					dataType: "json",
					data: {
						tid: $("#tid").val(),
						deliveryTimings: $("#deliveryTimings").val()
					},
					success: function( data ) {		
						if(data.success){							
							if(data.redirect){
								window.location.href = "";
							}
							if(data.update){
								$("#time_"+$("#tid").val()).text($("#deliveryTimings").val());
								dialog.dialog( "close" );
							}
							$("#deliveryTimings").val("");
							$("#tid").val("");
						}
					}
				});
				
	});
	
	$(document).on("click",".addTiming",function(e){
		dialog.dialog( "open" );
	});
	
	$(document).on("click",".editSlot",function(e){
		
		tid = $(this).attr("id");
		$("#tid").val(tid);
		
		$("#deliveryTimings").val($("#time_"+tid).text());
		
		dialog.dialog( "open" );
	});
});
</script>
<div id="dialog" title="New Timing">
	<input type="hidden" id="tid" class="form-control"/>
	<div class="col-md-12 col-sm-6 col-xs-12 form-group">  
	  <label for="fullname">Time Slot * :</label>
	  <input type="text" id="deliveryTimings" class="form-control"/>
	</div> 
	<div class="form-group">
		<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">		  
		  <button type="submit" class="btn btn-success addTimeSlot">Submit</button>
		</div>
	  </div>
</div>