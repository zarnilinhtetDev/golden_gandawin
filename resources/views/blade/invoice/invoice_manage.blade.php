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
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}

                        </div>
                    @endif



                    <section class="content-header">
                        <div class="container-fluid">
                            <div class="row mb-2">
                                <div class="col-sm-6">
                                    <h1> Invoice Manage Details</h1>
                                </div>
                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-sm-right">
                                        <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                                        <li class="breadcrumb-item active"> Invoice Manage Detail</li>
                                    </ol>
                                </div>
                            </div>
                        </div><!-- /.container-fluid -->
                    </section>

                    <section class="content-body">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"> Invoice Detail Table</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Customer Name</th>
                                            <th>Phone Number</th>
                                            <th>Address</th>
                                            <th>Invoice Date</th>
                                            <th>Due Date</th>

                                            <th>Payment</th>


                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = '1';
                                        @endphp
                                        @foreach ($details as $detail)
                                            <tr>
                                                <td>{{ $no }}</td>
                                                <td>
                                                    {{ $detail->customer_name }}
                                                </td>
                                                <td>{{ $detail->phone }}</td>
                                                <td>{{ $detail->address }}</td>
                                                <td>{{ $detail->invoice_date }}</td>
                                                <td>{{ $detail->payment_duedate }}</td>

                                                <td> <a href="{{ url('payment', $detail->id) }}" class="btn btn-info">
                                                        Payment
                                                    </a></td>


                                                <td>
                                                    <a href="{{ url('invoiceManage', $detail->id) }}"
                                                        class="btn btn-info">
                                                        <i class="fa-regular fa-file-lines"></i>
                                                    </a>
                                                    <a href="" class="btn btn-success">
                                                        <i class="fa-solid fa-pen-to-square"></i>
                                                    </a>

                                                    <a href=" " class="btn btn-danger"
                                                        onclick="return confirm('Are you sure you want to delete this product ?')">
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



        @include('master.footer')
