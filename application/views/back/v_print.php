<!DOCTYPE html>
<body>
        <div id="wrapper" >
            <!-- /.navbar-static-top -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align: center; font-weight: 700;">
                            <span><?php echo $databranch['nama']; ?></span><br>
                            <span><?php echo nl2br($databranch['deskripsi']); ?></span><br>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align: left;">
                            <hr style="border-top: dotted 1px;">
                            <span>Nota <?php echo $nota[0]['id']; ?></span><br>
                            <span>RO : <?php echo $nota[0]['namaadmin']; ?></span><br>
                            <span>Csh : <?php echo $nota[0]['nama_admin']; ?></span><br>
                            <?php if (isset($nota[0]['namaproduser'])) {
                                ?>
                                <span>Member : <?php echo $nota[0]['nama_member']; ?></span><br>
                            <?php }
                            ?>
                            <?php if (isset($nota[0]['namapromo'])) {
                                ?>
                                <span>Promo : <?php echo $nota[0]['namapromo']; ?></span><br>
                            <?php }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <hr style="border-top: dotted 1px;">
                            <div>
                                <table style = "width: 100%; margin-left: auto; margin-right: auto;">
                                    <tbody>
                                        <?php
                                        date_default_timezone_set('Asia/Jakarta');
                                        $total = 0;
                                        $totalNoDiskon = 0;
                                        $totalDiskon = 0;
                                        if (count($nota['produks']) > 0) {
                                            foreach ($nota['produks'] as $items):
                                                $total = $items['jumlah'] * $items['harga'];
                                                $totalNoDiskon += $total;
                                                $totalDiskon += $total * $items['diskon'] / 100;
                                                $total = $total - ($total * $items['diskon'] / 100);
                                                $hargaDiskon = $items['harga'] - $items['harga'] * $items['diskon'] / 100;
                                                ?>
                                                <tr class="odd gradeX">
                                                    <td colspan="4"><?php echo $items['nama_produk'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td style='text-align: center;'><?php echo $items['jumlah'] ?> x</td>
                                                    <td style='text-align: center;'><?php echo number_format($hargaDiskon, 0, '', '.'); ?></td>   
                                                    <td style='text-align: center;'></td>   
                                                    <td style='text-align: right;'><?php echo number_format($total, 0, '', '.'); ?></td>   
                                                </tr>
                                                <?php
                                            endforeach;
                                        } else {
                                            ?>
                                        <td>-</td>
                                        <td>-</td>
                                        <td></td>
                                        <td>-</td>
                                        <?php
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div> 
                            <hr style="border-top: dotted 1px;">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12  col-sm-12 col-xs-12">
                            <table style = "width: 100%; margin-left: auto; margin-right: auto;">
                                <tr>
                                    <td style="text-align: left;">Grand Total</td>
                                    <td style="text-align: left;">:</td>
                                    <td style="text-align: left;">Rp.</td>
                                    <td style="text-align: right;"><?php echo number_format($nota[0]['grandtotal'], 0, '', '.'); ?>,-</td>
                                </tr>
                                <?php
                                if ($nota['pembayaran'] > 0) {
                                    foreach ($nota['pembayaran'] as $pemb) {
                                        ?>
                                        <tr>
                                            <td style="text-align: right;"><?php
                                                if ($pemb['id_pembayaran'] == 0) {
                                                    echo "Use " . $pemb['nama_pembayaran'];
                                                } else {
                                                    echo "Via " . $pemb['nama_pembayaran'];
                                                }
                                                ?></td>
                                            <td style="text-align: left;">:</td>
                                            <td style="text-align: left;">Rp.</td>
                                            <td style="text-align: right;"><?php echo number_format($pemb['jumlah'], 0, '', '.'); ?>,-</td>
                                        </tr>
                                        <?php
                                    }
                                }

                                if ($nota[0]['id_member'] != 0) {
                                    ?>
                                    <tr></tr>
                                    <tr>
                                        <td style="text-align: left;">Your Deposit</td>
                                        <td style="text-align: left;">:</td>
                                        <td style="text-align: left;">Rp.</td>
                                        <td style="text-align: right;"><?php echo number_format($nota[0]['deposit_member'], 0, '', '.'); ?>,-</td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: left;">Your Point</td>
                                        <td style="text-align: left;">:</td>
                                        <td style="text-align: left;"></td>
                                        <td style="text-align: right;"><?php echo number_format($nota[0]['poin_member'], 0, '', '.'); ?>,-</td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </table>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align: center;">&nbsp;
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align: center;">
                            <span>Terima kasih atas kunjungannya</span><br>
                            <span>Barang yang sudah dibeli</span><br>
                            <span>Tidak bisa dikembalikan</span><br>
                            <span style='font-weight: 600;'><?php echo $nota[0]['createdat']; ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

<!-- END SHORTCUT AREA -->

<!--================================================== -->

<!-- PAGE RELATED PLUGIN(S) 
<script src="..."></script>-->
<!-- PACE LOADER - turn this on if you want ajax loading to show (caution: uses lots of memory on iDevices)-->
<script data-pace-options='{ "restartOnRequestAfter": true }' src="<?php echo base_url(); ?>HTML_Full_Version_v1.8.2/js/plugin/pace/pace.min.js"></script>

<!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->


<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<script>
    if (!window.jQuery.ui) {
        document.write('<script src="<?php echo base_url(); ?>HTML_Full_Version_v1.8.2/js/libs/jquery-ui-1.10.3.min.js"><\/script>');
    }
</script>

<!-- IMPORTANT: APP CONFIG -->
<script src="<?php echo base_url(); ?>HTML_Full_Version_v1.8.2/js/app.config.js"></script>

<!-- JS TOUCH : include this plugin for mobile drag / drop touch events-->
<script src="<?php echo base_url(); ?>HTML_Full_Version_v1.8.2/js/plugin/jquery-touch/jquery.ui.touch-punch.min.js"></script> 

<!-- BOOTSTRAP JS -->
<script src="<?php echo base_url(); ?>HTML_Full_Version_v1.8.2/js/bootstrap/bootstrap.min.js"></script>

<!-- CUSTOM NOTIFICATION -->
<script src="<?php echo base_url(); ?>HTML_Full_Version_v1.8.2/js/notification/SmartNotification.min.js"></script>

<!-- JARVIS WIDGETS -->
<script src="<?php echo base_url(); ?>HTML_Full_Version_v1.8.2/js/smartwidgets/jarvis.widget.min.js"></script>

<!-- EASY PIE CHARTS -->
<script src="<?php echo base_url(); ?>HTML_Full_Version_v1.8.2/js/plugin/easy-pie-chart/jquery.easy-pie-chart.min.js"></script>

<!-- SPARKLINES -->
<script src="<?php echo base_url(); ?>HTML_Full_Version_v1.8.2/js/plugin/sparkline/jquery.sparkline.min.js"></script>

<!-- JQUERY VALIDATE -->
<script src="<?php echo base_url(); ?>HTML_Full_Version_v1.8.2/js/plugin/jquery-validate/jquery.validate.min.js"></script>

<!-- JQUERY MASKED INPUT -->
<script src="<?php echo base_url(); ?>HTML_Full_Version_v1.8.2/js/plugin/masked-input/jquery.maskedinput.min.js"></script>

<!-- JQUERY SELECT2 INPUT -->
<script src="<?php echo base_url(); ?>HTML_Full_Version_v1.8.2/js/plugin/select2/select2.min.js"></script>

<!-- JQUERY UI + Bootstrap Slider -->
<script src="<?php echo base_url(); ?>HTML_Full_Version_v1.8.2/js/plugin/bootstrap-slider/bootstrap-slider.min.js"></script>

<!-- browser msie issue fix -->
<script src="<?php echo base_url(); ?>HTML_Full_Version_v1.8.2/js/plugin/msie-fix/jquery.mb.browser.min.js"></script>

<!-- FastClick: For mobile devices -->
<script src="<?php echo base_url(); ?>HTML_Full_Version_v1.8.2/js/plugin/fastclick/fastclick.min.js"></script>

<!--[if IE 8]>

<h1>Your browser is out of date, please update your browser by going to www.microsoft.com/download</h1>

<![endif]-->

<!-- Demo purpose only -->
<script src="<?php echo base_url(); ?>HTML_Full_Version_v1.8.2/js/demo.min.js"></script>

<!-- MAIN APP JS FILE -->
<script src="<?php echo base_url(); ?>HTML_Full_Version_v1.8.2/js/app.min.js"></script>

<!-- ENHANCEMENT PLUGINS : NOT A REQUIREMENT -->
<!-- Voice command : plugin -->
<script src="<?php echo base_url(); ?>HTML_Full_Version_v1.8.2/js/speech/voicecommand.min.js"></script>

<!-- SmartChat UI : plugin -->
<script src="<?php echo base_url(); ?>HTML_Full_Version_v1.8.2/js/smart-chat-ui/smart.chat.ui.min.js"></script>
<script src="<?php echo base_url(); ?>HTML_Full_Version_v1.8.2/js/smart-chat-ui/smart.chat.manager.min.js"></script>
<!-- Table -->
<!-- PAGE RELATED PLUGIN(S) -->
<script src="<?php echo base_url(); ?>HTML_Full_Version_v1.8.2/js/plugin/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>HTML_Full_Version_v1.8.2/js/plugin/datatables/dataTables.colVis.min.js"></script>
<script src="<?php echo base_url(); ?>HTML_Full_Version_v1.8.2/js/plugin/datatables/dataTables.tableTools.min.js"></script>
<script src="<?php echo base_url(); ?>HTML_Full_Version_v1.8.2/js/plugin/datatables/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>HTML_Full_Version_v1.8.2/js/plugin/datatable-responsive/datatables.responsive.min.js"></script>
<script type="text/javascript">

// DO NOT REMOVE : GLOBAL FUNCTIONS!

    $(document).ready(function () {

        pageSetUp();

        /* // DOM Position key index //
         
         l - Length changing (dropdown)
         f - Filtering input (search)
         t - The Table! (datatable)
         i - Information (records)
         p - Pagination (paging)
         r - pRocessing 
         < and > - div elements
         <"#id" and > - div with an id
         <"class" and > - div with a class
         <"#id.class" and > - div with an id and class
         
         Also see: http://legacy.datatables.net/usage/features
         */

        /* BASIC ;*/
        var responsiveHelper_dt_basic = undefined;
        var responsiveHelper_datatable_fixed_column = undefined;
        var responsiveHelper_datatable_col_reorder = undefined;
        var responsiveHelper_datatable_tabletools = undefined;

        var breakpointDefinition = {
            tablet: 1024,
            phone: 480
        };

        $('#dt_basic').dataTable({
            "sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-12 hidden-xs'l>r>" +
                    "t" +
                    "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
            "autoWidth": true,
            "oLanguage": {
                "sSearch": '<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>'
            },
            "preDrawCallback": function () {
                // Initialize the responsive datatables helper once.
                if (!responsiveHelper_dt_basic) {
                    responsiveHelper_dt_basic = new ResponsiveDatatablesHelper($('#dt_basic'), breakpointDefinition);
                }
            },
            "rowCallback": function (nRow) {
                responsiveHelper_dt_basic.createExpandIcon(nRow);
            },
            "drawCallback": function (oSettings) {
                responsiveHelper_dt_basic.respond();
            }
        });

        /* END BASIC */

        /* COLUMN FILTER  */
        var otable = $('#datatable_fixed_column').DataTable({
            //"bFilter": false,
            //"bInfo": false,
            //"bLengthChange": false
            //"bAutoWidth": false,
            //"bPaginate": false,
            //"bStateSave": true // saves sort state using localStorage
            "sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6 hidden-xs'f><'col-sm-6 col-xs-12 hidden-xs'<'toolbar'>>r>" +
                    "t" +
                    "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
            "autoWidth": true,
            "oLanguage": {
                "sSearch": '<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>'
            },
            "preDrawCallback": function () {
                // Initialize the responsive datatables helper once.
                if (!responsiveHelper_datatable_fixed_column) {
                    responsiveHelper_datatable_fixed_column = new ResponsiveDatatablesHelper($('#datatable_fixed_column'), breakpointDefinition);
                }
            },
            "rowCallback": function (nRow) {
                responsiveHelper_datatable_fixed_column.createExpandIcon(nRow);
            },
            "drawCallback": function (oSettings) {
                responsiveHelper_datatable_fixed_column.respond();
            }

        });

        // custom toolbar
        $("div.toolbar").html('<div class="text-right"><img src="<?php echo base_url(); ?>HTML_Full_Version_v1.8.2/img/logo.png" alt="SmartAdmin" style="width: 111px; margin-top: 3px; margin-right: 10px;"></div>');

        // Apply the filter
        $("#datatable_fixed_column thead th input[type=text]").on('keyup change', function () {

            otable
                    .column($(this).parent().index() + ':visible')
                    .search(this.value)
                    .draw();

        });
        /* END COLUMN FILTER */

        /* COLUMN SHOW - HIDE */
        if (!$.fn.DataTable.isDataTable('#datatable_col_reorder')) {
            $('#datatable_col_reorder').dataTable({
                "sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-6 hidden-xs'C>r>" +
                        "t" +
                        "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-sm-6 col-xs-12'p>>",
                "autoWidth": true,
                "oLanguage": {
                    "sSearch": '<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>'
                },
                "preDrawCallback": function () {
                    // Initialize the responsive datatables helper once.
                    if (!responsiveHelper_datatable_col_reorder) {
                        responsiveHelper_datatable_col_reorder = new ResponsiveDatatablesHelper($('#datatable_col_reorder'), breakpointDefinition);
                    }
                },
                "rowCallback": function (nRow) {
                    responsiveHelper_datatable_col_reorder.createExpandIcon(nRow);
                },
                "drawCallback": function (oSettings) {
                    responsiveHelper_datatable_col_reorder.respond();
                }
            });
        }

        /* END COLUMN SHOW - HIDE */

        /* TABLETOOLS */
        $('#datatable_tabletools').dataTable({

            // Tabletools options: 
            //   https://datatables.net/extensions/tabletools/button_options
            "sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-6 hidden-xs'T>r>" +
                    "t" +
                    "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-sm-6 col-xs-12'p>>",
            "oLanguage": {
                "sSearch": '<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>'
            },
            "oTableTools": {
                "aButtons": [
                    "copy",
                    "csv",
                    "xls",
                    {
                        "sExtends": "pdf",
                        "sTitle": "SmartAdmin_PDF",
                        "sPdfMessage": "SmartAdmin PDF Export",
                        "sPdfSize": "letter"
                    },
                    {
                        "sExtends": "print",
                        "sMessage": "Generated by SmartAdmin <i>(press Esc to close)</i>"
                    }
                ],
                "sSwfPath": "<?php echo base_url(); ?>HTML_Full_Version_v1.8.2/js/plugin/datatables/swf/copy_csv_xls_pdf.swf"
            },
            "autoWidth": true,
            "preDrawCallback": function () {
                // Initialize the responsive datatables helper once.
                if (!responsiveHelper_datatable_tabletools) {
                    responsiveHelper_datatable_tabletools = new ResponsiveDatatablesHelper($('#datatable_tabletools'), breakpointDefinition);
                }
            },
            "rowCallback": function (nRow) {
                responsiveHelper_datatable_tabletools.createExpandIcon(nRow);
            },
            "drawCallback": function (oSettings) {
                responsiveHelper_datatable_tabletools.respond();
            }
        });

        /* END TABLETOOLS */

    })

</script>

<!-- Your GOOGLE ANALYTICS CODE Below -->
<script type="text/javascript">
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-XXXXXXXX-X']);
    _gaq.push(['_trackPageview']);

    (function () {
        var ga = document.createElement('script');
        ga.type = 'text/javascript';
        ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(ga, s);
    })();
</script>

<script>
    $(document).ready(function () {
        window.print();
    });
   
</script>
