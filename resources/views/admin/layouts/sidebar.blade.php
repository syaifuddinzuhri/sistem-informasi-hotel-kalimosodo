<div id="sidebar" class="active" style="z-index: 9999; position: relative">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="#">
                        <img src="{{ asset('img/logo.png') }}" alt="Logo" srcset="">
                    </a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">ADMINISTRATOR</li>

                <li class="sidebar-item active ">
                    <a href="{{ route('dashboard.index') }}" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-item ">
                    <a href="{{ route('user.index') }}" class='sidebar-link'>
                        <i class="fas fa-users"></i>
                        <span>User</span>
                    </a>
                </li>

                <li class="sidebar-item ">
                    <a href="{{ route('customer.index') }}" class='sidebar-link'>
                        <i class="fas fa-users"></i>
                        <span>Customer</span>
                    </a>
                </li>

                <li class="sidebar-item ">
                    <a href="{{ route('room.index') }}" class='sidebar-link'>
                        <i class="fas fa-person-booth"></i>
                        <span>Room</span>
                    </a>
                </li>

                <li class="sidebar-item ">
                    <a href="{{ route('facility.index') }}" class='sidebar-link'>
                        <i class="bi bi-file-earmark-medical-fill"></i>
                        <span>Facility</span>
                    </a>
                </li>

                <li class="sidebar-item ">
                    <a href="" class='sidebar-link'>
                        <i class="bi bi-file-earmark-medical-fill"></i>
                        <span>Reservasi</span>
                    </a>
                </li>

                <li class="sidebar-item ">
                    <a href="{{ route('blog.index') }}" class='sidebar-link'>
                        <i class="fas fa-newspaper"></i>
                        <span>Blog</span>
                    </a>
                </li>

                <li class="sidebar-item ">
                    <a href="{{ route('dashboard.index') }}" class='sidebar-link'>
                        <i class="fa fa-sign-out-alt"></i>
                        <span>Logout</span>
                    </a>
                </li>

            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>
