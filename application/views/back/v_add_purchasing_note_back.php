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

        <header role="heading"><div class="jarviswidget-ctrls" role="menu">   <a href="javascript:void(0);" class="button-icon jarviswidget-toggle-btn" rel="tooltip" title="" data-placement="bottom" data-original-title="Collapse"><i class="fa fa-minus "></i></a> <a href="javascript:void(0);" class="button-icon jarviswidget-fullscreen-btn" rel="tooltip" title="" data-placement="bottom" data-original-title="Fullscreen"><i class="fa fa-expand "></i></a> <a href="javascript:void(0);" class="button-icon jarviswidget-delete-btn" rel="tooltip" title="" data-placement="bottom" data-original-title="Delete"><i class="fa fa-times"></i></a></div><div class="widget-toolbar" role="menu"><a data-toggle="dropdown" class="dropdown-toggle color-box selector" href="javascript:void(0);"></a><ul class="dropdown-menu arrow-box-up-right color-select pull-right"><li><span class="bg-color-green" data-widget-setstyle="jarviswidget-color-green" rel="tooltip" data-placement="left" data-original-title="Green Grass"></span></li><li><span class="bg-color-greenDark" data-widget-setstyle="jarviswidget-color-greenDark" rel="tooltip" data-placement="top" data-original-title="Dark Green"></span></li><li><span class="bg-color-greenLight" data-widget-setstyle="jarviswidget-color-greenLight" rel="tooltip" data-placement="top" data-original-title="Light Green"></span></li><li><span class="bg-color-purple" data-widget-setstyle="jarviswidget-color-purple" rel="tooltip" data-placement="top" data-original-title="Purple"></span></li><li><span class="bg-color-magenta" data-widget-setstyle="jarviswidget-color-magenta" rel="tooltip" data-placement="top" data-original-title="Magenta"></span></li><li><span class="bg-color-pink" data-widget-setstyle="jarviswidget-color-pink" rel="tooltip" data-placement="right" data-original-title="Pink"></span></li><li><span class="bg-color-pinkDark" data-widget-setstyle="jarviswidget-color-pinkDark" rel="tooltip" data-placement="left" data-original-title="Fade Pink"></span></li><li><span class="bg-color-blueLight" data-widget-setstyle="jarviswidget-color-blueLight" rel="tooltip" data-placement="top" data-original-title="Light Blue"></span></li><li><span class="bg-color-teal" data-widget-setstyle="jarviswidget-color-teal" rel="tooltip" data-placement="top" data-original-title="Teal"></span></li><li><span class="bg-color-blue" data-widget-setstyle="jarviswidget-color-blue" rel="tooltip" data-placement="top" data-original-title="Ocean Blue"></span></li><li><span class="bg-color-blueDark" data-widget-setstyle="jarviswidget-color-blueDark" rel="tooltip" data-placement="top" data-original-title="Night Sky"></span></li><li><span class="bg-color-darken" data-widget-setstyle="jarviswidget-color-darken" rel="tooltip" data-placement="right" data-original-title="Night"></span></li><li><span class="bg-color-yellow" data-widget-setstyle="jarviswidget-color-yellow" rel="tooltip" data-placement="left" data-original-title="Day Light"></span></li><li><span class="bg-color-orange" data-widget-setstyle="jarviswidget-color-orange" rel="tooltip" data-placement="bottom" data-original-title="Orange"></span></li><li><span class="bg-color-orangeDark" data-widget-setstyle="jarviswidget-color-orangeDark" rel="tooltip" data-placement="bottom" data-original-title="Dark Orange"></span></li><li><span class="bg-color-red" data-widget-setstyle="jarviswidget-color-red" rel="tooltip" data-placement="bottom" data-original-title="Red Rose"></span></li><li><span class="bg-color-redLight" data-widget-setstyle="jarviswidget-color-redLight" rel="tooltip" data-placement="bottom" data-original-title="Light Red"></span></li><li><span class="bg-color-white" data-widget-setstyle="jarviswidget-color-white" rel="tooltip" data-placement="right" data-original-title="Purity"></span></li><li><a href="javascript:void(0);" class="jarviswidget-remove-colors" data-widget-setstyle="" rel="tooltip" data-placement="bottom" data-original-title="Reset widget color to default">Remove</a></li></ul></div>
            <span class="widget-icon"> <i class="fa fa-edit"></i> </span>
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
                            <select id="id_material" class="form-control"   selected ="select" >
                                <?php foreach ($listmaterial as $item) { ?>

                                    <option value="<?php echo $item->id; ?>" ><?php echo $item->nama; ?></option>

                                <?php } ?>
                            </select> 
                        </div>
                    </div>



                    <div class="form-group">
                        <label class="col-md-2 control-label">Buying Price per Single Item</label>
                        <div class="col-md-2">
                            <input id="id_buyingprice" required class="form-control"  placeholder="HPP" type="number" value="<?php echo set_value('name_buyingprice'); ?>">
                            <span class="col-md-9 text-danger">
                                <?php echo form_error('name_buyingprice'); ?>
                            </span>
                        </div>

                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Quantity (Big Pack)</label>
                        <div class="col-md-2">
                            <input id="id_quantity" class="form-control" placeholder="Quantity" type="number" value="<?php echo set_value('name_quantity'); ?>">
                            <span class="col-md-9 text-danger">
                                <?php echo form_error('name_quantity'); ?>
                            </span>
                        </div>

                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Amount per Pack</label>
                        <div class="col-md-2 ">
                            <input id="id_amountperpack" class="form-control"  placeholder="Ammount per Pack" type="number" value="<?php echo set_value('name_amountperpack'); ?>">
                            <span class="col-md-9 text-danger">
                                <?php echo form_error('name_amountperpack'); ?>
                            </span>
                            
                        </div>

                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label" for="select-1"></label>
                        <div class="col-md-4">
                            <button onclick="add_table_purchasing()" type="button" name="button_addpurchasingnote" class="btn btn-success " >Add Item </button>

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
                                                    <th   >Quantity</th>
                                                    <th   >Amount per Pack</th>
                                                    <th   >Subtotal</th>


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
                                <input type="submit" name="button_addpurchasingnote" class="btn btn-primary " value="Add Material">
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
    function add_table_purchasing()
            {


                if (
                        document.getElementById('id_material').value.length > 0 &&
                        document.getElementById('id_buyingprice').value.length > 0 &&
                        document.getElementById('id_quantity').value.length > 0 &&
                        document.getElementById('id_amountperpack').value.length > 0
                        )
                {

                    $("#id_table_purchasing_note").show();

                    $("#id_body_table").append(
                            "<tr id='tr_" + urutan + "'>" +
                            "<td> <div ><input readonly id='id_material_" + urutan + "' class='form-control' name='name_name[]' placeholder='Id Material' type='text' value='" + $("#id_material option:selected").text() + "'></div></td>" +
                            "<td> <div ><input readonly align='right' id='id_buyingprice_" + urutan + "' class='form-control' name='name_buyingprice[]' placeholder='Buying Price' type='number' value='" + $("#id_buyingprice").val() + "'></div></td>" +
                            "<td> <div ><input readonly align='right' id='id_quantity_" + urutan + "' class='form-control' name='name_quantity[]' placeholder='Quantity' type='number' value='" + $("#id_quantity").val() + "'></div></td>" +
                            "<td> <div ><input readonly align='right' id='id_amountperpack_" + urutan + "' class='form-control' name='name_amountperpack[]' placeholder='Amount per Pack' type='number' value='" + $("#id_amountperpack").val() + "'></div></td>" +
                            "<td> <div ><input readonly align='right' id='id_subtotal_" + urutan + "' class='form-control' name='name_subtotal[]' placeholder='Subtotal' type='number' value='" + (parseInt($("#id_buyingprice").val())*parseInt($("#id_quantity").val())*parseInt($("#id_amountperpack").val())).toString() + "'></div></td>" +
                           "<td> <div ><i  onclick='remove_purchasing_note_tr(" + urutan     + ")' style='colour:red;' class='glyphicon glyphicon-remove ' ></i></div></td>" +
                           "<td hidden> <div ><input  readonly id='id_material_" + urutan + "' class='form-control' name='name_idmaterial[]' placeholder='Id Material' type='number' value='" + $("#id_material").val() + "'></div></td>" +
            "</tr>");

                    urutan++;
                    alert("urutan ke " + urutan.toString());
                    $("#id_material").val(1);
                    $("#id_buyingprice").val("");
                    $("#id_quantity").val("");
                    $("#id_amountperpack").val("");

                } else
                {
                    alert("Nulls are not allowed");
                }
            }
            
              function remove_purchasing_note_tr(y)
            {
             //   alert($("#tr_"+urutan).prop("id"));
                $("#tr_"+y).remove();
            }
    </script>