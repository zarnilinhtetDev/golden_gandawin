@include('master.header')

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
                        <div class="row ">
                            <div class="col-sm-6">
                                <h1>Customer Edit</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Customer
                                    </li>
                                    <li class="breadcrumb-item active">Customer Edit
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </section>
                <div class="card card-warning col-8 offset-2 mt-5">


                    <!-- /.card-header -->
                    <div class="card-body mt-4">
                        <form action="{{ url('/customer_update', $customer->id) }}" method="post">
                            @csrf

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="voucher_no">Customer Name<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="customer_name" name="customer_name"
                                        value="{{ $customer->customer_name }}">
                                    @error('customer_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group  col-md-6">
                                    <label for="voucher_no">Phone Number<span class="text-danger">*</span></label>
                                    <input type="tel" class="form-control" id="customer_ph" name="customer_ph"
                                        value="{{ $customer->customer_ph }}">
                                    @error('customer_ph')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="">
                                <label for="voucher_no">Address<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="address" name="address"
                                    value="{{ $customer->address }}">
                                @error('address')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>



                            <div class="mt-3">
                                <label for="voucher_no">Remark<span class="text-danger">*</span></label>
                                <textarea id="" cols="20" rows="3" class="form-control" name="remark">{{ $customer->remark }}</textarea>
                                @error('remark')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="modal-footer justify-content-end">

                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>


                        </form>
                    </div>
                </div>
            </section>

        </div>



    </div>


    @include('master.footer')
