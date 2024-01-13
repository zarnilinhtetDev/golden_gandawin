<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Golden Gandawin Co.,Ltd.</title>

    <!-- Google Font: Source Sans Pro -->

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<style>
    .dt-buttons {
        background-color: #007BFF;

        color: #fff;

    }
</style>

<body>


    <body class="hold-transition sidebar-mini">
        <div class="wrapper">
            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                                class="fas fa-bars"></i></a>
                    </li>


                </ul>

                <!-- Right navbar links -->
                <ul class="navbar-nav ml-auto">


                    <li class="nav-item">



                    <li><a class="dropdown-item btn bg-danger  logout-link" href="{{ url('/logout') }}">Logout</a></li>
                    </li>
                </ul>
            </nav>
            @include('master.sidebar')
            <div class="content-wrapper">
                <!-- Main content -->
                <section class="content">




                    <section class="content-header">
                        <div class="container-fluid">
                            <div class="row mb-2">
                                <div class="col-sm-6">
                                    <h1>Payment</h1>
                                </div>
                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-sm-right">
                                        <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                                        <li class="breadcrumb-item active"> Payment</li>
                                    </ol>
                                </div>
                            </div>
                        </div><!-- /.container-fluid -->
                    </section>

                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}

                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}

                        </div>
                    @endif
                    @if (session('update'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('update') }}

                        </div>
                    @endif
                    @if (session('delete_success'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('delete_success') }}

                        </div>
                    @endif



                    <section class="content-body">
                        <button type="button" class="btn btn-default btn-primary text-white my-3"
                            style="background-color: #007BFF" data-toggle="modal" data-target="#modal-lg">
                            Register
                        </button>
                        {{-- <div class="mt-3">
                            <h4> Customer Name - {{ $data->customer_name }} </h4> <br>
                            <h4>Total - {{ $data->total }}</h4>
                        </div> --}}

                        <div class="modal fade" id="modal-lg">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Payment Registers</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ url('/payment_register') }}" method="post">
                                            @csrf
                                            <input type="number" class="form-control" id="invoice_id"
                                                style="display: none" aria-describedby="emailHelp" name="invoice_id"
                                                required value="{{ $data->id }}">
                                            <div class="form-group">
                                                <label for="date">Date <span class="text-danger">*</span></label>
                                                <input type="date" class="form-control" id="payment_date"
                                                    value="<?php echo date('Y-m-d'); ?>" aria-describedby="emailHelp"
                                                    name="payment_date" required>
                                                @error('payment_date')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group mt-3">
                                                <label for="payment_amount">Amount<span
                                                        class="text-danger">*</span></label>
                                                <input type="number" class="form-control" id="payment_amount"
                                                    aria-describedby="emailHelp" name="payment_amount" required>
                                                @error('payment_amount')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>


                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-default"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Register</button>
                                            </div>

                                        </form>

                                    </div>

                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div> <br>

                        <a href="" class="btn btn-success">Name - {{ $data->customer_name }}</a>
                        <a href="" class="btn btn-warning">Total - {{ $data->super_total }}</a>

                        <a href="" class="btn btn-danger">Paid - {{ $data->paid }}</a>
                        <a href="" class="btn btn-info">Balance - {{ $data->balance }} </a>
                        <div class="card mt-4">
                            <div class="card-header">
                                <h3 class="card-title">

                                    Payment Tables
                                </h3>
                            </div>

                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped text-center">

                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Date</th>
                                            <th>Amount</th>

                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = '1';
                                            $totalAmount = 0;
                                        @endphp
                                        @foreach ($payment as $payment)
                                            <tr>
                                                <td>{{ $no }}</td>
                                                <td>{{ $payment->payment_date }}</td>
                                                <td style="background-color: #bae262">{{ $payment->payment_amount }}
                                                </td>
                                                <td>
                                                    <a href="{{ url('payment_edit', $payment->id) }}"
                                                        class="btn btn-success">
                                                        <i class="fa-solid fa-pen-to-square"></i>

                                                    </a>

                                                    <a href="{{ url('payment_delete', $payment->id) }}"
                                                        class="btn btn-danger"
                                                        onclick="return confirm('Are you sure you want to delete this Payment ?')">
                                                        <i class="fa-solid fa-trash"></i></a>


                                                </td>

                                            </tr>
                                            @php
                                                $no++;
                                                $totalAmount += $payment->payment_amount;
                                            @endphp
                                        @endforeach
                                        <td colspan="2" class="text-right">Total</td>
                                        <td style="background-color: #bae262">{{ $totalAmount }}</td>
                                        <td></td>

                                    </tbody>




                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </section>




                    <footer class="py-4 bg-light mt-auto">
                        <div class="container-fluid px-4">
                            <div class="d-flex align-items-center justify-content-between small">
                                <div class="text-muted">Copyright &copy; SSE Web Solutions</div>
                                <div>
                                    <a href="#">Privacy Policy</a>
                                    &middot;
                                    <a href="#">Terms &amp; Conditions</a>
                                </div>
                            </div>
                        </div>
                    </footer>

                </section>

            </div>



        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Selecting elements
                var saleInput = document.getElementById('sale');
                var buyInput = document.getElementById('buy');
                var profitInput = document.getElementById('profit');

                // Adding input event listeners
                saleInput.addEventListener('input', calculateProfit);
                buyInput.addEventListener('input', calculateProfit);

                // Function to calculate profit
                function calculateProfit() {
                    var saleValue = parseFloat(saleInput.value) || 0;
                    var buyValue = parseFloat(buyInput.value) || 0;
                    var profit = saleValue - buyValue;

                    // Updating the profit input value
                    profitInput.value = profit.toFixed(2);
                }
            });
        </script>


        @include('master.footer')
