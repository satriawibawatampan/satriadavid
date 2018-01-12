
<body class="animated fadeInDown">

    <header id="header">

        <div id="logo-group">
            <span id="logo"> <img src="<?php echo base_url(); ?>HTML_Full_Version_v1.8.2/img/logo.png" alt="SmartAdmin"> </span>
        </div>

        <span id="extr-page-header-space"> <span class="hidden-mobile hiddex-xs">Need an account?</span> <a href="register.html" class="btn btn-danger">Create account</a> </span>

    </header>

    <div id="main" role="main">

        <!-- MAIN CONTENT -->
        <div id="content" class="container">

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-7 col-lg-8 hidden-xs hidden-sm">
                    <h1 class="txt-color-red login-header-big">Halo, Toko Dupa Bintang Terang Admin</h1>
                    <div class="hero">

                        <div class="pull-left login-desc-box-l">
                            <h4 class="paragraph-header">Please sign in or sign up.</h4>

                        </div>

                        <img src="<?php echo base_url(); ?>HTML_Full_Version_v1.8.2/img/demo/dupa binter.png" class="pull-right display-image" alt="" style="width:210px">

                    </div>



                </div>
                <div class="col-xs-12 col-sm-12 col-md-5 col-lg-4">
                    <div class="well no-padding">

                        <?php if (isset($_SESSION['pesanform'])) { ?>
                            <div class="alert alert-success">
                                <?php echo $_SESSION['pesanform']; ?>

                            </div>
                        <?php } ?>
                        
                        <?php
                        if (isset($_SESSION['testerror'])) {
                            ?>
                            <div class="alert alert-danger">
                                <?php
                                echo $_SESSION['testerror'];
                                ?>
                            </div>
                            <?php }
                        ?>
                        <form action="<?php echo base_url(); ?>Back/Account/Send_new_password"  method="post" id="login-form" class="smart-form client-form">
                            <header>
                                Forgot Password
                            </header>

                            <fieldset>

                                <section>
                                    <label class="label">Enter your email address</label>
                                    <label class="input"> <i class="icon-append fa fa-envelope"></i>
                                        <input type="email" name="name_emailforgotpassword">
                                        <b class="tooltip tooltip-top-right"><i class="fa fa-envelope txt-color-teal"></i> Please enter email address for password reset</b></label>
                                </section>

                                <section>

                                    <a href="<?php echo base_url(); ?>Back/Account/Show_login">I remembered my password!</a>
                                    </div>
                                </section>

                            </fieldset>
                            <footer>
                                <input type="submit" name="button_resetpassword" class="btn btn-primary" value="Reset Password">
                                    
                              
                            </footer>
                        </form>

                    </div>

                    <h5 class="text-center"> - Or sign in using -</h5>

                    <ul class="list-inline text-center">
                        <li>
                            <a href="javascript:void(0);" class="btn btn-primary btn-circle"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="btn btn-info btn-circle"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="btn btn-warning btn-circle"><i class="fa fa-linkedin"></i></a>
                        </li>
                    </ul>

                </div>
            </div>
        </div>

    </div>

    <!--================================================== -->	

    <!-- PACE LOADER - turn this on if you want ajax loading to show (caution: uses lots of memory on iDevices)-->
    <script src="<?php echo base_url(); ?>HTML_Full_Version_v1.8.2/js/plugin/pace/pace.min.js"></script>

    <!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script> if (!window.jQuery) {
                        document.write('<script src="js/libs/jquery-2.1.1.min.js"><\/script>');}</script>

    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    <script> if (!window.jQuery.ui) {
                        document.write('<script src="js/libs/jquery-ui-1.10.3.min.js"><\/script>');}</script>

    <!-- IMPORTANT: APP CONFIG -->
    <script src="<?php echo base_url(); ?>HTML_Full_Version_v1.8.2/js/app.config.js"></script>

    <!-- JS TOUCH : include this plugin for mobile drag / drop touch events 		
    <script src="js/plugin/jquery-touch/jquery.ui.touch-punch.min.js"></script> -->

    <!-- BOOTSTRAP JS -->		
    <script src="<?php echo base_url(); ?>HTML_Full_Version_v1.8.2/js/bootstrap/bootstrap.min.js"></script>

    <!-- JQUERY VALIDATE -->
    <script src="<?php echo base_url(); ?>HTML_Full_Version_v1.8.2/js/plugin/jquery-validate/jquery.validate.min.js"></script>

    <!-- JQUERY MASKED INPUT -->
    <script src="<?php echo base_url(); ?>HTML_Full_Version_v1.8.2/js/plugin/masked-input/jquery.maskedinput.min.js"></script>

    <!--[if IE 8]>
            
            <h1>Your browser is out of date, please update your browser by going to www.microsoft.com/download</h1>
            
    <![endif]-->

    <!-- MAIN APP JS FILE -->
    <script src="<?php echo base_url(); ?>HTML_Full_Version_v1.8.2/js/app.min.js"></script>

    <script type="text/javascript">
        runAllForms();

        $(function () {
            // Validation
            $("#login-form").validate({
                // Rules for form validation
                rules: {
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true,
                        minlength: 3,
                        maxlength: 20
                    }
                },

                // Messages for form validation
                messages: {
                    email: {
                        required: 'Please enter your email address',
                        email: 'Please enter a VALID email address'
                    },
                    password: {
                        required: 'Please enter your password'
                    }
                },

                // Do not change code below
                errorPlacement: function (error, element) {
                    error.insertAfter(element.parent());
                }
            });
        });
    </script>

</body>
</html>