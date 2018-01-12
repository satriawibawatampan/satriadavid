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
                    Petty Cash

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


        <?php $hakakses = $this->session->userdata['xcellent_hakakses'];
        if (in_array(35, $hakakses)) {
            ?>
            <div class="jarviswidget jarviswidget-sortable" id="wid-id-4" data-widget-editbutton="false" data-widget-custombutton="false" role="widget">

                <header role="heading">
                    <span class="widget-icon"> <i class="fa fa-edit"></i> </span>
                    <h2>Add Petty Cash Form </h2>				

                    <span class="jarviswidget-loader"><i class="fa fa-refresh fa-spin"></i></span></header>

                <!-- widget div-->
                <div role="content">

                    <!-- widget edit box -->

                    <!-- end widget edit box -->

                    <!-- widget content -->
                    <div class="widget-body ">

                        <form role='form' id="smart-form-register" action="<?php echo base_url(); ?>Back/Cashflow/Add_pettycash" class="form-horizontal" novalidate="novalidate" method="post">

    <?php //echo validation_errors();  ?>

                            <div class="form-group">
                                <label class="col-md-2 control-label" for="select-1">Type</label>
                                <div class="col-md-2">
                                    <select class="form-control" name="name_type" id="select-1" selected ="select" >
                                        <option value="1">Put Cash</option>
                                        <option value="2">Take Cash</option>
                                    </select> 
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-md-2 control-label">Description</label>
                                <div class="col-md-6">
                                    <textarea class="form-control" name="name_description"  rows="4" ><?php echo set_value('name_description'); ?></textarea>
                                    <span class="col-md-9 text-danger">
    <?php echo form_error('name_description'); ?>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label" for="select-1">Amount</label>
                                <div class="col-md-2">
                                    <input class="form-control" name="name_amount" min="0" type="number" value="<?php echo set_value('name_amount'); ?>">
                                    <span class="col-md-9 text-danger">
    <?php echo form_error('name_amount'); ?>
                                    </span>


                                </div>
                            </div>


                            <footer>
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="select-1"></label>

                                    <div class="col-md-4">

                                        <input type="submit" name="button_addpetttycash" class="btn btn-primary" value="Add to Petty Cash Flow">
                                    </div>

                                </div>

                            </footer>
                        </form>						

                    </div>
                    <!-- end widget content -->

                </div>
                <!-- end widget div -->

            </div>
            <!-- widget grid -->

<?php } ?>


        <div class="jarviswidget jarviswidget-sortable" id="wid-id-4" data-widget-editbutton="false" data-widget-custombutton="false" role="widget">

            <header role="heading">
                <span class="widget-icon"> <i class="fa fa-edit"></i> </span>
                <h2>Search Income Summary</h2>				

                <span class="jarviswidget-loader"><i class="fa fa-refresh fa-spin"></i></span></header>

            <!-- widget div-->
            <div role="content">

                <!-- widget edit box -->

                <!-- end widget edit box -->

                <!-- widget content -->
                <div class="widget-body ">

                    <form role='form' id="smart-form-register"  class="form-horizontal" novalidate="novalidate" method="post">

<?php //echo validation_errors();  ?>


                        <div class="form-group">
                            <label class="col-md-2 control-label" for="select-1">Date From - Date To</label>
                            <div class="col-md-2">
                                <input class="form-control" id="id_from" name="name_from"   type="Date" value="<?php echo set_value('name_from'); ?>">
                            </div>

                            <div class="col-md-2">
                                <input class="form-control"id="id_to" name="name_to"  type="Date" value="<?php echo set_value('name_to'); ?>">
                            </div>
                        </div>




                        <footer>
                            <div class="form-group">
                                <label class="col-md-2 control-label" for="select-1"></label>

                                <div class="col-md-4">

                                    <button onclick="show_reporta();" type="button" id="id_button_search" class="btn btn-primary " >Show Report</button>  </div>

                            </div>

                        </footer>
                    </form>



                </div>
                <!-- end widget content -->

            </div>
            <!-- end widget div -->

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
                            <h2>Petty Cash Flow </h2>

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

                                <div id='tableReload'>

                                    <?php
                                    //di ganti dari load table lewat file
                                    $data["tablepettycash"] = $tablepettycash;
                                    $this->load->view("back/table_p_t", $data);
                                    ?>
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



</div> 

<script>

    function show_reporta()
    {
        //alert("masuk");
        if ($("#id_to").val().length > 0 && $("#id_from").val().length > 0)
        {
            if ($("#id_to").val() < $("#id_from").val())
            {
                alert("'Date To' must be same as / higher than 'Date From'");
            } else
            {
                var from = $("#id_from").val();
                var to = $("#id_to").val();

                $("#tablepettycash").empty();
                // alert(from + "/" + to);
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>" + "Back/Cashflow/Get_petty_cash_bydate/",
                    dataType: "json",
                    dataType: "html",
                    data: {froma: from, toa: to},
                    success: function (result) {
                        $("#tableReload").html(result);
                    }
                });
            }
        } else
        {
            alert("Nulls in field Dates are not allowed");
        }
    }


</script>


