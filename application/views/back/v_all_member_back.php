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
                    Admin
                    <span>>  
                        Member List
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
                                                <th data-hide="phone" class="sorting_asc" tabindex="0" aria-controls="datatable_col_reorder" rowspan="1" colspan="1" aria-sort="ascending" aria-label="ID: activate to sort column descending" style="width: 32px;">ID</th>
                                                <th data-class="expand" class="expand sorting" tabindex="0" aria-controls="datatable_col_reorder" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 81px;">Name</th>
                                                <th data-hide="phone" class="sorting" tabindex="0" aria-controls="datatable_col_reorder" rowspan="1" colspan="1" aria-label="Phone: activate to sort column ascending" style="width: 131px;">Email</th>
                                                <th data-hide="phone" class="sorting_asc" tabindex="0" aria-controls="datatable_col_reorder" rowspan="1" colspan="1" aria-sort="ascending" aria-label="ID: activate to sort column descending" style="width: 32px;">Address</th>
                                                <th data-hide="phone" class="sorting_asc" tabindex="0" aria-controls="datatable_col_reorder" rowspan="1" colspan="1" aria-sort="ascending" aria-label="ID: activate to sort column descending" style="width: 32px;">Phone</th>
                                                <th data-hide="phone" class="sorting_asc" tabindex="0" aria-controls="datatable_col_reorder" rowspan="1" colspan="1" aria-sort="ascending" aria-label="ID: activate to sort column descending" style="width: 32px;">BOD</th>
                                                <th data-hide="phone" class="sorting_asc" tabindex="0" aria-controls="datatable_col_reorder" rowspan="1" colspan="1" aria-sort="ascending" aria-label="ID: activate to sort column descending" style="width: 32px;">Gender</th>
                                                <th data-hide="phone" class="sorting_asc" tabindex="0" aria-controls="datatable_col_reorder" rowspan="1" colspan="1" aria-sort="ascending" aria-label="ID: activate to sort column descending" style="width: 32px;">Deposit</th>

                                                <th class="" tabindex="0" aria-controls="datatable_col_reorder" rowspan="1" colspan="1" aria-label="Phone: activate to sort column ascending" style="width: 131px;">Action</th>
                                        </thead>
                                        <tbody>	
                                            <?php
                                            foreach ($tablemember as $hasil) {
                                                echo '<tr role = "row" class = "odd">';
                                                echo '<td>' . $hasil->id . '</td>';
                                                echo ' <td >' . $hasil->nama . '</td>';
                                                echo '<td>' . $hasil->email . '</td>';
                                                echo '<td>' . $hasil->alamat . '</td>';
                                                echo '<td>' . $hasil->telepon . '</td>';
                                                echo '<td>' . $hasil->ttl . '</td>';
                                                echo '<td>' . $hasil->gender . '</td>';
                                                echo '<td>' . $hasil->deposit . '</td>';
                                                echo '<td>   <a  onclick="showeditdatamember(' . $hasil->id . ',\'' . $hasil->nama . '\')" class="btn glyphicon glyphicon-pencil" style="color:black" data-toggle="modal" data-target="#myEditModal"></a>
                                                        <a   onclick="showdeletedatamember(' . $hasil->id . ',\'' . $hasil->nama . '\')" class="btn glyphicon glyphicon-trash" style="color:red"  data-toggle="modal" data-target="#myDeleteModal"></a></td>';
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

    <!-- MODAL HAPUS -->
    <div class="modal fade" id="myDeleteModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Delete Member Form</h4>
                </div>
                <div class="modal-body">
                    <form id="smart-form-register" action="<?php echo base_url(); ?>Back/Member/Delete_member" class="smart-form" novalidate="novalidate" method="post">

                        <p>Are you sure want to delete Member <span id="span_nama" style="color:blue"></span>?</p>
                        <input hidden  id="id_deleteid" type="text" name="name_deleteid"  aria-required="true" class="error" aria-invalid="true" >
                        <input hidden id="id_deletename" type="text" name="name_deletename"  aria-required="true" class="error" aria-invalid="true" >
                        <footer>
                            <input type="submit" name="button_deletemember" class="btn btn-primary" value="Delete">
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
                    <h4 class="modal-title">Edit Member Form</h4>
                </div>
                <form id="smart-form-register" action="<?php echo base_url(); ?>Back/Member/Edit_member" class="smart-form" novalidate="novalidate" method="post">
                    <input hidden id="id_editid" type="text" name="name_editid" placeholder="Contact Person" aria-required="true" class="error" aria-invalid="true" value="<?php echo set_value('name_editid'); ?>">
                    <fieldset>
                        <section>
                            <label class="input control-label">Email</label>
                            <label class="input"> <i class="icon-append fa fa-puzzle-piece"></i>
                                <input disabled  id="id_editemail" type="text" name="name_editemail" placeholder="Email" aria-required="true" class="error" id="id_editnamecompany" aria-invalid="true" value="<?php echo set_value('name_editemail'); ?>">
                                <b class="tooltip tooltip-bottom-right">Needed to enter the Email</b>
                            </label>
                            <span class="col-md-9 text-danger">
                                <?php echo form_error('name_editemail'); ?>
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
                        <label class="input control-label">Address</label>
                        <section>
                            <label class="input"> <i class="icon-append fa fa-puzzle-piece"></i>
                                <input id='id_editaddress' type="text" name="name_editaddress" placeholder="Address" aria-required="true" class="error" aria-invalid="true" value="<?php echo set_value('name_editaddress'); ?>">
                                <b class="tooltip tooltip-bottom-right">Needed to enter the Address</b>
                            </label>
                            <span class="col-md-9 text-danger">
                                <?php echo form_error('name_editaddress'); ?>
                            </span>
                        </section>
                    </fieldset>
                    <fieldset>
                        <label class="input control-label">Phone</label>
                        <section>
                            <label class="input"> <i class="icon-append fa fa-puzzle-piece"></i>
                                <input id='id_editphonenumber' type="text" name="name_editphone" placeholder="Phone Number" aria-required="true" class="error" aria-invalid="true" value="<?php echo set_value('name_editphone'); ?>">
                                <b class="tooltip tooltip-bottom-right">Needed to enter the Phone Number</b>
                            </label>
                            <span class="col-md-9 text-danger">
                                <?php echo form_error('name_editphone'); ?>
                            </span>
                        </section>
                    </fieldset>
                    <fieldset>
                        <label class="input control-label">BOD</label>
                        <section>
                            <label class="input"> <i class="icon-append fa fa-puzzle-piece"></i>
                               <input id="id_editttl" class="form-control" name="name_editttl" placeholder="BOD" type="date" value="<?php echo set_value('name_ttl'); ?>">
                            
                            </label>
                            <span class="col-md-9 text-danger">
                                <?php echo form_error('name_ttl'); ?>
                            </span>
                        </section>
                    </fieldset>

<!--                    <div class="form-group">
                        <label class="col-md-2 control-label" for="select-1">Branch</label>
                        <div class="col-md-2">



                        </div>
                    </div>-->
                    <fieldset>
                        <label class="input control-label">Gender</label>
                        <section>
                            <label class="input"> <i class="icon-append fa fa-puzzle-piece"></i>
                                <select id="id_editgender" class="form-control" name="name_editgender" id="select-1" selected ="select" <?php echo set_select('name_editgender', set_value('name_editgender')); ?> >
                                <option value="1" <?php echo set_select('name_editgender', '1', TRUE); ?>>Male</option>
                                <option value="2" <?php echo set_select('name_editgender', '2'); ?>>Female</option>
                            </select> 
                            </label>
                            <span class="col-md-9 text-danger">
                                <?php echo form_error('name_editgender'); ?>
                            </span>
                        </section>
                    </fieldset>
                    <footer>
                        <input type="submit" name="button_editmember" class="btn btn-primary" value="Submit">
                    </footer>
                </form>	
            </div>
        </div>
    </div>

</div>  

<script>
function showdeletedatamember(idnya, nama)
            {
                document.getElementById('id_deleteid').value = idnya;
                document.getElementById('id_deletename').value = nama;
                document.getElementById('span_nama').innerHTML = nama;

            }

            function showeditdatamember(idnya, nama)
            {
                // document.getElementById('id_hidden_edit').value = idnya;
                //document.getElementById('editname').value = nama;

                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>" + "Back/Member/Json_get_one_member/" + idnya,
                    dataType: "json",
                    success: function (result) {
                        //ini kalau mau ambil 1 data saja sudah bisa.
                        //alert ("hore sukses" + result);
                        $.each(result, function (id, name)
                        {
                            //alert(id+"/"+name+'/oh yes');
                            if (id == 'nama') {
                                document.getElementById('id_editname').value = name;
                            }
                            if (id == 'id') {
                                document.getElementById('id_editid').value = name;
                            }
                            if (id == 'email') {
                                document.getElementById('id_editemail').value = name;
                            }
                            if (id == 'alamat') {
                                document.getElementById('id_editaddress').value = name;
                            }
                            if (id == 'telepon') {
                                document.getElementById('id_editphonenumber').value = name;
                            }
                            if (id == 'ttl') {
                                $("#id_editttl").val(name);
                                // document.getElementById('id_edittype').value = name;
                            }
                            if (id == 'gender') {
                                $("#id_editgender").val(name);
                                //document.getElementById('id_editbranch').value = name;
                            }
                        });
                    }
                });
            }

</script>