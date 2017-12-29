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
                    Purchasing
                    <span>>  
                        Purchasing Note List
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

                        <header role="heading"><span class="widget-icon"> <i class="fa fa-table"></i> </span>


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
                                                <th data-hide="phone" class="sorting_asc" tabindex="0" aria-controls="datatable_col_reorder" rowspan="1" colspan="1" aria-sort="ascending" aria-label="ID: activate to sort column descending" style="width: 32px;">ID</th>
                                                <th data-class="expand" class="expand sorting" tabindex="0" aria-controls="datatable_col_reorder" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 81px;">Items</th>
                                                <th data-hide="phone" class="sorting" tabindex="0" aria-controls="datatable_col_reorder" rowspan="1" colspan="1" aria-label="Phone: activate to sort column ascending" style="width: 131px;">Qty</th>
                                                <th data-hide="phone" class="sorting_asc" tabindex="0" aria-controls="datatable_col_reorder" rowspan="1" colspan="1" aria-sort="ascending" aria-label="ID: activate to sort column descending" style="width: 32px;">Amount</th>
                                                <th data-hide="phone" class="sorting_asc" tabindex="0" aria-controls="datatable_col_reorder" rowspan="1" colspan="1" aria-sort="ascending" aria-label="ID: activate to sort column descending" style="width: 32px;">Price</th>
                                                <th data-hide="phone" class="sorting_asc" tabindex="0" aria-controls="datatable_col_reorder" rowspan="1" colspan="1" aria-sort="ascending" aria-label="ID: activate to sort column descending" style="width: 32px;">Subtotal</th>
                                              
                                                <th class="" tabindex="0" aria-controls="datatable_col_reorder" rowspan="1" colspan="1" aria-label="Phone: activate to sort column ascending" style="width: 131px;">Action</th>
                                        </thead>
                                        <tbody>	
                                            <?php
                                            foreach ($tablepurchasingnote as $hasil) {
                                                echo '<tr role = "row" class = "odd">';
                                                echo '<td>' . $hasil->id . '</td>';
                                                echo ' <td >' . $hasil->nama . '</td>';
                                                echo '<td>' . $hasil->tipe . '</td>';
                                                echo '<td>' . $hasil->hpp . '</td>';
                                                echo '<td>' . $hasil->stok . ' <a   onclick="showdetailstockmaterial(' . $hasil->id . ',\'' . $hasil->nama . '\')" class="btn glyphicon glyphicon-eye-open" style="color:blue"  data-toggle="modal" data-target="#myDetailStockModal"> </a>  </td>';
                                                echo '<td>' . $hasil->jumlahperpack . '</td>';
                                                ?>
                                                <td>   
                                                    <a href="<?php echo base_url();?>Back/Material/Show_edit_material/<?php echo $hasil->id;?>"  class="btn glyphicon glyphicon-pencil" style="color:black" ></a>
                                                    <a  onclick="showdeletedatamaterial(<?php echo $hasil->id;?>,'<?php echo $hasil->nama;?>')" class="btn glyphicon glyphicon-trash" style="color:red"  data-toggle="modal" data-target="#myDeleteModal"></a></td>';
                                                </tr>
                                                <?php 
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

    <!-- MODAL DetailStcok -->
    <div class="modal fade" id="myDetailStockModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Stock Detail for Material <span id="span_nama" style="color:blue"></span> </h4>
                </div>
                <div class="modal-body">
                    <div class="widget-body no-padding">

                        <div id="datatable_col_reorder_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">

                            <table id="datatable_col_reorder" class="table table-striped table-bordered table-hover dataTable no-footer has-columns-hidden" width="100%" role="grid" aria-describedby="datatable_col_reorder_info" style="width: 100%;">
                                <thead>
                                    <tr role="row">
                                        <th data-hide="phone" class="sorting_asc" tabindex="0" aria-controls="datatable_col_reorder" rowspan="1" colspan="1" aria-sort="ascending" aria-label="ID: activate to sort column descending" style="width: 32px;">ID</th>
                                        <th data-class="expand" class="expand sorting" tabindex="0" aria-controls="datatable_col_reorder" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 81px;">Name</th>
                                        <th data-hide="phone" class="sorting" tabindex="0" aria-controls="datatable_col_reorder" rowspan="1" colspan="1" aria-label="Phone: activate to sort column ascending" style="width: 131px;">Retail Stock</th>
                                        <th data-hide="phone" class="sorting" tabindex="0" aria-controls="datatable_col_reorder" rowspan="1" colspan="1" aria-label="Phone: activate to sort column ascending" style="width: 131px;">Input Date</th>
                                     
                                        
                                </thead>
                                <tbody id="tablebody">	
                                    <?php
//                                    foreach ($tabledetailmaterial as $hasil) {
//                                        echo '<tr role = "row" class = "odd">';
//                                        echo '<td>' . $hasil->id . '</td>';
//                                        echo ' <td >' . $hasil->nama . '</td>';
//                                        echo '<td>' . $hasil->tipe . '</td>';
//                                        echo '<td>' . $hasil->hpp . '</td>';
//                                        echo '</tr>';
//                                    }
                                    ?>
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
    <div class="modal fade" id="myEditModal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Edit Material Form</h4>
                </div>
                <form id="smart-form-register" action="<?php echo base_url(); ?>Back/Material/Edit_material" class="smart-form" novalidate="novalidate" method="post">
                    <input hidden id="id_editid" type="text" name="name_editid"  aria-required="true" class="error" aria-invalid="true" value="<?php echo set_value('name_editid'); ?>">
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
                                <input id="id_editname" type="text" name="name_editname"  aria-required="true" class="error" aria-invalid="true" value="<?php echo set_value('name_editname'); ?>">
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
                                <input id="id_edithpp" type="number" name="name_edithpp"  min="0" aria-required="true" class="error" aria-invalid="true" value="<?php echo set_value('name_editname'); ?>">
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