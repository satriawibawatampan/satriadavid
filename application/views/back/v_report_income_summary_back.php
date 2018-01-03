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
                    Income Summary

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

                        <?php //echo validation_errors(); ?>


                        <div class="form-group">
                            <label class="col-md-2 control-label" for="select-1">Date From - Date To</label>
                            <div class="col-md-2">
                                <input class="form-control" id="id_from" name="name_from"   type="Date" value="<?php echo set_value('name_from'); ?>">
                            </div>

                            <div class="col-md-2">
                                <input class="form-control"id="id_to" name="name_to"   type="Date" value="<?php echo set_value('name_to'); ?>">
                            </div>
                        </div>




                        <footer>
                            <div class="form-group">
                                <label class="col-md-2 control-label" for="select-1"></label>

                                <div class="col-md-4">

                                    <button onclick="show_report()" type="button" id="id_button_search" class="btn btn-primary " >Show Report</button>  </div>

                            </div>

                        </footer>
                    </form>



                </div>
                <!-- end widget content -->

            </div>
            <!-- end widget div -->

        </div>
        <!-- widget grid -->

        <div class="jarviswidget jarviswidget-sortable" id="wid-id-4" data-widget-editbutton="false" data-widget-custombutton="false" role="widget">



            <section id="widget-grid" class="">

                <!-- row -->
                <div class="row">

                    <!-- NEW WIDGET START -->
                    <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                        <!-- Widget ID (each widget will need unique ID)-->
                        <div class="jarviswidget jarviswidget-color-blueDark jarviswidget-sortable" id="wid-id-2" data-widget-editbutton="false" role="widget">

                            <header role="heading">
                                <span class="widget-icon"> <i class="fa fa-table"></i> </span>


                                <span class="jarviswidget-loader"><i class="fa fa-refresh fa-spin" ></i></span></header>

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
                                        $data["tableincomesummary"]=$tableincomesummary;
                                        $this->load->view("Back/table_i_s",$data); ?>
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

        <!--end widget grid -->

    </div>
    <!--END MAIN CONTENT -->



</div>    
<?php $this->load->view('back/v_footer_back'); ?>
<script>
    function show_report()
    {
        if ($("#id_to").val().length > 0 && $("#id_from").val().length > 0)
        {
            if ($("#id_to").val() < $("#id_from").val())
            {
                alert("'Date To' must be same as / higher than 'Date From'");
            } else
            {
                var table = $("#table_i_s").dataTable();
                var from = $("#id_from").val();
                var to = $("#id_to").val();
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>" + "Back/Cashflow/Get_income_summary_bydate/",
                    dataType: "html", //ganti tipe HTML klo balikin HTML
                    data: {froma: from, toa: to},
                    success: function (result) {
                        //Table nya, html nya d ganti ambil dari controller
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