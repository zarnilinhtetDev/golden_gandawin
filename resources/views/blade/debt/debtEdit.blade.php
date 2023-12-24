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
                                <h1>ကြွေးကောက်</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item active">ကြွေးကောက်
                                    </li>
                                    <li class="breadcrumb-item active">ကြွေးကောက် ပြင်ဆင်ရန်
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </section>
                <div class="card card-warning col-8 offset-2">


                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="{{ url('debt_update', $debts->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <!-- input states -->
                            <div class="form-group">
                                <label class="col-form-label" for="inputSuccess">Customer Name</label>
                                <input type="text" class="form-control" id="inputSuccess" name="customer_name"
                                    placeholder="Enter ..." value="{{ $debts->customer_name }}">
                            </div>
                            <div class="form-group">
                                <label class="col-form-label" for="inputWarning">Voucher No.</label>
                                <input type="text" class="form-control" id="inputWarning" name="voucher_no"
                                    placeholder="Enter ..." value="{{ $debts->voucher_no }}">
                            </div>
                            <div class="form-group">
                                <label class="col-form-label" for="inputError">Amount</label>
                                <input type="text" class="form-control" id="inputError" name="amount"
                                    placeholder="Enter ..." value="{{ $debts->amount }}">
                            </div>
                            <label class="col-form-label" for="inputError">Remark</label>
                            <textarea id="remark" class="form-control" name="remark" rows="4" cols="50">{{ $debts->remark }}</textarea>

                            <button type="submit" class="btn btn-primary mt-2" name="submit">Update</button>
                        </form>

                    </div>
                </div>
            </section>

        </div>



    </div>


    @include('master.footer')
