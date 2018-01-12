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
                    Material 
                    <span>>  
                        Add Material
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
            <h2>Add Material Form </h2>				

            <span class="jarviswidget-loader"><i class="fa fa-refresh fa-spin"></i></span></header>

        <!-- widget div-->
        <div role="content">

            <!-- widget edit box -->

            <!-- end widget edit box -->

            <!-- widget content -->
            <div class="widget-body ">

                <form role='form' id="smart-form-register" action="<?php echo base_url(); ?>Back/Material/Add_material" class="form-horizontal" novalidate="novalidate" method="post">
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="select-1">Type</label>
                        <div class="col-md-2">
                            <select onchange="change_type();" class="form-control" name="name_type" id="select-1" selected ="select" >
                                <option value="2" >Ordinary</option>
                                <option value="1" >Role</option>
                            </select> 
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Name</label>
                        <div class="col-md-3">
                            <input class="form-control" name="name_name" id="id_name" type="text" value="<?php echo set_value('name_name'); ?>">
                            <span class="col-md-9 text-danger">
                                <?php echo form_error('name_name'); ?>
                            </span>
                        </div>

                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">HPP</label>
                        <div class="col-md-2">
                            <input class="form-control" name="name_hpp"  id="id_hpp" type="number" value="<?php echo set_value('name_hpp'); ?>">
                            <span class="col-md-9 text-danger">
                                <?php echo form_error('name_hpp'); ?>
                            </span>
                        </div>

                    </div>

                    <div class="form-group" id="id_div_pack" hidden>
                        <label class="col-md-2 control-label">Roll</label>
                        <div class="col-md-2">
                            <input class="form-control" name="name_bigstock"  id="id_bigstock" type="number" value="<?php echo set_value('name_bigstock',1); ?>">
                            <span class="col-md-9 text-danger">
                                <?php echo form_error('name_bigstock'); ?>
                            </span>
                        </div>

                    </div>
                    <div class="form-group" id="id_div_amount">
                        <label class="col-md-2 control-label" id="id_label">Amount</label>
                        <div class="col-md-2">
                            <input class="form-control" name="name_amountperpack"  id="id_amountperpack" type="number" value="<?php echo set_value('name_amountperpack'); ?>">
                            <span class="col-md-9 text-danger">
                                <?php echo form_error('name_amountperpack'); ?>
                            </span>
                        </div>

                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Minimum Stock</label>
                        <div class="col-md-2">
                            <input class="form-control" name="name_minimumstock" id="id_minimumstock" type="number" value="<?php echo set_value('name_minimumstock'); ?>">
                            <span class="col-md-9 text-danger">
                                <?php echo form_error('name_minimumstock'); ?>
                            </span>
                        </div>

                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Retail Price</label>
                        <div   class="col-md-2">
                            <input id="id_txt_price_retail" class="form-control" name="name_retailprice" type="number" value="<?php echo set_value('name_retailprice'); ?>">   


                            <span class="col-md-9 text-danger">
                                <?php echo form_error('name_retailprice'); ?>
                            </span>
                        </div>
                        <div   class="col-md-2">
                            <i id="id_button_plus" onclick="show_div_grossir()" style="color:blue;" class="btn glyphicon glyphicon-plus control-label" >Tambah Harga Grosir</i>
                        </div>
                        <!--                        <div  hidden id="id_button_reset"   class="col-md-2">
                                                    <i  onclick="reset_grosir_price()" style="colour:red" class="glyphicon glyphicon-trash control-label" >Reset Grossir Price</i>
                                                </div>-->

                        <div  hidden id="id_button_reset"   class="col-md-2">
                            <i  onclick="reset_grosir_price()" style="colour:red" class="btn glyphicon glyphicon-trash control-label" >Reset Grossir Price</i>
                        </div>


                    </div>
                    <div hidden id="id_div_grossir" class="form-group">
                        <label class="col-md-2 control-label">Grossir Price</label>
                        <div class="col-md-2">
                            <input id="id_input_qty_min" class="form-control"  placeholder="Qty Min" type="number" >
                            <span class="col-md-9 text-danger">

                        </div>
                        <div class="col-md-2">
                            <input id="id_input_qty_max" class="form-control"  placeholder="Qty Max" type="number" >
                            <span class="col-md-9 text-danger">

                            </span>
                        </div>

                        <div class="col-md-2">
                            <input id="id_input_price_grossir" class="form-control"  placeholder="Price" type="number" >
                            <span class="col-md-9 text-danger">

                            </span>
                        </div>
                        <div id="id_button_plus"  class="col-md-2">
                            <i  onclick="add_grossir_price()" style="color:blue;"  class="btn glyphicon glyphicon-plus control-label" >Add Grossir Price</i>
                        </div>


                    </div>

                    <div hidden id="id_table_grossir" class="form-group">
                        <label class="col-md-2 control-label"></label>

                        <div class="col-md-6 table-responsive">
                            <table id="" id="id_table" class="table table-bordered table-striped" >
                                <thead>
                                    <tr >
                                        <th   >Minimal Quantity</th>
                                        <th    >Maximal Quantity</th>
                                        <th   >Price</th>

                                </thead>
                                <tbody id="id_body_table" >	



                                </tbody>
                            </table>
                        </div>




                    </div>








                    <footer>

                        <div class="form-group">
                            <label class="col-md-2 control-label" for="select-1"></label>
                            <div class="col-md-4">
                                <button id="id_button_addmaterial" onclick="check_all_not_null(); " type="button" name="tes" class="btn btn-primary " >Add Material </button>
                                <input  type="hidden" name="button_addmaterial" class="btn btn-primary " value="1">
                                
                            </div>
                        </div>


                    </footer>
                </form>						

            </div>
            <!-- end widget content 

        </div>
            <!-- end widget div -->

        </div>
    </div>
    <!-- END MAIN CONTENT -->

