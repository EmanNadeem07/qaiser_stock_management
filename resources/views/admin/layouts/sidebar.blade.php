<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <a href="{{ route('dashboard') }}" class="brand-link">
        <img src="{{ asset('images/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">
            <h6>New China Gass Center</h6>
        </span>
    </a>

    <div class="sidebar">

        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <a href="{{ route('dashboard') }}" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item menu-open">
                    <a href="{{ route('dashboard') }}" class="nav-link ">
                        <i class="fa fa-tachometer" aria-hidden="true"></i>
                        <p>
                            &nbsp;&nbsp; Dashboard
                            <i class="right fa"></i>
                        </p>
                    </a>
                </li>
                {{-- <li class="nav-item menu-open">
                    <a href="{{ route('supllier.list') }}" class="nav-link ">
                        <i class="nav-icon fa fa-tachometer-alt"></i>
                        <p>
                            Suppliers
                            <i class="right fa"></i>
                        </p>
                    </a>
                </li> --}}
                <li class="nav-item menu-open">
                    <a href="{{ route('product.list') }}" class="nav-link ">
                        <i class="fa fa-product-hunt" aria-hidden="true"></i>
                        <p>
                            &nbsp;&nbsp; Products
                            <i class="right fa"></i>
                        </p>
                    </a>
                </li>
                {{-- <li class="nav-item menu-open">
                    <a href="{{ route('customer.list') }}" class="nav-link ">
                        <i class="nav-icon fa fa-tachometer-alt"></i>
                        <p>
                            Customers
                            <i class="right fa"></i>
                        </p>
                    </a>
                </li> --}}
                <li class="nav-item menu-open">
                    <a href="{{ route('salesHistory') }}" class="nav-link ">
                        <i class="fa fa-history" aria-hidden="true"></i>
                        <p>
                            &nbsp; &nbsp;Sale History
                            <i class="right fa"></i>
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
