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
                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                            <span>XCELLENT</span><br>
                            <span>ALAMAT XCELLENT</span><br>
                            <span>(031)xxx-xxx-xx</span><br>
                            <span>Admin <?php echo $nota['nama_admin'];?></span>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" style="text-align: right">
                            <span>No Nota</span><br>
                            <span><?php echo strftime("%d %B %Y", strtotime($nota['tanggal'])) ?></span><br>
                            <span><?php echo $nota['nama_member'];?></span><br>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <!--shopcart-->
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th width="50px" style='text-align: center;'>No</th>
                                            <th style='text-align: center;'>Nama Produk</th>
                                            <th style='text-align: center;'>Jumlah</th>
                                            <th style='text-align: center;'>Harga (Rp)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (count($nota['produks']) > 0) {
                                            $no = 1;
                                            foreach ($nota['produks'] as $items):
                                                ?>
                                                <tr class="odd gradeX">
                                                    <td><?php echo $no ?></td>
                                                    <td><?php echo $items['nama_produk'] ?></td>
                                                    <td><?php echo $items['jumlah'] ?></td>                             
                                                    <td style='text-align: center;'><?php echo number_format($items['harga'], 0, '', '.'); ?></td>   
                                                </tr>
                                                <?php
                                                $no++;
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
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-sm-6 col-xs-6">
                            <h4> Pembayaran</h4>
                             <table style="    
                                    width: 100%;
                                    max-width: 100%;
                                    margin-bottom: 18px;
                                    border-collapse: collapse;
                                    border-spacing: 0;
                                    display: table;">
                                <?php
                                    if (count($nota['pembayaran']) > 0) {
                                        $no = 1;
                                        foreach ($nota['pembayaran'] as $items):
                                            ?>
                                            <tr class="odd gradeX">
                                                <td>
                                                    <?php 
                                                        if($items['tipe'] == "1"){
                                                             echo "LUNAS";
                                                        }else if($items['tipe'] == "2"){
                                                            echo "CICILAN";
                                                        }
                                                ?>
                                                </td>       
                                                <td style='text-align: left;'>Rp.<?php echo number_format($items['jumlah'], 0, '', '.'); ?>,-</td>   
                                            </tr>
                                            <?php
                                            $no++;
                                        endforeach;
                                    } ?>
                            </table>
                        </div>
                         <div class="col-lg-2  col-sm-2 col-xs-2">
                        </div>
                        <div class="col-lg-4  col-sm-4 col-xs-4" style="text-align: center;">
                            <h4>Total Harga: Rp.<?php echo number_format($nota['grandtotal'],0,'','.'); ?>,-</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
