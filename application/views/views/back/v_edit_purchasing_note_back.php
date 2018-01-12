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
                    Purchasing Note 
                    <span>>  
                        Edit Purchasing Note
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





    <?php if (($datapurchasingnote) != null) { ?>

        <div class="jarviswidget jarviswidget-sortable" id="wid-id-4" data-widget-editbutton="false" data-widget-custombutton="false" role="widget">

            <header role="heading">
                <span class="widget-icon"> <i class="fa fa-edit"></i> </span>
                <h2>Edit Purchasing Note Form </h2>				

                <span class="jarviswidget-loader"><i class="fa fa-refresh fa-spin"></i></span></header>

            <!-- widget div-->
            <div role="content">


                <div class="widget-body ">

                    <?php if (isset($_SESSION['pesanformaddmaterial'])) { ?>
                        <div class="alert alert-success">
                            <?php echo $_SESSION['pesanformaddmaterial']; ?>

                        </div>
                    <?php } ?>

                    <form role='form' id="smart-form-register" action="<?php echo base_url(); ?>Back/Purchasing/Edit_purchasing_note" class="form-horizontal" novalidate="novalidate" method="post">
                        <input  id="" class="form-control" name="name_editidnota" placeholder="Quantity" type="hidden" value="<?php echo $datapurchasingnote[0]->id; ?>">

                        <div class="form-group">
                            <label class="col-md-2 control-label" for="select-1">Supplier</label>
                            <div class="col-md-2">
                                <select id="id_supplier" class="form-control" name="name_editsupplier"  selected ="select" >
                                    <?php
                                    foreach ($listsupplier as $item) {
                                        if ($item->id == $datapurchasingnote[0]->idsupplier) {
                                            ?>

                                            <option value="<?php echo $item->id; ?>"  selected="select" ><?php echo $item->perusahaan; ?></option>

                                        <?php } else {
                                            ?>
                                            <option value="<?php echo $item->id; ?>" ><?php echo $item->perusahaan; ?></option>

                                            <?php
                                        }
                                    }
                                    ?>
                                </select> 
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label" for="select-1"></label>
                            <div class="col-md-10">
                                <div class="jarviswidget jarviswidget-color-blueDark jarviswidget-sortable" id="wid-id-0" data-widget-editbutton="false" role="widget"> 
                                    <div class="widget-body">
                                        <div class="table-responsive">
                                            <table id="" class="table table-bordered" >
                                                <thead>
                                                    <tr >
                                                        <th class="col-xs-3"  >Material</th>
                                                        <th    >Buying Price</th>
                                                        <th   >Quantity</th>
                                                        <th   >Amount per Pack</th>
                                                        <th   >Subtotal</th>


                                                </thead>

                                                <script>
                                                    var idsekarang = "";
                                                    var valuesekarang = "";
                                                    function get_idselect()
                                                    {
                                                        // $( "#myselect option:selected" ).text(); 

                                                        idsekarang = event.target.id;
                                                        valuesekarang = $("#" + idsekarang + " option:selected").val();
                                                        // alert(valuesekarang);
                                                    }

                                                    function check_material()
                                                    {

                                                        // 
                                                        var id = event.target.id;
                                                        var counter = id.substring(16);
                                                        // alert(id);
                                                        // alert(" value sekarang " + $("#" + id + " option:selected").val());
                                                        //  alert("value tadi = " + valuesekarang);

                                                        counterwhile = 1;
                                                        while ($("#id_editmaterial_" + counterwhile).length != 0)
                                                        {
                                                            if ($("#" + id + " option:selected").val() == $("#id_editmaterial_" + counterwhile + " option:selected").val() &&
                                                                    counterwhile != counter)
                                                            {

                                                                $("#" + id).val(valuesekarang).change();
                                                                alert("Material has been registered in this note before");
                                                                // $("#"+idsekarang+"  option:selected ").val(1);
                                                                counterwhile = 1;
                                                                break;
                                                            }
                                                            counterwhile++;
                                                        }

                                                    }

                                                </script>
                                                <tbody id="" >	
                                                    <?php
                                                    $urutan = 1;
                                                    foreach ($datapurchasingnote as $item) {
                                                        ?>
                                                        <tr>
                                                            <td> 
                                                                <div>
                                                                    <select onclick="get_idselect()" onchange="check_material();checktipe(<?php echo $urutan; ?>);" id="id_editmaterial_<?php echo $urutan; ?>" class="form-control" name="name_editmaterials[]"  id="select-1" selected ="select"  >
                                                                        <?php
                                                                        foreach ($listmaterial as $itemmaterial) {
                                                                            if ($itemmaterial->id == $item->idmaterial) {
                                                                                ?>

                                                                                <option value="<?php echo $itemmaterial->id; ?>" selected="select" >  <?php echo $itemmaterial->nama; ?></option>

                                                                                <?php
                                                                            } else {
                                                                                ?>
                                                                                <option value="<?php echo $itemmaterial->id; ?>"  >  <?php echo $itemmaterial->nama; ?></option>

                                                                                <?php
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </select> </div>
                                                            </td>
                                                            <td> 
                                                                <div>
                                                                    <input id="id_editbuyingprice_<?php echo $urutan; ?>" class="form-control" name="name_editbuyingprice[]"   type="number" min="0" value="<?php echo $item->harga; ?>">
                                                                </div>
                                                            </td>
                                                            <td> 
                                                                <?php if ($item->tipematerial == 1) { ?>
                                                                    <div>
                                                                        <input  id="id_editquantity_<?php echo $urutan; ?>" class="form-control" name="name_editquantity[]"   min="0" type="number" value="<?php echo $item->jumlahmaterial; ?>">
                                                                    </div>
                                                                <?php } else if ($item->tipematerial == 2) { ?>
                                                                    <div>
                                                                        <input   id="id_editquantity_<?php echo $urutan; ?>" class="form-control" name="name_editquantity[]"   min="0" type="number" value="<?php echo $item->jumlahmaterial; ?>"><span class="notroll">is not roll</span> 
                                                                    </div>
                                                                <?php } ?>
                                                            </td>
                                                            <td> 
                                                                <div>
                                                                    <input  id="id_editamountperpack_<?php echo $urutan; ?>" class="form-control" name="name_editamountperpack[]"  min="0" type="number" value="<?php echo $item->jumlahperpak; ?>">
                                                                </div>
                                                            </td>
                                                            <td> 
                                                                <div>
                                                                    <input readonly  id="id_editsubtotal_<?php echo $urutan; ?>" class="form-control" name="name_editsubtotal[]"  type="text" value="<?php echo $item->subtotal; ?>">
                                                                </div>
                                                            </td>
                                                    <input id="id_editidmaterialold_<?php echo $urutan; ?>" class="form-control" name="name_editidmaterialold[]"   type="hidden" value="<?php echo $item->idmaterial; ?>">


                                                    </tr>
                                                    <?php
                                                    $urutan++;
                                                }
                                                ?>
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
                                    <input  type="submit" name="button_editpurchasingnote" class="btn btn-primary " value="Edit Purchasing Note">
                                </div>
                            </div>


                        </footer>
                    </form>



                </div>
            </div>
        </div>

        <!--------------------------------------------------------------------------------------------------------->
        <!--------------------------------------------------------------------------------------------------------->
        <!--------------------------------------------------------------------------------------------------------->
        <!--------------------------------------------------------------------------------------------------------->
        <!--------------------------------------------------------------------------------------------------------->
        <!--------------------------------------------------------------------------------------------------------->
        <!--------------------------------------------------------------------------------------------------------->

        <!--            <div class="jarviswidget jarviswidget-sortable" id="wid-id-4" data-widget-editbutton="false" data-widget-custombutton="false" role="widget">
                
                        <header role="heading">
                            <span class="widget-icon"> <i class="fa fa-edit"></i> </span>
                            <h2>Add More Items in Purchasing Note Form <?php echo $datapurchasingnote[0]->id; ?> </h2>				
                
                            <span class="jarviswidget-loader"><i class="fa fa-refresh fa-spin"></i></span></header>
                
                         widget div
                        <div role="content">
                
                
                            <div class="widget-body ">
                                <form role='form' id="smart-form-register" action="<?php echo base_url(); ?>Back/Purchasing/Add_more_purchasing_note" class="form-horizontal" novalidate="novalidate" method="post">
                
                
                                    <div class="form-group">
                                        <label class="col-md-2 control-label" for="select-1">Material</label>
                                        <div class="col-md-2">
                                            <select id="id_material" class="form-control" name="name_addmaterial"   selected ="select" >
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
                             end widget content 
                
                        </div>
                         end widget div 
                
                    </div>-->
        <?php
    } else {
        ?>
        <span>Purchasing Note is not found</span>
    <?php }
    ?>

</div>
<!-- END MAIN CONTENT -->

</div>

<script>


    function remove_purchasing_note_tr(y)
    {
        alert($("#tr_" + urutan).prop("id"));
        $("#tr_" + y).remove();
    }

    function checktipe(y)
    {
        var tipenya = null;
        var idmaterial = $("#id_editmaterial_"+y).val();

        // alert("a");
        $.ajax({
            async: true,
            type: "POST",
            url: "<?php echo base_url(); ?>" + "Back/Material/Json_get_one_material/" + idmaterial,
            dataType: "json",
            async: false,
            success: function (result) {

               
                tipenya = result['tipe'];

                if (tipenya == 1) {

                    alert(tipenya);
                    $("#id_editquantity_" + y).val(1);
                    $("#id_editquantity_" + y).show();
                    //document.getElementById("id_editquantity_"+y).style.visibility = "hidden";
                  // $("#id_edit_quantity_" + y).type("");
                    $(".notroll").hide();

                } else if(tipenya==2) {
                      alert(tipenya);
                    $("#id_editquantity_" + y).val(1);
                    $(".notroll").show();
                     $("#id_editquantity_" + y).hide();
                }



            }
        });






    }
</script>