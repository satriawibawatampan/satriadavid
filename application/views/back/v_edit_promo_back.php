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
                    Promo 
                    <span>>  
                        Edit promo
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
            <h2>Edit Promo Form </h2>				

            <span class="jarviswidget-loader"><i class="fa fa-refresh fa-spin"></i></span></header>

        <!-- widget div-->
        <div role="content">


            <div class="widget-body ">

                <form role='form' id="smart-form-register" action="<?php echo base_url(); ?>Back/Promo/Edit_promo" class="form-horizontal" novalidate="novalidate" method="post">
 <input required  class="form-control" name="name_editid" placeholder="HPP" type="hidden" value="<?php echo set_value('name_editid', $datapromo->id); ?>" />


                    <div class="form-group">
                        <label class="col-md-2 control-label">Name</label>
                        <div class="col-md-3">
                            <input id="id_txt_name_product" class="form-control" name="name_name" placeholder="Name" type="text" value="<?php echo set_value('name_name', $datapromo->nama); ?>">
                            <span class="col-md-9 text-danger">
                                <?php echo form_error('name_name'); ?>
                            </span>
                        </div>

                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Start - End</label>
                        <div class="col-md-2">
                            <input id="id_datetime_start" class="form-control" name="name_start" placeholder="Start" type="date" value="<?php echo set_value('name_start', $datapromo->awal); ?>">
                            <span class="col-md-9 text-danger">
                                <?php echo form_error('name_start'); ?>
                            </span>
                        </div>
                        <div class="col-md-2">
                            <input id="id_datetime_end" class="form-control" name="name_end" placeholder="End" type="date" value="<?php echo set_value('name_end', $datapromo->akhir); ?>">
                            <span class="col-md-9 text-danger">
                                <?php echo form_error('name_end'); ?>
                            </span>
                        </div>

                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Product</label>
                        <div   class="col-md-2">
                            <select class="form-control" name="name_product" id="id_name_product" selected ="select" >
                                <option value="0" >Please Select 1</option>
                                <?php foreach ($listproduct as $itemproduct) { ?>

                                    <option value="<?php echo $itemproduct->id; ?>" ><?php echo $itemproduct->nama; ?></option>

                                <?php } ?>
                            </select> 
                        </div>
                        <div   class="col-md-2">
                            <input class="form-control" name="name_discount"  id="id_discount" placeholder="Discount in %" type="number" min="0" value="<?php echo set_value('name_discount'); ?>">
                            <span class="col-md-9 text-danger">
                                <?php echo form_error('name_discount'); ?>
                            </span>
                        </div>

                        <div   class="col-md-2">
                            <i id="id_button_plus_item" onclick="add_promo()" style="color:blue;" class="glyphicon glyphicon-plus control-label" >Add Item</i>
                        </div>


                    </div>

                    <div  id="id_table_promo" class="form-group">
                        <label class="col-md-2 control-label"></label>

                        <div class="col-md-6">
                            <table  >
                                <thead>
                                    <tr >
                                        <th   >Product</th>
                                        <th    >Percentage</th>

                                </thead>
                                
                                <tbody id="id_body_table_promo">
                                    <?php 
                                    $urutannya = 1;
                                    foreach($datapromoproduct as $itempromoproduct){ ?>
                                    <tr id='tr_<?php echo $urutannya; ?>'>
                                        <td> <div ><input readonly id='id_txt_product_<?php echo $urutannya; ?>' class='form-control' name='name_txt_product[]' placeholder='Product' type='text' value='<?php echo $itempromoproduct->namaproduct; ?>'></div></td> 
                                        <td> <div ><input readonly id='id_txt_discount_<?php echo $urutannya; ?>' class='form-control' name='name_txt_discount[]' placeholder='Discount' type='number' value='<?php echo $itempromoproduct->diskon; ?>'></div></td> 
                                        <td> <div ><i  onclick='remove_promo_tr(<?php echo $urutannya; ?>)' style='colour:red;' class='glyphicon glyphicon-remove ' ></i></div></td> 
                                        <td ><input readonly id='id_txt_id_product_<?php echo $urutannya; ?>' class='form-control hitung' name='name_txt_id_product[]' placeholder='Qty Max' type='hidden' value='<?php echo $itempromoproduct->id_produk; ?>'></td> 
                                        </tr>
                                    <?php 
                                    $urutannya++;
                                    } ?>
                                </tbody>
                            </table>
                        </div>




                    </div>

                    <!-------------------------------------------------------------------------------------->


                    <footer>

                        <div class="form-group">
                            <label class="col-md-2 control-label" for="select-1"></label>
                            <div class="col-md-4">
                                <input onclick="check_all_not_null()" name="button_editpromo" class="btn btn-primary " value="Edit Promo">
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


    var urutanpromo = <?php echo $urutannya; ?>;


    function add_promo()
    {

        if (document.getElementById('id_name_product').value.length > 0 &&
                document.getElementById('id_discount').value.length > 0

                )
        {
            var checkingadaproductsama = this.check_product();
            //alert("checking " + checkingadamaterialsama);
            if (checkingadaproductsama == null || checkingadaproductsama === 'undifined' || checkingadaproductsama != 0)
            {
                // alert($("#id_name_material option:selected").text());
                $("#id_table_promo").show();
                $("#id_body_table_promo").append(
                        "<tr id='tr_" + urutanpromo + "'>" +
                        "<td> <div ><input readonly id='id_txt_product_" + urutanpromo + "' class='form-control' name='name_txt_product[]' placeholder='Product' type='text' value='" + $("#id_name_product option:selected").text() + "'></div></td>" +
                        "<td> <div ><input readonly id='id_txt_discount_" + urutanpromo + "' class='form-control' name='name_txt_discount[]' placeholder='Discount' type='number' value='" + $("#id_discount").val() + "'></div></td>" +
                        "<td> <div ><i  onclick='remove_promo_tr(" + urutanpromo + ")' style='colour:red;' class='glyphicon glyphicon-remove ' ></i></div></td>" +
                        "<td ><input readonly id='id_txt_id_product_" + urutanpromo + "' class='form-control hitung' name='name_txt_id_product[]' placeholder='Qty Max' type='hidden' value='" + $("#id_name_product option:selected").val() + "'></td>" +
                        "</tr>");
                urutanpromo++;
                checkingadaproductsama = 1; // bikin agar isa kebaca lagi
                //alert("urutan ke " + urutan.toString());
                $("#id_discount").val("");
            } else
            {
                alert("havebeen registerd");
            }
        } else
        {
            alert("Nulls in field Materials are not allowed");
        }
    }

    function check_product()
    {
        var numItems = $('.hitung').length;

        var id = event.target.id;
        var counterwhile = 1;
        while (numItems > 0)
        {   // jika yang dipilih ada di id-text_id_material(table)
            if ($("#id_name_product option:selected").val() == $("#id_txt_id_product_" + counterwhile).val())
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
    function remove_promo_tr(y)
    {
        //alert($("#tr_" + y).prop("id"));
        $("#tr_" + y).remove();

        if ($('.hitung').length == 0)
        {
            $("#id_table_promo").hide();
        }
    }

    function check_all_not_null()
    {

        if (
                $("#id_txt_name_product").val() == "" ||
                $("#id_datetime_start").val() == "" ||
                $("#id_datetime_end").val() == ""
                )

        {
            $("form").submit(function (e) {
                e.preventDefault();
            });
            alert("Null is not Allowed");
        } else if (new Date($("#id_datetime_start").val()).getTime() > new Date($("#id_datetime_end").val()).getTime())
        {
            $("form").submit(function (e) {
                e.preventDefault();
            });
            alert("Start must be lower than End");
        } else if ($('.hitung').length == 0)
        {
            $("form").submit(function (e) {
                e.preventDefault();
            });
            alert("Register the product first");
        }
        else
        {
        
            document.getElementById("smart-form-register").submit();
        }

    }

</script>