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
                    Material 
                    <span>>  
                        Add Material
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
            <h2>Add Material Form </h2>				

            <span class="jarviswidget-loader"><i class="fa fa-refresh fa-spin"></i></span></header>

        <!-- widget div-->
        <div role="content">

            <!-- widget edit box -->

            <!-- end widget edit box -->

            <!-- widget content -->
            <div class="widget-body ">

                <form role='form' id="smart-form-register" action="<?php echo base_url(); ?>Back/Material/Add_material" class="form-horizontal" novalidate="novalidate" method="post">
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="select-1">Type</label>
                        <div class="col-md-2">
                            <select class="form-control" name="name_type" id="select-1" selected ="select" >
                                <option value="2" >Ordinary</option>
                                <option value="1" >Special (Role)</option>
                            </select> 
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Name</label>
                        <div class="col-md-3">
                            <input class="form-control" name="name_name" placeholder="Name" type="text" value="<?php echo set_value('name_name'); ?>">
                            <span class="col-md-9 text-danger">
                                <?php echo form_error('name_name'); ?>
                            </span>
                        </div>

                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">HPP</label>
                        <div class="col-md-3">
                            <input class="form-control" name="name_hpp" placeholder="HPP" type="text" value="<?php echo set_value('name_hpp'); ?>">
                            <span class="col-md-9 text-danger">
                                <?php echo form_error('name_hpp'); ?>
                            </span>
                        </div>

                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Amount per Pack</label>
                        <div class="col-md-2">
                            <input class="form-control" name="name_amountperpack" placeholder="Ammount per Pack" type="number" value="<?php echo set_value('name_amountperpack'); ?>">
                            <span class="col-md-9 text-danger">
                                <?php echo form_error('name_amountperpack'); ?>
                            </span>
                        </div>

                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Stock</label>
                        <div class="col-md-2">
                            <input class="form-control" name="name_bigstock" placeholder="Stock" type="number" value="<?php echo set_value('name_bigstock'); ?>">
                            <span class="col-md-9 text-danger">
                                <?php echo form_error('name_bigstock'); ?>
                            </span>
                        </div>

                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-2 control-label">Retail Price</label>
                        <div   class="col-md-2">
                            <input id="id_txt_price_retail" class="form-control" name="name_retailprice" placeholder="Price" type="number" value="<?php echo set_value('name_retailprice'); ?>">   


                            <span class="col-md-9 text-danger">
                                <?php echo form_error('name_retailprice'); ?>
                            </span>
                        </div>
                        <div   class="col-md-2">
                            <i id="id_button_plus" onclick="show_div_grossir()" style="color:blue;" class="btn glyphicon glyphicon-plus control-label" >Tambah Harga Grosir</i>
                        </div>
                        <!--                        <div  hidden id="id_button_reset"   class="col-md-2">
                                                    <i  onclick="reset_grosir_price()" style="colour:red" class="glyphicon glyphicon-trash control-label" >Reset Grossir Price</i>
                                                </div>-->

                        <div  hidden id="id_button_reset"   class="col-md-2">
                            <i  onclick="reset_grosir_price()" style="colour:red" class="btn glyphicon glyphicon-trash control-label" >Reset Grossir Price</i>
                        </div>


                    </div>
                    <div hidden id="id_div_grossir" class="form-group">
                        <label class="col-md-2 control-label">Grossir Price</label>
                        <div class="col-md-2">
                            <input id="id_input_qty_min" class="form-control"  placeholder="Qty Min" type="number" >
                            <span class="col-md-9 text-danger">

                        </div>
                        <div class="col-md-2">
                            <input id="id_input_qty_max" class="form-control"  placeholder="Qty Max" type="number" >
                            <span class="col-md-9 text-danger">

                            </span>
                        </div>

                        <div class="col-md-2">
                            <input id="id_input_price_grossir" class="form-control"  placeholder="Price" type="number" >
                            <span class="col-md-9 text-danger">

                            </span>
                        </div>
                        <div id="id_button_plus"  class="col-md-2">
                            <i  onclick="add_grossir_price()" style="color:blue;"  class="btn glyphicon glyphicon-plus control-label" >Add Grossir Price</i>
                        </div>


                    </div>

                    <div hidden id="id_table_grossir" class="form-group">
                        <label class="col-md-2 control-label"></label>

                        <div class="col-md-6 table-responsive">
                            <table id="" id="id_table" class="table table-bordered table-striped" >
                                <thead>
                                    <tr >
                                        <th   >Minimal Quantity</th>
                                        <th    >Maximal Quantity</th>
                                        <th   >Price</th>

                                </thead>
                                    <tbody id="id_body_table" >	

                                    

                                </tbody>
                            </table>
                        </div>




                    </div>








                    <footer>
                        
                        <div class="form-group">
                            <label class="col-md-2 control-label" for="select-1"></label>
                            <div class="col-md-4">
                                <input onclick="show_div_grossir()" type="submit" name="button_addmaterial" class="btn btn-primary " value="Add Material">
                            </div>
                        </div>


                    </footer>
                </form>						

            </div>
            <!-- end widget content 

        </div>
        <!-- end widget div -->

    </div>
</div>
<!-- END MAIN CONTENT -->

</div>
<script>
     var urutan = 1;
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
                    document.getElementById('id_button_plus').setAttribute("class", "btn glyphicon glyphicon-trash control-label");
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
                urutan = 1;

                document.getElementById('id_button_plus').setAttribute("onClick", "show_div_grossir()");
                document.getElementById('id_button_plus').setAttribute("style", "color:blue");
                document.getElementById('id_button_plus').setAttribute("class", "btn glyphicon glyphicon-plus control-label");
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
                                        "<td> <div ><input readonly id='id_txt_price_" + urutan + "' class='form-control' name='name_price[]' placeholder='Price' type='number' value='" + $("#id_input_price_grossir").val() + "'></div></td>" +
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
                    alert("Nulls are not allowed");
                }
            }
</script>