<!DOCTYPE html>
<HTML>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>

    <meta name="csrf-token" content="{{ csrf_token() }}" />

</head>
<style>
    @media print {
        body {
            color: black;
            /* Set text color for printing */
        }

        /* Add any other styles you want to modify for printing */
    }

    @media print {

        #test,
        #printButton,
        .excelButton {
            display: none;
        }
    }

    @media print {
        body {
            -webkit-print-color-adjust: exact;
        }
    }
</style>

<body style="margin:25px;">

    <div>

        <h1>
            Invoice
        </h1>

        <div class="row">
            {{-- @include('flash-message') --}}
            <div style="width:60%;float:left;">
                <p><span style="font-weight:bolder">Golden Gandawin Trading Group <br>
                        Address: No.11 Yuzuna Road,<br>
                        Mingalar Taung Nyunt Tsp,<br>
                        Yangon<br>
                        Tel: 09-740850095,09-254489768 <br>
                        Website: www.hanarokmmyanmar.com

                    </span>
                </p>
            </div>

            <div
                style="float:right;
                            margin-right:20px;
                            width:200px;
                            height:100px;">
                <img src="{{ url('logo.png') }}" alt="logo" style="width:200px;height:120px;">
            </div>
        </div>
        <div class="content-wrapper">
            <div class="content-body">
                <div class="card">
                    <div class="card-content">

                        <div class="card-body">

                            <div class="row" style="display:flex;position:relative">


                                <h4>Invoice to</h4>
                                {{-- @if (isset($service)) --}}
                                <div class="input-group"><span style="font-weight:bolder"> Name :
                                    </span> &nbsp; {{ $datas->customer_name }} </div>

                                <div class="input-group"><span style="font-weight:bolder"> Phone : </span>
                                    &nbsp;{{ $datas->phone }}
                                </div>

                                <div class="input-group"><span style="font-weight:bolder"> Address
                                        :</span> &nbsp; {{ $datas->address }}</div>
                                {{-- @else --}}
                                {{-- <label for="invociedate" class="caption" style="font-weight:bolder">Name -
                                        {{ $invoice->car_model }}
                                    </label> --}}
                                {{-- <div class="input-group"> </div> --}}
                                {{-- @endif --}}
                                <br>
                                <br>
                            </div>
                            <div style="width:40%;position:absolute;right:0px;top:0px;" class="mt-5">

                                <label for="invociedate" class="caption"
                                    style="font-weight:bolder">{{ trans('Invoices Number') }}</label> -
                                {{ $datas->invoice_number }} <br>
                                {{-- <div class="input-group">Invoice</div> --}}
                                <label for="invociedate" class="caption"
                                    style="font-weight:bolder">{{ trans('Invoice Date') }}</label>&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp; <span>-
                                    {{ $datas->invoice_date }} </span> <br>
                                <label for="invociedate" class="caption"
                                    style="font-weight:bolder">{{ trans('Invoice Due Date') }}</label>&nbsp;<span>-
                                    {{ $datas->payment_duedate }} </span>



                            </div>

                        </div>
                        <br>
                        <div class="row">
                            <h3>Information</h3>
                            {{-- <div class="table-responsive">
                                    <table class="table table-bordered text-center">
                                        <thead style="background-color: #99CCCD; color: black;">
                                            <tr>
                                                <th style="width: 25%;">Description</th>
                                                <th style="width: 25%;">Product Model</th>
                                                <th style="width: 25%;">Product Brand</th>
                                                <th style="width: 25%;">Serial Number</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                @if (isset($product))
                                                    <td>{{ $product->item_code }}
                                                    </td>
                                                    <td>{{ $product->car_year }}</td>
                                                    <td>{{ $product->car_number }}</td>
                                                    <td>{{ $product->car_klo }}</td>
                                                @else
                                                    <td>{{ $product->car_chassic }}</td>
                                                    <td>{{ $product->car_year }}</td>
                                                    <td>{{ $product->car_number }}</td>
                                                    <td>{{ $product->car_klo }}</td>
                                                @endif
                                            </tr>
                                        </tbody>
                                    </table>
                                </div> --}}
                        </div>

                        <div class="row" style="margin-top: 1vh;">
                            <div class="table-responsive">
                                <table class="table table-bordered text-center">
                                    <thead style="background-color: #99CCCD; color: black;">
                                        <tr>
                                            <th style="width: 5%;">{{ trans('No') }}</th>
                                            <th style="width: 19%;">{{ trans('Description') }}</th>
                                            {{-- <th style="width: 15%;">{{ trans('Remark') }}</th> --}}
                                            <th style="width: 8%;">{{ trans('Qty') }}</th>
                                            <th style="width: 12%;">{{ trans('Price') }}</th>
                                            {{-- <th style="width: 8%;">{{ trans('Discount(%)') }}</th>
                                                <th style="width: 8%;">{{ trans('Discount') }}</th> --}}
                                            <th style="width: 9%;">{{ trans('FOC') }}</th>
                                            {{-- <th style="width: 3%;"></th> --}}
                                            <th style="width: 7%;">{{ trans('Amount') }}
                                                {{-- ({{ config('currency.symbol') }}) --}}
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = '1';
                                        @endphp
                                        @foreach ($product as $value)
                                            <tr>
                                                <td>{{ $no }}</td>
                                                <td>{{ $value->item_code }}</td>
                                                {{-- <td>{{ $value->item_name }}</td> --}}
                                                <td>{{ $value->product_qty }}</td>
                                                <td>{{ $value->product_price }}</td>
                                                <td>{{ $value->foc }}</td>

                                                {{-- <td>{{ $value->product_tax }}</td> --}}

                                                <td>
                                                    <span class="currenty"></span>
                                                    <strong><span class='ttlText'
                                                            id="">{{ $value->product_qty * $value->product_price }}</span></strong>
                                                </td>
                                            </tr>
                                            @php
                                                $no++;
                                            @endphp
                                        @endforeach
                                        <tr>

                                            <td style="font-weight: bolder; " colspan="5" align="right">SubTotal
                                            </td>
                                            <td
                                                style="font-weight:
                                                    bolder;  color: red">
                                                {{ $datas->total }}
                                            </td>
                                        </tr>
                                        <tr>

                                            <td style="font-weight: bolder; " colspan="5" align="right">Discount
                                                Cash
                                            </td>
                                            <td
                                                style="font-weight:
                                                    bolder;  color: red">
                                                {{ $datas->discount_cash }}
                                            </td>
                                        </tr>
                                        <tr>

                                            <td style="font-weight: bolder; " colspan="5" align="right">Discount
                                                (%)

                                            </td>
                                            <td
                                                style="font-weight:
                                                    bolder;  color: red">
                                                {{ $datas->commercial_text }}
                                            </td>
                                        </tr>
                                        <tr>

                                            <td style="font-weight: bolder; " colspan="5" align="right">Total


                                            </td>
                                            <td
                                                style="font-weight:
                                                    bolder;  color: red">
                                                {{ $datas->super_total }}
                                            </td>
                                        </tr>
                                        <tr>

                                            <td style="font-weight: bolder; " colspan="5" align="right">Advance
                                                Amount


                                            </td>
                                            <td
                                                style="font-weight:
                                                    bolder;  color: red">

                                                {{ isset($datas->paid) ? $datas->paid : 0 }}
                                            </td>
                                        </tr>
                                        <tr>

                                            <td style="font-weight: bolder; " colspan="5" align="right">
                                                Balance Amount


                                            </td>
                                            <td
                                                style="font-weight:
                                                    bolder;  color: red">
                                                {{-- {{ $datas->balance }} --}}
                                                {{ isset($datas->balance) ? $datas->balance : 0 }}

                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>




                        <br><br>

                        <table width="60%" class="table">

                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Superviser By</td>
                                <td></td>
                                <td>(____________________)</td>
                                <td></td>
                                <td>Customer By</td>
                                <td>(____________________)</td>
                            </tr>


                        </table>

                        {{-- <a href="{{ URL('/invoice/pdf', $idd) }}"> Print</a> --}}
                    </div>

                </div>
            </div>
        </div>
        <a onclick="printPage()" id="printButton" class="btn btn-success mt-4">Print</a>

    </div>

    </div>


</body>

</HTML>
<script>
    function printPage() {
        window.print();
    }
</script>
