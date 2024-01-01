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


                                <div class="row mt-3" style="margin-top:1vh;">
                                    <h3> Information</h3>
                                    <table class="table" style="width:98.6%">
                                        <thead style="background-color:#FFF200;color:black;">
                                            <tr class="item_header bg-gradient-directional-blue white">
                                                <th class="text-center">{{ trans('Customer Name') }}</th>
                                                <th class="text-center">{{ trans(' Phone Number ') }}</th>
                                                <th class="text-center">{{ trans('Address') }}</th>
                                                {{-- <th class="text-center">{{ trans(' Brand') }}</th>

                                                <th class="text-center">{{ trans('Serial Number') }}</th> --}}


                                            </tr>

                                        </thead>
                                        <tbody>
                                            <tr class="item_header bg-gradient-directional-blue white">
                                                <td class="text-center"><input type='text' name='model'
                                                        id="model"></td>
                                                <td class="text-center"><input type='text' name='chassic'
                                                        id="chassic"></td>
                                                <td class="text-center"><input type='text' name='year'
                                                        id="year"></td>
                                                {{-- <td class="text-center"><input type='text' name='license'
                                                        id="license"></td>
                                                <td class="text-center"><input type='text' name='klo'
                                                        id="kilo"></td> --}}

                                            </tr>
                                        </tbody>
                                    </table>
                                </div>


                                <div class="row " style="margin-top:1vh;">
                                    <!-- <table class="table-responsive tfr my_stripe"> -->
                                    <table class="">
                                        <thead style="background-color:#FFF200;color:black;">
                                            <tr class="item_header bg-gradient-directional-blue white"
                                                style="margin-bottom:10px;">
                                                <th width="5%" class="text-center">{{ trans('No') }}</th>
                                                <th width="18%" class="text-center">{{ trans('Description') }}
                                                </th>

                                                <th width="8%" class="text-center">{{ trans('Quantity') }}
                                                </th>
                                                <th width="18%" class="text-center">
                                                    {{ trans('Remark') }}
                                                </th>
                                                <th width="17%" class="text-center">{{ trans('Unit Price') }}
                                                </th>
                                                <th width="17%" class="text-center">{{ trans('FOC') }}
                                                </th>
                                                <th width="17%" class="text-center">{{ trans('Discount(%)') }}
                                                </th>
                                                <th width="17%" class="text-center">{{ trans('Discount(Cash)') }}
                                                </th>
                                                {{-- <th width="10%" class="text-center">{{ trans('taxt (%)') }}
                                                </th> --}}
                                                {{-- <th width="14%" class="text-center">{{ trans('Discount') }}
                                                  </th> --}}
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
                                                        name="product_tax[]" id="vat-0" autocomplete="off">
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




                                            <!-- <tr>
                                                <td colspan="6"><textarea id="dpid-0" class="form-control html_editor" name="product_description[]"
                                                    placeholder="{{ trans('general.enter_description') }} (Optional)" autocomplete="off"></textarea><br></td>
                                                <td colspan="2"><select class="form-control unit" data-uid="0" name="u_m[]"
                                                                        style="display: none">

                                                    </select></td>
                                            </tr> -->

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



                                                    <!-- <label for="serial_mode" class="form-check-label"><input type="checkbox"
                                                                                                            value="1"
                                                                                                            class="form-check-inline"
                                                                                                            name="serial_mode"
                                                                                                            id="serial_mode">
                                                        {{ trans('products.search_serial_only') }}</label></td> -->
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
                                                    <!-- {{ trans('general.payment_terms') }} <select name="term_id" class="selectpicker form-control">                                                       <option value="testa"> test</option>

                                                        </select> -->
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
                                                <td colspan="2">
                                                    <!-- {{ trans('general.payment_terms') }} <select name="term_id" class="selectpicker form-control">                                                       <option value="testa"> test</option>

                                                        </select> -->
                                                </td>
                                                <td colspan="3" align="right"><strong>Commercial Tax
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
                                                    <!-- {{ trans('general.payment_terms') }} <select name="term_id" class="selectpicker form-control">                                                       <option value="testa"> test</option>

                                                        </select> -->
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
                                                    <!-- {{ trans('general.payment_terms') }} <select name="term_id" class="selectpicker form-control">                                                       <option value="testa"> test</option>

                                                        </select> -->
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



</body>

</HTML>
