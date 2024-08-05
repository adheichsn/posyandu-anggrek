<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="{{ asset('compro/assets/img/logo.png') }}" rel="icon" />
    @include('layout.css')
    <title>@yield('title') | Posyandu Anggrek 1</title>
</head>

<body class="{{ Route::is('admin.login') ? 'bg-gradient-danger' : 'bg-gradient-primary' }}">
    <div class="container-fluid">
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                @yield('content')
            </div>
        </div>
    </div>
    @include('layout.js')
</body>

</html>
