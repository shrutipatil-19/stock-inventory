<!-- partial:partials/_sidebar.html -->
<nav class="sidebar">
    <div class="sidebar-header">
        <a href="#" class="sidebar-brand w-100 h-100">
            <!-- Noble<span>UI</span> -->
            <img src="{{ asset('frontend-assets/img/logo/sc-colored-horizontal.png') }}" alt="" class="w-100 h-100" style="object-fit: contain;">
        </a>
        <div class="sidebar-toggler">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav" id="sidebarNav">
            <!-- Admin Section (Show Everything) -->


            <!-- <p>Admin Access is working!</p> -->
            <li class="nav-item nav-category">Main</li>
            <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Dashboard</span>
                </a>
            </li>

            @canany('all-access')
            <li class="nav-item nav-category">Products</li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#emails" role="button" aria-expanded="false" aria-controls="emails">
                    <i class="link-icon" data-feather="mail"></i>
                    <span class="link-title">Products</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" data-bs-parent="#sidebarNav" id="emails">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('listProduct') }}" class="nav-link">List Products</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('addProduct') }}" class="nav-link">Add Products</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#uiComponents" role="button" aria-expanded="false" aria-controls="uiComponents">
                    <i class="link-icon" data-feather="mail"></i>
                    <span class="link-title">Stock Movements</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" data-bs-parent="#sidebarNav" id="uiComponents">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('stockIn') }}" class="nav-link">Stock In</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('addStockOut') }}" class="nav-link">Stock Out</a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">Movement History</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#uiComponentsStock" role="button" aria-expanded="false" aria-controls="uiComponents">
                    <i class="link-icon" data-feather="mail"></i>
                    <span class="link-title">Reports</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" data-bs-parent="#sidebarNav" id="uiComponentsStock">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="" class="nav-link">Low Stock Report Stock</a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">History per Product</a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">Stock Value Report</a>
                        </li>
                    </ul>
                </div>
            </li>
            @endcanany

            @can('admin-access')
            <li class="nav-item">
                <a href="{{ route('addUser') }}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Add Users</span>
                </a>
            </li>
            <!-- <p>Business Access is working!</p> -->
            <li class="nav-item nav-category">Suppliers</li>
            <li class="nav-item">
                <a href="{{ route('addSupplier') }}" class="nav-link">
                    <i class="link-icon" data-feather="hash"></i>
                    <span class="link-title">Add Supplier</span>
                </a>
            </li>
            <li class="nav-item mt-2">
                <a href="{{ route('listCustomer') }}" class="nav-link">
                    <i class="link-icon" data-feather="hash"></i>
                    <span class="link-title">Customer</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="" class="nav-link">
                    <i class="link-icon" data-feather="hash"></i>
                    <span class="link-title">Manage Suppliers</span>
                </a>
            </li>
            <li class="nav-item mt-2">
                <a href="" class="nav-link">
                    <i class="link-icon" data-feather="hash"></i>
                    <span class="link-title">Settings</span>
                </a>
            </li>
            @endcan
        </ul>
    </div>
</nav>
<!-- partial -->