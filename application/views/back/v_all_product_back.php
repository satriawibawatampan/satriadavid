<div id="main" role="main">
<?php $hakakses = $this->session->userdata['xcellent_hakakses'];
    ?>
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
                    Product
                    <span>>  
                        Product List
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
                                                <!--<th data-hide="phone" class="sorting_asc" tabindex="0" aria-controls="datatable_col_reorder" rowspan="1" colspan="1" aria-sort="ascending" aria-label="ID: activate to sort column descending" style="width: 32px;">ID</th>-->
                                                <th data-class="expand" class="expand sorting" tabindex="0" aria-controls="datatable_col_reorder" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 81px;">Name</th>
                                                <th data-class="expand" class="expand sorting" tabindex="0" aria-controls="datatable_col_reorder" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 81px;">Category</th>

                                                <th data-hide="phone" class="sorting_asc" tabindex="0" aria-controls="datatable_col_reorder" rowspan="1" colspan="1" aria-sort="ascending" aria-label="ID: activate to sort column descending" style="width: 32px;">Selling Price</th>
                                                <th data-hide="phone" class="sorting_asc" tabindex="0" aria-controls="datatable_col_reorder" rowspan="1" colspan="1" aria-sort="ascending" aria-label="ID: activate to sort column descending" style="width: 32px;">Status</th>


                                                <th class="" tabindex="0" aria-controls="datatable_col_reorder" rowspan="1" colspan="1" aria-label="Phone: activate to sort column ascending" style="width: 131px;">Action</th>
                                        </thead>
                                        <tbody>	
                                            <?php
                                            foreach ($tableproduct as $hasil) {
                                                echo '<tr role = "row" class = "odd">';
                                                //echo '<td>' . $hasil->id . '</td>';
                                                echo ' <td ><a   onclick="show_material(' . $hasil->id . ',\'' . $hasil->nama . '\')" class="btn glyphicon glyphicon-eye-open" style="color:green"  data-toggle="modal" data-target="#myMaterial"> ' . $hasil->nama . '</a></td>';
                                                echo ' <td >' . $hasil->namakategori . '</td>';
                                                echo '<td>' . '<a   onclick="show_product_price(' . $hasil->id . ',\'' . $hasil->nama . '\')" class="btn glyphicon glyphicon-eye-open" style="color:blue"  data-toggle="modal" data-target="#myPriceModal"> ' . number_format($hasil->hargajual, 0, ".", ",") . ' </a> </td>';
                                                if ($hasil->statusaktif == 0) {
                                                    echo '<td style="color:red">Deactivated</td>';
                                                } else if ($hasil->statusaktif == 1) {
                                                    echo '<td style="color:blue">Activated</td>';
                                                }
                                                if(in_array(47, $hakakses)){
                                                echo '<td>   <a href="' . base_url() . 'Back/Product/Show_edit_product/' . $hasil->id . '"  class="btn glyphicon glyphicon-pencil" style="color:black" ></a>';
                                                }
                                                if ($hasil->statusaktif == 0&& in_array(48, $hakakses)) {
                                                    echo '<a   onclick="showactivateproduct(' . $hasil->id . ',\'' . $hasil->nama . '\')" class="btn glyphicon glyphicon-trash" style="color:blue"  data-toggle="modal" data-target="#myActivateModal"></a></td>';
                                                } else if ($hasil->statusaktif == 1&& in_array(48, $hakakses)) {
                                                    echo '<a   onclick="showdeactivateproduct(' . $hasil->id . ',\'' . $hasil->nama . '\')" class="btn glyphicon glyphicon-trash" style="color:red"  data-toggle="modal" data-target="#myDeactivateModal"></a></td>';
                                                }
                                                echo '</tr>';
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

    <!-- MODAL myPriceModal -->
    <div class="modal fade" id="myPriceModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Prices for <span id="span_nama_price" style="color:blue"></span> </h4>
                </div>
                <div class="modal-body">
                    <div class="widget-body no-padding">

                        <div id="datatable_col_reorder_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">

                            <table id="datatable_col_reorder" class="table table-striped table-bordered table-hover dataTable no-footer has-columns-hidden" width="100%" role="grid" aria-describedby="datatable_col_reorder_info" style="width: 100%;">
                                <thead>
                                    <tr role="row">
                                        <!--<th data-hide="phone" class="sorting_asc" tabindex="0" aria-controls="datatable_col_reorder" rowspan="1" colspan="1" aria-sort="ascending" aria-label="ID: activate to sort column descending" style="width: 32px;">ID</th>-->
                                        <th data-class="expand" class="expand sorting" tabindex="0" aria-controls="datatable_col_reorder" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 81px;">Qty Min</th>
                                        <th data-hide="phone" class="sorting" tabindex="0" aria-controls="datatable_col_reorder" rowspan="1" colspan="1" aria-label="Phone: activate to sort column ascending" style="width: 131px;">Qty Max</th>
                                        <th data-hide="phone" class="sorting" tabindex="0" aria-controls="datatable_col_reorder" rowspan="1" colspan="1" aria-label="Phone: activate to sort column ascending" style="width: 131px;">Price</th>


                                </thead>
                                <tbody id="tablebody">	

                                </tbody>
                            </table>

                        </div>

                    </div>
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
                                        <!--<th data-class="expand" class="expand sorting" tabindex="0" aria-controls="datatable_col_reorder" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 81px;">ID Material</th>-->
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


    <!-- MODAL deactivate -->
    <div class="modal fade" id="myDeactivateModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Deactivate Product Form</h4>
                </div>
                <div class="modal-body">
                    <form id="smart-form-register" action="<?php echo base_url(); ?>Back/Product/Deactivate_product" class="smart-form" novalidate="novalidate" method="post">

                        <p>Are you sure want to deactivate Product <span id="span_nama" style="color:blue"></span>?</p>
                        <input hidden  id="id_deactivateid" type="text" name="name_deactivateid"  aria-required="true" class="error" aria-invalid="true" >
                        <input hidden id="id_deactivatename" type="text" name="name_deactivatename"  aria-required="true" class="error" aria-invalid="true" >
                        <footer>
                            <input type="submit" name="button_deactivateproduct" class="btn btn-primary" value="Deactivate">
                        </footer>
                    </form>	
                </div>
            </div>

        </div>
    </div>
    <!--//activate modal-->
    <div class="modal fade" id="myActivateModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Activate Product Form</h4>
                </div>
                <div class="modal-body">
                    <form id="smart-form-register" action="<?php echo base_url(); ?>Back/Product/Activate_product" class="smart-form" novalidate="novalidate" method="post">

                        <p>Are you sure want to Activate Product <span id="span_nama_activate" style="color:blue"></span>?</p>
                        <input hidden  id="id_activateid" type="text" name="name_activateid"  aria-required="true" class="error" aria-invalid="true" >
                        <input hidden id="id_activatename" type="text" name="name_activatename"  aria-required="true" class="error" aria-invalid="true" >
                        <footer>
                            <input type="submit" name="button_activateproduct" class="btn btn-primary" value="Activate">
                        </footer>
                    </form>	
                </div>
            </div>

        </div>
    </div>


    <!-- MODAL edit -->
    

</div>    

<script>

    function showdeactivateproduct(idnya, nama)
    {
        document.getElementById('id_deactivateid').value = idnya;
        document.getElementById('id_deactivatename').value = nama;
        document.getElementById('span_nama').innerHTML = nama;

    }
    function showactivateproduct(idnya, nama)
    {
        document.getElementById('id_activateid').value = idnya;
        document.getElementById('id_activatename').value = nama;
        document.getElementById('span_nama_activate').innerHTML = nama;

    }
    function show_product_price(idnya, nama)
    {

        $("#span_nama_price").text(nama + " (Product Id " + idnya + ")");
        $("#tablebody").empty();
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>" + "Back/Product/Json_get_product_price/" + idnya,
            dataType: "json",
            success: function (result) {
                //ini kalau mau ambil 1 data saja sudah bisa.
                // alert ("hore sukses" + result);
                $.each(result, function (id, name)
                {

                    $("#tablebody").append(
                            "<tr role = 'row' class = 'odd'>" +
                            //  "<td>" + name['id'] + "</td>" +
                            "<td>" + name['batasbawah'] + "</td>" +
                            "<td>" + name['batasatas'] + "</td>" +
                            "<td>" + name['hargajual'] + "</td>" +
                            "</tr>");

                });
            }
        });
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
                          //  "<td>" + name['idmaterial'] + "</td>" +
                            "<td>" + name['namamaterial'] + "</td>" +
                            "<td>" + name['jumlahmaterial'] + "</td>" +
                            "</tr>");

                });
            }
        });
    }


</script>