</div>
<script>
var urutan = 1;
var hargakembali= [];
var minqtykembali=[];
var maxqtykembali=[];
$(document).ready(function () {
        <?php
             if (isset($harga)) {
                 for($m = 0; $m<count($harga); $m++){
                ?> 
               // alert("masuk");
                hargakembali.push(<?php echo $harga[$m]; ?>);
                minqtykembali.push(<?php echo $minimum[$m]; ?>);
                maxqtykembali.push(<?php echo $maksimum[$m]; ?>);
                <?php
                                } 
                                
             }
                                ?>
        //alert(hargakembali);
        if (hargakembali != "")
        {
            
           $("#id_div_grossir").show();
            $("#id_table_grossir").show();
            
            for(var m = 0; m< hargakembali.length; m++){
            $("#id_body_table").append(
                    "<tr>" +
                    "<td> <div ><input readonly id='id_txt_qty_min_" + urutan + "' class='form-control' name='name_qty_min[]'  type='number' value='"+minqtykembali[m]+"'></div></td>" +
                    "<td> <div ><input readonly id='id_txt_qty_max_" + urutan + "' class='form-control' name='name_qty_max[]'  type='number' value='"+maxqtykembali[m]+"'></div></td>" +
                    "<td> <div ><input readonly id='id_txt_price_" + urutan + "' class='hitungmaterial form-control' name='name_price[]'  type='number' value='"+hargakembali[m]+"'></div></td>" +
                    "</tr>");



            urutan++;
            }
        }
    });
    
    function change_type()
    {
        if($("#select-1 option:selected").val() == 1)
        {
            $("#id_bigstock").val(1);
            $("#id_div_pack").show();
            $("#id_label").text("Long per Roll");
           
          // $("#id_amountperpack").val(1);
          
            alert($("#id_bigstock").val());
        }
        else if ($("#select-1 option:selected").val() == 2)
        {
            $("#id_bigstock").val(1);
            $("#id_div_pack").hide();
           
            
           $("#id_label").text(" Amount");
           
          
            alert($("#id_bigstock").val());
        
        }
        
    }
    

    function check_all_not_null()
    { $("#id_button_addmaterial").prop('disabled', true);

        if (
                $("#select-1 option:selected").val() == "" ||
                $("#id_name").val() == "" ||
                $("#id_hpp").val() == "" ||
                $("#id_bigstock").val() == "" ||
                $("#id_amountperpack").val() == "" ||
                $("#id_minimumstock").val() == ""


                )

        {
            
            alert( $("#select-1 option:selected").val() +"/"+ $("#id_name").val()  +"/"+$("#id_hpp").val()  +"/"+$("#id_bigstock").val()  +"/"+$("#id_amountperpack").val() +"/"+ $("#id_minimumstock").val())
            alert("Null is not Allowed");
             $("#id_button_addmaterial").prop('disabled', false);

           

        }  else if ($('.hitungmaterial').length == 0)
        {
           
            alert("Register this product's price first / "+$('.hitungmaterial').length );
            $("#id_button_addmaterial").prop('disabled', false);
        } else
        {
            
            
            $("#smart-form-register").submit();
            $("#id_button_addmaterial").prop('disabled', true);
      

           // document.getElementById("smart-form-register").submit();
        }


    }
    function show_div_grossir()
    {
        if (document.getElementById('id_txt_price_retail').value.length > 0 && urutan == 1)
        {
            //   alert(urutan);
            $("#id_div_grossir").show();
            $("#id_table_grossir").show();
            $("#id_txt_price_retail").prop('readonly', true);

            //$("#id_button_plus").onclick("reset_grossir_price()");
            document.getElementById('id_button_plus').setAttribute("onClick", "reset_grossir_price()");
            document.getElementById('id_button_plus').setAttribute("style", "color:red");
            document.getElementById('id_button_plus').setAttribute("class", "btn glyphicon glyphicon-trash control-label");
            document.getElementById('id_button_plus').innerHTML = " Reset grossir price";

            $("#id_body_table").append(
                    "<tr>" +
                    "<td> <div ><input readonly id='id_txt_qty_min_" + urutan + "' class='form-control' name='name_qty_min[]'  type='number' value='1'></div></td>" +
                    "<td> <div ><input readonly id='id_txt_qty_max_" + urutan + "' class='form-control' name='name_qty_max[]'  type='number' value='1'></div></td>" +
                    "<td> <div ><input readonly id='id_txt_price_" + urutan + "' class='hitungmaterial form-control' name='name_price[]'  type='number' value='" + parseInt($("#id_txt_price_retail").val()) + "'></div></td>" +
                    "</tr>");

//                    $("#id_txt_qty_min_1").val(1);
//                    $("#id_txt_qty_max_1").val(1);
//                    $("#id_txt_price_1").val($("#id_txt_price_retail").val());

            urutan++;
            // alert(urutan);
            //  $("#id_button_reset").show();

        } else
        {
            alert("Retail Price can't be Null to add Grossir price");
        }
    }

    function reset_grossir_price()
    {
        $("#id_body_table").empty();

        $("#id_input_qty_max").val("");
        $("#id_input_qty_min").val("");
        $("#id_input_price_grossir").val("");
        $("#id_div_grossir").hide();
        $("#id_table_grossir").hide();
        $("#id_txt_price_retail").prop('readonly', false);
        urutan = 1;

        document.getElementById('id_button_plus').setAttribute("onClick", "show_div_grossir()");
        document.getElementById('id_button_plus').setAttribute("style", "color:blue");
        document.getElementById('id_button_plus').setAttribute("class", "btn glyphicon glyphicon-plus control-label");
        document.getElementById('id_button_plus').innerHTML = "Add Grossir Price";
    }
    function add_grossir_price()
    {

        if (
                document.getElementById('id_input_qty_min').value.length > 0 &&
                document.getElementById('id_input_qty_max').value.length > 0 &&
                document.getElementById('id_input_price_grossir').value.length > 0
                )
        {


            if (parseInt($("#id_input_qty_max").val()) >= parseInt($("#id_input_qty_min").val()))
            {
                if ((urutan > 1 && parseInt(document.getElementById('id_input_qty_min').value) > parseInt(document.getElementById('id_txt_qty_max_' + (urutan - 1).toString()).value)))
                {
                    // alert("min "+$("#id_input_qty_min").val());
                    // alert("max "+$("#id_input_qty_max").val());
                    if (urutan > 1 && parseInt(document.getElementById('id_input_price_grossir').value) <= parseInt(document.getElementById('id_txt_price_' + (urutan - 1).toString()).value))
                    {
                        $("#id_body_table").append(
                                "<tr>" +
                                "<td> <div ><input readonly id='id_txt_qty_min_" + urutan + "' class='form-control' name='name_qty_min[]'  type='number' value='" + $("#id_input_qty_min").val() + "'></div></td>" +
                                "<td> <div ><input readonly id='id_txt_qty_max_" + urutan + "' class='form-control' name='name_qty_max[]'   type='number' value='" + $("#id_input_qty_max").val() + "'></div></td>" +
                                "<td> <div ><input readonly id='id_txt_price_" + urutan + "' class='hitungmaterial form-control' name='name_price[]'  type='number' value='" + $("#id_input_price_grossir").val() + "'></div></td>" +
                                "</tr>");
                        urutan++;
                        // alert("urutan ke " + urutan.toString());
                        $("#id_input_qty_max").val("");
                        $("#id_input_qty_min").val("");
                        $("#id_input_price_grossir").val("");
                    } else
                    {
                        alert("Price Must be cheaper than before")
                        //  alert(document.getElementById('id_input_price_grossir').value);
                        //  alert(document.getElementById('id_txt_price_' + (urutan - 1)).value);
                    }
                } else
                {
                    alert("Minimum Quantity must be higher than previous maximun quantity")
                }
            } else
            {
                // alert($("#id_txt_qty_min").val());
                alert("Maximum quantity must be higher than Minumum quantity!!!!");
            }
        } else
        {
            alert("Nulls are not allowed");
        }
    }
</script>