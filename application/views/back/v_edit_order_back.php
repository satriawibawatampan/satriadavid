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
                    Order 
                    <span>>  
                        Edit Order
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
            <h2>Edit Order Note Form </h2>				

            <span class="jarviswidget-loader"><i class="fa fa-refresh fa-spin"></i></span></header>

        <!-- widget div-->
        <div role="content">


            <div class="widget-body ">

                <form role='form' id="smart-form-register" action="<?php echo base_url(); ?>Back/Order/Edit_Order_Note" class="form-horizontal" novalidate="novalidate" method="post">
                    <input required  class="form-control" name="name_editidorder" placeholder="HPP" type="text" value="<?php echo set_value('name_editidorder', $dataorder[0]->id); ?>" />

                    <div class="form-group">
                        <label class="col-md-2 control-label" for="select-1">Member</label>
                        <div class="col-md-2">
                            <select class="form-control" name="name_member" id="id_member" selected ="select" >


                                <?php
                                foreach ($listmember as $itemmember) {
                                    if ($itemmember->id == $dataorder[0]->id_member) {
                                        ?>

                                        <option value="<?php echo $itemmember->id; ?>" selected="select"  ><?php echo $itemmember->nama; ?></option>

                                        <?php
                                    } else {
                                        ?>
                                        <option value="<?php echo $itemmember->id; ?>" ><?php echo $itemmember->nama; ?></option>
                                        <?php
                                    }
                                }
                                ?>
                            </select> 
                        </div>
                        <div class="col-md-4">
                            <span></span>
                        </div>
                    </div>

                    <script>


                        function update_grandtotal()
                        {
                            var numItem = $('.hitung').length;

                            var grandtotal = 0;
                            var id = event.target.id;
                            var counterwhile = 1;
                            while (numItem > 0)
                            {   // jika yang dipilih ada di id-text_id_material_product(table)

                                if ($("#id_txt_subtotal_product_" + counterwhile).length > 0)
                                {
                                    //  alert(numItem);
                                    grandtotal += parseFloat($("#id_txt_subtotal_product_" + counterwhile).val());
                                    numItem--;
                                }
                                counterwhile++;

                            }

                            $("#id_grandtotal").val(grandtotal);
                        }


                        function update_total_discount()
                        {
                            var numItem = $('.hitung').length;

                            var totaldiskon = 0;
                            var id = event.target.id;
                            var counterwhile = 1;
                            while (numItem > 0)
                            {   // jika yang dipilih ada di id-text_id_material_product(table)

                                if ($("#id_txt_subtotal_product_" + counterwhile).length > 0)
                                {
                                    // alert(numItem);
                                    totaldiskon += parseFloat($("#id_txt_diskon_product_" + counterwhile).val()) / 100 * parseFloat($("#id_txt_jumlah_product_" + counterwhile).val()) * parseFloat($("#id_txt_harga_product_" + counterwhile).val());
                                    numItem--;
                                }
                                counterwhile++;

                            }

                            $("#id_total_discount").val(totaldiskon);
                        }

                        function get_price(idproduk,counter)
                        { //alert("idproduk");
                            $("#tablebodyprice").empty();
                            //var idkategori = $("#id_category").val();

                            var qty = parseInt($("#id_txt_jumlah_product_"+counter).val());
                            // alert(qty);
                            $("#id_unitprice").empty();
                            var kategoris = <?php echo json_encode($listkategori); ?>;
                            for (x = 0; x < kategoris.length; x++) {


                                for (y = 0; y < kategoris[x]['product'].length; y++) {
                                    if (kategoris[x]['product'][y]['id'] == idproduk) {


                                        for (z = 0; z < kategoris[x]['product'][y]['harga'].length; z++) {
                                            //alert($("#id_quantity").val());
                                            if ($("#id_quantity").val().length == 0)
                                            {
                                                // alert("null");
                                                $("#id_unitprice").val(0);
                                                $("#id_quantity").val();

                                            } else if (qty >= kategoris[x]['product'][y]['harga'][z]['batasbawah'] && qty <= kategoris[x]['product'][y]['harga'][z]['batasatas']) {
                                                $("#id_unitprice").val(kategoris[x]['product'][y]['harga'][z]['hargajual']);
                                                // alert("masuk1");
                                                // break;
                                            } else if (qty >= kategoris[x]['product'][y]['harga'][z]['batasbawah'] && qty >= kategoris[x]['product'][y]['harga'][z]['batasatas'] && z == (kategoris[x]['product'][y]['harga'].length) - 1)
                                            {
                                                // alert('masik');
                                                $("#id_unitprice").val(kategoris[x]['product'][y]['harga'][z]['hargajual']);
                                                // break;
                                            } else if (qty > kategoris[x]['product'][y]['harga'][z]['batasatas'] && qty < kategoris[x]['product'][y]['harga'][z + 1]['batasbawah'] && z != (kategoris[x]['product'][y]['harga'].length) - 1) {
                                                //kalau quantitya elbih beasr dari batas atas dan lebih kecil dari batasbawah nya z+1
                                                $("#id_unitprice").val(kategoris[x]['product'][y]['harga'][z]['hargajual']);
                                                //   alert(z + "/masuk2/" + qty + "/" + kategoris[x]['product'][y]['harga'][z + 1]['batasbawah']);
                                                //  break;
                                            }

                                            $("#tablebodyprice").append(
                                                    "<tr >" +
                                                    "<td>" + kategoris[x]['product'][y]['harga'][z]['batasbawah'] + "</td>" +
                                                    "<td>" + kategoris[x]['product'][y]['harga'][z]['batasatas'] + "</td>" +
                                                    "<td>" + kategoris[x]['product'][y]['harga'][z]['hargajual'] + "</td>" +
                                                    "</tr>");
                                            // alert("a");


                                        }
                                    }
                                }

                            }
                        }

                        function edit_detailmaterial(idproduk, counter)
                        {
                            var b = document.getElementById('id_txt_jumlah_product_' + counter).value;
                            var c = $('#id_txt_jumlah_product_' + counter).length;
                            if (
                                    document.getElementById('id_txt_jumlah_product_' + counter).value > 0 &&
                                    $('#id_txt_jumlah_product_' + counter).length > 0
                                    )
                            {
                                var selisih = parseFloat($("#id_txt_jumlah_product_" + counter).val()) - parseFloat($("#id_txt_jumlah_product2_" + counter).val())


                                if ($("#id_txt_jumlah_product_" + counter).val() > $("#id_txt_jumlah_product2_" + counter).val())
                                {

                                    check_material_availability($("#id_txt_id_product_" + counter).val(), selisih, counter);

                                }
                            } else
                            {
                                alert("0 quantity is not allowed. Just press the X button to delete.");
                                $("#id_txt_jumlah_product_" + counter).val($("#id_txt_jumlah_product2_" + counter).val());
                            }


                        }

                        function check_material_availability($idproduk, $qty,counter)
                        {
                            $qtys = parseFloat($qty);
                            detailmaterial = [];
                            produk_material = [];

                            var tampungall = [];

                            alert("idproduk " + $idproduk + " / quantity " + $qty);
                            $.ajax({
                                type: "POST",
                                url: "<?php echo base_url(); ?>" + "Back/Material/Json_get_detail_material_array/" + $idproduk,
                                dataType: "json",
                                success: function (result) {
                                    detailmaterial = result;
                                     alert("a");

                                    $.ajax({
                                        type: "POST",
                                        url: "<?php echo base_url(); ?>" + "Back/Product/Json_get_material_array/" + $idproduk,
                                        dataType: "json",
                                        success: function (result) {

                                            produk_material = result;
                                              alert("ab");

                                            var tampung = [];

                                            var needed = [];
                                            var neededtipe1 = [];
                                            for (a = 0; a < produk_material.length; a++)
                                            {



                                                needed[a] = produk_material[a]['jumlahmaterial'] * $qtys;
                                                neededtipe1[a] = $qtys;

                                                for (b = 0; b < detailmaterial.length; b++)
                                                {
                                                    if (produk_material[a]['idmaterial'] == detailmaterial[b]['id_material'])
                                                    {
                                                        if (detailmaterial[b]['tipe'] == 2)
                                                        {
                                                            neededtipe1[a] = 0;

                                                            if (needed[a] <= detailmaterial[b]['stok'] && detailmaterial[b]['stok'] > 0)
                                                            {

                                                                tampung.push({"id": detailmaterial[b]['id'], "stok": needed[a], "idproduk": $idproduk.toString()});
                                                                tampungall.push({"id": detailmaterial[b]['id'], "stok": needed[a], "idproduk": $idproduk.toString()});
                                                                detailmaterial[b]['stok'] = detailmaterial[b]['stok'] -  needed[a];
                                                                needed[a] = 0;
                                                                break;

                                                            } else if (needed[a] > detailmaterial[b]['stok'] && detailmaterial[b]['stok'] > 0)
                                                            {

                                                                tampung.push({"id": detailmaterial[b]['id'], "stok": produk_material[a]['jumlahmaterial'], "idproduk": $idproduk.toString()});
                                                                tampungall.push({"id": detailmaterial[b]['id'], "stok": produk_material[a]['jumlahmaterial'], "idproduk": $idproduk.toString()});
                                                                //'<%Session["UserName"] = "' + tampungall + '"; %>';
                                                                // alert('<%=Session["UserName"] %>');
                                                               // var neededsementara = needed[a];
                                                                needed[a] = needed[a] - detailmaterial[b]['stok'];
                                                                detailmaterial[b]['stok'] = 0;
                                                            }

                                                        } else if (detailmaterial[b]['tipe'] == 1 && neededtipe1 > 0)
                                                        {
                                                            needed[a] = 0;


                                                            if (detailmaterial[b]['stok'] < produk_material[a]['jumlahmaterial'])
                                                            {


                                                            } else if (detailmaterial[b]['stok'] >= produk_material[a]['jumlahmaterial'])
                                                            {
                                                                //kurangi detailmaterial
                                                                detailmaterial[b]['stok'] = detailmaterial[b]['stok'] - produk_material[a]['jumlahmaterial'];
                                                                tampung.push({"id": detailmaterial[b]['id'], "stok": produk_material[a]['jumlahmaterial'], "idproduk": $idproduk.toString()});
                                                                tampungall.push({"id": detailmaterial[b]['id'], "stok": produk_material[a]['jumlahmaterial'], "idproduk": $idproduk.toString()});
                                                                neededtipe1--;



                                                            }

                                                        }

                                                    }

                                                }



                                            }

                                            var bolehtambah = true;
                                            for ($y = 0; $y < needed.length; $y++)
                                            {
                                                if (needed[$y] > 0)
                                                {
                                                   // remove_product_tr(urutanproduct - 1);
                                                    alert("Not Enough Stock");
                                                    bolehtambah = false;
                                                    break;
                                                }
                                            }
                                            for ($w = 0; $w < neededtipe1.length; $w++)
                                            {
                                                if (neededtipe1[$w] > 0)
                                                {
                                                    alert("Not Enough Stock");
                                                    bolehtambah = false;
                                                    break;
                                                }
                                            }

                                            if (bolehtambah == false) {

                                                for (var q = 0; q < tampungall.length; q++)
                                                {
                                                    if (tampungall[q]['idproduk'] == $idproduk)
                                                    {
                                                        //
                                                        //ini hapus tampungall karena sudah di cancel. dijadikan -1 agar tidak kebaca di if.                    
                                                        tampungall[q]['idproduk'] = -1;

                                                    }
                                                }
                                                
                                                alert("Not Enough Stock");
                                                $("#id_txt_jumlah_product_"+counter).val($("#id_txt_jumlah_product2_"+counter).val())


                                            } else if (bolehtambah == true)
                                            {
                                                var y = JSON.stringify(tampung);
                                                $.ajax({
                                                    type: "POST",
                                                    url: "<?php echo base_url(); ?>" + "Back/Material/Reduce_material_quantity",

                                                    data: {
                                                        data: tampung
//                                                        data: JSON.stringify(tampungall)
                                                    },
                                                    success: function (result) {
                                                        alert("hore sukses" + result);

                                                    },
                                                    error: function (XMLHttpRequest, textStatus, errorThrown) {
                                                        alert("Status: " + textStatus);
                                                        alert("Error: " + errorThrown);
                                                    }
                                                });
                                            }





                                        }

                                    });


                                },
                                error: function (XMLHttpRequest, textStatus, errorThrown) {
                                    // alert("Status: " + textStatus);
                                    //  alert("Error: " + errorThrown);
                                }
                            });




                        }

                        //
                    </script>


                    <!-------------------------------------------------------------------------------------------------------------------->
                    <div  id="id_table_grossir" class="form-group">
                        <label class="col-md-2 control-label"></label>

                        <div class="col-md-10 table-responsive">
                            <table id="id_table" class="table table-bordered table-striped" >
                                <thead>
                                    <tr >
                                        <th  style="width: 100px;" >Product ID</th>
                                        <th    >Product Name</th>
                                        <th  style="width: 100px;" >Qty</th>
                                        <th  style="width: 150px;" >Price</th>
                                        <th  style="width: 75px;" >%</th>
                                        <th  style="width: 150px;" >Subtotal</th>
                                        <th   >X</th>
                                        <th   >--</th>
                                        <th  >--</th>


                                </thead>
                                <tbody id="id_body_table" >	
                                    <?php
                                    $counter = 1;
                                    foreach ($listorderproduk as $item) {
                                        ?>
                                        <tr id="tr_"<?php echo $counter; ?>>
                                            <td><div ><input readonly id='id_txt_id_product_<?php echo $counter; ?>' class='form-control hitung' name='name_txt_id_product[]'  type='text' value='<?php echo $item->id_produk; ?>'></div></td>
                                            <td><div ><input readonly id='id_txt_nama_product_<?php echo $counter; ?>' class='form-control' name='name_txt_nama_product[]'  type='text' value='<?php echo $item->namaproduk; ?>'></div></td>
                                            <td><div ><input  id='id_txt_jumlah_product_<?php echo $counter; ?>' class='form-control jumlah' name='name_txt_jumlah_product[]'  type='text' value='<?php echo $item->jumlah; ?>'></div> <span class="fa fa-refresh" onclick="edit_detailmaterial(<?php echo $item->id_produk; ?>,<?php echo $counter; ?>);
                                                        update_total_discount();
                                                        update_grandtotal();get_price(<?php echo $item->id_produk; ?>,<?php echo $counter; ?>);
                                                                                                                                                                                                            "></span></td>
                                            <td><div ><input readonly id='id_txt_harga_product_<?php echo $counter; ?>' class='form-control harga' name='name_txt_harga_product[]'  type='text' value='<?php echo $item->harga; ?>'></div></td>
                                            <td><div ><input readonly id='id_txt_diskon_product_<?php echo $counter; ?>' class='form-control diskon' name='name_txt_diskon_product[]'  type='text' value='<?php echo $item->diskon; ?>'></div></td>
                                            <td><div ><input readonly id='id_txt_subtotal_product_<?php echo $counter; ?>' class='form-control diskon' name='name_txt_subtotal_product[]'  type='text' value='<?php echo $item->subtotal; ?>'></div></td>
                                            <td><div ><i  onclick='remove_product_tr(<?php echo $counter; ?>);
                                                        update_grandtotal();
                                                        update_total_discount(); readd_detailmaterial(" + $("#id_product option:selected").val() + ");' style='colour:red;' class='glyphicon glyphicon-remove ' ></i></div></th>
                                            <td ><div ><input readonly id='id_txt_id_notajualproduk_<?php echo $counter; ?>' class='form-control diskon ' name='name_txt_id_orderproduct[]'  type='text' value='<?php echo $item->id; ?>'></div></td>
                                            <td ><div ><input  id='id_txt_jumlah_product2_<?php echo $counter; ?>' class='form-control jumlah' name='name_txt_jumlah_product2[]'  type='text' value='<?php echo $item->jumlah; ?>'></div> </td>

                                        </tr>

                                    <?php } ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div   class="form-group">
                        <label class="col-md-2 control-label" for="select-1">Total Discount</label>


                        <div class="col-md-2">
                            <input  readonly id="id_total_discount"  class="form-control" name="name_totaldiscount"  type="number" value="<?php echo set_value('name_totaldiscount', $dataorder[0]->totaldiskon); ?>">

                        </div>
                    </div>
                    <div   class="form-group">
                        <label class="col-md-2 control-label" for="select-1">Grandtotal</label>


                        <div class="col-md-2">
                            <input  readonly id="id_grandtotal"  class="form-control" name="name_grandtotal"  type="number" value="<?php echo set_value('name_editidorder', $dataorder[0]->grandtotal); ?>">

                        </div>
                    </div>

                    <footer>

                        <div class="form-group">
                            <label class="col-md-2 control-label" for="select-1"></label>
                            <div class="col-md-4">
                                <input onclick="check_all_not_null();"  name="button_   order" class="btn btn-primary " value="Add Order">
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




</script>

</div>
