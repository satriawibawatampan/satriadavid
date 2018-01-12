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
            <li>Home</li><li>Miscellaneous</li><li>Blank Page</li>
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
                        Add Admin
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
            <h2>Add Admin Form </h2>				

            <span class="jarviswidget-loader"><i class="fa fa-refresh fa-spin"></i></span></header>

        <!-- widget div-->
        <div role="content">

            <!-- widget edit box -->

            <!-- end widget edit box -->

            <!-- widget content -->
            <div class="widget-body ">

                <form role='form' id="smart-form-register" action="<?php echo base_url(); ?>Back/Admin/Add_admin" class="form-horizontal" novalidate="novalidate" method="post">

                   

                    <div class="form-group">
                        <label class="col-md-2 control-label" for="select-1">Type</label>
                        <div class="col-md-2">
                            <select class="form-control" name="name_type" id="select-1" selected ="select" >
                                <?php
                                foreach ($listadmintype as $hasil) {
                                    echo "<option value='" . $hasil->id . "'" . set_select('name_type', $hasil->id) . ">" . $hasil->nama . "</option>";
                                }
                                ?>
                            </select> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="select-1">Branch</label>
                        <div class="col-md-2">

                            <select class="form-control" name="name_branch" id="select-1" selected ="select" >
                                <?php
                                foreach ($listbranch as $hasil) {
                                    echo "<option value='" . $hasil->id . "'" . set_select('name_branch', $hasil->id) . ">" . $hasil->nama . "</option>";
                                }
                                ?>


                            </select> 

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Name</label>
                        <div class="col-md-3">
                            <input class="form-control" name="name_name"  type="text" value="<?php echo set_value('name_name'); ?>">
                            <span class="col-md-9 text-danger">
                                <?php echo form_error('name_name'); ?>
                            </span>
                        </div>

                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-2 control-label">Email</label>
                        <div class="col-md-3">
                            <input class="form-control" name="name_email"  type="email" value="<?php echo set_value('name_email'); ?>">
                            <span class="col-md-9 text-danger">
                                <?php echo form_error('name_email'); ?>
                            </span>
                        </div>

                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Phone</label>
                        <div class="col-md-2">
                            <input class="form-control" name="name_phone"  type="text" value="<?php echo set_value('name_phone'); ?>">
                            <span class="col-md-9 text-danger">
                                <?php echo form_error('name_phone'); ?>
                            </span>
                        </div>

                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Address</label>
                        <div class="col-md-6">
                            <textarea class="form-control" name="name_address"  rows="4" ><?php echo set_value('name_address'); ?></textarea>
                            <span class="col-md-9 text-danger">
                                <?php echo form_error('name_address'); ?>
                            </span>
                        </div>
                    </div>
                    
                    





                    <footer>
                        <div class="form-group">
                            <label class="col-md-2 control-label" for="select-1"></label>

                            <div class="col-md-4">

                                <input onclick="disable_button()" type="submit" id="id_button_addadmin" name="tes" class="btn btn-primary" value="Add Admin">
                                <input type="hidden" name="button_addadmin" class="btn btn-primary" value="1">
                            </div>

                        </div>

                    </footer>
                </form>						

            </div>
            <!-- end widget content -->

        </div>
        <!-- end widget div -->

    </div>
</div>
<!-- END MAIN CONTENT -->

</div>

<script>

function disable_button()
{
    $("#id_button_addadmin").prop('disabled', false);
        
            $("#smart-form-register").submit();
            $("#id_button_addadmin").prop('disabled', true);
}
        
</script>