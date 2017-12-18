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
                    Member 
                    <span>>  
                        Add Deposit
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
            <h2>Add Deposit Form </h2>				

            <span class="jarviswidget-loader"><i class="fa fa-refresh fa-spin"></i></span></header>

        <!-- widget div-->
        <div role="content">

            <!-- widget edit box -->

            <!-- end widget edit box -->

            <!-- widget content -->
            <div class="widget-body ">

                <form role='form' id="smart-form-register" action="<?php echo base_url(); ?>Back/Member/Add_deposit_to_note" class="form-horizontal" novalidate="novalidate" method="post">

                    <?php //echo validation_errors(); ?>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="select-1">Member</label>
                        <div class="col-md-2">
                            <select class="form-control" name="name_member" id="id_member" selected ="select" >
                                <option value="0" >- No Member -</option>

                                <?php foreach ($listmember as $itemmember) { ?>

                                    <option value="<?php echo $itemmember->id; ?>" ><?php echo $itemmember->nama; ?></option>

                                <?php } ?>
                            </select> 
                        </div>
                        <div class="col-md-4">
                            <span></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Deposit Amount</label>
                        <div class="col-md-3">
                            <input class="form-control" name="name_deposit" placeholder="Deposit" type="number" value="<?php echo set_value('name_deposit'); ?>">
                            <span class="col-md-9 text-danger">
                                <?php echo form_error('name_deposit'); ?>
                            </span>
                        </div>

                    </div>
                    
                    



                    <footer>
                        <div class="form-group">
                            <label class="col-md-2 control-label" for="select-1"></label>

                            <div class="col-md-4">

                                <input type="submit" name="button_adddeposit" class="btn btn-primary" value="Add Deposit">
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