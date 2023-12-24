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
                                <h1>Profit</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Profit
                                    </li>
                                    <li class="breadcrumb-item active">Profit Update
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </section>
                @if (session('update'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('update') }}

                    </div>
                @endif
                <div class="card card-warning col-8 offset-2">


                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="{{ url('profit_edit', $show->id) }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="date">Date <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" id="date"
                                        aria-describedby="emailHelp" name="profit_date" required
                                        value="{{ $show->profit_date }}">
                                    @error('profit_date')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class=" form-group  col-md-6">
                                    <label for="voucher_no">
                                        Customer Name<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="customer_name"
                                        aria-describedby="emailHelp" name="customer_name" required
                                        value="{{ $show->customer_name }}">
                                    @error('customer_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="amount">Voucher Number <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="voucher" name="voucher" required
                                    value="{{ $show->voucher }}">
                                @error('voucher')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mt-3">
                                <label for="amount">Voucher Date <span class="text-danger">*</span></label>
                                <input type="date" class="form-control" id="voucher_date" name="voucher_date"
                                    value="{{ $show->voucher_date }}">
                                @error('voucher_date')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mt-3">
                                <label for="amount">ရောင်းစျေး <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="sale" name="sale"
                                    value="{{ $show->sale }}">
                            </div>
                            <div class="form-group mt-3">
                                <label for="amount">ဝယ်စျေး <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="buy" name="buy"
                                    value="{{ $show->buy }}">
                            </div>
                            <div class="form-group mt-3">
                                <label for="amount">Profit <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="profit" name="profit"
                                    value="{{ $show->profit }}">
                            </div>

                            <div class="modal-footer justify-content-between">

                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>

                        </form>

                    </div>
                </div>
            </section>

        </div>



    </div>


    @include('master.footer')
