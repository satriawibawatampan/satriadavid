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

        <header role="heading">
            <span class="widget-icon"> <i class="fa fa-edit"></i> </span>
            <h2>Edit Order Note Form </h2>				

            <span class="jarviswidget-loader"><i class="fa fa-refresh fa-spin"></i></span></header>

        <!-- widget div-->
        <div role="content">


            <div class="widget-body ">

                <form role='form' id="smart-form-register" action="<?php echo base_url(); ?>Back/Order/Edit_Order_Note" class="form-horizontal" novalidate="novalidate" method="post">
                    <input required id="id_editidorder"  class="form-control" name="name_editidorder"  type="hidden" value="<?php echo set_value('name_editidorder', $dataorder[0]->id); ?>" />

                    <div class="form-group">
                        <label class="col-md-2 control-label" for="select-1">Member</label>


                        <?php //if ($dataorder[0]->statusaktifmember == 1) { ?>
                        <div class="col-md-2">
                            <select class="form-control" name="name_member" id="id_member" onchange="checkNewMember();" selected ="select" >


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
                        <div class="col-md-4" id="noMember" style="display: show;">
                            <button type='button' class="btn btn-primary" 
                                    data-toggle="modal" data-target="#addMember"
                                    onclick="OpenModal(1)"
                                    data-title="Member Registration"
                                    id="btnModal">Add Member</button>
                        </div>
                        <?php // } ?>

                        <div class="col-md-4">
                            <span></span>
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
                                        <th  >Subtotal</th>
                                        <th    >Description</th>
                                        <th   >X</th>
                                        <th hidden  >--</th>
                                        <th  hidden >--</th>


                                </thead>
                                <tbody id="id_body_table" >	
                                    <?php
                                    $counter = 1;
                                    foreach ($listorderproduk as $item) {
                                        ?>
                                        <tr id="tr_<?php echo $counter; ?>">
                                            <td><div ><input readonly id='id_txt_id_product_<?php echo $counter; ?>' class='form-control hitung <?php if($item->id_produk!=0){echo "barangselainmember";} ?>' name='name_txt_id_product[]'  type='text' value='<?php echo $item->id_produk; ?>'></div></td>
                                            <td><div ><input readonly id='id_txt_nama_product_<?php echo $counter; ?>' class='form-control' name='name_txt_nama_product[]'  type='text' value='<?php echo $item->namaproduk; ?>'></div></td>
                                            <td><div ><input <?php
                                                    if ($item->id_produk == 0) {
                                                        echo "readonly";
                                                    }
                                                    ?>  id='id_txt_jumlah_product_<?php echo $counter; ?>' class='form-control jumlah' name='name_txt_jumlah_product[]'  type='text' value='<?php echo $item->jumlah; ?>' oninput="get_price(<?php echo $item->id_produk; ?>,<?php echo $counter; ?>,<?php echo $item->tipe; ?>);
                                                        update_total_discount();
                                                        update_grandtotal();"></div>
                                            </td>
                                            <td><div ><input readonly id='id_txt_long_product_<?php echo $counter; ?>' class='form-control harga' name='name_txt_long_product[]' <?php
                                                    if ($item->tipe == 1) {
                                                        echo "type='text'";
                                                    } else if ($item->tipe == 2) {
                                                        echo "type='hidden'";
                                                    }
                                                    ?>  value='<?php echo $item->long; ?>'></div> <?php if ($item->tipe == 2) { ?><div><input readonly  class='form-control jumlah'   type='text' value='is not roll'></div> <?php } ?></td>
                                            <td><div ><input readonly id='id_txt_harga_product_<?php echo $counter; ?>' class='form-control harga' name='name_txt_harga_product[]'  type='text' value='<?php echo $item->harga; ?>'></div></td>
                                            <td><div ><input readonly id='id_txt_diskon_product_<?php echo $counter; ?>' class='form-control diskon' name='name_txt_diskon_product[]'  type='text' value='<?php echo $item->diskon; ?>'></div></td>
                                            <td><div ><input readonly id='id_txt_subtotal_product_<?php echo $counter; ?>' class='form-control diskon' name='name_txt_subtotal_product[]'  type='text' value='<?php echo $item->subtotal; ?>'></div></td>
                                            <td> <div ><input <?php
                                                    if ($item->id_produk == 0) {
                                                        echo "readonly";
                                                    }
                                                    ?> id='id_txt_deskripsi_product_<?php echo $counter; ?>' class='form-control subtotal' name='name_txt_deskripsi_product[]'  type='text' value='<?php echo $item->deskripsi; ?>'></div></td>
                                            <td><div ><i  onclick='remove_product_tr(<?php echo $counter; ?>);
                                                    update_grandtotal();
                                                    update_total_discount();' style='colour:red;' class='glyphicon glyphicon-remove ' ></i></div></td>
                                            <td hidden ><div ><input readonly id='id_txt_id_notajualproduk_<?php echo $counter; ?>' class='form-control diskon ' name='name_txt_id_orderproduct[]'  type='text' value='<?php echo $item->id; ?>'></div></td>
                                            <td hidden><div ><input  id='id_txt_jumlah_product2_<?php echo $counter; ?>' class='form-control jumlah' name='name_txt_jumlah_product2[]'  type='text' value='<?php echo $item->jumlah; ?>'></div> </td>
                                            <?php if ($dataorder[0]->statusaktifmember == 0 && $item->id_produk == 0) { ?> 
                                                <td hidden><div ><input  id='id_member_input' class='form-control jumlah' name='name_member_input'  type='text' value='<?php echo $dataorder[0]->id_member; ?>'></div> </td>

                                            <?php } ?>
                                        </tr>

                                        <?php
                                        $counter++;
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

                                <input onclick="check_all_not_null();" id="id_button_edit_order" type="button" name="button_edit_order" class="btn btn-primary " value="Edit Order">
                                <input type="hidden"  name="button_order" class="btn btn-primary " value="1">

                            </div>
                        </div>


                    </footer>
                </form>	

            </div>
            <!-- end widget content -->

        </div>
        <!-- end widget div -->

    </div>

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
                                    <input id="daftar_ttl" class="form-control" name="daftar_ttl"  type="date" value="<?php echo set_value('daftar_ttl'); ?>">
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

                                    <input class="form-control" id="id_bonus_deposit" name="name_bonusdeposit"  type="hidden" value="<?php echo set_value('name_bonusdeposit', $datasetting[0]->bonus_deposit); ?>">
                                    <input  id="daftar_deposit" type="number" name="daftar_deposit" min="<?php echo $datasetting[0]->harga_member ?>"  aria-required="true" class="error" aria-invalid="true" value="<?php echo $datasetting[0]->harga_member ?>" >
                                </div>
                            </div>

                            <footer>

                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="select-1"></label>
                                    <div class="col-md-4">
                                        <input onclick="add_member(<?php echo $datasetting[0]->harga_member ?>,<?php echo $datasetting[0]->bonus_deposit ?>);" id="id_button_addmember" type="button"  name="tes" class="btn btn-primary " value="Add Member">
                                        <input type="hidden" name="button_addmember" class="btn btn-primary " value="1">
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
<!-- END MAIN CONTENT -->

<script>
    var dataorder = <?php echo json_encode($dataorder); ?>;
    var datasetting = <?php echo json_encode($datasetting); ?>;
    var urutanproduct = <?php echo $counter; ?>;
//alert (dataorder[0]['id']);
    if (dataorder[0]['statusaktifmember'] == 0)
    {
        $("#id_member").attr("disabled", "disabled");
        $("#btnModal").attr("disabled", "disabled");
        $("#id_button_addmember").prop("disable", false);

    }

    function OpenModal() {
        $(".modal-title").text("Member Registration");
    }
    function add_member(hargamember, bonusdeposit) {
        $("#id_button_addmember").prop("disable", true);
        if ($("#daftar_deposit").val() < hargamember)
        {
            alert("Minimum Deposit for new member is Rp." + hargamember + ",-")
            $("#id_button_addmember").prop("disable", false);
        } else if ($("#daftar_nama").val().length == 0 || $("#daftar_deposit").val().length == 0 || $("#daftar_email").val().length == 0 ||
                $("#daftar_ttl").val().length == 0 || $("#daftar_telepon").val().length == 0 || $("#daftar_gender").val().length == 0 ||
                $("#daftar_alamat").val().length == 0)
        {
            alert("All fields must be filled.")
            $("#id_button_addmember").prop("disable", false);
        } else
        {

            var nama = $("#daftar_nama").val();
            var deposit = $("#daftar_deposit").val();
            var bonusdeposit = $("#id_bonus_deposit").val();
            var email = $("#daftar_email").val();
            var BOD = $("#daftar_ttl").val();
            var phone = $("#daftar_telepon").val();
            var gender = $("#daftar_gender").val();
            var alamat = $("#daftar_alamat").val();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>" + "Back/Member/Add_member_from_kasir_ajax",
                datatype: "json",
                data: {
                    nama: nama,
                    deposit: deposit,
                    bonusdeposit: bonusdeposit,
                    email: email,
                    bod: BOD,
                    phone: phone,
                    alamat: alamat,
                    gender: gender,
                    idnota: dataorder[0]['id']
                },
                success: function (result) {
                    id_member = result;

                    var idnya = id_member;

                    if (idnya == 0)
                    {
                        alert("Email has been registered before.");
                        $("#id_button_addmember").prop("disable", false);
                    } else {
                        alert("Member Registration Success");
                        //alert(idnya);
                        $('#addMember').modal('toggle');

                        $("#id_body_table").append(
                                "<tr id='tr_" + urutanproduct + "'>" +
                                "<td> <div ><input readonly id='id_txt_id_product_" + urutanproduct + "' class='form-control hitung' name='name_txt_id_product[]'  type='text' value='0'></div></td>" +
                                "<td> <div ><input readonly id='id_txt_nama_product_" + urutanproduct + "' class='form-control' name='name_txt_nama_product[]'  type='text' value='Registrasi Member'></div></td>" +
                                "<td> <div ><input readonly id='id_txt_jumlah_product_" + urutanproduct + "' class='form-control jumlah' name='name_txt_jumlah_product[]'  type='text' value='1'></div></td>" +
                                "<td> <div ><input readonly id='id_txt_long_product_" + urutanproduct + "' class='form-control jumlah' name='name_txt_long_product[]'  type='text' value='1'></div></td>" +
                                "<td> <div ><input readonly id='id_txt_harga_product_" + urutanproduct + "' class='form-control harga' name='name_txt_harga_product[]' type='text' value='" + deposit + "'></div></td>" +
                                "<td> <div ><input readonly id='id_txt_diskon_product_" + urutanproduct + "' class='form-control diskon' name='name_txt_diskon_product[]'  type='text' value='0'></div></td>" +
                                "<td> <div ><input readonly id='id_txt_subtotal_product_" + urutanproduct + "' class='form-control subtotal' name='name_txt_subtotal_product[]'  type='text' value='" + deposit + "'></div></td>" +
                                "<td> <div ><input readonly id='id_txt_deskripsi_product_" + urutanproduct + "' class='form-control subtotal' name='name_txt_deskripsi_product[]'  type='text' value='ID: " + id_member + "'></div></td>" +
                                "<td> <div><i  onclick='remove_product_tr(" + urutanproduct + "); update_grandtotal(); update_total_discount(); ' style='colour:red;' class='btn glyphicon glyphicon-remove ' ></i></div></td>" +
                                "<td hidden> <div ><input  id='id_member_input' class='form-control subtotal' name='name_member_input'  type='text' value='" + idnya + "'></div></td>" +
                                "</tr>");
                        urutanproduct++;
                        update_grandtotal();



                        $("#id_member").attr("disabled", "disabled");
                        $("#btnModal").attr("disabled", "disabled");
                        $("#id_button_addmember").prop("disable", false);

                    }
                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    alert("Status: " + textStatus);
                    alert("Error: " + errorThrown);
                }
            });
        }
    }

    function remove_product_tr(y)
    {
        alert(dataorder[0]['id']);
        alert(datasetting[0]['harga_member']);
        //alert($("#id_txt_id_product_" + y).val());
        if ($("#id_txt_id_product_" + y).val() == 0)
        {

            var idmemberbaru = $("#id_member_input").val();

            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>" + "Back/Member/Cancel_add_member_in_edit",

                data: {
                    idmember: idmemberbaru,
                    idnota: dataorder[0]['id'],
                    hargamember: datasetting[0]['harga_member']
                },
                success: function (result) {
                    alert("yes");
                    $("#tr_" + y).remove();
                    $("#id_member").prop("disabled", false);
                    $("#btnModal").prop("disabled", false);

                    update_grandtotal();
                    update_total_discount();


                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    alert("eror");
                    alert("Status: " + textStatus);
                    alert("Error: " + errorThrown);
                }
            });

        } else
        {
            $("#tr_" + y).remove();
        }



    }

    function update_grandtotal()
    {//alert("alert grandtotal");
        var numItem = $('.hitung').length;

        var grandtotal = 0;
        //   var id = event.target.id;
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
        //    var id = event.target.id;
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

    function get_price(idproduk, counter, tipe)
    {

        var qty = 0;
        if (tipe == 1)
        {
            var long = parseFloat($("#id_txt_long_product_" + counter).val());
            //   alert(long);
        }
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

                                if (tipe == 2)
                                {
                                    $("#id_txt_harga_product_" + counter).val(kategoris[x]['product'][y]['harga'][z]['hargajual']);
                                } else if (tipe == 1)
                                {
                                    $("#id_txt_harga_product_" + counter).val((((parseInt(long / 101)) + 1) * 100) * kategoris[x]['product'][y]['harga'][z]['hargajual']);

                                }
                            } else if (qty >= kategoris[x]['product'][y]['harga'][z]['batasbawah'] && qty >= kategoris[x]['product'][y]['harga'][z]['batasatas'] && z == (kategoris[x]['product'][y]['harga'].length) - 1)
                            {
                                if (tipe == 2)
                                {
                                    $("#id_txt_harga_product_" + counter).val(kategoris[x]['product'][y]['harga'][z]['hargajual']);
                                } else if (tipe == 1)
                                {
                                    $("#id_txt_harga_product_" + counter).val((((parseInt(long / 101)) + 1) * 100) * kategoris[x]['product'][y]['harga'][z]['hargajual']);

                                }
                            } else if (qty > kategoris[x]['product'][y]['harga'][z]['batasatas'] && qty < kategoris[x]['product'][y]['harga'][z + 1]['batasbawah'] && z != (kategoris[x]['product'][y]['harga'].length) - 1) {
                                //kalau quantitya elbih beasr dari batas atas dan lebih kecil dari batasbawah nya z+1

                                if (tipe == 2)
                                {
                                    $("#id_txt_harga_product_" + counter).val(kategoris[x]['product'][y]['harga'][z]['hargajual']);
                                } else if (tipe == 1)
                                {
                                    $("#id_txt_harga_product_" + counter).val((((parseInt(long / 101)) + 1) * 100) * kategoris[x]['product'][y]['harga'][z]['hargajual']);

                                }
                            }

                            $("#tablebodyprice").append(
                                    "<tr >" +
                                    "<td>" + kategoris[x]['product'][y]['harga'][z]['batasbawah'] + "</td>" +
                                    "<td>" + kategoris[x]['product'][y]['harga'][z]['batasatas'] + "</td>" +
                                    "<td>" + kategoris[x]['product'][y]['harga'][z]['hargajual'] + "</td>" +
                                    "</tr>");

                        }
                    }
                }

            }
            //(((parseInt($("#id_long").val() / 101)) + 1) * 100) * $("#id_unitprice").val() 
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
    function checkNewMember() {
        var member = $("#id_member").val();
        if (member === "0") {
            $("#noMember").show();
            $("#deposit").hide();
        } else {
            // alert("yes");
            $("#noMember").hide();
            $("#deposit").show();
        }
    }

    function check_all_not_null()
    {
        $("#id_button_edit_order").prop('disabled', true);
        if ($('.barangselainmember').length == 0)
        {
            $("form").submit(function (e) {
                e.preventDefault();
            });
            alert("There must be at least 1 item to register member. Press F5 to refresh");
            $("#id_button_edit_order").prop('disabled', false);
        }
        else if ($('.hitung').length == 0)
        {
            $("form").submit(function (e) {
                e.preventDefault();
            });
            $("#id_button_edit_order").prop('disabled', false);
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
                    products.push({"id": $("#id_txt_id_product_" + counterwhile).val(), "jumlah": $("#id_txt_jumlah_product_" + counterwhile).val(), "harga": $("#id_txt_harga_product_" + counterwhile).val(), "diskon": $("#id_txt_diskon_product_" + counterwhile).val(), "subtotal": $("#id_txt_subtotal_product_" + counterwhile).val(), "jumlah2": $("#id_txt_jumlah_product2_" + counterwhile).val(), "idnotajualproduk": $("#id_txt_id_notajualproduk_" + counterwhile).val(), "deskripsi": $("#id_txt_deskripsi_product_" + counterwhile).val(), "long": $("#id_txt_long_product_" + counterwhile).val()});
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
                    if (result == 1)
                    {
                        alert("Edit Note Success");
                        $("#id_button_edit_order").prop('disabled', false);

                        for (var y = 1; y <= products.length; y++)
                        {
                            $("#id_txt_jumlah_product2_" + y).val(products[y - 1]['jumlah']);
                        }

                        tampungall = [];
                    } else {
                        alert("Product/Material : " + result + " Out of Stock");
                        $("#id_button_edit_order").prop('disabled', false);
                    }
                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    $("#id_button_edit_order").prop('disabled', false);
                    alert("oke");
                    alert("Status: " + textStatus);
                    alert("Error: " + errorThrown);
                }
            });
        }
    }
</script>

</div>
