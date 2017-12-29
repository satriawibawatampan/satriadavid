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

                                <div id="datatable_col_reorder_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">

                                    <table id="datatable_col_reorder" class="table table-striped table-bordered table-hover dataTable no-footer has-columns-hidden" width="100%" role="grid" aria-describedby="datatable_col_reorder_info" style="width: 100%;">
                                        <thead>
                                            <tr role="row">
                                                <th data-class="phone" class="expand sorting" tabindex="0" aria-controls="datatable_col_reorder" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 81px;">Date</th>
                                                <th data-hide="expand" class="sorting_asc" tabindex="0" aria-controls="datatable_col_reorder" rowspan="1" colspan="1" aria-sort="ascending" aria-label="ID: activate to sort column descending" style="width: 32px;">Description</th>
                                                <th data-class="phone" class="expand sorting" tabindex="0" aria-controls="datatable_col_reorder" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 81px;">Grandtotal</th>
                                                <th data-class="phone" class="expand sorting" tabindex="0" aria-controls="datatable_col_reorder" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 81px;">HPP</th>
                                                <th data-class="phone" class="expand sorting" tabindex="0" aria-controls="datatable_col_reorder" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 81px;">Margin</th>
                                                <th data-class="phone" class="expand sorting" tabindex="0" aria-controls="datatable_col_reorder" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 81px;">%</th>



                                        </thead>
                                        <tbody id="table_income_summary">
                                            <?php
                                            foreach ($tableincomesummary as $hasil) {
                                                $grandtotal = $hasil->grandtotal;
                                                $hpp = $hasil->hpp ;
                                                $margin =($hasil->grandtotal-$hasil->hpp);
                                                $persen = ($margin*100/$grandtotal);
                                                
                                            
                                                
                                                
                                               
                                                
                                              echo '<tr role = "row" class = "odd">';
                                               echo '<td>' . $hasil->tanggalupdate . '</td>';
                                             echo '<td><a target="_blank" href="'. base_url().'Back/Order/Prints/'. $hasil->idnotajual.'">Order Note '. $hasil->idnotajual . '</a>';
                                               echo '<td>' . number_format ( $hasil->grandtotal , 0 , "." , "," ) . '</td>';
                                               echo '<td>' .  number_format ( $hasil->hpp , 0 , "." , "," ) . '</td>';
                                                
                                               echo '<td>'.number_format ( $margin , 0 , "." , "," ) .'</td>';
                                               echo '<td>'. number_format ( $persen , 2 , "." , "," ).'% </td>';
 echo '</tr>';
                                            }
                                             ?>
                                            
                                        </tbody>
                                    </table>

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
                        function show_report()
                        {
                            if ($("#id_to").val().length > 0 && $("#id_from").val().length > 0)
                            {
                                if ($("#id_to").val() < $("#id_from").val())
                                {
                                    alert("'Date To' must be same as / higher than 'Date From'");
                                } else
                                {
                                    var from = $("#id_from").val();
                                    var to =$("#id_to").val();
                                     $("#table_income_summary").empty();
                                    $.ajax({
                                        type: "POST",
                                        url: "<?php echo base_url(); ?>" + "Back/Cashflow/Get_income_summary_bydate/",
                                        dataType: "json",
                                        data: { froma: from, toa: to },
                                        success: function (result) {
                                            var urutanresidu = 1;
                                               // alert(result);
                                            $.each(result, function (id, nameb)
                                            {
                                                var grandtotal = parseFloat(nameb['grandtotal']).toFixed(2);
                                                var hpp = parseFloat(nameb['hpp']).toFixed(2);
                                                var margin =(grandtotal-hpp).toFixed(2);
                                                var persen = (margin*100/grandtotal).toFixed(2);

                                                $("#table_income_summary").append(
                                                        "<tr role = 'row' class = 'odd'>" +
                                                        "<td>" + nameb['tanggal'] + "</td>" +
                                                        "<td><a target='_blank' href='<?php echo base_url(); ?>Back/Order/Prints/"+nameb['idnotajual']+"'>Order Note " + nameb['idnotajual'] + "</a></td>" +
                                                        "<td>" + grandtotal + "</td>" +
                                                        "<td>" + hpp+ "</td>" +
                                                        "<td ><span style='colour:green'>" + margin + " ( "+persen+"% )</span> </td>" +
                                                        "</tr>");

                                                urutanresidu++;

                                            });
                                        }
                                    });
                                }
                            } else
                            {
                                alert("Nulls in field Dates are not allowed");
                            }
                        }
                    </script>