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
            <li>Setting</li>
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
                    Setting 
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

        <header role="heading"><div class="jarviswidget-ctrls" role="menu">   
                <a href="javascript:void(0);" class="button-icon jarviswidget-toggle-btn" rel="tooltip" title="" data-placement="bottom" data-original-title="Collapse"><i class="fa fa-minus "></i></a> <a href="javascript:void(0);" class="button-icon jarviswidget-fullscreen-btn" rel="tooltip" title="" data-placement="bottom" data-original-title="Fullscreen"><i class="fa fa-expand "></i></a> <a href="javascript:void(0);" class="button-icon jarviswidget-delete-btn" rel="tooltip" title="" data-placement="bottom" data-original-title="Delete"><i class="fa fa-times"></i></a></div><div class="widget-toolbar" role="menu"><a data-toggle="dropdown" class="dropdown-toggle color-box selector" href="javascript:void(0);"></a><ul class="dropdown-menu arrow-box-up-right color-select pull-right"><li><span class="bg-color-green" data-widget-setstyle="jarviswidget-color-green" rel="tooltip" data-placement="left" data-original-title="Green Grass"></span></li><li><span class="bg-color-greenDark" data-widget-setstyle="jarviswidget-color-greenDark" rel="tooltip" data-placement="top" data-original-title="Dark Green"></span></li><li><span class="bg-color-greenLight" data-widget-setstyle="jarviswidget-color-greenLight" rel="tooltip" data-placement="top" data-original-title="Light Green"></span></li><li><span class="bg-color-purple" data-widget-setstyle="jarviswidget-color-purple" rel="tooltip" data-placement="top" data-original-title="Purple"></span></li><li><span class="bg-color-magenta" data-widget-setstyle="jarviswidget-color-magenta" rel="tooltip" data-placement="top" data-original-title="Magenta"></span></li><li><span class="bg-color-pink" data-widget-setstyle="jarviswidget-color-pink" rel="tooltip" data-placement="right" data-original-title="Pink"></span></li><li><span class="bg-color-pinkDark" data-widget-setstyle="jarviswidget-color-pinkDark" rel="tooltip" data-placement="left" data-original-title="Fade Pink"></span></li><li><span class="bg-color-blueLight" data-widget-setstyle="jarviswidget-color-blueLight" rel="tooltip" data-placement="top" data-original-title="Light Blue"></span></li><li><span class="bg-color-teal" data-widget-setstyle="jarviswidget-color-teal" rel="tooltip" data-placement="top" data-original-title="Teal"></span></li><li><span class="bg-color-blue" data-widget-setstyle="jarviswidget-color-blue" rel="tooltip" data-placement="top" data-original-title="Ocean Blue"></span></li><li><span class="bg-color-blueDark" data-widget-setstyle="jarviswidget-color-blueDark" rel="tooltip" data-placement="top" data-original-title="Night Sky"></span></li><li><span class="bg-color-darken" data-widget-setstyle="jarviswidget-color-darken" rel="tooltip" data-placement="right" data-original-title="Night"></span></li><li><span class="bg-color-yellow" data-widget-setstyle="jarviswidget-color-yellow" rel="tooltip" data-placement="left" data-original-title="Day Light"></span></li><li><span class="bg-color-orange" data-widget-setstyle="jarviswidget-color-orange" rel="tooltip" data-placement="bottom" data-original-title="Orange"></span></li><li><span class="bg-color-orangeDark" data-widget-setstyle="jarviswidget-color-orangeDark" rel="tooltip" data-placement="bottom" data-original-title="Dark Orange"></span></li><li><span class="bg-color-red" data-widget-setstyle="jarviswidget-color-red" rel="tooltip" data-placement="bottom" data-original-title="Red Rose"></span></li><li><span class="bg-color-redLight" data-widget-setstyle="jarviswidget-color-redLight" rel="tooltip" data-placement="bottom" data-original-title="Light Red"></span></li><li><span class="bg-color-white" data-widget-setstyle="jarviswidget-color-white" rel="tooltip" data-placement="right" data-original-title="Purity"></span></li><li><a href="javascript:void(0);" class="jarviswidget-remove-colors" data-widget-setstyle="" rel="tooltip" data-placement="bottom" data-original-title="Reset widget color to default">Remove</a></li></ul></div>
            <span class="widget-icon"> <i class="fa fa-edit"></i> </span>
            <h2>Setting Form </h2>				

            <span class="jarviswidget-loader"><i class="fa fa-refresh fa-spin"></i></span></header>

        <!-- widget div-->
        <div role="content">

            <!-- widget edit box -->
            <!-- end widget edit box -->

            <!-- widget content -->
            <div class="widget-body no-padding">

                <form role='form' id="smart-form-register" action="<?php echo base_url(); ?>Back/Account/Change_setting" class="form-horizontal" novalidate="novalidate" method="post">

                    
                    <div class="form-group">
                        <label class="col-md-2 control-label">Deposit Minimal</label>
                        <div class="col-md-3">
                            <input class="form-control" name="name_depositminimal" placeholder="Deposit Minimal" min="0" type="number" value="<?php echo set_value('name_depositminimal'); ?>">
                            <span class="col-md-9 text-danger">
                                <?php echo form_error('name_depositminimal'); ?>
                            </span>
                        </div>

                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-2 control-label">Deposit Bonus</label>
                        <div class="col-md-3">
                            <input class="form-control" name="name_depositbonus" placeholder="Deposit Bonus" type="number" max="100" min="0" value="<?php echo set_value('name_depositbonus',0); ?>">
                            <span class="col-md-9 text-danger">
                                <?php echo form_error('name_depositbonus'); ?>
                            </span>
                        </div>

                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Member Price</label>
                        <div class="col-md-2">
                            <input class="form-control" name="name_memberprice" placeholder="Member Price" type="number" min="0" value="<?php echo set_value('name_memberprice'); ?>">
                            <span class="col-md-9 text-danger">
                                <?php echo form_error('name_memberprice'); ?>
                            </span>
                        </div>

                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Point Price</label>
                        <div class="col-md-6">
                            <input class="form-control" name="name_pointprice" placeholder="Point Price"  type="number" min="0" value="<?php echo set_value('name_pointprice'); ?>" >
                            <span class="col-md-9 text-danger">
                                <?php echo form_error('name_pointprice'); ?>
                            </span>
                        </div>
                    </div>
                    
                    



                    <footer>
                        <div class="form-group">
                            <label class="col-md-2 control-label" for="select-1"></label>

                            <div class="col-md-4">

                                <input type="submit" name="button_changesetting" class="btn btn-primary" value="Change Setting">
                            </div>

                        </div>

                    </footer>
                </form>						

            </div>
            <!-- end widget content -->

        </div>

        <div>

        </div>

        <header role="heading">
            <span class="widget-icon"> <i class="fa fa-edit"></i> </span>
            <h2>Add Branch Form </h2>				

            <span class="jarviswidget-loader"><i class="fa fa-refresh fa-spin"></i></span></header>

        <!-- widget div-->
        <div role="content">

            <!-- widget edit box -->
            <!-- end widget edit box -->

            <!-- widget content -->
            <div class="widget-body no-padding">

                <form id="smart-form-register" action="<?php echo base_url(); ?>Back/Branch/Add_branch" class="smart-form" novalidate="novalidate" method="post">
                    <header>
                        Add Branch form
                    </header>


                    <fieldset>
                        <section>
                            <label class="input"> <i class="icon-append fa fa-puzzle-piece"></i>
                                <input type="text" name="name_branch" placeholder="Branch" aria-required="true" class="error" aria-invalid="true" value="<?php echo set_value('name_branch'); ?>">
                                <b class="tooltip tooltip-bottom-right">Needed to enter the Branch</b>
                            </label>
                            <span class="col-md-9 text-danger">
