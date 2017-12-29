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
            <div class="widget-body">

                <form role='form' id="smart-form-register" action="<?php echo base_url(); ?>Back/Account/Change_setting" class="form-horizontal" novalidate="novalidate" method="post">

                    
                    <div class="form-group">
                        <label class="col-md-2 control-label">Deposit Minimal</label>
                        <div class="col-md-2">
                            <input class="form-control" name="name_depositminimal"  min="0" type="number" value="<?php echo set_value('name_depositminimal'); ?>">
                            <span class="col-md-9 text-danger">
                                <?php echo form_error('name_depositminimal'); ?>
                            </span>
                        </div>

                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-2 control-label">Deposit Bonus</label>
                        <div class="col-md-2">
                            <input class="form-control" name="name_depositbonus"  type="number" max="100" min="0" value="<?php echo set_value('name_depositbonus',0); ?>">
                            <span class="col-md-9 text-danger">
                                <?php echo form_error('name_depositbonus'); ?>
                            </span>
                        </div>

                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Member Price</label>
                        <div class="col-md-2">
                            <input class="form-control" name="name_memberprice"  type="number" min="0" value="<?php echo set_value('name_memberprice'); ?>">
                            <span class="col-md-9 text-danger">
                                <?php echo form_error('name_memberprice'); ?>
                            </span>
                        </div>

                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Point Price</label>
                        <div class="col-md-2">
                            <input class="form-control" name="name_pointprice"   type="number" min="0" value="<?php echo set_value('name_pointprice'); ?>" >
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

        


        




    </div>
</div>
<!-- END MAIN CONTENT -->



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