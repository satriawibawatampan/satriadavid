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

        <header role="heading"><span class="widget-icon"> <i class="fa fa-edit"></i> </span>
            <h2>Add order Form </h2>				

            <span class="jarviswidget-loader"><i class="fa fa-refresh fa-spin"></i></span></header>

        <!-- widget div-->
        <div role="content">


            <div class="widget-body ">

                <form role='form' id="smart-form-register" action="<?php echo base_url(); ?>Back/Order/Show_add_order_note" class="form-horizontal" novalidate="novalidate" method="post">
                    <div id="id_inputmember" class="form-group">
                        <label class="col-md-2 control-label" for="select-1">Member</label>
                        <div class="col-md-2">
                            <select class="form-control" name="name_member" id="id_member" selected ="select" onchange="checkNewMember()">
                                <option value="0" >- No Member -</option>

                                <?php foreach ($listmember as $itemmember) { ?>

                                    <option value="<?php echo $itemmember->id; ?>" ><?php echo $itemmember->nama; ?> / ID: <?php echo $itemmember->id; ?> / HP: <?php echo $itemmember->telepon; ?>  </option>

                                <?php } ?>
                            </select> 
                        </div>
                        <div class="col-md-4" id="noMember" style="display: show;">
                            <button type='button' class="btn btn-primary" 
                                    data-toggle="modal" data-target="#addMember"
                                    onclick="OpenModal(1)"
                                    data-title="Member Registration"
                                    id="btnModal">Add Member</button>
                        </div>
                    </div>
                    <script>

                        function OpenModal() {
                            $(".modal-title").text("Member Registration");
                        }
                        function checkNewMember() {
                            var member = $("#id_member").val();
                            if (member === "0") {
                                $("#noMember").show();
                            } else {
                                $("#noMember").hide();
                            }
                        }

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

                        function checktipe()
                        {
                            var tipenya = null;
                            if ($("#id_category").val() == 1)
                            {
                                 alert("a");
                                $.ajax({
                                    type: "POST",
                                    url: "<?php echo base_url(); ?>" + "Back/Product/Json_get_material/" + $("#id_product").val(),
                                    dataType: "json",
                                    async: false,
                                    success: function (result) {

                                        $.each(result, function (id, name)
                                        {

                                            tipenya = name['tipematerial'];

                                            if (tipenya == 1) {
                                                //alert("es");
                                                $("#id_long").prop("disabled", false);
                                                $("#id_long").val("1");
                                            } else {
                                                // alert(tipenya);
                                                $("#id_long").val("1");
                                                $("#id_long").prop("disabled", true);

                                            }


                                        });
                                    }
                                });





                            } else if ($("#id_category").val() == 2 ||$("#id_category").val() == 3  ) {
                                $("#id_long").prop("disabled", false);
                                $("#id_long").val("1");
                            } else
                            {
                                $("#id_long").prop("disabled", true);
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
                            checktipe();


                        };

                        var urutanproduct = 1;
                        var detailmaterial = [];
                        var produk_material = [];

                        var tampungall = [];


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
                                            "<td> <div ><input readonly id='id_txt_long_product_" + urutanproduct + "' class='form-control jumlah' name='name_txt_long_product[]'  type='text' value='" + $("#id_long").val() + "'></div></td>" +
                                            "<td> <div ><input readonly id='id_txt_harga_product_" + urutanproduct + "' class='form-control harga' name='name_txt_harga_product[]'  type='text' value='" + $("#id_unitprice").val() + "'></div></td>" +
                                            "<td> <div ><input readonly id='id_txt_diskon_product_" + urutanproduct + "' class='form-control diskon' name='name_txt_diskon_product[]'  type='text' value='" + $("#id_discount").val() + "'></div></td>" +
                                            "<td> <div ><input readonly id='id_txt_subtotal_product_" + urutanproduct + "' class='form-control subtotal' name='name_txt_subtotal_product[]'  type='text' value='" + $("#id_quantity").val() * $("#id_long").val() * ($("#id_unitprice").val() - $("#id_discount").val() / 100 * $("#id_unitprice").val()) + "'></div></td>" +
                                            "<td> <div ><input  id='id_txt_deskripsi_product_" + urutanproduct + "' class='form-control subtotal' name='name_txt_deskripsi_product[]'  type='text' value='" + document.getElementById("id_deskripsi").value + "'></div></td>" +
                                            "<td> <div ><i  onclick='remove_product_tr(" + urutanproduct + "); update_grandtotal(); update_total_discount(); ' style='colour:red;' class='btn glyphicon glyphicon-remove ' ></i></div></td>" +
                                            "</tr>");
                                    urutanproduct++;
                                    checkingadaproduksama = 1; // bikin agar isa kebaca lagi
                                    //alert("urutan ke " + urutan.toString());


                                    //  check_material_availability($("#id_product option:selected").val(),  $("#id_quantity").val());
                                    $("#id_quantity").val(1);
                                    $("#id_long").val(1);
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
                            alert("remove");
                            //alert($("#id_txt_id_product_" + y).val());
                            if ($("#id_txt_id_product_" + y).val() == 0)
                            {

                                var idmemberbaru = $("#id_member_input").val();

                                $.ajax({
                                    type: "POST",
                                    url: "<?php echo base_url(); ?>" + "Back/Member/Cancel_add_member",

                                    data: {
                                        idmember: idmemberbaru
//                                                        data: JSON.stringify(tampungall)
                                    },
                                    success: function (result) {
                                        $("#tr_" + y).remove();
                                        $("#id_member").prop("disabled", false);
                                        $("#btnModal").prop("disabled", false);

                                    },
                                    error: function (XMLHttpRequest, textStatus, errorThrown) {
                                        alert("Status: " + textStatus);
                                        alert("Error: " + errorThrown);
                                    }
                                });

                            } else
                            {
                                $("#tr_" + y).remove();
                            }



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
                            // alert("yes");

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
                                        products.push({"id": $("#id_txt_id_product_" + counterwhile).val(), "jumlah": $("#id_txt_jumlah_product_" + counterwhile).val(), "harga": $("#id_txt_harga_product_" + counterwhile).val(), "diskon": $("#id_txt_diskon_product_" + counterwhile).val(), "subtotal": $("#id_txt_subtotal_product_" + counterwhile).val(), "deskripsi": $("#id_txt_deskripsi_product_" + counterwhile).val(), "long": $("#id_txt_long_product_" + counterwhile).val()});
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

                                if (id_member !== null) {
                                    members = id_member;
                                }
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
                                        totaldiskon: totaldiskons,
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
                                            alert("Your Product Out of Stock");
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

                        var id_member = null;
                        function add_member() {
                            var nama = $("#daftar_nama").val();
                            var deposit = $("#daftar_deposit").val();
                            var email = $("#daftar_email").val();
                            var BOD = $("#daftar_ttl").val();
                            var phone = $("#daftar_telepon").val();
                            var gender = $("#daftar_gender").val();
                            var alamat = $("#daftar_alamat").val();
                            $.ajax({
                                type: "POST",
                                url: "<?php echo base_url(); ?>" + "Back/Member/Add_member_ajax",
                                datatype: "json",
                                data: {
                                    nama: nama,
                                    deposit: deposit,
                                    email: email,
                                    bod: BOD,
                                    phone: phone,
                                    alamat: alamat,
                                    gender: gender
                                },
                                success: function (result) {
                                    id_member = result;

                                    var idnya = id_member;

                                    if (idnya == 0)
                                    {
                                        alert("Email has been registered before.");
                                    } else {
                                        alert("Member Registration Success");
                                        alert(idnya);
                                        $('#addMember').modal('toggle');
//$("#id_member_input").val(id_member);
                                        $("#id_body_table").append(
                                                "<tr id='tr_" + urutanproduct + "'>" +
                                                "<td> <div ><input readonly id='id_txt_id_product_" + urutanproduct + "' class='form-control hitung' name='name_txt_id_product[]'  type='text' value='0'></div></td>" +
                                                "<td> <div ><input readonly id='id_txt_nama_product_" + urutanproduct + "' class='form-control' name='name_txt_nama_product[]'  type='text' value='Registrasi Member'></div></td>" +
                                                "<td> <div ><input readonly id='id_txt_jumlah_product_" + urutanproduct + "' class='form-control jumlah' name='name_txt_jumlah_product[]'  type='text' value='1'></div></td>" +
                                                "<td> <div ><input readonly id='id_txt_harga_product_" + urutanproduct + "' class='form-control harga' name='name_txt_harga_product[]' type='text' value='" + deposit + "'></div></td>" +
                                                "<td> <div ><input readonly id='id_txt_diskon_product_" + urutanproduct + "' class='form-control diskon' name='name_txt_diskon_product[]'  type='text' value='0'></div></td>" +
                                                "<td> <div ><input readonly id='id_txt_subtotal_product_" + urutanproduct + "' class='form-control subtotal' name='name_txt_subtotal_product[]'  type='text' value='" + deposit + "'></div></td>" +
                                                "<td> <div ><input  id='id_txt_deskripsi_product_" + urutanproduct + "' class='form-control subtotal' name='name_txt_deskripsi_product[]'  type='text' value=''></div></td>" +
                                                "<td> <div><i  onclick='remove_product_tr(" + urutanproduct + "); update_grandtotal(); update_total_discount(); ' style='colour:red;' class='btn glyphicon glyphicon-remove ' ></i></div></td>" +
                                                "<td hidden> <div ><input  id='id_member_input' class='form-control subtotal' name='name_member_input'  type='text' value='" + idnya + "'></div></td>" +
                                                "</tr>");
                                        urutanproduct++;
                                        update_grandtotal();

                                        $("#id_member").attr("disabled", "disabled");
                                        $("#btnModal").attr("disabled", "disabled");

                                    }
                                },
                                error: function (XMLHttpRequest, textStatus, errorThrown) {
                                    alert("Status: " + textStatus);
                                    alert("Error: " + errorThrown);
                                }
                            });
                        }
                    </script>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="select-1">Product</label>
                        <div class="col-md-2">
                            <select onchange="show_product_by_category(this.value);
                                    get_price(); checktipe();
                                    cek_promo()" class="form-control" name="name_category" id="id_category" selected ="select" >
                                    <?php for ($x = 0; $x < count($listkategori); $x++) {
                                        ?>

                                    <option value="<?php echo $listkategori[$x]['id']; ?>" ><?php echo $listkategori[$x]['nama']; ?></option>

                                <?php } ?>
                            </select>
                            <span>Category</span>
                        </div>
                        <div class="col-md-2">
                            <select onchange="get_price();
                                    checktipe();
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
                            <span>Product Name</span>
                            <p style="color: green"><span id="id_span_discount"></span></p>

                        </div>

                        <div class="col-md-1">
                            <input id="id_quantity" oninput="get_price()" class="form-control" name="name_quantity" placeholder="Quantity" type="number" value="1">
                            <span>Quantity</span>

                        </div>
                        <div class="col-md-1">
                            <input  id="id_long" oninput="get_price()" class="form-control" name="name_long" placeholder="Quantity" type="number" value="1">
                            <span>Long in CM</span>

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


                    <div  id="id_table_grossir" class="form-group">
                        <label class="col-md-2 control-label"></label>

                        <div class="col-md-10 table-responsive">
                            <table id="id_table" class="table table-bordered table-striped" >
                                <thead>
                                    <tr >
                                        <th   >Product ID</th>
                                        <th    >Product Name</th>
                                        <th   >Qty</th>
                                        <th   >Long</th>
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



            <div class="modal fade" id="addMember" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title"></h4>
                        </div>
                        <div class="modal-body">
                            <div class="widget-body no-padding">
                                <form id="smart-form-register-payment" class="form-horizontal" novalidate="novalidate" method="post">
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="select-1">Email</label>
                                        <div class="col-md-4">
                                            <input  id="daftar_email" type="text" name="daftar_email"  aria-required="true" class="error" aria-invalid="true" value="" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="select-1">Name</label>
                                        <div class="col-md-4">
                                            <input  id="daftar_nama" type="text" name="daftar_nama"  aria-required="true" class="error" aria-invalid="true" value="" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="select-1">BOD</label>
                                        <div class="col-md-4">
                                            <input id="daftar_ttl" class="form-control" name="daftar_ttl" placeholder="BOD" type="date" value="<?php echo set_value('daftar_ttl'); ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="select-1">Phone</label>
                                        <div class="col-md-4">
                                            <input  id="daftar_telepon" type="text" name="daftar_telepon"  aria-required="true" class="error" aria-invalid="true" value="" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="select-1">Address</label>
                                        <div class="col-md-4">
                                            <input  id="daftar_alamat" type="text" name="daftar_alamat"  aria-required="true" class="error" aria-invalid="true" value="" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="select-1">Gender</label>
                                        <div class="col-md-4">
                                            <select  id="daftar_gender" class="form-control" name="daftar_gender" id="select-1" selected ="select" <?php echo set_select('name_gender', set_value('name_gender')); ?> >
                                                <option value="1" <?php echo set_select('daftar_gender', '1', TRUE); ?>>Male</option>
                                                <option value="2" <?php echo set_select('daftar_gender', '2'); ?>>Female</option>
                                            </select> 
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="select-1">Deposit</label>
                                        <div class="col-md-4">
                                            <input  id="daftar_deposit" type="number" name="daftar_deposit"  aria-required="true" class="error" aria-invalid="true" value="" >
                                        </div>
                                    </div>

                                    <footer>

                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="select-1"></label>
                                            <div class="col-md-4">
                                                <input onclick="add_member();"  name="button_addmember" class="btn btn-primary " value="Add Member">
                                            </div>
                                        </div>
                                    </footer>
                                </form> 
                            </div>
                        </div>
                    </div>

                </div>
            </div>
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
    //  checktipe();
</script>