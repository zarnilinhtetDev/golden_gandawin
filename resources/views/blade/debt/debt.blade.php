<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>ကြွေးကောက်စာရင်း</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active"> ကြွေးကောက်စာရင်း</li>
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
    <button type="button" class="btn btn-primary mb-3 justify-content-end d-flex my-4" data-toggle="modal"
        data-target="#modal-default">
        Register
    </button>

    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Customer</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('/debt_register') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="customer_name">Customer Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="customer_name" aria-describedby="emailHelp"
                                name="customer_name" required>
                            @error('customer_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label for="voucher_no">Voucher No.<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="voucher_no" aria-describedby="emailHelp"
                                name="voucher_no" required>
                            @error('voucher_no')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label for="amount">Amount <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="amount" name="amount" required>
                            @error('amount')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <label for="remark">Remark</label>
                        <textarea id="remark" class="form-control" name="remark" rows="4" cols="50"></textarea>
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
                        <th>Customer Name</th>
                        <th>Voucher No.</th>
                        <th>Amount</th>

                        <th>Remark</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = '1';
                    @endphp
                    @foreach ($debts as $debt)
                        <tr>
                            <td>{{ $no }}</td>
                            <td>{{ $debt->customer_name }}</td>
                            <td>{{ $debt->voucher_no }}</td>
                            <td>{{ $debt->amount }}</td>
                            <td>{{ $debt->remark }}</td>
                            <td>
                                <a href="{{ url('debt_edit', $debt->id) }}" class="btn btn-success">
                                    <i class="fa-solid fa-pen-to-square"></i>

                                </a>

                                <a href="{{ url('debt_delete', $debt->id) }}" class="btn btn-danger"
                                    onclick="return confirm('Are you sure you want to delete this user ?')">
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
