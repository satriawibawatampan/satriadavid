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
                    Product 
                    <span>>  
                        Add product
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
            <h2>Add product Form </h2>				

            <span class="jarviswidget-loader"><i class="fa fa-refresh fa-spin"></i></span></header>

        <!-- widget div-->
        <div role="content">


            <div class="widget-body ">

                <form role='form' id="smart-form-register" action="<?php echo base_url(); ?>Back/Product/Add_product" class="form-horizontal" novalidate="novalidate" method="post">
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="select-1">Category</label>
                        <div class="col-md-2">
                            <select class="form-control" name="name_category" id="select-1" selected ="select" >
                                <?php foreach ($listkategori as $item) { ?>

                                    <option value="<?php echo $item->id; ?>" <?php echo set_select("name_category", $item->id); ?>  ><?php echo $item->nama; ?></option>

                                <?php } ?>
                            </select> 
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Name</label>
                        <div class="col-md-3">
                            <input id="id_txt_name_product" class="form-control" name="name_name" type="text" value="<?php echo set_value('name_name'); ?>">
                            <span class="col-md-9 text-danger">
                                <?php echo form_error('name_name'); ?>
                            </span>
                        </div>

                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Materials</label>
                        <div   class="col-md-2">
                            <select class="form-control" name="name_material" id="id_name_material" selected ="select" >
                                <option value="0" >Please Select 1</option>
                                <?php foreach ($listmaterial as $itemmaterial) { ?>

                                    <option value="<?php echo $itemmaterial->id; ?>" ><?php echo $itemmaterial->nama; ?></option>

                                <?php } ?>
                            </select> 
                        </div>
                        <div   class="col-md-2">
                            <input class="form-control" name="name_quantity_material"  id="id_quantity_material" placeholder="Quantity" min="0" type="number" min="0" value="<?php echo set_value('name_quantity_material'); ?>">
                            <span class="col-md-9 text-danger">
                                <?php echo form_error('name_quantity_material'); ?>
                            </span>
                        </div>

                        <div   class="col-md-2">
                            <i id="id_button_plus_material" onclick="add_material()" style="color:blue;" class="btn glyphicon glyphicon-plus control-label" >Add Material</i>
                        </div>

                        <div  hidden id="id_button_reset"   class="col-md-2">
                            <i  onclick="reset_material()" style="colour:red" class="btn glyphicon glyphicon-trash control-label" >Reset Grossir Price</i>
                        </div>


                    </div>

                    <div hidden id="id_table_material" class="form-group">
                        <label class="col-md-2 control-label"></label>

                        <div class="col-md-6 table-responsive">
                            <table id="id_body_table_material" class="table table-bordered table-striped" >
                                <thead>
                                    <tr >
                                        <th   >Material</th>
                                        <th    >Quantity</th>
                                        <th    >X</th>

                                </thead>
                                <tbody id="id_body_table_material" >	


                                </tbody>
                            </table>
                        </div>




                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Retail Price</label>
                        <div   class="col-md-2">
                            <input id="id_txt_price_retail" class="form-control" name="name_retailprice" type="number" min="0"  value="<?php echo set_value('name_retailprice'); ?>">   


                            <span class="col-md-9 text-danger">
                                <?php echo form_error('name_retailprice'); ?>
                            </span>
                        </div>
                        <div   class="col-md-2">
                            <i id="id_button_plus" onclick="show_div_grossir()" style="color:blue;" class="btn glyphicon glyphicon-plus control-label" >Add Grossir Price</i>
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
                            <input id="id_input_qty_min" class="form-control"  placeholder="Qty Min" type="number" min="0" >
                            <span class="col-md-9 text-danger">

                        </div>
                        <div class="col-md-2">
                            <input id="id_input_qty_max" class="form-control"  placeholder="Qty Max" type="number" min="0" >
                            <span class="col-md-9 text-danger">

                            </span>
                        </div>

                        <div class="col-md-2">
                            <input id="id_input_price_grossir" class="form-control"  placeholder="Price" type="number" min="0">
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
                            <table id="" class="table table-bordered table-striped" >
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
                                <input onclick="check_all_not_null();" id="id_button_addproduct" type="button"  name="tes" class="btn btn-primary " value="Add Product">
                                <input  type="hidden"  name="button_addproduct" class="btn btn-primary " value="12">
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
    var urutan = 1;
      var urutanmaterial = 1;
    
    var hargakembali= [];
    var minqtykembali=[];
    var maxqtykembali=[];
    
    var matid =[];
    var matnama = [];
    var matqty = [];
    
    $(document).ready(function () {
        <?php
             if (isset($harga)) {
                 for($m = 0; $m<count($harga); $m++){
                ?> 
            
                hargakembali.push(<?php echo $harga[$m]; ?>);
                minqtykembali.push(<?php echo (string)$minimum[$m]; ?>);
                maxqtykembali.push(<?php echo $maksimum[$m]; ?>);
                <?php
                                } 
                                
             }
             
             if (isset($matid)) {
                 for($m = 0; $m<count($matid); $m++){
                ?> 
             
                matid.push(<?php echo $matid[$m]; ?>);
                matnama.push("<?php echo $matnama[$m]; ?>");
                matqty.push(<?php echo $matqty[$m]; ?>);
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
            
            $("#id_table_material").show();
            
            for(var m = 0; m< matid.length; m++){
                $("#id_body_table_material").append(
                        "<tr id='tr_" + urutanmaterial + "'>" +
                        "<td> <div ><input readonly id='id_txt_material_" + urutanmaterial + "' class='form-control' name='name_txt_material[]' placeholder='Qty Min' type='text' value='"+matnama[m]+"'></div></td>" +
                        "<td> <div ><input readonly id='id_txt_jumlah_" + urutanmaterial + "' class='form-control' name='name_txt_jumlah[]' placeholder='Qty Max' type='number' value='"+matqty[m]+"'></div></td>" +
                        "<td> <div ><i  onclick='remove_material_tr(" + urutanmaterial + ")' style='colour:red;' class='btn glyphicon glyphicon-remove ' ></i></div></td>" +
                        "<td hidden ><input  id='id_txt_id_material_" + urutanmaterial + "' class='form-control hitung' name='name_txt_idmaterial[]' placeholder='Qty Max' type='hidden' value='"+matid[m]+"'></td>" +
                        "</tr>");
                urutanmaterial++;
            }
                
                checkingadamaterialsama = 1;
        }
    });
    
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
                    "<td> <div ><input readonly id='id_txt_qty_min_" + urutan + "' class='form-control' name='name_qty_min[]' placeholder='Qty Min' type='number' value='1'></div></td>" +
                    "<td> <div ><input readonly id='id_txt_qty_max_" + urutan + "' class='form-control' name='name_qty_max[]' placeholder='Qty Max' type='number' value='1'></div></td>" +
                    "<td> <div ><input readonly id='id_txt_price_" + urutan + "' class='form-control hitungmaterial' name='name_price[]' placeholder='Price' type='number' value='" + parseInt($("#id_txt_price_retail").val()) + "'></div></td>" +
                    "</tr>");

