<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu">

    <div class="slimscroll-menu">

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul class="metismenu" id="side-menu">

                <li class="menu-title">Navigation</li>

                <li>
                    <a href="{{ route('adminDashboard') }}">
                        <i class="mdi mdi-view-dashboard"></i>
                        <span> Dashboard </span>
                    </a>
                </li>
                <!--- Page sidebar -->
                <li>
                    <a href="javascript: void(0);">
                        <i class="mdi mdi-google-pages"></i>
                        <span> Pages </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="{{ route('admin.page') }}">All Pages</a></li>
                        <li><a href="{{ route('admin.page.create') }}">Create New Page</a></li>
                    </ul>
                </li>
                <!--- Page sidebar -->
                <li>
                    <a href="javascript: void(0);">
                        <i class="fas fa-image"></i>
                        <span> Slides </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="{{ route('admin.slide') }}">All Slides</a></li>
                        <li><a href="{{ route('admin.slide.create') }}">Create New Slide</a></li>
                    </ul>
                </li>
                <!--- Tax sidebar -->
                <li>
                    <a href="javascript: void(0);">
                        <i class="fas fa-funnel-dollar"></i>
                        <span> Taxes </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="{{ route('admin.tax') }}">All Taxes</a></li>
                        <li><a href="{{ route('admin.tax.create') }}">Create New Tax</a></li>
                    </ul>
                </li>

                <!--- Shipping sidebar -->
                <li>
                    <a href="javascript: void(0);">
                        <i class="fas fa-shipping-fast"></i>
                        <span> Shippings </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="{{ route('admin.shipping') }}">All Shippings</a></li>
                        <li><a href="{{ route('admin.shipping.create') }}">Create New Shipping</a>
                        </li>
                    </ul>
                </li>
                <!--- Payment sidebar -->
                <li>
                    <a href="javascript: void(0);">
                        <i class="fab fa-cc-visa"></i>
                        <span> Payments </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="{{ route('admin.payment') }}">All Payments</a></li>
                        <li><a href="{{ route('admin.payment.create') }}">Create New Payment</a>
                        </li>
                    </ul>
                </li>

                <!--- Discount sidebar -->
                <li>
                    <a href="javascript: void(0);">
                        <i class="mdi mdi-ticket-percent"></i>
                        <span> Discounts </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="{{ route('admin.discount') }}">All Discounts</a></li>
                        <li><a href="{{ route('admin.discount.create') }}">Create New Discount</a>
                        </li>
                    </ul>
                </li>

                <!--- Category sidebar -->
                <li>
                    <a href="javascript: void(0);">
                        <i class="fa fa-list-alt"></i>
                        <span> Categories </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="{{ route('admin.category') }}">All Categories</a></li>
                        <li><a href="{{ route('admin.category.create') }}">Create New Category</a>
                        </li>
                    </ul>
                </li>
                <!--- Product sidebar -->
                <li>
                    <a href="javascript: void(0);">
                        <i class="fas fa-shopping-basket"></i>
                        <span> Products </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="{{ route('admin.product') }}">All Products</a></li>
                        <li><a href="{{ route('admin.product.create') }}">Create New Product</a></li>
                    </ul>
                </li>
                <!--- Product sidebar -->
                <li>
                    <a href="javascript: void(0);">
                        <i class="ti-shopping-cart-full"></i>
                        <span> Orders </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="{{ route('admin.order') }}">All Orders</a></li>
                        <li><a href="{{ route('admin.order.create') }}">Create New Order</a></li>
                    </ul>
                </li>

                <li class="menu-title mt-2">Administration</li>

                <!--- User sidebar -->
                <li>
                    <a href="javascript: void(0);">
                        <i class="ion ion-ios-person"></i>
                        <span> Users </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="{{ route('admin.user') }}">All Users</a></li>
                        <li><a href="{{ route('admin.user.create') }}">Create New User</a></li>
                    </ul>
                </li>

                <!--- Role sidebar -->
                <li>
                    <a href="javascript: void(0);">
                        <i class="fas fa-users-cog"></i>
                        <span> Roles </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="{{ route('admin.role') }}">All Roles</a></li>
                        <li><a href="{{ route('admin.role.create') }}">Create New Role</a></li>
                    </ul>
                </li>
                <!--- Permission sidebar -->
                <li>
                    <a href="javascript: void(0);">
                        <i class="fas fa-user-lock"></i>
                        <span> Permissions </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="{{ route('admin.permission') }}">All Permissions</a></li>
                        <li><a href="{{ route('admin.permission.create') }}">Create New Permission</a>
                        </li>
                    </ul>
                </li>
                <!--- Settings sidebar -->
                <li>
                    <a href="{{route('admin.setting')}}">
                        <i class="fas fa-tools"></i>
                        <span> Settings </span>
                    </a>
                </li>
            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->
