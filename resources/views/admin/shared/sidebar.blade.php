<aside>
    <div id="sidebar"  class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
            <li>
                <a class="active" href="{{ route('admin-home') }}">
                    <i class="fa fa-dashboard"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            @if($admin->role_admin == 'manager')
            <li class="sub-menu">
                <a href="javascript:;" >
                    <i class="fa fa-user"></i>
                    <span>User Manage</span>
                </a>
                <ul class="sub">
                    <li><a  href="{{ route('getListAdmin') }}">User List</a></li>
                    <li><a  href="{{ route('addAmin') }}">Add new user</a></li>
                </ul>
            </li>
            @endif
            <li class="sub-menu">
                <a href="javascript:;" >
                    <i class="fa fa-laptop"></i>
                    <span>Product Manager</span>
                </a>
                <ul class="sub">
                    <li><a  href="{{ route('getListProduct') }}">Product List</a></li>
                    <li><a  href="{{ route('getAddProduct') }}">Add new product</a></li> -->
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" >
                    <i class="fa fa-book"></i>
                    <span>Protype manager</span>
                </a>
                <ul class="sub">
                    <li><a  href="{{ route('getListProtype') }}">Protype List</a></li>
                    <li><a  href="{{ route('getAddProtype') }}">Add new protype</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" >
                    <i class="fa fa-cogs"></i>
                    <span>Manufacture manage</span>
                </a>
                <ul class="sub">
                    <li><a  href="{{ route('getListManufacture') }}">Manufacture List</a></li>
                    <li><a  href="{{ route('getAddManufacture') }}">Add new manufacture</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" >
                    <i class="fa fa-shopping-cart"></i>
                    <span>Order</span>
                </a>
                <ul class="sub">
                    <li><a  href="{{ route('getListOrder') }}">Order List</a></li>
                </ul>
            </li>
            <!--multi level menu start-->
            <li class="sub-menu">
                <a href="javascript:;" >
                    <i class="fa fa-shopping-cart"></i>
                    <span>Customer Manage</span>
                </a>
                <ul class="sub">
                    <li><a  href="{{ route('getListCustomer') }}">Customer List</a></li>                 
                </ul>
            </li>
            <!--multi level menu end-->
            <li class="sub-menu">
                <a href="javascript:;" >
                    <i class="fa fa-shopping-cart"></i>
                    <span>Slide Manage</span>
                </a>
                <ul class="sub">
                    <li><a  href="{{ route('getListSlide') }}">Slide List</a></li>       
                    <li><a  href="{{ route('getAddSlide') }}">Add new slide</a></li>              
                </ul>
            </li>
        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>