<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4"
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="{{ route('home') }}" target="_blank">
            <span class="ms-1 font-weight-bold">Admin Panel</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <!-- Dashboard -->
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center" href="{{ route('home') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center d-flex align-items-center justify-content-center me-2">
                        <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text">Dashboard</span>
                </a>
            </li>

            <!-- Section Header -->
            <li class="nav-item mt-3 d-flex align-items-center">
                <h6 class="ms-3 text-uppercase text-xs font-weight-bolder opacity-6 mb-0">Main Menu</h6>
            </li>

            <li class="nav-item">
                <a class="nav-link d-flex align-items-center" href="{{ route('get-users') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center d-flex align-items-center justify-content-center me-2">
                        <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text">Users</span>
                </a>
            </li>

            <!-- User Appointments -->
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center" href="{{ route('user-appointments') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center d-flex align-items-center justify-content-center me-2">
                        <i class="ni ni-collection text-info text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text">User appointments</span>
                </a>
            </li>

            <!-- Doctors -->
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center" href="{{ route('doctors') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center d-flex align-items-center justify-content-center me-2">
                        <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text">Doctors</span>
                </a>
            </li>
            {{-- <li class="nav-item">
                <a class="nav-link d-flex align-items-center" href="{{ route('tableView') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center d-flex align-items-center justify-content-center me-2">
                        <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text"></span>
                </a>
            </li> --}}
        </ul>
    </div>
</aside>
