<!DOCTYPE html>

<html lang="en-us">
    <head>
        <meta charset="utf-8">
        <title> Xcellent Printing</title>
        <meta name="description" content="">
        <meta name="author" content="">

        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

        <!-- #CSS Links -->
        <!-- Basic Styles -->
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>HTML_Full_Version_v1.8.2/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>HTML_Full_Version_v1.8.2/css/font-awesome.min.css">

        <!-- SmartAdmin Styles : Caution! DO NOT change the order -->
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>HTML_Full_Version_v1.8.2/css/smartadmin-production-plugins.min.css">
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>HTML_Full_Version_v1.8.2/css/smartadmin-production.min.css">
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>HTML_Full_Version_v1.8.2/css/smartadmin-skins.min.css">

        <!-- SmartAdmin RTL Support -->
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>HTML_Full_Version_v1.8.2/css/smartadmin-rtl.min.css"> 


        <!-- SmartAdmin Invoice Print CSS -->
        <link rel="stylesheet" type="text/css" media="screen" href="css/invoice.min.css">

        <!-- We recommend you use "your_style.css" to override SmartAdmin
             specific styles this will also ensure you retrain your customization with each SmartAdmin update.
        <link rel="stylesheet" type="text/css" media="screen" href="css/your_style.css"> -->

        <!-- Demo purpose only: goes with demo.js, you can delete this css when designing your own WebApp -->
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>HTML_Full_Version_v1.8.2/css/demo.min.css">

        <!-- #FAVICONS -->
        <link rel="shortcut icon" href="<?php echo base_url(); ?>HTML_Full_Version_v1.8.2/img/favicon/favicon.ico" type="image/x-icon">
        <link rel="icon" href="<?php echo base_url(); ?>HTML_Full_Version_v1.8.2/img/favicon/favicon.ico" type="image/x-icon">

        <!-- #GOOGLE FONT -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700">

        <!-- #APP SCREEN / ICONS -->
        <!-- Specifying a Webpage Icon for Web Clip 
                 Ref: https://developer.apple.com/library/ios/documentation/AppleApplications/Reference/SafariWebContent/ConfiguringWebApplications/ConfiguringWebApplications.html -->
        <link rel="apple-touch-icon" href="<?php echo base_url(); ?>HTML_Full_Version_v1.8.2/img/splash/sptouch-icon-iphone.png">
        <link rel="apple-touch-icon" sizes="<?php echo base_url(); ?>HTML_Full_Version_v1.8.2/76x76" href="img/splash/touch-icon-ipad.png">
        <link rel="apple-touch-icon" sizes="<?php echo base_url(); ?>HTML_Full_Version_v1.8.2/120x120" href="img/splash/touch-icon-iphone-retina.png">
        <link rel="apple-touch-icon" sizes="<?php echo base_url(); ?>HTML_Full_Version_v1.8.2/152x152" href="img/splash/touch-icon-ipad-retina.png">

        <!-- iOS web-app metas : hides Safari UI Components and Changes Status Bar Appearance -->
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">

        <!-- Startup image for web apps -->
        <link rel="apple-touch-startup-image" href="<?php echo base_url(); ?>HTML_Full_Version_v1.8.2/img/splash/ipad-landscape.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape)">
        <link rel="apple-touch-startup-image" href="<?php echo base_url(); ?>HTML_Full_Version_v1.8.2/img/splash/ipad-portrait.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait)">
        <link rel="apple-touch-startup-image" href="<?php echo base_url(); ?>HTML_Full_Version_v1.8.2/img/splash/iphone.png" media="screen and (max-device-width: 320px)">


<!-- PACE LOADER - turn this on if you want ajax loading to show (caution: uses lots of memory on iDevices)-->
        <script data-pace-options='{ "restartOnRequestAfter": true }' src="<?php echo base_url(); ?>HTML_Full_Version_v1.8.2/js/plugin/pace/pace.min.js"></script>

        <!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            if (!window.jQuery) {
                document.write('<script src="<?php echo base_url(); ?>HTML_Full_Version_v1.8.2/js/libs/jquery-2.1.1.min.js"><\/script>');
            }
        </script>

        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
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

    </head>