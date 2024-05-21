<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false"
                aria-controls="ui-basic">
                <span class="menu-title">Settings</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('block.index') }}">Blocks</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('department.index') }}" class="nav-link">Departments</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('ward.index') }}" class="nav-link">Wards</a>
                    </li>
                </ul>
            </div>
        </li>
    </ul>
</nav>
