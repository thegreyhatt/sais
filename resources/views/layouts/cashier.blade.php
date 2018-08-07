<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SAIS | Cashier</title>

    <!-- Bootstrap -->
    <link href="{{ asset('bower_components/gentelella/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('bower_components/gentelella/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('bower_components/gentelella/vendors/nprogress/nprogress.css') }}" rel="stylesheet">

    <!-- Animate.css -->
    <link href="{{ asset('bower_components/gentelella/vendors/animate.css/animate.min.css') }}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ asset('bower_components/gentelella/build/css/custom.min.css') }}" rel="stylesheet">

    @yield('styles')

  </head>

  <body class="nav-md">
      <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="navbar-brand">
                <a href="#">CASHIER</a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    {{-- <img src="images/img.jpg" alt=""> --}}
                      {{ Auth::user()->name }}
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;"> Profile</a></li>
                    <li>
                      <a href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                          Logout
                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              {{ csrf_field() }}
                          </form>
                      </a>
                    </li>
                    {{-- <li><a href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li> --}}
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <div class="container">
          @yield('content')
        </div>

    <!-- jQuery -->
    <script src="{{ asset('bower_components/gentelella/vendors/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('bower_components/gentelella/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('bower_components/gentelella/vendors/fastclick/lib/fastclick.js') }}"></script>
    <!-- NProgress -->
    <script src="{{ asset('bower_components/gentelella/vendors/nprogress/nprogress.js') }}"></script>
    <!-- Custom Theme Scripts -->
    <script src="{{ asset('bower_components/gentelella/build/js/custom.min.js') }}"></script>
    <script src="{{ asset('bower_components/remarkable-bootstrap-notify/dist/bootstrap-notify.min.js') }}"></script>

    
    @yield('scripts')
  
  </body>
  <script type="text/javascript">
    
        @if(Session::has('msg'))
            $.notify({
                icon: 'fa fa-check',
                message: "{{ Session::get('msg') }}"
            },{
                type: 'success',
                timer: 1000,
                placement: {
                    from: 'top',
                    align: 'right'
                },
                animate: {
                  exit: 'animated fadeOutRight',
                },
                icon_type: 'class'
            });
        @endif

        @if(Session::has('error'))
            $.notify({
                icon: 'close',
                message: "{{ Session::get('error') }}"
            },{
                type: 'danger',
                timer: 1000,
                placement: {
                    from: 'top',
                    align: 'right'
                },
                animate: {
                  exit: 'animated fadeOutRight',
                },
                icon_type: 'class'
            });
        @endif
        
        @if (count($errors))
             $.notify({
                icon: 'fa fa-close',
                message: "<span> @foreach($errors->all() as $error){{ $error }} <br>  @endforeach </span>"
            },{
                type: 'danger',
                timer: 1000,
                placement: {
                    from: 'top',
                    align: 'right'
                },
                animate: {
                  // enter: 'animated fadeInRight',
                  exit: 'animated fadeOutRight',
                },
                icon_type: 'class'
            });
            
        @endif
  </script>
</html>