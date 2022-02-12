<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Klinik Tadika Mesra</title>

    <!-- Bootstrap -->
    <link href="{{ asset('bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('nprogress/nprogress.css') }}" rel="stylesheet">

    @stack('styles')

    <!-- Custom Theme Style -->
    <link href="{{ asset('css/custom.min.css') }}" rel="stylesheet">
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="{{ url('/') }}" class="site_title"><i class='fa fa-stethoscope'></i> <span>Klinik
                                Tadika Mesra</span></a>
                    </div>

                    <div class="clearfix"></div>

                    <!-- menu profile quick info -->
                    <div class="profile clearfix">
                        <div class="profile_info ml-3">
                            @can('isAdmin')
                            <span>Klinik {{ session('nama_wilayah') }},<br></span>
                            <a>{{ session('nama_pegawai') }}</a>
                            @endcan
                            @can('isSuperAdmin')
                            <span>Super Admin,<br></span>
                            <a style="font-size:10px"> {{ Auth::user()->email }}</a>
                            @endcan
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <!-- /menu profile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            <h3>Transaksi</h3>
                            <ul class="nav side-menu">
                                <li><a href="{{ route('transaksi.create') }}"><i class='fa fa-plus'></i> Tambah
                                        Pendaftaran </span></a></li>
                                <li><a href="{{ url('/transaksi') }}"><i class='fa fa-tasks'></i> Semua Pendaftaran
                                        </span></a></li>
                                <li><a href="{{ url('/butuh_tindakan') }}"><i class='fa fa-exclamation-circle'></i>
                                        Butuh Tindakan & Obat </span></a></li>
                                <li><a href="{{ url('/butuh_pembayaran') }}"><i class='fa fa-money'></i> Tagihan
                                        </span></a></li>
                            </ul>
                        </div>
                        <div class="menu_section">
                            <h3>Laporan</h3>
                            <ul class="nav side-menu">
                                <li><a href="{{ url('/laporan') }}"><i class='fa fa-bar-chart'></i> Laporan </span></a>
                                </li>
                            </ul>
                        </div>

                        @can('isSuperAdmin')
                        <div class="menu_section">
                            <h3>Manajemen</h3>
                            <ul class="nav side-menu">
                                <li><a href="{{ url('/pegawai') }}"><i class='fa fa-users'></i> Pegawai </span></a></li>
                                <li><a href="{{ url('/wilayah') }}"><i class='fa fa-hospital-o'></i> Area Wilayah
                                        </span></a></li>
                                <li><a href="{{ url('/tindakan') }}"><i class='fa fa-medkit'></i> Tindakan </span></a>
                                </li>
                                <li><a href="{{ url('/obat') }}"><i class='fa fa-flask'></i> Obat </span></a></li>
                            </ul>
                        </div>
                        @endcan


                    </div>
                    <!-- /sidebar menu -->

                    <!-- /menu footer buttons -->
                    <div class="sidebar-footer hidden-small">
                        <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html"
                            style="width: 100%" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <span class="glyphicon glyphicon-off" aria-hidden="true"></span> Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                    <!-- /menu footer buttons -->
                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">
                <div class="nav_menu">
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>
                    <nav class="nav navbar-nav">
                    </nav>
                </div>
            </div>
            <!-- /top navigation -->

            <!-- PAGE KONTEN -->
            @yield('content')
            <!-- END PAGE KONTEN -->

            <!-- footer content -->
            <footer>
                <div class="pull-right">
                    Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
                </div>
                <div class="clearfix"></div>
            </footer>
            <!-- /footer content -->
        </div>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('fastclick/lib/fastclick.js') }}"></script>
    <!-- NProgress -->
    <script src="{{ asset('nprogress/nprogress.js') }}"></script>


    <!-- Custom Theme Scripts -->
    <script src="{{ asset('js/custom.min.js') }}"></script>

    
    @stack('scripts')

</body>

</html>
