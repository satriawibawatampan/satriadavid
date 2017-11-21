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
                        function show_product_by_category(idnya)
                        {
                            $("#id_product").empty();
                            //  alert(idnya);
                            var kategoris = <?php echo json_encode($listkategori); ?>;
                            for (x = 0; x < kategoris.length; x++) {
                                if (kategoris[x]['id'] == idnya) {

                                    //  alert(kategoris[x]['product'].length);
                                    for (y = 0; y < kategoris[x]['product'].length; y++) {
                                        $("#id_product").append(
                                                "<option value='" + kategoris[x]['product'][y]['id'] + "'>" + kategoris[x]['product'][y]['nama'] + "</option>"
                                                );
                                    }
                                }
                            }

                        }

                        function get_price()
                        { //alert("idproduk");
                            $("#tablebodyprice").empty();
                            var idkategori = $("#id_category").val();
                            var idproduk = $("#id_product").val();
                            var qty = parseInt($("#id_quantity").val());
                            // alert(qty);
                            $("#id_unitprice").empty();
                            var kategoris = <?php echo json_encode($listkategori); ?>;
                            for (x = 0; x < kategoris.length; x++) {
                                if (kategoris[x]['id'] == idkategori) {

                                    for (y = 0; y < kategoris[x]['product'].length; y++) {
                                        if (kategoris[x]['product'][y]['id'] == idproduk) {


                                            for (z = 0; z < kategoris[x]['product'][y]['harga'].length; z++) {
                                                //alert($("#id_quantity").val());
                                                if ($("#id_quantity").val().length == 0)
                                                {
                                                    // alert("null");
                                                    $("#id_unitprice").val(0);
                                                    $("#id_quantity").val(0);

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
                        }

                        function cek_promo()
                        {
                            $("#id_span_discount").empty();
                            $("#id_discount").val(0);
                            var idproduk = $("#id_product").val();
                            var idkategori = $("#id_category").val();
                            var promo = <?php echo json_encode($listpromo); ?>;

                            for (x = 0; x < promo.length; x++) {
                                if (promo[x]['id_produk'] == idproduk) {

                                    // alert("as");
                                    $("#id_span_discount").text("-" + promo[x]['diskon'] + "%");
                                    $("#id_discount").val(promo[x]['diskon']);
                                }
                            }

                        }

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

                        window.onload = function () {
                            get_price();


                        };
                    </script>

                    <div class="form-group">
                        <label class="col-md-2 control-label" for="select-1">Product</label>
                        <div class="col-md-2">
                            <select onchange="show_product_by_category(this.value);
                                    get_price();
                                    cek_promo()" class="form-control" name="name_category" id="id_category" selected ="select" >
                                    <?php for ($x = 0; $x < count($listkategori); $x++) {
                                        ?>

                                    <option value="<?php echo $listkategori[$x]['id']; ?>" ><?php echo $listkategori[$x]['nama']; ?></option>

                                <?php } ?>
                            </select> 
                        </div>
                        <div class="col-md-2">
                            <select onchange="get_price();
                                    cek_promo();" class="form-control" name="name_product" id="id_product" selected ="select" >
                                    <?php
                                    for ($x = 0; $x < count($listkategori); $x++) {
                                        for ($y = 0; $y < count($listkategori[$x]['product']); $y++) {
                                            if ($listkategori[$x]['product'][$y]['id_kategori'] == 1) {
                                                ?>

                                            <option value="<?php echo $listkategori[$x]['product'][$y]['id']; ?>" ><?php echo $listkategori[$x]['product'][$y]['nama']; ?></option>

                                            <?php
                                        }
                                    }
                                }
                                ?>
                            </select> 
                            <p style="color: green"><span id="id_span_discount"></span></p>

                        </div>

                        <div class="col-md-1">
                            <input id="id_quantity" oninput="get_price()" class="form-control" name="name_quantity" placeholder="Quantity" type="number" value="1">

                        </div>
                        <div class="col-md-1">
                            <input  readonly id="id_unitprice"  class="form-control" name="name_unitprice" placeholder="Price" type="number" value="">
                            <input   id="id_discount"  class="form-control" name="name_discount" placeholder="Price" type="hidden" value="0">
                            <a onclick="get_price();" class="fa fa-lg fa-fw fa-money" data-toggle="modal" data-target="#myDetailPrice">Grossir</a>
                        </div>
                        <div class="col-md-4">
                            <input onclick="add_to_note();
                                    update_grandtotal();
                                    update_total_discount();
                                   "  name="" id="id_button_add_to_note" class="btn btn-primary " value="Add Product">
                        </div>
                    </div>
                    <!-------------------------------------------------------------------------------------------------------------------->
                    <div  id="id_table_grossir" class="form-group">
                        <label class="col-md-2 control-label"></label>

                        <div class="col-md-6 table-responsive">
                            <table id="id_table" class="table table-bordered table-striped" >
                                <thead>
                                    <tr >
                                        <th   >Product ID</th>
                                        <th    >Product Name</th>
                                        <th   >Qty</th>
                                        <th   >Price</th>
                                        <th   >%</th>
                                        <th   >Subtotal</th>
                                        <th   >X</th>
                                        <th   >--</th>


                                </thead>
                                <tbody id="id_body_table" >	
                                    <?php
                                    $counter = 1;
                                    foreach ($listorderproduk as $item) {
                                        ?>
                                        <tr>
                                            <td><div ><input readonly id='id_txt_id_product_<?php echo $counter; ?>' class='form-control hitung' name='name_txt_id_product[]'  type='text' value='<?php echo $item->id_produk; ?>'></div></td>
                                            <td><div ><input readonly id='id_txt_nama_product_<?php echo $counter; ?>' class='form-control' name='name_txt_nama_product[]'  type='text' value='<?php echo $item->namaproduk; ?>'></div></td>
                                            <td><div ><input readonly id='id_txt_jumlah_product_<?php echo $counter; ?>' class='form-control jumlah' name='name_txt_jumlah_product[]'  type='text' value='<?php echo $item->jumlah; ?>'></div></td>
                                            <td><div ><input readonly id='id_txt_harga_product_<?php echo $counter; ?>' class='form-control harga' name='name_txt_harga_product[]'  type='text' value='<?php echo $item->harga; ?>'></div></td>
                                            <td><div ><input readonly id='id_txt_diskon_product_<?php echo $counter; ?>' class='form-control diskon' name='name_txt_diskon_product[]'  type='text' value='<?php echo $item->diskon; ?>'></div></td>
                                            <td><div ><input readonly id='id_txt_subtotal_product_<?php echo $counter; ?>' class='form-control diskon' name='name_txt_subtotal_product[]'  type='text' value='<?php echo $item->subtotal; ?>'></div></td>
                                            <td><div ><i  onclick='remove_product_tr(<?php echo $counter; ?>); update_grandtotal(); update_total_discount(); readd_detailmaterial(" + $("#id_product option:selected").val() + ");' style='colour:red;' class='glyphicon glyphicon-remove ' ></i></div></th>
                                            <td><div ><input readonly id='id_txt_id_notajualproduk_<?php echo $counter; ?>' class='form-control diskon' name='name_txt_id_orderproduct[]'  type='text' value='<?php echo $item->id; ?>'></div></td>

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
        } else
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

        var ids = $('.hitung').map(function () {
            return $(this).attr('id');
        });


        while (numItems > 0)
        {
            if ($("#id_name_material option:selected").val() == $("#" + ids[numItems - 1]).val())
            {
                return 0;
                break;
            } else
            {
                numItems--;
            }
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
