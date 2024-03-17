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
                <a href="{{route('doctors.dashboard')}}">
                    <div class="gui-icon"><i class="md md-home"></i></div>
                    <span class="title">Dashboard</span>
                </a>
            </li>

            <li class="gui-folder">
                <a href="{{ route('doctors.show_pending_appointments') }}">
                    <div class="gui-icon">
                        <i class="md md-person"></i>
                    </div>
                    <span class="title">Appoinments</span>
                </a>
            </li>

            <li class="gui-folder">
                <a href="{{route('doctors.show_patients')}}">
                <div class="gui-icon">
                    <i class="md md-person"></i>
                </div>
                <span class="title">Manage Patients</span>
            </a>
            </li>
        </ul>
    </div>
</div>
