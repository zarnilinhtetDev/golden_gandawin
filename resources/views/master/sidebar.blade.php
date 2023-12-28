<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light ml-6">Admin Dashboard</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ url('/dashboard') }}" class="nav-link">
                        <i class="fa-solid fa-list"></i>
                        <p>
                            ကြွေးကောက်
                            {{-- <i class="right fas fa-angle-left"></i> --}}
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/profit') }}" class="nav-link">
                        <i class="fa-solid fa-id-card"></i>
                        <p>
                            Profit
                            {{-- <i class="right fas fa-angle-left"></i> --}}
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/company_expense') }}" class="nav-link">
                        <i class="fa-solid fa-user-minus"></i>
                        <p>
                            Company Expenses
                            {{-- <i class="right fas fa-angle-left"></i> --}}
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/product') }}" class="nav-link">
                        <i class="fa-brands fa-product-hunt"></i>
                        <p>Products
                            {{-- <i class="right fas fa-angle-left"></i> --}}
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('/customer') }}" class="nav-link">
                        <i class="fa-solid fa-cart-shopping"></i>
                        <p>Customer
                            {{-- <i class="right fas fa-angle-left"></i> --}}
                        </p>
                    </a>
                </li>
                @if (auth()->user()->is_admin)
                    <a class="nav-link" href="{{ url('/user') }}">
                        <i class="fa-solid fa-user-plus"></i>
                        <p class="">
                            Users
                        </p>

                    </a>
                @endif
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
