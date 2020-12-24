<!-- Sidebar -->
<div class="sidebar" id="sidebar" style="overflow: auto;">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">
                    <span>Main</span>
                </li>
                <li class="">
                    <a href="/dashboard"><i class="fe fe-home"></i> <span>Dashboard</span></a>
                </li>
                @if (auth()->guard('admin')->user()->hasRole('super_admin') ||auth()->guard('admin')->user()->hasRole('admin'))
                    @if (auth()->guard('admin')->user()->hasPermission('admins_read'))
                    <li class="{{ Request::segment(2) == 'admin' ? 'active' : null }}">
                        <a href="{{ url('/dashboard/admin') }}"><i class="fe fe-user"></i><span>Admins</span></a>
                    </li>
                    @endif
                    @if (auth()->guard('admin')->user()->hasPermission('cusines_read'))
                    <li class="{{ Request::segment(2) == 'cusine' ? 'active' : null }}">
                        <a href="{{ url('/dashboard/cusine') }}"><i class="fas fa-pizza-slice" style="font-size: 15px"></i> <span>Cusine</span></a>
                    </li>
                    @endif
                    @if (auth()->guard('admin')->user()->hasPermission('sections_read'))
                    <li class="{{ Request::segment(2) == 'section' ? 'active' : null }}">
                        <a href="{{ url('/dashboard/section') }}"><i class="fe fe-user"></i><span>Sections</span></a>
                    </li>
                    @endif
                    @if (auth()->guard('admin')->user()->hasPermission('addons_read'))
                    <li class="{{ Request::segment(2) == 'addons' ? 'active' : null }}">
                        <a href="{{ url('/dashboard/addons') }}"><i class="fe fe-user"></i><span>Addons</span></a>
                    </li>
                    @endif
                    @if (auth()->guard('admin')->user()->hasPermission('allergenes_read'))
                    <li class="{{ Request::segment(2) == 'allergen' ? 'active' : null }}">
                        <a href="{{ url('/dashboard/allergen') }}"><i class="fe fe-user"></i><span>Allergen</span></a>
                    </li>
                    @endif
                    @if (auth()->guard('admin')->user()->hasPermission('categories_read'))
                    <li class="{{ Request::segment(2) == 'category' ? 'active' : null }}">
                        <a href="{{ url('/dashboard/category') }}"><i class="fe fe-user"></i><span>Categories</span></a>
                    </li>
                    @endif
                    @if (auth()->guard('admin')->user()->hasPermission('cooks_read'))
                    <li class="{{ Request::segment(2) == 'cook' ? 'active' : null }}">
                        <a href="{{ url('/dashboard/cook') }}"><i class="fe fe-user-plus"></i> <span>Vendors</span></a>
                    </li>
                    @endif
                    @if (auth()->guard('admin')->user()->hasPermission('coupons_read'))
                    <li class="{{ Request::segment(2) == 'discount' ? 'active' : null }}">
                        <a href="{{ url('/dashboard/discount') }}"><i class="fe fe-user"></i> <span>Coupons</span></a>
                    </li>
                    @endif
                    @if (auth()->guard('admin')->user()->hasPermission('customers_read'))
                    <li class="{{ Request::segment(2) == 'customer' ? 'active' : null }}">
                        <a href="{{ url('/dashboard/customer') }}"><i class="fe fe-user"></i> <span>Customers</span></a>
                    </li>
                    @endif
                    @if (auth()->guard('admin')->user()->hasPermission('cities_read'))
                    <li class="{{ Request::segment(2) == 'city' ? 'active' : null }}">
                        <a href="{{ url('/dashboard/city') }}"><i class="fe fe-vector"></i> <span>Cities</span></a>
                    </li>
                    @endif
                    @if (auth()->guard('admin')->user()->hasPermission('settings_read'))
                    <li class="{{ Request::segment(2) == 'setting' ? 'active' : null }}">
                        <a href="{{ url('/dashboard/setting') }}"><i class="fe fe-vector"></i> <span>Settings</span></a>
                    </li>
                    @endif
                    @if (auth()->guard('admin')->user()->hasPermission('VIP_read'))
                    <li class="{{ Request::segment(1) == 'vipCustomers' ? 'active' : null }}">
                        <a href="{{ url('/dashboard/vipCustomers') }}"><i class="fe fe-user"></i> <span>VIP Customer</span></a>
                    </li>
                    @endif
                    {{-- @if (auth()->guard('admin')->user()->hasPermission('VIP_read'))
                    <li class="{{ Request::segment(1) == 'vipCooks' ? 'active' : null }}">
                        <a href="{{ url('/dashboard/vipCooks') }}"><i class="fe fe-user"></i> <span>VIP Cooks</span></a>
                    </li>
                    @endif --}}
                @endif
                @if (auth()->guard('admin')->user())
                <li class="{{ Request::segment(2) == 'order' ? 'active' : null }}">
                    <a href="{{ url('/dashboard/order') }}"><i class="fe fe-layout"></i> <span>orders</span></a>
                </li>
                @endif
                @if (auth()->guard('admin')->user())
                <li class="{{ Request::segment(2) == 'dish' ? 'active' : null }}">
                    <a href="{{ url('/dashboard/dish') }}"><i class="fas fa-pizza-slice" style="font-size: 15px"></i> <span>Dishes</span></a>
                </li>
                @endif



                {{-- <li>
                    <a href="#"><i class="fe fe-star-o"></i> <span>Reviews</span></a>
                </li>
                <li>
                    <a href="#"><i class="fe fe-activity"></i> <span>Transactions</span></a>
                </li>

                <li class="submenu">
                    <a href="#"><i class="fe fe-document"></i> <span> Reports</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="invoice-report.html">Invoice Reports</a></li>
                    </ul>
                </li> --}}

            </ul>
        </div>
    </div>
</div>
<!-- /Sidebar -->
