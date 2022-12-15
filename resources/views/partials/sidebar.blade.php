<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SIMKP</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item @if(request()->is('/')) active @endif">
        <a class="nav-link" href="{{ route('home') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Order
    </div>

    <!-- Nav Item - BookingVehicle -->
    <li class="nav-item @if(request()->is('admin/booking-vehicles*')) active @endif">
        <a class="nav-link" href="{{ url('/admin/booking-vehicles') }}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Booking Vehicles</span></a>
    </li>

    <!-- Nav Item - Approve1 Booking -->
    <li class="nav-item @if(request()->is('admin/approve1*')) active @endif">
        <a class="nav-link" href="{{ url('/admin/approve1') }}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Approve1 Booking</span></a>
    </li>

    <!-- Nav Item - Approve2 Booking -->
    <li class="nav-item @if(request()->is('admin/approve2*')) active @endif">
        <a class="nav-link" href="{{ url('/admin/approve2') }}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Approve2 Booking</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        CRUD
    </div>

    <!-- Nav Item - Drivers -->
    <li class="nav-item @if(request()->is('admin/drivers*')) active @endif">
        <a class="nav-link" href="{{ url('/admin/drivers') }}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Drivers</span></a>
    </li>

    <!-- Nav Item - Employees -->
    <li class="nav-item @if(request()->is('admin/employees*')) active @endif">
        <a class="nav-link" href="{{ url('/admin/employees') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Employees</span></a>
    </li>

    <!-- Nav Item - Vehicles -->
    <li class="nav-item @if(request()->is('admin/vehicles*') || request()->is('admin/rent-vehicles*')) active @endif">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            <i class="fas fa-fw fa-cubes"></i>
            <span>Vehicles</span>
        </a>
        <div id="collapseOne" class="collapse @if(request()->is('admin/vehicles*') || request()->is('admin/rent-vehicles*') ) show @endif" aria-labelledby="headingOne" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item @if(request()->is('admin/vehicles*')) active @endif" href="{{ url('/admin/vehicles') }}">Company</a>
                <a class="collapse-item @if(request()->is('admin/rent-vehicles*')) active @endif" href="{{ url('/admin/rent-vehicles') }}">Rent</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Users -->
    <li class="nav-item @if(request()->is('admin/users*')) active @endif">
        <a class="nav-link" href="{{ url('/admin/users') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Users</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>