<div id="menubar" class="menubar-inverse ">
    <div class="menubar-fixed-panel">
        <div>
            <a class="btn btn-icon-toggle btn-default menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
                <i class="fa fa-bars"></i>
            </a>
        </div>
        <div class="expanded">
            <a href="{{ route('dashboard') }}">
                <span class="text-lg text-bold text-primary ">WELCOME&nbsp;ADMIN</span>
            </a>
        </div>
    </div>
    <div class="menubar-scroll-panel">

        <ul id="main-menu" class="gui-controls">

            <li class="gui-folder">
                <a href="{{ route('dashboard') }}">
                    <div class="gui-icon"><i class="md md-home"></i></div>
                    <span class="title">Dashboard</span>
                </a>
            </li>

            @if (Auth::guard('web')->user()->id == 1)
                <li class="gui-folder">
                    <a href="{{ route('users.index') }}">
                        <div class="gui-icon">
                            <i class="md md-person"></i>
                        </div>
                        <span class="title">Users</span>
                    </a>
                </li>
            @endif

            <li class="gui-folder">
                <a href="{{ route('doctors.index') }}">
                    <div class="gui-icon">
                        <i class="md md-person"></i>
                    </div>
                    <span class="title">Doctors</span>
                </a>
            </li>

            <li class="gui-folder">
                <a>
                    <div class="gui-icon"><i class="md md-settings"></i></div>
                    <span class="title">Application Settings</span>
                </a>

                <ul>
                    <li><a href="{{ route('designations.index') }}"><span class="title">Manage Designations</span></a>
                    </li>
                    <li><a href="{{ route('blocks.index') }}"><span class="title">Manage Blocks</span></a></li>
                    <li><a href="{{ route('departments.index') }}"><span class="title">Manage Departments</span></a>
                    </li>
                    <li><a href="{{ route('wards.index') }}"><span class="title">Manage Wards</span></a></li>
                    <li><a href="{{ route('medicines.index') }}"><span class="title">Manage Medicines Items</span></a>
                    </li>
                </ul>
            </li>

            <li class="gui-folder">
                <a>
                    <div class="gui-icon"><i class="md md-store"></i></div>
                    <span class="title">Manage Stock</span>
                </a>

                <ul>
                    <li><a href="{{ route('stock_requests.create') }}"><span class="title">Create Stock
                                Request</span></a></li>
                    <li><a href="{{ route('stock.requests') }}"><span class="title">Stock Requests</span></a>
                    </li>
                    <li><a href="{{ route('suppliers.index') }}"><span class="title">Suppliers</span></a></li>
                    <li><a href="{{ route('stocks.show_unapproved') }}"><span class="title">Pending Stock
                                Requests</span></a></li>
                </ul>
            </li>

            <li class="gui-folder">
                <a>
                    <div class="gui-icon"><i class="fa fa-bed"></i>
                    </div>
                    <span class="title">Patients</span>
                </a>

                <ul>
                    <li><a href="{{ route('patients.index') }}"><span class="title">Manage Patients</span></a></li>
                    <li><a href="{{ route('patients.admitting') }}"><span class="title">Manage Patients
                                Recieving</span></a></li>
                </ul>
            </li>

        </ul>

    </div>
</div>
