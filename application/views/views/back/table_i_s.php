<table id="table_i_s" class="table table-striped table-bordered table-hover dataTable no-footer has-columns-hidden" width="100%" role="grid" aria-describedby="datatable_col_reorder_info" style="width: 100%;">
    <thead>
        <tr role="row">
            <th data-class="phone" class="expand sorting" tabindex="0" aria-controls="datatable_col_reorder" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 81px;">Date</th>
            <th data-hide="expand" class="sorting_asc" tabindex="0" aria-controls="datatable_col_reorder" rowspan="1" colspan="1" aria-sort="ascending" aria-label="ID: activate to sort column descending" style="width: 32px;">Description</th>
            <th data-class="phone" class="expand sorting" tabindex="0" aria-controls="datatable_col_reorder" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 81px;">Grandtotal</th>
            <th data-class="phone" class="expand sorting" tabindex="0" aria-controls="datatable_col_reorder" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 81px;">HPP</th>
            <th data-class="phone" class="expand sorting" tabindex="0" aria-controls="datatable_col_reorder" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 81px;">Margin</th>
            <th data-class="phone" class="expand sorting" tabindex="0" aria-controls="datatable_col_reorder" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 81px;">%</th>



    </thead>
    <tbody id="table_income_summary">
        <?php
        $totalgrandtotal = 0;
        $totalhpp = 0;
        foreach ($tableincomesummary as $hasil) {

            $totalgrandtotal += $hasil->grandtotal;
            $totalhpp += $hasil->hpp;
            $grandtotal = $hasil->grandtotal;
            $hpp = $hasil->hpp;
            $margin = ($hasil->grandtotal - $hasil->hpp);
            $persen = ($margin * 100 / $grandtotal);


            echo '<tr role = "row" class = "odd">';
            echo '<td>' . $hasil->tanggalupdate . '</td>';
            echo '<td><a target="_blank" href="' . base_url() . 'Back/Order/Prints/' . $hasil->idnotajual . '">Order Note ' . $hasil->idnotajual . '</a>';
            echo '<td>' . number_format($hasil->grandtotal, 0, ".", ",") . '</td>';
            echo '<td>' . number_format($hasil->hpp, 0, ".", ",") . '</td>';

            echo '<td>' . number_format($margin, 0, ".", ",") . '</td>';
            echo '<td>' . number_format($persen, 2, ".", ",") . '% </td>';
            echo '</tr>';
        }
        ?>

    </tbody>
</table>

<script>
    function number_format(number, decimals, dec_point, thousands_sep) {

        var n = number, c = isNaN(decimals = Math.abs(decimals)) ? 2 : decimals;
        var d = dec_point == undefined ? "," : dec_point;
        var t = thousands_sep == undefined ? "." : thousands_sep, s = n < 0 ? "-" : "";
        var i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "", j = (j = i.length) > 3 ? j % 3 : 0;

        return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
    }

    function count_total()
    {
        var totalgrandtotal = <?php echo $totalgrandtotal; ?>;
        var totalhpp = <?php echo $totalhpp; ?>;
        $("#id_totalgrandtotal").html(number_format(totalgrandtotal,0,".",","));
        $("#id_totalhpp").text(number_format(totalhpp,0,".",","));
        $("#id_totalmargin").html(number_format(totalgrandtotal - totalhpp ,0,".",",")+ " ( " + number_format( (totalgrandtotal - totalhpp) * 100 / totalgrandtotal,2,".",",")   + "% )");
    }

    $(document).ready(function () {
        $('#table_i_s').dataTable({
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