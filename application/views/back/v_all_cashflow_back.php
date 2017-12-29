<div id="main" role="main">

    <!-- RIBBON -->
    <div id="ribbon">

        <span class="ribbon-button-alignment"> 
            <span id="refresh" class="btn btn-ribbon" data-action="resetWidgets" data-title="refresh"  rel="tooltip" data-placement="bottom" data-original-title="<i class='text-warning fa fa-warning'></i> Warning! This will reset all your widget settings." data-html="true">
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
                    Cash Flow

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

        <div class="jarviswidget jarviswidget-sortable" id="wid-id-4" data-widget-editbutton="false" data-widget-custombutton="false" role="widget">

            <header role="heading"><span class="widget-icon"> <i class="fa fa-edit"></i> </span>
                <h2>Add Cash Flow Form aa</h2>				

                <span class="jarviswidget-loader"><i class="fa fa-refresh fa-spin"></i></span></header>

            <!-- widget div-->
            <div role="content">

                <!-- widget edit box -->
                <div class="jarviswidget-editbox">
                    <!-- This area used as dropdown edit box -->

                </div>
                <!-- end widget edit box -->

                <!-- widget content -->
                <div class="widget-body no-padding">

                    <form  id="smart-form-register" action="<?php echo base_url(); ?>Back/Cashflow/Add_cashflow" class="form-horizontal" novalidate="novalidate" method="post">

                        <?php //echo validation_errors(); ?>

                        <div class="form-group">
                            <label class="col-md-2 control-label" for="select-1">Type</label>
                            <div class="col-md-2">
                                <select class="form-control" name="name_type" id="select-1" selected ="select" >
                                    <option value="1">Debit</option>
                                    <option value="2">Credit</option>
                                </select> 
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label" for="select-1">Name</label>
                            <div class="col-md-2">
                                <input class="form-control" name="name_name"  type="text" value="<?php echo set_value('name_name'); ?>">
                                <span class="col-md-9 text-danger">
                                    <?php echo form_error('name_name'); ?>
                                </span>


                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label">Description</label>
                            <div class="col-md-6">
                                <textarea class="form-control" name="name_description" placeholder="Description" rows="4" ><?php echo set_value('name_description'); ?></textarea>
                                <span class="col-md-9 text-danger">
                                    <?php echo form_error('name_description'); ?>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label" for="select-1">Amount</label>
                            <div class="col-md-2">
                                <input class="form-control" name="name_amount"  type="number" min="0" value="<?php echo set_value('name_amount'); ?>">
                                <span class="col-md-9 text-danger">
                                    <?php echo form_error('name_amount'); ?>
                                </span>


                            </div>
                        </div>


                        <footer>
                            <div class="form-group">
                                <label class="col-md-2 control-label" for="select-1"></label>

                                <div class="col-md-4">

                                    <input type="submit" name="button_addcashflow" class="btn btn-primary" value="Add to Cash Flow">
                                </div>

                            </div>

                        </footer>
                    </form>						

                </div>
                <!-- end widget content -->

            </div>
            <!-- end widget div -->


            <!-- widget grid -->
            <section id="widget-grid" class="">

                <!-- row -->
                <div class="row">

                    <!-- NEW WIDGET START -->
                    <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                        <!-- Widget ID (each widget will need unique ID)-->
                        <div class="jarviswidget jarviswidget-color-blueDark jarviswidget-sortable" id="wid-id-2" data-widget-editbutton="false" role="widget">

                            <header role="heading"><span class="widget-icon"> <i class="fa fa-table"></i> </span>
                                <h2>Cash Flow Listaaaa </h2>

                                <span class="jarviswidget-loader"><i class="fa fa-refresh fa-spin"></i></span></header>

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
                                                    <th data-class="expand" class="expand sorting"  tabindex="0" aria-controls="datatable_col_reorder" rowspan="1" colspan="1" aria-sort="ascending" aria-label="ID: activate to sort column descending" style="width: 32px;">ID</th>
                                                    <th data-hide="phone" class="sorting" tabindex="0" aria-controls="datatable_col_reorder" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 81px;">Date</th>
                                                    <th data-hide="phone" class="sorting" tabindex="0" aria-controls="datatable_col_reorder" rowspan="1" colspan="1" aria-sort="ascending" aria-label="ID: activate to sort column descending" style="width: 32px;">Name</th>
                                                    <th data-hide="phone" class="sorting" tabindex="0" aria-controls="datatable_col_reorder" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 81px;">Description</th>
                                                    <th data-hide="phone" class="sorting" tabindex="0" aria-controls="datatable_col_reorder" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 81px;">Debit</th>
                                                    <th data-hide="phone" class="sorting" tabindex="0" aria-controls="datatable_col_reorder" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 81px;">Credit</th>
                                                    <th data-hide="phone" class="" tabindex="0" aria-controls="datatable_col_reorder" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 81px;">Action</th>




                                            </thead>
                                            <tbody>	
                                                <?php
                                                foreach ($tablecashflow as $hasil) {
                                                    echo '<tr role = "row" class = "odd">';
                                                    echo '<td>' . $hasil->id . '</td>';
                                                    echo '<td>' . $hasil->createdat . '</td>';
                                                    echo '<td>' . $hasil->nama . '</td>';
                                                    echo '<td>' . $hasil->deskripsi . '</td>';
                                                    if ($hasil->tipe == 2) {
                                                        echo ' <td ></td>';
                                                        echo ' <td ><span style="color:red">' . $hasil->jumlah . '</span></td>';
                                                    } else if ($hasil->tipe == 1) {
                                                        echo ' <td ><span style="color:green">' . $hasil->jumlah . '</span></td>';
                                                        echo ' <td ></td>';
                                                    }


                                                    echo '<td>   <a href="' . base_url() . 'Back/Promo/Show_edit_promo/' . $hasil->id . '"  class="btn glyphicon glyphicon-pencil" style="color:black" ></a>
                                                        <a   onclick="showdeletedatamaterial(' . $hasil->id . ',\'' . $hasil->nama . '\')" class="btn glyphicon glyphicon-trash" style="color:red"  data-toggle="modal" data-target="#myDeleteModal"></a></td>';
                                                    echo '</tr>';
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                        <div class = "dt-toolbar-footer">

                                        </div>

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
    </div>
    <!--END MAIN CONTENT -->

    <!-- MODAL myPromo -->

    <div class="modal fade" id="myPromo" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Products and Discount for Promo <span id="span_nama" style="color:blue"></span> </h4>
                </div>
                <div class="modal-body">
                    <div class="widget-body no-padding">

                        <div id="datatable_col_reorder_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">

                            <table id="datatable_col_reorder" class="table table-striped table-bordered table-hover dataTable no-footer has-columns-hidden" width="100%" role="grid" aria-describedby="datatable_col_reorder_info" style="width: 100%;">
                                <thead>
                                    <tr role="row">
                                        <!--<th data-hide="phone" class="sorting_asc" tabindex="0" aria-controls="datatable_col_reorder" rowspan="1" colspan="1" aria-sort="ascending" aria-label="ID: activate to sort column descending" style="width: 32px;">ID</th>-->
                                        <th data-class="expand" class="expand sorting" tabindex="0" aria-controls="datatable_col_reorder" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 81px;">Name</th>
                                        <th data-hide="phone" class="sorting" tabindex="0" aria-controls="datatable_col_reorder" rowspan="1" colspan="1" aria-label="Phone: activate to sort column ascending" style="width: 131px;">Discount</th>


                                </thead>
                                <tbody id="tablebodypromo">	

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


    <!-- MODAL edit -->

</div>    

<script>

    function show_promo(idnya, nama)
    {

        $("#span_nama").text(nama);
        $("#tablebodypromo").empty();
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>" + "Back/Promo/Json_get_promo_product/" + idnya,
            dataType: "json",
            success: function (result) {
                //ini kalau mau ambil 1 data saja sudah bisa.
                // alert("hore sukses" + result);
                $.each(result, function (id, name)
                {

                    $("#tablebodypromo").append(
                            "<tr role = 'row' class = 'odd'>" +
                            "<td>" + name['namaproduct'] + "</td>" +
                            "<td>" + name['diskon'] + " %</td>" +
                            "</tr>");

                });
            },
            error: function (xhr, textStatus, errorThrown) {
                alert('request failed');
            }
        });
    }


</script>