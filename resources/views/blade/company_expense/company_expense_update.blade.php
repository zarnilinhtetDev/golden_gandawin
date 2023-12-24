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
                                <h1>Company Expenses</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Company Expenses
                                    </li>
                                    <li class="breadcrumb-item active">Company Expenses Update
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </section>
                <div class="card card-warning col-8 offset-2">


                    <!-- /.card-header -->
                    <div class="card-body mt-5">
                        <form action="{{ url('company_expense_edit', $show->id) }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="date">Date <span class="text-danger">*</span></label>
                                <input type="date" class="form-control" id="date" aria-describedby="emailHelp"
                                    name="date" value="{{ $show->date }}">
                                @error('date')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mt-3">
                                <label for="voucher_no">Description<span class="text-danger">*</span></label>
                                <textarea name="description" id="" cols="30" rows="5" class="form-control">{{ $show->description }}</textarea>
                                @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mt-3">
                                <label for="amount">User Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="voucher" name="user_name"
                                    value=" {{ $show->user_name }}">
                                @error('user_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mt-3">
                                <label for="amount">Amount <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" id="voucher_date" name="amount"
                                    value="{{ $show->amount }}">
                                @error('amount')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
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