<?php echo form_error('name_branch'); ?>
                            </span>
                        </section>



                    </fieldset>


                    <footer>
                        <input type="submit" name="button_addbranch" class="btn btn-primary" value="Submit">


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
                                                <th  tabindex="0" aria-controls="datatable_col_reorder" rowspan="1" colspan="1"  style="width: 100px;">Branch Name</th>
                                                <th  tabindex="0" aria-controls="datatable_col_reorder" rowspan="1" colspan="1"  style="width: 32px;">Action</th>
                                        </thead>
                                        <tbody>	
                                            <?php
                                            foreach ($listbranch as $hasil) {
                                                echo '<tr role = "row" class = "odd">';
                                                echo '<td>' . $hasil->id . '</td>';
                                                echo ' <td class = " expand"><span class = "responsiveExpander"></span>' . $hasil->nama . '</td>';
                                                echo '<td>   <a  onclick="editdata(' . $hasil->id . ',\'' . $hasil->nama . '\')" class="glyphicon glyphicon-pencil" style="color:black" data-toggle="modal" data-target="#myEditModal"></a>
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
                <h4 class="modal-title">Edit Branch</h4>
            </div>

            <form class="smart-form"  role="form" action="<?php echo base_url(); ?>Back/Branch/Edit_branch" method="post">

                <div class="modal-body">
                    <header>
                        Edit Branch Form
                    </header>
                    <input hidden type="text" name="name_hidden_idedit"  id="id_hidden_edit"  aria-required="true" class="error" aria-invalid="true" value="<?php echo set_value('name'); ?>">                            <b class="tooltip tooltip-bottom-right">Needed to enter the Company</b>

                    <fieldset>
                        <section>
                            <label class="input"> <i class="icon-append fa fa-puzzle-piece"></i>
                                <input type="text" name="name_editname"  id="editname" placeholder="Branch" aria-required="true" class="error" aria-invalid="true" value="<?php echo set_value('name_editname'); ?>">
                                <input type="hidden" name="name_editname2"  id="editname2" placeholder="Branch" aria-required="true" class="error" aria-invalid="true" value="<?php echo set_value('name_editname'); ?>">
                                <b class="tooltip tooltip-bottom-right">Needed to edit branch</b>
                            </label>
                            <span class="col-md-9 text-danger">
<?php echo form_error('name_editname'); ?>
                            </span>
                        </section>
                    </fieldset>


        <!--<p></p>-->
                    <div class="modal-footer">
                        <div class="form-group">
                            <div class="">
                                <input type="submit" class="  btn  btn-primary btn-lg " name="button_editbranch" value="Edit" >
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
        // alert("a");
        $("#editname").val($nama);
        $("#editname2").val($nama);
        $("#id_hidden_edit").val($idnya);

        //  alert($("#id_hidden_edit").val());
    }
</script>