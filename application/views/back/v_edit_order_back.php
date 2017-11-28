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
                    <input required id="id_editidorder"  class="form-control" name="name_editidorder" placeholder="HPP" type="text" value="<?php echo set_value('name_editidorder', $dataorder[0]->id); ?>" />

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

                        function get_price(idproduk, counter)
                        {

                            var qty = 0;
                            var textqty = $("#id_txt_jumlah_product_" + counter).val();
                            if (textqty == "")
                            {
                                $("#id_txt_jumlah_product_" + counter).val(0);
                            }
                            if (textqty != "")
                            {
                                qty = parseFloat($("#id_txt_jumlah_product_" + counter).val());




                                var kategoris = <?php echo json_encode($listkategori); ?>;
                                for (x = 0; x < kategoris.length; x++) {


                                    for (y = 0; y < kategoris[x]['product'].length; y++) {

                                        if (kategoris[x]['product'][y]['id'] == idproduk) {


                                            for (z = 0; z < kategoris[x]['product'][y]['harga'].length; z++) {
                                                //alert($("#id_quantity").val());
                                                //alert(qty);
                                                if (qty == 0)
                                                {
                                                    // alert("null");
                                                    $("#id_txt_harga_product_" + counter).val(0);
                                                    $("#id_txt_jumlah_product_" + counter).val(0);

                                                } else if (qty >= kategoris[x]['product'][y]['harga'][z]['batasbawah'] && qty <= kategoris[x]['product'][y]['harga'][z]['batasatas']) {
                                                    $("#id_txt_harga_product_" + counter).val(kategoris[x]['product'][y]['harga'][z]['hargajual']);
                                                    //alert("masuk1");
                                                    // break;
                                                } else if (qty >= kategoris[x]['product'][y]['harga'][z]['batasbawah'] && qty >= kategoris[x]['product'][y]['harga'][z]['batasatas'] && z == (kategoris[x]['product'][y]['harga'].length) - 1)
                                                {
                                                    // alert('masik');
                                                    $("#id_txt_harga_product_" + counter).val(kategoris[x]['product'][y]['harga'][z]['hargajual']);
                                                    // break;
                                                } else if (qty > kategoris[x]['product'][y]['harga'][z]['batasatas'] && qty < kategoris[x]['product'][y]['harga'][z + 1]['batasbawah'] && z != (kategoris[x]['product'][y]['harga'].length) - 1) {
                                                    //kalau quantitya elbih beasr dari batas atas dan lebih kecil dari batasbawah nya z+1
                                                    $("#id_txt_harga_product_" + counter).val(kategoris[x]['product'][y]['harga'][z]['hargajual']);
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

                                $("#id_txt_subtotal_product_" + counter).val(($("#id_txt_harga_product_" + counter).val() * qty) - ($("#id_txt_harga_product_" + counter).val() * qty * $("#id_txt_diskon_product_" + counter).val() / 100));
//                         
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

                                    // check_material_availability($("#id_txt_id_product_" + counter).val(), selisih, counter);

                                }
                            } else
                            {
                                alert("0 quantity is not allowed. Just press the X button to delete.");
                                $("#id_txt_jumlah_product_" + counter).val($("#id_txt_jumlah_product2_" + counter).val());
                            }


                        }

                        function check_all_not_null()
                        {

                            if ($('.hitung').length == 0)
                            {
                                $("form").submit(function (e) {
                                    e.preventDefault();
                                });
                                alert("Press F5 to refresh");
                            } else
                            {
//  
                                var products = [];
                                var numItems = $('.hitung').length;

                                var counterwhile = 1;
                                while (numItems > 0)
                                {



                                    if ($("#id_txt_id_product_" + counterwhile).length > 0)
                                    {
                                        products.push({"id": $("#id_txt_id_product_" + counterwhile).val(), "jumlah": $("#id_txt_jumlah_product_" + counterwhile).val(), "harga": $("#id_txt_harga_product_" + counterwhile).val(), "diskon": $("#id_txt_diskon_product_" + counterwhile).val(), "subtotal": $("#id_txt_subtotal_product_" + counterwhile).val(), "jumlah2": $("#id_txt_jumlah_product2_" + counterwhile).val(), "idnotajualproduk": $("#id_txt_id_notajualproduk_" + counterwhile).val()});
                                        numItems--;


                                    }
                                    counterwhile++;

                                }

//                               

                                var idorder = $('#id_editidorder').val();
                                var grandtotals = $('#id_grandtotal').val();
                                var totaldiskons = $('#id_total_discount').val();
                                var members = $('#id_member option:selected').val();
                                var promos = <?php echo json_encode($listpromo); ?>;
                                // var totaldiskons =$('#id_total_discount').val();

                                $.ajax({
                                    type: "POST",
                                    url: "<?php echo base_url(); ?>" + "Back/Order/Edit_order_note",
                                    datatype: "json",
                                    data: {
                                        idorderan: idorder,
                                        product: products,
                                        member: members,
                                        grandtotal: grandtotals,
                                        promo: promos,
                                        totaldiskon: totaldiskons

                                    },
                                    success: function (result) {
                                        //ini kalau mau ambil 1 data saja sudah bisa.
                                        //if (result == "asd")

                                        alert(",asil" + result);

                                        if (result == 1)
                                        {
                                            alert("Edit Note Success");

                                            for (var y = 1; y <= products.length; y++)
                                            {
                                                $("#id_txt_jumlah_product2_" + y).val(products[y-1]['jumlah']);
                                            }

                                            tampungall = [];
                                        }
                                        if (result == 0)
                                        {
                                            alert(result);
                                        }






                                    },
                                    error: function (XMLHttpRequest, textStatus, errorThrown) {
                                        alert("Status: " + textStatus);
                                        alert("Error: " + errorThrown);
                                    }
                                });

                                //   document.getElementById("smart-form-register").submit();

                            }


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
                                            <td><div ><input  id='id_txt_jumlah_product_<?php echo $counter; ?>' class='form-control jumlah' name='name_txt_jumlah_product[]'  type='text' value='<?php echo $item->jumlah; ?>' oninput="get_price(<?php echo $item->id_produk; ?>,<?php echo $counter; ?>);
                                                              update_total_discount();
                                                              update_grandtotal();"></div>
                                            </td>
                                            <td><div ><input readonly id='id_txt_harga_product_<?php echo $counter; ?>' class='form-control harga' name='name_txt_harga_product[]'  type='text' value='<?php echo $item->harga; ?>'></div></td>
                                            <td><div ><input readonly id='id_txt_diskon_product_<?php echo $counter; ?>' class='form-control diskon' name='name_txt_diskon_product[]'  type='text' value='<?php echo $item->diskon; ?>'></div></td>
                                            <td><div ><input readonly id='id_txt_subtotal_product_<?php echo $counter; ?>' class='form-control diskon' name='name_txt_subtotal_product[]'  type='text' value='<?php echo $item->subtotal; ?>'></div></td>
                                            <td><div ><i  onclick='remove_product_tr(<?php echo $counter; ?>);
                                                    update_grandtotal();
                                                    update_total_discount(); readd_detailmaterial(" + $("#id_product option:selected").val() + ");' style='colour:red;' class='glyphicon glyphicon-remove ' ></i></div></th>
                                            <td ><div ><input readonly id='id_txt_id_notajualproduk_<?php echo $counter; ?>' class='form-control diskon ' name='name_txt_id_orderproduct[]'  type='text' value='<?php echo $item->id; ?>'></div></td>
                                            <td ><div ><input  id='id_txt_jumlah_product2_<?php echo $counter; ?>' class='form-control jumlah' name='name_txt_jumlah_product2[]'  type='text' value='<?php echo $item->jumlah; ?>'></div> </td>

                                        </tr>

                                        <?php $counter++;
                                    }
                                    ?>

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
