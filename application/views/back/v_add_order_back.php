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
                        Add order
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
            <h2>Add order Form </h2>				

            <span class="jarviswidget-loader"><i class="fa fa-refresh fa-spin"></i></span></header>

        <!-- widget div-->
        <div role="content">


            <div class="widget-body ">

                <form role='form' id="smart-form-register" action="<?php echo base_url(); ?>Back/Order/Show_add_order_note" class="form-horizontal" novalidate="novalidate" method="post">
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="select-1">Member</label>
                        <div class="col-md-2">
                            <select class="form-control" name="name_member" id="id_member" selected ="select" >
                                <option value="0" >- No Member -</option>

                                <?php foreach ($listmember as $itemmember) { ?>

                                    <option value="<?php echo $itemmember->id; ?>" ><?php echo $itemmember->nama; ?> / ID: <?php echo $itemmember->id; ?> / HP: <?php echo $itemmember->telepon; ?>  </option>

                                <?php } ?>
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

                        var urutanproduct = 1;
                        var detailmaterial = [];
                        var produk_material = [];

                        var tampungall = [];
                        function readd_detailmaterial(idproduk)
                        {
                            var tampungreadd = [];
                            for (var q = 0; q < tampungall.length; q++)
                            {
                                if (tampungall[q]['idproduk'] == idproduk)
                                {
                                    tampungreadd.push({"id": tampungall[q]['id'], "stok": tampungall[q]['stok'], "idproduk": idproduk.toString()})

                                    //ini hapus tampungall karena sudah di cancel. dijadikan -1 agar tidak kebaca di if.                    
                                    tampungall[q]['idproduk'] = -1;

                                }
                            }

                            $.ajax({
                                type: "POST",
                                url: "<?php echo base_url(); ?>" + "Back/Material/Readd_detailmaterial",

                                data: {
                                    data: tampungreadd
//                                                
                                },
                                success: function (result) {
                                    //ini kalau mau ambil 1 data saja sudah bisa.
                                    alert("hore sukses" + result);

                                },
                                error: function (XMLHttpRequest, textStatus, errorThrown) {
                                    alert("Status: " + textStatus);
                                    alert("Error: " + errorThrown);
                                }
                            });

                        }


                        function check_material_availability($idproduk, $qty)
                        {


                            $qtys = parseFloat($("#id_quantity").val());
                            detailmaterial = [];
                            produk_material = [];

                            alert("idproduk " + $idproduk + " / quantity " + $qty);
                            $.ajax({
                                type: "POST",
                                url: "<?php echo base_url(); ?>" + "Back/Material/Json_get_detail_material_array/" + $idproduk,
                                dataType: "json",
                                success: function (result) {
                                    detailmaterial = result;

                                    $.ajax({
                                        type: "POST",
                                        url: "<?php echo base_url(); ?>" + "Back/Product/Json_get_material_array/" + $idproduk,
                                        dataType: "json",
                                        success: function (result) {

                                            produk_material = result;

                                            var tampung = [];
                                            var stoktersedia = true;

                                            var needed = [];
                                            var neededtipe1 = [];


                                            for (a = 0; a < produk_material.length; a++)
                                            {

                                                //var tes = $("#id_quantity").val();


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
                                                                detailmaterial[b]['stok'] = detailmaterial[b]['stok'] - needed[a];
                                                                needed[a] = 0;
                                                                break;

                                                            } else if (needed[a] > detailmaterial[b]['stok'] && detailmaterial[b]['stok'] > 0)
                                                            {

                                                                tampung.push({"id": detailmaterial[b]['id'], "stok": detailmaterial[b]['stok'], "idproduk": $idproduk.toString()});
                                                                tampungall.push({"id": detailmaterial[b]['id'], "stok": detailmaterial[b]['stok'], "idproduk": $idproduk.toString()});

                                                                // var neededsementara = needed[a];
                                                                needed[a] = needed[a] - detailmaterial[b]['stok'];
                                                                detailmaterial[b]['stok'] = 0;
                                                            }

                                                        } else if (detailmaterial[b]['tipe'] == 1 && neededtipe1[a] > 0)
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
                                                                neededtipe1[a]--;



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
                                                    remove_product_tr(urutanproduct - 1);
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


                        function add_to_note()
                        {

                            if (
                                    document.getElementById('id_quantity').value > 0 &&
                                    document.getElementById('id_unitprice').value.length > 0 &&
                                    $("#id_product option:selected").val() > 0
                                    )
                            {

                                var checkingadaproduksama = this.check_product();
                                //alert("checking " + checkingadamaterialsama);
                                if (checkingadaproduksama == null || checkingadaproduksama === 'undifined' || checkingadaproduksama != 0)
                                {
                                    // alert($("#id_name_material option:selected").text());

                                    $("#id_body_table").append(
                                            "<tr id='tr_" + urutanproduct + "'>" +
                                            "<td> <div ><input readonly id='id_txt_id_product_" + urutanproduct + "' class='form-control hitung' name='name_txt_id_product[]'  type='text' value='" + $("#id_product option:selected").val() + "'></div></td>" +
                                            "<td> <div ><input readonly id='id_txt_nama_product_" + urutanproduct + "' class='form-control' name='name_txt_nama_product[]'  type='text' value='" + $("#id_product option:selected").text() + "'></div></td>" +
                                            "<td> <div ><input readonly id='id_txt_jumlah_product_" + urutanproduct + "' class='form-control jumlah' name='name_txt_jumlah_product[]'  type='text' value='" + $("#id_quantity").val() + "'></div></td>" +
                                            "<td> <div ><input readonly id='id_txt_harga_product_" + urutanproduct + "' class='form-control harga' name='name_txt_harga_product[]'  type='text' value='" + $("#id_unitprice").val() + "'></div></td>" +
                                            "<td> <div ><input readonly id='id_txt_diskon_product_" + urutanproduct + "' class='form-control diskon' name='name_txt_diskon_product[]'  type='text' value='" + $("#id_discount").val() + "'></div></td>" +
                                            "<td> <div ><input readonly id='id_txt_subtotal_product_" + urutanproduct + "' class='form-control subtotal' name='name_txt_subtotal_product[]'  type='text' value='" + $("#id_quantity").val() * ($("#id_unitprice").val() - $("#id_discount").val() / 100 * $("#id_unitprice").val()) + "'></div></td>" +
                                            "<td> <div ><input  id='id_txt_deskripsi_product_" + urutanproduct + "' class='form-control subtotal' name='name_txt_deskripsi_product[]'  type='text' value='"+document.getElementById("id_deskripsi").value+"'></div></td>" +
                                            "<td> <div ><i  onclick='remove_product_tr(" + urutanproduct + "); update_grandtotal(); update_total_discount(); ' style='colour:red;' class='btn glyphicon glyphicon-remove ' ></i></div></td>" +
                                            "</tr>");
                                    urutanproduct++;
                                    checkingadaproduksama = 1; // bikin agar isa kebaca lagi
                                    //alert("urutan ke " + urutan.toString());


                                    //  check_material_availability($("#id_product option:selected").val(),  $("#id_quantity").val());
                                    $("#id_quantity").val(1);
                                    $("#id_deskripsi").val("");
                                } else
                                {
                                    alert("have been registerd");
                                }
                            } else
                            {
                                alert("Nulls in field Materials are not allowed");
                            }


                        }


                        function remove_product_tr(y)
                        {
                           
                            $("#tr_" + y).remove();

                        }

                        function check_product()
                        {
                            var numItems = $('.hitung').length;

                            var id = event.target.id;
                            var counterwhile = 1;
                            while (numItems > 0)
                            {   // jika yang dipilih ada di id-text_id_material_product(table)
                                if ($("#id_product option:selected").val() == $("#id_txt_id_product_" + counterwhile).val())
                                {
                                    counterwhile = 1;
                                    //kembalikan 0 untuk alert dari fungsi sebelumnya
                                    return 0;
                                    break;
                                }
                                if ($("#id_txt_id_product_" + counterwhile).length > 0)
                                {
                                    numItems--;
                                }
                                counterwhile++;

                            }
                            return 1;

                        }

                        function check_all_not_null()
                        {

                            if ($('.hitung').length == 0)
                            {
                                $("form").submit(function (e) {
                                    e.preventDefault();
                                });
                                alert("Register a product first");
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
                                        products.push({"id": $("#id_txt_id_product_" + counterwhile).val(), "jumlah": $("#id_txt_jumlah_product_" + counterwhile).val(), "harga": $("#id_txt_harga_product_" + counterwhile).val(), "diskon": $("#id_txt_diskon_product_" + counterwhile).val(), "subtotal": $("#id_txt_subtotal_product_" + counterwhile).val(), "deskripsi": $("#id_txt_deskripsi_product_" + counterwhile).val()});
                                        numItems--;


                                    }
                                    counterwhile++;

                                }

//                               

                                var grandtotals = $('#id_grandtotal').val();
                                var totaldiskons = $('#id_total_discount').val();
                                var members = $('#id_member option:selected').val();
                                var promos = <?php echo json_encode($listpromo); ?>;
                                // var totaldiskons =$('#id_total_discount').val();

                                $.ajax({
                                    type: "POST",
                                    url: "<?php echo base_url(); ?>" + "Back/Order/Add_order_note",
                                    datatype: "json",
                                    data: {
                                        data: tampungall,
                                        product: products,
                                        member: members,
                                        grandtotal: grandtotals,
                                        promo: promos,
                                        totaldiskon: totaldiskons
                                                //  totaldiskon:totaldiskons

//                                    

                                    },
                                    success: function (result) {
                                        //ini kalau mau ambil 1 data saja sudah bisa.
                                        //if (result == "asd")



                                        if (result == 1)
                                        {
                                            alert("Transaction Success");
                                            $("#id_quantity").val(1);
                                            $("#id_body_table").empty();
                                            $("#id_total_discount").val(0);
                                            $("#id_grandtotal").val(0);

                                            urutanproduct = 1;
                                            detailmaterial = [];
                                            produk_material = [];

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
                        
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="select-1"></label>
                        <div class="col-md-6">
                            <textarea id="id_deskripsi" class="form-control" name="name_deskripsi" placeholder="Description" rows="4" ><?php echo set_value('name_deskripsi'); ?></textarea>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="select-1"></label>
                        <div class="col-md-6">
                            <input onclick="add_to_note();
                                    update_grandtotal();
                                    update_total_discount();
                                   "  name="" id="id_button_add_to_note" class="btn btn-primary " value="Add Product">

                        </div>
                    </div>




                    <!-------------------------------------------------------------------------------------->

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
                                        <th   >Description</th>
                                        <th   >X</th>


                                </thead>
                                <tbody id="id_body_table" >	


                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div   class="form-group">
                        <label class="col-md-2 control-label" for="select-1">Total Discount</label>


                        <div class="col-md-2">
                            <input  readonly id="id_total_discount"  class="form-control" name="name_totaldiscount"  type="number" value="0">

                        </div>
                    </div>
                    <div   class="form-group">
                        <label class="col-md-2 control-label" for="select-1">Grandtotal</label>


                        <div class="col-md-2">
                            <input  readonly id="id_grandtotal"  class="form-control" name="name_grandtotal"  type="number" value="0">

                        </div>
                    </div>
                    <footer>

                        <div class="form-group">
                            <label class="col-md-2 control-label" for="select-1"></label>
                            <div class="col-md-4">
                                <input onclick="check_all_not_null();"  name="button_addorder" class="btn btn-primary " value="Add Order">
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

<div class="modal fade" id="myDetailPrice" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Prices for <span id="span_nama" style="color:blue"></span> </h4>
            </div>
            <div class="modal-body">
                <div class="widget-body no-padding">

                    <div id="datatable_col_reorder_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">

                        <table id="datatable_col_reorder" class="table table-striped table-bordered table-hover dataTable no-footer has-columns-hidden" width="100%" role="grid" aria-describedby="datatable_col_reorder_info" style="width: 100%;">
                            <thead>
                                <tr role="row">
                                    <!--<th data-hide="phone" class="sorting_asc" tabindex="0" aria-controls="datatable_col_reorder" rowspan="1" colspan="1" aria-sort="ascending" aria-label="ID: activate to sort column descending" style="width: 32px;">ID</th>-->
                                    <th data-class="expand" class="expand sorting" tabindex="0" aria-controls="datatable_col_reorder" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 81px;">Qty Min</th>
                                    <th data-hide="phone" class="sorting" tabindex="0" aria-controls="datatable_col_reorder" rowspan="1" colspan="1" aria-label="Phone: activate to sort column ascending" style="width: 131px;">Qty Max</th>
                                    <th data-hide="phone" class="sorting" tabindex="0" aria-controls="datatable_col_reorder" rowspan="1" colspan="1" aria-label="Phone: activate to sort column ascending" style="width: 131px;">Price</th>


                            </thead>
                            <tbody id="tablebodyprice">	

                            </tbody>
                        </table>

                    </div>

                </div>
            </div>
        </div>

    </div>
</div>

</div>

<script>
    $(document).ready(function () {
        $('#datatable_col_reorder').DataTable({
            "order": [[7, "desc"]]
        });
    });
</script>