<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Department Of Health Service">
    <meta name="keyword" content="Department Of Health Service">
    <link rel="shortcut icon" href="img/favicon.html">

    <title>General</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('assets/backend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/backend/css/bootstrap-reset.css')}}" rel="stylesheet">
    <!--external css-->
    <link href="{{ asset('assets/backend/assets/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
    <!--right slidebar-->
    <link href="{{ asset('assets/backend/css/slidebars.css')}}" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{ asset('assets/backend/css/style.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/backend/css/style-responsive.css')}}" rel="stylesheet" />

    <!-- Toastr CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">

  </head>

  <body>

  <section id="container" class="">
      <!--header start-->
      @include('backend.includes.header')
      <!--header end-->

      <!--sidebar start-->
     @include('backend.includes.sidebar')
      <!--sidebar end-->
      <!--main content start-->
      <section id="main-content">

        @yield('mainContent')

      </section>
      <!--main content end-->

      <!--footer start-->
      @include('backend.includes.footer')
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="{{ asset('assets/backend/js/jquery.js')}}"></script>
    <script src="{{ asset('assets/backend/js/bootstrap.bundle.min.js')}}"></script>
    <script class="include" type="text/javascript" src="{{ asset('assets/backend/js/jquery.dcjqaccordion.2.7.js')}}"></script>
    <script src="{{ asset('assets/backend/js/jquery.scrollTo.min.js')}}"></script>
    <script src="{{ asset('assets/backend/js/jquery.nicescroll.js')}}" type="text/javascript"></script>
    <script src="{{ asset('assets/backend/js/respond.min.js')}}" ></script>
    <script type="text/javascript" src="{{ asset('assets/backend/js/jquery.pulsate.min.js')}}"></script>

    <!--right slidebar-->
    <script src="{{ asset('assets/backend/js/slidebars.min.js')}}"></script>

    <!--common script for all pages-->
    <script src="{{ asset('assets/backend/js/common-scripts.js')}}"></script>

    <!--script for this page only-->

    <!-- Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "timeOut": "5000"
        };

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                toastr.error('{{ $error }}', 'Validation Error');
            @endforeach
        @endif

        @if (session('success'))
            toastr.success('{{ session('success') }}', 'Success');
        @endif

        @if (session('info'))
            toastr.info('{{ session('info') }}', 'Information');
        @endif

        @if (session('warning'))
            toastr.warning('{{ session('warning') }}', 'Warning');
        @endif

        @if (session('error'))
            toastr.error('{{ session('error') }}', 'Error');
        @endif
    </script>
  </body>

</html>
