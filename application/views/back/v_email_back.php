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
            <li>Home</li><li>Miscellaneous</li><li>Blank Page</li>
        </ol>
        <!-- end breadcrumb -->



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
                    Email 
                    <span>>  
                        Send Information
                    </span>
                </h1>
            </div>
            <!-- end col -->


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

        <header role="heading"><span class="widget-icon"> <i class="fa fa-edit"></i> </span>
            <h2>Email Form </h2>				

            <span class="jarviswidget-loader"><i class="fa fa-refresh fa-spin"></i></span></header>

        <!-- widget div-->
        <div role="content">

            <!-- widget edit box -->

            <!-- end widget edit box -->

            <!-- widget content -->
            <div class="widget-body ">

                <form role='form' id="smart-form-email" action="<?php echo base_url(); ?>Back/Email/Send_information" class="form-horizontal" novalidate="novalidate" method="post">

                    <?php //echo validation_errors(); ?>
                    
                    <div class="form-group">
                        <label class="col-md-2 control-label">Subject</label>
                        <div class="col-md-2">
                            <input class="form-control" id="id_bonus_deposit" name="name_subject"  type="text" value="<?php echo set_value('name_subject'); ?>">
                            <span class="col-md-9 text-danger">
                                <?php echo form_error('name_subject'); ?>
                            </span>
                        </div>

                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-2 control-label">Content</label>
                        <div class="col-md-4">
                            <textarea class="form-control" name="name_content"  rows="4" ><?php echo set_value('name_content'); ?></textarea>
                            <span class="col-md-9 text-danger">
                                <?php echo form_error('name_content'); ?>
                            </span>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-2 control-label">To</label>
                        <div class="col-md-2">
                            <select class="form-control" name="name_counter" id="select-1" selected ="select" >
                                <?php
                                for($x=1;$x<=$listcounter;$x++){
                                    echo "<option value='" . $x . "'" . set_select('name_counter') . ">" .  (($x-1)*100+1)." - " .($x*100). "</option>";
                                }
                                ?>
                            </select> 
                            <span class="col-md-9 text-danger">
                                <?php echo form_error('name_counter'); ?>
                            </span>
                        </div>
                    </div>
                    
                    



                    <footer>
                        <div class="form-group">
                            <label class="col-md-2 control-label" for="select-1"></label>

                            <div class="col-md-4">

                                <input type="button" onclick="check_all_not_null()" id="id_button_submit" class="btn btn-primary" value="Send">
                                <input type="hidden" name="button_submit" class="btn btn-primary" value="1">
                          
                            </div>

                        </div>

                    </footer>
                </form>						

            </div>
            <!-- end widget content -->

        </div>
        <!-- end widget div -->

    </div>
</div>
<!-- END MAIN CONTENT -->

</div>

<script>
      var urutanpayment = 1
    function add_to_table_payment()
    {

        if (
            
                document.getElementById('id_paymentamount').value.length > 0
                )
        {
            var checkingadaproduksama = check_paymentmethod();
            //alert("checking " + checkingadamaterialsama);
            if (checkingadaproduksama == null || checkingadaproduksama === 'undifined' || checkingadaproduksama != 0)
            {
                $("#id_body_table_payment_method").append(
                        "<tr id='tr_" + urutanpayment + "' role = 'row' class = 'odd'>" +
                        "<td><div ><input readonly id='id_txt_id_paymentmethod_" + urutanpayment + "' class='form-control hitung' name='name_txt_id_paymentmethod[]'  type='text' value='" + $("#id_paymentmethod option:selected").val() + "'></div></td>" +
                        "<td><div ><input readonly id='id_txt_paymentmethod_" + urutanpayment + "' class='form-control ' name='name_txt_paymentmethod[]'  type='text' value='" + $("#id_paymentmethod option:selected").text() + "'></div></td>" +
                        "<td><div ><input readonly id='id_txt_paymentamount_" + urutanpayment + "' class='form-control ' name='name_txt_id_paymentamount[]'  type='text' value='" + $("#id_paymentamount").val() + "'></div></td>" +
                        "<td><div><a onclick='remove_payment_tr(" + urutanpayment + ")'>x</a></div></td>" +
                        "</tr>");

                urutanpayment++;
                checkingadaproduksama = 1;
                update_grandtotal_payment();

                // $("#id_paymentmethod").val(1);
                $("#id_paymentamount").val("");
            } else
            {
                alert("Payment have been registerd");
            }

        } else
        {
            alert("Nulls in field Payment Method Amount are not allowed");
        }
    }
    
    function check_all_not_null()
    {
        //alert("ok");
        $("#id_button_submit").prop('disabled', true);
        

                document.getElementById("smart-form-email").submit();
                 $("#id_button_submit").prop('disabled', false);
        


    }
    
     function check_paymentmethod()
    {
        var numItems = $('.hitung').length;

       
        var counterwhile = 1;
        while (numItems > 0)
        {   // jika yang dipilih ada di id-text_id_material_product(table)
            if ($("#id_paymentmethod option:selected").val() == $("#id_txt_id_paymentmethod_" + counterwhile).val())
            {
                counterwhile = 1;
                //kembalikan 0 untuk alert dari fungsi sebelumnya
                return 0;
                break;
            }
            if ($("#id_txt_id_paymentmethod_" + counterwhile).length > 0)
            {
                numItems--;
            }
            counterwhile++;

        }
        return 1;

    }
    function remove_payment_tr(y)
    {

        $("#tr_" + y).remove();
        update_grandtotal_payment();

    }
    function update_grandtotal_payment()
    {
        var numItem = $('.hitung').length;

        var grandtotalpayment = 0;
        
        var counterwhile = 1;
        while (numItem > 0)
        {   // jika yang dipilih ada di id-text_id_material_product(table)

            if ($("#id_txt_id_paymentmethod_" + counterwhile).length > 0)
            {
                //  alert(numItem);
                grandtotalpayment += parseFloat($("#id_txt_paymentamount_" + counterwhile).val());
                numItem--;
            }
            counterwhile++;

        }

        $("#id_payment_method_grandtotal").val(grandtotalpayment);
    }
</script>