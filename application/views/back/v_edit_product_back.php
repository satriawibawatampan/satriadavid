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
                        Edit Product
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

        <header role="heading"><div class="jarviswidget-ctrls" role="menu">   <a href="javascript:void(0);" class="button-icon jarviswidget-toggle-btn" rel="tooltip" title="" data-placement="bottom" data-original-title="Collapse"><i class="fa fa-minus "></i></a> <a href="javascript:void(0);" class="button-icon jarviswidget-fullscreen-btn" rel="tooltip" title="" data-placement="bottom" data-original-title="Fullscreen"><i class="fa fa-expand "></i></a> <a href="javascript:void(0);" class="button-icon jarviswidget-delete-btn" rel="tooltip" title="" data-placement="bottom" data-original-title="Delete"><i class="fa fa-times"></i></a></div><div class="widget-toolbar" role="menu"><a data-toggle="dropdown" class="dropdown-toggle color-box selector" href="javascript:void(0);"></a><ul class="dropdown-menu arrow-box-up-right color-select pull-right"><li><span class="bg-color-green" data-widget-setstyle="jarviswidget-color-green" rel="tooltip" data-placement="left" data-original-title="Green Grass"></span></li><li><span class="bg-color-greenDark" data-widget-setstyle="jarviswidget-color-greenDark" rel="tooltip" data-placement="top" data-original-title="Dark Green"></span></li><li><span class="bg-color-greenLight" data-widget-setstyle="jarviswidget-color-greenLight" rel="tooltip" data-placement="top" data-original-title="Light Green"></span></li><li><span class="bg-color-purple" data-widget-setstyle="jarviswidget-color-purple" rel="tooltip" data-placement="top" data-original-title="Purple"></span></li><li><span class="bg-color-magenta" data-widget-setstyle="jarviswidget-color-magenta" rel="tooltip" data-placement="top" data-original-title="Magenta"></span></li><li><span class="bg-color-pink" data-widget-setstyle="jarviswidget-color-pink" rel="tooltip" data-placement="right" data-original-title="Pink"></span></li><li><span class="bg-color-pinkDark" data-widget-setstyle="jarviswidget-color-pinkDark" rel="tooltip" data-placement="left" data-original-title="Fade Pink"></span></li><li><span class="bg-color-blueLight" data-widget-setstyle="jarviswidget-color-blueLight" rel="tooltip" data-placement="top" data-original-title="Light Blue"></span></li><li><span class="bg-color-teal" data-widget-setstyle="jarviswidget-color-teal" rel="tooltip" data-placement="top" data-original-title="Teal"></span></li><li><span class="bg-color-blue" data-widget-setstyle="jarviswidget-color-blue" rel="tooltip" data-placement="top" data-original-title="Ocean Blue"></span></li><li><span class="bg-color-blueDark" data-widget-setstyle="jarviswidget-color-blueDark" rel="tooltip" data-placement="top" data-original-title="Night Sky"></span></li><li><span class="bg-color-darken" data-widget-setstyle="jarviswidget-color-darken" rel="tooltip" data-placement="right" data-original-title="Night"></span></li><li><span class="bg-color-yellow" data-widget-setstyle="jarviswidget-color-yellow" rel="tooltip" data-placement="left" data-original-title="Day Light"></span></li><li><span class="bg-color-orange" data-widget-setstyle="jarviswidget-color-orange" rel="tooltip" data-placement="bottom" data-original-title="Orange"></span></li><li><span class="bg-color-orangeDark" data-widget-setstyle="jarviswidget-color-orangeDark" rel="tooltip" data-placement="bottom" data-original-title="Dark Orange"></span></li><li><span class="bg-color-red" data-widget-setstyle="jarviswidget-color-red" rel="tooltip" data-placement="bottom" data-original-title="Red Rose"></span></li><li><span class="bg-color-redLight" data-widget-setstyle="jarviswidget-color-redLight" rel="tooltip" data-placement="bottom" data-original-title="Light Red"></span></li><li><span class="bg-color-white" data-widget-setstyle="jarviswidget-color-white" rel="tooltip" data-placement="right" data-original-title="Purity"></span></li><li><a href="javascript:void(0);" class="jarviswidget-remove-colors" data-widget-setstyle="" rel="tooltip" data-placement="bottom" data-original-title="Reset widget color to default">Remove</a></li></ul></div>
            <span class="widget-icon"> <i class="fa fa-edit"></i> </span>
            <h2>Edit Material Form </h2>				

            <span class="jarviswidget-loader"><i class="fa fa-refresh fa-spin"></i></span></header>

        <!-- widget div-->
        <div role="content">


            <div class="widget-body ">

                <form role='form' id="smart-form-register" action="<?php echo base_url(); ?>Back/Product/Edit_product" class="form-horizontal" novalidate="novalidate" method="post">
                    <input required  class="form-control" name="name_editidproduct" placeholder="HPP" type="hidden" value="<?php echo set_value('name_editidproduct', $dataproduct->id); ?>" />

                    <div class="form-group">
                        <label class="col-md-2 control-label" for="select-1">Category</label>
                        <div class="col-md-2">
                            <select class="form-control" name="name_editcategory" id="select-1" selected ="select" >
                                <?php
                                foreach ($listkategori as $item) {
                                    if ($item->id == $dataproduct->id_kategori) {
                                        ?>
                                        <option value="<?php echo $item->id; ?>" selected="select" ><?php echo $item->nama; ?></option>
                                        <?php
                                    } else {
                                        ?>
                                        <option value="<?php echo $item->id; ?>" ><?php echo $item->nama; ?></option>
                                        <?php
                                    }
                                }
                                ?>
                            </select> 
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Name</label>
                        <div class="col-md-3">
                            <input id="id_txt_name_product" class="form-control" name="name_editname" placeholder="Name" type="text" value="<?php echo set_value('name_editname', $dataproduct->nama); ?>">
                            <span class="col-md-9 text-danger">
                                <?php echo form_error('name_editname'); ?>
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
                            <input class="form-control" name="name_quantity_material"  id="id_quantity_material" placeholder="Quantity" type="number" min="0" value="<?php echo set_value('name_quantity_material'); ?>">
                            <span class="col-md-9 text-danger">
                                <?php echo form_error('name_quantity_material'); ?>
                            </span>
                        </div>

                        <div   class="col-md-2">
                            <i id="id_button_plus_material" onclick="add_material()" style="color:blue;" class="glyphicon glyphicon-plus control-label" >Add Material</i>
                        </div>
                    </div>

                    <div  id="id_table_material" class="form-group">
                        <label class="col-md-2 control-label"></label>

                        <div class="col-md-6">
                            <table id="id_body_table_material" >
                                <thead>
                                    <tr >
                                        <th   >Material</th>
                                        <th    >Quantity</th>

                                </thead>
                                <tbody id="id_body_table_material" >
                                    <?php
                                    $urutanmaterial = 0;
                                    foreach ($dataproductmaterial as $productmaterial) {
                                        $urutanmaterial += 1;
                                        ?>
                                        <tr id='tr_<?php echo $urutanmaterial; ?>'>
                                            <td><div><input readonly id='id_txt_material_<?php echo $urutanmaterial; ?>'class='form-control' name='name_txt_material[]' placeholder='Qty Min' type='text' value='<?php echo $productmaterial->namamaterial; ?>'></div></td>
                                            <td><div><input readonly id='id_txt_jumlah_<?php echo $urutanmaterial; ?>'class='form-control' name='name_txt_jumlah[]' placeholder='Qty Min' type='number' value='<?php echo $productmaterial->jumlah; ?>'></div></td>
                                            <td><div><input readonly id='id_txt_id_material_<?php echo $urutanmaterial; ?>'class='form-control hitung' name='name_txt_idmaterial[]' placeholder='Qty Min' type='number' value='<?php echo $productmaterial->id_material; ?>'></div></td>
                                            <td> <div ><i  onclick='remove_material_tr(<?php echo $urutanmaterial; ?>)' style='colour:red;' class='glyphicon glyphicon-remove ' ></i></div></td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>




                    </div>
                    <!-------------------------------------------------------------------------------------------------------------------->
                    <div class="form-group">
                        <label class="col-md-2 control-label">Retail Price</label>
                        <div   class="col-md-2">
                            <input readonly="true" id="id_txt_price_retail" class="form-control" name="name_retailprice" placeholder="Price" type="number" min="0"  value="<?php echo set_value('name_retailprice'); ?>">   


                            <span class="col-md-9 text-danger">
                                <?php echo form_error('name_retailprice'); ?>
                            </span>
                        </div>
                        <div  hidden id='id_div_button_plus' class="col-md-2">
                            <i id="id_button_plus" onclick="show_div_grossir()" style="color:blue;" class="glyphicon glyphicon-plus control-label" >Add Grossir Price</i>
                        </div>


                        <div   id="id_button_reset"   class="col-md-2">
                            <i  onclick="reset_grossir_price()" style="colour:red" class="glyphicon glyphicon-trash control-label" >Reset Grossir Price</i>
                        </div>


                    </div>
                    <div  id="id_div_grossir" class="form-group">
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
                            <i  onclick="add_grossir_price()" style="color:blue;"  class="glyphicon glyphicon-plus control-label" >Add Grossir Price</i>
                        </div>


                    </div>

                    <div  id="id_table_grossir" class="form-group">
                        <label class="col-md-2 control-label"></label>

                        <div class="col-md-6">
                            <table id="" >
                                <thead>
                                    <tr >
                                        <th   >Minimal Quantity</th>
                                        <th    >Maximal Quantity</th>
                                        <th   >Price</th>

                                </thead>
                                <tbody id="id_body_table" >	
                                    <?php
                                    $urutan = 1;
                                    foreach ($dataharga as $datahargax) {
                                        ?>
                                        <tr>
                                            <td> <div ><input readonly id='id_txt_qty_min_<?php echo $urutan; ?>' class='form-control' name='name_qty_min[]' placeholder='Qty Min' type='number' value='<?php echo $datahargax->batasbawah; ?>'></div></td>
                                            <td> <div ><input readonly id='id_txt_qty_max_<?php echo $urutan; ?>' class='form-control' name='name_qty_max[]' placeholder='Qty Max' type='number' value='<?php echo $datahargax->batasatas; ?>'></div></td>
                                            <td> <div ><input  readonly id='id_txt_price_<?php echo $urutan; ?>' class='form-control hitungmaterial' name='name_price[]' placeholder='Price' type='number' value='<?php echo $datahargax->hargajual; ?>'></div></td>
                                        </tr>
                                        <?php
                                        $urutan += 1;
                                    }
                                    ?>   

                                </tbody>
                            </table>
                        </div>
                    </div>

                    <footer>

                        <div class="form-group">
                            <label class="col-md-2 control-label" for="select-1"></label>
                            <div class="col-md-4">
                                <input onclick='check_all_not_null()'  name="button_editproduct" class="btn btn-primary " value="Edit Product">
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

<script>

    function check_all_not_null()
    {
        if (
                $("#select-1 option:selected").val() == "" ||
                $("#id_txt_name_product").val() == ""


                )

        {
            $("form").submit(function (e) {
                e.preventDefault();
            });
            alert("Null is not Allowed");
        } else if ($('.hitung').length == 0)
        {
           

            $("form").submit(function (e) {
                e.preventDefault();
            });
            alert("Register this product's material first");
        } else if ($('.hitungmaterial').length == 0)
        {
             alert("a");
            $("form").submit(function (e) {
                e.preventDefault();
            });
            alert("Register this product's price first");
        }
        else
        {
        
            document.getElementById("smart-form-register").submit();
        }

    }
    var urutan = <?php echo $urutan; ?>;
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
            document.getElementById('id_button_plus').setAttribute("class", "glyphicon glyphicon-trash control-label");
            document.getElementById('id_button_plus').innerHTML = " Reset grossir price";

            $("#id_body_table").append(
                    "<tr>" +
                    "<td> <div ><input readonly id='id_txt_qty_min_" + urutan + "' class='form-control' name='name_qty_min[]' placeholder='Qty Min' type='number' value='1'></div></td>" +
                    "<td> <div ><input readonly id='id_txt_qty_max_" + urutan + "' class='form-control' name='name_qty_max[]' placeholder='Qty Max' type='number' value='1'></div></td>" +
                    "<td> <div ><input readonly id='id_txt_price_" + urutan + "' class='form-control' name='name_price[]' placeholder='Price' type='number' value='" + parseInt($("#id_txt_price_retail").val()) + "'></div></td>" +
                    "</tr>");

//                    $("#id_txt_qty_min_1").val(1);
//                    $("#id_txt_qty_max_1").val(1);
//                    $("#id_txt_price_1").val($("#id_txt_price_retail").val());

            urutan++;
            alert(urutan);
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
        $("#id_div_button_plus").show();
        $("#id_button_reset").hide();

        urutan = 1;

        document.getElementById('id_button_plus').setAttribute("onClick", "show_div_grossir()");
        document.getElementById('id_button_plus').setAttribute("style", "color:blue");
        document.getElementById('id_button_plus').setAttribute("class", "glyphicon glyphicon-plus control-label");
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
                        alert(document.getElementById('id_input_price_grossir').value);
                        alert(document.getElementById('id_txt_price_' + (urutan - 1)).value);
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

    var urutanmaterial = <?php echo $urutanmaterial; ?>;


    function add_material()
    {
        alert(urutanmaterial);
        if (document.getElementById('id_quantity_material').value.length > 0 &&
                $("#id_name_material option:selected").val() > 0
                )
        {
            var checkingadamaterialsama = this.check_material();
            //alert("checking " + checkingadamaterialsama);
            if (checkingadamaterialsama == null || checkingadamaterialsama === 'undifined' || checkingadamaterialsama != 0)
            {
                urutanmaterial++;
                // alert($("#id_name_material option:selected").text());
                $("#id_table_material").show();
                $("#id_body_table_material").append(
                        "<tr id='tr_" + urutanmaterial + "'>" +
                        "<td> <div ><input readonly id='id_txt_material_" + urutanmaterial + "' class='form-control' name='name_txt_material[]' placeholder='Qty Min' type='text' value='" + $("#id_name_material option:selected").text() + "'></div></td>" +
                        "<td> <div ><input readonly id='id_txt_jumlah_" + urutanmaterial + "' class='form-control' name='name_txt_jumlah[]' placeholder='Qty Max' type='number' value='" + $("#id_quantity_material").val() + "'></div></td>" +
                        "<td ><input readonly id='id_txt_id_material_" + urutanmaterial + "' class='form-control hitung' name='name_txt_idmaterial[]' placeholder='Qty Max' type='text' value='" + $("#id_name_material option:selected").val() + "'></td>" +
                        "<td> <div ><i  onclick='remove_material_tr(" + urutanmaterial + ")' style='colour:red;' class='glyphicon glyphicon-remove ' ></i></div></td>" +
                        "</tr>");

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

        var id = event.target.id;
        var counterwhile = 1;
        while (numItems > 0)

        {
            alert(numItems);
            alert($("#id_name_material option:selected").val() + "/" + $("#id_txt_id_material_" + counterwhile).val());
            // jika yang dipilih ada di id-text_id_material(table)
            if ($("#id_name_material option:selected").val() == $("#id_txt_id_material_" + counterwhile).val())
            {
                counterwhile = 1;
                //kembalikan 0 untuk alert dari fungsi sebelumnya
                return 0;
                break;
            }
            if ($("#id_txt_id_material_" + counterwhile).length > 0)
            {
                alert("masuk if");
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



</script>

</div>
