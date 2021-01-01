<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="/assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>PSB --Pendaftaran Siswa Baru</title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="/assets/css/animate.css" rel="stylesheet" />
  <link href="/assets/css/transition.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="/assets/datepick/css/bootstrap-datepicker3.min.css">
  <link rel="stylesheet" href="/assets/css/perfect-scrollbar.min.css">
  <link rel="stylesheet" href="/assets/css/material-dashboard-pro.min.css?v=2.2.2">

  <style>
    .form-section{
      display: none;
    }
    .form-section.current{
      display: inherit;
    }
    .forkps{
      display: none;
    }
    .forkps.current{
      display: inherit;
    }
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        /* display: none; <- Crashes Chrome on hover */
        -webkit-appearance: none;
        margin: 0; /* <-- Apparently some margin are still there even though it's hidden */
    }

    input[type=number] {
        -moz-appearance:textfield; /* Firefox */
    }
    .d-full {
        display: inline;
    }
    </style>
    <script src="/assets/js/core/jquery.min.js"></script>
    <script src="/assets/datepick/js/bootstrap-datepicker.min.js"></script>
    <script src="/assets/js/plugins/bootstrap-notify.js"></script>

</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="black" data-image="/assets/img/sidebar-2.jpg">
      <div class="logo"><a href="/" class="simple-text logo-normal">
        SMKS ISLAM TANJUNG
        </a></div>
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
  
  <script src="/assets/js/jquery.dataTables.min.js"></script>
  <script src="/assets/js/core/popper.min.js"></script>
  <script src="/assets/js/core/bootstrap-material-design.min.js"></script>
  <script src="/assets/js/index.umd.js"></script>
  <!-- <script src="https://unpkg.com/default-passive-events"></script> -->
  <script src="/assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>

  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <script src="/assets/js/plugins/chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="/assets/js/material-dashboard.js?v=2.1.0"></script>

  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  {{-- <script src="/assets/demo/demo.js"></script> --}}
  <script src="/assets/js/plugins/parsley.min.js"></script>
  <script>
    $(function() {
      $().ready(function() {
        $sidebar = $('.sidebar');

        $sidebar_img_container = $sidebar.find('.sidebar-background');

        $full_page = $('.full-page');

        $sidebar_responsive = $('body > .navbar-collapse');

        window_width = $(window).width();

        $('.fixed-plugin a').click(function(event) {
          // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
          if ($(this).hasClass('switch-trigger')) {
            if (event.stopPropagation) {
              event.stopPropagation();
            } else if (window.event) {
              window.event.cancelBubble = true;
            }
          }
        });

        $('.fixed-plugin .active-color span').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-color', new_color);
          }

          if ($full_page.length != 0) {
            $full_page.attr('filter-color', new_color);
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.attr('data-color', new_color);
          }
        });

        $('.fixed-plugin .background-color .badge').click(function() {
          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('background-color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-background-color', new_color);
          }
        });

        $('.fixed-plugin .img-holder').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).parent('li').siblings().removeClass('active');
          $(this).parent('li').addClass('active');


          var new_image = $(this).find("img").attr('src');

          if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            $sidebar_img_container.fadeOut('fast', function() {
              $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
              $sidebar_img_container.fadeIn('fast');
            });
          }

          if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $full_page_background.fadeOut('fast', function() {
              $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
              $full_page_background.fadeIn('fast');
            });
          }

          if ($('.switch-sidebar-image input:checked').length == 0) {
            var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
            $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
          }
        });

        $('.switch-sidebar-image input').change(function() {
          $full_page_background = $('.full-page-background');

          $input = $(this);

          if ($input.is(':checked')) {
            if ($sidebar_img_container.length != 0) {
              $sidebar_img_container.fadeIn('fast');
              $sidebar.attr('data-image', '#');
            }

            if ($full_page_background.length != 0) {
              $full_page_background.fadeIn('fast');
              $full_page.attr('data-image', '#');
            }

            background_image = true;
          } else {
            if ($sidebar_img_container.length != 0) {
              $sidebar.removeAttr('data-image');
              $sidebar_img_container.fadeOut('fast');
            }

            if ($full_page_background.length != 0) {
              $full_page.removeAttr('data-image', '#');
              $full_page_background.fadeOut('fast');
            }

            background_image = false;
          }
        });

        $('.switch-sidebar-mini input').change(function() {
          $body = $('body');

          $input = $(this);

          if (md.misc.sidebar_mini_active == true) {
            $('body').removeClass('sidebar-mini');
            md.misc.sidebar_mini_active = false;

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

          } else {

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

            setTimeout(function() {
              $('body').addClass('sidebar-mini');

              md.misc.sidebar_mini_active = true;
            }, 300);
          }

          // we simulate the window Resize so the charts will get updated in realtime.
          var simulateWindowResize = setInterval(function() {
            window.dispatchEvent(new Event('resize'));
          }, 180);

          // we stop the simulation of Window Resize after the animations are completed
          setTimeout(function() {
            clearInterval(simulateWindowResize);
          }, 1000);

        });
        $('.nav-item').click(function(){
          $('.nav-item').removeClass('active');
          $(this).addClass('active');
        });
        $('.dropdown .dropdown-menu .jk').click(function() {
            // alert($(this).val());
            $('.dropdown #dropdownMenuButtonjk').val($(this).val()).text($(this).text());
            $('#forjk').val($(this).val()).text($(this).text());
        });
        $('.dropdown .dropdown-menu .ag').click(function() {
            // alert($(this).val());
            $('.dropdown #dropdownMenuButtonag').val($(this).val()).text($(this).text());
            $('#foragama').val($(this).val()).text($(this).text());
        });
        $('.dropdown .dropdown-menu .kd').click(function() {
            // alert($(this).val());
            $('.dropdown #dropdownMenuButtonkd').val($(this).val()).text($(this).text());
            $('#forkendaraan').val($(this).val()).text($(this).text());
        });
        $('.dateSis').datepicker({
          format: "yyyy-mm-dd",
          startView: 2,
          clearBtn: true,
          language: "id"
        }).on('changeDate', function(e) {
          $('.vlDate').val($(".dateSis").data('datepicker').getFormattedDate('yyyy-mm-dd'));
        });
      });
      //form wizard
      var $section=$('.form-section');

        function navigateTo(index){
            $section.removeClass('current').eq(index).addClass('current');
            $('.navnav .preve').toggle(index>0);
            var atTheEnd = index >= $section.length - 1;
            $('.navnav .nekt').toggle(!atTheEnd);
            $('.navnav [type=submit]').toggle(atTheEnd);
        }

        function curIndex(){
            return $section.index($section.filter('.current'));
        }

        $('.navnav .preve').click(function(){
            navigateTo(curIndex()-1);
        });
        $('.navnav .nekt').click(function(){
            $('.contak-form').parsley().whenValidate({
                group: "block-"+curIndex()
            }).done(function(){
                navigateTo(curIndex()+1);
            })
        });

        $section.each(function(index, section){
            $(section).find(':input').attr('data-parsley-group','block-'+index);

        });
        navigateTo(0);
    });
  </script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();

    });
  </script>
</body>

</html>
