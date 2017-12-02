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



    <!-- MAIN CONTENT -->
    <div id="content">

        <!-- row -->
        <div class="row">

            <!-- col -->
            <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
                <h1 class="page-title txt-color-blueDark">

                    <!-- PAGE HEADER -->
                    <i class="fa-fw fa fa-home"></i> 
                    Material
                    <span>>  
                        Material List
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

                        <header role="heading"><div class="jarviswidget-ctrls" role="menu">   <a href="javascript:void(0);" class="button-icon jarviswidget-toggle-btn" rel="tooltip" title="" data-placement="bottom" data-original-title="Collapse"><i class="fa fa-minus "></i></a> <a href="javascript:void(0);" class="button-icon jarviswidget-fullscreen-btn" rel="tooltip" title="" data-placement="bottom" data-original-title="Fullscreen"><i class="fa fa-expand "></i></a> <a href="javascript:void(0);" class="button-icon jarviswidget-delete-btn" rel="tooltip" title="" data-placement="bottom" data-original-title="Delete"><i class="fa fa-times"></i></a></div><div class="widget-toolbar" role="menu"><a data-toggle="dropdown" class="dropdown-toggle color-box selector" href="javascript:void(0);"></a><ul class="dropdown-menu arrow-box-up-right color-select pull-right"><li><span class="bg-color-green" data-widget-setstyle="jarviswidget-color-green" rel="tooltip" data-placement="left" data-original-title="Green Grass"></span></li><li><span class="bg-color-greenDark" data-widget-setstyle="jarviswidget-color-greenDark" rel="tooltip" data-placement="top" data-original-title="Dark Green"></span></li><li><span class="bg-color-greenLight" data-widget-setstyle="jarviswidget-color-greenLight" rel="tooltip" data-placement="top" data-original-title="Light Green"></span></li><li><span class="bg-color-purple" data-widget-setstyle="jarviswidget-color-purple" rel="tooltip" data-placement="top" data-original-title="Purple"></span></li><li><span class="bg-color-magenta" data-widget-setstyle="jarviswidget-color-magenta" rel="tooltip" data-placement="top" data-original-title="Magenta"></span></li><li><span class="bg-color-pink" data-widget-setstyle="jarviswidget-color-pink" rel="tooltip" data-placement="right" data-original-title="Pink"></span></li><li><span class="bg-color-pinkDark" data-widget-setstyle="jarviswidget-color-pinkDark" rel="tooltip" data-placement="left" data-original-title="Fade Pink"></span></li><li><span class="bg-color-blueLight" data-widget-setstyle="jarviswidget-color-blueLight" rel="tooltip" data-placement="top" data-original-title="Light Blue"></span></li><li><span class="bg-color-teal" data-widget-setstyle="jarviswidget-color-teal" rel="tooltip" data-placement="top" data-original-title="Teal"></span></li><li><span class="bg-color-blue" data-widget-setstyle="jarviswidget-color-blue" rel="tooltip" data-placement="top" data-original-title="Ocean Blue"></span></li><li><span class="bg-color-blueDark" data-widget-setstyle="jarviswidget-color-blueDark" rel="tooltip" data-placement="top" data-original-title="Night Sky"></span></li><li><span class="bg-color-darken" data-widget-setstyle="jarviswidget-color-darken" rel="tooltip" data-placement="right" data-original-title="Night"></span></li><li><span class="bg-color-yellow" data-widget-setstyle="jarviswidget-color-yellow" rel="tooltip" data-placement="left" data-original-title="Day Light"></span></li><li><span class="bg-color-orange" data-widget-setstyle="jarviswidget-color-orange" rel="tooltip" data-placement="bottom" data-original-title="Orange"></span></li><li><span class="bg-color-orangeDark" data-widget-setstyle="jarviswidget-color-orangeDark" rel="tooltip" data-placement="bottom" data-original-title="Dark Orange"></span></li><li><span class="bg-color-red" data-widget-setstyle="jarviswidget-color-red" rel="tooltip" data-placement="bottom" data-original-title="Red Rose"></span></li><li><span class="bg-color-redLight" data-widget-setstyle="jarviswidget-color-redLight" rel="tooltip" data-placement="bottom" data-original-title="Light Red"></span></li><li><span class="bg-color-white" data-widget-setstyle="jarviswidget-color-white" rel="tooltip" data-placement="right" data-original-title="Purity"></span></li><li><a href="javascript:void(0);" class="jarviswidget-remove-colors" data-widget-setstyle="" rel="tooltip" data-placement="bottom" data-original-title="Reset widget color to default">Remove</a></li></ul></div>
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
                                                echo '<td><a   onclick="showmodalorderproduct(' . $hasil->id . ')" class="" style=""   data-toggle="modal" data-target="#myOrderDetail">' . $hasil->id . '</a></td>';
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
                                                echo '<td>' . $hasil->grandtotal . '</td>';
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
                                                if ($hasil->status == 0 && ($this->session->userdata['xcellent_tipe'] == 1 || $this->session->userdata['xcellent_tipe'] == 3)) {
                                                    echo '  <a href="' . base_url() . 'Back/Order/Show_edit_order/' . $hasil->id . '"  class="btn glyphicon glyphicon-pencil" style="color:black" ></a>';
                                                }
                                                echo'<span> <span>';
