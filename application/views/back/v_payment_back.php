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
            <li>Payment</li>
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
                    <i class="fa-fw fa fa-puzzle-piece"></i> 
                    Payment 
                    <span>
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


        <!-- widget div-->




        <header role="heading">
            <span class="widget-icon"> <i class="fa fa-edit"></i> </span>
            <h2>Add Payment Form </h2>				

            <span class="jarviswidget-loader"><i class="fa fa-refresh fa-spin"></i></span></header>

        <!-- widget div-->
        <div role="content">

            <!-- widget edit box -->
            <!-- end widget edit box -->

            <!-- widget content -->
            <div class="widget-body no-padding">

                <form id="smart-form-register" action="<?php echo base_url(); ?>Back/Payment/Add_payment" class="smart-form" novalidate="novalidate" method="post">
                    <header>
                        Add Payment form
                    </header>


                    <fieldset>
                        <section>
                            <label class="input"> <i class="icon-append fa fa-puzzle-piece"></i>
                                <input type="text" name="name_payment" placeholder="Name" aria-required="true" class="error" aria-invalid="true" value="<?php echo set_value('name_payment'); ?>">
                                <b class="tooltip tooltip-bottom-right">Needed to enter the Payment</b>
                            </label>
                            <span class="col-md-9 text-danger">
                                <?php echo form_error('name_payment'); ?>
                            </span>
                        </section>
                        <section>
                            <label class="input"> <i class="icon-append fa fa-puzzle-piece"></i>
                                <input type="number" name="name_nilai" placeholder="Value" aria-required="true" class="error" aria-invalid="true" value="<?php echo set_value('name_nilai'); ?>">
                                <b class="tooltip tooltip-bottom-right">Needed to enter the Value</b>
                            </label>
                            <span class="col-md-9 text-danger">
                                <?php echo form_error('name_nilai'); ?>
                            </span>
                        </section>



                    </fieldset>


                    <footer>
                        <input type="submit" name="button_addpayment" class="btn btn-primary" value="Submit">


                    </footer>
                </form>						

            </div>
            <!-- end widget content -->

        </div>
        <!-- end widget div -->

        <div>

        </div>


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
                                                <th  tabindex="0" aria-controls="datatable_col_reorder" rowspan="1" colspan="1"  style="width: 32px;">ID</th>
                                                <th  tabindex="0" aria-controls="datatable_col_reorder" rowspan="1" colspan="1"  style="width: 100px;">Payment Name</th>
                                                <th  tabindex="0" aria-controls="datatable_col_reorder" rowspan="1" colspan="1"  style="width: 100px;">Value</th>
                                                <th  tabindex="0" aria-controls="datatable_col_reorder" rowspan="1" colspan="1"  style="width: 32px;">Action</th>
                                        </thead>
                                        <tbody>	
                                            <?php
                                            foreach ($listpayment as $hasil) {
                                                echo '<tr role = "row" class = "odd">';
                                                echo '<td>' . $hasil->id . '</td>';
                                                echo ' <td class = " expand"><span class = "responsiveExpander"></span>' . $hasil->nama . '</td>';
                                                echo ' <td class = " expand"><span class = "responsiveExpander"></span>' . $hasil->nilai . '</td>';
                                                echo '<td>   <a  onclick="editdata(' . $hasil->id . ',\'' . $hasil->nama . '\',' . $hasil->nilai . ')" class="glyphicon glyphicon-pencil" style="color:black" data-toggle="modal" data-target="#myEditModal"></a>
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



<!-- MODAL Edit -->
<div class="modal fade" id="myEditModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Payment</h4>
            </div>

            <form id="smart-form-register" action="<?php echo base_url(); ?>Back/Payment/Edit_payment" class="smart-form" novalidate="novalidate" method="post">
                <input  id="id_editid" type="hidden" name="name_editida" placeholder="Contact Person" aria-required="true" class="error" aria-invalid="true" value="<?php echo set_value('name_editida'); ?>">
                
                <fieldset>
                    <label class="input control-label">Name</label>
                    <section>
                        <label class="input"> <i class="icon-append fa fa-puzzle-piece"></i>
                            <input id="id_editname" type="text" name="name_editname" placeholder="Name" aria-required="true" class="error" aria-invalid="true" value="<?php echo set_value('name_editname'); ?>">
                            <input id="id_editname2" type="text" name="name_editname2" placeholder="Name" aria-required="true" class="error" aria-invalid="true" value="<?php echo set_value('name_editname'); ?>">
                            <b class="tooltip tooltip-bottom-right">Needed to enter the name</b>
                        </label>
                        <span class="col-md-9 text-danger">
                            <?php echo form_error('name_editname'); ?>
                        </span>
                    </section>
                </fieldset>
                <fieldset>
                    <label class="input control-label">Value</label>
                    <section>
                        <label class="input"> <i class="icon-append fa fa-puzzle-piece"></i>
                            <input id="id_editvalue" type="text" name="name_editnilai" placeholder="Value" aria-required="true" class="error" aria-invalid="true" value="<?php echo set_value('name_editnilai'); ?>">
                            <b class="tooltip tooltip-bottom-right">Needed to enter the value</b>
                        </label>
                        <span class="col-md-9 text-danger">
                            <?php echo form_error('name_editnilai'); ?>
                        </span>
                    </section>
                </fieldset>
                
                <footer>
                    <input type="submit" name="button_editpayment" class="btn btn-primary" value="Submit">
                </footer>
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
        alert(idopen);
        if (idopen != "")
        {
            // alert("as");
            $("#myEditModal").modal("show");
        }
    });
    function editdata(id, name, value)
    {
        $("#id_editid").val(id);
        $("#id_editname").val(name);
        $("#id_editname2").val(name);
        $("#id_editvalue").val(value);
        
    }

</script>