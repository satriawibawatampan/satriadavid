<div id="main" role="main">

    <!-- RIBBON -->
    <div id="ribbon">

        <span class="ribbon-button-alignment"> 
            <span id="refresh" class="btn btn-ribbon" data-action="resetWidgets" data-title="refresh"   rel="tooltip" data-placement="bottom" data-original-title="<i class='text-warning fa fa-warning'></i> Warning! This will reset all your widget settings." data-html="true">
                <i class="fa fa-refresh"></i>
            </span> 
        </span>

        <!-- breadcrumb -->
        <ol class="breadcrumb">

        </ol>


    </div>
    <!-- END RIBBON -->
    <a href="v_all_member_back.php"></a>



    <!-- MAIN CONTENT -->
    <div id="content">

        <!-- row -->
        <div class="row">

            <!-- col -->
            <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
                <h1 class="page-title txt-color-blueDark">

                    <!-- PAGE HEADER -->
                    <i class="fa-fw fa fa-home"></i> 
                    Order
                    <span>>  
                        Order Note List
                    </span>
                </h1>
            </div>
            <!-- end col -->

            <!-- right side of the page with the sparkline graphs -->
            <!-- col -->
            <div class="col-xs-12 col-sm-5 col-md-5 col-lg-8">
                <!-- sparks -->

                <!-- end sparks -->
            </div>
            <!-- end col -->

        </div>
        <!-- end row -->

        <!--
                The ID "widget-grid" will start to initialize all widgets below 
                You do not need to use widgets if you dont want to. Simply remove 
                the <section></section> and you can use wells or panels instead 
        -->
        <?php if (isset($_SESSION['pesanform'])) { ?>
            <div class="alert alert-success">
                <?php echo $_SESSION['pesanform']; ?>

            </div>
        <?php } ?>
        <!-- widget grid -->
        <section id="widget-grid" class="">

            <!-- row -->
            <div class="row">

                <!-- NEW WIDGET START -->
                <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                    <!-- Widget ID (each widget will need unique ID)-->
                    <div class="jarviswidget jarviswidget-color-blueDark jarviswidget-sortable" id="wid-id-2" data-widget-editbutton="false" role="widget">

                        <header role="heading">
                            <span class="widget-icon"> <i class="fa fa-table"></i> </span>


                            <span class="jarviswidget-loader"><i class="fa fa-refresh fa-spin" ></i></span></header>

                        <!-- widget div-->
                        <div role="content">

                            <!-- widget edit box -->
                            <div class="jarviswidget-editbox">
                                <!-- This area used as dropdown edit box -->

                            </div>
                            <!-- end widget edit box -->

                            <!-- widget content -->
                            <div class="widget-body no-padding">

                                <div id="datatable_col_reorder_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">

                                    <table id="datatable_col_reorder" class="table table-striped table-bordered table-hover dataTable no-footer has-columns-hidden" width="100%" role="grid" aria-describedby="datatable_col_reorder_info" style="width: 100%;">
                                        <thead>
                                            <tr role="row">
                                                <th data-hide="phone" class="sorting_asc" tabindex="0" aria-controls="datatable_col_reorder" rowspan="1" colspan="1" aria-sort="ascending" aria-label="ID: activate to sort column descending" style="width: 32px;">ID</th>

                                                <th data-class="expand" class="expand sorting" tabindex="0" aria-controls="datatable_col_reorder" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 81px;">Date</th>
                                                <th data-hide="phone" class="sorting" tabindex="0" aria-controls="datatable_col_reorder" rowspan="1" colspan="1" aria-label="Phone: activate to sort column ascending" style="width: 32px;">Admin</th>
                                                <th data-hide="phone" class="sorting_asc" tabindex="0" aria-controls="datatable_col_reorder" rowspan="1" colspan="1" aria-sort="ascending" aria-label="ID: activate to sort column descending" style="width: 32px;">Cashier</th>
                                                <th data-hide="phone" class="sorting_asc" tabindex="0" aria-controls="datatable_col_reorder" rowspan="1" colspan="1" aria-sort="ascending" aria-label="ID: activate to sort column descending" style="width: 32px;">Producer</th>
                                                <th data-hide="phone" class="sorting_asc" tabindex="0" aria-controls="datatable_col_reorder" rowspan="1" colspan="1" aria-sort="ascending" aria-label="ID: activate to sort column descending" style="width: 32px;">Member</th>
                                                <th data-hide="phone" class="sorting_asc" tabindex="0" aria-controls="datatable_col_reorder" rowspan="1" colspan="1" aria-sort="ascending" aria-label="ID: activate to sort column descending" style="width: 32px;">Promo</th>
                                                <th data-hide="phone" class="sorting_asc" tabindex="0" aria-controls="datatable_col_reorder" rowspan="1" colspan="1" aria-sort="ascending" aria-label="ID: activate to sort column descending" style="width: 32px;">Grandtotal</th>
                                                <th data-hide="phone" class="sorting_asc" tabindex="0" aria-controls="datatable_col_reorder" rowspan="1" colspan="1" aria-sort="ascending" aria-label="ID: activate to sort column descending" style="width: 32px;">Status</th>

                                                <th class="" tabindex="0" aria-controls="datatable_col_reorder" rowspan="1" colspan="1" aria-label="Phone: activate to sort column ascending" style="width: 32px;">Action</th>
                                        </thead>
                                        <tbody>	
                                            <?php
                                            foreach ($tableorder as $hasil) {
                                                echo '<tr role = "row" class = "odd">';
                                                echo '<td><a   onclick="showmodalorderproduct(' . $hasil->id . ')" class="" style=""   data-toggle="modal" data-target="#myOrderDetail">' . $hasil->antrian . ' (ID : ' . $hasil->id . ')' . '</a></td>';

                                                echo ' <td >' . $hasil->tanggal . '</td>';
                                                echo '<td>' . $hasil->namaadmin . '</td>';
                                                if ($hasil->id_kasir == 0) {
                                                    echo '<td>-</td>';
                                                } else {
                                                    echo '<td>' . $hasil->namakasir . '</td>';
                                                }
                                                if ($hasil->id_produser == 0) {
                                                    echo '<td>-</td>';
                                                } else {
                                                    echo '<td>' . $hasil->namaproduser . '</td>';
                                                }
                                                echo '<td>' . $hasil->namamember . '</td>';
                                                echo '<td>' . $hasil->namapromo . '</td>';
                                                echo '<td id="notagrandTotal-' . $hasil->id . '">' . number_format($hasil->grandtotal, 0, ".", ",") . '</td>';
                                                if ($hasil->status == 0) {
                                                    echo '<td>Not Paid</td>';
                                                } else if ($hasil->status == 1) {
                                                    echo '<td>Paid</td>';
                                                } else if ($hasil->status == 2) {
                                                    echo '<td>Producing</td>';
                                                } else if ($hasil->status == 3) {
                                                    echo '<td>Finish</td>';
                                                }

                                                echo '<td> ';
                                                if ($hasil->id_member == "0" && $hasil->status == 0 && ($this->session->userdata['xcellent_tipe'] == 1 || $this->session->userdata['xcellent_tipe'] == 3)) {
                                                    echo '  <a onclick="openModal(' . $hasil->id . ')" data-toggle="modal" data-target="#addMember" class="btn glyphicon glyphicon-user" ></a>';
                                                }
                                                if ($hasil->status == 0 && ($this->session->userdata['xcellent_tipe'] == 1 || $this->session->userdata['xcellent_tipe'] == 3)) {
                                                    echo '  <a href="' . base_url() . 'Back/Order/Show_edit_order/' . $hasil->id . '"  class="btn glyphicon glyphicon-pencil" style="color:black" ></a>';
                                                }
                                                echo'<span> <span>';
//                                                echo '<a   onclick="showdeletedaorder(' . $hasil->id . ')" class="glyphicon glyphicon-trash" style="color:red"  ></a>';
                                                echo'<span> <span>';
                                                if ($hasil->status == 0 && ($this->session->userdata['xcellent_tipe'] == 1 || $this->session->userdata['xcellent_tipe'] == 3)) {
                                                    echo '<a   onclick="showmodalpayment(' . $hasil->id . ',' . $hasil->grandtotal . ',' . $hasil->idmember . ',\'' . $hasil->namamember . '\',' . $hasil->poinmember . ',' . $hasil->depositmember . ',' . $hasil->memberstatusaktif . ')" class=" btn fa fa-money" style="color:green"   data-toggle="modal" data-target="#myPaymentModal"></a>';
                                                } else if ($hasil->status == 1 && ($this->session->userdata['xcellent_tipe'] == 1 || $this->session->userdata['xcellent_tipe'] == 4)) {
                                                    echo '<a   onclick="showmodalproducing(' . $hasil->id . ')" class="btn glyphicon glyphicon-cog" style="color:orange"  data-toggle="modal" data-target="#myProducingModal"></a>';
                                                } else if ($hasil->status == 2 && ($this->session->userdata['xcellent_tipe'] == 1 || $this->session->userdata['xcellent_tipe'] == 4)) {
                                                    echo '<a   onclick="showmodalfinish(' . $hasil->id . ')" class="btn glyphicon glyphicon-ok" style="color:blue"  data-toggle="modal" data-target="#myFinishModal"></a>';
                                                }

                                                if ($hasil->status == 1 && ($this->session->userdata['xcellent_tipe'] == 1 || $this->session->userdata['xcellent_tipe'] == 3)) {
                                                    echo '<a href="' . base_url() . 'Back/Order/Prints/' . $hasil->id . '"  class="btn fa fa-print" style="color:green" target="_blank"   ></a>';
                                                }
                                                if ($hasil->status == 0 && ($this->session->userdata['xcellent_tipe'] == 1 || $this->session->userdata['xcellent_tipe'] == 3)) {
                                                    echo '<a onclick="showmodaldelete(' . $hasil->id . ',\'delete\')"    class="btn fa fa-trash" style="color:red" data-toggle="modal" data-target="#myDeleteModal"   ></a>';
                                                }

                                                echo '</td></tr>';
                                            }
                                            ?>
                                        </tbody>
                                    </table>

                                </div>

                            </div>
                            <!--end widget content -->

                        </div>
                        <!--end widget div -->

                    </div>
                    <!--end widget -->

                </article>
                <!--WIDGET END -->

            </div>

            <!--end row -->

            <!--row -->

            <div class = "row">

                <!--a blank row to get started -->
                <div class = "col-sm-12">
                    <!--your contents here -->
                </div>

            </div>

            <!--end row -->

        </section>
        <!--end widget grid -->
        <div class="modal fade" id="addMember" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Member Registration</h4>
                    </div>
                    <div class="modal-body">
                        <div class="widget-body no-padding">
                            <form id="smart-form-register-member" class="form-horizontal" novalidate="novalidate" method="post">
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="select-1">Email</label>
                                    <div class="col-md-4">
                                        <input  id="daftar_email" type="text" name="daftar_email"  aria-required="true" class="error" aria-invalid="true" value="" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="select-1">Name</label>
                                    <div class="col-md-4">
                                        <input  id="daftar_nama" type="text" name="daftar_nama"  aria-required="true" class="error" aria-invalid="true" value="" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="select-1">BOD</label>
                                    <div class="col-md-4">
                                        <input id="daftar_ttl" class="form-control" name="daftar_ttl"  type="date" value="<?php echo set_value('daftar_ttl'); ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="select-1">Phone</label>
                                    <div class="col-md-4">
                                        <input  id="daftar_telepon" type="text" name="daftar_telepon"  aria-required="true" class="error" aria-invalid="true" value="" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="select-1">Address</label>
                                    <div class="col-md-4">
                                        <input  id="daftar_alamat" type="text" name="daftar_alamat"  aria-required="true" class="error" aria-invalid="true" value="" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="select-1">Gender</label>
                                    <div class="col-md-4">
                                        <select  id="daftar_gender" class="form-control" name="daftar_gender" id="select-1" selected ="select" <?php echo set_select('name_gender', set_value('name_gender')); ?> >
                                            <option value="1" <?php echo set_select('daftar_gender', '1', TRUE); ?>>Male</option>
                                            <option value="2" <?php echo set_select('daftar_gender', '2'); ?>>Female</option>
                                        </select> 
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="select-1">Deposit</label>
                                    <div class="col-md-4">
                                        <input class="form-control" id="id_bonus_deposit" name="name_bonusdeposit"  type="hidden" value="<?php echo set_value('name_bonusdeposit', $datasetting[0]->bonus_deposit); ?>">
                                        <input  id="daftar_deposit" type="number" name="daftar_deposit" min="<?php echo $datasetting[0]->harga_member; ?>"  aria-required="true" class="error" aria-invalid="true" value="<?php echo $datasetting[0]->harga_member; ?>" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="select-1">PIN</label>
                                    <div class="col-md-4">

                                        <input  id="daftar_pin" type="password" pattern="[0-9]*" inputmode="numeric" name="name_pin"   aria-required="true" class="error" aria-invalid="true"  >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="select-1">Retype PIN</label>
                                    <div class="col-md-4">

                                        <input  id="daftar_retypepin" type="password" pattern="[0-9]*" inputmode="numeric" name="name_retypepin"   aria-required="true" class="error" aria-invalid="true"  >
                                    </div>
                                </div>

                                <footer>

                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="select-1"></label>
                                        <div class="col-md-4">
                                            <input onclick="add_member(<?php echo $datasetting[0]->harga_member ?>,<?php echo $datasetting[0]->bonus_deposit ?>);" id="id_button_addmember" type="button"  name="tes" class="btn btn-primary " value="Add Member">
                                            <input type="hidden" name="button_addmember" class="btn btn-primary " value="1">
                                        </div>
                                    </div>
                                </footer>
                            </form> 
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <!--END MAIN CONTENT -->

    <div class="modal fade" id="myOrderDetail" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Order  <span id="span_nama" style="color:blue"></span> Detail </h4>
                </div>
                <div class="modal-body">
                    <div class="widget-body no-padding">

                        <div id="datatable_col_reorder_wrapper" class="table-responsive">

                            <table id="id_table" class="table table-bordered table-striped" >
                                <thead>
                                    <tr >
                                        <th  style="width: 100px;" >Product ID</th>
                                        <th    >Product Name</th>
                                        <th  style="width: 100px;" >Qty</th>
                                        <th  style="width: 100px;" >Long (CM)</th>
                                        <th  style="width: 150px;" >Price</th>
                                        <th  style="width: 75px;" >%</th>
                                        <th  style="width: 150px;" >Subtotal</th>



                                </thead>
                                <tbody id="id_body_table_orderproduk" >	


                                </tbody>
                            </table>

                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>



    <!--modal payment-->
    <div class="modal fade" id="myPaymentModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Payment</h4>
                </div>
                <div class="modal-body">
                    <form id="smart-form-register-payment" action="<?php echo base_url(); ?>Back/Order/Make_payment" class="form-horizontal" novalidate="novalidate" method="post">
                        <p>Are you sure want to make a Payment for Order Note <span id="span_nama_payment" style="color:blue"></span>?</p>
                        <input  id="id_paymentid" type="hidden" name="name_paymentid"  aria-required="true" class="error" aria-invalid="true" >
                        <input  id="id_memberid" type="hidden" name="name_txt_id_member"  aria-required="true" class="error" aria-invalid="true" >
                        <input  id="id_paymentgrandtotal" type="hidden" name="name_grandtotal"  aria-required="true" class="error" aria-invalid="true" >


                        <div class="form-group">
                            <table id="id_table_payment" class="table table-bordered table-striped" >
                                <thead>
                                    <tr >

                                        <th    >Product Name</th>
                                        <th  style="width: 100px;" >Qty</th>
                                        <th  style="width: 150px;" >Price</th>
                                        <th  style="width: 75px;" >%</th>
                                        <th  style="width: 150px;" >Subtotal</th>

                                </thead>
                                <tbody id="id_body_table_payment" >	


                                </tbody>
                            </table>
                        </div>

                        <div class="form-group" id="id_div_member">
                            <label class="col-md-4 control-label" for="select-1">Member</label>
                            <div class="col-md-8">
                                <label  id="id_label_member" class=" control-label" for="select-1"></label>
                            </div>
                            <input  id="id_deposit" type="hidden" name="" value="<?php echo $hasil->depositmember; ?>"  aria-required="true" class="error" aria-invalid="true" >


                        </div>

                        <div class="form-group" >
                            <label class="col-md-4 control-label" for="select-1">Payment Method</label>
                            <div class="col-md-4">

                                <select onchange="onchange_paymentmethod()" class="form-control" name="name_paymentmethod" id="id_paymentmethod" selected ="select" >
                                    <?php
                                    foreach ($listpaymentmethod as $hasil) {

                                        echo "<option value='" . $hasil->id . "'>" . $hasil->nama . "</option>";
                                    }
                                    ?>


                                </select> 

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="select-1">Payment Amount</label>
                            <div class="col-md-4">

                                <input  id="id_paymentamount" type="number" name="name_paymentamount"  aria-required="true" class="error" aria-invalid="true" min="0"  >

                            </div>
                        </div>
                        <div class="form-group" id="id_div_pin">
                            <label class="col-md-4 control-label" for="select-1">Pin</label>
                            <div class="col-md-4">

                                <input  id="id_pin" name="name_pin" type="password"  aria-required="true" value="" class="error" aria-invalid="true"  >

                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label" for="select-1"></label>
                            <div class="col-md-4">
                                <button onclick="add_to_table_payment()" type="button"  name="" id="id_button_add_to_table_payment" class="btn btn-primary " value=""> Add Payment</button>

                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label" for="select-1"></label>
                            <div class="col-md-6">
                                <table id="id_table_payment_method" class="table table-bordered table-striped" >
                                    <thead>
                                        <tr >

                                            <th  style="width: 100px;" >Payment Method</th>
                                            <th   style="width: 200px;" >Amount</th>
                                            <th  style="width: 50px;" >x</th>

                                    </thead>
                                    <tbody id="id_body_table_payment_method" >	

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="select-1">Total Payment</label>
                            <div class="col-md-4">
                                <input readonly type="number" name="name_totalpayment" id="id_payment_method_grandtotal" value="0">

                            </div>
                        </div>

                        <footer>

                            <div class="form-group">
                                <label class="col-md-4 control-label" for="select-1"></label>
                                <div class="col-md-4">
                                    <input onclick="check_all_not_null();" id="id_button_payment" type="button"  name="test" class="btn btn-primary " value="They Have Paid">
                                    <input type="hidden"  name="button_payment" class="btn btn-primary " value="1">
                                </div>
                            </div>
                        </footer>
                    </form>	
                </div>
            </div>

        </div>
    </div>
    <!--modal producing-->
    <div class="modal fade" id="myProducingModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Producing</h4>
                </div>
                <div class="modal-body">
                    <form id="smart-form-register-produce" action="<?php echo base_url(); ?>Back/Order/Run_producing" class="smart-form" novalidate="novalidate" method="post">

                        <p>Are you sure want to run a Producing for Order Note <span id="span_nama_producing" style="color:blue"></span>?</p>
                        <input   id="id_producingid" type="hidden" name="name_producingid"  aria-required="true" class="error" aria-invalid="true" >
                        <table id="id_table_producing" class="table table-bordered table-striped" >
                            <thead>
                                <tr >
                                    <th  style="width: 100px;" >Product ID</th>
                                    <th    >Product Name</th>
                                    <th  style="width: 100px;" >Qty</th>
                                    <th  style="width: 100px;" >Long</th>

                            </thead>
                            <tbody id="id_body_table_producing" >	


                            </tbody>
                        </table>
                        <footer>
                            <input onclick="submit_produce()" type="button" id="id_button_producing" name="tes" class="btn btn-primary" value="Produce all items">
                            <input type="hidden" name="button_producing" class="btn btn-primary" value="Produce all items">
                        </footer>
                    </form>	
                </div>
            </div>

        </div>
    </div>
    <!--modal Delete-->
    <div class="modal fade" id="myDeleteModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Delete Order</h4>
                </div>
                <div class="modal-body">
                    <form id="smart-form-register-delete" action="<?php echo base_url(); ?>Back/Order/Delete_order" class="smart-form" novalidate="novalidate" method="post">

                        <p>Are you sure want to run a Delete Order Note <span id="span_nama_delete" style="color:blue"></span>?</p>
                        <input   id="id_deleteid" type="hidden" name="name_deleteid"  aria-required="true" class="error" aria-invalid="true" >
                        <table id="id_table_delete" class="table table-bordered table-striped" >
                            <thead>
                                <tr >
                                    <th  style="width: 100px;" >Product ID</th>
                                    <th    >Product Name</th>
                                    <th  style="width: 100px;" >Qty</th>
                                    <th  style="width: 100px;" >Long</th>

                            </thead>
                            <tbody id="id_body_table_delete" >	


                            </tbody>
                        </table>
                        <footer>
                            <input onclick="submit_delete()" type="button" id="id_button_delete" name="tes" class="btn btn-primary" value="Delete this order">
                            <input type="hidden" name="button_delete" class="btn btn-primary" value="Delete this order">
                        </footer>
                    </form>	
                </div>
            </div>

        </div>
    </div>
    <!--modal finish-->
    <div class="modal fade" id="myFinishModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Finish Order</h4>
                </div>
                <div class="modal-body">
                    <form id="smart-form-register-finish" action="<?php echo base_url(); ?>Back/Order/Set_finish" class="form-horizontal" novalidate="novalidate" method="post">

                        <p>Are you sure want to set to Finish for Order Note <span id="span_nama_finish" style="color:blue"></span>?</p>
                        <input   id="id_finishid" type="hidden" name="name_finishid"  aria-required="true" class="error" aria-invalid="true" >
                        <div class="form-group">
                            <table id="id_table_finish" class="table table-bordered table-striped" >
                                <thead>
                                    <tr >
                                        <th  style="width: 100px;" >Product ID</th>
                                        <th    >Product Name</th>
                                        <th  style="width: 100px;" >Qty</th>

                                </thead>
                                <tbody id="id_body_table_finish" >	


                                </tbody>
                            </table>
                        </div>
                        <div class="form-group">
                            <p>Your Material that you used for making those products :</p>

                        </div>

                        <div class="form-group">
                            <table id="id_table_usedmaterial" class="table table-bordered table-striped" >
                                <thead>
                                    <tr >
                                        <th hidden style="width: 100px;" >ID Nota Jual Produk</th>
                                        <th  style="width: 100px;" >ID Detail Material</th>
                                        <th  style="width: 100px;"  >Material Name</th>
                                        <th  style="width: 100px;" >Qty</th>
                                        <th  >Residual Description</th>

                                </thead>
                                <tbody id="id_body_table_usedmaterial" >	


                                </tbody>
                            </table>
                        </div>
                        <footer>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="select-1"></label>
                                <div class=" pull-right">


                                    <input onclick="submit_finish()" type="button" id="id_button_finish" name="tes" class="btn btn-primary" value="Finish Producing">

                                    <input type="hidden" name="button_finish" class="btn btn-primary" value="Finish">

                                </div>
                            </div>
                        </footer>
                    </form>	
                </div>
            </div>

        </div>
    </div>




    <div class="modal fade" id="myMaterial" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Materials for <span id="span_nama_material" style="color:blue"></span> </h4>
                </div>
                <div class="modal-body">
                    <div class="widget-body no-padding">

                        <div id="datatable_col_reorder_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">

                            <table id="datatable_col_reorder" class="table table-striped table-bordered table-hover dataTable no-footer has-columns-hidden" width="100%" role="grid" aria-describedby="datatable_col_reorder_info" style="width: 100%;">
                                <thead>
                                    <tr role="row">
                                        <!--<th data-hide="phone" class="sorting_asc" tabindex="0" aria-controls="datatable_col_reorder" rowspan="1" colspan="1" aria-sort="ascending" aria-label="ID: activate to sort column descending" style="width: 32px;">ID</th>-->
                                        <th data-class="expand" class="expand sorting" tabindex="0" aria-controls="datatable_col_reorder" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 81px;">ID Material</th>
                                        <th data-hide="phone" class="sorting" tabindex="0" aria-controls="datatable_col_reorder" rowspan="1" colspan="1" aria-label="Phone: activate to sort column ascending" style="width: 131px;">Material Name</th>
                                        <th data-hide="phone" class="sorting" tabindex="0" aria-controls="datatable_col_reorder" rowspan="1" colspan="1" aria-label="Phone: activate to sort column ascending" style="width: 131px;">Qty</th>


                                </thead>
                                <tbody id="tablebodymaterial">	

                                </tbody>
                            </table>

                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>

