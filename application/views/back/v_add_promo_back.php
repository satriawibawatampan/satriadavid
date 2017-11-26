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
                        Add promo
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
            <h2>Add Promo Form </h2>				

            <span class="jarviswidget-loader"><i class="fa fa-refresh fa-spin"></i></span></header>

        <!-- widget div-->
        <div role="content">


            <div class="widget-body ">

                <form role='form' id="smart-form-register" action="<?php echo base_url(); ?>Back/Promo/Add_promo" class="form-horizontal" novalidate="novalidate" method="post">


                    <div class="form-group">
                        <label class="col-md-2 control-label">Name</label>
                        <div class="col-md-3">
                            <input id="id_txt_name_product" class="form-control" name="name_name" placeholder="Name" type="text" value="<?php echo set_value('name_name'); ?>">
                            <span class="col-md-9 text-danger">
                                <?php echo form_error('name_name'); ?>
                            </span>
                        </div>

                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Start - End</label>
                        <div class="col-md-2">
                            <input id="id_datetime_start" class="form-control" name="name_start" placeholder="Start" type="date" value="<?php echo set_value('name_start'); ?>">
                            <span class="col-md-9 text-danger">
                                <?php echo form_error('name_start'); ?>
                            </span>
                        </div>
                        <div class="col-md-2">
                            <input id="id_datetime_end" class="form-control" name="name_end" placeholder="End" type="date" value="<?php echo set_value('name_end'); ?>">
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
                            <input class="form-control" name="name_discount"  id="id_discount" placeholder="Discount" type="number" min="0" value="<?php echo set_value('name_discount'); ?>">
                            <span class="col-md-9 text-danger">
                                <?php echo form_error('name_discount'); ?>
                            </span>
                        </div>

                        <div   class="col-md-2">
                            <i id="id_button_plus_item" onclick="add_promo()" style="color:blue;" class="glyphicon glyphicon-plus control-label" >Add Item</i>
                        </div>


                    </div>

                    <div hidden id="id_table_promo" class="form-group">
                        <label class="col-md-2 control-label"></label>

                        <div class="col-md-6 table-responsive">
                            <table class="table table-bordered table-striped"   >
                                <thead>
                                    <tr >
                                        <th   >Product</th>
                                        <th    >Percentage</th>
                                        <th    >X</th>

                                </thead>
                                <tbody id="id_body_table_promo">	


                                </tbody>
                            </table>
                        </div>




                    </div>

                    <!-------------------------------------------------------------------------------------->


                    <footer>

                        <div class="form-group">
                            <label class="col-md-2 control-label" for="select-1"></label>
                            <div class="col-md-4">
                                <input onclick="check_all_not_null()"  name="button_addpromo" class="btn btn-primary " value="Add Material">
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


    var urutanpromo = 1;
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
                        "<td hidden ><input readonly id='id_txt_id_product_" + urutanpromo + "' class='form-control hitung' name='name_txt_id_product[]' placeholder='Qty Max' type='hidden' value='" + $("#id_name_product option:selected").val() + "'></td>" +
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
        } else
        {
            var datestart = $("#id_datetime_start").val();
            var dateend = $("#id_datetime_end").val();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>" + "Back/Promo/Check_for_register_promo",
                dataType: "json",
                data: {

                    start: datestart,
                    end: dateend

                },
                success: function (result) {

                    //alert(result[0]['kode'] == 1);
                    if (result[0]['kode'] == 0)
                    {
                        alert("There is another promo on that days");
                    } else if (result[0]['kode'] == 1)
                    {
                        document.getElementById("smart-form-register").submit();

                    }



                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    alert("Status: " + textStatus);
                    alert("Error: " + errorThrown);
                }
            });


        }

    }

</script>