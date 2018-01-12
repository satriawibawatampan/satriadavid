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
        <!-- end breadcrumb -->



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
                        Admin Type
                    </span>
                </h1>
            </div>
            <!-- end col -->


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
            <h2>Admin Type Form </h2>				

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

                <form id="smart-form-register" action="<?php echo base_url(); ?>Back/Admin/Add_admin_type" class="smart-form" novalidate="novalidate" method="post">

                    <fieldset>
                        <section>
                            <label class="input"> <i class="icon-append fa fa-puzzle-piece"></i>
                                <input type="text" name="name_namenewtype" placeholder="Admin Type" aria-required="true" class="error" aria-invalid="true" value="<?php echo set_value('name_namenewtype'); ?>">
                                <b class="tooltip tooltip-bottom-right">Needed to enter the Admin Type Name</b>
                            </label>
                            <span class="col-md-9 text-danger">
                                <?php echo form_error('name_namenewtype'); ?>
                            </span>
                        </section>



                    </fieldset>

                    <fieldset>

                        <section>

                            <label class="label">Credential Access</label>
                            <span class="col-md-9 text-danger">
                                <?php echo form_error('name_newaccess[]'); ?>
                            </span>
                            <div class="row">
                                <?php foreach ($listhakakses as $item) { ?>
                                    <div class="col col-4">
                                        <label class="checkbox state-success"><input type="checkbox" name="name_newaccess[]" value="<?php echo $item->id; ?>"  <?php echo set_checkbox('name_newaccess[]', $item->id); ?>><i></i><?php echo $item->nama; ?></label>
                                    </div>
                                <?php } ?>
                            </div>

                        </section>
                    </fieldset>


                    <footer>
                        <input type="submit" name="button_addadmintype" class="btn btn-primary" value="Add Admin Type">


                    </footer>
                </form>						

            </div>
            <!-- end widget content -->

        </div>
        <!-- end widget div -->


        <section id="widget-grid" class="">

            <!-- row -->
            <div class="row">

                <!-- NEW WIDGET START -->
                <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                    <!-- Widget ID (each widget will need unique ID)-->
                    <div class="jarviswidget jarviswidget-color-blueDark jarviswidget-sortable" id="wid-id-2" data-widget-editbutton="false" role="widget">

                        <header role="heading">
                            <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                            <h2>Hide / Show Columns </h2>

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
                                                <!--<th  tabindex="0" aria-controls="datatable_col_reorder" rowspan="1" colspan="1"  style="width: 32px;">ID</th>-->
                                                <th  tabindex="0" aria-controls="datatable_col_reorder" rowspan="1" colspan="1"  style="width: 100px;">Admin Type</th>
                                                <th  tabindex="0" aria-controls="datatable_col_reorder" rowspan="1" colspan="1"  style="width: 32px;">Action</th>
                                        </thead>
                                        <tbody>	
                                            <?php
                                            foreach ($listadmintype as $hasil) {
                                                echo '<tr role = "row" class = "odd">';
                                              //  echo '<td>' . $hasil->id . '</td>';
                                                echo ' <td class = " expand"><span class = "responsiveExpander"></span>' . $hasil->nama . '</td>';
                                                echo '<td>   <a  onclick="editdata(' . $hasil->id . ',\'' . $hasil->nama . '\')" class="btn glyphicon glyphicon-pencil" style="color:black" data-toggle="modal" data-target="#myEditModal"></a>
                                                       </td>';
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




    </div>
</div>
<!-- END MAIN CONTENT -->

<!-- MODAL HAPUS -->


<!-- MODAL Edit -->
<div class="modal fade" id="myEditModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Admin Type</h4>
            </div>
            <form class="smart-form" novalidate="novalidate" role="form" action="<?php echo base_url(); ?>Back/Admin/Edit_admin_type" method="post">
                <div class="modal-body">
                    <header>
                        Edit Admin Type form
                    </header>

                    <input hidden type="text" name="name_hidden_idedit"  id="id_hidden_edit"  aria-required="true" class="error" aria-invalid="true" value="<?php echo set_value('name'); ?>">                            <b class="tooltip tooltip-bottom-right">Needed to enter the Company</b>

                    <fieldset>
                        <section>
                            <label class="input"> <i class="icon-append fa fa-puzzle-piece"></i>
                                <input  type="text" name="name_editname"  id="editname" placeholder="Category" aria-required="true" class="error" aria-invalid="true" value="<?php echo set_value('name_editname'); ?>">                            <b class="tooltip tooltip-bottom-right">Needed to enter the Company</b>
                                <input  type="hidden" name="name_editname2"  id="editname2" placeholder="Category" aria-required="true" class="error" aria-invalid="true" value="<?php echo set_value('name_editname2'); ?>">                            <b class="tooltip tooltip-bottom-right">Needed to enter the Company</b>
                            </label>
                            <span class="col-md-9 text-danger">
                                <?php echo form_error('name_editname'); ?>
                            </span>
                        </section>
                    </fieldset>
                    <fieldset>
                        <section>
                            <div class="row">
                                <?php foreach ($listhakakses as $item) { ?>
                                    <div class="col col-4">
                                        <label class="checkbox state-success"><input class="checkboxku" type="checkbox" name="name_editaccess[]" value="<?php echo $item->id; ?>"  <?php echo set_checkbox('name_newaccess[]', $item->id); ?>><i></i><?php echo $item->nama; ?></label>
                                    </div>
                                <?php } ?>
                            </div>
                        </section>
                    </fieldset>

                    <div class="modal-footer">
                        <div class="form-group">
                            <div class="">
                                <input type="submit" class="  btn  btn-primary btn-lg " name="name_btn_edit" value="Edit" >
                            </div>
                        </div>
                    </div>

                </div>


            </form>

        </div>

    </div>
</div>
</div>

<script>
    $(document).ready(function () {
        var idopen = "<?php
                                if (isset($idopen)) {
                                    echo $idopen;
                                } else {
                                    echo "";
                                }
                                ?>";
        //alert(idopen);
        if (idopen != "")
        {
            // alert("as");
            $("#myEditModal").modal("show");
        }
    });
    function editdata($idnya, $nama)
    {
        var tipeadminhakakses = <?php echo json_encode($listtipeadminhakakses); ?>;
        // alert("a");
        $("#editname").val($nama);
        $("#editname2").val($nama);
        $("#id_hidden_edit").val($idnya);
        $(".checkboxku").attr('checked', false);
        $("[name='name_editaccess[]'][value='32']").attr('checked', true);
//$("input[type=checkbox][value=5]").attr('checked', true);
        //$('input:checkbox[name="name_editaccess[]"][value="32"]').attr('checked', 'checked');

        var checkbox = document.getElementsByName("name_editaccess[]");
        console.log(checkbox[2]['value']);
        console.log(tipeadminhakakses);
        //alert(checkbox[0]);
        for (var a = 0; a < checkbox.length; a++) {
            for (var b = 0; b < tipeadminhakakses.length; b++)
            {
                if (checkbox[a]['value'] == tipeadminhakakses[b]['id_hakakses'] && tipeadminhakakses[b]['id_tipeadmin']==$idnya )
                {
                   // console.log(checkbox[a]['value']+"+"+tipeadminhakakses[b]+"<br>");
                    //alert(checkbox[a]['value']);
                    checkbox[a]['checked']=true;
                   // $("input[type=checkbox][value=5]").attr('checked', true);
                }
            }




        }
        // var checkboxeditlength = $('[name="name_editaccess[]"]').length;

        //  alert(checkboxeditlength);
//        for (var y = 0; y < checkboxeditlength; y++)
//        {
//           // $('.checkboxku')[0]
//        }
//        $(".checkbox[value=4]").prop("checked", "true");

        //  alert($("#id_hidden_edit").val());
    }
</script>