//                    $("#id_txt_qty_min_1").val(1);
//                    $("#id_txt_qty_max_1").val(1);
//                    $("#id_txt_price_1").val($("#id_txt_price_retail").val());

            urutan++;
            //alert(urutan);
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
                                "<td> <div ><input readonly id='id_txt_qty_min_" + urutan + "' class='form-control' name='name_qty_min[]' placeholder='Qty Min' type='number' value='" + $("#id_input_qty_min").val() + "'></div></td>" +
                                "<td> <div ><input readonly id='id_txt_qty_max_" + urutan + "' class='form-control' name='name_qty_max[]' placeholder='Qty Max' type='number' value='" + $("#id_input_qty_max").val() + "'></div></td>" +
                                "<td> <div ><input  readonly id='id_txt_price_" + urutan + "' class='form-control hitungmaterial' name='name_price[]' placeholder='Price' type='number' value='" + $("#id_input_price_grossir").val() + "'></div></td>" +
                                "</tr>");
                        urutan++;
                        alert("urutan ke " + urutan.toString());
                        $("#id_input_qty_max").val("");
                        $("#id_input_qty_min").val("");
                        $("#id_input_price_grossir").val("");
                    } else
                    {
                        alert("Price Must be cheaper than before")
                       // alert(document.getElementById('id_input_price_grossir').value);
                        //alert(document.getElementById('id_txt_price_' + (urutan - 1)).value);
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
            alert("Nulls in field grossir price are not allowed");
        }
    }

  


    function add_material()
    {

        if (document.getElementById('id_quantity_material').value.length > 0 &&
                $("#id_name_material option:selected").val() > 0
                )
        {
            var checkingadamaterialsama = this.check_material();
            //alert("checking " + checkingadamaterialsama);
            if (checkingadamaterialsama == null || checkingadamaterialsama === 'undifined' || checkingadamaterialsama != 0)
            {
                // alert($("#id_name_material option:selected").text());
                $("#id_table_material").show();
                $("#id_body_table_material").append(
                        "<tr id='tr_" + urutanmaterial + "'>" +
                        "<td> <div ><input readonly id='id_txt_material_" + urutanmaterial + "' class='form-control' name='name_txt_material[]' placeholder='Qty Min' type='text' value='" + $("#id_name_material option:selected").text() + "'></div></td>" +
                        "<td> <div ><input readonly id='id_txt_jumlah_" + urutanmaterial + "' class='form-control' name='name_txt_jumlah[]' placeholder='Qty Max' type='number' value='" + $("#id_quantity_material").val() + "'></div></td>" +
                        "<td> <div ><i  onclick='remove_material_tr(" + urutanmaterial + ")' style='colour:red;' class='btn glyphicon glyphicon-remove ' ></i></div></td>" +
                        "<td hidden ><input  id='id_txt_id_material_" + urutanmaterial + "' class='form-control hitung' name='name_txt_idmaterial[]' placeholder='Qty Max' type='hidden' value='" + $("#id_name_material option:selected").val() + "'></td>" +
                        "</tr>");
                urutanmaterial++;
                checkingadamaterialsama = 1; // bikin agar isa kebaca lagi
                //alert("urutan ke " + urutan.toString());
                $("#id_quantity_material").val("");
            } else
            {
                alert("havebeen registerd");
            }
        } else
        {
            alert("Nulls in field Materials are not allowed");
        }
    }

    function check_material()
    {
        var numItems = $('.hitung').length;

       // var id = event.target.id;
        var counterwhile = 1;
        while (numItems > 0)
        {   // jika yang dipilih ada di id-text_id_material(table)
            if ($("#id_name_material option:selected").val() == $("#id_txt_id_material_" + counterwhile).val())
            {
                counterwhile = 1;
                //kembalikan 0 untuk alert dari fungsi sebelumnya
                return 0;
                break;
            }
            if ($("#id_txt_id_material_" + counterwhile).length > 0)
            {
                numItems--;
            }
            counterwhile++;

        }
        return 1;

    }
    function remove_material_tr(y)
    {
        //alert($("#tr_" + y).prop("id"));
        $("#tr_" + y).remove();

        if ($('.hitung').length == 0)
        {
            $("#id_table_material").hide();
        }
    }

    function check_all_not_null()
    {
    $("#id_button_addproduct").prop('disabled', true);
        if (
                $("#select-1 option:selected").val() == "" ||
                $("#id_txt_name_product").val() == ""


                )

        {
            alert("Null is not Allowed");
$("#id_button_addproduct").prop('disabled', false);
           

        } else if ($('.hitung').length == 0)
        {
            
            alert("Register this product's material first");
            $("#id_button_addproduct").prop('disabled', false);

        } else if ($('.hitungmaterial').length == 0)
        {
           
            alert("Register this product's price first / "+$('.hitungmaterial').length );
            $("#id_button_addproduct").prop('disabled', false);

        } else
        {
             $("#id_button_addproduct").prop('disabled', false);
      

            $("#smart-form-register").submit();
            $("#id_button_addproduct").prop('disabled', true);
      

           // document.getElementById("smart-form-register").submit();
        }


    }

</script>