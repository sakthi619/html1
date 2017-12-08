<body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="<?php echo base_url()?>admin" class="site_title"><i class="fa fa-paw"></i> <span>Mychedi</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>Superadmin</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href="<?php echo base_url()?>admin/dashboard"><i class="fa fa-home"></i> Home </a>
                  </li> 
                 
                  <li><a href="<?php echo base_url()?>admin/customers"><i class="fa fa-home"></i> Registered Customers </a>
                  </li> 
                  <li><a><i class="fa fa-home"></i>Categories <span class="fa fa-chevron-down"></span></a>
					  <ul class="nav child_menu">
						<li><a href="<?php echo base_url()?>categories/index"> Categories </a </li> 
						<li><a href="<?php echo base_url()?>subcategories/index"> SubCategories </a </li> 
					  </ul>
                  </li> 
                  <li><a href="<?php echo base_url()?>banners/index"><i class="fa fa-home"></i> Banners </a>
                  </li> 
                  <li><a href="<?php echo base_url()?>suppliers/index"><i class="fa fa-home"></i> Suppliers </a>
                  </li> 
				  
                  <li>
				  <a><i class="fa fa-home"></i> Products <span class="fa fa-chevron-down"></span></a>
					<ul class="nav child_menu">
                      <li><a href="<?php echo base_url()?>products/index">Active Products</a></li>
                    </ul>
                  </li>
				  
                   <!--<li>
				  <a><i class="fa fa-home"></i> Garden <span class="fa fa-chevron-down"></span></a>
					<ul class="nav child_menu">
                      <li><a href="<?php echo base_url()?>garden/create">Create Garden</a></li>
                      <li><a href="<?php echo base_url()?>garden/index">Garden List</a></li>
                    </ul>
                  </li>  -->
				  
                  <li>
				  <a><i class="fa fa-home"></i> Orders <span class="fa fa-chevron-down"></span></a>
					<ul class="nav child_menu">
                      <li><a href="<?php echo base_url()?>orders/active">Active Orders</a></li>
                      <li><a href="<?php echo base_url()?>orders/dispatched">Dispatched Orders</a></li>
                      <li><a href="<?php echo base_url()?>orders/delivered">Delivered Orders</a></li>
                      <li><a href="<?php echo base_url()?>orders/failed">Failed Orders</a></li>
                      <li><a href="<?php echo base_url()?>orders/deleted">Deleted Orders</a></li>
                    </ul>
				  
                  </li> 
				  
				  <!--
                  <li><a><i class="fa fa-home"></i> Deals,Coupons&Offers <span class="fa fa-chevron-down"></span></a>
				   <ul class="nav child_menu">
				    <li><a href="<?php echo base_url()?>deals/vendor">Deals </a></li>
					<li><a href="<?php echo base_url()?>coupons/index">Coupons </a></li>
					<li><a href="<?php echo base_url()?>offers/index">Offers </a></li>
				   </ul>
                  </li>   
				  -->
				 
				  
                  <li><a><i class="fa fa-home"></i> Settings <span class="fa fa-chevron-down"></span></a>
				   <ul class="nav child_menu">
                      <li><a href="<?php echo base_url()?>settings/delivery">Delivery Settings</a></li>
                      <li><a href="<?php echo base_url()?>settings/deliveryCity">Delivery City</a></li>
                      <!--<li><a href="<?php echo base_url()?>settings/deliveryArea">Delivery Area</a></li>-->
                      <li><a href="<?php echo base_url()?>settings/deliveryTimings">Delivery Timings</a></li>
                      <li><a href="<?php echo base_url()?>settings/loyaltyPoints">Loyalty Points</a></li>
                    </ul>
                  </li> 
				  
                
				  
				  <li><a href="<?php echo base_url()?>admin/bulksms"><i class="fa fa-home"></i> Bulk SMS </a>
                  </li> 
                </ul>
              </div>
        

            </div>
            <!-- /sidebar menu -->
			 </div>
        </div>