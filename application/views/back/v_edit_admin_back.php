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
                        Edit Admin
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
            <h2>Edit Admin Form </h2>				

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

                <form id="smart-form-register" action="<?php echo base_url(); ?>Back/Admin/Add_admin" class="smart-form" novalidate="novalidate" method="post">
                    <header>
                        Edit Admin form
                    </header>

                    <fieldset>
                        <section>
                            <label class="input"> <i class="icon-append fa fa-user"></i>
                                <input type="text" name="name" placeholder="Name" aria-required="true" class="error" aria-invalid="true" value="<?php echo set_value('name',$dataadmin->nama); ?>">
                                <b class="tooltip tooltip-bottom-right">Needed to enter the website</b>
                            </label>
                            <span class="col-md-9 text-danger">
                                    <?php echo form_error('name'); ?>
                                </span>
                        </section>



                        <section>
                            <label class="input"> <i class="icon-append fa fa-envelope-o"></i>
                                <input type="email" name="email" placeholder="Email address" aria-required="true" class="error" value="<?php echo set_value('name',$dataadmin->email); ?>" >
                                <b class="tooltip tooltip-bottom-right">Needed to verify your account</b> </label>
                                <span class="col-md-9 text-danger">
                                    <?php echo form_error('email'); ?>
                                </span>
                        </section>
                        
                       
                        
                        
                        
                    </fieldset>

                    
                    <footer>
                        <input type="submit" name="buttonSubmit" class="btn btn-primary" value="Submit">
                           
                        
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