//                                                echo '<a   onclick="showdeletedaorder(' . $hasil->id . ')" class="glyphicon glyphicon-trash" style="color:red"  data-toggle="modal" data-target="#myDeleteModal"></a>';
                                                echo'<span> <span>';
                                                if ($hasil->status == 0 && ($this->session->userdata['xcellent_tipe'] == 1 || $this->session->userdata['xcellent_tipe'] == 3)) {
                                                    echo '<a   onclick="showmodalpayment(' . $hasil->id . ',' . $hasil->grandtotal . ')" class="fa fa-money" style="color:green"   data-toggle="modal" data-target="#myPaymentModal"></a>';
                                                } else if ($hasil->status == 1 && ($this->session->userdata['xcellent_tipe'] == 1 || $this->session->userdata['xcellent_tipe'] == 4)) {
                                                    echo '<a   onclick="showmodalproducing(' . $hasil->id . ')" class="btn glyphicon glyphicon-cog" style="color:orange"  data-toggle="modal" data-target="#myProducingModal"></a>';
                                                } else if ($hasil->status == 2 && ($this->session->userdata['xcellent_tipe'] == 1 || $this->session->userdata['xcellent_tipe'] == 4)) {
                                                    echo '<a   onclick="showmodalfinish(' . $hasil->id . ')" class="btn glyphicon glyphicon-ok" style="color:blue"  data-toggle="modal" data-target="#myFinishModal"></a>';
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

    <!-- MODAL HAPUS -->
    <div class="modal fade" id="myDeleteModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Delete Admin Form</h4>
                </div>
                <div class="modal-body">
                    <form id="smart-form-register" action="<?php echo base_url(); ?>Back/Admin/Delete_admin" class="smart-form" novalidate="novalidate" method="post">

                        <p>Are you sure want to delete Admin <span id="span_nama" style="color:blue"></span>?</p>
                        <input hidden  id="id_deleteid" type="text" name="name_deleteid"  aria-required="true" class="error" aria-invalid="true" >
                        <input hidden id="id_deletename" type="text" name="name_deletename"  aria-required="true" class="error" aria-invalid="true" >
                        <footer>
                            <input type="submit" name="button_deleteadmin" class="btn btn-primary" value="Delete">
                        </footer>
                    </form>	
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
                    <form id="smart-form-register" action="<?php echo base_url(); ?>Back/Order/Make_payment" class="smart-form" novalidate="novalidate" method="post">

                        <p>Are you sure want to make a Payment for Order Note <span id="span_nama_payment" style="color:blue"></span>?</p>
                        <input hidden id="id_paymentid" type="text" name="name_paymentid"  aria-required="true" class="error" aria-invalid="true" >
                        <input hidden id="id_paymentgrandtotal" type="text" name="name_grandtotal"  aria-required="true" class="error" aria-invalid="true" >
                        <footer>
                            <input type="submit" name="button_payment" class="btn btn-primary" value="They Have Paid">
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
                    <form id="smart-form-register" action="<?php echo base_url(); ?>Back/Order/Run_producing" class="smart-form" novalidate="novalidate" method="post">

                        <p>Are you sure want to run a Producing for Order Note <span id="span_nama_producing" style="color:blue"></span>?</p>
                        <input   id="id_producingid" type="hidden" name="name_producingid"  aria-required="true" class="error" aria-invalid="true" >
                        <footer>
                            <input type="submit" name="button_producing" class="btn btn-primary" value="Produce all items">
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
                    <form id="smart-form-register" action="<?php echo base_url(); ?>Back/Order/Set_finish" class="smart-form" novalidate="novalidate" method="post">

                        <p>Are you sure want to set to Finish for Order Note <span id="span_nama_finish" style="color:blue"></span>?</p>
                        <input   id="id_finishid" type="text" name="name_finishid"  aria-required="true" class="error" aria-invalid="true" >
                        <footer>
                            <input type="submit" name="button_finish" class="btn btn-primary" value="Finish">
                        </footer>
                    </form>	
                </div>
            </div>

        </div>
    </div>


    <!-- MODAL edit -->
    <div class="modal fade" id="myEditModal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Edit Material Form</h4>
                </div>
                <form id="smart-form-register" action="<?php echo base_url(); ?>Back/Material/Edit_material" class="smart-form" novalidate="novalidate" method="post">
                    <input hidden id="id_editid" type="text" name="name_editid" placeholder="Contact Person" aria-required="true" class="error" aria-invalid="true" value="<?php echo set_value('name_editid'); ?>">
                    <fieldset>
                        <label class="input control-label">Stock Type</label>
                        <section>
                            <label class="input"> <i class="icon-append fa fa-puzzle-piece"></i>
                                <select id="id_edittype" class="form-control" name="name_edittype" id="select-1" selected ="select" >
                                    <option value="1">Ordinary</option>
                                    <option value="2">Role</option>


                                </select> 
                            </label>
                            <span class="col-md-9 text-danger">
                                <?php echo form_error('name_edittype'); ?>
                            </span>
                        </section>
                    </fieldset>
                    <fieldset>
                        <label class="input control-label">Name</label>
                        <section>
                            <label class="input"> <i class="icon-append fa fa-puzzle-piece"></i>
                                <input id="id_editname" type="text" name="name_editname" placeholder="Name" aria-required="true" class="error" aria-invalid="true" value="<?php echo set_value('name_editname'); ?>">
                                <b class="tooltip tooltip-bottom-right">Needed to enter the name</b>
                            </label>
                            <span class="col-md-9 text-danger">
                                <?php echo form_error('name_editname'); ?>
                            </span>
                        </section>
                    </fieldset>
                    <fieldset>
                        <label class="input control-label">HPP</label>
                        <section>
                            <label class="input"> <i class="icon-append fa fa-puzzle-piece"></i>
                                <input id="id_edithpp" type="number" name="name_edithpp" placeholder="Name" aria-required="true" class="error" aria-invalid="true" value="<?php echo set_value('name_editname'); ?>">
                                <b class="tooltip tooltip-bottom-right">Needed to enter the HPP</b>
                            </label>
                            <span class="col-md-9 text-danger">
                                <?php echo form_error('name_edithpp'); ?>
                            </span>
                        </section>
                    </fieldset>


                    <footer>
                        <input type="submit" name="button_editmaterial" class="btn btn-primary" value="Submit">
                    </footer>
                </form>	
            </div>
        </div>
    </div>

</div>    
<script>


    function showmodalpayment(idnya, grandtotal)
    {
        document.getElementById('id_paymentid').value = idnya;
        document.getElementById('id_paymentgrandtotal').value = grandtotal;
        document.getElementById('span_nama_payment').innerHTML = idnya.toString();

    }
    function showmodalproducing(idnya)
    {
        document.getElementById('id_producingid').value = idnya;
        document.getElementById('span_nama_producing').innerHTML = idnya.toString();

    }
    function showmodalfinish(idnya)
    {
        document.getElementById('id_finishid').value = idnya;
        document.getElementById('span_nama_finish').innerHTML = idnya.toString();

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

                    $("#id_body_table_orderproduk").append(
                            "<tr role = 'row' class = 'odd'>" +
                            "<td>" + name['id'] + "</td>" +
                            "<td>" + name['namaproduk'] + "</td>" +
                            "<td>" + name['jumlah'] + "</td>" +
                            "<td>" + name['harga'] + "</td>" +
                            "<td>" + name['diskon'] + "</td>" +
                            "<td>" + name['subtotal'] + "</td>" +
                            "</tr>");

                });
            }
        });
    }
</script>