</div>    
<script>

    function number_format(number, decimals, dec_point, thousands_sep) {

        var n = number, c = isNaN(decimals = Math.abs(decimals)) ? 2 : decimals;
        var d = dec_point == undefined ? "," : dec_point;
        var t = thousands_sep == undefined ? "." : thousands_sep, s = n < 0 ? "-" : "";
        var i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "", j = (j = i.length) > 3 ? j % 3 : 0;

        return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
    }


    var idNota = null;
    var idmember = null;
    function openModal(id) {
        idNota = id;
    }
    function add_member(hargamember, bonusdeposit) {
        $("#id_button_addmember").prop("disable", true);
        if ($("#daftar_deposit").val() < hargamember)
        {
            alert("Minimum Deposit for new member is Rp." + hargamember + ",-")
            $("#id_button_addmember").prop("disable", false);
        } else if ($("#daftar_nama").val().length == 0 || $("#daftar_deposit").val().length == 0 || $("#daftar_email").val().length == 0 ||
                $("#daftar_ttl").val().length == 0 || $("#daftar_telepon").val().length == 0 || $("#daftar_gender").val().length == 0 ||
                $("#daftar_alamat").val().length == 0 ||$("#daftar_pin").val().length == 0||$("#daftar_retypepin").val().length == 0)
        {
            alert("All fields must be filled.")
            $("#id_button_addmember").prop("disable", false);
        }
        else if($("#daftar_pin").val()!=$("#daftar_retypepin").val())
        {
            alert("Retype Pin must be the same.")
        }
        else
        {

            var nama = $("#daftar_nama").val();
            var deposit = $("#daftar_deposit").val();
            var bonusdeposit = $("#id_bonus_deposit").val();
            var email = $("#daftar_email").val();
            var BOD = $("#daftar_ttl").val();
            var phone = $("#daftar_telepon").val();
            var gender = $("#daftar_gender").val();
            var alamat = $("#daftar_alamat").val();
            var pin = $("#daftar_pin").val();
            var retypepin = $("#daftar_retypepin").val();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>" + "Back/Member/Add_member_from_kasir_ajax",
                datatype: "json",
                data: {
                    nama: nama,
                    deposit: deposit,
                    bonusdeposit: bonusdeposit,
                    email: email,
                    bod: BOD,
                    phone: phone,
                    alamat: alamat,
                    idnota: idNota,
                    gender: gender,
                    pin: pin,
                    retypepin: retypepin,
                },
                success: function (result) {
                    idmember = result;
                    //  alert(result);
                    var hasil = idmember;
                    if (hasil == 0)
                    {
                        alert("Email has been registered before.");
                    } else
                    {
                        alert("Member Registration Success");
                        $('#addMember').modal('toggle');
                        location.reload();
                    }


                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    alert("Status: " + textStatus);
                    alert("Error: " + errorThrown);
                }
            });
        }
    }

    function showmodalpayment(idnya, grandtotal, idmember, namamember, poinmember, depositmember, memberstatusaktif)
    {
        var adadeposit = 0;
        var adaregistermember = 0;

        $("#id_payment_method_grandtotal").val(0);
        $("#id_paymentamount").val(0);

        document.getElementById('id_paymentid').value = idnya;
        if (memberstatusaktif == 1)
        {
            document.getElementById('id_label_member').innerHTML = namamember + " (Deposit : " + number_format(depositmember, 0, ".", ",") + " -- Poin : " + number_format(poinmember, 0, ".", ",") + " )";
        } else
        {
            document.getElementById('id_label_member').innerHTML = "Non Member (Deposit : 0 -- Poin : 0 )";
        }
        document.getElementById('id_deposit').value = depositmember;
        document.getElementById('id_memberid').value = idmember;
        document.getElementById('id_paymentgrandtotal').value = grandtotal;
        document.getElementById('span_nama_payment').innerHTML = idnya.toString();
        $("#id_body_table_payment").empty();
        $("#id_body_table_payment_method").empty();
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>" + "Back/Order/Json_get_order_product/" + idnya,
            dataType: "json",
            success: function (result) {
                //alert("masuk sini");
                $.each(result, function (id, name)
                {
                    //    alert("yes"+name['id_produk']);
                    if (name['id_produk'] == 1)
                    {
                        adadeposit = 1;
                    }
                    if (name['id_produk'] == 0)
                    {
                        adaregistermember = 1;
                    }
                    //$("#id_body_table_payment").val()=
                    $("#id_body_table_payment").append(
                            "<tr role = 'row' class = 'odd'>" +
                            "<td hidden>" + name['id_produk'] + "</td>" +
                            "<td>" + name['namaproduk'] + "</td>" +
                            "<td>" + number_format(name['jumlah'], 0, ".", ",") + "</td>" +
                            "<td>" + number_format(name['harga'], 0, ".", ",") + "</td>" +
                            "<td>" + name['diskon'] + "</td>" +
                            "<td>" + number_format(name['subtotal'], 0, ".", ",") + "</td>" +
                            "</tr>");

                });
                $("#id_body_table_payment").append(
                        "<tr role = 'row' class = 'odd'>" +
                        "<td colspan='4'>Grandtotal</td>" +
                        "<td>" + number_format($('#id_paymentgrandtotal').val(), 0, ".", ",") + "</td>" +
                        "</tr>");

                //  alert("adadepost"+adadeposit+"adaregister"+adaregistermember);

                var methodpayment = [];

                $("#id_paymentmethod").find('option').remove().end();
                if (idmember == 0)
                {
                    //        alert("member 0");

<?php
foreach ($listpaymentmethod as $hasil) {
    if ($hasil->id != 0) {
        ?>
                            $("#id_paymentmethod").append(
                                    "<option value='" + <?php echo $hasil->id; ?> + "'>" + "<?php echo $hasil->nama; ?>" + "</option>"
                                    );

        <?php
    }
}
?>
                } else
                {
                    if (adadeposit == 1 || adaregistermember == 1)
                    {
                        //     alert("adadepost"+adadeposit+"adaregister"+adaregistermember);
                        //disini harus cek apakah betul buka tutup kurungnya!!

<?php
foreach ($listpaymentmethod as $hasil) {

    if ($hasil->id != 0) {
        ?>
                                $("#id_paymentmethod").append(
                                        "<option value='" + <?php echo $hasil->id; ?> + "'>" + "<?php echo $hasil->nama; ?>" + "</option>"
                                        );

        <?php
    }
}
?>

                    } else if (adadeposit == 0)
                    {
                        //       alert("masuk sini");
<?php
foreach ($listpaymentmethod as $hasil) {
    ?>
                            $("#id_paymentmethod").append(
                                    "<option value='" + <?php echo $hasil->id; ?> + "'>" + "<?php echo $hasil->nama; ?>" + "</option>"
                                    );

    <?php
}
?>
                    }


                }



            }
        });



    }

    function onchange_paymentmethod()
    {
        $("#id_div_pin").hide();


        if (document.getElementById('id_paymentmethod').value == 0)
        {
            $("#id_pin").empty();
            $("#id_div_pin").show();
        } else
        {
            $("#id_pin").empty();
            $("#id_div_pin").hide();
        }

    }
    function showmodalproducing(idnya)
    {
        document.getElementById('id_producingid').value = idnya;
        document.getElementById('span_nama_producing').innerHTML = idnya.toString();
        $("#id_body_table_producing").empty();
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>" + "Back/Order/Json_get_order_product/" + idnya,
            dataType: "json",
            success: function (result) {
                //ini kalau mau ambil 1 data saja sudah bisa.
                //alert ("hore sukses" + result);
                $.each(result, function (id, name)
                {
                    if (name['tipe'] == 1)
                    {
                        $("#id_body_table_producing").append(
                                "<tr role = 'row' class = 'odd'>" +
                                "<td>" + name['id_produk'] + "</td>" +
                                "<td><a onclick='show_material(\"" + name['id_produk'] + "\",\"" + name['namaproduk'] + "\")'  data-toggle='modal' data-target='#myMaterial'>" + name['namaproduk'] + "</a></td>" +
                                "<td>" + name['jumlah'] + "</td>" +
                                "<td>" + name['long'] + " CM</td>" +
                                "</tr>");
                    } else if (name['tipe'] == 2)
                    {
                        $("#id_body_table_producing").append(
                                "<tr role = 'row' class = 'odd'>" +
                                "<td>" + name['id_produk'] + "</td>" +
                                "<td><a onclick='show_material(\"" + name['id_produk'] + "\",\"" + name['namaproduk'] + "\")'  data-toggle='modal' data-target='#myMaterial'>" + name['namaproduk'] + "</a></td>" +
                                "<td>" + name['jumlah'] + "</td>" +
                                "<td>is not roll</td>" +
                                "</tr>");
                    }

                });
            }
        });

    }

    function submit_produce()
    {
        $("#id_button_producing").prop('disabled', true);
        document.getElementById('smart-form-register-produce').submit();
    }
    function showmodalfinish(idnya)
    {
        document.getElementById('id_finishid').value = idnya;
        document.getElementById('span_nama_finish').innerHTML = idnya.toString();
        $("#id_body_table_finish").empty();
        $("#id_body_table_usedmaterial").empty();
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>" + "Back/Order/Json_get_order_product/" + idnya,
            dataType: "json",
            success: function (result) {
                //ini kalau mau ambil 1 data saja sudah bisa.
                //alert ("hore sukses" + result);
                $.each(result, function (id, name)
                {

                    $("#id_body_table_finish").append(
                            "<tr role = 'row' class = 'odd'>" +
                            "<td>" + name['id_produk'] + "</td>" +
                            "<td><a onclick='show_material(\"" + name['id_produk'] + "\",\"" + name['namaproduk'] + "\")'  data-toggle='modal' data-target='#myMaterial'>" + name['namaproduk'] + "</a></td>" +
                            "<td>" + name['jumlah'] + "</td>" +
                            "</tr>");

                });

                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>" + "Back/Material/Get_used_material_temp/" + idnya,
                    dataType: "json",
                    success: function (result) {
                        var urutanresidu = 1;

                        $.each(result, function (id, nameb)
                        {


                            $("#id_body_table_usedmaterial").append(
                                    "<tr role = 'row' class = 'odd'>" +
                                    "<td hidden><input readonly id='id_txt_residu_idnotajualproduk_" + urutanresidu + "' class='form-control hitung' name='name_txt_residu_idnotajualproduk[]'  type='hidden' value='" + nameb['idnotajualproduk'] + "'></td>" +
                                    "<td><input readonly id='id_txt_residu_iddetailmaterial_" + urutanresidu + "' class='form-control hitung' name='name_txt_residu_iddetailmaterial[]'  type='text' value='" + nameb['iddetailmaterial'] + "'></td>" +
                                    "<td>" + nameb['namamaterial'] + "</a></td>" +
                                    "<td><input readonly id='id_txt_residu_jumlah_" + urutanresidu + "' class='form-control hitung' name='name_txt_residu_jumlah[]'  type='text' value='" + nameb['jumlah'] + "'></td>" +
                                    "<td><input  id='id_txt_residu_deskripsi_" + urutanresidu + "' class='form-control hitung' name='name_txt_residu_deskripsi[]'  type='text' value=''></td>" +
                                    "</tr>");

                            urutanresidu++;

                        });
                    }
                });
            }
        });

    }
    function showmodaldelete(idnya, dari)
    {

//        href="' . base_url() . 'Back/Order/DeleteOrder/' . $hasil->id . '/delete"
        document.getElementById('id_deleteid').value = idnya;

        document.getElementById('span_nama_delete').innerHTML = idnya.toString();
        $("#id_body_table_delete").empty();
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>" + "Back/Order/Json_get_order_product/" + idnya,
            dataType: "json",
            success: function (result) {
                //ini kalau mau ambil 1 data saja sudah bisa.
                //alert ("hore sukses" + result);
                $.each(result, function (id, name)
                {
                    if (name['tipe'] == 1) {
                        $("#id_body_table_delete").append(
                                "<tr role = 'row' class = 'odd'>" +
                                "<td>" + name['id_produk'] + "</td>" +
                                "<td><a onclick='show_material(\"" + name['id_produk'] + "\",\"" + name['namaproduk'] + "\")'  data-toggle='modal' data-target='#myMaterial'>" + name['namaproduk'] + "</a></td>" +
                                "<td>" + name['jumlah'] + "</td>" +
                                "<td>" + name['long'] + " CM</td>" +
                                "</tr>");
                    } else if (name['tipe'] == 2) {
                        $("#id_body_table_delete").append(
                                "<tr role = 'row' class = 'odd'>" +
                                "<td>" + name['id_produk'] + "</td>" +
                                "<td><a onclick='show_material(\"" + name['id_produk'] + "\",\"" + name['namaproduk'] + "\")'  data-toggle='modal' data-target='#myMaterial'>" + name['namaproduk'] + "</a></td>" +
                                "<td>" + name['jumlah'] + "</td>" +
                                "<td>is not long</td>" +
                                "</tr>");

                    }

                });
            }
        });

    }
    function submit_delete()
    {
        alert('sukses delte');
        $("#id_button_delete").prop('disabled', true);
        document.getElementById('smart-form-register-delete').submit();
    }

    function submit_finish()
    {
        $("#id_button_finish").prop('disabled', true);
        document.getElementById('smart-form-register-finish').submit();
    }

    function showmodalorderproduct(idnya)
    {
        $("#id_body_table_orderproduk").empty();
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>" + "Back/Order/Json_get_order_product/" + idnya,
            dataType: "json",
            success: function (result) {
                //ini kalau mau ambil 1 data saja sudah bisa.
                //alert ("hore sukses" + result);
                $.each(result, function (id, name)
                {

                    if (name['tipe'] == 1)
                    {
                        $("#id_body_table_orderproduk").append(
                                "<tr role = 'row' class = 'odd'>" +
                                "<td>" + name['id_produk'] + "</td>" +
                                "<td><a onclick='show_material(\"" + name['id_produk'] + "\",\"" + name['namaproduk'] + "\")'  data-toggle='modal' data-target='#myMaterial'>" + name['namaproduk'] + "</a></td>" +
                                "<td>" + name['jumlah'] + "</td>" +
                                "<td>" + name['long'] + " CM</td>" +
                                "<td>" + name['harga'] + "</td>" +
                                "<td>" + name['diskon'] + "</td>" +
                                "<td>" + name['subtotal'] + "</td>" +
                                "</tr>");
                    } else if (name['tipe'] == 2)
                    {
                        $("#id_body_table_orderproduk").append(
                                "<tr role = 'row' class = 'odd'>" +
                                "<td>" + name['id_produk'] + "</td>" +
                                "<td><a onclick='show_material(\"" + name['id_produk'] + "\",\"" + name['namaproduk'] + "\")'  data-toggle='modal' data-target='#myMaterial'>" + name['namaproduk'] + "</a></td>" +
                                "<td>" + name['jumlah'] + "</td>" +
                                "<td>is not roll</td>" +
                                "<td>" + name['harga'] + "</td>" +
                                "<td>" + name['diskon'] + "</td>" +
                                "<td>" + name['subtotal'] + "</td>" +
                                "</tr>");
                    }

                });



            }
        });
    }
    var urutanpayment = 1
    function add_to_table_payment()
    {
        console.log(typeof parseInt($('#id_paymentamount').val()));
        if (
                document.getElementById('id_paymentamount').value.length > 0 &&
                parseInt($('#id_paymentamount').val()) > 0

                )
        {



            var checkingadaproduksama = this.check_paymentmethod();
            //alert("checking " + checkingadamaterialsama);
            if (checkingadaproduksama == 3)
            {
                alert("Your PIN is not correct.");
            } else if (checkingadaproduksama == 2)
            {
                alert("Your deposit not enough.");
            } else if (checkingadaproduksama == null || checkingadaproduksama === 'undifined' || checkingadaproduksama != 0)
            {
                $("#id_body_table_payment_method").append(
                        "<tr id='tr_" + urutanpayment + "' role = 'row' class = 'odd'>" +
                        "<td hidden><div ><input readonly id='id_txt_id_paymentmethod_" + urutanpayment + "' class='form-control hitung' name='name_txt_id_paymentmethod[]'  type='hidden' value='" + $("#id_paymentmethod option:selected").val() + "'></div></td>" +
                        "<td><div ><input readonly id='id_txt_paymentmethod_" + urutanpayment + "' class='form-control ' name='name_txt_paymentmethod[]'  type='hidden' value='" + $("#id_paymentmethod option:selected").text() + "'>" + $("#id_paymentmethod option:selected").text() + "</div></td>" +
                        "<td><div ><input readonly id='id_txt_paymentamount_" + urutanpayment + "' class='form-control ' name='name_txt_id_paymentamount[]'  type='hidden' value='" + $("#id_paymentamount").val() + "'>" + number_format($("#id_paymentamount").val(), 0, ".", ",") + "</div></td>" +
                        "<td><div><a onclick='remove_payment_tr(" + urutanpayment + ")'>x</a></div></td>" +
                        "</tr>");

                urutanpayment++;
                checkingadaproduksama = 1;
                update_grandtotal_payment();

                // $("#id_paymentmethod").val(1);
                $("#id_paymentamount").val("");
            } else if (checkingadaproduksama == 0)
            {
                alert("Payment have been registerd");
            }

        } else
        {
            alert("Nulls in field Payment Method Amount are not allowed");
        }
    }

    function check_paymentmethod()
    {
        //cek apakah duit deposit nya lebih besar dari pembayarangnya
        if ($("#id_paymentmethod option:selected").val() == 0)
        {
            var idmember = $('#id_memberid').val();
            var pin = $('#id_pin').val();
            var a = Math.floor((Math.random() * 9) + 1);
            var b = Math.floor((Math.random() * 9) + 1);
            var c = Math.floor((Math.random() * 9) + 1);
            var pinbenar = false;
            //pin = pin.split();
            var modifiedpin = String(a) + pin[5] + pin[4] + pin[3] + String(b) + pin[0] + pin[1] + pin[2] + String(c);
            alert(modifiedpin);

            $.ajax({
                async: true,
                type: "POST",
                url: "<?php echo base_url(); ?>" + "Back/Order/Check_pin",
                datatype: "json",
                async: false,
                data: {
                    idmember: idmember,
                    pin: modifiedpin

                },
                success: function (result) {
                    //ini kalau mau ambil 1 data saja sudah bisa.
                    //if (result == "asd")
//                    alert(result);
                    var coba = result;
                    alert(coba + "yes");
                    if (result == 1)
                    {
                        pinbenar = true;
                        alert("Transaction Success");

                    } else {
                        pinbenar = false;
                        alert("Pin is not correct");
                        $("#id_button_addorder").prop('disabled', false);
                    }
                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    alert("Status: " + textStatus);
                    alert("Error: " + errorThrown);
                }
            });

            //jika pinbenar==true
            //jika yang dibayar lebih besar dari deposit
            if (pinbenar == false)
            {
                return 3;
            }
            if (parseFloat($("#id_paymentamount").val()) > parseFloat($("#id_deposit").val()))
            {
                return 2;
            }

            //ini bener e sama dengan pengecekan di bawah.
            // tapi ini cuma buat ngecek deposit.
            //kalau sudah pin bener, baru cek apakah ada di table.

        }


        var numItems = $('.hitung').length;

        //  var id = event.target.id;
        var counterwhile = 1;
        while (numItems > 0 && $("#id_paymentmethod option:selected").val() != 0)
        {   // jika yang dipilih ada di id-text_id_material_product(table)
            if ($("#id_paymentmethod option:selected").val() == $("#id_txt_id_paymentmethod_" + counterwhile).val())
            {
                counterwhile = 1;
                //kembalikan 0 untuk alert dari fungsi sebelumnya
                return 0;
                break;
            }
            if ($("#id_txt_id_paymentmethod_" + counterwhile).length > 0)
            {
                numItems--;
            }
            counterwhile++;

        }

        //if($("#id_paymentmethod option:selected").val() == 0&& pinbenar==true)
        return 1;

    }
    function remove_payment_tr(y)
    {

        $("#tr_" + y).remove();
        update_grandtotal_payment();

    }
    function update_grandtotal_payment()
    {
        var numItem = $('.hitung').length;

        var grandtotalpayment = 0;
        // var id = event.target.id;
        var counterwhile = 1;
        while (numItem > 0)
        {   // jika yang dipilih ada di id-text_id_material_product(table)

            if ($("#id_txt_id_paymentmethod_" + counterwhile).length > 0)
            {
                //  alert(numItem);
                grandtotalpayment += parseFloat($("#id_txt_paymentamount_" + counterwhile).val());
                numItem--;
            }
            counterwhile++;

        }

        $("#id_payment_method_grandtotal").val(grandtotalpayment);
    }

    function check_all_not_null()
    {
        $("#id_button_payment").prop('disabled', true);

        if ($('.hitung').length == 0)
        {

            alert("Register at least one payment method");
            $("#id_button_payment").prop('disabled', false);
        } else
        {

            // alert($("#id_payment_method_grandtotal").val());
            // alert($("#id_paymentgrandtotal").val());
            if (parseFloat($("#id_payment_method_grandtotal").val()) < parseFloat($("#id_paymentgrandtotal").val())) {
                alert("Your fund is insufficient");
                $("#id_button_payment").prop('disabled', false);

            } else if (parseFloat($("#id_payment_method_grandtotal").val()) > parseFloat($("#id_paymentgrandtotal").val()))
            {
                alert("Your fund is more than needed");
                $("#id_button_payment").prop('disabled', false);
            } else {
//alert("oke");
                document.getElementById("smart-form-register-payment").submit();
                // $("#id_button_payment").prop('disabled', false);
            }
        }


    }

    function show_material(idnya, nama)
    {

        $("#span_nama_material").text(nama + " (Product Id " + idnya + ")");
        $("#tablebodymaterial").empty();
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>" + "Back/Product/Json_get_material/" + idnya,
            dataType: "json",
            success: function (result) {
                //ini kalau mau ambil 1 data saja sudah bisa.
                // alert ("hore sukses" + result);
                $.each(result, function (id, name)
                {

                    $("#tablebodymaterial").append(
                            "<tr role = 'row' class = 'odd'>" +
                            "<td>" + name['idmaterial'] + "</td>" +
                            "<td>" + name['namamaterial'] + "</td>" +
                            "<td>" + name['jumlahmaterial'] + "</td>" +
                            "</tr>");

                });
            }
        });
    }

</script>