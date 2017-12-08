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
		
		<a class="btn btn-primary fa fa-plus" href="<?php echo base_url()?>subcategories/create"> Add New</a>
		<?php
		/*$catArr = array();
		if(isset($categories) && !empty($categories)){
			foreach($categories as $tmp){
				$catArr[$tmp->parent_id][$tmp->cid][] = $tmp->category_name;
			}
		}
		echo "<pre>";
			print_r($catArr);
		echo "</pre>";*/
		?>
		<div class="x_content">

				<table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th width="10%">S.No</th>
                          <th>Subcategory Name (English)</th>
                          <th>Subcategory Name (Tamil)</th>
                          <th width="20%">Action</th>
                        </tr>
                      </thead>


                      <tbody>
					
						<?php
						if(isset($subcategories) && !empty($subcategories)){
							$i = 1;
							foreach($subcategories as $tmp){
						?>
                        <tr>
                          <td><?php echo $i++;?></td>
                          <td>
							<?php 							
								echo $tmp->subcategory_name_english;
							?>
						  </td>
						  <td>
							<?php 							
								echo $tmp->subcategory_name_tamil;
							?>
						  </td>
                          
                          <td><a href="<?php echo base_url()?>subcategories/edit/<?php echo $tmp->scid;?>" class="fa fa-pencil"> Edit</a> | <a href="<?php echo base_url()?>subcategories/delete/<?php echo $tmp->scid;?>" class="fa fa-trash delete"> Delete</a></td>
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

<script>
$(document).ready(function(){
	$(document).on("click",".delete",function(e){
			e.preventDefault();
			c = confirm("Do you want to delete the category?");
			if(c)
				window.location.href = $(this).attr("href");
	});
});
</script>
