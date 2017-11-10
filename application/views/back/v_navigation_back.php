<aside id="left-panel">



    <!-- end user info -->

    <nav>
        <!-- 
        NOTE: Notice the gaps after each icon usage <i></i>..
        Please note that these links work a bit different than
        traditional href="" links. See documentation for details.
        -->

        <ul>
            <li>
                <a href="#" title="" >
                    <i class="fa fa-lg fa-fw fa-user"></i>
                    
                    <span class="menu-item-parent">
                        <?php echo $_SESSION['xcellent_name'];?>
                        , ID : 
                        <?php echo $_SESSION['xcellent_id'];?>
                    </span> 
                </a>
                    <ul>
                        <li>
                            <a href="<?php echo base_url(); ?>Back/Account/Show_edit_profile" ><span class="menu-item-parent">Edit Profile</span></a>
                        </li>
                        <?php if($_SESSION['xcellent_tipe']==1){ ?>
                        <li >
                            <a href="<?php echo base_url(); ?>Back/Branch/Show_change_branch" ><span class="menu-item-parent">Change Branch</span></a>
                        </li>
                        <?php }?>
                        <li >
                            <a href="<?php echo base_url(); ?>Back/Account/Show_change_password" ><span class="menu-item-parent">Change Password</span></a>
                        </li>
                         <li >
                            <a href="<?php echo base_url(); ?>Back/Account/Log_out" ><span class="menu-item-parent">Log out</span></a>
                        </li>
                    </ul>


            </li>
            <li>
                <a href="#" title="Dashboard"><i class="fa fa-lg fa-fw fa-home"></i> <span class="menu-item-parent">Dashboard</span></a>
                <ul>
                    <li>
                        <a href="index.html" title="Dashboard"><span class="menu-item-parent">Analytics Dashboard</span></a>
                    </li>
                    <li class="">
                        <a href="dashboard-social.html" title="Dashboard"><span class="menu-item-parent">Social Wall</span></a>
                    </li>
                </ul>	
            </li>
            <li>
                <a href="#"><i class="fa fa-lg fa-fw fa-shopping-cart"></i> <span class="menu-item-parent">Purchasing</span></a>
                <ul>
                    <li><a href="<?php echo base_url(); ?>Back/Purchasing/Show_add_purchasing_note">Make Purchasing</a></li>
                    <li><a href="<?php echo base_url(); ?>Back/Purchasing/Show_all_purchasing_note">Purchase Note Lists</a></li>
                    
                </ul>
            </li>	
            <li>
                <a href="#"><i class="fa fa-lg fa-fw fa-shopping-cart"></i> <span class="menu-item-parent">Order</span></a>
                <ul>
                    <li><a href="<?php echo base_url(); ?>Back/Order/Show_add_order_note">Make Order</a></li>
                    <li><a href="<?php echo base_url(); ?>Back/Order/Show_all_order_note">Order Note Lists</a></li>
                    
                </ul>
            </li>	
            
<?php if($_SESSION['xcellent_tipe']==1){ ?>
            <li>
                <a href="<?php echo base_url(); ?>Back/Category/index"><i class="fa fa-lg fa-fw fa-puzzle-piece"></i> <span class="menu-item-parent">Category</span></a>

            </li>

            
            <li>
                <a href="#"><i class="fa fa-lg fa-fw fa-desktop"></i> <span class="menu-item-parent">Admin</span></a>
                <ul>
                    <li>
                        <a href="<?php echo base_url(); ?>Back/Admin/Show_add_admin">Add Admin</a>
                    </li>

                    <li>
                        <a href="<?php echo base_url(); ?>Back/Admin/Show_all_admin">Admin List   </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>Back/Admin/Show_admin_type">Admin Type   </a>
                    </li>
                    
                </ul>
            </li>
          
            <li>
                <a href="<?php echo base_url(); ?>Back/Supplier/index"><i class="fa fa-lg fa-fw fa-hospital-o"></i> <span class="menu-item-parent">Supplier</span></a>

            </li>
              <?php }?>
            
            <li>
                <a href="#"><i class="fa fa-lg fa-fw fa-group"></i> <span class="menu-item-parent">Member</span></a>
                <ul>
                    <li>
                        <a href="<?php echo base_url(); ?>Back/Member/Show_add_member">Add Member</a>
                    </li>

                    <li>
                        <a href="<?php echo base_url(); ?>Back/Member/Show_all_member">Member List   </a>
                    </li>
                    
                    
                </ul>
            </li>
            
            <li>
                <a href="#"><i class="fa fa-lg fa-fw fa-money"></i> <span class="menu-item-parent">Promo</span></a>
                <ul>
                    <li>
                        <a href="<?php echo base_url(); ?>Back/Promo/index">Add Promo</a>
</li>

                    <li>
                        <a href="<?php echo base_url(); ?>Back/Promo/Show_all_promo">Promo List</a>
</li>
                   
                    
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-lg fa-fw fa-flask"></i> <span class="menu-item-parent">Material</span></a>
                <ul>
                    <li>
                        <a href="<?php echo base_url(); ?>Back/Material/Show_add_material">Add Material</a>
                    </li>

                    <li>
                        <a href="<?php echo base_url(); ?>Back/Material/Show_all_material">Material List   </a>
                    </li>
                   
                    
                </ul>
            </li>
          <li>
                <a href="#"><i class="fa fa-lg fa-fw fa-ticket"></i> <span class="menu-item-parent">Product</span></a>
                <ul>
                    <li>
                        <a href="<?php echo base_url(); ?>Back/Product/Show_add_product">Add Product</a>
                    </li>

                    <li>
                        <a href="<?php echo base_url(); ?>Back/Product/Show_all_product">Product List   </a>
                    </li>
                  
                    
                </ul>
            </li>
          
            
            

        </ul>
    </nav>


    <span class="minifyme" data-action="minifyMenu"> 
        <i class="fa fa-arrow-circle-left hit"></i> 
    </span>

</aside>

