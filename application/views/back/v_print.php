<!DOCTYPE html>
<html lang="en-us" id="extr-page">
    <head>
        <meta charset="utf-8">
        <title> SmartAdmin</title>
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        
        <!-- #CSS Links -->
        <!-- Basic Styles -->
        <link rel="stylesheet" type="text/css" media="screen,print" href="<?php echo base_url(); ?>HTML_Full_Version_v1.8.2/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" media="screen,print" href="<?php echo base_url(); ?>HTML_Full_Version_v1.8.2/css/font-awesome.min.css">

        <!-- SmartAdmin Styles : Caution! DO NOT change the order -->
        <link rel="stylesheet" type="text/css" media="screen,print" href="<?php echo base_url(); ?>HTML_Full_Version_v1.8.2/css/smartadmin-production-plugins.min.css">
        <link rel="stylesheet" type="text/css" media="screen,print" href="<?php echo base_url(); ?>HTML_Full_Version_v1.8.2/css/smartadmin-production.min.css">
        <link rel="stylesheet" type="text/css" media="screen,print" href="<?php echo base_url(); ?>HTML_Full_Version_v1.8.2/css/smartadmin-skins.min.css">

        <!-- SmartAdmin RTL Support -->
        <link rel="stylesheet" type="text/css" media="screen,print" href="<?php echo base_url(); ?>HTML_Full_Version_v1.8.2/css/smartadmin-rtl.min.css"> 

        <!-- We recommend you use "your_style.css" to override SmartAdmin
             specific styles this will also ensure you retrain your customization with each SmartAdmin update.
        <link rel="stylesheet" type="text/css" media="screen,print" href="css/your_style.css"> -->
                
                <!--<link rel="stylesheet" type="text/css" media="screen,print" href="css/your_style.css">-->

        <!-- Demo purpose only: goes with demo.js, you can delete this css when designing your own WebApp -->
        <link rel="stylesheet" type="text/css" media="screen,print" href="<?php echo base_url(); ?>HTML_Full_Version_v1.8.2/css/demo.min.css">

        <!-- #FAVICONS -->
        <link rel="shortcut icon" href="<?php echo base_url(); ?>HTML_Full_Version_v1.8.2/img/favicon/favicon.ico" type="image/x-icon">
        <link rel="icon" href="<?php echo base_url(); ?>HTML_Full_Version_v1.8.2img/favicon/favicon.ico" type="image/x-icon">

        <!-- #GOOGLE FONT -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700">

        <!-- #APP SCREEN / ICONS -->
        <!-- Specifying a Webpage Icon for Web Clip 
             Ref: https://developer.apple.com/library/ios/documentation/AppleApplications/Reference/SafariWebContent/ConfiguringWebApplications/ConfiguringWebApplications.html -->
        <link rel="apple-touch-icon" href="<?php echo base_url(); ?>HTML_Full_Version_v1.8.2/img/splash/sptouch-icon-iphone.png">
        <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url(); ?>HTML_Full_Version_v1.8.2/img/splash/touch-icon-ipad.png">
        <link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url(); ?>HTML_Full_Version_v1.8.2/img/splash/touch-icon-iphone-retina.png">
        <link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url(); ?>HTML_Full_Version_v1.8.2/img/splash/touch-icon-ipad-retina.png">
        
        <!-- iOS web-app metas : hides Safari UI Components and Changes Status Bar Appearance -->
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">

    </head>
    <body>
        <div id="wrapper">
            <!-- /.navbar-static-top -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align: center;">
                            <span>XCELLENT</span><br>
                            <span>ALAMAT XCELLENT</span><br>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8" style="text-align: left;">
                            <span>No Nota</span><br>
                            <span><?php echo strftime("%d/%m/%y", strtotime($nota['tanggal'])) ?></span><br>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" style="text-align: right;">
                            <span>Jam</span><br>
                            <span><?php echo strftime("%H:%M:%S", strtotime($nota['tanggal'])) ?></span><br>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <!--shopcart-->
                            <hr>
                            <div>
                                <table style = "width: 100%; margin-left: auto; margin-right: auto;">
                                    <thead>
                                        <tr>
                                            <th>Nama Produk</th>
                                            <th>Qty</th>
                                            <th>Harga</th>
                                            <th>Diskon</th>
                                            <th>Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        date_default_timezone_set('Asia/Jakarta');
                                         $total = 0;
                                         $totalNoDiskon= 0;
                                         $totalDiskon = 0;
                                        if (count($nota['produks']) > 0) {
                                            foreach ($nota['produks'] as $items):
                                                $total = $items['jumlah'] * $items['harga'];
                                                $totalNoDiskon += $total;
                                                $totalDiskon += $total * $items['diskon'] / 100;
                                                $total = $total - ($total * $items['diskon'] / 100);

                                                ?>
                                                <tr class="odd gradeX">
                                                    <td colspan="5"><?php echo $items['nama_produk'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td style='text-align: center;'><?php echo $items['jumlah'] ?></td>                             
                                                    <td>x</td>                             
                                                    <td style='text-align: center;'><?php echo number_format($items['harga'], 0, '', '.'); ?></td>   
                                                    <td style='text-align: center;'><?php echo number_format($items['diskon'], 2, ',', '.'); ?> %</td>   
                                                    <td style='text-align: center;'><?php echo number_format($total, 0, '', '.'); ?></td>   
                                                </tr>
                                                <?php
                                            endforeach;
                                        } else {
                                            ?>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <?php
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div> 
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12  col-sm-12 col-xs-12">
                            <table style = "width: 100%; margin-left: auto; margin-right: auto;">
                                <tr>
                                    <td style="text-align: right;">Total</td>
                                    <td style="text-align: left;">:</td>
                                    <td style="text-align: left;">Rp.</td>
                                    <td style="text-align: right;"><?php echo number_format($nota['grandtotal'],0,'','.'); ?>,-</td>
                                </tr>
                                <tr>
                                    <td style="text-align: right;">Diskon</td>
                                    <td style="text-align: left;">:</td>
                                    <td style="text-align: left;">Rp.</td>
                                    <td style="text-align: right;"><?php echo number_format(0,0,'','.'); ?>,-</td>
                                </tr>
                                <tr>
                                    <td style="text-align: right;">Grand Total</td>
                                    <td style="text-align: left;">:</td>
                                    <td style="text-align: left;">Rp.</td>
                                    <td style="text-align: right;"><?php echo number_format($nota['grandtotal'],0,'','.'); ?>,-</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align: center;">&nbsp;
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align: center;">
                            <span>Terima kasih atas kunjungannya</span><br>
                            <span>Barang yang sudah dibeli</span><br>
                            <span>Tidak bisa dikembalikan</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
