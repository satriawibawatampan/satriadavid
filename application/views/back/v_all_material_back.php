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
                                                <th data-class="expand" class="expand sorting" tabindex="0" aria-controls="datatable_col_reorder" rowspan="1" colspan="1" aria-sort="ascending" aria-label="ID: activate to sort column descending" style="width: 32px;">ID</th>
                                                <th data-hide="phone" class="sorting" tabindex="0" aria-controls="datatable_col_reorder" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 81px;">Name</th>
                                                <th data-hide="phone" class="sorting" tabindex="0" aria-controls="datatable_col_reorder" rowspan="1" colspan="1" aria-label="Phone: activate to sort column ascending" style="width: 131px;">Type</th>
                                                <th data-hide="phone" class="sorting" tabindex="0" aria-controls="datatable_col_reorder" rowspan="1" colspan="1" aria-sort="ascending" aria-label="ID: activate to sort column descending" style="width: 32px;">HPP</th>
                                                <th data-hide="phone" class="sorting" tabindex="0" aria-controls="datatable_col_reorder" rowspan="1" colspan="1" aria-sort="ascending" aria-label="ID: activate to sort column descending" style="width: 32px;">Stock</th>
                                                <th data-hide="phone" class="sorting" tabindex="0" aria-controls="datatable_col_reorder" rowspan="1" colspan="1" aria-sort="ascending" aria-label="ID: activate to sort column descending" style="width: 32px;">Amount/Pack</th>
                                                <th data-hide="phone" class="sorting" tabindex="0" aria-controls="datatable_col_reorder" rowspan="1" colspan="1" aria-sort="ascending" aria-label="ID: activate to sort column descending" style="width: 32px;">Status</th>

                                                <th class="" tabindex="0" aria-controls="datatable_col_reorder" rowspan="1" colspan="1" aria-label="Phone: activate to sort column ascending" style="width: 131px;">Action</th>
                                        </thead>
                                        <tbody>	
                                            <?php
                                            foreach ($tablematerial as $hasil) {
                                                echo '<tr role = "row" class = "odd">';
                                                echo '<td>' . $hasil->id . '</td>';
                                                echo ' <td >' . $hasil->nama . '</td>';
                                                echo '<td>' . $hasil->tipe . '</td>';
                                                echo '<td>' . $hasil->hpp . '</td>';
                                                echo '<td>' . $hasil->stok . ' Pack (' . $hasil->totalstok . ') <a   onclick="showdetailstockmaterial(' . $hasil->id . ',\'' . $hasil->nama . '\')" class="btn glyphicon glyphicon-eye-open" style="color:blue"  data-toggle="modal" data-target="#myDetailStockModal"> </a>  </td>';

                                                echo '<td>' . $hasil->jumlahperpack . '</td>';
                                                if ($hasil->statusaktif == 0) {
                                                    echo '<td style="color:red">Deactivated</td>';
                                                } else if ($hasil->statusaktif == 1) {
                                                    echo '<td style="color:blue">Activated</td>';
                                                }
                                                echo '<td>   <a href="' . base_url() . 'Back/Material/Show_edit_material/' . $hasil->id . '"  class="btn glyphicon glyphicon-pencil" style="color:black" ></a>';
                                                if ($hasil->statusaktif == 0) {
                                                    echo '<a   onclick="showactivatematerial(' . $hasil->id . ',\'' . $hasil->nama . '\')" class="btn glyphicon glyphicon-trash" style="color:blue"  data-toggle="modal" data-target="#myActivateModal"></a></td>';
                                                } else if ($hasil->statusaktif == 1) {
                                                    echo '<a   onclick="showdeactivatematerial(' . $hasil->id . ',\'' . $hasil->nama . '\')" class="btn glyphicon glyphicon-trash" style="color:red"  data-toggle="modal" data-target="#myDeactivateModal"></a></td>';
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

    <!--modal deactivate-->
    <div class="modal fade" id="myDeactivateModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Deactivate Material Form</h4>
                </div>
                <div class="modal-body">
                    <form id="smart-form-register" action="<?php echo base_url(); ?>Back/Material/Deactivate_material" class="smart-form" novalidate="novalidate" method="post">

                        <p>Are you sure want to deactivate Material <span id="span_nama_deactivate" style="color:blue"></span>?</p>
                        <input hidden  id="id_deactivateid" type="text" name="name_deactivateid"  aria-required="true" class="error" aria-invalid="true" >
                        <input hidden id="id_deactivatename" type="text" name="name_deactivatename"  aria-required="true" class="error" aria-invalid="true" >
                        <footer>
                            <input type="submit" name="button_deactivatematerial" class="btn btn-primary" value="Deactivate">
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
                    <h4 class="modal-title">Activate Material Form</h4>
                </div>
                <div class="modal-body">
                    <form id="smart-form-register" action="<?php echo base_url(); ?>Back/Material/Activate_material" class="smart-form" novalidate="novalidate" method="post">

                        <p>Are you sure want to Activate Material <span id="span_nama_activate" style="color:blue"></span>?</p>
                        <input hidden  id="id_activateid" type="text" name="name_activateid"  aria-required="true" class="error" aria-invalid="true" >
                        <input hidden id="id_activatename" type="text" name="name_activatename"  aria-required="true" class="error" aria-invalid="true" >
                        <footer>
                            <input type="submit" name="button_activatematerial" class="btn btn-primary" value="Activate">
                        </footer>
                    </form>	
                </div>
            </div>

        </div>
    </div>

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

    <!-- MODAL used deskripsi residu -->
    <div class="modal fade" id="myResidu" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Residual Material </h4>
                </div>
                <div class="modal-body">
                    <div class="widget-body no-padding">

                        <div id="datatable_col_reorder_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">

                            <table id="datatable_col_reorder_residu" class="table table-striped table-bordered table-hover dataTable no-footer has-columns-hidden" width="100%" role="grid" aria-describedby="datatable_col_reorder_info" style="width: 100%;">
                                <thead>
                                    <tr role="row">
                                        <th data-class="expand" class="expand sorting" tabindex="0" aria-controls="datatable_col_reorder" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 81px;">ID Detail Material</th>

                                        <th data-hide="phone" class="sorting_asc" tabindex="0" aria-controls="datatable_col_reorder" rowspan="1" colspan="1" aria-sort="ascending" aria-label="ID: activate to sort column descending" style="width: 32px;">Description</th>



                                </thead>
                                <tbody id="tablebody_residu">	
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
    function showdeactivatematerial(idnya, nama)
    {
        document.getElementById('id_deactivateid').value = idnya;
        document.getElementById('id_deactivatename').value = nama;
        document.getElementById('span_nama_deactivate').innerHTML = nama;

    }
    function showactivatematerial(idnya, nama)
    {
        document.getElementById('id_activateid').value = idnya;
        document.getElementById('id_activatename').value = nama;
        document.getElementById('span_nama_activate').innerHTML = nama;

    }

    function showdetailstockmaterial(idnya, nama)
    {
        // document.getElementById('id_hidden_edit').value = idnya;
        //document.getElementById('editname').value = nama;
        $("#tablebody").empty();
        $("#tablebody_residu").empty();
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>" + "Back/Material/Json_get_detail_material/" + idnya,
            dataType: "json",
            success: function (result) {
                //ini kalau mau ambil 1 data saja sudah bisa.
                //alert ("hore sukses" + result);
                $.each(result, function (id, name)
                {

                    $("#tablebody").append(
                            "<tr role = 'row' class = 'odd'>" +
                            "<td>" + name['detailmaterialid'] + "</td>" +
                            "<td>" + name['nama'] + "</td>" +
                            "<td>" + name['stok'] + "<span><a   onclick='showdeskripsi(" + name['detailmaterialid'] + ")' class='btn glyphicon glyphicon-eye-open' style='color:blue'  data-toggle='modal' data-target='#myResidu'> </a> <span></td>" +
                            "<td>" + name['createdat'] + "</td>" +
                            "</tr>");

                });
            }
        });
    }

    function showdeskripsi(idnya)
    {
        // document.getElementById('id_hidden_edit').value = idnya;
        //document.getElementById('editname').value = nama;
        $("#tablebody_residu").empty();
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>" + "Back/Material/Get_residu_by_detailmaterial/" + idnya,
            dataType: "json",
            success: function (result) {
                //ini kalau mau ambil 1 data saja sudah bisa.
                //alert ("hore sukses" + result);
                $.each(result, function (id, name)
                {
                    //  alert("a");
                    $("#tablebody_residu").append(
                            "<tr role = 'row' class = 'odd'>" +
                            "<td>" + name['detailmaterialid'] + "</td>" +
                            "<td>" + name['deskripsi'] + "</td>" +
                            "</tr>");

                });
            }
        });
    }
</script>