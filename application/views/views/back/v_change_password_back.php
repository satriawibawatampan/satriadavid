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
                    <i class="fa-fw fa fa-puzzle-piece"></i> 
                    Profile 
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

    <div class="jarviswidget jarviswidget-sortable" id="wid-id-4" data-widget-editbutton="false" data-widget-custombutton="false" role="widget">

        <header role="heading">
            <span class="widget-icon"> <i class="fa fa-edit"></i> </span>
            <h2>Change Password </h2>				

            <span class="jarviswidget-loader"><i class="fa fa-refresh fa-spin"></i></span></header>

        <!-- widget div-->
        <div role="content">

            <!-- widget edit box -->
            <div class="jarviswidget-editbox">
                <!-- This area used as dropdown edit box -->

            </div>
            <!-- end widget edit box -->


            <?php if (isset($_SESSION['pesanform'])) { ?>
                <div class="alert alert-success">
                    <?php echo $_SESSION['pesanform']; ?>

                </div>
            <?php } ?>


            <?php
            if (isset($_SESSION['testerror'])) {
                ?>
                <div class="alert alert-danger">
                    <?php
                    echo $_SESSION['testerror'];
                    ?>
                </div>
            <?php }
            ?>
            <!-- widget content -->
            <div class="widget-body no-padding">

                <form id="smart-form-register" action="<?php echo base_url(); ?>Back/Account/Change_password" class="smart-form" novalidate="novalidate" method="post">
                    <header>
                        Change Password
                    </header>


                    <fieldset>


                        <section>
                            <label class="input"> <i class="icon-append fa fa-user"></i>
                                <input type="text" name="name_email2" placeholder="Your Email" aria-required="true" class="error" aria-invalid="true" value="<?php echo set_value('name_email2'); ?>">
                                <b class="tooltip tooltip-bottom-right">Needed to reset your password</b>
                            </label>
                            <span class="col-md-9 text-danger">
                                <?php echo form_error('name_email2'); ?>
                            </span>
                        </section>

                        <section>
                            <label class="input"> <i class="icon-append fa fa-puzzle-piece"></i>
                                <input type="password" name="name_oldpassword" placeholder="Old Password" aria-required="true" class="error" aria-invalid="true" value="<?php echo set_value('name_oldpassword'); ?>">
                                <b class="tooltip tooltip-bottom-right">Needed to reset your password</b>
                            </label>
                            <span class="col-md-9 text-danger">
                                <?php echo form_error('name_oldpassword'); ?>
                            </span>
                        </section>



                        <section>
                            <label class="input"> <i class="icon-append fa fa-puzzle-piece"></i>
                                <input type="password" name="name_newpassword1" placeholder="New password" aria-required="true" class="error" aria-invalid="true" value="<?php echo set_value('name_newpassword1'); ?>">
                                <b class="tooltip tooltip-bottom-right">Needed to enter the Category</b>
                            </label>
                            <span class="col-md-9 text-danger">
                                <?php echo form_error('name_newpassword1'); ?>
                            </span>
                        </section>
                        <section>
                            <label class="input"> <i class="icon-append fa fa-puzzle-piece"></i>
                                <input type="password" name="name_newpassword2" placeholder="Retype you new password" aria-required="true" class="error" aria-invalid="true" value="<?php echo set_value('name_newpassword2'); ?>">
                                <b class="tooltip tooltip-bottom-right">Needed to enter the Category</b>
                            </label>
                            <span class="col-md-9 text-danger">
                                <?php echo form_error('name_newpassword2'); ?>
                            </span>
                        </section>



                    </fieldset>


                    <footer>
                        <input type="submit" name="button_changepassword" class="btn btn-primary" value="Submit">


                    </footer>
                </form>						

            </div>
            <!-- end widget content -->

        </div>
        <!-- end widget div -->







    </div>
</div>
<!-- END MAIN CONTENT -->


<!-- MODAL Edit -->

</div>