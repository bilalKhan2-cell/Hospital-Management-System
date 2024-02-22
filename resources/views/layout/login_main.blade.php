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

</head>

<body class="menubar-hoverable header-fixed ">

    <section class="section-account">
        <div class="img-backdrop" style="background-image: url('{{ asset('img/img16.jpg') }}')"></div>
        <div class="spacer"></div>
        <div class="card contain-sm style-transparent">
            <div class="card-body">
                @yield('content')
            </div>
        </div>
    </section>
    @include('layout.footer')
</body>

</html>
