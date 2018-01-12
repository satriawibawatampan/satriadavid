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
                    Member 
                    <span>>  
                        Add Deposit
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
            <h2>Add Deposit Form </h2>				

            <span class="jarviswidget-loader"><i class="fa fa-refresh fa-spin"></i></span></header>

        <!-- widget div-->
        <div role="content">

            <!-- widget edit box -->

            <!-- end widget edit box -->

            <!-- widget content -->
            <div class="widget-body ">

                <form role='form' id="smart-form-register-payment" action="<?php echo base_url(); ?>Back/Member/Add_deposit_to_note" class="form-horizontal" novalidate="novalidate" method="post">

                    <?php //echo validation_errors(); ?>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="select-1">Member</label>
                        <div class="col-md-2">
                            <select class="form-control" name="name_member" id="id_member" selected ="select" >
                                

                                <?php foreach ($listmember as $itemmember) { ?>

                                    <option value="<?php echo $itemmember->id; ?>" ><?php echo $itemmember->nama; ?></option>

                                <?php } ?>
                            </select> 
                        </div>
                        <div class="col-md-4">
                            <span></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Deposit Amount</label>
                        <div class="col-md-3">
                            <input class="form-control" id="id_deposit" name="name_deposit" min="<?php echo $datasetting[0]->harga_deposit; ?>" type="number" value="<?php echo set_value('name_deposit', $datasetting[0]->harga_deposit); ?>">
                            <input class="form-control" id="id_bonus_deposit" name="name_bonusdeposit"  type="hidden" value="<?php echo set_value('name_bonusdeposit', $datasetting[0]->bonus_deposit); ?>">
                            <span class="col-md-9 text-danger">
                                <?php echo form_error('name_bonusdeposit'); ?>
                            </span>
                        </div>

                    </div>
                    <div class="form-group">
                            <label class="col-md-2 control-label" for="select-1">Payment Method</label>
                            <div class="col-md-2">

                                <select class="form-control" name="name_paymentmethod" id="id_paymentmethod" selected ="select" >
                                    <?php
                                    foreach ($listpaymentmethod as $hasil) {
                                        if($hasil->id!=0)
                                        {
                                        echo "<option value='" . $hasil->id . "'>" . $hasil->nama . "</option>";
                                        }
                                    }
                                    ?>


                                </select> 

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label" for="select-1">Payment Amount</label>
                            <div class="col-md-2">

                                <input  id="id_paymentamount" type="number" name="name_paymentamount"  aria-required="true" class="error" aria-invalid="true" value="" >

                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label" for="select-1"></label>
                            <div class="col-md-2">
                                <button onclick="add_to_table_payment()" type="button"  name="" id="id_button_add_to_table_payment" class="btn btn-primary " value=""> Add Payment</button>

                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label" for="select-1"></label>
                            <div class="col-md-6">
                                <table id="id_table_payment_method" class="table table-bordered table-striped" >
                                    <thead>
                                        <tr >
                                            <th  style="width: 100px;" >id</th>
                                            <th  style="width: 200px;" >Payment Method</th>
                                            <th  style="width: 200px;"  >Amount</th>
                                            <th  style="width: 50px;" >x</th>

                                    </thead>
                                    <tbody id="id_body_table_payment_method" >	

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label" for="select-1">Total Payment</label>
                            <div class="col-md-2">
                                <input readonly type="text" name="name_totalpayment" id="id_payment_method_grandtotal" value="0">

                            </div>
                        </div>
                    
                    



                    <footer>
                        <div class="form-group">
                            <label class="col-md-2 control-label" for="select-1"></label>

                            <div class="col-md-4">

                                <input type="button" onclick="check_all_not_null()" id="id_button_adddeposit" class="btn btn-primary" value="Add Deposit">
                                <input type="hidden" name="button_adddeposit" class="btn btn-primary" value="1">
                          
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
        $("#id_button_adddeposit").prop('disabled', true);
        if ($('#id_member').val() == 0)
        {
            
            alert("Choose 1 member to deposit");
            $("#id_button_adddeposit").prop('disabled', false);
        } else if ($('#id_deposit').length == 0)
        {
            
            alert("Deposit amount can't be null");
            $("#id_button_adddeposit").prop('disabled', false);
        }
        else if ($('.hitung').length == 0)
        {
            
            alert("Register at least one payment method");
            $("#id_button_adddeposit").prop('disabled', false);
        } 
        else
        { 
            var grandtotal = parseInt($("#id_payment_method_grandtotal").val()) ;
            var deposit = parseInt($("#id_deposit").val());
            
            if (grandtotal < deposit) {
                alert("Your fund is insufficient");
                 $("#id_button_adddeposit").prop('disabled', false);

            }
            else if(grandtotal > deposit)
            {
                alert("Your fund is more than needed");
                 $("#id_button_adddeposit").prop('disabled', false);
             }
            else {

                document.getElementById("smart-form-register-payment").submit();
                 $("#id_button_adddeposit").prop('disabled', false);
            }
        }


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