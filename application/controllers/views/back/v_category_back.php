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
                    <i class="fa-fw fa fa-puzzle-piece"></i> 
                    Category 
                    <span>
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
            <h2>Add Category Form </h2>				

            <span class="jarviswidget-loader"><i class="fa fa-refresh fa-spin"></i></span></header>

        <!-- widget div-->
        <div role="content">

            <!-- widget edit box -->
            <div class="jarviswidget-editbox">
                <!-- This area used as dropdown edit box -->

            </div>
            <!-- end widget edit box -->

            <!-- widget content -->
            <div class="widget-body no-padding">

                <form id="smart-form-register" action="<?php echo base_url(); ?>Back/Category/Add_category" class="smart-form" novalidate="novalidate" method="post">
                    <header>
                        Add Category form
                    </header>

                    <fieldset>
                        <section>
                            <label class="input"> <i class="icon-append fa fa-puzzle-piece"></i>
                                <input type="text" name="name_category" placeholder="Category" aria-required="true" class="error" aria-invalid="true" value="<?php echo set_value('name_category'); ?>">
                                <b class="tooltip tooltip-bottom-right">Needed to enter the Category</b>
                            </label>
                            <span class="col-md-9 text-danger">
                                <?php echo form_error('name_category'); ?>
                            </span>
                        </section>



                    </fieldset>


                    <footer>
                        <input type="submit" name="button_submit" class="btn btn-primary" value="Submit">


                    </footer>
                </form>						

            </div>
            <!-- end widget content -->

        </div>
        <!-- end widget div -->


        <section id="widget-grid" class="">

            <!-- row -->
            <div class="row">

                <!-- NEW WIDGET START -->
                <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                    <!-- Widget ID (each widget will need unique ID)-->
                    <div class="jarviswidget jarviswidget-color-blueDark jarviswidget-sortable" id="wid-id-2" data-widget-editbutton="false" role="widget">

                        <header role="heading">
                            <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                            <h2>Hide / Show Columns </h2>

                            <span class="jarviswidget-loader"><i class="fa fa-refresh fa-spin"></i></span></header>

                        <!-- widget div-->
                        <div role="content">

                            <!-- widget edit box -->
                            <div class="jarviswidget-editbox">
                                <!-- This area used as dropdown edit box -->

                            </div>
                            <!-- end widget edit box -->

                            <!-- widget content -->
                            <div class="widget-body no-padding">

                                <div id="datatable_col_reorder_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">


                                    <table id="datatable_col_reorder" class="table table-striped table-bordered table-hover dataTable no-footer has-columns-hidden" width="100%" role="grid" aria-describedby="datatable_col_reorder_info" style="width: 100%;">
                                        <thead>
                                            <tr role="row">
                                                <!--<th  tabindex="0" aria-controls="datatable_col_reorder" rowspan="1" colspan="1"  style="width: 32px;">ID</th>-->
                                                <th  tabindex="0" aria-controls="datatable_col_reorder" rowspan="1" colspan="1"  style="width: 100px;">Category Name</th>
                                                <th  tabindex="0" aria-controls="datatable_col_reorder" rowspan="1" colspan="1"  style="width: 32px;">Action</th>
                                        </thead>
                                        <tbody>	
                                            <?php
                                            foreach ($tablekategori as $hasil) {
                                                echo '<tr role = "row" class = "odd">';
//                                                echo '<td>' . $hasil->id . '</td>';
                                               
                                                echo ' <td class = " expand"><a onclick="show_product_in_category(' . $hasil->id . ',\'' . $hasil->nama . '\')" lass="btn glyphicon glyphicon-eye-open" style="color:blue"  data-toggle="modal" data-target="#myProductModal"><span class = "responsiveExpander"></span>' . $hasil->nama . '</a></td>';
                                                echo '<td>';
                                                 if ($hasil->id !=1) {
                                                echo '<a  onclick="editdata(' . $hasil->id . ',\'' . $hasil->nama . '\')" class="btn glyphicon glyphicon-pencil" style="color:black" data-toggle="modal" data-target="#myEditModal"></a>';
                                                      }
                                                       echo '</td>';
                                                echo '</tr>';
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                    <div class = "dt-toolbar-footer">

                                    </div>
                                </div>

                            </div>
                            <!--end widget content -->

                        </div>
                        <!--end widget div -->

                    </div>
                    <!--end widget -->

                </article>
                <!--WIDGET END -->

            </div>

            <!--end row -->

            <!--row -->

            <div class = "row">

                <!--a blank row to get started -->
                <div class = "col-sm-12">
                    <!--your contents here -->
                </div>

            </div>

            <!--end row -->

        </section>




    </div>
</div>
<!-- END MAIN CONTENT -->

<!-- MODAL HAPUS -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Delete Category</h4>
            </div>
            <form  role="form" action="<?php echo base_url(); ?>Back/Kategori/Delete_kategori" method="post">

                <div class="modal-body">

                    <p>Are you sure want to delete <span id="span_nama" style="color:blue"></span> category ?</p>

                    <div class="form-group">

                        <div class="col-md-9">
                            <input name="name_hidden_id" type="hidden"  id="id_hidden_id" class="form-control" value="">

                        </div>

                    </div>

                                                        <!--<p></p>-->
                    <div class="modal-footer">
                        <div class="form-group">
                            <div class="">
                                <input type="submit" class="  btn  btn-primary btn-lg " name="name_btn_Hapus" value="Delete" >
                            </div>
                        </div>
                    </div>




                </div>
            </form>

        </div>

    </div>
</div>

<!-- MODAL myProduct -->
    <div class="modal fade" id="myProductModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Product in Category <span id="span_nama_category" style="color:blue"></span> </h4>
                </div>
                <div class="modal-body">
                    <div class="widget-body no-padding">

                        <div id="datatable_col_reorder_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">

                            <table id="datatable_col_reorder" class="table table-striped table-bordered table-hover dataTable no-footer has-columns-hidden" width="100%" role="grid" aria-describedby="datatable_col_reorder_info" style="width: 100%;">
                                <thead>
                                    <tr role="row">
                                        <!--<th data-hide="phone" class="sorting_asc" tabindex="0" aria-controls="datatable_col_reorder" rowspan="1" colspan="1" aria-sort="ascending" aria-label="ID: activate to sort column descending" style="width: 32px;">ID</th>-->
                                        <th data-class="expand" class="expand sorting" tabindex="0" aria-controls="datatable_col_reorder" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 81px;">Products</th>
                                        


                                </thead>
                                <tbody id="tablebody">	

                                </tbody>
                            </table>

                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
<!-- MODAL Edit -->
<div class="modal fade" id="myEditModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Category</h4>
            </div>
            <form class="smart-form" novalidate="novalidate" role="form" action="<?php echo base_url(); ?>Back/Category/Edit_category" method="post">
                <div class="modal-body">
                    <header>
                        Edit category form
                    </header>
                    
                    <input  type="hidden" name="name_hidden_idedit"  id="id_hidden_edit"  aria-required="true" class="error" aria-invalid="true" value="<?php echo set_value('name'); ?>">                            <b class="tooltip tooltip-bottom-right">Needed to enter the Company</b>
                           
                    <fieldset>
                        <section>
                            <label class="input"> <i class="icon-append fa fa-puzzle-piece"></i>
                                <input  type="text" name="name_editname"  id="editname" placeholder="Category" aria-required="true" class="error" aria-invalid="true" value="<?php echo set_value('name_editname'); ?>">                            <b class="tooltip tooltip-bottom-right">Needed to enter the Company</b>
                                <input  type="hidden" name="name_editname2"  id="editname2" placeholder="Category" aria-required="true" class="error" aria-invalid="true" value="<?php echo set_value('name_editname'); ?>">                            <b class="tooltip tooltip-bottom-right">Needed to enter the Company</b>
                            </label>
                            <span class="col-md-9 text-danger">
                                <?php echo form_error('name_editname'); ?>
                            </span>
                        </section>
                    </fieldset>
                    
                    <div class="modal-footer">
                        <div class="form-group">
                            <div class="">
                                <input type="submit" class="  btn  btn-primary btn-lg " name="name_btn_edit" value="Edit" >
                            </div>
                        </div>
                    </div>

                </div>

               
            </form>

        </div>

    </div>
</div>
</div>


<script>
    
      $(document).ready(function () {
        var idopen = "<?php
                                if (isset($idopen)) {
                                    echo $idopen;
                                } else {
                                    echo "";
                                }
                                ?>";
        //alert(idopen);
        if (idopen != "")
        {
           // alert("as");
            $("#myEditModal").modal("show");
        }
    });
function editdata($idnya,$nama)
{
   // alert("a");
    $("#editname").val($nama);
    $("#editname2").val($nama);
    $("#id_hidden_edit").val($idnya);
}

function show_product_in_category(idnya, nama)
    {

        $("#span_nama_category").text(nama + " (Category " + nama + ")");
        $("#tablebody").empty();
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>" + "Back/Product/Json_get_product_in_category/" + idnya,
            dataType: "json",
            success: function (result) {
                //ini kalau mau ambil 1 data saja sudah bisa.
                // alert ("hore sukses" + result);
                $.each(result, function (id, name)
                {

                    $("#tablebody").append(
                            "<tr role = 'row' class = 'odd'>" +
                           
                            "<td>" + name['nama'] + "</td>" +
                            "</tr>");

                });
            }
        });
    }
</script>