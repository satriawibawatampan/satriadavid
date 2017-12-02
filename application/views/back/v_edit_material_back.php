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
                        Edit Material
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
            <h2>Edit Material Form </h2>				

            <span class="jarviswidget-loader"><i class="fa fa-refresh fa-spin"></i></span></header>

        <!-- widget div-->
        <div role="content">


            <div class="widget-body ">

                <form role='form' id="smart-form-register" action="<?php echo base_url(); ?>Back/Material/Edit_material" class="form-horizontal" novalidate="novalidate" method="post">
                    <input required  class="form-control" name="name_editid" placeholder="HPP" type="hidden" value="<?php echo set_value('name_editid', $datamaterial->id); ?>" />

                    <div class="form-group">
                        <label class="col-md-2 control-label" for="select-1">Type</label>
                        <div class="col-md-2">
                            <select class="form-control" name="name_edittype" id="select-1"  >
                                <?php if ($datamaterial->tipe == 1) { ?>
                                    <option value="2" >Ordinary</option>
                                    <option value="1" selected="select">Special (Role)</option>

                                <?php } else if ($datamaterial->tipe == 2) {
                                    ?>
                                    <option value="2" selected="select" >Ordinary</option>
                                    <option value="1" >Special (Role)</option>

                                <?php } ?>
                            </select> 
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Name</label>
                        <div class="col-md-3">
                            <input class="form-control" name="name_editname" placeholder="Name" type="text" value="<?php echo set_value('name_editname', $datamaterial->nama); ?>">
                            <span class="col-md-9 text-danger">
                                <?php echo form_error('name_editname'); ?>
                            </span>
                        </div>

                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">HPP</label>
                        <div class="col-md-3">
                            <input required class="form-control" name="name_edithpp" placeholder="HPP" type="text" value="<?php echo set_value('name_edithpp', $datamaterial->hargapokok); ?>" />
                            <span class="col-md-9 text-danger">
                                <?php echo form_error('name_edithpp'); ?>
                            </span>
                        </div>

                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Minimum Stock</label>
                        <div class="col-md-3">
                            <input required class="form-control" name="name_minimumstock" placeholder="Minimum Stock" type="number" value="<?php echo set_value('name_minimumstock', $datamaterial->minimum_stok); ?>" />
                            <span class="col-md-9 text-danger">
                                <?php echo form_error('name_minimumstock'); ?>
                            </span>
                        </div>

                    </div>

                    <footer>

                        <div class="form-group">
                            <label class="col-md-2 control-label" for="select-1"></label>
                            <div class="col-md-4">
                                <input type="submit" name="button_editmaterial" class="btn btn-primary " value="Edit Material">
                            </div>
                        </div>


                    </footer>
                </form>	

            </div>
            <!-- end widget content -->

        </div>
        <!-- end widget div -->

    </div>




    <div class="jarviswidget jarviswidget-sortable" id="wid-id-4" data-widget-editbutton="false" data-widget-custombutton="false" role="widget">

        <header role="heading"><div class="jarviswidget-ctrls" role="menu">   <a href="javascript:void(0);" class="button-icon jarviswidget-toggle-btn" rel="tooltip" title="" data-placement="bottom" data-original-title="Collapse"><i class="fa fa-minus "></i></a> <a href="javascript:void(0);" class="button-icon jarviswidget-fullscreen-btn" rel="tooltip" title="" data-placement="bottom" data-original-title="Fullscreen"><i class="fa fa-expand "></i></a> <a href="javascript:void(0);" class="button-icon jarviswidget-delete-btn" rel="tooltip" title="" data-placement="bottom" data-original-title="Delete"><i class="fa fa-times"></i></a></div><div class="widget-toolbar" role="menu"><a data-toggle="dropdown" class="dropdown-toggle color-box selector" href="javascript:void(0);"></a><ul class="dropdown-menu arrow-box-up-right color-select pull-right"><li><span class="bg-color-green" data-widget-setstyle="jarviswidget-color-green" rel="tooltip" data-placement="left" data-original-title="Green Grass"></span></li><li><span class="bg-color-greenDark" data-widget-setstyle="jarviswidget-color-greenDark" rel="tooltip" data-placement="top" data-original-title="Dark Green"></span></li><li><span class="bg-color-greenLight" data-widget-setstyle="jarviswidget-color-greenLight" rel="tooltip" data-placement="top" data-original-title="Light Green"></span></li><li><span class="bg-color-purple" data-widget-setstyle="jarviswidget-color-purple" rel="tooltip" data-placement="top" data-original-title="Purple"></span></li><li><span class="bg-color-magenta" data-widget-setstyle="jarviswidget-color-magenta" rel="tooltip" data-placement="top" data-original-title="Magenta"></span></li><li><span class="bg-color-pink" data-widget-setstyle="jarviswidget-color-pink" rel="tooltip" data-placement="right" data-original-title="Pink"></span></li><li><span class="bg-color-pinkDark" data-widget-setstyle="jarviswidget-color-pinkDark" rel="tooltip" data-placement="left" data-original-title="Fade Pink"></span></li><li><span class="bg-color-blueLight" data-widget-setstyle="jarviswidget-color-blueLight" rel="tooltip" data-placement="top" data-original-title="Light Blue"></span></li><li><span class="bg-color-teal" data-widget-setstyle="jarviswidget-color-teal" rel="tooltip" data-placement="top" data-original-title="Teal"></span></li><li><span class="bg-color-blue" data-widget-setstyle="jarviswidget-color-blue" rel="tooltip" data-placement="top" data-original-title="Ocean Blue"></span></li><li><span class="bg-color-blueDark" data-widget-setstyle="jarviswidget-color-blueDark" rel="tooltip" data-placement="top" data-original-title="Night Sky"></span></li><li><span class="bg-color-darken" data-widget-setstyle="jarviswidget-color-darken" rel="tooltip" data-placement="right" data-original-title="Night"></span></li><li><span class="bg-color-yellow" data-widget-setstyle="jarviswidget-color-yellow" rel="tooltip" data-placement="left" data-original-title="Day Light"></span></li><li><span class="bg-color-orange" data-widget-setstyle="jarviswidget-color-orange" rel="tooltip" data-placement="bottom" data-original-title="Orange"></span></li><li><span class="bg-color-orangeDark" data-widget-setstyle="jarviswidget-color-orangeDark" rel="tooltip" data-placement="bottom" data-original-title="Dark Orange"></span></li><li><span class="bg-color-red" data-widget-setstyle="jarviswidget-color-red" rel="tooltip" data-placement="bottom" data-original-title="Red Rose"></span></li><li><span class="bg-color-redLight" data-widget-setstyle="jarviswidget-color-redLight" rel="tooltip" data-placement="bottom" data-original-title="Light Red"></span></li><li><span class="bg-color-white" data-widget-setstyle="jarviswidget-color-white" rel="tooltip" data-placement="right" data-original-title="Purity"></span></li><li><a href="javascript:void(0);" class="jarviswidget-remove-colors" data-widget-setstyle="" rel="tooltip" data-placement="bottom" data-original-title="Reset widget color to default">Remove</a></li></ul></div>
            <span class="widget-icon"> <i class="fa fa-edit"></i> </span>
            <h2>Edit Material Stock Form </h2>				

            <span class="jarviswidget-loader"><i class="fa fa-refresh fa-spin"></i></span></header>

        <!-- widget div-->
        <div role="content">


            <div class="widget-body ">

                <?php if (isset($_SESSION['pesanformaddmaterial'])) { ?>
                    <div class="alert alert-success">
                        <?php echo $_SESSION['pesanformaddmaterial']; ?>

                    </div>
                <?php } ?>

                <form role='form' id="smart-form-register" action="<?php echo base_url(); ?>Back/Material/Add_more_stock" class="form-horizontal" novalidate="novalidate" method="post">
                    <input   class='form-control' name='name_addmorestock_idmaterial' placeholder='Stock' type='hidden' value='<?php echo $datamaterial->id; ?>'>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Add more Stock</label>
                        <div class="col-md-3">
                            <input   class='form-control' name='name_addmorestock_stock' placeholder='Stock' type='number' value=''>
                        </div>
                    </div>
                    <footer>
                        <div class="form-group">
                            <label class="col-md-2 control-label" for="select-1"></label>
                            <div class="col-md-4">
                                <input type="submit" name="button_addmorestock" class="btn btn-primary " value="Add More">
                            </div>
                        </div>
                    </footer>

                </form>

                <?php if (isset($_SESSION['pesanformexisting'])) { ?>
                    <div class="alert alert-success">
                        <?php echo $_SESSION['pesanformexisting']; ?>

                    </div>
                <?php } ?>

                <form id="existing" role='form' id="smart-form-register" action="<?php echo base_url(); ?>Back/Material/Edit_stock_material" class="form-horizontal" novalidate="novalidate" method="post">

                    <div class="form-group">
                        <label class="col-md-2 control-label">Exsisting Stock</label>
                        <div class="col-md-6">

                            <input   class='form-control' name='name_materialid' type='hidden' value='<?php echo $datamaterial->id; ?>'>

                            <div class="jarviswidget jarviswidget-color-blueDark jarviswidget-sortable" id="wid-id-0" data-widget-editbutton="false" role="widget"> 
                                <div class="widget-body">
                                    <div class="table-responsive">
                                        <table id="id_table_purchasing_note" class="table table-bordered" >
                                            <thead>
                                                <tr >
                                                    <th   >id_detailmaterial</th>
                                                    <th   >Stock</th>
                                                    <th   >Id NotaBeli</th>
                                                    <th    >Updated at</th>
                                                    <th    >Created at</th>
                                            </thead>
                                            <tbody id="id_body_table" >	
                                                <?php foreach ($datadetailmaterial as $item) { ?>
                                                    <tr>
                                                <input   class='form-control' name='name_detailmaterialid[]' placeholder='Stock' type='hidden' value='<?php echo $item->detailmaterialid; ?>'>
                                                <td><?php echo $item->detailmaterialid; ?>
                                                <td><div><input style="min-width: 50px;"  class='form-control' name='name_detailmaterialstock[]' placeholder='Stock' type='number' value='<?php echo $item->stok; ?>'></div></td>
                                                <td><a href="<?php echo base_url(); ?>Back/Purchasing/Show_edit_purchasing_note/<?php echo $item->idnotabeli; ?>"><?php echo $item->idnotabeli; ?></a></td>
                                                <td><?php echo $item->updatedat; ?></td>
                                                <td><?php echo $item->createdat; ?></td>
                                                </tr>
                                            <?php } ?>
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
                                <input type="submit" name="button_editstock" class="btn btn-primary " value="Edit Stock">
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
    function showdeletedatamaterial(idnya, nama)
    {
        document.getElementById('id_deleteid').value = idnya;
        document.getElementById('id_deletename').value = nama;
        document.getElementById('span_nama').innerHTML = nama;

    }

    function showeditdatamaterial(idnya, nama)
    {
        // document.getElementById('id_hidden_edit').value = idnya;
        //document.getElementById('editname').value = nama;

        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>" + "Back/Material/Json_get_one_material/" + idnya,
            dataType: "json",
            success: function (result) {
                //ini kalau mau ambil 1 data saja sudah bisa.
                //alert ("hore sukses" + result);
                $.each(result, function (id, name)
                {
                    //alert(id+"/"+name+'/oh yes');
                    if (id == 'nama') {
                        document.getElementById('id_editname').value = name;
                    }
                    if (id == 'id') {
                        document.getElementById('id_editid').value = idnya;
                    }
                    if (id == 'hargapokok') {
                        document.getElementById('id_edithpp').value = name;
                    }
                    if (id == 'tipe') {
                        $('#id_edittype').val(name);
                    }

                });
            }
        });
    }

</script>