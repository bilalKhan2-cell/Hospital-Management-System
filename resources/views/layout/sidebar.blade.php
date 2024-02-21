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

            <li>
                <a href="../../html/dashboards/dashboard.html">
                    <div class="gui-icon"><i class="md md-home"></i></div>
                    <span class="title">Dashboard</span>
                </a>
            </li>

            <li class="gui-folder">
                <a>
                    <div class="gui-icon"><i class="md md-settings"></i></div>
                    <span class="title">Settings</span>
                </a>

                <ul>
                    <li><a href="{{route('blocks.index')}}"><span class="title">Manage Blocks</span></a></li>
                </ul>
            </li>

        </ul>

    </div>
</div>
