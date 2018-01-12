
<body class="animated fadeInDown">

    <header id="header">

        <div id="logo-group">
            <span id="logo"> <img src="<?php echo base_url(); ?>HTML_Full_Version_v1.8.2/img/logo.png" alt="SmartAdmin"> </span>
        </div>

       
    </header>

    <div id="main" role="main">

        <!-- MAIN CONTENT -->
        <div id="content" class="container">

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-7 col-lg-8 hidden-xs hidden-sm">
                    <h1 class="txt-color-red login-header-big">Halo, Selamat Bekerja ^.^</h1>
                    <div class="hero">

                        <div class="pull-left login-desc-box-l">
                            <h4 class="paragraph-header">Please sign in or sign up.</h4>

                        </div>

<!--                        <img src="<?php echo base_url(); ?>HTML_Full_Version_v1.8.2/img/demo/dupa binter.png" class="pull-right display-image" alt="" style="width:210px">-->

                    </div>



                </div>
                <div class="col-xs-12 col-sm-12 col-md-5 col-lg-4">
                    <div class="well no-padding">

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
                        
                        <?php
                        if (isset($_SESSION['pesanform'])) {
                            ?>
                            <div class="alert alert-success">
                                <?php
                                echo $_SESSION['pesanform'];
                                ?>
                            </div>
                            <?php }
                        ?>

                        <form role="form" action="<?php echo base_url(); ?>Back/Account/Cek_login2" id="login-form" class="smart-form client-form" method="post">
                            <header>
                                Sign In
                            </header>

                            <fieldset>

                                <section>
                                    <label class="label">E-mail</label>
                                    <label class="input"> <i class="icon-append fa fa-user"></i>
                                        <input type="email" name="name_email" value="<?php echo set_value('name_email'); ?>">
                                        <b class="tooltip tooltip-top-right"><i class="fa fa-user txt-color-teal"></i> Please enter email address/username</b></label>
                                </section>

                                <section>
                                    <label class="label">Password</label>
                                    <label class="input"> <i class="icon-append fa fa-lock"></i>
                                        <input type="password" name="name_password" value="<?php echo set_value('name_password'); ?>" >
                                    </label>

                                </section>
                                <div class="note">
                                    <a href="<?php echo base_url(); ?>Back/Account/Show_forgot_password">Forgot password?</a>
                                </div>


                            </fieldset>
                            <footer>
                                <input type="submit" name="button_login" class="btn btn-primary" value="Sign In">


                            </footer>
                        </form>

                    </div>




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