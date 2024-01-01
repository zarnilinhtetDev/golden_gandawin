<!DOCTYPE html>
<HTML>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>

    <meta name="csrf-token" content="{{ csrf_token() }}" />

</head>

<body>

    <div class="container">

        <h1>
            Invoice
        </h1>

        <div class="row">
            {{-- @include('flash-message') --}}
            <div style="width:60%;float:left;">
                <p><span style="font-weight:bolder">Royal Ayeyarwaddy Co.,Ltd.<br>
                        No.7, 87th Street,<br>
                        Mingalar Taung Nyunt T/S, Yangon, Myanmar<br>
                        Phone: 01-8384850 , 8389366 , 8394494<br>
                        Mobile: 09-7310 2727 , 44310 2727</span>
                </p>
            </div>
            <div
                style="float:right;padding: 15px;
                                margin-right:20px;
                                width:150px;
                                height:100px;">
                <img src="{{ url('logo1.png') }}" alt="logo" style="width:150px;height:90px;">
            </div>
        </div>
        <span style="font-weight:bolder;"> <u> servicera1@gmail.com</u></span>

        <div class="content-wrapper" style="background-color:aqua">
            <div class="content-body">
                <div class="card">
                    <div class="card-content">

                        <div class="card-body">
                            <form method="post" id="data_form" action=" {{ URL('invoice') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row ">
                                    <div class="col-sm-6 cmp-pnl">
                                        <div id="customerpanel" class="inner-cmp-pnl">
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <label for="invocieno" class="caption"
                                                        style="font-weight:bolder">{{ trans('Invoices Number') }}</label>
                                                    <input type="text" name="invoice_number"
                                                        class="form-control round"
                                                        placeholder="{{ trans('Invoice Number') }}">
                                                </div>
                                                <input type="hidden" name="manager_type"
                                                    value="{{ Auth::user()->type }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 cmp-pnl">
                                        <div class="form-group">
                                            <div class="col-sm-12 text-right"> <!-- Align to the right -->
                                                <label for="invociedate" class="caption"
                                                    style="font-weight:bolder">{{ trans('Invoice Date') }}</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <span class="icon-calendar4" aria-hidden="true"></span>
                                                    </div>
                                                    <input type="date" name="invoice_date"
                                                        class="form-control round required"
                                                        placeholder="{{ trans('invoicedate') }}"
                                                        data-toggle="datepicker" autocomplete="false"
                                                        value="<?= date('Y-m-d') ?>">

                                                </div>
                                            </div>
                                        </div>
                                        <!--cid -->
                                        <div class="form-group">
                                            <div class="col-sm-12 text-right">

                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <span class="icon-calendar4" aria-hidden="true"></span>
                                                    </div>
                                                    <input type="text" name="invoicedate"
                                                        class="form-control round required" placeholder=""
                                                        data-toggle="datepicker" autocomplete="false">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row" style="margin-top:1vh;">
                                    <h3> Information</h3>
                                    <table class="table" style="width:98.6%">
                                        <thead style="background-color:#FFF200;color:black;">
                                            <tr class="item_header bg-gradient-directional-blue white">
                                                <th class="text-center">{{ trans('Customer Name') }}</th>
                                                <th class="text-center">{{ trans('Address ') }}</th>
                                                <th class="text-center">{{ trans('Phone Number') }}</th>



                                            </tr>

                                        </thead>
                                        <tbody>
                                            <tr class="item_header bg-gradient-directional-blue white">
                                                <td class="text-center"><input type='text' name='customer_name'
                                                        id="model" class="form-control"></td>
                                                <td class="text-center"><input type='text' name='address'
                                                        class="form-control" id="chassic"></td>
                                                <td class="text-center"><input type='text' name='phone'
                                                        class="form-control" id="year"></td>


                                            </tr>
                                        </tbody>
                                    </table>
                                </div>


                                <div class="row " style="margin-top:1vh;">

                                    <table class="">
                                        <thead style="background-color:#FFF200;color:black;">
                                            <tr class="item_header bg-gradient-directional-blue white"
                                                style="margin-bottom:10px;">
                                                <th width="5%" class="text-center">{{ trans('No') }}</th>
                                                <th width="25%" class="text-center">{{ trans('Description') }}
                                                </th>
                                                <th width="18%" class="text-center">
                                                    {{ trans('Remark') }}
                                                </th>
                                                <th width="8%" class="text-center">{{ trans('Quantity') }}
                                                </th>

                                                <th width="17%" class="text-center">{{ trans('Unit Price') }}
                                                </th>
                                                <th width="10%" class="text-center">{{ trans('Discount (%)') }}
                                                </th>
                                                <th width="10%" class="text-center">{{ trans('Discount') }}
                                                </th>
                                                <th width="14%" class="text-center">{{ trans('FOC') }}
                                                </th>
                                                <th width="21%" class="text-center">{{ trans('Amount') }}
                                                    ({{ config('currency.symbol') }})
                                                </th>

                                            </tr>

                                        </thead>

                                        <tbody id="showitem123">


                                            <tr>
                                                <td class="text-center" id="count">1</td>
                                                <td><input type="text" class="form-control productname typeahead"
                                                        name="item_code[]"
                                                        placeholder="{{ trans('Item code.enter') }}"
                                                        id='productname-0' autocomplete="off">
                                                </td>
                                                <td><input type="text" class="form-control productname item-name"
                                                        name="item_name[]" id="itemname-0" autocomplete="off">
                                                </td>
                                                <td><input type="text" class="form-control req amnt"
                                                        name="product_qty[]" id="amount-0" autocomplete="off"
                                                        value="1"><input type="hidden" id="alert-0"
                                                        value="" name="alert[]"></td>

                                                <td><input type="text" class="form-control req prc"
                                                        name="product_price[]" id="price-0" autocomplete="off">
                                                </td>
                                                <td><input type="text" class="form-control vat "
                                                        name="discount_percent[]" id="vat-0" autocomplete="off">
                                                </td>
                                                <td><input type="text" class="form-control dis " name="discount[]"
                                                        id="dis-0" autocomplete="off">
                                                </td>
                                                <td>
                                                    <select name="foc" id="" class="form-control">
                                                        <option value="">No</option>
                                                        <option value="">Yes</option>
                                                    </select>
                                                </td>
                                                <td style="text-align:center">
                                                    <span class='ttlText' id="foc-0"></span>
                                                    <span class="currenty">{{ config('currency.symbol') }}</span>
                                                    <strong>
                                                        <span class='ttlText' id="result-0"></span>
                                                    </strong>
                                                </td>
                                                <input type="hidden" class="form-control vat " name="product_tax[]"
                                                    id="vat-0" value="0">
                                                <input type="hidden" name="total_tax[]" id="taxa-0"
                                                    value="0">
                                                <input type="hidden" name="total_discount[]" id="disca-0"
                                                    value="0">
                                                <input type="hidden" name="discount[]" id="dis-0"
                                                    value="0">
                                                <input type="hidden" class="ttInput" name="product_subtotal[]"
                                                    id="total-0" value="0">
                                                <input type="hidden" class="pdIn" name="product_id[]"
                                                    id="pid-0" value="0">
                                                <input type="hidden" attr-org="" name="unit[]" id="unit-0"
                                                    value="">
                                                <input type="hidden" name="unit_m[]" id="unit_m-0" value="1">
                                                <input type="hidden" name="code[]" id="hsn-0" value="">
                                                <input type="hidden" name="serial[]" id="serial-0" value="">
                                                <td></td>
                                            </tr>

                                        <tbody id="showitem">






                                            <tr class="last-item-row sub_c">
                                                <td></td>
                                                <td class="add-row">

                                                    <button type="button" class="btn btn-success" id="addproduct"
                                                        style="margin-top:20px;margin-bottom:20px;">
                                                        <i class="fa fa-plus-square"></i> {{ trans('Add row') }}
                                                    </button>

                                                    <button type="button" class="btn btn-success" id="calculate">
                                                        <i class="fa fa-plus-square"></i> Calculate
                                                    </button>
                                                    <a href="{{ URL('item') }}" target="_blank"> <button
                                                            type="button" class="btn btn-success">
                                                            <i class="fa fa-plus-square"></i> Item Search
                                                        </button></a>




                                                    {{-- {{ trans('products.search_serial_only') }}</label> --}}
                                                </td>
                                                </td>
                                                <td colspan="6"></td>
                                                <br><br>
                                            </tr>
                                            <tr class="sub_c" style="display: table-row;">
                                                <td colspan="2">
                                                    @if (isset($employees[0]))
                                                        {{ trans('general.employee') }}
                                                        <select name="user_id" class="selectpicker form-control">
                                                            <option value="{{ $logged_in_user->id }}">
                                                                {{ $logged_in_user->first_name }}</option>
                                                            @foreach ($employees as $employee)
                                                                <option value="{{ $employee->id }}">
                                                                    {{ $employee->first_name }}
                                                                    {{ $employee->last_name }}
                                                                </option>
                                                            @endforeach

                                                        </select>
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr class="sub_c" style="display: table-row;">
                                                <td colspan="2">

                                                </td>
                                                <td colspan="3" align="right"><strong>Subtotal
                                                    </strong>
                                                </td>
                                                <td align="left" colspan="2"><input type="text"
                                                        name="total" class="form-control" id="invoiceyoghtml"
                                                        readonly="">

                                                </td>
                                            </tr>
                                            <tr class="sub_c" style="display: table-row;">
                                                <td colspan="2"></td>
                                                <td colspan="3" align="right"><strong>Discount Cash</strong></td>
                                                <td align="left" colspan="2">
                                                    <input type="text" name="discount" class="form-control"
                                                        id="discount" readonly="">
                                                </td>
                                            </tr>
                                            <tr class="sub_c" style="display: table-row;">
                                                <td colspan="2">

                                                </td>
                                                <td colspan="3" align="right"><strong>Discount (%)
                                                    </strong>
                                                </td>
                                                <td align="left" colspan="2"><input type="text"
                                                        name="commercial_text" class="form-control"
                                                        id="commercial_text" readonly="">

                                                </td>
                                            </tr>
                                            <tr class="sub_c" style="display: table-row;">
                                                <td colspan="2">
                                                    <!-- {{ trans('general.payment_terms') }} <select name="term_id" class="selectpicker form-control">                                                       <option value="testa"> test</option>

                                                        </select> -->
                                                </td>
                                                <td colspan="3" align="right"><strong>{{ trans('Total') }}
                                                    </strong>
                                                </td>
                                                <td align="left" colspan="2"><input type="text"
                                                        name="super_total" class="form-control" id="total"
                                                        readonly="">

                                                </td>
                                            </tr>
                                            <tr class="sub_c" style="display: table-row;">
                                                <td colspan="2">

                                                </td>
                                                <td colspan="3" align="right"><strong>Paid
                                                    </strong>
                                                </td>
                                                <td align="left" colspan="2"><input type="text"
                                                        name="paid" class="form-control" id="paid"
                                                        onchange="paidFunction()">

                                                </td>
                                            </tr>
                                            <tr class="sub_c" style="display: table-row;">
                                                <td colspan="2">

                                                </td>
                                                <td colspan="3" align="right"><strong>Balance
                                                    </strong>
                                                </td>
                                                <td align="left" colspan="2"><input type="text"
                                                        name="balance" class="form-control" id="balance"
                                                        readonly="">

                                                </td>
                                            </tr>
                                            <tr class="sub_c " style="display: table-row;">

                                                <td align="right" colspan="9"><input type="submit"
                                                        class="btn btn-success sub-btn btn-lg mt-3"
                                                        value="{{ trans('Submit') }}" id="submit-data"
                                                        data-loading-text="Creating...">

                                                </td>

                                            </tr>
                                        </tbody>
                                    </table>
                                </div>


                            </form>
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </div>
    <script>
        $(document).ready(function() {
            $('#item-0').typeahead({
                source: function(query, process) {
                    return $.ajax({
                        url: "{{ route('autocomplete.item-code') }}",
                        method: 'POST',
                        data: {
                            query: query
                        },
                        dataType: 'json',
                        success: function(data) {
                            process(data);
                        }
                    });
                }
            });

        });
    </script>
    {{-- <script>
        $(document).ready(function() {
            let count = 0;

            function initializeTypeahead(count) {
                $('#productname-' + count).typeahead({
                    source: function(query, process) {
                        return $.ajax({
                            url: "{{ route('autocomplete.item-code') }}",
                            method: 'POST',
                            data: {
                                query: query
                            },
                            dataType: 'json',
                            success: function(data) {
                                process(data);
                            }
                        });
                    }
                });
            }

            function initializeTypeaheads() {
                for (let i = 0; i <= count; i++) {
                    initializeTypeahead(i);
                }
            }


            function updateItemName(itemCode, row) {
                let itemNameInput = row.find('.item-name');

                $.ajax({
                    type: 'POST',
                    url: "{{ route('get.item.data') }}",
                    data: {
                        _token: "{{ csrf_token() }}",
                        item_code: itemCode
                    },
                    success: function(data) {
                        console.log(data);
                        itemNameInput.val(data.item_name);
                    },
                    error: function(error) {
                        console.error(error);
                    }
                });
            }

            $("#addproduct").click(function(e) {
                e.preventDefault();
                count++;

                var newRow = '<tr>' +
                    '<td class="text-center">' + (count + 1) + '</td>' +
                    '<td><input type="text" class="form-control productname typeahead" name="item_code[]" id="productname-' +
                    count + '" autocomplete="off"></td>' +
                    '<td><input type="text" class="form-control productname item-name" name="item_name[]" id="itemname-' +
                    count + '" autocomplete="off"></td>' +
                    '<td><input type="text" class="form-control req amnt" name="product_qty[]" id="amount-' +
                    count +
                    '" autocomplete="off" value="1"><input type="hidden" id="alert-' + count +
                    '" value="" name="alert[]"></td>' +
                    '<td><input type="text" class="form-control req prc" name="product_price[]" id="price-' +
                    count + '" autocomplete="off"></td>' +
                    '<td><input type="text" class="form-control vat " name="discount_percent[]" id="vat-' +
                    count + '" autocomplete="off"></td>' +
                    '<td><input type="text" class="form-control vat " name="product_discount[]" id="vat-' +
                    count + '" autocomplete="off"></td>' +
                    '<td>' +
                    '<select name="foc[]" class="form-control">' +
                    '<option value="No">No</option>' +
                    '<option value="Yes">Yes</option>' +
                    '</select>' +
                    '</td>' +
                    '<td style="text-align:center">' +
                    '<span class="currenty"></span>' +
                    '<strong><span id="result-' + count + '">0</span></strong>' +
                    '</td>' +
                    '<td class="text-center"></td>' +
                    '<input type="hidden" name="total_tax[]" id="taxa-' + count + '" value="0">' +
                    '<input type="hidden" name="total_discount[]" id="disca-' + count + '" value="0">' +
                    '<input type="hidden" class="ttInput" name="product_subtotal[]" id="total-' +
                    count + '" value="0">' +
                    '<input type="hidden" class="pdIn" name="product_id[]" id="pid-' + count +
                    '" value="0">' +
                    '<input type="hidden" attr-org="" name="unit[]" id="unit-' + count + '" value="">' +
                    '<input type="hidden" name="unit_m[]" id="unit_m-' + count + '" value="1">' +
                    '<input type="hidden" name="code[]" id="hsn-' + count + '" value="">' +
                    '<input type="hidden" name="serial[]" id="serial-' + count + '" value="">' +
                    '<td><button type="submit" class="btn btn-danger remove_item_btn">Remove</button></td>' +
                    '</tr>';

                $("#showitem").before(newRow);

                initializeTypeahead(count);
            });

            $(document).on('click', '.remove_item_btn', function(e) {
                e.preventDefault();
                let row_item = $(this).parent().parent();
                $(row_item).remove();
                count--;
                initializeTypeaheads();
            });

            $(document).on('change', '.productname', function() {
                let itemCode = $(this).val();
                let row = $(this).closest('tr');
                updateItemName(itemCode, row);
            });

            // Initialize typeahead for the first row
            initializeTypeahead(count);

            $(document).on("click", '#getprice', function(e) {
                e.preventDefault();
                let total = 0;
                for (let i = 0; i <= count; i++) {
                    var qty = parseInt($('#amount-' + i).val());
                    var item_name = $('#productname-' + i).val();
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('autocomplete_price') }}",
                        async: false,
                        data: {
                            name: item_name
                        },
                        success: function(data2) {
                            $("#price-" + i).val(data2);
                            price = data2;
                        }
                    });
                }
            });

            $(document).on("click", '#calculate', function(e) {
                e.preventDefault();
                let total = 0;
                let totalTax = 0;
                let totalDiscount = 0;

                for (let i = 0; i < (count + 1); i++) {
                    var qty = parseInt($('#amount-' + i).val());
                    var item_name = $('#productname-' + i).val();
                    var sel = $('#focsel-' + i).val();
                    let price = parseFloat($('#price-' + i).val());
                    let taxRate = parseFloat($('#vat-' + i).val());
                    let discount = parseFloat($('#dis-' + i).val());

                    if (!isNaN(taxRate) && taxRate >= 0) {
                        let itemTax = (price * qty * taxRate) / 100;
                        totalTax += itemTax;
                    }



                    if (isNaN(discount)) {
                        discount = 0; // Set discount to 0 if it's NaN
                    }



                    totalDiscount += discount;

                    $("#result-" + i).text(price * qty);

                    if (sel >= 1) {
                        $("#foc-" + i).text('FOC');
                        price = 0;
                    }

                    if (sel < 1) {
                        $("#foc-" + i).text(price * qty);
                    }

                    total += price * qty;
                }

                let total_subtotal = total - totalDiscount; // Subtract total discount from subtotal
                let total_total = total_subtotal - totalTax;

                $("#invoiceyoghtml").val(total); // Display subtotal
                $("#commercial_text").val(totalTax);
                $("#discount").val(totalDiscount);
                $("#total").val(total_total); // Display total




            });
        });


        function paidFunction() {
            let paid = document.getElementById("paid").value;
            let total_p = document.getElementById("total").value;
            let balance = total_p - paid;
            $("#balance").val(balance);
        }
    </script> --}}
    <script>
        $(document).ready(function() {
            let count = 0;

            function initializeTypeahead(count) {
                $('#productname-' + count).typeahead({
                    source: function(query, process) {
                        return $.ajax({
                            url: "{{ route('autocomplete.item-code') }}",
                            method: 'POST',
                            data: {
                                query: query
                            },
                            dataType: 'json',
                            success: function(data) {
                                process(data);
                            }
                        });
                    }
                });
            }

            function initializeDiscountInput(count) {
                $('#dis-' + count).on('input', function() {
                    calculateTotal();
                });
            }

            function initializeTypeaheads() {
                for (let i = 0; i <= count; i++) {
                    initializeTypeahead(i);
                    initializeDiscountInput(i);
                }
            }

            function updateItemName(itemCode, row) {
                let itemNameInput = row.find('.item-name');

                $.ajax({
                    type: 'POST',
                    url: "{{ route('get.item.data') }}",
                    data: {
                        _token: "{{ csrf_token() }}",
                        item_code: itemCode
                    },
                    success: function(data) {
                        console.log(data);
                        itemNameInput.val(data.item_name);
                    },
                    error: function(error) {
                        console.error(error);
                    }
                });
            }

            $("#addproduct").click(function(e) {
                e.preventDefault();
                count++;

                var newRow = '<tr>' +
                    '<td class="text-center">' + (count + 1) + '</td>' +
                    '<td><input type="text" class="form-control productname typeahead" name="item_code[]" id="productname-' +
                    count + '" autocomplete="off"></td>' +
                    '<td><input type="text" class="form-control productname item-name" name="item_name[]" id="itemname-' +
                    count + '" autocomplete="off"></td>' +
                    '<td><input type="text" class="form-control req amnt" name="product_qty[]" id="amount-' +
                    count +
                    '" autocomplete="off" value="1"><input type="hidden" id="alert-' + count +
                    '" value="" name="alert[]"></td>' +
                    '<td><input type="text" class="form-control req prc" name="product_price[]" id="price-' +
                    count + '" autocomplete="off"></td>' +
                    '<td><input type="text" class="form-control vat " name="discount_percent[]" id="vat-' +
                    count + '" autocomplete="off"></td>' +
                    '<td><input type="text" class="form-control vat " name="product_discount[]" id="dis-' +
                    count + '" autocomplete="off"></td>' +
                    '<td>' +
                    '<select name="foc[]" class="form-control">' +
                    '<option value="No">No</option>' +
                    '<option value="Yes">Yes</option>' +
                    '</select>' +
                    '</td>' +
                    '<td style="text-align:center">' +
                    '<span class="currenty"></span>' +
                    '<strong><span id="result-' + count + '">0</span></strong>' +
                    '</td>' +
                    '<td class="text-center"></td>' +
                    '<input type="hidden" name="total_tax[]" id="taxa-' + count + '" value="0">' +
                    '<input type="hidden" name="total_discount[]" id="disca-' + count + '" value="0">' +
                    '<input type="hidden" class="ttInput" name="product_subtotal[]" id="total-' +
                    count + '" value="0">' +
                    '<input type="hidden" class="pdIn" name="product_id[]" id="pid-' + count +
                    '" value="0">' +
                    '<input type="hidden" attr-org="" name="unit[]" id="unit-' + count + '" value="">' +
                    '<input type="hidden" name="unit_m[]" id="unit_m-' + count + '" value="1">' +
                    '<input type="hidden" name="code[]" id="hsn-' + count + '" value="">' +
                    '<input type="hidden" name="serial[]" id="serial-' + count + '" value="">' +
                    '<td><button type="submit" class="btn btn-danger remove_item_btn">Remove</button></td>' +
                    '</tr>';

                $("#showitem").before(newRow);

                initializeTypeahead(count);
                initializeDiscountInput(count);
            });

            $(document).on('click', '.remove_item_btn', function(e) {
                e.preventDefault();
                let row_item = $(this).parent().parent();
                $(row_item).remove();
                count--;
                initializeTypeaheads();
            });

            $(document).on('change', '.productname', function() {
                let itemCode = $(this).val();
                let row = $(this).closest('tr');
                updateItemName(itemCode, row);
            });

            // Initialize typeahead for the first row
            initializeTypeahead(count);
            initializeDiscountInput(count);

            $(document).on("click", '#getprice', function(e) {
                e.preventDefault();
                let total = 0;
                for (let i = 0; i <= count; i++) {
                    var qty = parseInt($('#amount-' + i).val());
                    var item_name = $('#productname-' + i).val();
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('autocomplete_price') }}",
                        async: false,
                        data: {
                            name: item_name
                        },
                        success: function(data2) {
                            $("#price-" + i).val(data2);
                            price = data2;
                        }
                    });
                }
            });

            $(document).on("click", '#calculate', function(e) {
                e.preventDefault();
                calculateTotal();
            });

            function calculateTotal() {
                let total = 0;
                let totalTax = 0;
                let totalDiscount = 0;

                for (let i = 0; i < (count + 1); i++) {
                    var qty = parseInt($('#amount-' + i).val());
                    var item_name = $('#productname-' + i).val();
                    var sel = $('#focsel-' + i).val();
                    let price = parseInt($('#price-' + i).val());
                    let taxRate = parseFloat($('#vat-' + i).val());
                    let discount = parseFloat($('#dis-' + i).val());

                    if (!isNaN(taxRate) && taxRate >= 0) {
                        let itemTax = (price * qty * taxRate) / 100;
                        totalTax += itemTax;
                    }

                    if (isNaN(discount)) {
                        discount = 0; // Set discount to 0 if it's NaN
                    }

                    totalDiscount += discount;

                    $("#result-" + i).text(price * qty);

                    if (sel >= 1) {
                        $("#foc-" + i).text('FOC');
                        price = 0;
                    }

                    if (sel < 1) {
                        $("#foc-" + i).text(price * qty);
                    }

                    total += price * qty;
                }

                let total_subtotal = total - totalDiscount; // Subtract total discount from subtotal
                let total_total = total_subtotal - totalTax;

                $("#invoiceyoghtml").val(total);
                $("#commercial_text").val(totalTax);
                $("#discount").val(totalDiscount); // Display total discount
                $("#total").val(total_total);
            }
        });

        function paidFunction() {
            let paid = document.getElementById("paid").value;
            let total_p = document.getElementById("total").value;
            let balance = total_p - paid;
            $("#balance").val(balance);
        }
    </script>





    <script>
        $(document).on('click', '.remove_item_btn', function(e) {
            e.preventDefault();
            let row_item = $(this).parent().parent();
            $(row_item).remove();
            count--;
        });



        $(document).on("click", '#getprice', function(e) {
            e.preventDefault();
            let total = 0;
            for (let i = 0; i < (count + 1); i++) {

                var qty = parseInt($('#amount-' + i).val()); //get value from amount
                var item_name = $('#productname-' + i).val(); //get value from amount


                $.ajax({
                    type: 'POST',
                    url: "{{ route('autocomplete_price') }}",
                    async: false,
                    data: {
                        name: item_name
                    },
                    success: function(data2) {

                        $("#price-" + i).val(data2);
                        price = data2;

                    }
                });
            }
        });


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // $(document).on("click", '#calculate', function(e) {
        //     e.preventDefault();
        //     let total = 0;
        //     for (let i = 0; i < (count + 1); i++) {
        //         // if ($('#amount-' + i).is(":empty")) {
        //         //     var price = 1;
        //         // } else {
        //         //     var price = parseInt($('#amount-' + i).val()); //get value from amount
        //         // }

        //         var qty = parseInt($('#amount-' + i).val()); //get value from amount
        //         var item_name = $('#productname-' + i).val(); //get value from amount
        //         var sel = $('#focsel-' + i).val(); //get value from amount



        //         let price = parseInt($('#price-' + i).val()); //get vlaue from price

        //         console.log("price" + price)
        //         // console.log("price2"+Object.values(price2))
        //         $("#result-" + i).text((price *
        //             qty));

        //         //  $("#price-"+ i).val(data['retail_sale']);
        //         if (sel >= 1) {
        //             $("#foc-" + i).text('FOC');
        //             price = 0;
        //             // total = 0; //total adding (amount*price)
        //         }
        //         if (sel < 1) {
        //             $("#foc-" + i).text((price * qty));
        //             //  total = total + (price * qty); //total adding (amount*price)
        //         } /// set  (amount*price) to result subtotal for each product

        //         total = total + (price * qty); //total adding (amount*price)

        //     }
        //     let taxt = total * 0.05;
        //     taxt = Math.ceil(taxt);
        //     let total_total = taxt + total;
        //     $("#invoiceyoghtml").val(total); //set  (amount*price)  per invoice  subtotal
        //     $("#commercial_text").val(taxt); //commercial taxt 5% of total (sub total)
        //     $("#total").val(total_total); //super total

        //     // alert("Text:sdfgsdf"+ qty + "count is ;" + count);

        // });







        function paidFunction() {

            let paid = document.getElementById("paid").value;
            let total_p = document.getElementById("total").value;
            let balance = total_p - paid;
            $("#balance").val(balance); //update balance
        }
    </script>





    <script type="text/javascript">
        var path = "{{ route('customer_service_search') }}";

        $('#customer').typeahead({
            source: function(query, process) {
                return $.get(path, {
                    query: query
                }, function(data) {
                    return process(data);
                });
            }
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).on('click', '#customer_search', function(e) {
            e.preventDefault();
            let serialNumber = $("#customer").val();

            $.ajax({
                type: 'POST',
                url: "{{ route('customer_service_search_fill') }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    serial_number: serialNumber
                },
                success: function(data) {
                    console.log(data);

                    $("#model").val(data['customer'][
                        'customer_name'
                    ]);
                    $("#chassic").val(data['product'][
                        'product_name'
                    ]);

                    $("#year").val(data['product']['product_model']);
                    $("#license").val(data['product']['product_brand']);
                    $("#kilo").val(data['product']['serial_number']);


                }
            })
        });
    </script>



</body>

</HTML>
