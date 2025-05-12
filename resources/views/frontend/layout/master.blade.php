@php
    $siteSettings = App\Models\SiteSetting::where('id', 1)->first();
    $importantLinks = App\Models\ImportantLink::where('showOnHomePage', 1)->take(5)->get();

    $currentLocale = session('locale', app()->getLocale());

@endphp

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
    @if ($currentLocale == 'en')
        <title>{{$siteSettings->titleOne}}</title>
        <meta name="keywords" content="{{$siteSettings->metaKeywords}}">
        <meta name="description" content="{{$siteSettings->metaDescription}}">
        <meta name="subject" content="{{$siteSettings->metaKeywords}}">
    @else
    <title>{{$siteSettings->titleOne_nep}}</title>
        <meta name="keywords" content="{{$siteSettings->metaKeywords_nep}}">
        <meta name="description" content="{{$siteSettings->metaDescription_nep}}">
        <meta name="subject" content="{{$siteSettings->metaKeywords_nep}}">
    @endif
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="csrf-token" name="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/appb22f.css')}}?id=746abb56b4186f9c8bec">
    <link rel="icon" href="{{ asset('assets/frontend/uploads/img/logo.png')}}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" rel="stylesheet">
    @stack('styles')
</head>
<body>

    @include('frontend.includes.topnavbar')

    @include('frontend.includes.navbar')

    @include('frontend.includes.header')

    @yield('mainContent')

    @include('frontend.includes.footer')
    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src="{{ asset('assets/frontend/js/manifesteae5.js')}}?id=d91051ea7d0c9bd1981e"></script>
    <script src="{{ asset('assets/frontend/js/vendor2505.js')}}?id=faec529b770f1589846e"></script>
    <script src="{{ asset('assets/frontend/js/wow.min.js')}}"></script>
    <script src="{{ asset('assets/frontend/js/appcb5e.js')}}?id=875ab50b8dc65a48b6aa"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        $(document).ready(function () {
            // Automatically trigger the modal on page load
            $('#exampleModal').modal('show');

            // Your toastr options and error handling here
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

            @if (session('error'))
                toastr.error('{{ session('error') }}', 'Error', {timeOut: 5000});
            @endif
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#myModal').modal('show');
        });
    </script>
    <!-- Lightbox2 JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
    @stack('script')
    </body>
  </html>
