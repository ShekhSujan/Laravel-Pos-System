<nav id="sidebar" class="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="{{ route('dashboard') }}" class="logo">
            <img src="{{ $allSetting->logo_url }}" alt="" />
        </a>
    </div>
    <style>
        .aheader {
            padding: 0px 35px 0px 15px !important;
        }

        .bheader {
            padding: 5px 35px 5px 42px !important;
        }

        .page-wrapper .sidebar-wrapper .sidebar-menu .sidebar-dropdown>a:after {
            top: 10px !important;
        }

        .slimScrollBar {
            width: 10px !important;
            z-index: 99999 !important;
        }
    </style>
    <script>
        $(document).ready(function() {
            $('li.sidebar-dropdown').each(function() {
                if ($(this).find('a.current-page').length > 0) {
                    $(this).addClass('active');
                }
            });
        });
    </script>
    <div class="sidebar-content">
        <div class="sidebar-menu NavScroll pb-5">
            <ul>
                <li>
                    <a href="{{ route('dashboard') }}">
                        <i class="icon-grid"></i>
                        <span class="menu-text">Dashboard</span>
                    </a>
                </li>
                @can('SuperAdmin')
                    <li class="sidebar-dropdown">
                        <a href="#" class="aheader">
                            <i class="icon-users"></i>
                            <span class="menu-text">Admins</span>
                        </a>
                        <div class="sidebar-submenu">
                            <ul>
                                <li><a href="{{ route('admin.create') }}"
                                        class="bheader {{ request()->url() == route('admin.create') ? 'current-page' : '' }}">New
                                        User</a></li>
                                <li><a href="{{ route('admin.index') }}"
                                        class="bheader {{ request()->url() == route('admin.index') ? 'current-page' : '' }}">All
                                        Admin</a></li>
                            </ul>
                        </div>
                    </li>
                @endcan
                <li class="sidebar-dropdown">
                    <a href="#" class="aheader">
                        <i class="icon-git-branch"></i>
                        <span class="menu-text">Categories</span>
                    </a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li><a href="{{ route('category.create') }}"
                                    class="bheader {{ request()->url() == route('category.create') ? 'current-page' : '' }}">New
                                    Category</a></li>
                            <li><a href="{{ route('category.index') }}"
                                    class="bheader {{ request()->url() == route('category.index') ? 'current-page' : '' }}">All
                                    Category</a></li>
                        </ul>
                    </div>
                </li>
                <li class="sidebar-dropdown">
                    <a href="#" class="aheader">
                        <i class="icon-bold"></i>
                        <span class="menu-text">Brands</span>
                    </a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li><a href="{{ route('brand.create') }}"
                                    class="bheader {{ request()->url() == route('brand.create') ? 'current-page' : '' }}">New
                                    Brands</a></li>
                            <li><a href="{{ route('brand.index') }}"
                                    class="bheader {{ request()->url() == route('brand.index') ? 'current-page' : '' }}">All
                                    Brands</a></li>
                        </ul>
                    </div>
                </li>

                <li class="sidebar-dropdown">
                    <a href="#" class="aheader">
                        <i class="icon-list"></i>
                        <span class="menu-text">Products</span>
                    </a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li><a href="{{ route('product.create') }}"
                                    class="bheader {{ request()->url() == route('product.create') ? 'current-page' : '' }}">New
                                    Product</a></li>
                            <li><a href="{{ route('product.index') }}"
                                    class="bheader {{ request()->url() == route('product.index') ? 'current-page' : '' }}">All
                                    Product</a></li>
                            <li><a href="{{ route('product.inactive') }}"
                                    class="bheader {{ request()->url() == route('product.inactive') ? 'current-page' : '' }}">Inactive
                                    Product</a></li>
                            <li><a href="{{ route('product.filter') }}"
                                    class="bheader {{ request()->url() == route('product.filter') ? 'current-page' : '' }}">Filter
                                    Product</a></li>
                        </ul>
                    </div>
                </li>

                <li class="sidebar-dropdown">
                    <a href="#" class="aheader">
                        <i class="icon-shopping-cart1"></i>
                        <span class="menu-text">Orders/Pos</span>
                    </a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li><a href="{{ route('order.create') }}"
                                    class="bheader {{ request()->url() == route('order.create') ? 'current-page' : '' }}">New
                                    Order</a></li>
                            <li><a href="{{ route('order.pos_sales') }}"
                                    class="bheader {{ request()->url() == route('order.pos_sales') ? 'current-page' : '' }}">Orders</a>
                            </li>
                            <li><a href="{{ route('order.pending') }}"
                                    class="bheader {{ request()->url() == route('order.pending') ? 'current-page' : '' }}">Pending
                                    / Draft</a></li>
                            <li><a href="{{ route('cash.index') }}"
                                    class="bheader {{ request()->url() == route('cash.index') ? 'current-page' : '' }}">Cash
                                    Register</a></li>

                        </ul>
                    </div>
                </li>

                <li class="sidebar-dropdown">
                    <a href="#" class="aheader">
                        <i class="icon-archive1"></i>
                        <span class="menu-text">Stock</span>
                    </a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li><a href="{{ route('stock.index') }}"
                                    class="bheader {{ request()->url() == route('stock.index') ? 'current-page' : '' }}">Add
                                    Stock</a></li>
                            <li><a href="{{ route('stock.all') }}"
                                    class="bheader {{ request()->url() == route('stock.all') ? 'current-page' : '' }}">All
                                    Stock</a></li>
                            <li><a href="{{ route('stock.filter') }}"
                                    class="bheader {{ request()->url() == route('stock.filter') ? 'current-page' : '' }}">filter</a>
                            </li>
                            <li><a href="{{ route('supplier.create') }}"
                                    class="bheader {{ request()->url() == route('supplier.create') ? 'current-page' : '' }}">New
                                    Supplier</a></li>
                            <li><a href="{{ route('supplier.index') }}"
                                    class="bheader {{ request()->url() == route('supplier.index') ? 'current-page' : '' }}">Supplier
                                    List</a></li>
                        </ul>
                    </div>
                </li>
                <li class="sidebar-dropdown">
                    <a href="#" class="aheader">
                        <i class="icon-trending_up"></i>
                        <span class="menu-text">Report</span>
                    </a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li><a href="{{ route('order.today') }}"
                                    class="bheader {{ request()->url() == route('order.today') ? 'current-page' : '' }}">Todays Report</a>
                            </li>
                            <li><a href="{{ route('order.month') }}"
                                    class="bheader {{ request()->url() == route('order.month') ? 'current-page' : '' }}">Monthly Report</a>
                            </li>
                            <li><a href="{{ route('order.filter') }}"
                                    class="bheader {{ request()->url() == route('order.filter') ? 'current-page' : '' }}">Report Filter</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="sidebar-dropdown">
                    <a href="#" class="aheader">
                        <i class="icon-dollar-sign"></i>
                        <span class="menu-text">Payment Method</span>
                    </a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li><a href="{{ route('payment-method.create') }}"
                                    class="bheader {{ request()->url() == route('payment-method.create') ? 'current-page' : '' }}">New
                                    Payment Method</a>
                            </li>
                            <li><a href="{{ route('payment-method.index') }}"
                                    class="bheader {{ request()->url() == route('payment-method.index') ? 'current-page' : '' }}">All
                                    Payment Method</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="sidebar-dropdown">
                    <a href="#" class="aheader">
                        <i class="icon-file-text"></i>
                        <span class="menu-text">Supplier</span>
                    </a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li><a href="{{ route('supplier.create') }}"
                                    class="bheader {{ request()->url() == route('supplier.create') ? 'current-page' : '' }}">New
                                    Supplier</a></li>
                            <li><a href="{{ route('supplier.index') }}"
                                    class="bheader {{ request()->url() == route('supplier.index') ? 'current-page' : '' }}">All
                                    Supplier</a></li>
                        </ul>
                    </div>
                </li>
                <li class="sidebar-dropdown">
                    <a href="#" class="aheader">
                        <i class="icon-settings1"></i>
                        <span class="menu-text">Settings</span>
                    </a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li><a href="{{ route('setting') }}"
                                    class="bheader {{ request()->url() == route('setting') ? 'current-page' : '' }}">Setting</a>
                            </li>
                            <li><a href="{{ route('invoice.setting') }}"
                                    class="bheader {{ request()->url() == route('invoice.setting') ? 'current-page' : '' }}">Invoice
                                    Seting</a></li>

                        </ul>
                    </div>
                </li>


                <li class="sidebar-dropdown">
                    <a href="#" class="aheader">
                        <i class="icon-refresh-cw"></i>
                        <span class="menu-text">Cache Refresh</span>
                    </a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li><a href="{{ route('clear_log') }}" class="bheader">Clear Log/Cache</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
