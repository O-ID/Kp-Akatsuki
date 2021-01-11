<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>PSB --Pendaftaran Siswa Baru</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/material/material.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/transition.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/datepick/css/bootstrap-datepicker3.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/perfect-scrollbar.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/material-dashboard-pro.min.css?v=2.1.0') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/lib/daftar.min.css') }}">

    <!-- JS CORE -->
    <script src="{{ asset('assets/js/core/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/datepick/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/bootstrap-notify.js') }}"></script>

</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="black" data-image="{{ asset('assets/img/sidebar-2.jpg') }}">
      <div class="logo">
        <div class="row">
          <div class="col text center">
            <a href="{{ route('pengunjung.index') }}"><img class="mx-auto d-block" src="{{ asset('assets/img/favicon.png') }}" style="width: 100px"></a>
          </div>
        </div>
        <a href="{{ route('pengunjung.index') }}" class="simple-text text-center logo-normal">SMK ISLAM TANJUNG</a>
        </div>
      <div class="sidebar-wrapper">
        @if (Session::has('LoginAdmin'))
            @include('desain.menuadmin')
        @else
            @include('desain.menuuser')
        @endif
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ld ld-slide-ttb-in" id="navigation-example">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:void(0)">@yield('halaman')</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation" data-target="#navigation-example">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
              <li class="nav-item">
                <div class="dropdown">
                  <a class="nav-link" href="javascript:void(0)" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="material-icons">person</i>
                    <p class="d-lg-none d-md-block">
                      Account
                    </p>
                  </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                    <div class="container">
                        @if (Session::has('LoginAdmin'))
                        <div class="d-flex justify-content-center pt-2">
                            {{-- <i class="material-icons lg-icon">person</i> --}}
                            <img src="/assets/img/adminlogo.png" width="50px" alt="" srcset=""><br>
                        </div>
                        <div class="d-flex justify-content-center pt-2">
                            <h6>{{Session::get('name')}}</h6>
                        </div>
                        <div class="d-flex justify-content-center pt-2 pb-2">
                            <a class="btn btn-primary btn-sm" href="{{ url ('/register') }}" data-toggle="tooltip" data-placement="bottom" title="Tambah Admin Pendaftaran"><i class="material-icons">person_add</i></a>
                            <a class="btn btn-danger btn-sm" href="{{ url ('/logout') }}" data-toggle="tooltip" data-placement="bottom" title="Keluar"><i class="material-icons">power_settings_new</i></a>
                        </div>
                        @else
                        <h4 class="text-center pt-2">Login Admin</h4>
                        <form class="pt-2 pb-2" method="post" action="{{ url ('/LoginAdmin') }}" autocomplete="false" style="width: 200px">
                            {{csrf_field()}}
                            <div class="d-flex justify-content-center">
                                <div class="form-group @error('email') has-danger @enderror">
                                    <label class="bmd-label-floating">Email</label>
                                    <input type="email" class="form-control text-dark" name="email">
                                </div>
                            </div>
                            <div class="d-flex justify-content-center pt-2">
                                <div class="form-group @error('password') has-danger @enderror">
                                    <label class="bmd-label-floating">Password</label>
                                    <input type="password" class="form-control text-dark" name="password">
                                </div>
                            </div>
                            <div class="d-flex justify-content-center pt-2">
                                <button type="submit" class="btn btn-warning btn-sm">Masuk</button>
                                <div class="clearfix"></div>
                            </div>
                        </form>
                        {{-- <img src="/assets/img/testdoan.png" style="width: 200px;"> --}}
                        @endif
                    </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          @yield('content')
        </div>
      </div>
      {{-- <script>
        const x = new Date().getFullYear();
        let date = document.getElementById('date');
        date.innerHTML = '&copy; ' + x + date.innerHTML;
      </script> --}}
    </div>
  </div>

  <!--   Core JS Files   -->
  <!-- <script src="https://demos.creative-tim.com/material-dashboard-pro/assets/js/plugins/jquery.dataTables.min.js"></script> -->

  <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
  <script src="{{ asset('assets/js/core/bootstrap-material-design.min.js') }}"></script>
  <script src="{{ asset('assets/js/index.umd.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
  <!-- <script async defer src="https://buttons.github.io/buttons.js"></script> -->
  <script src="{{ asset('assets/js/plugins/chartist.min.js') }}"></script>
  <script src="{{ asset('assets/js/material-dashboard.js?v=2.1.0') }}"></script>
  <script src="{{ asset('assets/js/plugins/parsley.min.js') }}"></script>
  <script src="{{ asset('assets/js/lib/daftar.min.js') }}"></script>
  <script src="{{ asset('assets/js/lib/menu.min.js') }}"></script>

  <script>
    $(document).ready(function() {
        md.initDashboardPageCharts();
        @if(session()->has('status'))
            md.showNotification("top","left","primary","{{ session()->get('status') }}");
        @endif
        @if(session()->has('errorr'))
            md.showNotification("top","left","danger","{{ session()->get('errorr') }}");
        @endif
    });
  </script>
</body>

</html>
