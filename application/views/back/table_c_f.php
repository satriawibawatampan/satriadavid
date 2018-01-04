<table id="table_c_f" class="table table-striped table-bordered table-hover dataTable no-footer has-columns-hidden" width="100%" role="grid" aria-describedby="datatable_col_reorder_info" style="width: 100%;">
    <thead>
        <tr role="row">
            <th data-class="phone" class="expand sorting" tabindex="0" aria-controls="datatable_col_reorder" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 81px;">Date</th>
            <th data-hide="expand" class="sorting_asc" tabindex="0" aria-controls="datatable_col_reorder" rowspan="1" colspan="1" aria-sort="ascending" aria-label="ID: activate to sort column descending" style="width: 32px;">Name</th>
            <th data-class="phone" class="expand sorting" tabindex="0" aria-controls="datatable_col_reorder" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 81px;">Description</th>
            <th data-class="phone" class="expand sorting" tabindex="0" aria-controls="datatable_col_reorder" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 81px;">Debit</th>
            <th data-class="phone" class="expand sorting" tabindex="0" aria-controls="datatable_col_reorder" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 81px;">Credit</th>
            <!--<th data-class="phone" class="expand sorting" tabindex="0" aria-controls="datatable_col_reorder" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 81px;">Action</th>-->




    </thead>
    <tbody id="table_cashflow">
        <?php
        foreach ($tablecashflow as $hasil) {
            echo '<tr role = "row" class = "odd">';
           // echo '<td hidden>' . $hasil->id . '</td>';
            echo '<td>' . $hasil->createdat . '</td>';
            echo '<td>' . $hasil->nama . '</td>';
            echo '<td>' . $hasil->deskripsi . '</td>';
            if ($hasil->tipe == 2) {
                echo ' <td ></td>';
                echo ' <td ><span style="color:red">' . number_format($hasil->jumlah, 0, ".", ",") . '</span></td>';
            } else if ($hasil->tipe == 1) {
                echo ' <td ><span style="color:green">' . number_format($hasil->jumlah, 0, ".", ",") . '</span></td>';
                echo ' <td ></td>';
            }


//                                                echo '<td>   <a href="' . base_url() . 'Back/Promo/Show_edit_promo/' . $hasil->id . '"  class="glyphicon glyphicon-pencil" style="color:black" ></a>
//                                                        <a   onclick="showdeletedatamaterial(' . $hasil->id . ',\'' . $hasil->nama . '\')" class="glyphicon glyphicon-trash" style="color:red"  data-toggle="modal" data-target="#myDeleteModal"></a></td>';
            echo '</tr>';
        }
        ?>

    </tbody>
</table>

<script>

    $(document).ready(function () {
        $('#table_c_f').dataTable({
            "aaSorting": [[0, 'DESC']],
            "sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-6 hidden-xs'C>r>" +
                    "t" +
                    "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-sm-6 col-xs-12'p>>",
            "autoWidth": true,
            "oLanguage": {
                "sSearch": '<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>'
            }
        });
    });
</script>