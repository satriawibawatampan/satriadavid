<aside id="left-panel">



    <!-- end user info -->

    <nav>
        <!-- 
        NOTE: Notice the gaps after each icon usage <i></i>..
        Please note that these links work a bit different than
        traditional href="" links. See documentation for details.
        -->
        <?php $hakakses = $this->session->userdata['xcellent_hakakses']; ?>
        <ul>
            <li class="<?php if ($menu == "profile") echo "open"; ?>">
                <a  title="" >
                    <i class="fa fa-lg fa-fw fa-user"></i>

                    <span class="menu-item-parent">
                        <?php echo $_SESSION['xcellent_name']; ?>
                        , ID : 
                        <?php echo $_SESSION['xcellent_id']; ?>
                        , Tipe : 
                        <?php echo $_SESSION['xcellent_tipe']; ?>
                    </span> 
                </a>
                <ul>
<!--                    <li class="<?php if ($menu == "profile" && $submenu == "edit") echo "active"; ?>">
                        <a href="<?php echo base_url(); ?>Back/Account/Show_edit_profile" ><span class="menu-item-parent">Edit Profile</span></a>
                    </li>-->
                    <?php if (in_array(1, $hakakses)) { ?>
                        <li class="<?php if ($menu == "profile" && $submenu == "branch") echo "active"; ?>">
                            <a href="<?php echo base_url(); ?>Back/Branch/Show_change_branch" ><span class="menu-item-parent">Change Branch</span></a>
                        </li>
                        `    <?php } ?>
                    <?php if (in_array(2, $hakakses)) { ?>
                        <li class="<?php if ($menu == "profile" && $submenu == "payment") echo "active"; ?>">
                            <a href="<?php echo base_url(); ?>Back/Payment/index"><i class=""></i> <span class="menu-item-parent">Payment</span></a>

                        </li>
                    <?php } ?>
                    <?php if (in_array(4, $hakakses)) { ?>
                        <li class="<?php if ($menu == "profile" && $submenu == "setting") echo "active"; ?>">
                            <a href="<?php echo base_url(); ?>Back/Account/Show_setting" ><span class="menu-item-parent">Setting</span></a>
                        </li>
                    <?php } ?>
                    <?php if (in_array(5, $hakakses)) { ?>
                        <li class="<?php if ($menu == "profile" && $submenu == "email") echo "active"; ?>">
                            <a href="<?php echo base_url(); ?>Back/Email/Show_email" ><span class="menu-item-parent">Email</span></a>
                        </li>  
                    <?php } ?>



                    <li class="<?php if ($menu == "profile" && $submenu == "changepassword") echo "active"; ?>">
                        <a href="<?php echo base_url(); ?>Back/Account/Show_change_password" ><span class="menu-item-parent">Change Password</span></a>
                    </li>
                    <li >
                        <a href="<?php echo base_url(); ?>Back/Account/Log_out" ><span class="menu-item-parent">Log out</span></a>
                    </li>
                </ul>


            </li>

            <?php if (in_array(6, $hakakses) || in_array(7, $hakakses) || in_array(8, $hakakses)) { ?>
                <li class="<?php if ($menu == "report") echo "open"; ?>">
                    <a  title="Dashboard"><i class="fa fa-lg fa-fw fa-file-text-o"></i> <span class="menu-item-parent">Report</span></a>
                    <ul>
                        <?php if (in_array(6, $hakakses)) { ?>
                            <li class="<?php if ($menu == "report" && $submenu == "reportcashflow") echo "active"; ?>">
                                <a href="<?php echo base_url(); ?>Back/Cashflow/Show_report_cashflow" title="Dashboard"><span class="menu-item-parent">Cash Flow</span></a>
                            </li>
                        <?php } ?>
                        <?php if (in_array(7, $hakakses)) { ?>
                            <li class="<?php if ($menu == "report" && $submenu == "reportincomesummary") echo "active"; ?>">
                                <a href="<?php echo base_url(); ?>Back/Cashflow/Show_report_income_summary" title="Dashboard"><span class="menu-item-parent">Income Summary</span></a>
                            </li>
                        <?php } ?>
                        <?php if (in_array(8, $hakakses)) { ?>
                            <li class="<?php if ($menu == "report" && $submenu == "reportpettycash") echo "active"; ?>">
                                <a href="<?php echo base_url(); ?>Back/Cashflow/Show_report_petty_cash" title="Dashboard"><span class="menu-item-parent">Petty Cash</span></a>
                            </li>
                        <?php } ?>
                    </ul>	
                </li>
            <?php } ?>
            <?php if (in_array(9, $hakakses) || in_array(34, $hakakses)) { ?>
                <li  class="<?php if ($menu == "purchasing") echo "open"; ?>">
                    <a ><i class="fa fa-lg fa-fw fa-shopping-cart"></i> <span class="menu-item-parent">Purchasing</span></a>
                    <ul>
                        <?php if (in_array(9, $hakakses)) { ?>
                            <li  class="<?php if ($menu == "purchasing" && $submenu == "add") echo "active"; ?>">
                                <a href="<?php echo base_url(); ?>Back/Purchasing/Show_add_purchasing_note">Make Purchasing</a>
                            </li>
                        <?php } ?>
                        <?php if (in_array(34, $hakakses)) { ?>
                            <li  class="<?php if ($menu == "purchasing" && $submenu == "all") echo "active"; ?>">
                                <a href="<?php echo base_url(); ?>Back/Purchasing/Show_all_purchasing_note">Purchase Note Lists</a>
                            </li>
                        <?php } ?>

                    </ul>
                </li>
            <?php } ?>
            <?php if (in_array(10, $hakakses) || in_array(11, $hakakses)) { ?>
                <li class="<?php if ($menu == "order") echo "open"; ?>">
                    <a ><i class="fa fa-lg fa-fw fa-shopping-cart"></i> <span class="menu-item-parent">Order</span></a>
                    <ul>
                        <?php if (in_array(10, $hakakses)) { ?>
                            <li  class="<?php if ($menu == "order" && $submenu == "add") echo "active"; ?>">
                                <a href="<?php echo base_url(); ?>Back/Order/Show_add_order_note">Make Order</a>
                            </li>
                        <?php } ?>
                        <?php if (in_array(11, $hakakses)) { ?>
                            <li  class="<?php if ($menu == "order" && $submenu == "all") echo "active"; ?>">
                                <a href="<?php echo base_url(); ?>Back/Order/Show_all_order_note">Order Note Lists</a
                            </li>
                        <?php } ?>

                    </ul>
                </li>
            <?php } ?>
            <?php if (in_array(33, $hakakses) || in_array(19, $hakakses)||in_array(20, $hakakses)) { ?>
                
                <li class="<?php if ($menu == "admin") echo "open"; ?>">
                    <a ><i class="fa fa-lg fa-fw fa-desktop"></i> <span class="menu-item-parent">Admin</span></a>
                    <ul>
                        <?php if (in_array(33, $hakakses)) { ?>
                            <li  class="<?php if ($menu == "admin" && $submenu == "type") echo "active"; ?>">
                                <a href="<?php echo base_url(); ?>Back/Admin/Show_admin_type">Admin Type   </a>
                            </li>
                        <?php } ?>
                        <?php if (in_array(19, $hakakses)) { ?>
                            <li  class="<?php if ($menu == "admin" && $submenu == "add") echo "active"; ?>">
                                <a href="<?php echo base_url(); ?>Back/Admin/Show_add_admin">Add Admin</a>
                            </li>
                        <?php } ?>
                        <?php if (in_array(20, $hakakses)) { ?>

                            <li class="<?php if ($menu == "admin" && $submenu == "all") echo "active"; ?>">
                                <a href="<?php echo base_url(); ?>Back/Admin/Show_all_admin">Admin List   </a>
                            </li>
                        <?php } ?>


                    </ul>
                </li>
                <li>
                    
                </li>
            <?php } ?>
            <?php if (in_array(21, $hakakses)) { ?>
                <li class="<?php if ($menu == "supplier") echo "active"; ?>">
                    <a href="<?php echo base_url(); ?>Back/Supplier/index"><i class="fa fa-lg fa-fw fa-hospital-o"></i> <span class="menu-item-parent">Supplier</span></a>

                </li>

            <?php } ?>
            <?php if (in_array(22, $hakakses) || in_array(23, $hakakses)) { ?>
                <li class="<?php if ($menu == "member") echo "open"; ?>">
                    <a ><i class="fa fa-lg fa-fw fa-group"></i> <span class="menu-item-parent">Member</span></a>
                    <ul>
    <!--                        <li  class="<?php if ($menu == "member" && $submenu == "add") echo "active"; ?>">
                            <a href="<?php echo base_url(); ?>Back/Member/Show_add_member">Add Member</a>
                        </li>-->

                        <?php if (in_array(22, $hakakses)) { ?>
                            <li  class="<?php if ($menu == "member" && $submenu == "all") echo "active"; ?>">
                                <a href="<?php echo base_url(); ?>Back/Member/Show_all_member">Member List   </a>
                            </li>
                        <?php } ?>
                        <?php if (in_array(23, $hakakses)) { ?>
                            <li  class="<?php if ($menu == "member" && $submenu == "adddeposit") echo "active"; ?>">
                                <a href="<?php echo base_url(); ?>Back/Member/Show_add_deposit">Member deposit   </a>
                            </li>
                        <?php } ?>
                        <?php if (in_array(49, $hakakses)) { ?>
                            <li  class="<?php if ($menu == "member" && $submenu == "exchangepoint") echo "active"; ?>">
                                <a href="<?php echo base_url(); ?>Back/Member/Show_exchange_point">Exchange Point  </a>
                            </li>
                        <?php } ?>


                    </ul>
                </li>

            <?php } ?>

            <?php if (in_array(24, $hakakses) || in_array(25, $hakakses)) { ?>
                <li class="<?php if ($menu == "promo") echo "open"; ?>">
                    <a ><i class="fa fa-lg fa-fw fa-money"></i> <span class="menu-item-parent">Promo</span></a>
                    <ul>
                        <?php if (in_array(24, $hakakses)) { ?>
                            <li  class="<?php if ($menu == "promo" && $submenu == "add") echo "active"; ?>">
                                <a href="<?php echo base_url(); ?>Back/Promo/index">Add Promo</a>
                            </li>

                        <?php } ?>
                        <?php if (in_array(25, $hakakses)) { ?>
                            <li  class="<?php if ($menu == "promo" && $submenu == "all") echo "active"; ?>">
                                <a href="<?php echo base_url(); ?>Back/Promo/Show_all_promo">Promo List</a>
                            </li>
                        <?php } ?>


                    </ul>
                </li>
            <?php } ?>
            <?php if (in_array(26, $hakakses) || in_array(27, $hakakses) || in_array(28, $hakakses)) { ?>   
                <li class="<?php if ($menu == "material") echo "open"; ?>">
                    <a ><i class="fa fa-lg fa-fw fa-flask"><?php if (count($stokhabis) != 0) { echo "<em>". count($stokhabis) ."</em>";}  ?></i> <span class="menu-item-parent">Material</span>
                    </a>
                    <ul>
                        <?php if (in_array(26, $hakakses)) { ?>
                            <li  class="<?php if ($menu == "material" && $submenu == "add") echo "active"; ?>">
                                <a href="<?php echo base_url(); ?>Back/Material/Show_add_material">Add Material</a>
                            </li>
                        <?php } ?>
                        <?php if (in_array(27, $hakakses)) { ?>

                            <?php if (count($stokhabis) != 0) { ?>
                                <li  class="<?php if ($menu == "material" && $submenu == "outofstock") echo "active"; ?>">
                                    <a href="<?php echo base_url(); ?>Back/Material/Show_material_out_of_stock">Out Of Stock</a>
                                </li>
                            <?php } ?>
                        <?php } ?>
                        <?php if (in_array(28, $hakakses)) { ?>


                            <li class="<?php if ($menu == "material" && $submenu == "all") echo "active"; ?>">
                                <a href="<?php echo base_url(); ?>Back/Material/Show_all_material">Material List   </a>
                            </li>
                        <?php } ?>


                    </ul>
                </li>
            <?php } ?>

            <?php if (in_array(29, $hakakses) || in_array(30, $hakakses) || in_array(31, $hakakses)) { ?>   
                <li class="<?php if ($menu == "produk") echo "open"; ?>">

                    <a ><i class="fa fa-lg fa-fw fa-ticket"></i> <span class="menu-item-parent">Product</span></a>
                    <ul>
                        <?php if (in_array(29, $hakakses)) { ?>

                            <li  class="<?php if ($menu == "produk" && $submenu == "category") echo "active"; ?>">
                                <a href="<?php echo base_url(); ?>Back/Category/index"><i class=""></i> <span class="menu-item-parent">Category</span></a>

                            </li>
                        <?php } ?>
                        <?php if (in_array(30, $hakakses)) { ?>
                            <li  class="<?php if ($menu == "produk" && $submenu == "add") echo "active"; ?>">
                                <a href="<?php echo base_url(); ?>Back/Product/Show_add_product">Add Product</a>
                            </li>
                        <?php } ?>
                        <?php if (in_array(31, $hakakses)) { ?>

                            <li  class="<?php if ($menu == "produk" && $submenu == "all") echo "active"; ?>">
                                <a href="<?php echo base_url(); ?>Back/Product/Show_all_product">Product List   </a>
                            </li>
                        <?php } ?>


                    </ul>
                </li>
            <?php } ?>
        </ul>
    </nav>


    <span class="minifyme" data-action="minifyMenu"> 
        <i class="fa fa-arrow-circle-left hit"></i> 
    </span>

</aside>

