<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="auth/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">@if(auth()->check())
                        Welcome, {{ auth()->user()->name }}
                    @else
                        Welcome, Guest
                    @endif</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            @php
                // Mapping of names to icons and URLs
                $menuItems = [
                    'Dashboard' => ['icon' => 'fas fa-tachometer-alt', 'url' => url('/Dashboard')],
                    'Employees' => ['icon' => 'fas fa-user', 'url' => url('/employee')],
                    'Jobs' => ['icon' => 'fas fa-briefcase', 'url' => url('/Jobs')],
                    'Jobs History' => ['icon' => 'fas fa-history', 'url' => url('/jobshistory')],
                    'Jobs Grades' => ['icon' => 'fas fa-star', 'url' => url('/JobGrade')],
                    'Departments' => ['icon' => 'fas fa-building', 'url' => url('/Department')],
                    'Countries' => ['icon' => 'fas fa-globe', 'url' => url('/countries')],
                    'Locations' => ['icon' => 'fas fa-map-marker', 'url' => url('/Location')],
                    'Regions' => ['icon' => 'fas fa-globe', 'url' => url('/Regions')],
                    'Manager' => ['icon' => 'fas fa-user', 'url' => url('/Manager')],
                ];
            @endphp

            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @foreach ($menuItems as $name => $menuItem)
                    <li class="nav-item">
                        <a href="{{ $menuItem['url'] }}" class="nav-link">
                            <i class="nav-icon {{ $menuItem['icon'] }}"></i>
                            <p>{{ $name }}</p>
                        </a>
                    </li>
                @endforeach
                <li class="nav-item">
                    <a href="{{ route('Payroll.create') }}" class="nav-link @if(Request::segment(2) == 'payroll') active @endif">
                        <i class="nav-icon fa fa-credit-card"></i>
                        <p>Pay Roll</p>
                    </a>
                </li>
            </ul>
        </nav>

        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
