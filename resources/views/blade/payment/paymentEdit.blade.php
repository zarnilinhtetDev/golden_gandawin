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
                                <h1>Payment Update</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>

                                    <li class="breadcrumb-item active">Payment Update
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </section>
                <div class="card card-warning col-8 offset-2 mt-5">


                    <!-- /.card-header -->
                    <div class="card-body ">
                        <form action="{{ url('/payment_update', $payment->id) }}" method="post">
                            @csrf

                            <div class="form-group">
                                <label for="date">Date <span class="text-danger">*</span></label>
                                <input type="date" class="form-control" id="payment_date"
                                    value="{{ $payment->payment_date }}" aria-describedby="emailHelp"
                                    name="payment_date" required>
                                @error('payment_date')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mt-3">
                                <label for="payment_amount">Amount<span class="text-danger">*</span></label>
                                <input type="number" class="form-control" id="payment_amount"
                                    aria-describedby="emailHelp" name="payment_amount" required
                                    value="{{ $payment->payment_amount }}">
                                @error('payment_amount')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>


                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>

                        </form>
                    </div>
                </div>
            </section>

        </div>



    </div>


    @include('master.footer')
