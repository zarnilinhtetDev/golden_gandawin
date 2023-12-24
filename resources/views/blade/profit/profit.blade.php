<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Car Management</title>

    <!-- Google Font: Source Sans Pro -->

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
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
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
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
                                    <h1>Profit</h1>
                                </div>
                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-sm-right">
                                        <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                                        <li class="breadcrumb-item active"> Profit</li>
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
                    @if (session('success_import'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success_import') }}

                    </div>
                    @endif
                    @if (session('delete_success'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('delete_success') }}

                    </div>
                    @endif



                    <section class="content-body">
                        <button type="button" class="btn btn-default btn-primary text-white my-3" style="background-color: #007BFF" data-toggle="modal" data-target="#modal-lg">
                            Register
                        </button>

                        <div class="modal fade" id="modal-lg">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Profit Registers</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ url('/profit_register') }}" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <label for="date">Date <span class="text-danger">*</span></label>
                                                <input type="date" class="form-control" id="date" value="<?php echo date('Y-m-d'); ?>" aria-describedby="emailHelp" name="profit_date" required>
                                                @error('profit_date')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group mt-3">
                                                <label for="voucher_no">Customer Name<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="customer_name" aria-describedby="emailHelp" name="customer_name" required>
                                                @error('customer_name')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group mt-3">
                                                <label for="amount">Voucher Number <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="voucher" name="voucher" required>
                                                @error('voucher')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group mt-3">
                                                <label for="amount">Voucher Date <span class="text-danger">*</span></label>
                                                <input type="date" class="form-control" id="voucher_date" name="voucher_date">
                                                @error('voucher_date')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group mt-3">
                                                <label for="amount">ရောင်းစျေး <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="sale" name="sale">
                                            </div>
                                            <div class="form-group mt-3">
                                                <label for="amount">ဝယ်စျေး <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="buy" name="buy">
                                            </div>
                                            <div class="form-group mt-3">
                                                <label for="amount">Profit <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="profit" name="profit">
                                            </div>

                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Register</button>
                                            </div>

                                        </form>

                                    </div>

                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">User Table</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Date</th>
                                            <th>Customer Name</th>
                                            <th>Voucher Number</th>
                                            <th>Voucher Date</th>
                                            <th>ရောင်းစျေး</th>
                                            <th>ဝယ်စျေး </th>
                                            <th>Profit </th>


                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $no = '1';
                                        @endphp
                                        @foreach ($profits as $profit)
                                        <tr>
                                            <td>{{ $no }}</td>
                                            <td>{{ $profit->profit_date }}</td>
                                            <td>{{ $profit->customer_name }}</td>
                                            <td>{{ $profit->voucher }}</td>
                                            <td>{{ $profit->voucher_date }}</td>
                                            <td>{{ $profit->sale }}</td>
                                            <td>{{ $profit->buy }}</td>
                                            <td>{{ $profit->profit }}</td>



                                            <td>
                                                <a href="{{ url('profit_update', $profit->id) }}" class="btn btn-success">
                                                    <i class="fa-solid fa-pen-to-square"></i>

                                                </a>

                                                <a href="{{ url('profit_delete', $profit->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this user ?')">
                                                    <i class="fa-solid fa-trash"></i></a>


                                            </td>

                                        </tr>
                                        @php
                                        $no++;
                                        @endphp
                                        @endforeach
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