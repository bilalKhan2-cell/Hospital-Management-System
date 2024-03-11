<html lang="en">

<head>
    <title>Hospital Management System - @yield('title')</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="your,keywords">
    <meta name="description" content="Short explanation about this website">

    <link href='http://fonts.googleapis.com/css?family=Roboto:300italic,400italic,300,400,500,700,900' rel='stylesheet'
        type='text/css' />
    <link type="text/css" rel="stylesheet" href="{{ asset('css/theme-default/bootstrap.css?1422792965') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('css/theme-default/materialadmin.css?1425466319') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('css/theme-default/font-awesome.min.css?1422529194') }}" />
    <link type="text/css" rel="stylesheet"
        href="{{ asset('css/theme-default/material-design-iconic-font.min.css?1421434286') }}" />
    <link rel="stylesheet" href="{{ asset('css/theme-default/libs/DataTables/jquery.dataTables.css?1423553989') }}">

    @stack('style')
</head>

<body class="menubar-hoverable header-fixed menubar-pin ">

    @include('layout.header')

    <div id="base">
        <div id="content">
            <section>
                <div class="section-header">
                    @yield('breadcrumbs')
                </div>
                <div class="section-body">
                    <div class="card">
                        <div class="card-body">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </section>
        </div>

        @include('layout.sidebar')
    </div>

    @include('layout.footer')
    @stack('script')
</body>

</html>
