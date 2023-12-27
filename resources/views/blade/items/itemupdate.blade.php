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
                                <h1>Product Update</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Product
                                    </li>
                                    <li class="breadcrumb-item active">Product Update
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </section>
                <div class="card card-warning col-8 offset-2">


                    <!-- /.card-header -->
                    <div class="card-body mt-4">
                        <form action="{{ url('update', $product->id) }}" method="post">
                            @csrf
                            <p>Description</p>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="voucher_no">Synthetic<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="Synthetic" name="Synthetic"
                                        value="{{ $product->Synthetic }}">
                                    @error('Synthetic')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group  col-md-6">
                                    <label for="voucher_no">Litre<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="Litre" name="Litre"
                                        value="{{ $product->Litre }}">
                                    @error('Litre')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <hr>
                            <p class="mt-3">Product and Quality</p>
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="voucher_no">API/ILSAC<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="API" name="API"
                                        value="{{ $product->API }}">
                                    @error('API')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="voucher_no">ACEA<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="ACEA" name="ACEA"
                                        value="{{ $product->ACEA }}">
                                    @error('ACEA')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="voucher_no">SAE<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="SAE" name="SAE"
                                        value="{{ $product->SAE }}">
                                    @error('SAE')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="mt-3  col-md-6">
                                    <label for="voucher_no">Packing<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="packing" name="packing"
                                        value="{{ $product->packing }}">
                                    @error('packing')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mt-3 col-md-6">
                                    <label for="voucher_no">Price<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="packing" name="price"
                                        value="{{ $product->price }}">
                                    @error('price')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mt-3">
                                <label for="voucher_no">Remark<span class="text-danger">*</span></label>
                                <textarea id="" cols="20" rows="3" class="form-control" name="remark">{{ $product->remark }}</textarea>
                                @error('remark')
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
