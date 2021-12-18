
<!-- Sidenav -->
<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs  medibg" id="sidenav-main">
    <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="sidenav-header  align-items-center">
            <a class="navbar-brand" href="javascript:void(0)">
                <a href="{{route('dashboard.show')}}" class="nav_logo fw-bolder text-white "> <span class="nav_logo-name ">MEDICARE</span> </a>
            </a>
        </div>
        <div class="navbar-inner">
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <!-- Nav items -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{route('dashboard.show')}}">
                            <i class="fas fa-tachometer-alt"></i>
                            <span class="nav-link-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('appointments')}}">
                            <i class="fas fa-calendar-day"></i> <span class="nav_name text-white ">Appointments</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('roles.show')}}">
                            <i class="fas fa-user-friends"></i> <span class="nav_name text-white ">Roles</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('prescriptions')}}">
                            <i class="fas fa-prescription-bottle"></i> <span class="nav_name text-white ">Prescription</span>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="{{route('users')}}">
                            <i class="fas fa-user-friends "></i> <span class="nav_name text-white ">Users</span>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="{{route('users')}}">
                            <i class="fas fa-tasks"></i><span class="nav_name text-white ">Consultation Settings</span>
                        </a>
                    </li>

                </ul>

            </div>
        </div>
    </div>
</nav>
<!-- Main content -->