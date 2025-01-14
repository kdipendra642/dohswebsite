<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Department of Health Servie">
    <meta name="author" content="Department of Health Servie">
    <meta name="keyword" content="Department of Health Servie">
    <link rel="icon" href="{{ asset('assets/frontend/uploads/img/logo.png')}}">

    <title>Department of Health Servie</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('assets/backend/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- <link href="{{ asset('assets/backend/css/bootstrap-reset.css') }}" rel="stylesheet"> -->
    <!--external css-->
    <link href="{{ asset('assets/backend/font-awesome/css/font-awesome.css') }}" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="{{ asset('assets/backend/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/backend/css/style-responsive.css') }}" rel="stylesheet" />
    <!-- Toastr CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
</head>

<body class="login-body">

    <div class="container">

        <form class="form-signin" action="{{ route('login.signin') }}" method="POST">
            @csrf
            <h2 class="form-signin-heading">साइन इन गर्नुहोस्</h2>
            <img src="{{ asset('assets/frontend/uploads/img/logo.png')}}" alt="Department of Health Service" class="mx-auto mt-4 d-block">
            <div class="login-wrap">
                <input type="text" name="email" class="form-control" placeholder="User ID" value="{{ old('email') }}" autofocus>
                @error('email')
                <div class="text-danger">{{ $message }}</div>
                @enderror

                <input type="password" name="password" class="form-control" placeholder="Password">
                @error('password')
                <div class="text-danger">{{ $message }}</div>
                @enderror

                <!-- <label class="checkbox">
                    <span class="pull-right">
                        <a data-toggle="modal" href="#myModal"> Forgot Password?</a>
                    </span>
                </label> -->
                <button class="btn btn-lg btn-login btn-block" type="submit">साइन इन गर्नुहोस्</button>
            </div>
        </form>

    </div>

    <!-- jQuery and Bootstrap -->
    <script src="{{ asset('assets/backend/js/jquery.js') }}"></script>
    <script src="{{ asset('assets/backend/js/bootstrap.bundle.min.js') }}"></script>
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

        @if (session('error'))
            toastr.error('{{ session('error') }}', 'Error', {timeOut: 5000});
        @endif
    </script>
</body>

</html>
