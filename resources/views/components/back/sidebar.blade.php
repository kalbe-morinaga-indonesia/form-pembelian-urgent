<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        {{-- <div class="image">
          <img src="{{ asset('theme/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
    </div> --}}
    <div class="info">
        <a href="#" class="d-block">{{ auth()->user()->txtNama }}</a>
    </div>
</div>

<!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="{{ route('dashboard') }}" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                    Dashboard
                </p>
            </a>
        </li>
        @hasrole('admin')
        <li class="nav-header">Master</li>
        <li class="nav-item">
            <a href="{{ route('departments.index') }}" class="nav-link">
                <i class="nav-icon fas fa-building"></i>
                <p>
                    Department
                </p>
            </a>
        </li>
        <li class="nav-item">
                    <a href="{{route('subdepartments.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-building"></i>
                        <p>
                            Sub Departemen
                        </p>
                    </a>
                </li>
        <li class="nav-item">
            <a href="{{route('divisis.index')}}" class="nav-link">
                <i class="nav-icon fas fa-globe"></i>
                <p>
                    Divisi
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('jabatan.index')}}" class="nav-link">
                <i class="nav-icon fas fa-briefcase"></i>
                <p>
                    Jabatan
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('lokasi.index')}}" class="nav-link">
                <i class="nav-icon fas fa-map"></i>
                <p>
                    Lokasi
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('users.index') }}" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>
                    Users
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('uoms.index') }}" class="nav-link">
                <i class="nav-icon fas fa-box"></i>
                <p>
                    UOM
                </p>
            </a>
        </li>
        <li class="nav-header">Role and Permissions</li>
        <li class="nav-item">
            <a href="{{ route('roles.index') }}" class="nav-link">
                <i class="nav-icon fas fa-cog"></i>
                <p>
                    Role
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('permissions.index') }}" class="nav-link">
                <i class="nav-icon fas fa-gavel"></i>
                <p>
                    Permission
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('assign-permissions.index') }}" class="nav-link">
                <i class="nav-icon fas fa-unlock"></i>
                <p>
                    Assign Permission
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('assign-users.index') }}" class="nav-link">
                <i class="nav-icon fas fa-door-open"></i>
                <p>
                    Assign User
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('settings.index') }}" class="nav-link">
                <i class="nav-icon fas fa-cog"></i>
                <p>
                    Setting
                </p>
            </a>
        </li>
        @endhasrole

        @hasrole('user|dept_head|buyer|pu_svp')
        <li class="nav-header">Request</li>
        <li class="nav-item">
            <a href="{{ route('purchase-requests.index') }}" class="nav-link">
                <i class="nav-icon fas fa-list"></i>
                <p>
                    List Request
                </p>
                @hasrole('dept_head')
                <span class="badge bg-primary">{{$count_in_process}}</span>
                @endhasrole
                @hasrole('pu_svp')
                <span class="badge bg-primary">{{$count_in_process_buyer}}</span>
                @endhasrole
            </a>
        </li>
        @endhasrole

        <li class="nav-item">
            <a href="{{route('profile')}}" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                <p>
                    Profile
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                <p>
                    Logout
                </p>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </a>
        </li>
    </ul>
</nav>
</div>
