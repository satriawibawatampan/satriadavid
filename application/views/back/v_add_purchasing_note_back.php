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
                    Purchase 
                    <span>>  
                        Add Purchasing Note
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
            <h2>Add Purchasing Note Form </h2>				

            <span class="jarviswidget-loader"><i class="fa fa-refresh fa-spin"></i></span></header>

        <!-- widget div-->
        <div role="content">

            <!-- widget edit box -->

            <!-- end widget edit box -->

            <!-- widget content -->
            <div class="widget-body ">

                <form role='form' id="smart-form-register" action="<?php echo base_url(); ?>Back/Purchasing/Add_purchasing_note" class="form-horizontal" novalidate="novalidate" method="post">
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="select-1">Supplier</label>
                        <div class="col-md-2">
                            <select id="id_supplier" class="form-control" name="name_supplier"  selected ="select" >
                                <?php foreach ($listsupplier as $item) { ?>

                                    <option value="<?php echo $item->id; ?>" ><?php echo $item->perusahaan; ?></option>

                                <?php } ?>
                            </select> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="select-1">Material</label>
                        <div class="col-md-2">
                            <select id="id_material" onchange="checktipe()" class="form-control"   selected ="select" >
                                <?php foreach ($listmaterial as $item) { ?>

                                    <option value="<?php echo $item->id; ?>" ><?php echo $item->nama; ?></option>

                                <?php } ?>
                            </select> 
                        </div>
                    </div>

                    <input id="id_tipe"  class="form-control"   type="hidden" min="0" value="">




                    <div class="form-group">
                        <label class="col-md-2 control-label">Price</label>
                        <div class="col-md-2">
                            <input id="id_buyingprice" required class="form-control"    type="number" value="<?php echo set_value('name_buyingprice'); ?>">
                            <span class="col-md-9 text-danger">
                                <?php echo form_error('name_buyingprice'); ?>
                            </span>
                        </div>
                        <span class="cm">/CM</span>

                    </div>
                    <div class="form-group" id="id_div_pack">
                        <label class="col-md-2 control-label">Roll</label>
                        <div class="col-md-2">
                            <input id="id_quantity" class="form-control"   type="number" min="0" value="<?php echo set_value('name_quantity'); ?>">
                            <span class="col-md-9 text-danger">
                                <?php echo form_error('name_quantity'); ?>
                            </span>
                        </div>

                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" id="id_label">Amount per Pack</label>
                        <div class="col-md-2 ">
                            <input id="id_amountperpack" class="form-control"   type="number" min="0" value="<?php echo set_value('name_amountperpack'); ?>">

                            <span class="col-md-9 text-danger">
                                <?php echo form_error('name_amountperpack'); ?>
                            </span>

                        </div>

                        <span class="cm">CM</span>


                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label" for="select-1"></label>
                        <div class="col-md-4">
                            <button onclick="add_table_purchasing()" type="button"  class="btn btn-success "> Add Material </button>

                        </div>
                    </div>







                    <div hidden id="id_table_purchasing_note" class="form-group">
                        <label class="col-md-2 control-label"></label>



                        <div class="col-md-10">




                            <div class="jarviswidget jarviswidget-color-blueDark jarviswidget-sortable" id="wid-id-0" data-widget-editbutton="false" role="widget"> 
                                <div class="widget-body">
                                    <div class="table-responsive">
                                        <table id="id_table_purchasing_note" class="table table-bordered" >
                                            <thead>
                                                <tr >
                                                    <th class="col-xs-3"  >Material</th>
                                                    <th    >Buying Price</th>
                                                    <th   >Roll</th>
                                                    <th   >Long / Quantity</th>
                                                    <th   >Subtotal</th>
                                                    <th   >X</th>


                                            </thead>
                                            <tbody id="id_body_table" >	



                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <footer>

                        <div class="form-group">
                            <label class="col-md-2 control-label" for="select-1"></label>
                            <div class="col-md-4">
                                <input onclick="check_all_not_null();" type="button" name="test" id="id_button_addpurchasingnote" class="btn btn-primary " value="Create Purchasing Note">
                                <input type="hidden" name="button_addpurchasingnote" value="1"/>
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

    window.onload = function () {

        checktipe();


    };

    function checktipe()
    {
        var tipenya = null;


        // alert("a");
        $.ajax({
            async: true,
            type: "POST",
            url: "<?php echo base_url(); ?>" + "Back/Material/Json_get_one_material/" + $("#id_material").val(),
            dataType: "json",
            async: false,
            success: function (result) {

                // alert(result['tipe']);

                //  name=result;
                tipenya = result['tipe'];

                if (tipenya == 1) {

                    //alert(tipenya);
                    $("#id_quantity").val(1);
                    $("#id_tipe").val(1);
                    $("#id_div_pack").show();
                    $("#id_label").text("Long per Roll");

                    $(".cm").show();
                } else {
                    //   alert(tipenya);
                    $("#id_quantity").val(1);
                    $("#id_tipe").val(2);
                    $("#id_div_pack").hide();
                    $("#id_label").text(" Amount");

                    $(".cm").hide();

                }



            }
        });






    }

    var urutan = 1;
    var pack = $("#id_quantity").val();
    if (pack === "") {
        $("#id_quantity").val(1);
    }
    function add_table_purchasing()
    {
        if (document.getElementById('id_quantity').value == 0 ||
                document.getElementById('id_amountperpack').value == 0)
        {
            alert("Quantity can't be null");
        } else if (
                document.getElementById('id_material').value.length > 0 &&
                document.getElementById('id_buyingprice').value.length > 0 &&
                document.getElementById('id_quantity').value.length > 0 &&
                document.getElementById('id_amountperpack').value.length > 0
                )
        {
            var checkingadamaterialsama = this.check_material();
            //alert("checking " + checkingadamaterialsama);
            if (checkingadamaterialsama == null || checkingadamaterialsama === 'undifined' || checkingadamaterialsama != 0)
            {
                $("#id_table_purchasing_note").show();

                if ($("#id_tipe").val() == 1)
                {
                    $("#id_body_table").append(
                            "<tr id='tr_" + urutan + "'>" +
                            "<td> <div ><input readonly id='id_nama_material_" + urutan + "' class='form-control' name='name_name[]'   type='text' value='" + $("#id_material option:selected").text() + "'></div></td>" +
                            "<td> <div ><input readonly align='right' id='id_buyingprice_" + urutan + "' class='form-control' name='name_buyingprice[]'   type='number' value='" + $("#id_buyingprice").val() + "'></div></td>" +
                            "<td> <div ><input readonly align='right' id='id_quantity_" + urutan + "' class='form-control' name='name_quantity[]'   type='number' value='" + $("#id_quantity").val() + "'></div></td>" +
                            "<td> <div ><input readonly align='right' id='id_amountperpack_" + urutan + "' class='form-control' name='name_amountperpack[]'  type='number' value='" + $("#id_amountperpack").val() + "'></div></td>" +
                            "<td> <div ><input readonly align='right' id='id_subtotal_" + urutan + "' class='form-control' name='name_subtotal[]'   type='number' value='" + (parseInt($("#id_buyingprice").val()) * parseInt($("#id_quantity").val()) * parseInt($("#id_amountperpack").val())).toString() + "'></div></td>" +
                            "<td> <div ><i  onclick='remove_purchasing_note_tr(" + urutan + ")' style='colour:red;' class='glyphicon glyphicon-remove ' ></i></div></td>" +
                            "<td hidden > <div ><input  readonly id='id_material_" + urutan + "' class='form-control hitung' name='name_idmaterial[]'   type='number' value='" + $("#id_material option:selected").val() + "'></div></td>" +
                            "</tr>");
                } else if ($("#id_tipe").val() == 2)
                {
                    $("#id_body_table").append(
                            "<tr id='tr_" + urutan + "'>" +
                            "<td> <div ><input readonly id='id_nama_material_" + urutan + "' class='form-control' name='name_name[]'   type='text' value='" + $("#id_material option:selected").text() + "'></div></td>" +
                            "<td> <div ><input readonly align='right' id='id_buyingprice_" + urutan + "' class='form-control' name='name_buyingprice[]'   type='number' value='" + $("#id_buyingprice").val() + "'></div></td>" +
                            "<td> <div ><input  align='right' type='hidden' id='id_quantity_" + urutan + "' class='form-control' name='name_quantity[]'   type='number' value='" + $("#id_quantity").val() + "'></div><div ><input readonly align='right' class='form-control'   type='text' value='is not roll'></div></td>" +
                            "<td> <div ><input readonly align='right' id='id_amountperpack_" + urutan + "' class='form-control' name='name_amountperpack[]'  type='number' value='" + $("#id_amountperpack").val() + "'></div></td>" +
                            "<td> <div ><input readonly align='right' id='id_subtotal_" + urutan + "' class='form-control' name='name_subtotal[]'   type='number' value='" + (parseInt($("#id_buyingprice").val()) * parseInt($("#id_quantity").val()) * parseInt($("#id_amountperpack").val())).toString() + "'></div></td>" +
                            "<td> <div ><i  onclick='remove_purchasing_note_tr(" + urutan + ")' style='colour:red;' class='glyphicon glyphicon-remove ' ></i></div></td>" +
                            "<td hidden > <div ><input  readonly id='id_material_" + urutan + "' class='form-control hitung' name='name_idmaterial[]'   type='number' value='" + $("#id_material option:selected").val() + "'></div></td>" +
                            "</tr>");
                }

                urutan++;
                //   alert("urutan ke " + urutan.toString());
                $("#id_material").val(1);
                $("#id_buyingprice").val("");
                $("#id_quantity").val("");
                $("#id_amountperpack").val("");
                checkingadamaterialsama = 1; // bikin agar isa kebaca lagi
            } else
            {
                alert("havebeen registerd");
            }
        } else
        {
            alert("Nulls are not allowed");
        }
    }

    function check_material()
    {
        var numItems = $('.hitung').length;

        // var id = event.target.id;
        var counterwhile = 1;
        var atas = $("#id_material option:selected").val();
        var bawah = $("#id_material_" + counterwhile).val();
        while (numItems > 0)
        {   // jika yang dipilih ada di id-text_id_material(table)

            if ($("#id_material option:selected").val() == $("#id_material_" + counterwhile).val())
            {
                counterwhile = 1;
                //kembalikan 0 untuk alert dari fungsi sebelumnya
                return 0;
                break;
            }
            if ($("#id_material_" + counterwhile).length > 0)
            {
                numItems--;
            }
            counterwhile++;

        }
        return 1;

    }

    function remove_purchasing_note_tr(y)
    {
        //   alert($("#tr_"+urutan).prop("id"));
        $("#tr_" + y).remove();
    }

    function check_all_not_null()
    {

        if ($('.hitung').length == 0 || $("#id_supplier") == null)
        {
            alert("Register at least 1 material to purchasing note & Supplier can't be Null");
            $("#id_button_addpurchasingnote").prop('disabled', false);

        } else
        {
            $("#id_button_addpurchasingnote").prop('disabled', false);
            //    alert("yes");

            $("#smart-form-register").submit();
            $("#id_button_addpurchasingnote").prop('disabled', true);
        }


    }
</script>