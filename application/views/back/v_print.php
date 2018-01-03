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
        <link rel="apple-touch-icon"s izes="152x152" href="<?php echo base_url(); ?>HTML_Full_Version_v1.8.2/img/splash/touch-icon-ipad-retina.png">

        <!-- iOS web-app metas : hides Safari UI Components and Changes Status Bar Appearance -->
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">

    </head>
    <body>
        <div id="wrapper" >
            <!-- /.navbar-static-top -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align: center; font-weight: 700;">
                            <span>XCELLENT PRINTING</span><br>
                            <span>ALAMAT XCELLENT</span><br>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align: left;">
                            <span><?php echo $nota[0]['id'];?></span><br>
                            <span>RO : <?php echo $nota[0]['namaadmin'];?></span><br>
                            <span>Csh : <?php echo $nota[0]['nama_admin'];?></span><br>
                            <?php if (isset($nota[0]['namaproduser'])){
                                ?>
                                 <span>Member : <?php echo $nota[0]['namaproduser'];?></span><br>
                                <?php
                            }?>
                            <?php if (isset($nota[0]['namapromo'])){
                                ?>
                                 <span>Promo : <?php echo $nota[0]['namapromo'];?></span><br>
                                <?php
                            }?>
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
                                                    <td style='text-align: center;'><?php echo number_format($total, 0, '', '.'); ?></td>   
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
                                    <td style="text-align: right;">Grand Total</td>
                                    <td style="text-align: left;">:</td>
                                    <td style="text-align: left;">Rp.</td>
                                    <td style="text-align: right;"><?php echo number_format($nota[0]['grandtotal'], 0, '', '.'); ?>,-</td>
                                </tr>
                                <?php 
                                if(count($bayar) > 0){
                                    foreach($bayar as $pemb){
                                    ?>
                                    <tr>
                                        <td style="text-align: right;"><?php echo $pemb['nama_pembayaran'];?></td>
                                        <td style="text-align: left;">:</td>
                                        <td style="text-align: left;">Rp.</td>
                                        <td style="text-align: right;"><?php echo number_format($pemb['jumlah'], 0, '', '.'); ?>,-</td>
                                    </tr>
                                    <?php
                                    }
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
                            <span style='font-weight: 600;'><?php echo $nota[0]['createdat'];?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
