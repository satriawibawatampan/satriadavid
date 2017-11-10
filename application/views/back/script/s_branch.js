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
                    document.getElementById('id_button_plus').setAttribute("class", "glyphicon glyphicon-trash control-label");
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
                document.getElementById('id_button_plus').setAttribute("class", "glyphicon glyphicon-plus control-label");
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